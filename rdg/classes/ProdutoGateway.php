<?php 
// class ProdutoGateway 
// {
//     private static $conn;
//     private $data;

//     public function __set($prop,$value)
//     {
//         if($value === null)
//         {
//             unset($this->data[$prop]);// Destroi a propriedade
//         }else 
//         {
//             $this->data[$prop] = $value;
//         }
//     }

//     public function __get($prop)
//     {
//         if(isset($this->data[$prop]))
//         {
//             return $this->data[$prop];
//         }
//     }

//     public static function setConnection(PDO $conn)
//     {
//         self::$conn = $conn;
//     }

//     public static function get()
//     {
//         return self::$conn;
//     }

//     public static function all($filter = '')
//     {
//         $sql = "SELECT * FROM produtos";
//         if($filter)
//         {
//             $sql .= " WHERE $filter";
//         }
//         $result = self::$conn->prepare($sql);
//         $result->execute();
//         return $result->fetchAll(PDO::FETCH_CLASS,__CLASS__);
//     }

//     public static function find($id)
//     {
//         $sql = "SELECT * FROM produtos WHERE id = :id ";
//         $result = self::$conn->prepare($sql);
//         $result->bindParam(':id', $id); 
//         $result->execute();
//         return $result->fetchObject(__CLASS__);
//     }

//     public function save()
//     {   
//         if(empty($this->data['id']))
//         {

//             $id = $this->getLastId() + 1;
//             $sql = "INSERT INTO produtos(id,descricao,estoque,preco_custo,preco_venda,codigo_barra,data_cadastro,origem) 
//                     VALUES(:id,:descricao,:estoque,:preco_custo,:preco_venda,:codigo_barra,:data_cadastro,:origem)";
//             $result = self::$conn->prepare($sql);
//             $result->bindParam(":id",$id);
//             $result->bindParam(':descricao', $this->data['descricao']);
//             $result->bindParam(':estoque', $this->data['estoque']);
//             $result->bindParam(':preco_custo', $this->data['preco_custo']);
//             $result->bindParam(':preco_venda', $this->data['preco_venda']);
//             $result->bindParam(':codigo_barra', $this->data['codigo_barra']);
//             $result->bindParam(':data_cadastro', $this->data['data_cadastro']);
//             $result->bindParam(':origem', $this->data['origem']);
//             $result->execute();
//         }else 
//         {
//             $sql = "UPDATE produtos SET descricao = :descricao,estoque = :estoque,preco_custo = :preco_custo,preco_venda = :preco_venda,codigo_barra = :codigo_barra,data_cadastro = :data_cadastro,origem=:origem WHERE id = :id";
//             $result = self::$conn->prepare($sql);
//             $result->bindParam(':id', $this->data['id']);
//             $result->bindParam(':descricao', $this->data['descricao']);
//             $result->bindParam(':estoque', $this->data['estoque']);
//             $result->bindParam(':preco_custo', $this->data['preco_custo']);
//             $result->bindParam(':preco_venda', $this->data['preco_venda']);
//             $result->bindParam(':codigo_barra', $this->data['codigo_barra']);
//             $result->bindParam(':data_cadastro', $this->data['data_cadastro']);
//             $result->bindParam(':origem', $this->data['origem']);
//             $result->execute();
//         }

//         print "$sql";
//     }

//     public function delete()
//     {
//         $id = isset($this->data['id']) ? $this->data['id'] : null;

//         $sql = "DELETE FROM produtos WHERE id = :id";
//         $result = self::$conn->prepare($sql);
//         $result->bindParam(':id',$id);
//         $result->execute();
//     }

//     public function getLastId()
//     {
//         $sql = "SELECT MAX(id) as max FROM produtos";
//         $result = self::$conn->prepare($sql);
//         $result->execute();
//         $result = $result->fetchObject(__CLASS__);
//         return $result->max;
//     }

// }


// Row Data Gateway
class ProdutoGateway 
{
    private $data;
    private static $conn;

    public function __set($prop, $value)
    {
        if($value === null)
        {
            unset($this->data[$prop]);
        }else
        {
            $this->data[$prop] = $value;
        }
    }

    public function __get($prop)
    {
        if(isset($this->data[$prop]))
        {
            return $this->data[$prop];
        }
    }

    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }

    public static function all($filter = '')
    {
        $sql = "SELECT * FROM produtos";
        if($filter)
        {
            $sql .= " WHERE $filter";
        }
        $result = self::$conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    }

    public static function find($id)
    {
        $sql = "SELECT * FROM produtos WHERE id = :id ";
        $result = self::$conn->prepare($sql);
        $result->bindParam(':id', $id); 
        $result->execute();
        return $result->fetchObject(__CLASS__);
    }

    public function save()
    {   
        if(empty($this->data['id']))
        {

            $id = $this->getLastId() + 1;
            $sql = "INSERT INTO produtos(id,descricao,estoque,preco_custo,preco_venda,codigo_barra,data_cadastro,origem) 
                    VALUES(:id,:descricao,:estoque,:preco_custo,:preco_venda,:codigo_barra,:data_cadastro,:origem)";
            $result = self::$conn->prepare($sql);
            $result->bindParam(":id",$id);
            $result->bindParam(':descricao', $this->data['descricao']);
            $result->bindParam(':estoque', $this->data['estoque']);
            $result->bindParam(':preco_custo',$this->data['preco_custo']);
            $result->bindParam(':preco_venda', $this->data['preco_venda']);
            $result->bindParam(':codigo_barra', $this->data['codigo_barra']);
            $result->bindParam(':data_cadastro', $this->data['data_cadastro']);
            $result->bindParam(':origem', $this->data['origem']);
            $result->execute();
        }else 
        {
            $sql = "UPDATE produtos SET descricao = :descricao,estoque = :estoque,preco_custo = :preco_custo,preco_venda = :preco_venda,codigo_barra = :codigo_barra,data_cadastro = :data_cadastro,origem=:origem WHERE id = :id";
            $result = self::$conn->prepare($sql);
            $result->bindParam(':id', $this->data['id']);
            $result->bindParam(':descricao', $this->data['descricao']);
            $result->bindParam(':estoque', $this->data['estoque']);
            $result->bindParam(':preco_custo',$this->data['preco_custo']);
            $result->bindParam(':preco_venda', $this->data['preco_venda']);
            $result->bindParam(':codigo_barra', $this->data['codigo_barra']);
            $result->bindParam(':data_cadastro', $this->data['data_cadastro']);
            $result->bindParam(':origem', $this->data['origem']);
            $result->execute();
        }

        print "$sql";
    }

    public function delete()
    {
        $id = isset($this->data['id']) ? $this->data['id'] : null;
        $sql = "DELETE FROM produtos WHERE id = :id";
        $result  =  self::$conn->prepare($sql);
        $result->bindParams(':id', $id);
        $result->execute();
    }

    public function getLastId()
    {
        $sql = "SELECT MAX(id) as max FROM produtos";
        $result = self::$conn->prepare($sql);
        $result->execute();
        $result = $result->fetchObject(__CLASS__);
        return $result->max;
    }

}

