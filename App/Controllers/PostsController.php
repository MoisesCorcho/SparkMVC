<?php 

namespace App\Controllers;

/**
 * Posts Controller
 * 
 * PHP version 8.1.6
 */

class PostsController
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
}