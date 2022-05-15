<?php
require_once './classes/ProdutoGateway.php';

try 
{
    $conn = new PDO('mysql:host=localhost;dbname=estoque', 'root' , '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ProdutoGateway::setConnection($conn);

    


    // $conn = new PDO('mysql:host=localhost;dbname=estoque','root','');
    // $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // ProdutoGateway::setConnection($conn);

    $produto = ProdutoGateway::find(2);

    // $produto = new ProdutoGateway();

    $produto->descricao = 'Mac Book PRO';
    $produto->estoque = 2;
    $produto->preco_custo = 6000;
    $produto->preco_venda = 12000;
    $produto->codigo_barra = '48329849380924343242';
    $produto->data_cadastro = date('Y-m-d');
    $produto->origem = 'N';
    $produto->save();

    // print '<pre>';
    // print_r(ProdutoGateway::find(1));
}catch(Exception $e)
{
    print $e->getMessage();
}