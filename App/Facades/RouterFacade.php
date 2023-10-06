<?php

namespace App\Facades;

use Core\Router;

/**
 * Router Facade
 * 
 * PHP version 
 */
class RouterFacade
{

    /**
     * Router instance
     *
     * @var Router
     */
    protected static $instance;

    /**
     * initialize the Router class
     *
     * @return void
     */
    public static function init()
    {
        if ( !self::$instance ) {
            self::$instance = new Router();
        }
    }

    /**
     * Call the Dispath method into Router Class
     * which Add a route to the routing table
     *
     * @param string $route
     * @param array $params
     * @return void
     */
    public static function add($route, $params = [])
    {
        self::init();
        self::$instance->add($route, $params);
    }

    /**
     * Call the Dispath method into Router Class
     * Which Dispatch the route, creating the controller
     * object and running the action method
     *
     * @param string $url The route URL
     * @return void
     */
    public static function dispatch()
    {
        self::$instance->dispatch($_SERVER['QUERY_STRING']);
    }

}