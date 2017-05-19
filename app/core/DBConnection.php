<?php

namespace App\Core;


abstract class DBConnection
{
    protected static $instance;

    abstract public static function getInstance();

    abstract public function getConnection();
}