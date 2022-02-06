<?php

interface Veiculo
{
    public function acelerar($velocidade);
    public function frenar($velocidade);
    public function trocarMarcha($marcha);  
}

    abstract class Automovel implements Veiculo
    {
        public function acelerar($velocidade)
        {
            echo "O Veiculo acelerou até ".$velocidade." km/h" . "<br>";
        }

        public function frenar($velocidade)
        {
            echo "O Veiculo frenou até ".$velocidade." km/h" . "<br>";
        }

        public function trocarMarcha($marcha)
        {
            echo "O veiculo engatou a " . $marcha . " marcha" . "<br>";
        }   

    }

?>