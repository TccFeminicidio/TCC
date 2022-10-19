const express = require('express')  // importa o express
const exphbs = require('express-handlebars')
const mysql = require('mysql')

const app = express()

app.use(
    express.urlencoded({
        extended:true
    })
)

app.use(express.json())
app.engine('handlebars', exphbs.engine()) 
app.set('view engine','handlebars')
app.use(express.static('public'))

app.get('/', (req,res) => {
    res.render('home')
})


app.get('/cadastro', (req,res) => {
    res.render('cadastro')
})


app.post('/posts/inserepost', (req,res) => {
    const titulo = req.body.titulo
    const categoria = req.body.categoria
    const autor = req.body.autor
    const postagem = req.body.postagem
    const sql = `INSERT INTO tbl_post (titulo,autor,categoria,postagem) VALUES ('${titulo}','${autor}', '${categoria}','${postagem}')`
    conn.query(sql,function(err){
        if(err){
            console.log(err)
        }
        res.redirect('/')
    })
})

app.get('/posts', (req,res) => {
    const sql = 'SELECT * FROM tbl_post'
    conn.query(sql,function(err,registro) {
        if(err){
            console.log(err)
        }
        console.log(registro)
        res.render('listaposts', {registro})
    })
})

app.get('/posts/alterarposts/:id_post', (req,res) => {
    const id_post = req.params.id_post
    const sql = `SELECT * FROM tbl_post WHERE id_post = ${id_post}`
    conn.query(sql,function(err,registro) {
        if(err){
            console.log(err)
        }
        console.log(registro)
        res.render('alteraposts', {registro})
    })
})

app.post('/postos/alterandoposts', (req,res) => {
    const id_post = req.body.id_post
    const titulo = req.body.titulo
    const categoria = req.body.categoria
    const autor = req.body.autor
    const postagem = req.body.postagem
    const sql = `UPDATE tbl_post SET titulo = ${titulo}, categoria = ${categoria}, autor = ${autor}, postagem = ${postagem} WHERE id_post = ${id_post}`
    conn.query(sql,function(err) {
        if(err){
            console.log(err)
        }
        console.log(registro)
        res.redirect('/listaposts')
    })
})

const conn = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'posts'
})

conn.connect(function(err){
    if(err){
        console.log(err)
    }
    console.log('Conectou Mysql')
    app.listen(5000)
})