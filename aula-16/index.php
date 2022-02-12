<?php
// require_once './classes/Manutencao.php';
// require_once './classes/Veiculo.php';

require_once './classes/Manutencao.php';
require_once './classes/Veiculo.php';


$ref = new ReflectionClass('Automovel');
print '<pre>';

print_r($ref->getMethods());
print_r($ref->getProperties());
print_r($ref->getParentClass());
print_r($ref->getInterfaceNames());

// $ref = new ReflectionClass('Automovel');
// print '<pre>';
// print_r($ref->getMethods());
// print_r($ref->getProperties());
// print_r($ref->getParentClass());
// print_r($ref->getInterfaceNames());


























// $ref = new ReflectionClass('Automovel');

// print '<pre>';
// print_r($ref->getMethods());
// print_r($ref->getProperties());
// print_r($ref->getParentClass());
// print_r($ref->getInterfaceNames());