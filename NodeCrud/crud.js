const express = require('express')
var app = express()
const mongoose = require('mongoose')

//mongodb connection
mongoose.connect('mongodb://localhost:27017/examdb', { useNewUrlParser: true })
const db = mongoose.connection;
db.on('error', console.error.bind(console, 'Connection error:'));

//middleware
app.use(express.urlencoded({ extended: true }))

//Schema
var StudentSchema = mongoose.Schema({
    name: String,
    age: Number,
    address: String
});

//Model
var Student = mongoose.model('Student', StudentSchema, "Students");

//INSERT The Record
app.post("/addStudent", function (req, res) {
    console.log(req.body)
    var student = new Student({
        name: req.body.name,
        age: req.body.age,
        address: req.body.address
    });
    student.save(function (err, Student) {
        if (err) return console.error(err);
        // id = student._id;
        // console.log(student._id + " saved to student collection.");
        // res.status(200).send(student);
        // res.send(student._id + " saved to student collection.")
    });
})

//Get the record
app.get("/", (req, res) => {
    console.log(req.body);
    Student.find(function (err, student) {
        if (err) return console.error(err);
        console.log(student);
        res.send(student);
        res.render("list", { student: student })
    })
})

//Get Single Record By Id
app.get("/getById/:id", (req, res) => {
    Student.findById({ "_id": req.params.id }, function (err, student) {
        if (err) return res.send(500).send("There was a error for finding");
        if (!student) return res.status(400).send("No data found ")
        res.status(200).send(student);
    })
})

//Update the record
app.put("/update/:id", (req, res) => {
    Student.findOneAndUpdate({ "_id": req.params.id }, req.body, { new: true }, function (err, student) {
        if (err) return res.status(500).send("there was a problem to finding data");
        res.status(200).send(student)
    })
})

//Delete the record
app.delete("/delete/:id", (req, res) => {
    Student.findOneAndDelete({ "_id": req.params.id }, function (err, student) {
        if (err) return res.status(500).send("there was a error")
        res.status(200).send(student)

    })
})
app.listen(8000);

