<?php 


spl_autoload_register(function($class){
    if(file_exists("./classes/" . $class . ".php"))
    {
        require_once "./classes/". $class . ".php"; 
    }
});



// spl_autoload_register(function($class) {
//     if(file_exists("./classes/" . $class . ".php"))
//     {
//         require_once "./classes/" . $class . ".php";
//     }
// });

































// spl_autoload_register(function($class){
//     if(file_exists("./classes/" . $class . ".php"))
//     {
//         require_once "./classes/" . $class . ".php";
//     }
// });