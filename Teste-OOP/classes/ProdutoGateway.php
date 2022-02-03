<?php

class ProdutoGateway 
{

    private static $conn;

    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }

    public static function all($filter = '', $class = 'stdClass')
    {
        $sql = "SELECT * FROM produtos";
        if($filter)
        {
            $sql .= " WHERE $filter ";
        }
        $result = self::$conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_CLASS,$class);
    }

    // Retorna um único registro
    public static function find($id, $class)
    {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $result = self::$conn->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        return $result->fetchObject($class);
    }

    // Save/Update
    public static function save($data)
    {
        if(empty($data->id))
        {
            // save
            $sql = "INSERT INTO produtos(descricao,estoque,preco_custo,preco_venda,codigo_barra,data_cadastro,origem)
                    VALUES(:descricao,:estoque,:preco_custo,:preco_venda,:codigo_barra,:data_cadastro,:origem)";

            $result = self::$conn->prepare($sql);
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
        $result->bindParam(':id', $id);
        print "$sql";
        return $result->execute();
    }

}








// Método estático: ela pertence a classe 
