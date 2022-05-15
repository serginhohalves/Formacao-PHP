<?php 

// Strategy

abstract class Logger
{
    protected $filename;
    public function __construct($filename)
    {
        $this->filename = $filename;
    }
    abstract public function write($message);
}


// abstract class Logger 
// {
//     protected $filename;

//     public function __construct($filename)
//     {
//         $this->filename = $filename;
//         // file_put_contents($filename,'');
//     }

//     // Assinatura 
//     abstract public function write($message);
// }
