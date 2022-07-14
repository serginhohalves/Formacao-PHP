<?php 

// namespace SourceLib\Database;
// use PDO;
// use Exception;
namespace SourceLib\Database;
use PDO;
use Exception;


//Layer Supertype 
class Record 
{
    private $data;

    public function __set($prop, $value)
    {
        if($value === null)
        {
            unset($this->data[$prop]);
        }else
        {
            $this->data[$prop] = $value;
        }
    }    

    public function __get($prop)
    {
        if(isset($this->data[$prop]))
        {
            return $this->data[$prop];
        }
    }
    
    public function __isset($prop)
    {
        return isset($this->data[$prop]);
    }
     
    public function __clone()
    {
        unset($this->data['id']);
    }
    
    public function toArray()
    {
        return $this->data;
    }
    
    public function fromArray($data)
    {
        $this->data = $data;
    }

    public function getEntity()
    {
        $classname = get_class($this);
        return constant($classname . "::TABLENAME");
    }

    public function load($id)
    {
        if($id)
        {
            if($conn = Transaction::get())
            {
                $sql = "SELECT * FROM " . $this->getEntity() . " WHERE id = " . (int) $id;
                $result = $conn->prepare($sql);
                $result->execute();

                if($result->rowCount() > 0)
                {
                    return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__ );
                }else
                {
                }   
            }else 
            {
                throw new Exception('Não há transação ativa');
            }
        }

    }
    // Load --> carregamento de um produto através do ID
    // public function load($id)
    // {
    //     if($id)
    //     {
    //         if($conn = Transaction::get())
    //         {
    //             $sql = "SELECT * FROM " . $this->getEntity() . " WHERE id = " . (int) $id;
    //             $result = $conn->prepare($sql);
    //             $result->execute();

    //             if($result->rowCount() > 0)
    //             {
    //                 return $result->fetchAll(PDO::FETCH_CLASS,__CLASS__);
    //             }
    //         }else 
    //         {
    //             throw new Exception('Não há transação ativa.');
    //         }
    //     }
    // }

    



}
