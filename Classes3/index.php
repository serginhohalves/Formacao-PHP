<?php
require_once "exemplo3.php";

$cpf = new Documento();
$cpf->setNumero("05315016471");

// var_dump($cpf->getNumero());

echo $cpf->getNumero();

  

?>