<?php

namespace PhootoBR\APIClient;

class Config
{
    private $config;

    public function __construct($name)
    {
        $this->config = require __DIR__ . "/../config/{$name}.php";
    }

    public function getValue($index)
    {
        return $this->config[$index];
    }
}
