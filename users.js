const getUsers = (req, res) => {
    res.status(200).json({
        status: "success",
        result: users.length,
        data: {
            users,
        }
    });
}

const addUser = (req, res) => {
    console.log(req.body);
    res.status(201).json({
       status: "success", 
    })
}

module.exports = { 
    getUsers,
    addUser
}