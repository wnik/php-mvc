<?php


namespace App\Core;

use App\Interfaces\FilterInterface;

class Request
{
    private $namespace = 'App\\Controllers\\';
    private $uri = null;
    private $routes = null;
    private $slug = null;
    private $requestedRouteName = null;

    public function __construct(string $uri, FilterInterface $uriFilter, Routes & $routes)
    {
        $this->uri = $uriFilter->filter($uri);
        $this->routes = $routes;
    }

    public function match(): bool
    {
        foreach ($this->routes as $routeName => $route)
        {
            if (!empty($route->getPattern()))
            {
                if (preg_match($route->getPattern(), $this->uri, $matches))
                {
                    $this->requestedRouteName = $routeName;

                    if (count($matches) > 1)
                    {
                        array_shift($matches);

                        $this->slug = $matches;
                    }

                    return true;
                }
            }
        }

        return false;
    }

    public function getSlug(): ?array
    {
        return $this->slug;
    }

    public function getRequestedRouteName(): string
    {
        return $this->requestedRouteName;
    }

    public function redirect(string $routeName, bool $params = false)
    {
        $route = $this->routes->getRoute($routeName);

        $controller = $this->namespace . $route->getController() . 'Controller';

        if (class_exists($controller))
        {
            $controller = new $controller();

            $action = $route->getAction() . 'Action';

            if (method_exists($controller, $action))
            {
                if ($params)
                    is_array($this->getSlug()) ? $controller->$action($this->getSlug()) : $controller->$action();
                else
                    $controller->$action();
            }
            else
                throw new \Exception("Action does not exists or action name is incorrect: $controller");
        }
        else
            throw new \Exception("Controller does not exists or controller name is incorrect: $controller");
    }
}