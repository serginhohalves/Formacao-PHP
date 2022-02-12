<?php 
require_once './classes/Manutencao.php';
require_once './classes/Veiculo.php';


$ref = new ReflectionProperty('Veiculo', 'partes');

// print $ref->isStatic() ? 'Sim, ela é estática' : 'Nao, ela nao é estática';
// print '<br>';
// print $ref->isPrivate() ? 'Sim, ela é privada' : 'Nao, ela nao é privada';


// $ref = new ReflectionProperty('Veiculo','partes');

// print $ref->isStatic() ? 'Sim, ela é estática' : 'Não, ela não é estática';
// print '<br>';
// print $ref->isPrivate() ? 'Sim, ela é privada' : 'Não, ela não é privada';