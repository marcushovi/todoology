<?php

session_start();
// DATA FORM REQUEST
$request_data = json_decode( file_get_contents( "php://input" ) );

if ( $_SERVER[ "REQUEST_METHOD" ] != "DELETE" || $_SESSION[ 'ID' ] != $request_data->id_user ) {
    die( include "../404.php" );
}

require_once "../_utilities/Task.php";
$task = new Task();


$response_data = $task->delete_task( $request_data );


header( "Access-Control-Allow-Methods: DELETE" );
header( "Content-Type: application/json; charset=UTF-8" );

echo json_encode( $response_data );

die();
