<?php 

// namespace SourceLib\Database;
// use PDO;
// use Exception;
namespace SourceLib\Database;
use PDO;
use Exception;
use SourceLib\Database\Record as DatabaseRecord;

//Layer Supertype 
class Record 
{
    private $data;

    public function __construct($id = null)
    {
        if($id){
            $object = $this->load($id);
             
            if($object)
            {
                $this->fromArray($object);            
            }
        }
    }

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

    public static function find($id)
    {
        $class = get_called_class();
        $obj = new $class();
        return $obj->load($id);
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
                    // return $result->fetch();// Array
                    return $result->fetchObject(__CLASS__);// Objeto 
                }else
                {
                }   
            }else 
            {
                throw new Exception('Não há transação ativa');
            }
        }

    }

    // Delete
    public function delete()
    {
        // $id = $this->data['id'] ? $this->data['id'] : null;// Array
        $id = $this->data->id ? $this->data->id : null;// Objeto

        if($id)
        {
            if($conn = Transaction::get())
            {
                $sql = "DELETE FROM " . $this->getEntity() . " WHERE id = " . (int) $id;
                $result = $conn->prepare($sql);
                $result->execute();
            } else 
            {
                throw new Exception("Não há transação ativa.");
            }
        }
    }
    
}
