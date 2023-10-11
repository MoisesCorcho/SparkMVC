<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;
/**
 * Home Controller
 * 
 * PHP version 8.1.6
 */
class HomeController extends Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    public function before()
    {
        // echo '(before)';
        // return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    public function after()
    {
        // echo '(after)';
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderBlade('Home/welcome');
    }

}
