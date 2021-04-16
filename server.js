const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const urlencodedParser = bodyParser.urlencoded({ extended: false });
const fs = require('fs');

app.set("view engine", "ejs");

app.use(urlencodedParser);

//render homepage
app.get("/", (req, res) => {
 res.render('home');
});

//redirect to home
//if anyone come directly 
app.get("/quiz", (req, res) => {
 res.redirect('/');
});

function qz(req, res) {
    const q_data = JSON.parse(fs.readFileSync('./ques_data/'+req.body.qtype+'_ques.json', 'utf8'));
    res.render('quiz', {qtype:req.body.qtype, data:q_data});
}

function resu(req, res) {
    const q_data = JSON.parse(fs.readFileSync('./ques_data/'+req.body.qtype+'_ques.json', 'utf8'));
    res.render('result', {qtype:req.body.qtype, data:q_data, user_data:req.body});
}

//generate the quiz
app.post('/quiz', qz);

//generate the result
app.post('/result', resu)

//404 error for invalid pages
app.use((req, res, next) => {
    res.status(404).write("<h1>404 Not found</h1>");
    res.end();
})

//start the server
app.listen(8080, () => {
  console.log("server started on port 8080");
});