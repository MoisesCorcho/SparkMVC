<?php

namespace routes;

use App\Facades\RouterFacade as Router;

/**
 * Project Routes
 * 
 * PHP version 8.1.6
 */
class Routes 
{

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

    /**
     * Constructor initialize the routes
     */
    public function __construct()
    {
        Router::add('', ['controller' => 'HomeController', 'method' => 'index']);
        Router::add('{controller}/{method}');
        Router::add('{controller}/{method}/{id:\d+}');

        Router::dispatch();
    }

}