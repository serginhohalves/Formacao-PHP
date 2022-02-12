<?php 
class Record
{
    protected $data;

    public function __set($prop,$value)
    {   
        $this->data[$prop] = $value;
    }
    public function __get($prop)
    {
        return $this->data[$prop];
    }

    public function save()
    {
        print "INSERT INTO " . $this::TABLENAME . "(" . implode(',' , array_keys($this->data)) . ")" . 
        "VALUES('" . implode("','", array_values($this->data)) . "')";
    }

    public function load($id)   
    {
        print "SELECT * FROM " . $this::TABLENAME . ' WHERE ID ' . (int) $id;
    }

    public function delete($id)
    {
        print "DELETE * FROM " . $this::TABLENAME . ' WHERE ID ' . (int) $id;
    }
}

// class Record 
// {
//     protected $data;

//     public function __set($prop,$value)
//     {
//         $this->data[$prop] = $value;
//     }

//     public function __get($prop)
//     {
//         return $this->data[$prop];
//     }

//     public function save()
//     {
//         print "INSERT INTO " . $this::TABLENAME . "(" . implode(',', array_keys($this->data)) . ")" . 
//               " VALUES('" . implode("','", array_values($this->data)) . "')";
//     }

//     public function load($id)
//     {
//         print "SELECT * FROM " . $this::TABLENAME . ' WHERE id = ' . (int) $id; 
//     } 

//     public function delete($id)
//     {
//         print "DELETE FROM " . $this::TABLENAME . ' WHERE id = ' . (int) $id; 
//     }
// }






















// class Record 
// {
//     protected $data;

//     public function __set($prop,$value)
//     {
//         $this->data[$prop] = $value;
//     }

//     public function __get($prop)
//     {
//         return $this->data[$prop];
//     }

//     public function save()
//     {
//         print "INSERT INTO " . $this::TABLENAME . '(' . implode(',', array_keys($this->data)) .
//               ") VALUES('" . implode("','", array_values($this->data)) . "')";
//     }

//     public function load($id)
//     {
//         print "SELECT * FROM " . $this::TABLENAME . " WHERE id = " . $id;
//     }

//     public function delete($id)
//     {
//         print "DELETE FROM " . $this::TABLENAME . "WHERE id = " . $id;
//     }
// }






