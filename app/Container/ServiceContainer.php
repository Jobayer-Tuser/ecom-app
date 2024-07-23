<?php

namespace App\Container;

use Exception;

class ServiceContainer
{
    private array $services = [];

    public function set(string $key, $value)
    {
        return $this->services[$key]= $value;
    }

    /**
     * @throws Exception
     */
    public function get(string $key)
    {
        if (array_key_exists($key, $this->services)){
            throw new Exception('service not found');
        }
        return $this->services[$key];
    }

}
