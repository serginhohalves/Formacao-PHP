<?php

    class Programador extends Pessoa
    {
        public function verDados()
        {

            echo get_class($this) . "<br/>";
            echo $this->nome . "<br>";
            echo $this->idade . "<br>";
            echo $this->senha . "<br>"; 
        } 
    }

?>

