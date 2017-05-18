<?php


namespace App\Core;


class Routes implements \IteratorAggregate
{
    private $items = array();

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    public function add(string $key, Route $route)
    {
        if ($this->isExists($key))
            throw new \Exception("Route $key is already in use");
        else
            $this->items[$key] = $route;
    }

    public function delete(string $key)
    {
        if ($this->isExists($key))
            unset($this->items[$key]);
        else
            throw new \Exception("Route $key is not exists");
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
            throw new \Exception("Route $key cannot be found");
    }
}