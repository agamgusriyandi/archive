// Updated: 2017-01-09
package main
import (
    "encoding/json"
    "fmt"
    "log"
    "net/http"
    "github.com/gorilla/mux"
)
type User struct {
    ID    int    `json:"id"`
    Name  string `json:"name"`
    Email string `json:"email"`
    Role  string `json:"role"`
}
func getUsers(w http.ResponseWriter, r *http.Request) {
    users := []User{{1,"Agam","agam@mail.com","admin"},{2,"User","user@mail.com","user"}}
    json.NewEncoder(w).Encode(users)
}
func createUser(w http.ResponseWriter, r *http.Request) {
    var u User
    json.NewDecoder(r.Body).Decode(&u)
    w.WriteHeader(http.StatusCreated)
    json.NewEncoder(w).Encode(u)
}
func main() {
    r := mux.NewRouter()
    r.HandleFunc("/users", getUsers).Methods("GET")
    r.HandleFunc("/users", createUser).Methods("POST")
    fmt.Println("Server running on :8080")
    log.Fatal(http.ListenAndServe(":8080", r))
}