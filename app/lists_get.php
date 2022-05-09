<?php
session_start();
// DATA FORM REQUEST
$request_data = json_decode( file_get_contents( "php://input" ) );

if ( $_SERVER[ "REQUEST_METHOD" ] != "POST" || $_SESSION['ID'] != $request_data->id_user) {
    die( include "../404.php" );
}

require_once "../_utilities/Task_List.php";
$_list = new Task_List();

$lists = $_list->get_lists( $request_data );
$lists_html = "";


if ( $lists ) {

    $lists_html .= '<h2 class="text-white text-2xl font-bold tracking-wider text-left ml-4">Lists</h2>';


    foreach ( $lists as &$list ) {



        $lists_html .= '<li id="list-' . $list[ "ID" ] . '" class="list" >
                        <input type="hidden" name="id_list" value="' . $list[ "ID" ] . '">
                        <button onclick="window.reload_list(' . $list[ "ID" ] . ').then( r => {
//                        window.reloadJS();
                    } );" class="w-full text-left flex items-center p-4 text-base text-white rounded-lg font-medium border-2 border-transparent transition-colors  hover:border-' . substr($list[ "color" ], 3) . ' focus:border-' . substr($list[ "color" ], 3) . '">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="text-' . substr($list[ "color" ], 3) . '" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap" id="list-title">' . $list[ "title" ] . '</span>
                            <span class="list-task-number inline-flex justify-center items-center px-3 p-3 h-7 w-7 text-lg font-bold text-gray-800 ' . $list[ "color" ] . ' rounded-full">' . $list[ "number_of_tasks" ] . '</span>
                    </li>';
    }

    $lists_html .= '<li class="pt-6 mt-6 space-y-2 border-t-2 border-gray-400">
                        <button type="button" onclick="window.list_add( \''. $_SESSION['ID'] . '\',\'' . $list[ "ID" ]  .'\' )" class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                        
                                                <span class="flex-1 whitespace-nowrap tracking-wider  w-full p-3 text-lg font-bold weight-md relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0" id="list-title">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="inline-block mr-3" viewBox="0 0 16 16">
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>Add List</span>
                </buttton></li>
                <li class="pt-6 mt-6 ">
                        <button type="button" onclick="window.task_add()" class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                        
                                                <span class="flex-1 whitespace-nowrap tracking-wider  w-full p-3 text-lg font-bold weight-md relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0" id="list-title">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="inline-block mr-3" viewBox="0 0 16 16">
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>Add Task</span>
                </buttton></li>';
}

function response( $success, $status, $message, $extra = [] )
{
    return array_merge( [
        'success' => $success,
        'status' => $status,
        'message' => $message
    ], $extra );
}

$response_data = response( 1, 201, "Lists reloaded", array( "data" => $lists_html ) );

header( "Access-Control-Allow-Methods: POST" );
//header( "Content-Type: application/json; charset=UTF-8" );

echo json_encode( $response_data );

die();