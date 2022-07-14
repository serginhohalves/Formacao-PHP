<?php


namespace DesignPatterns\Creational\AbstractFactory;

interface createJsonWriter
{
    public function write(array $line):string
    {
        return join(',', $line) . "\n";
    }

}