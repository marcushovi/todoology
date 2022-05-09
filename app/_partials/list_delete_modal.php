<div id="delete_list_overlay" class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
     aria-modal="true" style="display: none">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-12 w-12 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 32 32" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-100">
                            Delete List: <span id="list_modal_title" class="font-bold"></span>
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-200">
                                Are you sure you want to delete this list? All of your tasks in it will be permanently
                                removed. This action cannot be undone.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 sm:px-6 flex ">
                <button type="button" id="delete_list_button" class="basis-1/2 tracking-wide relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-m font-bold rounded-lg group border-2 border-red-500 hover:bg-gray-700 transition-colors group-hover:from-purple-600 group-hover:to-blue-500 text-red-500 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                        Delete
                </button>
                <button type="button"  class="basis-1/2 tracking-wide relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-m font-bold rounded-lg bg-red-500 text-white hover:text-gray-400 transition-colors focus:ring-4 focus:outline-none focus:ring-blue-800">
                    <span onclick="window.list_delete_close()" class="w-full relative px-5 py-2.5 ">
                        Cancel
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>