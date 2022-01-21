<?php

class Alert
{


    public function __construct()
    {

    }

    public function success( $message, $echo = TRUE )
    {
        if ( $echo )
            echo include_once $this->get_path( "success_status.php" );
        else
            return include_once $this->get_path( "success_status.php" );
    }

    public function get_path( $file )
    {
        $query = $_SERVER[ 'PHP_SELF' ];
        $path = pathinfo( $query );

        if ( strpos( $path[ 'dirname' ], "app" ) )
            return "../_partials/alert/" . $file;
        else
            return "_partials/alert/" . $file;

    }

    public function error( $message, $echo = TRUE )
    {
        if ( $echo )
            echo include_once $this->get_path( "error_status.php" );
        else
            return include_once $this->get_path( "error_status.php" );
    }
}