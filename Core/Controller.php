<?php 

namespace Core;

/**
 * Base Controller
 * 
 * PHP version 8.1.6
 */
abstract class Controller
{

    /**
     * Parameters from the matched route
     *
     * @var array
     */
    protected $route_params = [];

    /**
     * Class Constructor
     *
     * @param array $route_params Parameters from the route.
     * 
     * @return void
     */
    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

    /**
     * Magic method called when a non-existent or inaccessible method is
     * called on an object of this class. Used to execute before and after
     * filter methods on action methods. Action methods need to be named
     * with an "Action" suffix, e.g. indexAction, showAction etc.
     * 
     * $this variable will have the value of the current child class 
     * instantiated. and the value of the $name parameter will be the 
     * current method we are trying to access.
     *
     * @param string $name  Method name
     * @param array $args Arguments passed to the method
     *
     * @return void
     */
    public function __call($name, $arguments)
    {
        $method = $name . 'Action';

        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $arguments);
                $this->after();
            }
        } else {
            throw new \Exception("Method $method not found in Controller ". get_class($this));
        }
    }

    //Action filters, before and after.

    /**
     * Before filter - called before an action method.
     *
     * @return void
     */
    protected function before()
    {
    }

    /**
     * After filter - called after an action method
     *
     * @return void
     */
    protected function after()
    {
    }

}