<?php 


class Product 
{
    private $description;

    public function __construct($description)
    {
        $this->description = $description;
    }

    public function getDescritpion()
    {
        return $this->description;
    }
}





















// class Product 
// {
//     private $description;

//     public function __construct($description)
//     {
//         $this->description = $description;
//     }

//     public function getProduct()
//     {
//         return $this->description;
//     }
// }