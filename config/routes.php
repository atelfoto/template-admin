<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'Admin',
    ['path' => '/admin'],
    function (RouteBuilder $routes) {
        // $routes->get('/Menus', ['controller' => 'Menus']);
        $routes->fallbacks(DashedRoute::class);
    }
);
