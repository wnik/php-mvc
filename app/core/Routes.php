<?php


namespace App\Core;


use App\Interfaces\LoggerInterface;

class Routes implements \IteratorAggregate
{
    private $items = array();
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    public function add(string $key, Route $route)
    {
        if ($this->isExists($key))
        {
            $this->logger->log("Routes: $key is already in use");

            throw new \Exception("Routes: $key is already in use");
        }
        else
            $this->items[$key] = $route;
    }

    public function delete(string $key)
    {
        if ($this->isExists($key))
            unset($this->items[$key]);
        else
        {
            $this->logger->log("Routes: $key is not exists");

            throw new \Exception("Routes: $key is not exists");
        }
    }

    public function isExists(string $key): bool
    {
        return array_key_exists($key, $this->items);
    }

    public function & getRoute(string $key): Route
    {
        if ($this->isExists($key))
            return $this->items[$key];
        else
        {
            $this->logger->log("Routes: $key cannot be found");

            throw new \Exception("Routes: $key cannot be found");
        }
    }
}