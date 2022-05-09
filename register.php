<?php

// import connection to server, classes, and start SESSION 
require_once "_utilities/_config.php";
/** @var Alert $alert */
/** @var Validation $validation */
/** @var Crud $crud */

// if user is sign in redirect him to app
if ( isset( $_SESSION[ "ID" ] ) ) {
    header( "Location: app/log_in.php" );
}

// import header
include_once "_partials/header.php";

// initiate variables
$error = array( "name" => "", "email" => "", "password" => "" );
$email = "";
$name = "";
$password = "";
$conPassword = "";

// check if variables are set
if ( isset( $_POST[ "name" ] ) && isset( $_POST[ "email" ] ) && isset( $_POST[ "password" ] ) && isset( $_POST[ "conPassword" ] ) ) {

    $email = $crud->escape_string( $_POST[ "email" ] );
    $name = $crud->escape_string( $_POST[ "name" ] );
    $password = $crud->escape_string( $_POST[ "password" ] );
    $conPassword = $crud->escape_string( $_POST[ "conPassword" ] );

    // check validation
    $error[ 'name' ] = $validation->validate_name( $name );
    $error[ 'email' ] = $validation->validate_email( $email );
    $error[ 'password' ] = $validation->validate_password( $password, $conPassword );


    // reCaptcha v2
    if ( isset( $_POST[ 'g-recaptcha-response' ] ) ) {
        $captcha = $_POST[ 'g-recaptcha-response' ];
    }
    if ( !$captcha ) {
        $alert->error( "Prove you're not a robot." );
    }

    $secretKey = "6LfpNwEVAAAAAGzTLLeTDuDoB2Srf-0d4T-uv555";
    $ip = $_SERVER[ 'REMOTE_ADDR' ];

    // post request to server
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode( $secretKey ) . '&response=' . urlencode( $captcha );
    $response = file_get_contents( $url );
    $responseKeys = json_decode( $response, true );

    if ( !$responseKeys[ "success" ] && $captcha ) {
        $alert->error( "Stop lying, you're a robot." );
    }

    // if validation is correct and reCaptcha v2 is OK
    if ( $responseKeys[ "success" ] && $error[ 'name' ] === true && $error[ 'email' ] === true && $error[ 'password' ] === true ) {

        // get data of other users and check if mail already exists


        $query = "SELECT email FROM user WHERE email = '$email'";

        $result = $crud->get_data( $query );


        // if email is correct insert user to DB
        if ( empty( $result ) ) {

            $hashed_password = hash( "sha256", $password );


            $query = "INSERT INTO user (name, email, password, created_at) VALUES ('$name', '$email', '$hashed_password',NOW())";

            $result = $crud->execute( $query );

            // alert status
            if ( $result ) {
                $alert->success( "You have been successfully registered" );
                $email = "";
                $name = "";
                $password = "";
                $conPassword = "";

                header('Location: ./log_in.php');
                die();
            } else {
                $alert->error( "Sorry, there was a problem connecting to the server." );
            }
        } else {
            $alert->error( "Account with this email already exists." );
        }
    } else {
        // delete string "true" from error array because string "true" was return value of function
        foreach ( $error as $key => $val ) {
            if ( $val === TRUE ) {
                $error[ $key ] = "";
            }
        }
        if ( $error[ 'name' ] )
            $alert->error( $error[ 'name' ] );
        else if ( $error[ 'email' ] )
            $alert->error( $error[ 'email' ] );
        else if ( $error[ 'password' ] )
            $alert->error( $error[ 'password' ] );
    }
}
?>

    <section class="w-full bg-gray-800">

        <div class="max-w-7xl">
            <div class="flex flex-col h-screen w-screen lg:flex-row ">
                <div class="relative w-full bg-cover flex-wrap grow shrink lg:w-6/12 xl:w-7/12 bg-gradient-to-r from-violet-600  to-blue-500">
                    <div class="relative flex flex-col items-center justify-center w-full h-full px-10 my-20 lg:px-16 lg:my-0">
                        <div class="flex flex-col items-start space-y-8 tracking-tight mb-16 lg:max-w-3xl">
                            <div class="relative">
                                <p class="mb-2 font-bolder text-gray-300 uppercase xl:text-2xl">IT'S FREE</p>
                                <h2 class="text-5xl font-bold text-gray-50 xl:text-8xl">Schedule your first task</h2>
                            </div>
                            <p class="text-xl text-gray-300">Your journey begin here and now!</p>

                        </div>
                    </div>
                </div>
                <div class="w-full bg-gray-800 flex-wrap grow lg:w-6/12 xl:w-5/12">
                    <div class="flex flex-col items-center justify-center w-full h-full p-10 lg:p-16 xl:p-24">
                        <div class="w-full flex justify-center">
                            <a href="<?= BASE_URL ?>" target="_self">
                                <img src="<?= asset( '/img/logo-full.svg' ) ?>"
                                     alt="Logo">
                            </a>
                        </div>

                        <form method="POST" action="register.php" class="relative w-xl mt-10 space-y-8">
                            <div class="relative">
                                <label class="font-bold text-lg tracking-wide text-gray-100" for="name">Name</label>
                                <input type="text" name="name" value="<?= $name ?>"
                                       class="border-0 block w-full px-4 py-4 mt-2 text-xl text-gray-600 placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                       placeholder="Enter Your Name">
                            </div>
                            <div class="relative">
                                <label class="font-bold text-lg tracking-wide text-gray-100" for="email">Email</label>
                                <input type="text" name="email" value="<?= $email ?>"
                                       class="border-0 block w-full px-4 py-4 mt-2 text-xl text-gray-600 placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                       placeholder="Enter Your Email Address">
                            </div>
                            <div class="relative">
                                <label class="font-bold text-lg tracking-wide text-gray-100"
                                       for="password">Password</label>
                                <input type="password" name="password"
                                       value="<?= $password ?>"
                                       class="border-0 block w-full px-4 py-4 mt-2 text-xl text-gray-600 placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                       placeholder="Password">
                                <span id="show-pass"
                                      class="float-right text-sm font-medium text-blue-600 mt-1 cursor-pointer hover:underline">Show password</span>

                            </div>
                            <div class="relative">
                                <label class="font-bold text-lg tracking-wide text-gray-100" for="conPassword">Password
                                    again</label>
                                <input type="password" name="conPassword"
                                       value="<?= $conPassword ?>"
                                       class="border-0 block w-full px-4 py-4 mt-2 text-xl text-gray-600 placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                       placeholder="Confirm Password">
                            </div>
                            <div class="relative flex justify-center">
                                <div class="g-recaptcha" data-sitekey="6LfpNwEVAAAAACEtPzLt2UwCtwhNw4cjW4xjCnK7"></div>
                            </div>
                            <div class="relative">
                                <button type="submit"
                                        class="relative inline-flex items-center justify-center overflow-hidden w-full p-0.5 text-xl font-bold tracking-wide rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                        <span class="relative w-full px-5 py-4 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            Sign in
                                        </span>
                                </button>
                                <p class="text-lg text-gray-500 m-3 ">or, if you have an account you can
                                    <a href="<?= asset( "/", BASE_URL ) ?>" class="text-blue-600 underline">Log in</a>
                                </p>
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
<?php include_once "_partials/footer.php"; ?>