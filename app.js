const express = require('express');
const fs = require('fs');

const app = express();

app.use(express.json());

const users = JSON.parse(fs.readFileSync(`${__dirname}/mockDataBase.json`));
console.log(users);

app.get('/users', (req, res) => {
    res.status(200).json({
        status: "success",
        result: users.length,
        data: {
            users,
        }
    });
});

app.post('/users', (req, res) => {
    console.log(req.body.id);
    res.status(201).json({
       status: "success", 
    })
});

app.patch('/users', (req, res) => {
    console.log(req.query);
    res.send("updated")
})

const PORT = 3000;;

app.listen(PORT, () => {
    console.log(`App running on port ${PORT}`);
})