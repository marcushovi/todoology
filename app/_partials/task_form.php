<div id="add_task_overlay" class="fixed inset-0 overflow-hidden z-50" style="display: none">
    <div class="absolute inset-0 overflow-hidden z-50">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div id="add_task_form" class="add_form fixed top-2 left-1/2 -translate-x-2/4 max-w-full flex">
            <div class="relative w-screen max-w-fit rounded-lg bg-gray-800">
                <div id="close_task_list" class="absolute right-4 top-4 flex shadow-md">
                    <button type="button"
                            onclick="window.task_add_close()"
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

                <div class="h-full flex flex-col py-6 shadow-xl">
                    <div class="px-4 sm:px-6">
                        <h2 class="text-3xl font-bold font-medium text-gray-200 text-center">
                            New Task
                        </h2>
                    </div>

                    <div class="mt-2 relative flex-1 px-4 sm:px-6">
                        <div class="h-96 h-auto inline-block min-w-full ">
                            <div class="m-6 px-8 py-6">
                                <form method="POST" action="#" enctype="multipart/form-data"
                                      class="form-ajax relative w-full space-y-8">
                                    <div class="relative m-auto w-fit">
                                        <div class="relative inline-block float-left">
                                            <label class="font-bold text-xl text-gray-200"
                                                   for="task_title">Title<span class="float-right mr-4 text-red-500 text-sm">Required</span></label>
                                            <input type="text" name="task_title"
                                                   class="block px-4 py-4 mt-2 text-xl shadow-md placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                                   placeholder="Enter Title">
                                        </div>
                                        <div class="relative inline-block ml-8">
                                            <label class="font-bold text-xl text-gray-200"
                                                   for="task_description">Description</label>
                                            <textarea name="task_description"
                                                      rows="3"
                                                      style="resize: none"
                                                      value=""
                                                      class="block px-4 py-4 mt-2 text-xl shadow-md placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                                      placeholder="Enter Description">
                                        </textarea>
                                        </div>
                                    </div>

                                    <div class="flex justify-center">
                                        <div class="basis-1/2">
                                            <label class="font-bold text-xl text-gray-200"
                                                   for="task_date">Date</label>
                                            <input type="date" name="task_date"
                                                   class="w-full  px-4 py-4 mt-2 text-xl shadow-md placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                                   placeholder="Enter Title">
                                        </div>
                                        <div class="basis-1/2 ml-4">
                                            <label class="font-bold text-xl text-gray-200"
                                                   for="task_time">Time</label>
                                            <input type="time" name="task_time"
                                                   class="w-full  px-4 py-4 mt-2 text-xl shadow-md placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                                   placeholder="Enter Title">
                                        </div>
                                    </div>
                                    <div class="flex justify-center">
                                        <div class="basis-1/2">
                                            <label class="font-bold text-xl text-gray-200"
                                                   for="task_priority">Priority<span class="float-right mr-4 text-red-500 text-sm">Required</span></label>
                                            <select name="task_priority"
                                                    class="w-full appearance-none shadow-md block px-4 py-4 mt-2 text-xl placeholder-gray-400 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50">
                                                <option selected value="bg-red-400" class="bg-red-400">High</option>
                                                <option selected value="bg-yellow-400" class="bg-yellow-400">Medium
                                                </option>
                                                <option selected value="bg-green-400" class="bg-green-400">Low
                                                </option>
                                            </select>
                                        </div>
                                        <div class="basis-1/2 ml-4">
                                            <label class="font-bold text-xl text-gray-200"
                                                   for="task_list_id">List<span class="float-right mr-4 text-red-500 text-sm">Required</span></label>
                                            <select name="task_list_id"
                                                    class="w-full appearance-none shadow-md block px-4 py-4 mt-2 text-xl placeholder-gray-400 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <button type="button" class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                            <span id="add_task_button" class="w-full p-3 text-lg font-bold weight-md relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                Add
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