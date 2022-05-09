<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Marek Hovancak">
    <meta name="description" content="To do list">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Alata|Open+Sans&display=swap" rel="stylesheet">
    <!--    <link rel="stylesheet" type="text/css" href="--><? //= asset( '/css/style.css' ) ?><!--">-->
    <link rel="icon" href="<?= asset( '/img/logo-classic.svg' ) ?>">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.5/dist/flowbite.min.css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Todoology</title>
</head>
<body class="bg-gray-800">
<div class="min-h-full">
    <nav class="bg-white border-gray-200 max-w-7xl mx-auto px-2 sm:px-4 py-2.5 z-10 rounded dark:bg-gray-800">
        <div class="container  flex flex-wrap justify-evenly gap-6 items-center">
            <a href="#" class="flex items-center">
                <img src="<?= asset( '/img/logo-full.svg' ) ?>" class="mr-3 h-10 sm:h-9" alt="Logo">
            </a>
            <div class="flex flex-wrap justify-between">
                <div class="flex items-baseline mr-4">
                    <a href="#"
                       class="text-gray-200 hover:bg-gray-600 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="inline-block text-gray-200 mr-4" viewBox="0 0 16 16">
                            <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        </svg>
                        Profile
                    </a>

                </div>

                <div onclick="window.sign_out()"
                     class="text-gray-200 hover:bg-red-600 hover:text-white px-3 py-2 rounded-md text-sm font-medium cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="inline-block text-white-500 mr-4" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    Sign out
                </div>

            </div>
            <div class="">
                <div class="md:block">
                    <div class="flex flex-row-reverse items-center px-5">

                        <div class="mr-3 text-center md:text-right">
                            <div class="text-base font-medium leading-none text-white mb-1"><?= $_SESSION[ "name" ] ?></div>
                            <div class="text-sm font-medium leading-none text-gray-200"><?= $_SESSION[ "email" ] ?></div>
                            <input type="hidden" name="id_user" value="<?= $_SESSION[ "ID" ] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

<!--    <button onclick="window.task_add()" type="button"-->
<!--            class="z-50 p-0.5 fixed right-4 bottom-76 sm:right-20 sm:bottom-96 md:right-44 flex items-center justify-center  overflow-hidden text-sm font-medium text-gray-900 rounded-xl group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">-->
<!--        <span class="rounded-xl w-full p-3 text-lg text-center font-bold weight-md transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0" id="list-title">-->
<!--            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" viewBox="0 0 16 16">-->
<!--                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>-->
<!--            </svg>-->
<!--        </span>-->
<!--    </button>-->


    <header class="bg-gradient-to-br from-purple-600 to-blue-500 shadow ">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-center text-gray-100">
                Remaining Tasks <span id="number-of-tasks"
                                       class="inline-block text-center text-3xl font-bold text-white bg-gray-800 leading-[2.5rem] rounded-md shadow-md w-10 h-10 ml-4">0</span>
            </h1>
            <div>


            </div>
        </div>

    </header>

