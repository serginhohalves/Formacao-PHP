<?php

// Config banco de dados.
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('SENHA', '#*Brasil03');
define('BANCO', 'login');


function limpaPost($dados)
{
    $dados  = trim($dados);
    $dados  = stripslashes($dados);
    $dados  = htmlspecialchars($dados);
    return $dados;
}