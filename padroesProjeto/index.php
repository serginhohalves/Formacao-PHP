<?php 
require_once './classes/ProdutoGateway.php';
require_once './classes/Produto.php';

try {
    $conn = new PDO('mysql:host=localhost;dbname=estoque','root','');
    Produto::setConnection($conn);

    $produto = Produto::find(25);

    print $produto->descricao . '<br>';
    print $produto->preco_custo . '<br>';
    print $produto->preco_venda . '<br>';
    print $produto->estoque . '<br>';


    // $produtos = Produto::all();

    // foreach($produtos as $produto)
    // {
    //     print 'Nome: ' . $produto->descricao . '<br>';
    //     print 'Estoque: ' . $produto->estoque . '<br>';
    //     print 'Preco custo: R$ ' . number_format($produto->preco_custo,2,'.',',') . '<br>';
    // }

    // foreach($produtos as $produto)
    // {
    //     print 'Nome: ' . $produto->descricao . '<br>';
    //     print 'Estoque: ' . $produto->estoque . '<br>';
    //     print 'Preço custo: R$' . number_format($produto->preco_custo,2,'.',',') . '<br>';
    // }

}catch(Exception $e)
{
    print $e->getMessage() . '<br>';
}