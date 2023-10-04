<?php

namespace Core;

use Jenssegers\Blade\Blade as BladeEngine;

/**
 * View
 * 
 * PHP version 8.1.6
 */
class View
{
    /**
     * Instance of Blade Template Engine
     *
     * @var Blade
     */
    protected static $blade;


    public static function initBlade()
    {
        if ( !isset(self::$blade) ) {
            $viewsPath = '../resources/views';
            $cachePath = '../public/cache';
            self::$blade = new BladeEngine($viewsPath, $cachePath);
        }
    }

    public static function renderBlade($view, $args = [])
    {
        self::initBlade();

        echo self::$blade->render($view, $args);
    }

    /**
     * Render a view file 
     *
     * @param string $view the view file.
     * @return void
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view.php"; // Relative to core directory

        if (is_readable($file)) {
            require_once $file; 
        } else {
            echo "$file not found";
        }
    }
}