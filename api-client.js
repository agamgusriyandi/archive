// Updated: 2018-05-18
const axios = require("axios");

class ApiClient {
  constructor(baseURL, token) {
    this.client = axios.create({
      baseURL,
      headers: { Authorization: `Bearer ${token}`, "Content-Type": "application/json" },
      timeout: 10000,
    });
    this.client.interceptors.response.use(
      (res) => res.data,
      (err) => {
        const msg = err.response?.data?.message || err.message;
        throw new Error(msg);
      }
    );
  }
  async get(path, params = {}) { return this.client.get(path, { params }); }
  async post(path, data) { return this.client.post(path, data); }
  async put(path, data) { return this.client.put(path, data); }
  async delete(path) { return this.client.delete(path); }
  async paginate(path, params = {}) {
    let page = 1, all = [];
    while (true) {
      const res = await this.get(path, { ...params, page, limit: 100 });
      if (!res.data?.length) break;
      all.push(...res.data);
      if (res.data.length < 100) break;
      page++;
    }
    return all;
  }
}
module.exports = ApiClient;
