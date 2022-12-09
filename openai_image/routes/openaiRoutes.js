const express = require("express");
const { generateImage } = require("../controllers/openaiController");
const router = express.Router();

router.post("/generateimage", generateImage);
router.get("/home", (req, res) => {
  res.send("Hello World");
});

module.exports = router;
