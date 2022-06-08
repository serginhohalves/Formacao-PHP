<?php 
require_once './class/Criteria.php';

try 
{
    $criteria = new Criteria();

    $criteria->add('origem','=','N');
    $criteria->add('estoque','>',30);
    $criteria->add('preco_custo','>=',2000);

    print $criteria->dump();


}catch(Exception $e)
{
    print $e->getMessage();
}