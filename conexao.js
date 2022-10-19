module.exports = (app) => {

    app.get('/' , (req,res) => {

        const mysql = require('mysql')

        const conexao = mysql.createConnection ({
            host: 'localhost',
            user: 'root',
            password: '1234',
            database: 'delas_para_elas'
        })

        conexao.connect(function(err) {
            if (err) throw err;
            conexao.query("SELECT * FROM delas_para_elas", function (err, result, fields) {
              if (err) throw err;
              res.render('delas_para_elas/delas_para_elas',{delas_para_elas:result});
            });
        })
    })
}