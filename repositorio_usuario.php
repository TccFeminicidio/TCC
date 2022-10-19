<?php

require_once 'usuario.php';
require_once 'conexao.php';


interface IRepositoriousuario {
    public function Loginusuario($email_usuario,$senha_usuario);
    public function Cadastrausuario($usuario);
}

class RepositoriousuarioMySQL implements IRepositoriousuario
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = new Conexao("localhost","root","","delas_para_elas");
        if($this->conexao->conectar()==false){
            echo "Erro de conexao ".mysqli_connect_error();
        }
    }

    public function Loginusuario($email_usuario,$senha_usuario){
        $sql = "SELECT * FROM tbl_usuario WHERE email_usuario = '$email_usuario' AND senha_usuario = '$senha_usuario'";
        $linha = $this->conexao->obtemNumeroLinhas($sql);
        return $linha;
    }

    public function Cadastrausuario($usuario){
        $nome_usuario = $usuario->getNomeusuario();
        $email_usuario = $usuario->getEmailusuario();
        $senha_usuario = $usuario->getSenhausuario();
      

        $sql = "INSERT INTO tbl_usuario(nome_usuario,email_usuario,senha_usuario) VALUES ('$nome_usuario','$email_usuario','$senha_usuario')";
        echo $sql;
        $this->conexao->executarQuery($sql);
    }
}