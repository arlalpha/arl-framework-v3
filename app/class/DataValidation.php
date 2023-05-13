<?php

namespace App\Class;

class DataValidation
{

    private $name;

    public function __get($name)
    {
        if (!property_exists($this, $name)) {
            $this->$name = null;
        }
        return $this->$name;
    }

    public function __set($name, $value)
    {
        if (!property_exists($this, $name)) {
            $this->$name = $value;
        }
    }
}