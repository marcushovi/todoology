<?php

// import connection to server, classes, and start SESSION 
require_once "_utilities/_config.php";
/** @var Alert $alert */
/** @var Validation $validation */
/** @var Crud $crud */

// if user is sign in redirect him to app
if ( isset( $_SESSION[ "ID" ] ) ) {
    header( "Location: app/" );
}

// import header
include_once "_partials/header.php";

// variable for error messages
$error = array( "email" => "", "password" => "" );
$email = "";
$password = "";

// check if variables are sets
if ( isset( $_POST[ "email" ] ) && isset( $_POST[ "password" ] ) ) {

    $email = $crud->escape_string( $_POST[ "email" ] );
    $password = $crud->escape_string( $_POST[ "password" ] );

    // check validation

    $error[ 'email' ] = $validation->validate_email( $email );
    $error[ 'password' ] = $validation->validate_password( $password, $password );

    // if validation is correct
    if ( $error[ 'email' ] == true && $error[ 'password' ] == true ) {

        // get data of user from DB by mail


        $hashed_pass = hash( "sha256", $password );
        $query = "SELECT ID, name, email, password FROM users WHERE email = '$email' AND password = '$hashed_pass'";
        $result = $crud->get_data( $query );

        // check if user exists with this mail
        if ( $result ) {

            // save all data of user to SESSION without password
            foreach ( $result[ 0 ] as $key => $value ) {

                if ( $key != "password" ) {
                    $_SESSION[ $key ] = $value;
                }

            }
            $_SESSION[ "token" ] =
                // and redirect user to app
                header( "Location: app/" );

        } // alert warning
        else {
            $alert->error( "Wrong credentials." );
        }
    } else {
        // delete string "true" from error array because string "true" was return value of function
        foreach ( $error as $key => $val ) {
            if ( $val === TRUE ) {
                $error[ $key ] = "";
            }
        }

        if ( $error[ 'email' ] )
            $alert->error( $error[ 'email' ] );
        if ( $error[ 'password' ] )
            $alert->error( $error[ 'password' ] );


    }


}
?>

    <section class="w-full bg-gray-800">

        <div>
            <div class="flex flex-col h-screen w-screen lg:flex-row ">
                <div class="relative w-full bg-cover lg:w-6/12 xl:w-7/12 bg-gradient-to-r from-violet-600  to-blue-500">
                    <p class="absolute left-8 top-2 z-10 text-lg text-right text-gray-300 m-3 ">Back to <a
                                href="<?= asset( "", BASE_URL ) ?>" class="text-gray-800 underline">Home</a></p>
                    <div class="relative flex flex-col items-center justify-center w-full h-full px-10 my-20 lg:px-16 lg:my-0">
                        <div class="flex flex-col items-start space-y-8 tracking-tight mb-16 lg:max-w-3xl">
                            <div class="relative">
                                <p class="mb-2 font-bolder text-gray-300 uppercase xl:text-2xl">Save your time</p>
                                <h2 class="text-5xl font-bold text-gray-50 xl:text-8xl">Schedule your tasks</h2>
                            </div>
                            <p class="text-xl text-gray-300">Let us help you, so you can become more productive and useful for our society!</p>

                        </div>
                    </div>
                </div>

                <div class="w-full bg-gray-800 lg:w-6/12 xl:w-5/12">


                    <div class="flex flex-col items-center justify-center w-full h-full p-10 lg:p-16 xl:p-24">
                        <div class="w-full flex justify-center">
                            <a href="<?= BASE_URL ?>" target="_self">
                                <img src="<?= asset( '/img/logo-full.svg' ) ?>"
                                     alt="Logo">
                            </a>
                        </div>

                        <form method="POST" action="log_in.php" class="relative w-xl mt-10 space-y-8">
                            <div class="relative">
                                <label class="font-bold text-lg tracking-wide text-gray-100"
                                       for="email">Email</label>
                                <input type="text" name="email" value="<?= $email ?>"
                                       class="border-0 block w-full px-4 py-4 mt-2 text-xl text-gray-600 placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                       placeholder="Enter Your Email Address">
                            </div>
                            <div class="relative">
                                <label class="font-bold text-lg tracking-wide text-gray-100"
                                       for="password">Password</label>
                                <input type="password" name="password" value="<?= $password ?>"
                                       class="border-0 block w-full px-4 py-4 mt-2 text-xl text-gray-600 placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                       placeholder="Password">
                                <span id="show-pass"
                                      class="float-right text-sm font-medium text-blue-600 mt-1 cursor-pointer hover:underline">Show password</span>
                            </div>
                            <div class="relative mt-32">
                                <button type="submit"
                                        class="relative inline-flex items-center justify-center overflow-hidden w-full p-0.5 text-xl font-bold tracking-wide rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                        <span class="relative w-full px-5 py-4 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            Log In
                                        </span>
                                </button>
                                <p class="text-lg text-gray-300 m-3 ">or, if you don't have an account you can <a
                                            href="<?= asset( "signup", BASE_URL ) ?>" class="text-blue-600 underline">Sign
                                        up</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- change title -->
    <script>
        $( "title" ).text( "Todoology Sign Up" );
    </script>
    <!-- import footer -->
<?php include_once "_partials/footer.php" ?>