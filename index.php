<?php

    require 'vendor/autoload.php';

    use App\Core\{Routes, Route, Request, Router, UriFilter, TxtFileLogger, View};


    $logger = new TxtFileLogger('logs.txt');

    $view = new View($logger);

    $routes = new Routes($logger);

    $routes->add('home_page',
                 new Route('/^$/',
                     array(
                         'controller' => 'Home',
                         'action' => 'index'
                     ),
                    $logger
                 )
    );

    $routes->add('error_page',
                 new Route('',
                     array(
                         'controller' => 'Error',
                         'action' => 'index'
                     ),
                    $logger
                 )
    );

    $routes->add('single_article_page',
                 new Route('/^\/article\/([a-z-A-Z]+)$/',
                     array(
                         'controller' => 'Article',
                         'action' => 'find'
                     ),
                    $logger
                 )
    );

    $routes->add('articles_page',
                 new Route('/^\/articles$/',
                     array(
                         'controller' => 'Article',
                         'action' => 'showAll'
                     ),
                    $logger
                 )
    );

    $request = new Request($_SERVER['REQUEST_URI'], new UriFilter(), $routes, $view, $logger);

    $router = new Router($request, $routes);