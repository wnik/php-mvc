<?php

namespace App\Core;


abstract class Connection
{
    protected static $instance;

    abstract public static function getInstance();

//    abstract public function getConnection();
}