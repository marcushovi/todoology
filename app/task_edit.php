<?php

if ( $_SERVER[ "REQUEST_METHOD" ] != "PATCH" ) {
    show_404();
}

require_once "../_utilities/Task.php";
$task = new Task();


$request_data = json_decode( file_get_contents( "php://input" ) );

$response_data = $task->edit_task( $request_data );


header( "Access-Control-Allow-Methods: POST" );
header( "Content-Type: application/json; charset=UTF-8" );

echo json_encode( $response_data );

