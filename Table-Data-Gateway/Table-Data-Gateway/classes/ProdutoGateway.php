<?php

// Table Data Gateway: responsável pelo o transporte de dados vindo diretamente do 
// banco de dados. Ele um portão onde será feita essa conexão para que 
// o mesmo possa extrair informações vindo do banco.

// stateless

class ProdutoGateway 
{
    // Guarda a conexão com o banco de dados
    private static $conn;

    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }

    public static function all($filter = '',$class = 'stdClass')
    {
        $sql = "SELECT * FROM produtos";
        if($filter)
        {
            $sql .= " WHERE {$filter}";
        }

        $result = self::$conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_CLASS,$class);
    }

    public static function find($id,$class = 'stdClass')
    {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $result = self::$conn->prepare($sql);
        $result->bindParam(':id',$id);
        $result->execute();
        return $result->fetchObject($class);
    }

    public static function save($data)
    {
        if(empty($data->id))
        {
            $id = ProdutoGateway::getLastId() + 1;

            // save
            $sql = "INSERT INTO produtos(id,descricao,estoque,preco_custo,preco_venda,codigo_barra,data_cadastro,origem)
                    VALUES(:id,:descricao,:estoque,:preco_custo,:preco_venda,:codigo_barra,:data_cadastro,:origem)";

            $result = self::$conn->prepare($sql);
            $result->bindParam(':id',$id);
            $result->bindParam(':descricao',$data->descricao);
            $result->bindParam(':estoque',$data->estoque);
            $result->bindParam(':preco_custo',$data->preco_custo);
            $result->bindParam(':preco_venda',$data->preco_venda);
            $result->bindParam(':codigo_barra',$data->codigo_barra);
            $result->bindParam(':data_cadastro',$data->data_cadastro);
            $result->bindParam(':origem',$data->origem);
            $result->execute();
        }else 
        {
            // update
            $sql = "UPDATE produtos SET descricao = :descricao,estoque = :estoque,preco_custo = :preco_custo,preco_venda = :preco_venda,codigo_barra = :codigo_barra,data_cadastro = :data_cadastro,origem = :origem WHERE id = :id";
                
            $result = self::$conn->prepare($sql);
            $result->bindParam(':id', $data->id);
            $result->bindParam(':descricao',$data->descricao);
            $result->bindParam(':estoque',$data->estoque);
            $result->bindParam(':preco_custo',$data->preco_custo);
            $result->bindParam(':preco_venda',$data->preco_venda);
            $result->bindParam(':codigo_barra',$data->codigo_barra);
            $result->bindParam(':data_cadastro',$data->data_cadastro);
            $result->bindParam(':origem',$data->origem);
            $result->execute();
        }

        print "{$sql}";
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $result = self::$conn->prepare($sql);
        $result->bindParam(':id',$id);
        $result->execute();
        print "{$sql}";
    }

    public static function getLastId()
    {
        $sql = "SELECT MAX(id) as max FROM produtos";
        $result = self::$conn->prepare($sql);
        $result->execute();
        $result = $result->fetch(PDO::FETCH_OBJ);
        return $result->max;
    }
}


