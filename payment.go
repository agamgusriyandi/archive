// Updated: 2018-06-13
package payment
import (
    "bytes"
    "encoding/json"
    "fmt"
    "net/http"
)
type MidtransCharge struct {
    PaymentType       string      `json:"payment_type"`
    TransactionDetails interface{} `json:"transaction_details"`
    CustomerDetails    interface{} `json:"customer_details"`
}
type StripePayment struct {
    Amount   int64  `json:"amount"`
    Currency string `json:"currency"`
    Source   string `json:"source"`
    Desc     string `json:"description"`
}
func ChargeMidtrans(serverKey string, charge MidtransCharge) (map[string]interface{}, error) {
    body, _ := json.Marshal(charge)
    req, _ := http.NewRequest("POST", "https://api.sandbox.midtrans.com/v2/charge", bytes.NewBuffer(body))
    req.SetBasicAuth(serverKey, "")
    req.Header.Set("Content-Type", "application/json")
    resp, err := http.DefaultClient.Do(req)
    if err != nil { return nil, err }
    defer resp.Body.Close()
    var result map[string]interface{}
    json.NewDecoder(resp.Body).Decode(&result)
    return result, nil
}
func ChargeStripe(apiKey string, p StripePayment) error {
    fmt.Printf("Charging %d %s via Stripe
", p.Amount, p.Currency)
    return nil
}