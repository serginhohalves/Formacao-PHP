<?php   

// extbelecer conexão com o banco de dados dbphp7 no workbench

    $host = "localhost";
    $user = "root";
    $password = "#*Brasil03";
    $dbname = "dbphp7";

    $conn = new mysqli($host, $user, $password, $dbname);
    if($conn -> connect_error){
        die("Falha na conexão: " . $conn -> connect_error);
    }else{
        echo "Conexão realizada com sucesso!";
    }
    
