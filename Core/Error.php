<?php

namespace Core;

use App\Config\Config;
use Core\View;

/**
 * Error and exception handler.
 * 
 * PHP version 8.1.6
 */
class Error
{

    /**
     * Error handler. Convert all error to Exceptions by throwing an ErrorException.
     *
     * @param int $level Error level (severity)
     * @param string $message Error message
     * @param string $file Filename the error was raised in
     * @param int $line Line number in the file
     * 
     * @return void
     */
    public static function errorHandler($level, $message, $file, $line)
    {
        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }
    

    /**
     * Exception handler.
     * 
     * if Config::SHOW_ERRORS constant is true errors are displayed; 
     * otherwise, we set error messages to a $variable and pass them 
     * to a log file in the logs path.
     *
     * @param Exception $exception The exception
     * 
     * @return void
     */
    public static function exceptionHandler($exception)
    {
        // Code is 404 (not found) or 500 (general error)
        $code = $exception->getCode();
        if ($code != 404) {
            $code = 500;
        }
        http_response_code($code);
        
        if (Config::SHOW_ERRORS) {
            echo "<h1>Fatal Error</h1>";
            echo "<p>Uncaught Exception: ". get_class($exception). "</p>";
            echo "<p>Message: ". $exception->getMessage() ."</p>";
            echo "<p>Stack trace:<pre> ".$exception->getTraceAsString() ."</pre></p>";
            echo "<p>Thrown in: <strong>". $exception->getFile() ."</strong> on line <strong>". $exception->getLine() ."</strong></p>";

        } else {

            // set the timezone
            date_default_timezone_set(Config::TIMEZONE);

            $log = dirname(__DIR__) . "./logs/" . date("Y-m-d") . ".txt";
            
            /**
             * ini_set sets the PHP error log file to be the file we 
             * calculated in the previous step ($log). This means that 
             * errors will be logged in that file instead of being 
             * displayed on the web page.
             */
            ini_set("error_log", $log);

            $message = " \nUncaught Exception: ". get_class($exception);
            $message .= " \nWith Message: ". $exception->getMessage();
            $message .= " \nStack trace:".$exception->getTraceAsString();
            $message .= " \nThrown in: ". $exception->getFile() ." on line ". $exception->getLine() . "\n";

            /**
             * The string $message is logged in the error log file configured
             * in ini_set. This allows detailed exception information to be
             * recorded in the log file for later analysis.
             */
            error_log($message);
            
            if ($code == 404) {
                View::renderBlade('Errors/404');
            } else {
                View::renderBlade('Errors/500');
            }
        }
    }
}