<?php 

spl_autoload_register([new LibraryLoader, 'register']);

class LibraryLoader
{
    public function register($class)
    {
        if(file_exists("./classes/" . $class . ".php"))
        {
            require_once "./classes/" . $class . ".php";
        }
    }
}




// spl_autoload_register([new LibraryLoader, 'register']);

// class LibraryLoader 
// {
//     public function register($class)
//     {
//         if(file_exists("./classes/" . $class . ".php"))
//         {
//             require_once "./classes/" . $class . ".php";
//         }
//     }
// }

























// spl_autoload_register([new LibraryLoader, 'register']);

// class LibraryLoader 
// {
//     public static function register($class)
//     {
//         if(file_exists("./classes/" . $class . ".php"))
//         {
//             require_once "./classes/" . $class . ".php";
//         }
//     }
// }