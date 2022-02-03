<?php 
    require_once "exemplo.php";

    $meuEndereco = new Endereco(
        "Rua da hora",
        "156",
        "Recife - PE"
    );
    
    // var_dump($meuEndereco);

    // unset($meuEndereco);
    echo $meuEndereco;
  
?>