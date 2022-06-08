<?php 

class Repository 
{
    private $activeRecord;

    public function __construct($class)
    {
        $this->activeRecord = $class;
    }

    public function load(Criteria $criteria)
    {
        $sql = " SELECT * FROM " . constant($this->activeRecord . '::TABLENAME');
        if($criteria)
        {
            $expression = $criteria->dump();
            if($expression)
            {
                $sql.= " WHERE " . $expression;
            }

            $order = $criteria->getProperty('order');
            $limit = $criteria->getProperty('limit');
            $offset = $criteria->getProperty('offset');
            
            if($order)
            {
                $sql .= "ORDER BY" . $order;
            }

            if($limit)
            {
                $sql .= "LIMIT" . $limit;
            } 

            if($offset)
            {
                $sql .= "OFFSET" . $limit;
            }

        }

        if($conn = Transaction::get())
        {
            $result = $conn->prepare($sql);
            $result->execute();

            if($result->rowCount()>0)
            {
                while($row =  $result->fetchObject($this->activeRecord))
                {
                    $results[] = $row;
                }

                return $results;
            }
        }else 
        {
            throw new Exception('Não há transação ativa');
        }
    }
}