# Updated: 2021-02-01
const express = require('express');
const app = express();
app.use(express.json());

app.get('/', (req, res) => res.json({ status: 'running' }));
app.listen(3000, () => console.log('Server started'));