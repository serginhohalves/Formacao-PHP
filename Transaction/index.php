<?php 
require_once './classes/api/Connection.php';
require_once './classes/api/Transaction.php';
require_once './classes/ar/Produto.php';


try 
{

    Transaction::open('estoque');

    print '<pre>';
    print_r(Produto::all());


    Transaction::close();
    // Transaction::open('estoque');
   
    // print '<pre>';
    // print_r(Produto::all());

    // Transaction::close();
}catch(Exception $e)
{
    Transaction::rollback();
    // Transaction::rollback();
    print $e->getMessage();
}