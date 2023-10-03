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
        echo '(before)';
        // return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    public function after()
    {
        echo '(after)';
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        // echo 'Hello from the index action in the Home controller!';
        // echo '<p>Query string parameters: <pre>' .
        // htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
        View::render('Home/index');
    }

}
