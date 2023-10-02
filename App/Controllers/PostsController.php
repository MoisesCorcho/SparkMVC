<?php 

namespace App\Controllers;

use Core\Controller;

/**
 * Posts Controller
 * 
 * PHP version 8.1.6
 */
class PostsController extends Controller
{
    public function index()
    {
        echo 'Hello from the index action in the Posts controller!';
        echo '<p>Query string parameters: <pre>' .
             htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
    }

    public function addNew()
    {
        echo 'Hello from the addNew method in the PostController';
    }

    public function edit()
    {
        echo 'Hello from the edit action in the Posts controller!';
        echo '<p>Query string parameters: <pre>' .
             htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}