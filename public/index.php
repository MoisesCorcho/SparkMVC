<?php 
/**
 * Front Controller
 * 
 * PHP version 8.1.6
 */

/**
 * Composer Autoloader
 * 
 * composer autoloader will autoload all the third-party packages 
 * that we install and all the packages that we will create 
 * (we have to specify the latter in composer.json). e.g.
 * 
 * "autoload": {
 *   "psr-4": {
 *      "Core\\": "Core/",
 *       "App\\": "App/"
 *   }
 * }
 * 
 * "Core\\" is the namespace.
 * "Core/"  is the folder name.
 * 
 * ---------------------------------------------------------------
 * MODIFY THE AUTOLOAD PSR-4 FUNCTION IN composer.json
 * ---------------------------------------------------------------
 * 
 * You have to run the "composer dump-autoload" command 
 * every time you want to add a new path to the composer.json file 
 * inside autoload => psr-4
 */
require '../vendor/autoload.php';


/**
 * Routing
 */
$router = new Core\Router();


// Add the routes
/**
 * --------------------------------------------------------------
 * OPTIONS TO DEFINE THE PARAMETERS.
 * --------------------------------------------------------------
 * 
 *  \d+     => match with ONE or more digits from 0 to 9
 *  \w+     => match with ONE or more characters 
 *           => a - z | A - Z | 0 - 9
 *  [\w-]+  => match with ONE or more characters 
 *           => a - z | A - Z | 0 - 9 AND '-' (hyphen)
 * 
 * --------------------------------------------------------------
 * RULES TO NAMING CONTROLLERS AND METHODS IN THE ROUTES
 * -------------------------------------------------------------- 
 * 
 *  CONTROLLERS
 *  - Controller names follow the StudlyCase standard. e.g. 
 *    PostsController. So you should name them like that.
 *  - You must name controllers in the route like posts-controller
 *  e.g. posts-controllers => PostsController
 *  
 *  METHODS
 *  - methods names follow the camelCase standard. e.g. addNew. 
 *    So you should name them like that.
 *  - You must name methods in the route like add-new
 *  e.g. add-new => addNew
 */
$router->add('', ['controller' => 'HomeController', 'method' => 'index']);
$router->add('{controller}/{method}');
$router->add('{controller}/{id:\d+}/{method}');
$router->add('admin/{controller}/{method}', ['namespace' => 'Admin']);


$router->dispatch($_SERVER['QUERY_STRING']);