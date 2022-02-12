<?php 


// Classe de dominio.
class Produto 
{
    protected $data;

    public static function setConnection(PDO $conn)
    {
        return ProdutoGateway::setConnection($conn);
    }

    public function __set($prop,$value)
    {
        if($value !== '')
        {
            $this->data[$prop] = $value;
        }else 
        {
            unset($this->data[$prop]);
        }
    }

    public function __get($prop)
    {
        if(isset($this->data[$prop]))
        {
            return $this->data[$prop];
        }
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
        ProdutoGateway::save((object) $this->data);
    }

    public function delete($id)
    {
        return ProdutoGateway::delete($id);
    }

    // Métodos de regra de negócio 
    public function getMargemLucro()
    {
        return (($this->preco_venda - $this->preco_custo) / $this->preco_custo) * 100;
    }
}






