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
            }else 
            {
                throw new Exception('Não há transação ativa.');
            }
        }
    }

    // UPDATE/SAVE
    public function save()
    {
        $prepared = $this->prepare($this->data);
        if(empty($this->data['id']) && (!$this->load($this->id)))
        {
            if(empty($this->data['id']))
            {
                $this->data['id'] = $this->getLastId() + 1;
                $prepared['id'] = $this->data['id'];
            }
            $sql = 'INSERT INTO ' . $this->getEntity() . 
                    '('. implode(',', array_keys($prepared)) . ')' .
                    'VALUES(' . implode(',' , array_values($prepared)) . ')';
        } else 
        {
            $set = [];
            foreach($prepared as $column => $value)
            {
                if($column != 'id')
                {
                    $set[] = "$column = $value";
                }
            }

            $sql = "UPDATE {$this->getEntity()} ";
            $sql.= " SET " . implode(',', $set);
            $sql.= " WHERE id = " . (int) $this->data['id'];  
        }

        if($conn = Transaction::get())
        {
            $result = $conn->prepare($sql);
            $result->execute();
            print "{$sql}";
        }else{
            throw new Exception('Não há transação ativa');
        }
    }

    public function delete($id = null)
    {
        $id = $id ? $id : $this->data['id'];
        if($id)
        {
            if($conn = Transaction::get())
            {
                $sql = "DELETE FROM " . $this->getEntity() . " WHERE id = " . (int) $id;
                $result = $conn->prepare($sql);
                $result->execute();
                print "{$sql}";
            }else{
                throw new Exception('Não há transação ativa. ');
            }
        }
    }

    // GET LAST ID 
    public function getLastId()
    {
        if($conn = Transaction::get())
        {
            $sql = "SELECT MAX(id) as max FROM " . $this->getEntity();
            $result = $conn->prepare($sql);
            $result->execute();
            $row = [];

            if($result->rowCount() > 0)
            {
                $row = $result->fetchObject(get_class());
                return $row->max;

            }else
            {
                $row = []; 
                return $row;
            }
        } else
        {
            throw new Exception('Não há transação ativa');
        }
    }
   
    // PREPARE METHOD 
    public function prepare($datas)
    {
        $prepared = [];
        foreach($datas as $key =>$value)
        {
            if(is_scalar($value))
            {
                $prepared[$key] = $this->escape($value);
            }
        }
        return $prepared;
    }

    // FILTER VALUE
    public function escape($value)
    {
        if(is_string($value))
        {
            $value = addslashes($value);
            $result = "'$value'";
        }else if(is_integer($value))
        {
            $result = (int)$value;
        }else if(is_null($value))
        {
            $result  = 'NULL';
        }else if(is_bool($value))
        {
            $result = $value ? 'TRUE' : 'FALSE';
        }else if(is_object($value))
        {
            $result = (object) $value;
        } else
        {
            $result = $value;
        }

        return $result;
    }
}

