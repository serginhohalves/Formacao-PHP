<?php 

require_once './classes/History.php';
require_once './classes/Connection.php';
require_once './classes/Transaction.php';
require_once './classes/Mailer.php';

try
{
    Transaction::open('mailer');
    
    // Renderiza o template 
    History::renderTemplate('./template/mailer.php');

    // Salva no banco 
    History::save($_POST);

    Mailer::sendMailer('rafaelmacedosilva88@hotmail.com','Aprendendo PHP totalmente do zero.',$_POST);

    Transaction::close();
}catch(Exception $e)
{
    Transaction::rollback();
    print $e->getMessage();
}




// require_once './classes/History.php';

// try 
// {
    
//     // History::renderTemplate('./template/mailer.php');


// }catch(Exception $e)
// {
//     print $e->getMessage();
// }


