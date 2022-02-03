<?php

    class Pessoa{
        public $nome = "Sergio";
        protected $idade = 30;
        private $senha = "123456";

        public function verDados(){
            echo $this->nome . "<br>";
            echo $this->idade . "<br>";
            echo $this->senha . "<br>"; 
        } 
    }

?>