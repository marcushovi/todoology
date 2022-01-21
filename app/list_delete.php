<?php

if ( $_SERVER[ "REQUEST_METHOD" ] != "DELETE" ) {
    die( include "../404.php" );
}

require_once "../_utilities/Task_List.php";
$list = new Task_List();


$request_data = json_decode( file_get_contents( "php://input" ) );

$response_data = $list->delete_list( $request_data );


header( "Access-Control-Allow-Methods: DELETE" );
header( "Content-Type: application/json; charset=UTF-8" );

echo json_encode( $response_data );
