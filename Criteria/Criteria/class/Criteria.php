<?php 

// Filtro
class Criteria 
{
    private $filters;

    public function __construct()
    {
        $this->filters = [];
    }

    //Método de Definição 
    public function add( $variable, $compare, $value, $logic_op = 'AND')
    {
        IF(empty($this->filters))
        {
            $logic_op = null;
        }
        $this->filters[] = [$variable, $compare, $this->transform($value),$logic_op];
    }


    public function dump()
    {
        if(is_array($this->filters))
        {
            if(count($this->filters) > 0)
            {
                $results = '';
                foreach($this->filters as $filter)
                {
                    $results .= $filter[3] .  ' ' . $filter[0] . ' ' . $filter[1] . ' ' . $filter[2];  
                }
                
                return "({$results})";
            }  
        }
        
    }

    public function transform($value)
    {

        if(is_array($value))
        {
            foreach($value as $x)
            {
                if(is_string($x))
                {
                    $foo[] = "'$x'";
                } else if(is_integer($x)){
                    $foo[] = (int)($x);
                }

            }

            $result = '('. implode(',', $foo) . ')';
        }else if(is_string($value))
        {
            $result = "'$value'";
        }else if(is_integer($value))
        {
            $result = (int)($value);
        }else if(is_null($value))
        {
            $result = 'NUll';
        }else if(is_bool($value))
        {
            $result = $value ? 'TRUE' : 'FALSE';
        }else
        {
            $result = $value;
        }

        return $result;
        
    }
}

