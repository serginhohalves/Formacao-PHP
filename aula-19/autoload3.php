<?php

$loader = new LibraryLoader();
$loader->register();

class LibraryLoader
{
    public function register()
    {
        spl_autoload_register([$this, 'loadClass']);
    }

    public function loadClass($class)
    {
        if(file_exists("./classes/" . $class . ".php"))
        {
            require_once "./classes/" . $class . ".php";
        }
    }
}


// $loader = new LibraryLoader();
// $loader->register();

// class LibraryLoader 
// {
//     public function register()
//     {
//         spl_autoload_register([$this, 'loadClass']);     
//     }

//     public function loadClass($class)
//     {
//         if(file_exists("./classes/" . $class . ".php"))
//         {
//             require_once "./classes/" . $class . ".php";
//         }
//     }
// }

















// $library = new LibraryAutoLoader();
// $library->register();

// class LibraryAutoLoader 
// {
//     public function register()
//     {
//         spl_autoload_register([$this,'loadClass']);
//     }

//     public function loadClass($class)
//     {
//         if(file_exists("./classes/" . $class . ".php"))
//         {
//             require_once "./classes/" . $class . ".php";
//         }
//     }
// }