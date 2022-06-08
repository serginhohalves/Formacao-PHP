<?php 
require_once './class/Connection.php';
require_once './class/Transaction.php';
require_once './class/Criteria.php';
require_once './class/Repository.php';
require_once './class/MODEL/Produto.php';

try 
{
    Transaction::open('estoque');
    $criteria = new Criteria();

    $criteria->add('origem','=','N');
    $criteria->add('estoque','<=',15,'AND');
    // $criteria->add('estoque','>',30);
    // $criteria->add('preco_custo','>=',2000);

    $repository = new Repository('Produto');
    $produtos = $repository->load($criteria);
    

    print '<pre>';
    print_r($produtos);
    // foreach($produtos as $produto)
    // {
    //     print utf8_encode($produto->descricao) . '<br>';
    // }


    // $criteria->setProperty('order','endereco');
    // $criteria->setProperty('limit',10);
    // $criteria->setProperty('offset',2);

    // print $criteria->dump();

    // $repository = new Repository();
    // $produto = $repository->load($criteria);

    Transaction::close();
}catch(Exception $e)
{
    Transaction::rollback();
    print $e->getMessage();
}