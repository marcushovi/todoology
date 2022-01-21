<?php

// import connection to server, classes, and start SESSION 
require_once "../_utilities/_config.php";

// if user is sign out redirect him to sign in page
if ( !isset( $_SESSION[ "ID" ] ) ) {
    header( "Location: ../log_in.php" );
}

// import header
include_once "../app/_partials/header_app.php"
?>

    <header class="bg-white shadow ">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-600">
                Remaining Tasks: <span id="number-of-tasks"
                                       class="inline-block text-center text-3xl font-bold text-white bg-gray-700 leading-[2.5rem] rounded-md shadow-md w-10 h-10 ml-4">0</span>
            </h1>
            <div>
                <button id="add_task"
                        class="p-3 text-lg font-medium weight-md font-bold text-gray-700 transition duration-200 bg-white ring-gray-700 ring-4 rounded-lg hover:bg-gray-700 hover:text-white ease">

                    <!--                    <svg class="inline-block mb-1 mr-2" width="24" height="24" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                        <rect x="1.53408" y="63.8963" width="146.964" height="21.994" rx="10.997"-->
                    <!--                              transform="rotate(0.0831261 1.53408 63.8963)" fill="white" fill-opacity="0.5"/>-->
                    <!--                        <rect x="1.53408" y="63.8963" width="146.964" height="21.994" rx="10.997"-->
                    <!--                              transform="rotate(0.0831261 1.53408 63.8963)" stroke="white" stroke-width="6"/>-->
                    <!--                        <rect x="63.8965" y="148.466" width="146.964" height="21.994" rx="10.997"-->
                    <!--                              transform="rotate(-89.9169 63.8965 148.466)" fill="white" fill-opacity="0.5"/>-->
                    <!--                        <rect x="63.8965" y="148.466" width="146.964" height="21.994" rx="10.997"-->
                    <!--                              transform="rotate(-89.9169 63.8965 148.466)" stroke="white" stroke-width="6"/>-->
                    <!--                    </svg>-->
                    New Task
                </button>
                <buttton id="add_list"
                         class="ml-6 p-3 text-lg font-medium weight-md font-bold text-gray-700 transition duration-200 bg-white ring-gray-700 ring-4 rounded-lg hover:bg-gray-700 hover:text-white ease">
                    <!--                    <svg class="inline-block mb-1 mr-2" width="24" height="24" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                        <rect x="1.53408" y="63.8963" width="146.964" height="21.994" rx="10.997"-->
                    <!--                              transform="rotate(0.0831261 1.53408 63.8963)" fill="white" fill-opacity="0.5"/>-->
                    <!--                        <rect x="1.53408" y="63.8963" width="146.964" height="21.994" rx="10.997"-->
                    <!--                              transform="rotate(0.0831261 1.53408 63.8963)" stroke="white" stroke-width="6"/>-->
                    <!--                        <rect x="63.8965" y="148.466" width="146.964" height="21.994" rx="10.997"-->
                    <!--                              transform="rotate(-89.9169 63.8965 148.466)" fill="white" fill-opacity="0.5"/>-->
                    <!--                        <rect x="63.8965" y="148.466" width="146.964" height="21.994" rx="10.997"-->
                    <!--                              transform="rotate(-89.9169 63.8965 148.466)" stroke="white" stroke-width="6"/>-->
                    <!--                    </svg>-->
                    New List
                </buttton>
            </div>
        </div>

    </header>

    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <div class="border-4 border-dashed border-gray-400 rounded-lg h-96 h-auto inline-block min-w-full"
                     id="list-container">

                </div>
            </div>
        </div>
    </main>
    </div>

    <!-- import footer -->
<?php require_once "../app/_partials/footer_app.php" ?>