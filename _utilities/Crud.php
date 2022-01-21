<?php
require_once __DIR__ . '/Database_config.php';

class Crud extends Database_config
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data( $query )
    {
        $result = $this->connection->query( $query );

        if ( $result == false ) {
            return false;
        }

        $rows = array();

        while ( $row = $result->fetch_assoc() ) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function execute( $query )
    {
        $result = $this->connection->query( $query );

        if ( $result == false ) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        }
    }

    public function delete( $id, $table )
    {
        $query = "DELETE FROM $table WHERE id = $id";

        $result = $this->connection->query( $query );

        if ( $result == false ) {
            echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
            return false;
        } else {
            return true;
        }
    }

}