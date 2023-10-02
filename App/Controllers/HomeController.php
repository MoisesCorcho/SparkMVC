<?php

namespace App\Controllers;

use Core\Controller;
/**
 * Home Controller
 * 
 * PHP version 8.1.6
 */
class HomeController extends Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
        echo 'Hello from the index action in the Home controller!';
        echo '<p>Query string parameters: <pre>' .
        htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
    }
}