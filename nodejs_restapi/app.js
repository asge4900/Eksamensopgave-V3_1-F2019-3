const express = require('express');
const app = express();
const morgan = require('morgan');
const mysql = require('mysql');
const moment = require('moment');


app.use(morgan('combined'));

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    database: 'fancyclothes.dk'
})



app.get("/fancyclothes/api/products", (req, res) => {
    const queryString = "SELECT * FROM products"
    connection.query(queryString, (err, rows, fields) => {
        if (err) {
            console.log(`Failed to query for products: ${err}`);
            res.sendStatus(500);
            return
        }

        console.log("I think we fetched products successfully");

        res.json(rows);
    })
})



app.get('/fancyclothes/api/product/:id', (req, res) => {
    console.log(`Fetching product with id: ${req.params.id}`);

    const productId = req.params.id;
    const queryString = "SELECT * FROM products WHERE productId = ?"
    connection.query(queryString, [productId], (err, rows, fields) => {
        if (err) {
            console.log(`Failed to query for producs: ${err}`);
            res.sendStatus(500);
            return
        //    throw err
        }

        console.log("I think we fetched products successfully");

        moment.locale('da');

        const products = rows.map((row) => {
            return {title: row.title, category: row.category, published: moment(row.published).format('LLLL')};
        });

        res.json(products);
    })

    // res.end();
})

app.get("/", (req, res) => {
    console.log("Responding to root route");
    res.send("Hello from root");

//http://localhost:3000
}).listen(3000), () => {
    console.log("Server is up and listening on 3000...");
}