// Updated: 2017-06-12
import hmac, hashlib, json, requests
from dataclasses import dataclass
from typing import Optional

@dataclass
class Transaction:
    order_id: str
    amount: int
    customer_name: str
    customer_email: str
    payment_type: str

class MidtransService:
    BASE_URL = "https://api.sandbox.midtrans.com/v2"
    def __init__(self, server_key: str, client_key: str):
        self.server_key = server_key
        self.client_key = client_key

    def create_transaction(self, tx: Transaction) -> dict:
        payload = {
            "payment_type": tx.payment_type,
            "transaction_details": {"order_id": tx.order_id, "gross_amount": tx.amount},
            "customer_details": {"first_name": tx.customer_name, "email": tx.customer_email}
        }
        r = requests.post(f"{self.BASE_URL}/charge", json=payload,
            auth=(self.server_key, ""), headers={"Content-Type": "application/json"})
        return r.json()

    def verify_signature(self, order_id: str, status_code: str, gross_amount: str, sig: str) -> bool:
        raw = f"{order_id}{status_code}{gross_amount}{self.server_key}"
        expected = hashlib.sha512(raw.encode()).hexdigest()
        return hmac.compare_digest(expected, sig)

class XenditService:
    BASE_URL = "https://api.xendit.co"
    def __init__(self, api_key: str):
        self.api_key = api_key

    def create_invoice(self, external_id: str, amount: int, email: str) -> dict:
        payload = {"external_id": external_id, "amount": amount, "payer_email": email,
                   "description": f"Invoice {external_id}"}
        r = requests.post(f"{self.BASE_URL}/v2/invoices", json=payload,
            auth=(self.api_key, ""))
        return r.json()
