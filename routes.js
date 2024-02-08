# Updated: 2024-02-08
const router = require('express').Router();
router.get('/users', async (req, res) => {
  const users = await User.findAll();
  res.json(users);
});
module.exports = router;