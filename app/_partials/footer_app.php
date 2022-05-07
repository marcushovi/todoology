
<!-- alert for delete task  -->
<div class="alert-container" id="alert-delete-task">
    <div class="alert">
        <p>Are you sure you want to delete this task?</p>
        <span id="yes-delete-task" class="button">Yes</span>
        <span id="no-delete-task" class="button-white">No</span>
    </div>
</div>

<button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown button <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

<div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(583px, 681px);" data-popper-placement="bottom">
    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
        </li>
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
        </li>
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
        </li>
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
        </li>
    </ul>
</div>

<button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Dropdown <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
<!-- Dropdown menu -->
<div id="dropdownNavbar" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
        </li>
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
        </li>
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
        </li>
    </ul>
    <div class="py-1">
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Sign out</a>
    </div>
</div>


<?php include_once APP_PATH . "/app/_partials/sign_out_modal.php" ?>

<?php include_once APP_PATH . "/app/_partials/list_form.php" ?>
<?php include_once APP_PATH . "/app/_partials/list_delete_modal.php" ?>

<?php include_once APP_PATH . "/app/_partials/task_form.php" ?>
<?php include_once APP_PATH . "/app/_partials/task_delete_modal.php" ?>

<script type="module" src="<?= asset( 'js/utilities.js' ) ?>"></script>
<script src="<?= asset( 'js/flowbite.js' ) ?>"></script>
<script  src="<?= asset( 'js/_init.js' ) ?>"></script>
<script src="<?= asset( 'js/jQuery.js' ) ?>"></script>
<script src="<?= asset( 'js/app.js' ) ?>"></script>
<script src="<?= asset( 'js/list.js' ) ?>"></script>
<script type="module" src="<?= asset( 'js/task.js' ) ?>"></script>


<script>
    // default settings
    var settings = {

        // settings for button and layer
        position: "fixed", 					// default 'fixed'
        top: "unset",						// default 'unset'
        left: "unset",						// default 'unset'
        bottom: "70px", 						// default '50px'
        right: "50px", 						// default '50px'
        buttonBorderRadius: "1rem",						// default '50%'
        transition: "all .5s ease-out", 			// default 'all .5s ease-out'

        // settings for layer
        darkModeBackgroundColor: "#1F2937", 					// default '#000'

        // settings for button
        buttonWidth: "3.5em", 					// default '3.5em'
        buttonHeight: "3.5em", 					// default '3.5em'
        buttonText: "🌓",						// default '🌓'
        buttonLineHeight: "3", 						// default '3'
        buttonBorder: "3px solid transparent", 	// default '3px solid transparent'
        buttonHoverBorder: "3px solid #0041FF", 		// default '3px solid #000'
        darkModeButtonHoverBorder: "3px solid #0041FF", 		// default '3px solid #FFF'
        buttonColor: "#1F2937", 					// default '#000'
        darkModeButtonColor: "#F0F0F0", 					// default '#000'

        // Settings, where you can set the width of the window where the button will appear (in px)
        minWindowWidth: "1000",						// default '0'

        // event listener function
        event: "click"                      // default 'click'
    };

    // function which execute when you press dark mode button
    function darkModeIsActivated() {

    }

</script>
<script src="<?= asset( 'js/darkMode/darkMode.js' ) ?>" defer></script>
</body>
</html>
