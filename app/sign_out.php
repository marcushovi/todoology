<?php
include_once "../_utilities/_config.php";

session_start();

if ( $_SERVER[ "REQUEST_METHOD" ] != "GET" ) {
    die( include "../404.php" );
}
session_destroy();


redirect( "" );

die();

?>