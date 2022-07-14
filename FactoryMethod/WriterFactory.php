<?php


namespace DesignPatterns\Creational\AbstractFactory; // aqui temos o namespace do nosso projeto
// namespace é um nome de diretório, ou seja, o nome do nosso projeto e serve para organizar nossos arquivos

interface WriterFactory
{
    public function createCswWriter();
    public function createJsonWriter();
}
