<?php
//criar um sistema de login com usuário e senha

class Conta 
{
    private $login;
    private $senha;

    public function __construct($login, $senha)
    {
        $this->login = $login;
        $this->senha = $senha;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function verificarLogin($login, $senha)
    {
        if($this->login == $login && $this->senha == $senha){
            return true;
        }else{
            return false;
        }
    }
    
}




