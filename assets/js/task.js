function prepare_form_task( title, button, titleField, textarea, datetime_field, priority_field, id_list_field ) {
    let modal = "#add_task_overlay";

    $( modal + " h2" ).text( title );
    $( modal + " #add_task_button" ).text( button );

    $( modal + " input[name='task_title']" ).val( titleField );
    $( modal + " textarea[name='task_description']" ).val( textarea );

    let lists = $( modal + " select[name='task_list_id']" );
    lists.html( "" );

    $( ".list" ).each( function () {
        const list_id = $( this ).find( "input[name='id_list']" ).val();
        const list_name = $( this ).find( "#list-title" ).text();

        if ( parseInt( list_id ) > -2 ) {
            lists.append( $( '<option>', {
                value: list_id,
                text: list_name,
            } ) );
        }

    } );
    lists.val( id_list_field );

    datetime_field = datetime_field.split( " " );

    $( "input[name='task_date']" ).val( datetime_field[ 0 ] );
    $( "input[name='task_time']" ).val( datetime_field[ 1 ] );

    // $( "select[name='task_priority'] option[value=" + priority_field + "]" ).prop( 'selected', true )
    $( "select[name='task_priority']" ).val( priority_field );


    $( modal ).fadeIn( 400 );
}


// if you click "Add List"  button
window.task_add = function () {

    let now = new Date();
    let day = ("0" + now.getDate()).slice( -2 );
    let month = ("0" + (now.getMonth() + 1)).slice( -2 );
    let currentTime = "0" + now.getHours() + ':' + now.getMinutes();
    let currentDate = now.getFullYear() + "-" + (month) + "-" + (day);

    prepare_form_task( "New Task", "Create", "", "", currentDate + " " + currentTime, "bg-green-400", "-1" );

    $( "#add_task_button" ).off().click( function () {

        $( "#add_task_overlay" ).fadeOut( 400 );

        const id_user = $( "input[name='id_user']" ).val();

        let modal = "#add_task_overlay";
        const title = $( modal + " input[name='task_title']" ).val();
        const description = $( modal + " textarea[name='task_description']" ).val();
        const date = $( modal + " input[name='task_date']" ).val();
        const time = $( modal + " input[name='task_time']" ).val();
        const task_list_id = $( modal + " select[name='task_list_id']" ).val();
        const priority = $( modal + " select[name='task_priority']" ).val();

        const deadline = date + " " + time;

        let form_data = {
            "id_user": id_user,
            "title": title,
            "description": description,
            "deadline": deadline,
            "id_list": task_list_id,
            "priority": priority,
        };


        form_data = JSON.stringify( form_data );

        $.ajax( {
            url: "http://localhost/todo/app/task_create.php",
            method: "POST",
            data: form_data,
            contentType: "application/json; charset=UTF-8",
            cache: false,
            processData: false,
            success: function ( response ) {
                $( "body" ).append( response.message );
                if ( response.success === 1 ) {
                    setTimeout( function () {
                        window.reload_page( task_list_id );
                    }, 500 );
                }
            }

        } );
    } );
}


window.task_add_close = function () {
    $( "#add_task_overlay" ).fadeOut( 400 );
}


window.task_edit = function ( id_task, id_user, title_field, desc_field, datetime_field, priority_field, id_list_field ) {

    const task = $( this ).parent().parent();

    prepare_form_task( "Edit Task", "Update", title_field, desc_field, datetime_field, priority_field, id_list_field );


    $( "#add_task_button" ).off().click( function () {


        $( "#add_task_overlay" ).fadeOut( 400 );

        let modal = "#add_task_overlay";
        const title = $( modal + " input[name='task_title']" ).val();
        const description = $( modal + " textarea[name='task_description']" ).val();
        const date = $( modal + " input[name='task_date']" ).val();
        const time = $( modal + " input[name='task_time']" ).val();
        const task_list_id = $( modal + " select[name='task_list_id']" ).val();
        const priority = $( modal + " select[name='task_priority']" ).val();

        const deadline = date + " " + time;

        let form_data = {
            "id_user": id_user,
            "id_task": id_task,
            "title": title,
            "description": description,
            "deadline": deadline,
            "id_list": task_list_id,
            "priority": priority,
        };

        form_data = JSON.stringify( form_data );

        // send them to the server
        $.ajax( {
            url: "http://localhost/todo/app/task_edit.php",
            method: "PATCH",
            data: form_data,
            contentType: "application/json; charset=UTF-8",
            cache: false,
            processData: false,
            success: function ( response ) {
                $( "body" ).append( response.message );
                if ( response.success === 1 ) {
                    setTimeout( function () {
                        window.reload_page( task_list_id );

                    }, 500 );
                }
            }

        } );

    } );
}


// if you click "Add List"  button
window.task_delete = function ( id_task, id_user, title ) {

    $( "#task_modal_title" ).text( title );

    $( "#delete_task_overlay" ).fadeIn( 400 );


    $( "#delete_task_button" ).off().click( function () {

        $( "#delete_task_overlay" ).fadeOut( 400 );

        let form_data = {
            "id_task": id_task,
            "id_user": id_user,
        };

        form_data = JSON.stringify( form_data );

        let task_list_id = $( "input[name='id_showed_list']" ).val();

        // send them to the server
        $.ajax( {
            url: "http://localhost/todo/app/task_delete.php",
            method: "DELETE",
            data: form_data,
            contentType: "application/json; charset=UTF-8",
            cache: false,
            processData: false,
            success: function ( response ) {
                $( "body" ).append( response.message );
                if ( response.success === 1 ) {
                    setTimeout( function () {
                        window.reload_page( task_list_id );

                    }, 500 );
                }
            }

        } );
    } );

}

window.task_delete_close = function () {
    $( "#delete_task_overlay" ).fadeOut( 400 );
}


window.task_fade_out = function () {
    $( ".complete_task[checked]" ).parent().parent().fadeTo( 'fast', 0.33 ).addClass( "bg-gray-800" );
}

window.task_complete = function ( id_task, id_user, is_complete ) {

    window.task_fade_out();

    is_complete = is_complete !== '1';

    let form_data = {
        "id_task": id_task,
        "id_user": id_user,
        "is_complete": is_complete,
    };

    form_data = JSON.stringify( form_data );


    let task_list_id = $( "input[name='id_showed_list']" ).val();

    // send them to the server
    $.ajax( {
        url: "http://localhost/todo/app/task_complete.php",
        method: "PATCH",
        data: form_data,
        contentType: "application/json; charset=UTF-8",
        cache: false,
        processData: false,
        success: function ( response ) {
            $( "body" ).append( response.message );
            if ( response.success === 1 ) {
                setTimeout( function () {
                    window.reload_page( task_list_id );

                }, 500 );
            }
        }

    } );
}


