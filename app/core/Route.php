<?php

namespace App\Core;


use App\Interfaces\LoggerInterface;

class Route
{
    private $pattern = null;
    private $controller = null;
    private $action = null;
    private $logger;

    public function __construct(string $pattern, array $routeData, LoggerInterface $logger)
    {
        $this->pattern = $pattern;
        $this->logger = $logger;

        if (isset($routeData['controller'], $routeData['action']))
        {
            $this->controller = $routeData['controller'];
            $this->action = $routeData['action'];
        }
        else
        {
            $this->logger->log('Route: object data is not set');

            throw new \Exception('Route: object data is not set');
        }
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