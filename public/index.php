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
 * Sets which PHP errors are reported.
 * "E_ALL" Report all PHP errors
 */
error_reporting(E_ALL);

/**
 * Sets a user-defined error handler function in the 
 * path Core\Error::errorHandler
 */
set_error_handler('Core\Error::errorHandler');

/**
 * Sets a user-defined exception handler function in 
 * the path Core\Error::exceptionHandler
 */
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new routes\Routes;

