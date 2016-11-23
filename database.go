// Updated: 2016-11-23
package db
import (
    "database/sql"
    "fmt"
    "log"
    _ "github.com/lib/pq"
)
type Config struct {
    Host     string
    Port     int
    User     string
    Password string
    DBName   string
}
func Connect(cfg Config) (*sql.DB, error) {
    dsn := fmt.Sprintf("host=%s port=%d user=%s password=%s dbname=%s sslmode=disable",
        cfg.Host, cfg.Port, cfg.User, cfg.Password, cfg.DBName)
    db, err := sql.Open("postgres", dsn)
    if err != nil {
        return nil, err
    }
    if err = db.Ping(); err != nil {
        return nil, err
    }
    log.Println("Connected to PostgreSQL")
    return db, nil
}
func RunMigration(db *sql.DB, query string) error {
    _, err := db.Exec(query)
    return err
}