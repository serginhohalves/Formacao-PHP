<?php 

class Produto 
{
    public static function setConnection($conn)
    {
        return ProdutoGateway::setConnect($conn);
    }

    public static function all($filter = '')
    {
        $tdg = new ProdutoGateway();
        return $tdg->all($filter,'Produto');
    }


    public static function find($id)
    {
        $tdg = new ProdutoGateway();
        return $tdg->find($id,'Produto');
    }

    // public static function find($id)
    // {
    //     $tdg = new ProdutoGateway();
    //     return $tdg->find($id,'Produto');
    // }
}