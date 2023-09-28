<?php 
/**
 * Front Controller
 * 
 * PHP version 8.1.6
 */

/**
 * Routing
 */
require_once '../Core/Router.php';

$router = new Router();

// Add the routes
// $router->add('', ['controller' => 'Home', 'action' => 'index']);
// $router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
// $router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);

// echo '<pre>';
// var_dump($router->getRoutes());
// echo '</pre>';

$url = $_SERVER['QUERY_STRING'];

if ($router->pairing($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo 'No route found for URL '. $url;
}