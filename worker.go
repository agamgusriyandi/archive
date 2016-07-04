// Updated: 2016-07-04
package worker
import (
    "fmt"
    "sync"
    "time"
)
type Job struct {
    ID   int
    Data interface{}
}
type Worker struct {
    jobs    chan Job
    results chan interface{}
    wg      sync.WaitGroup
}
func New(size int) *Worker {
    return &Worker{jobs: make(chan Job, 100), results: make(chan interface{}, 100)}
}
func (w *Worker) Start(n int, fn func(Job) interface{}) {
    for i := 0; i < n; i++ {
        w.wg.Add(1)
        go func() {
            defer w.wg.Done()
            for job := range w.jobs {
                result := fn(job)
                w.results <- result
            }
        }()
    }
}
func (w *Worker) Submit(job Job) { w.jobs <- job }
func (w *Worker) Wait() {
    w.wg.Wait()
    close(w.results)
}
func ExampleUsage() {
    w := New(10)
    w.Start(5, func(j Job) interface{} {
        time.Sleep(10 * time.Millisecond)
        return fmt.Sprintf("processed job %d", j.ID)
    })
    for i := 0; i < 50; i++ { w.Submit(Job{ID: i, Data: i * 2}) }
    w.Wait()
}