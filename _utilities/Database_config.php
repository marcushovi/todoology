<?php

class Database_config
{
    protected $connection;
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '';
    private $_database = 'todo';

    public function __construct()
    {
        if ( !isset( $this->connection ) ) {

            try {
                $this->connection = new mysqli( $this->_host, $this->_username, $this->_password, $this->_database );
                if ( !$this->connection ) {
                    die( include "500.php" );
                }
            } catch ( mysqli_sql_exception $e ) {
                die( include "500.php" );
            }

        }

        return $this->connection;
    }

    public function escape_string( $value )
    {
        return $this->connection->real_escape_string( trim( $value ) );
    }
}