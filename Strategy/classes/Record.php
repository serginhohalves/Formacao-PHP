<?php 

// Active Record - Layer Super Type

class Record
{
    private $data;

    public function __construct($id = null)
    {
        if($id)
        {
            $object = $this->load($id);
            
            if($object)
            {
                $this->fromArray($object->toArray());
            }
        }
    }

    public function __set($prop, $value)
    {
        if($value == null)
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

    public function fromArray($data)
    {
        $this->data = $data;
    }

    public function toArray()
    {
        return $this->data;
    }

    public function getEntity()
    {
        $classe = get_class($this);
        return constant($classe  ."::TABLENAME");
    }

    public static function find($id)
    {
        $classe = get_called_class();
        $classname = new $classe;
        return $classname->load($id);
    }

    public function load($id)
    {
        if($id)
        {
            $sql = "SELECT * FROM " . $this->getEntity() . " WHERE id = :id";
            if($conn = Transaction::get())
            {
                $result = $conn->prepare($sql);
                $result->bindParam(':id', $id);
                $result->execute();
                if($result->rowCount() > 0)
                {
                    return $result->fetchObject(get_class($this));
                } else
                {
                    throw new Exception('Não há transação ativa');

                }
            }

        }
    }

}