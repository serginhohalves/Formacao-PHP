<?php

require_once './classes/Connection.php';
require_once './classes/Transaction.php';
require_once './classes/Record.php';
require_once './classes/Model/Produto.php';
require_once './classes/Model/Cidade.php';
require_once './classes/Logger.php';
require_once './classes/LoggerTXT.php';

try 
{   
    Transaction::open('estoque');
    // Transaction::setLogger(new LoggerTXT('select.txt'));// Define a criação do arquivo de log
    Transaction::setLogger(new LoggerTXT('select.txt'));

    // $produto = new Produto();
    // print_r($produto->getEntity());

    $produto = new Produto(1);
    // print '<pre>';
    // print_r($produto);
    // print_r($produto->load(1));
    // print_r(Produto::find(1));

    Transaction::close();
}catch(Exception $e)
{
    Transaction::rollback();
    print $e->getMessage();
}