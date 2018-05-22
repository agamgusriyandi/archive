// Updated: 2018-05-22
package middleware
import (
    "fmt"
    "net/http"
    "strings"
    "github.com/golang-jwt/jwt/v4"
)
var secretKey = []byte("your-secret-key")
func AuthMiddleware(next http.Handler) http.Handler {
    return http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
        authHeader := r.Header.Get("Authorization")
        if !strings.HasPrefix(authHeader, "Bearer ") {
            http.Error(w, "Unauthorized", http.StatusUnauthorized)
            return
        }
        tokenStr := strings.TrimPrefix(authHeader, "Bearer ")
        token, err := jwt.Parse(tokenStr, func(t *jwt.Token) (interface{}, error) {
            if _, ok := t.Method.(*jwt.SigningMethodHMAC); !ok {
                return nil, fmt.Errorf("unexpected signing method")
            }
            return secretKey, nil
        })
        if err != nil || !token.Valid {
            http.Error(w, "Invalid token", http.StatusForbidden)
            return
        }
        next.ServeHTTP(w, r)
    })
}