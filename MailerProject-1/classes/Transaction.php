<?php  
// 1. abertura de conexão 
// 2. pega a conexão 

// 3. se existir conexão ativa, então feche a conexão 
// 4. ou se algo der errado, volte tudo do começo e tente novamente.

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
            self::$conn=NULL;
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

// Transaction 
// class Transaction 
// {
//     private static $conn;

//     // Abre a conexão.
//     public static function open($database)
//     {
//         self::$conn = Connection::open($database);
//         self::$conn->beginTransaction();
//     }

//     // Recupera a conexão.
//     public static function get()
//     {
//         return self::$conn;
//     }

//     // Fecha se tiver uma conexão ativa.
//     public static function close()
//     {
//         if(self::$conn)
//         {
//             self::$conn->commit();
//             self::$conn = null;
//         }
//     }

//     // Defaz tudo se caso algo der errado.
//     public static function rollback()
//     {
//         if(self::$conn)
//         {
//             self::$conn->rollback();
//             self::$conn = null;
//         }
//     }
// }




