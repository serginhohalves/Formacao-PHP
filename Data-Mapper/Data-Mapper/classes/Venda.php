<?php 

    class Venda
    {
        private $items;
        private $id;

        public function setId($id)
        {
            $this->id = $id;
        }
        public function getId($id)
        {
            return $this->id;
        }

        public function addItem($quantidade, Produto $produto)
        {
            $this->items[] = [$quantidade, $produto];
        }

        public function getItems()
        {
            return $this->items;
        }
    }

// class Venda 
// {
//     private $items;
//     private $id;

//     public function setId($id)
//     {
//         $this->id = $id;
//     }

//     public function getId()
//     {
//         return $this->id;
//     }

//     public function addItem($quantidade,Produto $produto)
//     {
//         $this->items[] = [$quantidade,$produto];
//     }

//     public function getItems()
//     {   
//         return $this->items;
//     }
// }
