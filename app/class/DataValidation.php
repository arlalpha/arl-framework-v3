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

    public function bcrypt($password) {
        $options = [
            'cost' => 12,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    function generateToken($length = 32) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $token = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[random_int(0, $max)];
        }
        return $token;
    }
    
}
