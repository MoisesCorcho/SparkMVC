<?php

namespace Core;

use App\Config\Config;
use PDO;
use PDOException;

/**
 * PDO Database Class
 * 
 * This class is responsible for connecting to the database, creating prepared statements,
 * binding values to those statements, executing queries, and returning results.
 * 
 * PHP version 8.1.6
 */
class Database {

    /**
     * Database host
     *
     * @var string
     */
    private $host = Config::DB_HOST;

    /**
     * Database user
     *
     * @var string
     */
    private $user = Config::DB_USER;

    /**
     * Database password
     *
     * @var string
     */
    private $pass = config::DB_PASS;

    /**
     * Database name
     *
     * @var string
     */
    private $dbname = config::DB_NAME;

    /**
     * Database handler
     *
     * @var PDO
     */
    private $dbh;

    /**
     * Statement
     *
     * @var PDOStatement
     */
    private $stmt;

    /**
     * Error message
     *
     * @var string|null
     */
    private $error;

    /**
     * Constructor method to establish a database connection
     *
     * @return void
     */
    public function __construct()
    {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname ;
        $options = array(
            PDO::ATTR_PERSISTENT => True,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            if (!$this->dbh) {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            }
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Prepare a SQL query for execution
     *
     * @param string $sql The SQL query
     * @return void
     */
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * Bind values to a prepared statement
     *
     * @param string $param The parameter name to bind
     * @param mixed $value The value to bind
     * @param int $type The data type to bind (optional)
     * @return void
     */
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Execute the prepared statement
     *
     * @return bool True on success, False on failure
     */
    public function execute()
    {
        return $this->stmt->execute();
    }

    /**
     * Get the result set as an array of objects
     *
     * @return array An array of objects
     */
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get a single record as an object
     *
     * @return object An object representing a single record
     */
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Get the number of rows affected by the last statement
     *
     * @return int The number of rows affected
     */
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
