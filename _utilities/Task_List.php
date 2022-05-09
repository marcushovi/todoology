<?php

require_once 'Task.php';
require_once 'Validation.php';
require_once 'Alert.php';

class Task_List extends Task
{
    private $alert;

    public function __construct()
    {
        parent::__construct();

    }


    public function create_list( $data )
    {
        if ( !isset( $data->id_user ) || empty( $data->id_user ) ) {
            return $this->response( 0, 422, "We have a problem on the server side. Please contact the admin server." );
        }

        if ( !isset( $data->title ) || !isset( $data->color ) || empty( trim( $data->title ) ) || empty( trim( $data->color ) ) ) {

            return $this->response( 0, 422, "Please fill in all fields!" );
        } else {

            $id_user = $this->escape_string( $data->id_user );
            $title = $this->escape_string( $data->title );
            $color = $this->escape_string( $data->color );

            $validation = new Validation();

            $is_valid = $validation->validate_list( $title, $color );

            if ( $is_valid === TRUE ) {
                $query = "INSERT INTO lists (id_user, title, color, updated_at, created_at) VALUES ('$id_user', '$title', '$color', NOW(),NOW())";
                $result = $this->execute( $query );

                if ( $result ) {
                    return $this->response( 1, 201, " The list '$title' was created successfully!" );

                } else {
                    return $this->response( 0, 500, "Sorry, there was a problem connecting to the server." );
                }
            } else {
                return $this->response( 0, 422, $is_valid );
            }
        }
    }

    public function get_lists( $data )
    {
        if ( !isset( $data->id_user ) || empty( $data->id_user ) ) {
            return $this->response( 0, 422, "We have a problem on the server side. Please contact the admin server." );
        }

        $id_user = $this->escape_string( $data->id_user );
// get all complete tasks sorted by time when were uploaded ,also check user ID
        $query = "SELECT ID, title, color FROM lists WHERE id_user = '$id_user' OR ID < 0 ORDER BY ID ASC ;";

        $result_lists = $this->get_data( $query );

        if ( $result_lists && count( $result_lists ) > 0 ) {

            foreach ( $result_lists as &$list ) {
                $result_tasks = $this->get_tasks_number( $id_user, $list[ "ID" ] );

                if ( $result_tasks && count( $result_tasks ) > 0 ) {
                    $list[ "number_of_tasks" ] = $result_tasks[0][ "number_of_tasks" ];
                } else {
                    $list[ "number_of_tasks" ] = 0;
                }
            }

            return $result_lists;
        } else
            return false;

    }

    public function get_list( $data )
    {
        if ( !isset( $data->id_user ) || empty( $data->id_user ) || !isset( $data->id_list ) || empty( $data->id_list ) ) {
            return $this->response( 0, 422, "We have a problem on the server side. Please contact the admin server." );
        }

        $id_user = $this->escape_string( $data->id_user );
        $id_list = $this->escape_string( $data->id_list );

// get all complete tasks sorted by time when were uploaded ,also check user ID
        if  (intval($id_list) < 0) {
            $query = "SELECT ID, title, color FROM lists WHERE ID = '$id_list';";
        }
        else {
            $query = "SELECT ID, title, color FROM lists WHERE id_user = '$id_user' AND ID = '$id_list';";
        }


        $result_list = $this->get_data( $query );

        $result_list = $result_list[0];
        if ( !empty($result_list) ) {

            $date = false;


            switch ( intval($id_list) ){
                case -2:
                    $date = " DATE(deadline) = DATE(NOW()) ";
                    break;
                case -3:
                    $date = " DATEDIFF(deadline, CURDATE()) = 1 ";
                    break;
            }


            $result_tasks = $this->get_tasks( $id_user, $id_list, $date );

            if ( $result_tasks && count( $result_tasks ) > 0 ) {
                $result_list[ "tasks" ] = $result_tasks;
            } else {
                $result_list[ "tasks" ] = [];
            }

            return $result_list;
        } else
            return false;

    }


    public function delete_list( $data )
    {
        if ( !isset( $data->id_user ) || empty( $data->id_user ) || !isset( $data->id_list ) || empty( $data->id_list ) ) {
            return $this->response( 0, 422, "We have a problem on the server side. Please contact the admin server." );
        }

        $id_user = $this->escape_string( $data->id_user );
        $id_list = $this->escape_string( $data->id_list );


        $query = "DELETE FROM lists WHERE id_user = '$id_user' AND ID = '$id_list' ;";

        $result_list = $this->execute( $query );
        $result_task = $this->delete_tasks( $id_list );

        if ( $result_list === TRUE && $result_task === TRUE ) {

            return $this->response( 1, 201, "The list was deleted successfully " );
        } else {
            return $this->response( 0, 500, "We have a problem on the server side. Please contact the admin server." );
        }

    }

    public function edit_list( $data )
    {
        if ( !isset( $data->id_user ) || empty( $data->id_user || !isset( $data->id_list ) || empty( $data->id_list ) ) ) {
            return $this->response( 0, 422, "We have a problem on the server side. Please contact the admin server." );
        }

        if ( !isset( $data->title ) || !isset( $data->color ) || empty( trim( $data->title ) ) || empty( trim( $data->color ) ) ) {

            return $this->response( 0, 422, "Please fill in all required fields!" );
        } else {

            $id_user = $this->escape_string( $data->id_user );
            $id_list = $this->escape_string( $data->id_list );
            $title = $this->escape_string( $data->title );
            $color = $this->escape_string( $data->color );

            $validation = new Validation();

            $is_valid = $validation->validate_list( $title, $color );

            if ( $is_valid === TRUE ) {
                $query = "UPDATE lists SET  title = '$title', color = '$color', updated_at = NOW() WHERE ID =  '$id_list' AND id_user = '$id_user' ;";
                $result = $this->execute( $query );

                if ( $result ) {
                    return $this->response( 1, 201, "List '$title' was successfully edited" );

                } else {
                    return $this->response( 0, 500, "Sorry, there was a problem connecting to the server." );
                }
            } else {
                return $this->response( 0, 422, $is_valid );
            }
        }
    }


}