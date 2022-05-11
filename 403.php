<?php

// import connection to server, classes, and start SESSION 
require_once "_utilities/_config.php";

// import header
include_once "_partials/header.php";
?>

    <!--  alert 403 Internal Server Error and link to backward -->
    <div class="flex items-center justify-center w-screen h-screen">
        <div class="px-4 lg:py-12">
            <div class="lg:gap-4 lg:flex">
                <div class="mr-8 flex flex-col items-center justify-center md:py-24 lg:py-32">
                    <h1 class="font-bold text-blue-600 text-9xl">403</h1>
                    <p class="my-4 text-2xl font-bold text-center text-gray-300 md:text-3xl">
                        <span class="text-red-500">Oops!</span> Forbidden
                    </p>
                    <p class="mb-8 text-center text-gray-500 md:text-lg">
                        You do not have permission.
                    </p>
                    <a href="<?= asset( "", BASE_URL ) ?>"
                       target="_self"
                       class="mr-4 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xl px-5 py-2.5 text-center">
                        Go home
                    </a>
                </div>
                <div class="mt-4">
                    <img
                            src="https://cdn.pixabay.com/photo/2016/11/22/23/13/black-dog-1851106__340.jpg"
                            alt="img"
                            class="object-cover w-full h-full"
                    />
                </div>
            </div>
        </div>
    </div>
    <script>
        // change text of title
        $( "title" ).text( "404 Not Found" );
    </script>


    <!-- import footer -->
<?php include_once "_partials/footer.php"; ?>