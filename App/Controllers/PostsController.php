<?php 

namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Models\Post;

/**
 * Posts Controller
 * 
 * PHP version 8.1.6
 */
class PostsController extends Controller
{
    public function indexAction()
    {
        $postObj = new Post();
        $posts = $postObj->getPosts();

        View::renderBlade('Posts/index', ['posts' => $posts]);
    }

    public function addNewAction()
    {
        echo 'Hello from the addNew method in the PostController';
    }

    public function editAction()
    {
        View::renderBlade('Posts/edit', ['name' => 'John Doe']);
    }

    public function show($id)
    {
        $postObj = new Post();
        $post = $postObj->getPost($id);

        View::renderBlade('Posts/show', ['post' => $post]);
    }
}