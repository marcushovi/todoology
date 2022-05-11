<?php

// if user is sign in redirect him to app
if ( isset( $_SESSION[ "ID" ] ) ) {
    header( "Location: app/" );
}

// import header
include_once "_partials/header.php";

?>


    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="relative bg-gray-800 overflow-hidden">
        <div class="max-w-8xl mx-auto">
            <div class="relative z-10 pb-8 bg-gray-800 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">

                <nav class="bg-white border-gray-200 px-2 sm:px-4 py-7 z-10 rounded dark:bg-gray-800">
                    <div class="container flex flex-wrap justify-between items-center">
                        <a href="#" class="flex items-center">
                            <img src="<?= asset( '/img/logo-full.svg' ) ?>" class="mr-3 h-6 sm:h-9" alt="Logo">
                        </a>
                        <div class="flex md:order-2">
                            <a href="<?= asset( "login", BASE_URL ) ?>"
                               class="mr-4 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Log
                                In</a>
                            <button data-collapse-toggle="mobile-menu" type="button"
                                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    aria-controls="mobile-menu-4" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="hidden w-full md:block md:w-auto " id="mobile-menu">
                            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium ">
                                <li>
                                    <a href="<?= asset( "", BASE_URL ) ?>"
                                       class="block py-2 pr-4 pl-3 text-white rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
                                       aria-current="page">Home</a>
                                </li>
                                <li>
                                    <a href="#pricing"
                                       class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
                                </li>
                                <li>
                                    <a href="#about"
                                       class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                                </li>
                                <li>
                                    <a href="#contact"
                                       class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>


                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-300 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">App to enrich your</span>
                            <span class="block text-blue-600 xl:inline">Time Management</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-400 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Time, the only non-repurchase asset on the planet.</p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <a href="#pricing"
                               class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-xl font-bold text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                <span class="relative px-8 py-4 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                        Get Started
                                </span>
                            </a>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
                 src="<?= asset( '/img/background.jpg' ) ?>"
                 alt="background">
        </div>
    </div>
    <div id="about" class="py-12 bg-gray-700">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">TIME</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-200 sm:text-4xl">A better way
                    to manage time</p>
                <p class="mt-4 max-w-2xl text-xl text-gray-400 lg:mx-auto">We want to bring you our point of view on time management as it is important in our lives.</p>
            </div>

            <div class="mt-10">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-600 text-white">
                                <!-- Heroicon name: outline/globe-alt -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-200">Access from anywhere</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-400">Of-course you can manage your time from anywhere on the globe and whenever you feel like.
                        </dd>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-violet-600 text-white">
                                <!-- Heroicon name: outline/scale -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-200">No hidden fees</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-400">We are totally transparent company, you can rely on us. Both of us live in the world where human rights and duties exists.
                        </dd>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-600 text-white">
                                <!-- Heroicon name: outline/lightning-bolt -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-200">Fast Web App</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-400">Our team is focused on user experience. It is important for us to bring you fast, smooth and simple user experience.
                        </dd>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-violet-600 text-white">
                                <!-- Heroicon name: outline/annotation -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-200">Mobile notifications<span
                                        class="text-base text-red-400 font-semibold tracking-wide "> In development</span>
                            </p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-400">Our team is still working on new solutions and features. Today our team consist of over 50 people like programmers, managers etc.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    <div id="pricing" class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-300 sm:text-4xl">
                <span class="block">Ready to dive in?</span>
                <span class="block text-blue-600">Start your free trial today.</span>
            </h2>
        </div>
    </div>

    <div class="bg-gray-700">
        <div class="relative max-w-screen-xl mx-auto lg:mb-0 px-4 sm:px-6 lg:px-8">
            <div class="pricing-box max-w-lg mx-auto rounded-lg overflow-hidden lg:max-w-none lg:flex">
                <div class="px-6 py-8 lg:flex-shrink-1 lg:p-12">
                    <h3 class="text-3xl leading-8 font-extrabold text-gray-900 sm:text-3xl sm:leading-9 dark:text-white">
                        Pricing
                    </h3>
                    <p class="mt-6 text-base leading-6 text-gray-500 dark:text-gray-200">
                        Start scheduling online for free with all the features you need. We don&#x27;t charge commission or monthly fees.
                        Don&#x27;t miss, start now.
                    </p>
                    <div class="mt-8">
                        <div class="flex items-center">
                            <h4 class="flex-shrink-0 pr-4 text-m leading-5 tracking-wider font-bold text-blue-600">
                                What&#x27;s included
                            </h4>
                        </div>
                        <ul class="mt-8 lg:grid lg:grid-cols-2 lg:col-gap-8 lg:row-gap-5">
                            <li class="flex items-start lg:col-span-1">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                         stroke="currentColor" fill="#31C48D" viewBox="0 0 1792 1792">
                                        <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                    All features
                                </p>
                            </li>
                            <li class="flex items-start lg:col-span-1">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                         stroke="currentColor" fill="#31C48D" viewBox="0 0 1792 1792">
                                        <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                    5GB of disk memory
                                </p>
                            </li>
                            <li class="flex items-start lg:col-span-1">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                         stroke="currentColor" fill="#31C48D" viewBox="0 0 1792 1792">
                                        <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                    Up to 5 devices
                                </p>
                            </li>
                            <li class="flex items-start lg:col-span-1">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                         stroke="currentColor" fill="#31C48D" viewBox="0 0 1792 1792">
                                        <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                    Nice looking UI
                                </p>
                            </li>
                            <li class="flex items-start lg:col-span-1">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6"
                                         stroke="currentColor" fill="#31C48D" viewBox="0 0 1792 1792">
                                        <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm leading-5 text-gray-700 dark:text-gray-200">
                                    Other functionalities are on the way
                                </p>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="py-8 px-6 text-center bg-gray-50 dark:bg-gray-700 lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12">
                    <div class="mt-4 flex items-center justify-center text-5xl leading-none font-extrabold text-gray-900 dark:text-white">
                <span>
                    €0/mon
                </span>
                    </div>
                    <p class="mt-4 text-sm leading-5">
                <span class="block font-medium text-gray-500 dark:text-gray-400">
                    Totally Free
                </span>
                        <span class=" inline-block font-medium text-gray-500 dark:text-gray-400">
                </span>
                    </p>
                    <div class="mt-6">
                        <div class="rounded-md ">
                            <a href="<?= asset( "signup", BASE_URL ) ?>"
                               class="mr-4 text-white text-lg font-bold bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-6 py-4 text-center">
                                Manage your time!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-end">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-300 sm:text-4xl">
                <span class="block">Want to leave some feedback?</span>
                <span class="block text-blue-600">Here are ours social links.</span>
            </h2>
        </div>
    </div>


    <footer class="text-center bg-gray-800 text-white">
        <div class="container px-6 pt-6">
            <div class="flex justify-center mb-6">
                <a href="#" type="button"
                   class="rounded-full border-2 border-blue-600 text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-12 h-12 m-1">
                    <svg aria-hidden="true"
                         focusable="false"
                         data-prefix="fab"
                         data-icon="facebook-f"
                         class="w-4 h-full mx-auto"
                         role="img"
                         xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 320 512"
                    >
                        <path
                                fill="currentColor"
                                d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"
                        ></path>
                    </svg>
                </a>

                <a href="#" type="button"
                   class="rounded-full border-2 border-violet-600 text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-12 h-12 m-1">
                    <svg aria-hidden="true"
                         focusable="false"
                         data-prefix="fab"
                         data-icon="twitter"
                         class="w-5 h-full mx-auto"
                         role="img"
                         xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 512 512"
                    >
                        <path
                                fill="currentColor"
                                d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"
                        ></path>
                    </svg>
                </a>

                <a href="#" type="button"
                   class="rounded-full border-2 border-blue-600 text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-12 h-12 m-1">
                    <svg aria-hidden="true"
                         focusable="false"
                         data-prefix="fab"
                         data-icon="google"
                         class="w-5 h-full mx-auto"
                         role="img"
                         xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 488 512"
                    >
                        <path
                                fill="currentColor"
                                d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"
                        ></path>
                    </svg>
                </a>

                <a href="#" type="button"
                   class="rounded-full border-2 border-violet-600 text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-12 h-12 m-1">
                    <svg aria-hidden="true"
                         focusable="false"
                         data-prefix="fab"
                         data-icon="instagram"
                         class="w-5 h-full mx-auto"
                         role="img"
                         xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 448 512"
                    >
                        <path
                                fill="currentColor"
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                        ></path>
                    </svg>
                </a>

                <a href="#" type="button"
                   class="rounded-full border-2 border-blue-600 text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-12 h-12 m-1">
                    <svg aria-hidden="true"
                         focusable="false"
                         data-prefix="fab"
                         data-icon="linkedin-in"
                         class="w-5 h-full mx-auto"
                         role="img"
                         xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 448 512"
                    >
                        <path
                                fill="currentColor"
                                d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"
                        ></path>
                    </svg>
                </a>

                <a href="#" type="button"
                   class="rounded-full border-2 border-violet-600 text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-12 h-12 m-1">
                    <svg aria-hidden="true"
                         focusable="false"
                         data-prefix="fab"
                         data-icon="github"
                         class="w-5 h-full mx-auto"
                         role="img"
                         xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 496 512"
                    >
                        <path
                                fill="currentColor"
                                d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"
                        ></path>
                    </svg>
                </a>
            </div>
        </div>

        <div class="text-center p-4 bg-gray-700">
            © 2021
            <a class="text-whitehite" href="#">Todoology™</a>
            . All Rights Reserved.
        </div>
    </footer>


    <!-- import footer -->
<?php include_once "_partials/footer.php" ?>