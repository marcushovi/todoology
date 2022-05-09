<div id="add_list_overlay" class="fixed inset-0 overflow-hidden z-50" style="display: none">
    <div class="absolute inset-0 overflow-hidden z-50">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div id="add_list_form" class="add_form fixed top-8 left-1/2 -translate-x-2/4 max-w-full flex">

            <div class="relative w-screen max-w-xl rounded-xl bg-gray-800">

                <div onclick="window.list_add_close()" class="absolute right-4 top-4 flex shadow-md">
                    <button type="button"
                            class="rounded-md p-2 bg-red-500 text-gray-300 shadow-md transition duration-200 ease focus:outline-none hover:ring-4 hover:ring-slate-500">
                        <span class="sr-only">Close panel</span>
                        <svg width="20" height="20" viewBox="0 0 150 150" fill="white"
                             xmlns="http://www.w3.org/2000/svg">
                            <rect x="28.5715" y="12.1213" width="154.584" height="23.264" rx="11.632"
                                  transform="rotate(45 28.5715 12.1213)"
                                  fill="#FF0000" fill-opacity="0.5"/>
                            <rect x="28.5715" y="12.1213" width="154.584" height="23.264" rx="11.632"
                                  transform="rotate(45 28.5715 12.1213)"
                                  stroke="white" stroke-width="6"/>
                            <rect x="12.1213" y="121.429" width="154.584" height="23.264" rx="11.632"
                                  transform="rotate(-45 12.1213 121.429)"
                                  fill="#FF0000" fill-opacity="0.5"/>
                            <rect x="12.1213" y="121.429" width="154.584" height="23.264" rx="11.632"
                                  transform="rotate(-45 12.1213 121.429)"
                                  stroke="white" stroke-width="6"/>
                        </svg>
                    </button>
                </div>

                <div class="h-full flex flex-col pt-6 shadow-xl">
                    <div class="px-4 sm:px-6">
                        <h2 class="text-3xl font-bold font-medium text-white text-center">
                            New List
                        </h2>
                    </div>

                    <div class="mt-4 relative flex-1 px-4 sm:px-6">
                        <div class="h-96 h-auto inline-block min-w-full ">
                            <div class="m-6 px-8 py-6 rounded-lg ">
                                <form method="POST" action="#" enctype="multipart/form-data"
                                      class="form-ajax relative w-full space-y-8">
                                    <div class="relative">
                                        <label class="text-xl font-bold text-white"
                                               for="list_title">Title <span
                                                    class="float-right mr-4 text-red-500 text-sm">Required</span></label>
                                        <input type="text" name="list_title"
                                               class="block w-full px-4 py-4 mt-2 text-xl shadow-md placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                               placeholder="Enter Title">
                                    </div>
                                    <div class="relative">
                                        <label class="text-xl font-bold text-white"
                                               for="list_color">Color<span
                                                    class="float-right mr-4 text-red-500 text-sm">Required</span></label>
                                        <select name="list_color"
                                                class="appearance-none block w-full px-4 py-4 mt-2 text-xl shadow-md placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50">
                                            <option value="bg-pink-500" class="bg-pink-500">Pink</option>
                                            <option value="bg-red-500" class="bg-red-500">Red</option>
                                            <option value="bg-orange-500" class="bg-orange-500">Orange</option>
                                            <option value="bg-yellow-500" class="bg-yellow-500">Yellow</option>
                                            <option value="bg-green-500" class="bg-green-500">Green</option>
                                            <option value="bg-cyan-500" class="bg-cyan-500">Cyan</option>
                                            <option selected value="bg-blue-500" class="bg-blue-500">Blue</option>
                                            <option value="bg-violet-500" class="bg-violet-500">Violet</option>
                                            <option value="bg-gray-500" class="bg-gray-500">Gray</option>
                                        </select>
                                    </div>
                                    <div class="relative">
                                        <button type="button"
                                                class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                            <span id="add_list_button"
                                                  class="w-full p-3 text-lg font-bold weight-md relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                ADD
                                            </span>
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>