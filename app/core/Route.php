<?php

namespace App\Core;


class Route
{
    private $pattern = null;
    private $controller = null;
    private $action = null;

    public function __construct(string $pattern, array $routeData)
    {
        $this->pattern = $pattern;

        if (isset($routeData['controller'], $routeData['action']))
        {
            $this->controller = $routeData['controller'];
            $this->action = $routeData['action'];
        }
        else
            throw new \Exception('Route: object data is not set');
    }

    public function getPattern(): string
    {
        return $this->pattern;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getAction(): string
    {
        return $this->action;
    }
}