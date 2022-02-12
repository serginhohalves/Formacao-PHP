<?php

// Reflection: reflexão

class Veiculo implements Manutencao
{
    protected $cor;
    private static $partes;
    protected $ano;

    public function setPartes($partes){}
    public function getPartes(){}
    public function getManutencao(){}
    
}

class Automovel extends Veiculo
{
    private $placa;

    public function setPlaca(){}
    public function getPlaca(){}
}

// class Veiculo implements Manutecao
// {
//     protected $cor;
//     protected $partes;
//     protected $ano;

//     public function setPartes($partes){}
//     public function getPartes(){}
//     public function getManutencao(){}
// }

// class Automovel extends Veiculo 
// {
//     private $placa;

//     public function setPlaca(){}
//     public function getPlaca(){}
// }


























// class Veiculo implements Manutencao
// {
//     protected $cor;
//     protected $ano;  
//     protected  $partes;

//     public static function setPartes($partes){}
//     public function getPartes(){}

//     public function getManutencao(){}
// }

// class Automovel extends Veiculo
// {
//     private $placa;
//     public function setPlaca($placa){}
//     public function getPlaca(){}
// }