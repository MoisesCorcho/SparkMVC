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

// Add the routes (TEST)
// $router->add('', ['controller' => 'Home', 'action' => 'index']);
// $router->add('{posts}', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
// $router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('one/two/{three}');
$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}');
$router->add('admin/{action}/{controller}/{more}');
$router->add('products/{idproduct}/user/{id}');
$router->add('users/{uuiduser:[\w-]+}/posts/{idpost:\d+}');

/**
 * TO PLACE IN THE PARAMETERS.
 * 
 *  \d+     => match with ONE or more digits from 0 to 9
 *  \w+     => match with ONE or more characters a - z | A - Z | 0 - 9
 *  [\w-]+  => match with ONE or more characters a - z | A - Z | 0 - 9 AND '-' (hyphen)
 *  \s+     => match with ONE or more blank spaces (do not use to params, just curiosity)
 */


echo '<pre>';
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo '</pre>';

$url = $_SERVER['QUERY_STRING'];
echo '<pre>';
var_dump($url);
echo '</pre>';

if ($router->pairing($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo 'No route found for URL '. $url;
}