<?php
session_start();
// DATA FORM REQUEST
$request_data = json_decode( file_get_contents( "php://input" ) );

if ( $_SERVER[ "REQUEST_METHOD" ] != "POST" || $_SESSION[ 'ID' ] != $request_data->id_user ) {
    die( include "../404.php" );
}

require_once "../_utilities/Task_List.php";
$_list = new Task_List();


$list = $_list->get_list( $request_data );
$list_html = "";

if ( isset( $list[ "ID" ] ) ) {


    $list[ "disabled" ][ 0 ] = intval( $list[ "ID" ] ) < 0 ? "disabled" : "";
    $list[ "disabled" ][ 1 ] = intval( $list[ "ID" ] ) < 0 ? "cursor-not-allowed" : "";


    $list[ "delete_call" ] = $_SESSION[ 'ID' ] . ', ' . $list[ "ID" ] . ', ' . $list[ "title" ];

    $list_html .= '<div class="flex flex-col ">
<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow-lg overflow-hidden sm:rounded-lg">
        <input type="hidden" name="id_showed_list" value="' . $list[ "ID" ] . '">
            <div class="flex items-nowrap items-center justify-between p-4 pl-8 rounded-t-xl border-dashed border-4 border-' . substr( $list[ "color" ], 3 ) . ' ">
            
                <h2 class="text-3xl font-bold text-' . substr( $list[ "color" ], 3 ) . '">
                    <span id="list-title" >' . $list[ "title" ] . '</span>
                </h2>';

    if ( $list[ 'ID' ] >= 0 ) {
        $list_html .= '                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="inline-flex items-center justify-center p-0.5 m-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group ' . $list[ "color" ] . ' group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span class="flex-1 whitespace-nowrap w-full text-lg font-bold weight-md relative px-2 py-1.5 transition-all ease-in duration-75 bg-gray-800 bg-opacity-75  rounded-md group-hover:bg-opacity-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        </svg>
                    </span>
                </button>
            <!-- Dropdown menu -->
                <div id="dropdownNavbar" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow-lg border-2 border-' . substr( $list[ "color" ], 3 ) . ' w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                        <li>
                            <button onclick="window.list_edit( \'' . $_SESSION[ 'ID' ] . '\',\'' . $list[ "ID" ] . '\',\'' . $list[ "title" ] . '\',\'' . $list[ "color" ] . '\' )" class="edit_list flex justify-evenly items-center w-full block px-4 py-4 hover:bg-gray-600 hover:text-white  ' . $list[ "disabled" ][ 1 ] . '" ' . $list[ "disabled" ][ 0 ] . '>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                            </svg>
                            Edit   
                            </button>
                        </li>
                    </ul>
                    <div class="py-1">
                        <button onclick="window.list_delete( \'' . $_SESSION[ 'ID' ] . '\',\'' . $list[ "ID" ] . '\',\'' . $list[ "title" ] . '\' )" class="delete_list flex justify-evenly items-center w-full block px-4 py-2 text-red-400 hover:bg-gray-600  ' . $list[ "disabled" ][ 1 ] . '" ' . $list[ "disabled" ][ 0 ] . ' >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        Delete
                        </button>
                    </div>
                </div>';
    }

    $list_html .= '</div>';

    if ( !empty( $list[ 'tasks' ] ) ) {
        $list_html .= '<table class="min-w-full mt-1  mb-44 md:mb-0  transition-all" id="list-' . $list[ "ID" ] . '-table">
            <thead class="bg-gray-700 text-gray-400 transition-all">
            <tr>
                <th scope="col"
                    class="p-2 md:px-6 md:py-3 text-left text-xs font-medium uppercase tracking-wider w-fit">
                    Complete
                </th>
                <th scope="col"
                    class="p-2 md:px-6 md:py-3 text-left text-xs font-medium uppercase tracking-wider w-fit">
                    Title
                </th>
                <th scope="col"
                    class="p-2 md:px-6 md:py-3 text-left text-xs font-medium uppercase tracking-wider w-fit">
                    Priority
                </th>
                <th scope="col"
                    class="p-2 md:px-6 md:py-3 text-left text-xs font-medium uppercase tracking-wider w-fit">
                    Deadline
                </th>
                <th scope="col"
                    class="p-2 md:px-6 md:py-3 text-left text-xs font-medium uppercase tracking-wider w-fit hidden md:block">
                    Description
                </th>
                <th scope="col" class="relative p-2 md:px-6 md:py-3">
                    <span class="sr-only">Functions</span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-gray-900 text-gray-200 border-1 border-t border-gray-500 transition-all">';

        foreach ( $list[ 'tasks' ] as &$task ) {

            if ( $task[ 'is_complete' ] == 1 ) $task[ 'is_complete_checkbox' ] = 'checked';
            else $task[ 'is_complete_checkbox' ] = '';


            if ( $task[ 'is_complete' ] == 1 ) $task[ 'is_complete_confetti' ] = '';
            else $task[ 'is_complete_confetti' ] = 'window.confetti();';

            $list_html .= '            
            <tr>
               <input type="hidden" name="id_task" value="' . $task[ 'ID' ] . '" >
               <td class=" md:px-6 md:py-4  text-xs md:text-m">
                <input ' . $task[ 'is_complete_checkbox' ] . ' onclick="' . $task[ 'is_complete_confetti' ] . ' window.task_complete(\'' . $task[ 'ID' ] . '\', \'' . $_SESSION[ "ID" ] . '\', \'' . $task[ 'is_complete' ] . '\' )" type="checkbox" class="complete_task mx-auto block w-5 h-5 px-2 py-2 md:px-4 md:py-4 mt-2 text-green-600 rounded bg-gray-700 focus:ring-green-500 focus:ring-2 border-gray-600 border-2 hover:border-green-500">
                
              </td>
              <td class="task_title md:px-6 md:py-4 text-xs md:text-lg max-w-xs overflow-hidden">
                    ' . $task[ 'title' ] . '
              </td>
              <td class="md:px-6 md:py-4  w-fit">
                <span class="w-6 h-6 px-2  inline-flex text-xs leading-5 font-semibold rounded-full shadow-md ' . $task[ 'priority' ] . ' text-gray-800">
                </span>
              </td>
              <td class="md:px-6 md:py-4  text-xs md:text-sm">
                ' . $task[ 'deadline' ] . '
              </td>
              <td class="task_description px-6 py-4 max-w-xs overflow-hidden hidden md:block">
                ' . $task[ 'description' ] . '
              </td>
              <td class="md:px-6 md:py-4  text-right text-xs md:text-m font-medium w-fit">
                <div class="flex ">
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar-' . $task[ 'ID' ] . '" class="inline-flex items-center justify-center p-0.5 m-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group ' . $list[ "color" ] . ' group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span class="flex-1 whitespace-nowrap w-full text-lg font-bold weight-md relative px-2 py-1.5 transition-all ease-in duration-75 bg-gray-800 bg-opacity-75  rounded-md group-hover:bg-opacity-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        </svg>
                    </span>
                </button>
            <!-- Dropdown menu -->
                <div id="dropdownNavbar-' . $task[ 'ID' ] . '" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow-lg border-2 border-gray-400 w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                        <li>
                            <button onclick="window.task_edit( \'' . $task[ "ID" ] . '\',\'' . $_SESSION[ 'ID' ] . '\',\'' . $task[ 'title' ] . '\',\'' . $task[ 'description' ] . '\',\'' . $task[ 'deadline' ] . '\',\'' . $task[ 'priority' ] . '\',\'' . $list[ 'ID' ] . '\' )"  class="edit_task flex justify-evenly items-center w-full block px-4 py-4 hover:bg-gray-600 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                            </svg>
                            Edit   
                            </button>
                        </li>
                    </ul>
                    <div class="py-1">
                        <button onclick="window.task_delete( \'' . $task[ "ID" ] . '\',\'' . $_SESSION[ 'ID' ] . '\',\'' . $task[ 'title' ] . '\' )" class="delete_task flex justify-evenly items-center w-full block px-4 py-2 text-red-400 hover:bg-gray-600" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        Delete
                        </button>
                    </div>
                </div>
                </div>
              </td>
            </tr>';
        }


        $list_html .= '
            </tbody>
        </table>
    </div>
</div>
</div>
</div>';


    } else {
        $list_html .= '<div class="flex flex-col mt-1 p-6 shadow-lg bg-gray-700" id="list-' . $list[ "ID" ] . '-table">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="rounded-lg">
                                <div class="p-4 pl-8  ">
                                    <h2 class="text-2xl font-bold text-gray-200">
                                       No Tasks yet.
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
</div>
</div>
</div>';

    }
}
function response( $success, $status, $message, $extra = [] )
{
    return array_merge( [
        'success' => $success,
        'status' => $status,
        'message' => $message
    ], $extra );
}

$response_data = response( 1, 201, "Lists reloaded", array( "data" => $list_html ) );

header( "Access-Control-Allow-Methods: POST" );
//header( "Content-Type: application/json; charset=UTF-8" );

echo json_encode( $response_data );

die();