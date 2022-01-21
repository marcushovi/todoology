<?php

/**
 *  Validation
 */
class Validation
{

    private $max_length_of_name;
    private $min_length_of_name;
    private $min_length_of_pass;
    private $max_length_of_email;

    private $maxLengthOfTitle;
    private $maxLengthOfDescription;
    private $maxLengthOfPriority;

    private $maxLengthOfColor;

    public function __construct()
    {
        $this->max_length_of_name = 200;
        $this->min_length_of_name = 3;
        $this->min_length_of_pass = 8;
        $this->max_length_of_email = 400;

        $this->maxLengthOfTitle = 50;
        $this->maxLengthOfDescription = 500;
        $this->maxLengthOfPriority = 24;

        $this->maxLengthOfColor = 24;
    }


    public function validate_name( $value )
    {

        // required
        if ( empty( $value ) ) {
            return "Name is Required";
        }

        // length min 3 and max 200 char.,
        if ( strlen( trim( $value ) ) < $this->min_length_of_name ) {
            return "Name must contain at least $this->min_length_of_name letters";
        }
        if ( strlen( trim( $value ) ) > $this->max_length_of_name ) {
            return "Name must contain no more than $this->max_length_of_name letters";
        }

        // must contain characters from english alphabet only
        if ( !is_string( $value ) ) {
            return "Invalid Name!";
        }


        return true;
    }

    public function validate_email( $email )
    {

        // required
        if ( empty( $email ) ) {
            return "Email is Required";
        }

        // length min 6 and max 400 char
        if ( strlen( trim( $email ) ) > $this->max_length_of_email ) {
            return "Email must contain no more than $this->max_length_of_email letters";
        }
//        if ( strlen( trim( $value ) ) < 6 ) {
//            return "Email must contain at least 6 letters";
//        }
//
//        // must contain @ and .
//        if ( strpos( $value, "@" ) === false ) {
//            return "Email must contain '@'";
//        }
//        if ( strpos( $value, "." ) === false ) {
//            return "Email must contain '.'";
//        }

        if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
            return "Invalid Email Address!";
        }

        return true;
    }

    public function validate_password( $value1, $value2 )
    {

        // required
        if ( empty( $value1 ) ) {
            return "Password is Required";
        }

        // length min 8 , must equals
        if ( strlen( $value1 ) < $this->min_length_of_pass ) {
            return "Password must contain at least $this->min_length_of_pass characters";
        }

        // must equals
        if ( $value2 != $value1 ) {
            return "Passwords must equals";
        }

        return true;
    }

    public function validate_task( $title, $description, $priority )
    {
        // check length of title
        if ( strlen( $title ) > $this->maxLengthOfTitle ) {
            return "Title is too long.";
        }

        // check length of description
        if ( strlen( $description ) > $this->maxLengthOfDescription ) {
            return "Description is too long.";
        }

        // check length of priority
        if ( strlen( $priority ) > $this->maxLengthOfPriority ) {
            return "Priority is too long.";
        }

        return true;
    }

    public function validate_list( $title, $color )
    {
        // check length of title
        if ( strlen( $title ) > $this->maxLengthOfTitle ) {
            return "Title is too long.";
        }


        // check length of priority
        if ( strlen( $color ) > $this->maxLengthOfColor ) {
            return "Color is too long.";
        }

        return true;
    }

}

?>