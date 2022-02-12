<?php 

class Produto // classe de dominio, vamos usar todos os dados do produtoGateway
{
    private $data;// propriedades do objeto

    public function __get($prop)// 
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


    public function getMArgem()
    {
        return $this->preco_venda - $this->preco_custo;
    }
    // public function registraProduto(){
    //     $sql = "INSERT INTO produtos(descricao,estoque,preco_custo,preco_venda,codigo_barra,data_cadastro,origem)
    //             VALUES(:descricao,:estoque,:preco_custo,:preco_venda,:codigo_barra,:data_cadastro,:origem)";
    //     $result = self::$conn->prepare($sql);
    //     $result->bindParam(':descricao',$this->descricao);
    //     $result->bindParam(':estoque',$this->estoque);
    //     $result->bindParam(':preco_custo',$this->preco_custo);
    //     $result->bindParam(':preco_venda',$this->preco_venda);
    //     $result->bindParam(':codigo_barra',$this->codigo_barra);
    //     $result->bindParam(':data_cadastro',$this->data_cadastro);
    //     $result->bindParam(':origem',$this->origem);
    //     $result->execute();
    // }

    

}