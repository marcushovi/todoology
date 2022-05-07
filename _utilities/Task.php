<?php
require_once 'Crud.php';
require_once 'Validation.php';
require_once 'Alert.php';

class Task extends Crud
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_tasks( $id_user, $id_list )
    {
        if ( !isset( $id_user ) || empty( $id_user ) || !isset( $id_list ) || empty( $id_list ) ) {
            return $this->response( 0, 422, "Something went wrong!" );
        }

        $id_user = $this->escape_string( $id_user );
        $id_list = $this->escape_string( $id_list );
        // get all complete tasks sorted by time when were uploaded ,also check user ID

        $query = "SELECT ID, id_list, title, description, deadline, priority, is_complete FROM tasks WHERE id_user = '$id_user' AND id_list = '$id_list' ORDER BY is_complete ASC ;";

        $result = $this->get_data( $query );

        if ( $result && count( $result ) > 0 )
            return $result;
        else
            return false;
    }

    public function get_tasks_number( $id_user, $id_list )
    {
        if ( !isset( $id_user ) || empty( $id_user ) || !isset( $id_list ) || empty( $id_list ) ) {
            return $this->response( 0, 422, "Something went wrong!" );
        }

        $id_user = $this->escape_string( $id_user );
        $id_list = $this->escape_string( $id_list );
        // get all complete tasks sorted by time when were uploaded ,also check user ID

        $query = "SELECT COUNT(ID) AS number_of_tasks FROM tasks WHERE id_user = '$id_user' AND id_list = '$id_list';";

        $result = $this->get_data( $query );

        if ( $result && count( $result ) > 0 )
            return $result;
        else
            return false;
    }

    function response( $success, $status, $message, $extra = [] )
    {
        $alert = new Alert();

        if ( !empty( $message ) ) {
            if ( $success === 0 ) {
                $message = $alert->error( $message, FALSE );
            } else {
                $message = $alert->success( $message, FALSE );
            }
        }

        return array_merge( [
            'success' => $success,
            'status' => $status,
            'message' => $message
        ], $extra );
    }

    public function create_task( $data )
    {
        if ( !isset( $data->id_user ) ||
            empty( $data->id_user ) ||
            !isset( $data->id_list ) ||
            empty( $data->id_list ) ||
            !isset( $data->priority ) ||
            !isset( $data->description ) ||
            !isset( $data->deadline )
        ) {
            return $this->response( 0, 422, "Something went wrong!" );
        }

        if ( !isset( $data->title ) || empty( trim( $data->title ) ) ) {
            return $this->response( 0, 422, "Please fill in at least title!" );
        } else {

            $id_user = $this->escape_string( $data->id_user );
            $id_list = $this->escape_string( $data->id_list );
            $title = $this->escape_string( $data->title );
            $priority = $this->escape_string( $data->priority );
            $description = $this->escape_string( $data->description );
            $deadline = $this->escape_string( $data->deadline );

            if ( empty( $priority ) ) $priority = NULL;
            if ( empty( $description ) ) $description = NULL;
            if ( empty( $deadline ) ) $deadline = NULL;


            $validation = new Validation();

            $is_valid = $validation->validate_task( $title, $description, $priority );

            if ( $is_valid === TRUE ) {
                $query = "INSERT INTO tasks (id_user, id_list, title, description, deadline, priority, is_complete, updated_at, created_at) VALUES ('$id_user','$id_list', '$title', '$description', '$deadline', '$priority',  0, NOW(),NOW())";
                $result = $this->execute( $query );

                if ( $result ) {
                    return $this->response( 1, 201, "Task '$title' was created successfully!" );

                } else {
                    return $this->response( 0, 500, "Sorry, there was a problem connecting to the server." );
                }
            } else {
                return $this->response( 0, 422, $is_valid, " s" );
            }
        }
    }

    public function delete_task( $data )
    {
        if ( !isset( $data->id_user ) || empty( $data->id_user ) || !isset( $data->id_task ) || empty( $data->id_task ) ) {
            return $this->response( 0, 422, "Something went wrong!" );
        }

        $id_user = $this->escape_string( $data->id_user );
        $id_task = $this->escape_string( $data->id_task );


        $query = "DELETE FROM tasks WHERE id_user = '$id_user' AND ID = '$id_task' ;";

        $result = $this->execute( $query );

        if ( $result === TRUE ) {
            return $this->response( 1, 201, "The task was deleted successfully" );
        } else {
            return $this->response( 0, 500, "Something went wrong" );
        }

    }

    public function delete_tasks( $id_list )
    {
        if ( !isset( $id_list ) || empty( $id_list ) ) {
            return false;
        }

        $id_list = $this->escape_string( $id_list );


        $query = "DELETE FROM tasks WHERE id_list = '$id_list' ;";

        $result = $this->execute( $query );

        if ( $result === TRUE ) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_task( $data )
    {
        if ( !isset( $data->id_user ) ||
            empty( $data->id_user ) ||
            !isset( $data->id_list ) ||
            empty( $data->id_list ) ||
            !isset( $data->id_task ) ||
            empty( $data->id_task ) ||
            !isset( $data->priority ) ||
            !isset( $data->description ) ||
            !isset( $data->deadline )
        ) {
            return $this->response( 0, 422, "Something went wrong!" );
        }

        if ( !isset( $data->title ) || empty( trim( $data->title ) ) ) {
            return $this->response( 0, 422, "Please fill in at least title!" );
        } else {

            $id_user = $this->escape_string( $data->id_user );
            $id_task = $this->escape_string( $data->id_task );
            $id_list = $this->escape_string( $data->id_list );
            $title = $this->escape_string( $data->title );
            $priority = $this->escape_string( $data->priority );
            $description = $this->escape_string( $data->description );
            $deadline = $this->escape_string( $data->deadline );

            if ( empty( $priority ) ) $priority = NULL;
            if ( empty( $description ) ) $description = NULL;
            if ( empty( $deadline ) ) $deadline = NULL;


            $validation = new Validation();

            $is_valid = $validation->validate_task( $title, $description, $priority );

            if ( $is_valid === TRUE ) {
                $query = "UPDATE tasks SET id_list = '$id_list', title = '$title', description = '$description', deadline = '$deadline', priority = '$priority', updated_at = NOW() WHERE ID =  '$id_task'AND id_list =  '$id_list' AND id_user = '$id_user';";
                $result = $this->execute( $query );

                if ( $result ) {
                    return $this->response( 1, 201, "The task '$title' was edited successfully!" );
                } else {
                    return $this->response( 0, 500, "Sorry, there was a problem connecting to the server." );
                }
            } else {
                return $this->response( 0, 422, $is_valid, " s" );
            }
        }
    }

    public function complete_task( $data )
    {
        if ( !isset( $data->id_user ) ||
            empty( $data->id_user ) ||
            !isset( $data->id_task ) ||
            empty( $data->id_task ) ||
            !isset( $data->is_complete )
        ) {
            return $this->response( 0, 422, "Something went wrong! " );
        }


        $id_user = $this->escape_string( $data->id_user );
        $id_task = $this->escape_string( $data->id_task );
        $is_complete = $this->escape_string( $data->is_complete );

        if ( $is_complete == true ) $is_complete = 1;
        else $is_complete = 0;

        $query = "UPDATE tasks SET is_complete = '$is_complete', updated_at = NOW() WHERE ID =  '$id_task' AND id_user = '$id_user';";
        $result = $this->execute( $query );

        if ( $result ) {
            if ( $is_complete == 1 )
                return $this->response( 1, 201, "Task completed successfully! Congratulation" );
            else
                return $this->response( 1, 201, "Task uncompleted successfully!" );


        } else {
            return $this->response( 0, 500, "Sorry, there was a problem connecting to the server." );
        }

    }

}