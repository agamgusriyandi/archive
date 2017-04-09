// Updated: 2017-04-09
const crypto = require("crypto");
const axios = require("axios");

class PaymentGateway {
  constructor(config) {
    this.midtrans = { serverKey: config.midtransKey, url: "https://api.sandbox.midtrans.com/v2" };
    this.xendit = { apiKey: config.xenditKey, url: "https://api.xendit.co" };
    this.stripe = { secretKey: config.stripeKey, url: "https://api.stripe.com/v1" };
  }

  async chargeMidtrans(orderId, amount, customer) {
    const payload = {
      payment_type: "qris",
      transaction_details: { order_id: orderId, gross_amount: amount },
      customer_details: { first_name: customer.name, email: customer.email },
    };
    const { data } = await axios.post(`${this.midtrans.url}/charge`, payload, {
      auth: { username: this.midtrans.serverKey, password: "" },
    });
    return data;
  }

  async createXenditInvoice(externalId, amount, email) {
    const { data } = await axios.post(`${this.xendit.url}/v2/invoices`,
      { external_id: externalId, amount, payer_email: email },
      { auth: { username: this.xendit.apiKey, password: "" } }
    );
    return data;
  }

  verifyMidtransSignature(orderId, statusCode, grossAmount, receivedSig) {
    const key = `${orderId}${statusCode}${grossAmount}${this.midtrans.serverKey}`;
    const expected = crypto.createHash("sha512").update(key).digest("hex");
    return expected === receivedSig;
  }
}
module.exports = PaymentGateway;
