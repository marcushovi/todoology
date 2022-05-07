$( document ).ready( function () {


    $( "#add_task_overlay" ).hide();
    $( "#alert-delete-task" ).hide();

    // let disc = $( ".task_description" );
    //
    // disc.each( function () {
    //     const text = $( this ).text().trim();
    //
    //     if ( text.length > 30 ) {
    //         $( this ).text( text.substring( 0, 30 ) + " ..." );
    //     }
    // } );
    //
    // let titles = $( ".task_title" );
    //
    // titles.each( function () {
    //     const text = $( this ).text().trim();
    //
    //     if ( text.length > 25 ) {
    //
    //         $( this ).text( text.substring( 0, 25 ) + " ..." );
    //
    //     }
    // } );

    function reloadJS() {
        $( "script" ).each( function () {

            if ( $( this ).attr( "src" ) !== undefined && ($( this ).attr( "src" ).includes( "app.js" ) || $( this ).attr( "src" ).includes( "list.js" ) || $( this ).attr( "src" ).includes( "task.js" ) || $( this ).attr( "src" ).includes( "flowbite.js" )) )
                $( this ).remove();
        } );


        const s = document.createElement( 'script' );
        s.src = '../assets/js/app.js';
        document.body.appendChild( s );
        const s2 = document.createElement( 'script' );
        s2.src = '../assets/js/list.js';
        document.body.appendChild( s2 );
        const s3 = document.createElement( 'script' );
        s3.src = '../assets/js/task.js';
        document.body.appendChild( s3 );
        const s4 = document.createElement( 'script' );
        s4.src = '../assets/js/flowbite.js';
        document.body.appendChild( s4 );
    }

    function reloadLists() {


        const id_user = $( "input[name='id_user']" ).val();


        let form_data = {
            "id_user": id_user,
        };

        form_data = JSON.stringify( form_data );

        $.ajax( {
            url: "http://localhost/todo/app/list_get.php",
            method: "POST",
            data: form_data,
            contentType: "application/json; charset=UTF-8",
            cache: false,
            processData: false,
            success: function ( response ) {
                response = JSON.parse( response );

                $( "#list-container" ).html( $.parseHTML( response.data ) );
                // $("#list-container").append(response.data);

                reloadJS();

            }

        } );
    }


    function prepareForm( title, button, titleField, textarea ) {
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

            lists.append( $( '<option>', {
                value: list_id,
                text: list_name,
            } ) );
        } );

        $( modal ).fadeIn( 400 );
    }


    function handleResponse( response ) {
        $( "body" ).append( response.message );
        reloadJS();
        if ( response.success === 1 ) {
            setTimeout( function () {
                reloadLists();
            }, 500 );
        }
    }


    // if you click "Add List"  button
    $( "#add_task" ).off().click( function () {

        prepareForm( "New Task", "Create", "", "" );

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
                success: handleResponse
            } );
        } );
    } );

    $( "#close_add_task" ).off().click( function () {
        $( "#add_task_overlay" ).fadeOut( 400 );
    } );


    // if you click "Add List"  button
    $( ".edit_task" ).off().click( function () {

        const task = $( this ).parent().parent();

        let title_field = task.find( ".task_title" ).text().trim();

        let desc_field = task.find( ".task_description" ).text().trim();

        prepareForm( "Edit Task", "Update", title_field, desc_field );


        $( "#add_task_button" ).off().click( function () {


            $( "#add_task_overlay" ).fadeOut( 400 );

            const id_user = $( "input[name='id_user']" ).val();
            const id_task = task.find( "input[name='id_task']" ).val();

            let modal = "#add_task_overlay";
            const title = $( modal + " input[name='task_title']" ).val();
            const description = $( modal + " textarea[name='task_description']" ).val();
            const date = $( modal + " input[name='task_date']" ).val();
            const time = $( modal + " input[name='task_time']" ).val();
            const task_list_id = $( modal + " select[name='task_list_id']" ).val();
            const priority = $( modal + " select[name='task_priority']" ).val();

            const deadline = date + " " + time;
            console.log( $( modal + " input[name='task_title']" ) );

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
                success: handleResponse

            } );

        } );
    } );


    // if you click "Add List"  button
    $( ".delete_task" ).off().click( function () {


        const task = $( this ).parent().parent();

        let title_field = task.find( ".task_title" ).text();

        $( "#task_modal_title" ).text( title_field );

        $( "#delete_task_overlay" ).fadeIn( 400 );


        $( "#delete_task_button" ).off().click( function () {

            $( "#delete_task_overlay" ).fadeOut( 400 );

            const id_task = task.find( "input[name='id_task']" ).val();
            const id_user = $( "input[name='id_user']" ).val();

            let form_data = {
                "id_task": id_task,
                "id_user": id_user,
            };

            form_data = JSON.stringify( form_data );

            // send them to the server
            $.ajax( {
                url: "http://localhost/todo/app/task_delete.php",
                method: "DELETE",
                data: form_data,
                contentType: "application/json; charset=UTF-8",
                cache: false,
                processData: false,
                success: handleResponse

            } );
        } );

    } );

    $( "#close_delete_task" ).off().click( function () {
        $( "#delete_task_overlay" ).fadeOut( 400 );
    } );


    $( ".complete_task" ).off().click( function () {

        const task = $( this ).parent().parent();

        const id_task = task.find( "input[name='id_task']" ).val();
        const id_user = $( "input[name='id_user']" ).val();

        const is_complete = $( this ).prop( "checked" );

        let form_data = {
            "id_task": id_task,
            "id_user": id_user,
            "is_complete": is_complete,
        };

        form_data = JSON.stringify( form_data );


        // send them to the server
        $.ajax( {
            url: "http://localhost/todo/app/task_complete.php",
            method: "PATCH",
            data: form_data,
            contentType: "application/json; charset=UTF-8",
            cache: false,
            processData: false,
            success: handleResponse

        } );
    } );


} )
;

