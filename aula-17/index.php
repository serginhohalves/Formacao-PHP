<?php 
require_once './classes/Record.php';
require_once './classes/Pessoa2.php';
require_once './classes/Injection.php';
require_once './classes/ToJSON.php';
// require_once './classes/ToXML.php';


$p1 = new Pessoa2();

$p1->nome = 'Rafael';
$p1->idade = 31;

// $p1->export(new ToJSON);

$p1->export(new ToJSON);






// print $p1->toJSON();
// print $p1->toXML();

// $p1->load(2);
// print '<br>';
// $p1->delete(2);
// print '<br>';
// $p1->save();


// $p1 = new Pessoa2();
// $p1->nome = 'Rafael';
// $p1->idade = 10;


// print $p1->export(new ToJSON);
// $p1->load(12);
// print $p1->toJSON();






