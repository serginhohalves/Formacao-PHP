<?php 

class Produto 
{
    private $data;

    public function __get($prop)
    {
        return $this->data[$prop];
    }

    public function __set($prop, $value)
    {
        $this->data[$prop] = $value;
    }

    // code runs here...
    public static function setConnection($conn)
    {
        ProdutoGateway::setConnection($conn);
    }

    public static function all($filter = '')
    {
        return ProdutoGateway::all($filter,'Produto');
    }

    public static function find($id)
    {
        return ProdutoGateway::find($id,'Produto');
    }

    public function save()
    {
        return ProdutoGateway::save((object) $this->data);
    }

    public function delete($id)
    {
        return ProdutoGateway::delete($id);
    }
}