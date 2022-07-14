<?php 
require_once './vendor/autoload.php';

use SourceLib\Database\Transaction;
use SourceApp\Model\Produto;

try 
{
    // Abre a conexão com o banco de dados 
    Transaction::open('estoque');
    

    $produto = new Produto(2);


print '<pre>';
    print_r($produto);
    $produto->delete();





    // Fecha a conexão com o banco de dados
    Transaction::close();
}catch(Exception $e)
{
    print $e->getMessage();
}


