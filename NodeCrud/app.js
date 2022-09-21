const express = require('express')
const app = express()
import fetch from "node-fetch";
const port = 3000

app.set('view engine', 'ejs')

app.get('/', async (req, res) => {

  try {
    await fetch("http://localhost:8000/").then(res => res.json())
  } catch (err) {

  }
  console.log(res)
  res.render('pages/index')
})
app.listen(port, () => {
  console.log(`App listening at port ${port}`)
})