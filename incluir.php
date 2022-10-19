<?php

require_once 'repositorio_usuario.php';
require_once 'conexao.php';
$repositorio = new RepositoriousuarioMySQL();

$nome_usuario =$_POST['nome'];
$email_usuario = $_POST['email'];
$senha_usuario = $_POST['senha'];



$numeroLinhas = $repositorio->Loginusuario($email_usuario,$senha_usuario);


if($numeroLinhas > 0){
    session_start();
    $mensagem = "Email já cadastrado!!!!";
    $_SESSION['mensagem']=$mensagem;
    header('Location:../front-end/login-cadastro/login.php');
} else {
    $usuario = new usuarios(NULL,$nome_usuario,$email_usuario,$senha_usuario);
    $cadastra_usuario = $repositorio->Cadastrausuario($usuario);
    header('Location:./front-end/login-cadastro/login.php');
}

?>