<?php 

// class ToJSON implements Injection 
// {
//     public function export($exporter)
//     {
//         print json_encode($exporter);
//     }
// }
class ToJSON implements Injection
{
    public function export($exporter)
    {
        print json_encode($exporter);
    }
}