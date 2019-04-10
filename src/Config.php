<?php

namespace Phooto\APIClient;

class Config
{
    private $config;

    public function __construct($name)
    {
        $this->config = require "../config/{$name}.php";
    }

    public function getValue($index)
    {
        return $this->config[$index];
    }
}
