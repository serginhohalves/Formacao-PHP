<?php 

class LoggerTXT extends Logger
{
    public function write($message)
    {
        $data = date('Y-m-d H:i:s') . ' '. $message . "\n";
        $handler = fopen($this->filename, 'a');
        fwrite($handler,$data);
        fclose($handler);
    }
    

}
// class LoggerTXT extends Logger 
// {
//     public function write($message)
//     {
//         $data = date('Y-m-d H:i:s') . ' ' . $message . "\n";
//         $handler = fopen($this->filename,'a');// Abre o arquivo
//         fwrite($handler,$data); // Escreve no arquivo depois de aberto
//         fclose($handler);// Fecha o arquivo 
//     }
// }