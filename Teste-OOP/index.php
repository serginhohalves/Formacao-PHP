<?php 
require_once './classes/ProdutoGateway.php';
require_once './classes/Produto.php';



try 
{
    $conn = new PDO('mysql:host=localhost;dbname=estoque', 'root', '');
    Produto::setConnection($conn);
    // $conn = new PDO('mysql:host=localhost;dbname=estoque','root','');
    // Produto::setConnection($conn);


    // print '<pre>';
    // print_r(Produto::find(25));
    // print '<pre>';
    // print_r(Produto::all());
    
    // print '<pre>';
    // print_r(Produto::find(25));


    // $produto = Produto::find(27);
    // $produto->descricao = 'Ipad PRO';
    // $produto->descricao = 'Iphone';
    // $produto->estoque = 2;
    // $produto->preco_custo = 3000;
    // $produto->preco_venda = 8000;
    // $produto->codigo_barra = '432809283409234';
    // $produto->data_cadastro = '2022-01-21';
    // $produto->origem = 'N';
    // $produto->save();



    // $produto = new Produto();
    // $produto->descricao = 'Iphone XR';
    // $produto->delete(28);

    $produto = new Produto();
    $produto->delete(27);
}catch(Exception $e)
{
    print $e->getMessage();
}
