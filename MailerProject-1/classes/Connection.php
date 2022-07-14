<?php 

// Factory
class Connection
{
    public static function open($database)
    
    {
        if(file_exists("./config/{$database}.ini"))
        {
            $db = parse_ini_file("./config/{$database}.ini");
        }

        $host = isset($db['host']) ? $db['host'] : null;
        $user = isset($db['user']) ? $db['user'] : null;
        $pass = isset($db['pass']) ? $db['pass'] : null;
        $dbname = isset($db['dbname']) ? $db['dbname'] : null;
        $type = isset($db['type']) ? $db['type'] : null;

        switch($type)
        {
            case 'mysql':
                $conn = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
                break;
            case 'sqlite':
                $conn = new PDO("sqlite:dbname={$dbname}");
                break;
            case 'pgsql':
                $port = isset($db['port']) ? $db['port'] : null;
                $conn = new PDO("pgsql:dbname={$dbname};port={$port};user={$user};password={$pass};host={$host}");
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

//         $host = isset($db['host']) ? $db['host'] : null;
//         $user = isset($db['user']) ? $db['user'] : null;
//         $pass = isset($db['pass']) ? $db['pass'] : null;
//         $dbname = isset($db['dbname']) ? $db['dbname'] : null;
//         $type = isset($db['type']) ? $db['type'] : null;

//         switch($type)
//         {
//             case 'mysql':
//                 $conn = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
//                 break;
//             case 'sqlite': 
//                 $conn = new PDO("sqlite:{$dbname}");
//                 break;
//             case 'pgsql':
//                 $port = isset($db['port']) ? $db['port'] : null;
//                 $conn = new PDO("pgsql:dbname={$dbname};port={$port};user={$user};password={$pass};host={$host}"); 
//                 break;
//         }

//         $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//         return $conn;       
//     }
// }