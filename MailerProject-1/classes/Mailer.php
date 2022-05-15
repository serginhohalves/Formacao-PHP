<?php 

class Mailer 
{
    public static function sendMailer($dest,$subject,$datas)
    {
        if(isset($datas['nome']))
        {
            $nome = isset($datas['nome']) ? $datas['nome'] : null;
            $email = isset($datas['email']) ? $datas['email'] : null;
            $endereco = isset($datas['endereco']) ? $datas['endereco'] : null;
            $telefone = isset($datas['telefone']) ? $datas['telefone'] : null;
    
            $message = Mailer::renderTemplateMailer($nome,$email,$endereco,$telefone);
            mail($dest,$subject,$message);
        }
    }

    public static function renderTemplateMailer($nome,$email,$endereco,$telefone)
    {
        return "Nome: {$nome} - E-mail:{$email} - Endereço:{$endereco} - Telefone:{$telefone}";
    }
}