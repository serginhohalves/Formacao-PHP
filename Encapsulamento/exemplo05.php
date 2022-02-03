<?php
 
    class Cadastro
    {
        private $nome;
        private $idade;
        private $sexo;
    
        public function __construct($a, $b, $c){
            $this->nome = $a;
            $this->idade = $b;
            $this->sexo = $c;
        }
    
        public function __toString(){
            return  "Meu nome é : ".$this->nome . "Idade:  ". $this->idade . "Sexo: " . $this->sexo;
            

        }
    }
   



?>