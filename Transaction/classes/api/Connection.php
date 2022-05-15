<?php 

// Design Pattern - Factory
class Connection
{
    public static function open($database)
    {
        if(file_exists("./config/{$database}.ini"))
        {
            $db = parse_ini_file("./config/{$database}.ini");
        }

        $host = isset($db['host']) ? $db['host'] : NULL;
        $user = isset($db['user']) ? $db['user'] : NULL;
        $pass = isset($db['pass']) ? $db['pass'] : NULL;
        $dbname = isset($db['dbname']) ? $db['dbname'] : NULL;
        $type = isset($db['type']) ? $db['type'] : NULL;

        switch($type)
        {
            case 'mysql':
                $conn = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
                break;
            case 'pgsql':
                $port = isset($db['port']) ? $db['port'] : NULL;
                $conn = new PDO("pqsql:dbname={$dbname}; port={$port};user={$user},password={$pass}, host={$host}");
                break;
            case 'sqlite':
                $conn = new PDO("sqlite:dbname={$dbname}");
                break;
        }
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $conn;   
    }
}


// class Connection 
// {
//     public static function open($database)
//     {
//         if(file_exists("./config/{$database}.ini"))
//         {
//             $db = parse_ini_file("./config/{$database}.ini");
//         }

//         $host = isset($db['host']) ? $db['host'] : NULL;
//         $user = isset($db['user']) ? $db['user'] : NULL;
//         $pass = isset($db['pass']) ? $db['pass'] : NULL;
//         $dbname = isset($db['dbname']) ? $db['dbname'] : NULL;
//         $type = isset($db['type']) ? $db['type'] : NULL;

//         switch($type)
//         {
//             case 'mysql':
//                 $conn = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
//                 break;
//             case 'pgsql':
//                 $port = isset($db['port']) ? $db['port'] : NULL;
//                 $conn = new PDO("pgsql:dbname={$dbname};port={$port};user={$user};password={$pass};host={$host}");
//                 break;
//             case 'sqlite': 
//                 $conn = new PDO("sqlite:{$dbname}");
//                 break;
//         }

//         $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//         return $conn;
//     }
// }
