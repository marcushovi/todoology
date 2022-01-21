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
    if ( $error[ 'email' ] === true && $error[ 'password' ] === true ) {

        // get data of user from DB by mail


        $hashed_pass = hash( "sha256", $password );
        $query = "SELECT ID, name, email, password FROM user WHERE email = '$email' AND password = '$hashed_pass'";
        $result = $crud->get_data( $query );

        // check if user exists with this mail
        if ( $result ) {

            // save all data of user to SESSION without password
            foreach ( $result[ 0 ] as $key => $value ) {

                if ( $key != "password" ) {
                    $_SESSION[ $key ] = $value;
                }

            }
            $_SESSION[ "token " ] =
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

    <section class="w-full bg-white">

        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col h-screen lg:flex-row">
                <div class="relative w-full bg-cover lg:w-6/12 xl:w-7/12 bg-gradient-to-r from-white via-white to-gray-100">
                    <div class="relative flex flex-col items-center justify-center w-full h-full px-10 my-20 lg:px-16 lg:my-0">
                        <div class="flex flex-col items-start space-y-8 tracking-tight lg:max-w-3xl">
                            <div class="relative">
                                <p class="mb-2 font-medium text-gray-700 uppercase">Save your time</p>
                                <h2 class="text-5xl font-bold text-gray-900 xl:text-6xl">Schedule your tasks</h2>
                            </div>
                            <p class="text-2xl text-gray-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Aspernatur assumenda cum luptas voluptatibus!</p>

                        </div>
                    </div>
                </div>

                <div class="w-full bg-white lg:w-6/12 xl:w-5/12">
                    <div class="flex flex-col items-center justify-center w-full h-full p-10 lg:p-16 xl:p-24">
                        <h4 class="w-full text-3xl font-bold">Log in</h4>

                        <form method="POST" action="log_in.php" class="relative w-full mt-10 space-y-8">
                            <div class="relative">
                                <label class="font-medium text-gray-900"
                                       for="email">Email</label>
                                <input type="text" name="email" value="<?= $email ?>"
                                       class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                       placeholder="Enter Your Email Address">
                            </div>
                            <div class="relative">
                                <label class="font-medium text-gray-900"
                                       for="password">Password</label>
                                <input type="password" name="password" value="<?= $password ?>"
                                       class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                       placeholder="Password">
                                <span id="show-pass"
                                      class="float-right text-sm font-medium text-blue-900 mt-1 hover:underline">Show password</span>
                            </div>
                            <div class="relative">
                                <button type="submit"
                                        class="inline-block w-full px-5 py-4 text-lg font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 ease">
                                    Log in
                                </button>
                                <p class="text-lg text-gray-500 m-3 ">or, if you don't have an account you can <a
                                            href="<?= asset( "register", BASE_URL ) ?>" class="text-blue-600 underline">sign
                                        up</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- import footer -->
<?php include_once "_partials/footer.php" ?>