<?php

namespace App;

class Route
{
    public function __construct(private string $method, private string $path, private $callback,)
    {
        //
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
}
