<?php

namespace App\Controllers\Admin;

use Core\Controller;

/**
 * User admin controller
 *
 * PHP version 8.1.6
 */
class UsersController extends Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        // Make sure an admin user is logged in for example
        // return false;
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        echo 'User admin index';
    }
}
