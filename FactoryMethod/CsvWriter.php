<?php


namespace DesignPatterns\Creational\AbstractFactory;


interface CsvWriter
{
    public function write(array $line): string; // aqui temos o método write que recebe um array e retorna uma string
}