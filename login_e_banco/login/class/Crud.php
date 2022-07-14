<?php
require_once('DB.php');

abstract class Crud extends DB
{
    protected string $tabela;
    abstract public function insert();
    abstract public function update($id);
    public function find($id)
    {
        $sql = "SELECT * FROM $this->tabela WHERE id = :id"; // Seleciona todos os registros da tabela.
        $sql = DB::prepare($sql);// Prepara a query.
        $sql->execute(array($id));// Executa a query.
        $valor = $sql->fetch();// Retorna o valor do registro.
        return $valor;// Retorna o valor do registro.
    }

    public function findAll()
    {
        $sql = "SELECT * FROM $this->tabela WHERE id=?";
        $sql = DB::prepare($sql);
        $sql->execute();
        $valor = $sql->fetchAll();
        return $valor;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $sql = DB::prepare($sql);
        return $sql->execute(array($id));
    }
    

}

