// Updated: 2017-12-04
const WebSocket = require("ws");
const jwt = require("jsonwebtoken");

class WSServer {
  constructor(port, secret) {
    this.wss = new WebSocket.Server({ port });
    this.secret = secret;
    this.rooms = new Map();
    this.clients = new Map();
    this.wss.on("connection", (ws, req) => this.onConnect(ws, req));
    console.log(`WebSocket server on port ${port}`);
  }

  onConnect(ws, req) {
    const token = new URL(req.url, "http://x").searchParams.get("token");
    try {
      const user = jwt.verify(token, this.secret);
      this.clients.set(ws, user);
      ws.on("message", (msg) => this.onMessage(ws, msg));
      ws.on("close", () => this.clients.delete(ws));
      ws.send(JSON.stringify({ type: "connected", userId: user.id }));
    } catch { ws.close(4001, "Unauthorized"); }
  }

  onMessage(ws, raw) {
    try {
      const { type, room, data } = JSON.parse(raw);
      const user = this.clients.get(ws);
      if (type === "join") this.joinRoom(ws, room);
      if (type === "message") this.broadcast(room, { type: "message", from: user.name, data });
    } catch {}
  }

  joinRoom(ws, room) {
    if (!this.rooms.has(room)) this.rooms.set(room, new Set());
    this.rooms.get(room).add(ws);
  }

  broadcast(room, payload) {
    const members = this.rooms.get(room);
    if (!members) return;
    const msg = JSON.stringify(payload);
    members.forEach(ws => { if (ws.readyState === WebSocket.OPEN) ws.send(msg); });
  }
}
module.exports = WSServer;
