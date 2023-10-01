<?php

namespace Core;

/**
 * Router
 * 
 * PHP version 8.1.6
 */
class Router 
{

    /**
     * Associative array of routes (the routing table)
     *
     * @var array
     */
    protected $routes = [];

    /**
     * Parameter from the matched route
     *
     * @var array
     */
    protected $params = [];

    /**
     * Add a route to the routing table
     *
     * @param string $route
     * @param array $params
     * 
     * @return void
     */
    public function add($route, $params = [])
    {
        // Convert the route to a regular expression: escape forward slashes e.g. '/' => '\/'
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables beetwen curly braces '{}' e.g. {controller} => (?P<controller>[a-z-]+)
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // Convert variables with a custom regular expressions e.g. {iduser:\d+} => (?P<iduser>\d+)
        /**
         * ([^\}]+) this part is used to escape the } character and then deny it with ^ which 
         * means it will search for all characters that are not a } but keeping in mind
         * it will depend on which regular expresion we put in the parameter when we add the route in index.php {id:\d+}
         * e.g. => $router->add('users/{iduser:\w+}/products/{idprod:\d+}');
         * 
         * \d+ => match with ONE or more digits from 0 to 9 | 0 - 9
         * \w+ => match with ONE or more characters a - z | A - Z | 0 - 9
         */
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // Add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    /**
     * Get all the routes from the routing table
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Match the route to the routes in the routing table, setting the $params
     * property if a route is found
     *
     * @param string $url
     * @return boolean true if a match found, false otherwise
     */
    public function pairing($url)
    {        
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                
                $this->params = $params;
                return true;
            }
        }
        
        return false;
    }


    /**
     * Get the currently matched parameters
     *
     * @return array
     */
    public function getParams()
    {   
        return $this->params;
    }


    /**
     * Dispatch the route, creating the controller object and running the
     * action method
     *
     * @param string $url The route URL
     * @return void
     */
    public function dispatch($url)
    {
        if ($this->pairing($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            // var_dump($controller);
            $controller = "App\Controllers\\$controller";
            

            if (class_exists($controller)) {
                $controller_object = new $controller();

                $method = $this->params['method'];
                $method = $this->convertToCamelCase($method);

                if (is_callable([$controller_object, $method])) {
                    $controller_object->$method();
                } else {
                    echo "Method $method (in controller $controller) not found.";
                }
            } else {
                echo "Controller class $controller not found.";
            }
        } else {
            echo 'No route matched.';
        }
    }

    /**
     * Convert a string separate by - to StudyCaps
     * e.g. post-authors => PostAuthors
     *
     * @param string $string The string to convert
     * @return string
     */
    public function convertToStudlyCaps($string)
    {
        return str_replace('-', '', ucwords($string, '-'));
    }

    /**
     * Convert a string separate by - to camelCase
     * e.g. add-new => addNew
     *
     * @param string $string
     * @return string
     */
    public function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }
    
}