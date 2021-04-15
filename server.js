const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const urlencodedParser = bodyParser.urlencoded({ extended: false })
const mysql = require('mysql');

// connect to db
var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "villa_project"
});

app.set("view engine", "ejs");

app.use(urlencodedParser);

//render homepage
app.get("/", (req, res) => {
 res.render('index');
});

//redirect to home
//if anyone come directly 
app.get("/quiz", (req, res) => {
 res.redirect('/');
});

function qz(req, res) {
    var resp = req.body.qtype;
    console.log(resp);
    const sql = "select ques, op_1, op_2, op_3, op_4 from "+resp+"_q_ans";
 con.query(sql, function(err, data) {
     res.render('quiz', {qtype:resp, data: data} );
 });
}

function resu(req, res) {
    var resp = req.body.qtype;
    const sql = "select * from "+resp+"_q_ans";
    con.query(sql, function(err, data) {
        res.render('result', {qtype:resp, data:data, user_data: req.body});
    });
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