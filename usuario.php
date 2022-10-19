<?php

class usuarios
{
    private $id_usuario;
    private $nome_usuario;
    private $email_usuario;
   
    private $senha_usuario;
   

    public function __construct($id_usuario,$nome_usuario,$email_usuario,$senha_usuario)
    {
        $this->id_usuario=$id_usuario;
        $this->nome_usuario=$nome_usuario;
        $this->email_usuario=$email_usuario;
      
        $this->senha_usuario=$senha_usuario;
      
    }

    public function setIdusuario($id_usuario){
        $this->id_usuario=$id_usuario;
    }

    public function getIdusuario(){
        return $this->id_usuario;
    }

    public function setNomeusuario($nome_usuario){
        $this->nome_usuario=$nome_usuario;
    }

    public function getNomeusuario(){
        return $this->nome_usuario;
    }

    public function setEmailusuario($email_usuario){
        $this->email_usuario=$email_usuario;
    }

    public function getEmailusuario(){
        return $this->email_usuario;
    }

   
    

    
    

    public function setSenhausuario($senha_usuario){
        $this->senha_usuario=$senha_usuario;
    }

    public function getSenhausuario(){
        return $this->senha_usuario;
    }

}