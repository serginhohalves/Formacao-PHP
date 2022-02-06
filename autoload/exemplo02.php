<?php
    // Verificação se a pasta existe no mesmo diretorio e com o mesmo nome da classe, se sim faz o require//
    function incluirClasse( $nomeClasse){

        if(file_exists($nomeClasse.".php") === true){
            require_once($nomeClasse.".php");
        }
    }
    spl_autoload_register("incluirClasse");

// ------------------------------------------------------------
//Faz a verificação se a pasta existe em outro diretorio e com o mesmo nome da classe, se sim faz o require//
    spl_autoload_register(function($nameclass){
        if(file_exists("abstratas". DIRECTORY_SEPARATOR . $nameclass.".php") === true){
            require_once("abstratas". DIRECTORY_SEPARATOR . $nameclass . ".php");
        }
    });



$carro = new DelRey();
$carro->acelerar(80);
$carro->frenar(50);
$carro->trocarMarcha(2);
?>