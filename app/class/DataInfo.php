<?php

namespace App\Class;

use App\Database\Database;

class DataInfo extends Database
{
    private $data = [];

    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

   public function dataTable($table,$columns = ['*'], $joins = [''], $condition = ['']){
        return $this->table($table,$columns,$joins,$condition);
   }

   public function response ($data = [],$status = "",$message = ""){
    return [
        'response' => $data,
        'status'   => $status,
        'message'  => $message
    ];
}
   
}
