<?php


// show all errors
ini_set( 'display_startup_errors', 1 );
ini_set( 'display_errors', 1 );
error_reporting( -1 );


// constants & settings
const BASE_URL = 'http://localhost/todoology/';
define( "APP_PATH", realpath( __DIR__ . '/../' ) );

require_once __DIR__ . "/functions-general.php";
require_once __DIR__ . "/Crud.php";
require_once __DIR__ . "/Validation.php";
include_once __DIR__ . "/Alert.php";


$crud = new Crud();
$validation = new Validation();
$alert = new Alert();


session_start();

