<?php 
require_once './classes/ProdutoGateway.php';

try 
{
    $conn = new PDO('mysql:host=localhost;dbname=estoque','root','');
    ProdutoGateway::setConnection($conn);
    

    // $produto = Produto::find(26);
    // print_r($produto->getMargemLucro());


    // delete(23)
    $produto = ProdutoGateway::find(27);
    $produto->delete();

    // $produto->descricao = 'Mac Book PRO';
    // $produto->estoque = 10;
    // $produto->preco_custo = 3000;
    // $produto->preco_venda = 14000;
    // $produto->codigo_barra = '234832809348092';
    // $produto->data_cadastro = date('Y-m-d');
    // $produto->origem = 'N';    
    // $produto->save();


}catch(Exception $e)
{
    print $e->getMessage();
}