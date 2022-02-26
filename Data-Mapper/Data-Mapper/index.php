<?php 
require_once  './classes/Produto.php';
require_once  './classes/Venda.php';
require_once  './classes/VendaMapper.php';

$sp1 = new Produto();
$sp1->id = 67;
$sp1->preco = 17;

$venda = new Venda();
$venda->addItem(2,$sp1);

try 
{
    $conn = new PDO('mysql:host = localhost; dbname=estoque', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    VendaMapper::setConnection($conn);

    VendaMapper::save($venda);

}catch(Exception $e)
{
    print $e->getMessage();
}


// $p1 = new Produto();
// $p1->id = 65;
// $p1->preco = 14;

// $venda = new Venda();
// $venda->addItem(2,$p1);

// try 
// {
//     $conn = new PDO('mysql:host=localhost;dbname=estoque','root','');
//     $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     VendaMapper::setConnection($conn);

//     VendaMapper::save($venda);

// }catch(Exception $e)
// {
//     print $e->getMessage();
// }


