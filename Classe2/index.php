<?php

require_once "exemplo02.php";


$gol = new Carro;
$gol->setModelo("Gol GT");
$gol->setMotor(1.7);
$gol->setAno(7);

// print_r($gol->exibir());
var_dump($gol->exibir());





?>