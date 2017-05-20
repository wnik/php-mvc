<?php

    require 'vendor/autoload.php';

    use App\Core\{Routes, Route, Request, Router, UriFilter, TxtFileLogger, View};

    $logger = new TxtFileLogger('logs.txt');

    set_exception_handler(function(Exception $exception) use ($logger) {

        $msg = "Exception: " . $exception->getMessage() . " in file " . $exception->getFile() . " on line " . $exception->getLine() . "\n";

        $logger->log($msg);

        echo $msg;
    });

    $view = new View();

    $routes = new Routes();

    $routes->add('home_page',
                 new Route('/^$/',
                     array(
                         'controller' => 'Home',
                         'action' => 'index'
                     )
                 )
    );

    $routes->add('error_page',
                 new Route('',
                     array(
                         'controller' => 'Error',
                         'action' => 'index'
                     )
                 )
    );

    $routes->add('single_article_page',
                 new Route('/^\/article\/([a-z-A-Z]+)$/',
                     array(
                         'controller' => 'Article',
                         'action' => 'find'
                     )
                 )
    );

    $routes->add('articles_page',
                 new Route('/^\/articles$/',
                     array(
                         'controller' => 'Article',
                         'action' => 'showAll'
                     )
                 )
    );

    $request = new Request($_SERVER['REQUEST_URI'], new UriFilter(), $routes, $view);

    $router = new Router($request, $routes);