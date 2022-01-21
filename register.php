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
                $alert->success( "you have been successfully registered " );
                $email = "";
                $name = "";
                $password = "";
                $conPassword = "";
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
        if ( $error[ 'email' ] )
            $alert->error( $error[ 'email' ] );
        if ( $error[ 'password' ] )
            $alert->error( $error[ 'password' ] );
    }
}
?>
    <section class="w-full bg-white">
        <div class="mx-auto max-w-xl">
            <div class="w-full bg-white m-auto">
                <div class="flex flex-col items-center justify-center w-full p-10 lg:p-16 xl:p-24">
                    <h4 class="w-full text-3xl font-bold">Register</h4>

                    <form method="POST" action="register.php" class="relative w-full mt-10 space-y-8">
                        <div class="relative">
                            <label class="font-medium text-gray-900" for="name">Name</label>
                            <input type="text" name="name" value="<?= $name ?>"
                                   class=" block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                   placeholder="Enter Your Name">
                        </div>
                        <div class="relative">
                            <label class="font-medium text-gray-900" for="email">Email</label>
                            <input type="text" name="email" value="<?= $email ?>"
                                   class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                   placeholder="Enter Your Email Address">
                        </div>
                        <div class="relative">
                            <label class="font-medium text-gray-900"
                                   for="password">Password</label>
                            <input type="password" name="password"
                                   value="<?= $password ?>"
                                   class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                   placeholder="Password">
                            <span id="show-pass"
                                  class="float-right text-sm font-medium text-blue-900 mt-1 hover:underline">Show password</span>

                        </div>
                        <div class="relative">
                            <label class="font-medium text-gray-900" for="conPassword">Password
                                again</label>
                            <input type="password" name="conPassword"
                                   value="<?= $conPassword ?>"
                                   class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50"
                                   placeholder="Confirm Password">
                        </div>
                        <div class="relative">
                            <div class="g-recaptcha" data-sitekey="6LfpNwEVAAAAACEtPzLt2UwCtwhNw4cjW4xjCnK7"></div>
                        </div>
                        <div class="relative">
                            <button type="submit"
                                    class="inline-block w-full px-5 py-4 text-lg font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 ease">
                                Register
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
        $( "title" ).text( "Todo Sign Up" );
    </script>
    <!-- import footer -->
<?php include_once "_partials/footer.php"; ?>