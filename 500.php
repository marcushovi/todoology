<?php

// import connection to server, classes, and start SESSION 
require_once "_utilities/_config.php";

// import header
include_once "_partials/header.php";
?>

    <!--  alert 500 Internal Server Error and link to backward -->
    <div class="flex items-center justify-center w-screen h-screen">
        <div class="px-4 lg:py-12">
            <div class="lg:gap-4 lg:flex">
                <div class="flex flex-col items-center justify-center md:py-24 lg:py-32">
                    <h1 class="font-bold text-blue-600 text-9xl">500</h1>
                    <p class="my-4 text-2xl font-bold text-center text-gray-300 md:text-3xl">
                        <span class="text-red-500">Oops!</span> Internal Server Error
                    </p>
                    <p class="mb-8 text-center text-gray-300 md:text-lg">
                        We have some internal issues but we are working on it.
                    </p>
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
        $( "title" ).text( "500 Internal Server Error" );

    </script>


    <!-- import footer -->
<?php include_once "_partials/footer.php"; ?>