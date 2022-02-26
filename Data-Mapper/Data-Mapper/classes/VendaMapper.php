<?php 

// Data Mapper  
class VendaMapper
{
    private static $conn;

    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }

    public static function save(Venda $venda)
    {
        $data_venda = date('Y-m-d');
        $sql = "INSERT INTO venda(data_venda) VALUES('{$data_venda}')";
        $result = self::$conn->prepare($sql);
        $result->execute();

        $id = VendaMapper::getLastId();
        $venda->setId($id);

        foreach($venda->getItems() as $item)
        {
            $quantidade = $item[0];
            $produto = $item[1];
            $preco = $produto->preco;

            $sql = "INSERT INTO item_venda(id_venda, id_produto,quantidade, preco)
                VALUES('{$id}', '{$produto->id}', '{$quantidade}', '{$preco}')";

            $result = self::$conn->prepare($sql);
            $result->execute();
        }
    }

    public static function getLastId()
    {
        $sql = "SELECT MAX(id) as max from venda";
        $result =self::$conn->prepare($sql);
        $result->execute();

        $result = $result->fetch(PDO::FETCH_OBJ);
        return $result->max;
    }

}



// class VendaMapper 
// {
//     private static $conn;

//     public static function setConnection(PDO $conn)
//     {
//         self::$conn = $conn;
//     }

//     public static function save(Venda $venda)
//     {
//         $data_venda = date('Y-m-d');

//         $sql = "INSERT INTO venda(data_venda) VALUES('{$data_venda}')";
//         $result = self::$conn->prepare($sql);
//         $result->execute();

//         $id = VendaMapper::getLastId();
//         $venda->setId($id);

//         foreach($venda->getItems() as $item)
//         {
//             $quantidade = $item[0];
//             $produto = $item[1];
//             $preco = $produto->preco;

//             $sql = "INSERT INTO item_venda(id_venda,id_produto,quantidade,preco)
//                     VALUES('{$id}','{$produto->id}','{$quantidade}','{$preco}')";
//             $result = self::$conn->prepare($sql);
//             $result->execute();
//         }
//     }

//     public static function getLastId()
//     {
//         $sql = "SELECT MAX(id) as max FROM venda";
//         $result = self::$conn->prepare($sql);
//         $result->execute();
//         $result = $result->fetch(PDO::FETCH_OBJ);
//         return $result->max;       
//     }
// }