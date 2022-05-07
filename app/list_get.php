<?php
if ( $_SERVER[ "REQUEST_METHOD" ] != "POST" ) {
    die( include "../404.php" );
}

require_once "../_utilities/Task_List.php";
$_list = new Task_List();


// DATA FORM REQUEST
$request_data = json_decode( file_get_contents( "php://input" ) );


$list = $_list->get_list( $request_data );
$list_html = "";

if  (isset($list["ID"])) {

    $list_html .= '<div class="flex flex-col p-6">
<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <div class="relative p-4 pl-8  ' . $list[ "color" ] . ' ">
            <h2 class="text-2xl font-bold text-gray-200">
                <span id="list-title" >' . $list[ "title" ] . '</span>
                <span id="number-of-tasks" class="inline-block text-center text-lg font-bold text-slate-200 bg-gray-600 leading-[2rem] rounded-md shadow-md w-7 h-7 ml-4">' . count( $list[ 'tasks' ] ) . '</span>
            </h2>
            
            <div class="slide_list absolute right-24 top-0 mr-4 mt-4 pl-2 flex ">
                <button type="button"
                        class="rounded-md p-2 bg-slate-200 text-gray-300 shadow-md transition duration-200 ease focus:outline-none hover:ring-4 hover:ring-slate-500">
                    <span class="sr-only">Slide List</span>
                    <svg width="16" height="16" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="75" cy="75" r="20" fill="black" fill-opacity="0.5"/>
                        <circle cx="75" cy="20" r="20" fill="black" fill-opacity="0.5"/>
                        <circle cx="75" cy="130" r="20" fill="black" fill-opacity="0.5"/>
                    </svg>

                </button>
            </div>
            <div class="edit_list absolute right-12 top-0 mr-4 mt-4 pl-2 flex ">
                <button type="button"
                        class="rounded-md p-2 bg-slate-200 text-gray-300 shadow-md transition duration-200 ease focus:outline-none hover:ring-4 hover:ring-blue-500">
                    <span class="sr-only">Edit List</span>
                    <svg width="16" height="16" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                        <rect x="56.1655" y="110.846" width="23.0331" height="127.165" rx="11.5165"
                            transform="rotate(-135 56.1655 110.846)" fill="#0040FF" fill-opacity="0.5" stroke="white"
                            stroke-width="6"/>
                        <path d="M15.4134 131.025L23.4344 101.09C24.1317 98.4879 27.3848 97.6163 29.29 99.5214L51.2038 121.435C53.109 123.34 52.2373 126.594 49.6348 127.291L19.7 135.312C17.0975 136.009 14.716 133.628 15.4134 131.025Z"
                            fill="#0040FF" fill-opacity="0.5" stroke="white" stroke-width="6"/>
                        </g>
                        <defs>
                        <clipPath id="clip0">
                            <rect width="150" height="150" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>

                </button>
            </div>
            <div class="delete_list absolute right-0 top-0 mr-4 mt-4 pl-2 flex ">
                <button type="button"
                        class="rounded-md p-2 bg-slate-200 text-gray-300 shadow-md transition duration-200 ease focus:outline-none hover:ring-4 hover:ring-red-500">
                    <span class="sr-only">Delete List</span>
                        <svg width="16" height="16" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="28.5715" y="12.1213" width="154.584" height="23.264" rx="11.632" transform="rotate(45 28.5715 12.1213)"
                                fill="#FF0000" fill-opacity="0.5"/>
                            <rect x="28.5715" y="12.1213" width="154.584" height="23.264" rx="11.632" transform="rotate(45 28.5715 12.1213)"
                                stroke="white" stroke-width="6"/>
                            <rect x="12.1213" y="121.429" width="154.584" height="23.264" rx="11.632" transform="rotate(-45 12.1213 121.429)"
                                 fill="#FF0000" fill-opacity="0.5"/>
                            <rect x="12.1213" y="121.429" width="154.584" height="23.264" rx="11.632" transform="rotate(-45 12.1213 121.429)"
                                stroke="white" stroke-width="6"/>
                        </svg>
                </button>
            </div>
        </div>';

    if ( !empty( $list[ 'tasks' ] ) ) {
        $list_html .= '<table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-fit">
                    Title
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-fit">
                    Description
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-fit">
                    Priority
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-fit">
                    Deadline
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-fit">
                    Complete
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">';

        foreach ( $list[ 'tasks' ] as &$task ) {

            if ( $task[ 'is_complete' ] == 1 ) $task[ 'is_complete' ] = 'checked';
            else $task[ 'is_complete' ] = '';

            $list_html .= '            
            <tr>
               <input type="hidden" name="id_task" value="' . $task[ 'ID' ] . '" >
              <td class="task_title px-6 py-4 whitespace-nowrap text-lg max-w-lg overflow-hidden">
                    ' . $task[ 'title' ] . '
              </td>
              <td class="task_description px-6 py-4 whitespace-nowrap text-gray-500 max-w-lg overflow-hidden">
                ' . $task[ 'description' ] . '
              </td>
              <td class="px-6 py-4 whitespace-nowrap w-fit">
                <span class="w-6 h-6 px-2 inline-flex text-xs leading-5 font-semibold rounded-full shadow-md ' . $task[ 'priority' ] . ' text-gray-800">
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                ' . $task[ 'deadline' ] . '
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <input ' . $task[ 'is_complete' ] . ' type="checkbox" class="complete_task block w-5 h-5 px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-green-200 rounded-lg shadow-md focus:outline-none focus:ring-4 focus:ring-green-500 ">
                
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium w-fit">
                <div class="edit_task flex ">
                    <button type="button"
                            class="rounded-md p-2 bg-slate-200 text-gray-300 shadow-md transition duration-200 ease focus:outline-none hover:ring-4 hover:ring-blue-500">
                    <span class="sr-only">Edit Task</span>
                    <svg width="24" height="24" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                        <rect x="56.1655" y="110.846" width="23.0331" height="127.165" rx="11.5165"
                            transform="rotate(-135 56.1655 110.846)" fill="#0040FF" fill-opacity="0.5" stroke="white"
                            stroke-width="6"/>
                        <path d="M15.4134 131.025L23.4344 101.09C24.1317 98.4879 27.3848 97.6163 29.29 99.5214L51.2038 121.435C53.109 123.34 52.2373 126.594 49.6348 127.291L19.7 135.312C17.0975 136.009 14.716 133.628 15.4134 131.025Z"
                            fill="#0040FF" fill-opacity="0.5" stroke="white" stroke-width="6"/>
                        </g>
                        <defs>
                        <clipPath id="clip0">
                            <rect width="150" height="150" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                </button>
            </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium w-fit">
                <div class="delete_task flex ">
                    <button type="button"
                            class="rounded-md p-2 bg-slate-200 text-gray-300 shadow-md transition duration-200 ease focus:outline-none hover:ring-4 hover:ring-red-500">
                        <span class="sr-only">Delete Task</span>
                        <svg width="24" height="24" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="28.5715" y="12.1213" width="154.584" height="23.264" rx="11.632" transform="rotate(45 28.5715 12.1213)"
                                fill="#FF0000" fill-opacity="0.5"/>
                            <rect x="28.5715" y="12.1213" width="154.584" height="23.264" rx="11.632" transform="rotate(45 28.5715 12.1213)"
                                stroke="white" stroke-width="6"/>
                            <rect x="12.1213" y="121.429" width="154.584" height="23.264" rx="11.632" transform="rotate(-45 12.1213 121.429)"
                                 fill="#FF0000" fill-opacity="0.5"/>
                            <rect x="12.1213" y="121.429" width="154.584" height="23.264" rx="11.632" transform="rotate(-45 12.1213 121.429)"
                                stroke="white" stroke-width="6"/>
                        </svg>
                    </button>
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
        $list_html .= '<div class="flex flex-col p-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div class="p-4 pl-8  bg-white ">
                                    <h2 class="text-2xl font-bold text-gray-900">
                                       No Tasks.
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


echo json_encode( $response_data );

