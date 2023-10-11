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
    public function index()
    {
        $postObj = new Post();
        $posts = $postObj->getPosts();

        View::renderBlade('Posts/index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $postObj = new Post();
        $post = $postObj->getPost($id);

        View::renderBlade('Posts/show', ['post' => $post]);
    }
}