<?php 
require_once './classes/Produto.php';

try 
{
    $conn = new PDO('mysql:host=localhost;dbname=estoque','root','');
    Produto::setConnection($conn);



    $produto = Produto::find(26);
    $produto->alterarProduto(2000,10);
    

    
    // $produto->descricao = 'Mac Book PRO';
    // $produto->estoque = 10;
    // $produto->preco_custo = 3000;
    // $produto->preco_venda = 14000;
    // $produto->codigo_barra = '234832809348092';
    // $produto->data_cadastro = date('Y-m-d');
    // $produto->origem = 'N';    
    // $produto->save();




    // print_r($produto->getMargemLucro());


    // delete(23)
    // $produto = Produto::find(27);
    // print $produto->getMargemLucro();

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