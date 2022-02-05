<?php

    interface Veiculo
    {
        public function acelerar($velocidade);
        public function frenar($velocidade);
        public function trocarMarcha($marcha);
    }

    class Civic implements Veiculo{
        public function acelerar($velocidade)
        {
            echo "O Veículo acelerou até " . $velocidade . "km/h" . "<br>";
        }

        public function frenar($frenar)
        {
            echo "O Veículo frenou até " . $frenar . "km/h" . "<br>";
        }

        public function trocarMarcha($marcha)
        {
            echo "O Veículo engatou a marcha " . $marcha;
        }



    }

    $carro = new Civic();

    $carro->acelerar(200) . $carro->frenar(100) . $carro->trocarMarcha(4);
    

   
   


?>