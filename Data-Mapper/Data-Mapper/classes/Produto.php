<?php

class Produto
{
    private $data;

    public function __set($prop, $value )
    {
        if($value !== '')
        {
            $this->data[$prop] = $value;
        }else
        {
            unset($this->data[$prop]);
        }
    }

    public function __get($prop)
    {
        if(isset($this->data[$prop]))
        {
            return $this->data[$prop];
        }
    }
}





// class Produto 
// {
//     private $data;

//     public function __set($prop,$value)
//     {
//         if($value !== '')
//         {
//             $this->data[$prop] = $value;
//         }else 
//         {
//             unset($this->data[$prop]);
//         }
//     }

//     public function __get($prop)
//     {
//         if(isset($this->data[$prop]))
//         {
//             return $this->data[$prop];
//         }
//     }
// }