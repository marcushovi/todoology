<?php

require_once __DIR__ . '/_utilities/_config.php';

$routes = [
    '/' => [
        'GET' => 'home.php',
    ],
    '/login' => [
        'GET' => 'log_in.php',
    ],
    '/signup' => [
        'GET' => 'register.php',
    ]
];

$routes_with_second_segment = [ "login.php", "lists_get.php" ];

$page = segment( 1 );
$method = $_SERVER[ 'REQUEST_METHOD' ];


if ( !isset( $routes[ "/$page" ][ $method ] ) || ( segment( 2 ) && !in_array( $routes[ "/$page" ][ $method ], $routes_with_second_segment ) ) ) {
    show_404();
}

require_once $routes[ "/$page" ][ $method ];
?>