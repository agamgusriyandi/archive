// Updated: 2017-08-24
package cache
import (
    "context"
    "encoding/json"
    "time"
    "github.com/redis/go-redis/v9"
)
type Cache struct { client *redis.Client }
func New(addr string) *Cache {
    rdb := redis.NewClient(&redis.Options{Addr: addr})
    return &Cache{client: rdb}
}
func (c *Cache) Set(ctx context.Context, key string, val interface{}, ttl time.Duration) error {
    b, _ := json.Marshal(val)
    return c.client.Set(ctx, key, b, ttl).Err()
}
func (c *Cache) Get(ctx context.Context, key string, dest interface{}) error {
    val, err := c.client.Get(ctx, key).Result()
    if err != nil { return err }
    return json.Unmarshal([]byte(val), dest)
}
func (c *Cache) Delete(ctx context.Context, key string) error {
    return c.client.Del(ctx, key).Err()
}