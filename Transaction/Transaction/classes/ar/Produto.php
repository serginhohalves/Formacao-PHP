<?php

// Active Record
class Produto
{
    private $data;

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
        $sql = "SELECT * FROM produtos";
        if($filter)
        {
            $sql .= " WHERE {$filter}";
        }

        $conn = Transaction::get();
        $result = $conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }

    public static function find($id)
    {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $conn = Transaction::get();
        $result = $conn->prepare($sql);
        $result->bindParam(':id',$id);
        $result->execute();
        return $result->fetchObject(__CLASS__);
    }

    public function save()
    {
        if(empty($this->id))
        {
            $id = ProdutoGateway::getLastId() + 1;

            // save
            $sql = "INSERT INTO produtos(id,descricao,estoque,preco_custo,preco_venda,codigo_barra,data_cadastro,origem)
                    VALUES(:id,:descricao,:estoque,:preco_custo,:preco_venda,:codigo_barra,:data_cadastro,:origem)";

            $conn = Transaction::get();
            $result = $conn->prepare($sql);
            $result->bindParam(':id',$id);
            $result->bindParam(':descricao',$this->data['descricao']);
            $result->bindParam(':estoque',$this->data['estoque']);
            $result->bindParam(':preco_custo',$this->data['preco_custo']);
            $result->bindParam(':preco_venda',$this->data['preco_venda']);
            $result->bindParam(':codigo_barra',$this->data['codigo_barra']);
            $result->bindParam(':data_cadastro',$this->data['data_cadastro']);
            $result->bindParam(':origem',$this->data['origem']);
            $result->execute();
        }else 
        {
            // update
            $sql = "UPDATE produtos SET descricao = :descricao,estoque = :estoque,preco_custo = :preco_custo,preco_venda = :preco_venda,codigo_barra = :codigo_barra,data_cadastro = :data_cadastro,origem = :origem WHERE id = :id";
                
            $conn = Transaction::get();
            $result = $conn->prepare($sql);
            $result->bindParam(':id',$this->data['id']);
            $result->bindParam(':descricao',$this->data['descricao']);
            $result->bindParam(':estoque',$this->data['estoque']);
            $result->bindParam(':preco_custo',$this->data['preco_custo']);
            $result->bindParam(':preco_venda',$this->data['preco_venda']);
            $result->bindParam(':codigo_barra',$this->data['codigo_barra']);
            $result->bindParam(':data_cadastro',$this->data['data_cadastro']);
            $result->bindParam(':origem',$this->data['origem']);
            $result->execute();
        }

        print "{$sql}";
    }

    public function delete()
    {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $conn = Transaction::get();
        $result = $conn->prepare($sql);
        $result->bindParam(':id',$this->data['id']);
        $result->execute();
        print "{$sql}";
    }

    public static function getLastId()
    {
        $sql = "SELECT MAX(id) as max FROM produtos";
        $conn = Transaction::get();
        $result = $conn->prepare($sql);
        $result->execute();
        $result = $result->fetch(PDO::FETCH_OBJ);
        return $result->max;
    }

    // M??todos de regras de neg??cios 
    public function getMargemLucro()
    {
        return (($this->preco_venda - $this->preco_custo) / $this->preco_custo) * 100;
    }
}