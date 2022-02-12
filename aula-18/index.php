<?php
require_once './classes/Component.php';
require_once './classes/Application.php';
require_once './classes/Record.php';

use \Source\App\Application;
use \Source\App\Component;
use \Service\DB\Record;

$app = new Component();
$comp = new Application();
$conn = new PDO('mysql:host=localhost;dbname=livro','root','');

$comp->setConnection($conn);
$record = new Record(); 









// print $app->SaySomething();

// use \Source\App\Application;
// use \Source\App\Component;

// // use \Service\DB\Record;

// // $record = new Record();

// $app = new Application();
// $comp = new Component();

// print $app->setConnection($conn);











// $app = new \Source\App\Application;
// $comp = new \Source\App\Component;

// $app->getWord();
// echo '<br>';
// $comp->SaySomeThing();


















// Usando o operador use 
// use Source\App\Application2;
// use Source\App\Component;


// Passando o caminho direto
// print_r(new \Source\App\Application2);
// print_r(new \Source\App\Component);


// print '<pre>';
// print_r(new Application2);

// $application = new Application2();

// $application->getWord();

// print_r(new Component);







