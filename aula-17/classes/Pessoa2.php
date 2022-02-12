<?php 

// trait ConvertToObject
// {
//     public function toJSON()
//     {
//         return json_encode($this->data);
//     }
//     public function toXML()
//     {
//         $xml = new SimpleXMLElement('<' . get_class($this) . '/>');
//         foreach($this->data as $key => $value)
//         {
//             $xml->addChild($key,$value);
//         }
//         return $xml->asXML();
//     }
// }

// Trait: trecho de código
// trait ConvertToObject
// {
//     public function toJSON()
//     {
//         return json_encode($this->data);
//     }

//     public function toXML()
//     {
//         $xml = new SimpleXMLElement('<' . get_class($this) . '/>');

//         foreach($this->data as $key => $value)
//         {
//             $xml->addChild($key,$value);
//         }

//         return $xml->asXML();
//     }
// }

class Pessoa2 extends Record
{
    const TABLENAME = 'pessoas';
    // use ConvertToObject;
    // use ConvertToObject;

    // public function export($exporter)
    // {
    //     return $exporter->export($this->data);
    // }

    public function export($exporter)
    {
        return $exporter->export($this->data);
    }
}



















// Trait
// trait ConvertToObject 
// {
//     public function toJSON()
//     {
//         return json_encode($this->data);
//     }

//     public function toXML()
//     {
//         $xml = new SimpleXMLElement('<' . get_class($this) . '/>');

//         foreach($this->data as $key => $value)
//         {
//             $xml->addChild($key,$value);
//         }

//         return $xml->asXML();
//     }
// }

// class Pessoa2 extends Record 
// {
//     const TABLENAME = 'pessoas';
//     // use ConvertToObject;   

//     public function export($exporter)
//     {
//         return $exporter->export($this->data);
//     }    
// }
