<?php

    require 'vendor/autoload.php';

    use App\Core\{Routes, Route, Request, Router, UriFilter};


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

    $request = new Request($_SERVER['REQUEST_URI'], new UriFilter(), $routes);

    $router = new Router($request, $routes);