<?php 

class History
{
    private static $filename;

    public static function renderTemplate($url)
    {
        self::$filename = file_get_contents($url);
        print self::$filename;
    }

    public static function save($datas)
    {
        if(isset($datas['nome']))
        {
            if(empty($datas['id']))
            {
                $nome = isset($datas['nome']) ? $datas['nome'] : '';
                $email = isset($datas['email']) ? $datas['email'] : '';
                $endereco = isset($datas['endereco']) ? $datas['endereco'] : '';
                $telefone = isset($datas['telefone']) ? $datas['telefone'] : '';
                
                if($conn = Transaction::get())
                {
                    $sql = "INSERT INTO clientes(nome, email,endereco,telefone) VALUES(:nome,:email,:endereco,:telefone)";
                    $result = $conn->prepare($sql);
                    $result->bindParam(':nome', $nome);
                    $result->bindParam(':email', $email);
                    $result->bindParam(':endereco', $endereco);
                    $result->bindParam(':telefone', $telefone);
                    // $result->execute();
                }else
                {
                    throw new Exception('Não há conexão ativa');
                }
            }
        }
    }

}