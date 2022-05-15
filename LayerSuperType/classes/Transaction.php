<?php  
// 1. abertura de conexão 
// 2. pega a conexão 

// 3. se existir conexão ativa, então feche a conexão 
// 4. ou se algo der errado, volte tudo do começo e tente novamente.

class Transaction 
{
    private static $conn;
    private static $logger;


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

    // Definição

    public static function setLogger(Logger $logger)
    {
        if($logger instanceof Logger)
        {
            self::$logger = $logger;
        }
    }

    public static function log($message)
    {
        self::$logger->write($message);
    }
    // public static function setLogger(Logger $logger)
    // {
    //     if($logger instanceof Logger)
    //     {
    //         self::$logger = $logger;
    //     }
    // }

    // Cria um novo conteúdo dentro do arquivo.
    // public static function log($message)
    // {
    //     self::$logger->write($message);
    // }
}


