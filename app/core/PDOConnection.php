<?php

namespace App\Core;

use App\Core\Config;

class PDOConnection extends DBConnection
{
    public static function getInstance()
    {
        if (!self::$instance)
            self::$instance = new self();

        return self::$instance;
    }

    public function getConnection()
    {
        try {
            $handle = new \PDO('mysql:host=' . Config::DB['host'] . ';dbname=' . Config::DB['name'], Config::DB['user'], Config::DB['pass']);

            $handle->exec('set names utf8');

            return $handle;
        } catch (\PDOException $exception) {
            print "Error: " . $exception->getMessage() . "<br>";

            die();
        }
    }

    private function __construct() {}

    private function __clone() {}

    private function __wakeup() {}
}