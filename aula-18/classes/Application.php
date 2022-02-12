<?php 

namespace Source\App;
use PDO;

class Application
{
    private $conn;

    public function getWord()
    {
        print 'This is the best Word';
    }

    public function setConnection(PDO $conn)
    {
        $this->conn = $conn;
    }
}


// namespace Source\App;
// use PDO;

// class Application 
// {

//     private $conn;

//     public function getWord()
//     {
//         print 'This is the best word';
//     }

//     public function setConnection(PDO $conn)
//     {
//         $this->conn = $conn;    
//     }
// }




















// namespace Source\App;

// class Application2
// {
//     public function getWord()
//     {
//         print 'Hello everyone';    
//     }
// }