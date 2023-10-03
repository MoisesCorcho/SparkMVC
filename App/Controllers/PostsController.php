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
    public function indexAction()
    {
        echo 'Hello from the index action in the Posts controller!';
        echo '<p>Query string parameters: <pre>' .
             htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
    }

    public function addNewAction()
    {
        echo 'Hello from the addNew method in the PostController';
    }

    public function editAction()
    {
        echo 'Hello from the edit action in the Posts controller!';
        echo '<p>Query string parameters: <pre>' .
             htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}