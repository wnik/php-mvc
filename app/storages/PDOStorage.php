<?php

namespace App\Storages;

use App\Core\{Connection, Config};
use App\Interfaces\StorageInterface;

class PDOStorage extends Connection implements StorageInterface
{
    public static function getInstance()
    {
        if (!self::$instance)
            self::$instance = new self();

        return self::$instance;
    }

    public function getConnection(): \PDO
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

    public function save()
    {
        // TODO: Implement save() method.
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    public function findById()
    {
        // TODO: Implement findBy() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    private function __construct() {}

    private function __clone() {}

    private function __wakeup() {}
}