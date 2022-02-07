<?php

    require_once("config.php");
    use Cliente\Cadastro;

    $cad = new Cadastro();

    
    $cad->setNome("Joao");
    $cad->setEmail("joao@hotmail.com");
    $cad->setSenha("123456");

    $cad->registrarVenda();


   

    
    
?>