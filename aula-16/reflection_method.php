<?php 
require_once './classes/Manutencao.php';
require_once './classes/Veiculo.php';

$ref = new ReflectionMethod('Veiculo', 'setPartes');
print $ref->getName();
print '<br>';
print $ref->isPrivate() ? 'Sim ele é privado' : 'Nao, ele nao é privado';
print '<br>';
print $ref->isStatic() ? 'Sim ele é estático' : 'Nao, ele nao é estático';
print '<br>';
print $ref->isFinal() ? 'Sim ele é final' : 'Nao, ele nao é final';
print '<br>';



// $ref = new ReflectionMethod('Veiculo','setPartes');

// print $ref->getName();
// print '<br>';
// print $ref->isPrivate() ? 'Sim, ele é privado' : 'Não, ele não é privado';
// print '<br>';
// print $ref->isStatic() ? 'Sim, ele é estático' : 'Não, ele não é estático';
// print '<br>';
// print $ref->isFinal() ? 'Sim, ele é final' : 'Não, ele não é final';
// print '<br>';







// $ref = new ReflectionMethod('Veiculo','setPartes');

// print $ref->getName();
// print '<br>';
// print $ref->isPrivate() ? 'Sim, ele é privado' : 'Não, ele não é privado';
// print '<br>';
// print $ref->isStatic() ? 'Sim, ele é estático' : 'Não, ele não é estático';
// print '<br>';
// print $ref->isFinal() ? 'Sim, ele é final' : 'Não, ele não é final';