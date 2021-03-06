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


    <main class="relative z-50 mx-4 xl:mx-auto mt-12 mb-36 max-w-7xl flex items-start content-evenly justify-evenly gap-5 flex-wrap lg:flex-nowrap">
        <aside class="basis-1/5 grow-0 flex-auto">
            <div class="border-4 border-white border-dashed rounded-lg bg-gray-800">
                <div class="m-4 py-2 px-4 rounded-lg">
                    <ul id="list_menu" class="space-y-4">

                    </ul>
                </div>
            </div>
        </aside>
        <div class="basis-4/5 shrink grow-0 sm:px-6 lg:px-8">
            <div>
                <div class="h-96 h-auto inline-block min-w-full"
                     id="list-container">


                </div>
            </div>
        </div>
    </main>


    <!-- import footer -->
<?php require_once "../app/_partials/footer_app.php" ?>