<?php 

// Design Pattern - Transaction

class Transaction
{
    private static $conn;

    public static function open($database)
    {
        self::$conn = Connection::open($database);
        self::$conn->beginTransaction();
    }
    public static function get()
    {
        return self::$conn;
    }

    public static function close()
    {
        if(self::$conn)
        {
            self::$conn->commit();
            self::$conn = NULL;
        }

    }
    public static function rollback()
    {
        if(self::$conn)
        {
            self::$conn->rollback();
            self::$conn = NULL;
        }
    }

}
// class Transaction 
// {
//     private static $conn;

//     // Abre a conexão com o banco de dados
//     public static function open($database)
//     {
//         self::$conn = Connection::open($database);
//         self::$conn->beginTransaction();
//     }

//     // Pega a conexão com o banco
//     public static function get()
//     {
//         return self::$conn;
//     }

//   // Assim que tudo for concluído com sucesso, será fechada a conexão com o banco.
//     public static function close()
//     {
//         if(self::$conn)
//         {
//             self::$conn->commit();
//             self::$conn = NULL;
//         }
//     }

//    x // Se algo der errado, será desfeito tudo que foi realizado antes.
//     public static function rollback()
//     {
//         if(self::$conn)
//         {
//             self::$conn->rollback();
//             self::$conn = NULL;
//         }
//     }
// }

