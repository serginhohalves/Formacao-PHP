<?php 
require_once './vendor/autoload.php';

use SourceLib\Database\Connection;
use SourceLib\Database\Transaction;
use SourceApp\Model\Produto;
// use SourceApp\Model\Produto;

try 
{
    // Abre a conexão com o banco de dados 
    Transaction::open('estoque');
    

    $produto = new Produto();
    print_r($produto->load(2));

    
    // SET

    // if(isset($produto->descricao))
    // {

    // }

    // $produto->descricao = 'valor';
    // $produto->preco_venda;
    // $produto->estoque;


    // GET
    // print $produto->descricao;


    // Fecha a conexão com o banco de dados
    Transaction::close();
}catch(Exception $e)
{
    print $e->getMessage();
}


