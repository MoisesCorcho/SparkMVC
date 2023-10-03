<?php

namespace Core;

/**
 * View
 * 
 * PHP version 8.1.6
 */
class View
{
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