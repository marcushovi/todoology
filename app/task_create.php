<?php
session_start();
// DATA FORM REQUEST
$request_data = json_decode( file_get_contents( "php://input" ) );

if ( $_SERVER[ "REQUEST_METHOD" ] != "POST" || $_SESSION['ID'] != $request_data->id_user) {
    die( include "../404.php" );
}

require_once "../_utilities/Task_List.php";
$list = new Task();

$request_data = json_decode( file_get_contents( "php://input" ) );

$response_data = $list->create_task( $request_data );


header( "Access-Control-Allow-Methods: POST" );
header( "Content-Type: application/json; charset=UTF-8" );

echo json_encode( $response_data );

die();