<?php


// $nome = $_GET["a"];
// var_dump($nome) ."<br>";
// echo $nome;

// $ip = $_SERVER["SCRIPT_NAME"];
// echo $ip;

// $nome = "Sergio";
// echo $nome . "  Mais Alcuma Coisa ";


// $valorTotal = 0;
// $valorTotal+=1;
// $valorTotal+=2;
// echo $valorTotal;


// $a = null;
// $b = null;
// $b = 10;




// echo $a ?? $b ?? $c;

// $frase = "A repetição é a mãe da retenção.";
// $palavra = "mãe";

// $q = strpos($frase, $palavra);


// $texto = substr($frase,0,$q);
// // $texto = substr($frase,$q);
// var_dump($texto);

// $texto2 = substr($frase,$q + strlen($palavra),strlen($frase));

// echo "<br>";
// var_dump($texto2);
// var_dump($q);




// echo strtoupper($nome);

// echo strtolower($nome2)




$name = 'Hcode Treinamentos e Aprendizados';
 
$replace = 'Cursos';



$new_name = substr($name,0,strpos($name,'A')).$replace;
echo $new_name;

?>

