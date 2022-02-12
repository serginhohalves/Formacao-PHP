<?php 


// Sérgio
// class ProdutoGateway
// {
//     private static $conn; // Recebe a conexao do banco de dados

//     public static function setConnect(PDO $conn)
//     {
//         self::$conn = $conn;
//     }
    
//     //Recupera registros
//     public function all($filter = '', $class = 'stdClass')
//     {
//         $sql = "SELECT * FROM produtos"; 
//         if($filter)
//         {
//             $sql .= " WHERE {$filter} ";
//         }
//         $result = self::$conn->prepare($sql);
//         $result->execute();
//         return $result->fetchAll(PDO::FETCH_CLASS,$class); 
//     }
// }



class ProdutoGateway 
{
    private static $conn;// Recebe a conexão do banco de dados

    public static function setConnect(PDO $conn)
    {
        self::$conn = $conn;
    }

    // Recupera apenas um registro
    public function find($id,$class = 'stdClass')
    {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $result = self::$conn->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        return $result->fetchObject($class);

    }

    // Recupera todos os registros da tabela produtos
    public function all($filter = '',$class = 'stdClass')
    {
        $sql = "SELECT * FROM produtos";
        if($filter)
        {
            $sql .= " WHERE {$filter} ";
        }
        $result = self::$conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_CLASS,$class);
    }
}