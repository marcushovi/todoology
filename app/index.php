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




    <main>
        <aside class="max-w-md mx-auto ml-3 float-left">
            <div class="overflow-y-auto py-4 px-3 bg-gray-50 dark:bg-gray-800">

                <ul id="list_menu" class="space-y-2 w-64">

                </ul>
            </div>
        </aside>
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