<?php 
/**
 * Front Controller
 * 
 * PHP version 8.1.6
 */

/**
 * Composer Autoloader
 */
require '../vendor/autoload.php';
 
/**
 * Autoloader.
 */
 spl_autoload_register(function ($class) {
    $root = dirname(__DIR__); // Get the parent directory
    $file = str_replace('\\', '/', $root) . '/' . str_replace('\\', '/', $class) . '.php'; // We replace all the '\' with '/'

    if (is_readable($file)) {
        require $file;
    }
 });

/**
 * Routing
 */
$router = new Core\Router();


// Add the routes

/**
 * OPTIONS TO DEFINE THE PARAMETERS.
 * 
 *  \d+     => match with ONE or more digits from 0 to 9
 *  \w+     => match with ONE or more characters a - z | A - Z | 0 - 9
 *  [\w-]+  => match with ONE or more characters a - z | A - Z | 0 - 9 AND '-' (hyphen)
 *  \s+     => match with ONE or more blank spaces (do not use to params, just curiosity)
 * 
 * /======================================================================================\ 
 * RULES TO NAMING CONTROLLERS AND METHODS IN THE ROUTES
 *  
 *  CONTROLLERS
 *  - Controller names follow the StudlyCase standard. e.g. PostsController. So you should name them like that.
 *  - You must name controllers in the route like posts-controller
 *  e.g. posts-controllers => PostsController
 *  
 *  METHODS
 *  - methods names follow the camelCase standard. e.g. addNew. So you should name them like that.
 *  - You must name methods in the route like add-new
 *  e.g. add-new => addNew
 */
$router->add('', ['controller' => 'HomeController', 'method' => 'index']);
$router->add('{controller}/{method}');
$router->add('{controller}/{id:\d+}/{method}');
$router->add('admin/{controller}/{method}', ['namespace' => 'Admin']);


$router->dispatch($_SERVER['QUERY_STRING']);