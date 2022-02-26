<?php 
require_once './classes/Produto.php';
require_once './classes/Connection.php';

try 
{
    $conn = Connection::open('estoque');
    Produto::setConnection($conn);
    
    print '<pre>';
    print_r(Produto::all());


    // $conn = Connection::open('estoque');
    // Produto::setConnection($conn);

    // print '<pre>';
    // print_r(Produto::all());

}catch(Exception $e)
{
    print $e->getMessage();
}