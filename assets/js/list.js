$( document ).ready( function () {
    $( "#add_list_overlay" ).hide();
    $( "#delete_list_overlay" ).hide();


    function prepareForm( title, button, titleField ) {
        let modal = "#add_list_overlay";

        $( modal + " h2" ).text( title );
        $( modal + " #add_list_button" ).text( button );

        $( modal + " input[name='list_title']" ).val( titleField );

        $( modal ).fadeIn( 400 );
    }

    function handleResponse( response ) {
        $( "body" ).append( response.message );

        if ( response.success === 1 ) {
            reloadLists();
        }
    }

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

    // if you click "Add List"  button
    $( ".slide_list" ).off().click( function () {

        const id_list = $( this ).siblings( "input[name='id_list']" ).val();

        $( "#list-" + id_list + " table" ).slideToggle( "Slow" );

    } );


    // if you click "Add List"  button
    $( "#add_list" ).off().click( function () {

        prepareForm( "New List", "Create", "" );

        $( "#add_list_button" ).off().click( function () {

            $( "#add_list_overlay" ).fadeOut( 400 );

            const id_user = $( "input[name='id_user']" ).val();
            const title = $( "input[name='list_title']" ).val();
            const color = $( "select[name='list_color']" ).val();

            let form_data = {
                "id_user": id_user,
                "title": title,
                "color": color,
            };

            form_data = JSON.stringify( form_data );


            // send them to the server
            $.ajax( {
                url: "http://localhost/todo/app/list_create.php",
                method: "POST",
                data: form_data,
                contentType: "application/json; charset=UTF-8",
                cache: false,
                processData: false,
                success: handleResponse
            } );
        } );
    } );

    $( "#close_add_list" ).off().click( function () {
        $( "#add_list_overlay" ).fadeOut( 400 );
    } );


    // if you click "Add List"  button
    $( ".edit_list" ).off().click( function () {

        const id_list = $( this ).siblings( "input[name='id_list']" ).val();

        let title_field = $( "#list-" + id_list + " #list-title" ).text();

        prepareForm( "Edit List", "Update", title_field );

        $( "#add_list_button" ).off().click( function () {


            $( "#add_list_overlay" ).fadeOut( 400 );

            const id_user = $( "input[name='id_user']" ).val();
            const title = $( "input[name='list_title']" ).val();
            const color = $( "select[name='list_color']" ).val();

            let form_data = {
                "id_user": id_user,
                "id_list": id_list,
                "title": title,
                "color": color,
            };

            form_data = JSON.stringify( form_data );


            // send them to the server
            $.ajax( {
                url: "http://localhost/todo/app/list_edit.php",
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
    $( ".delete_list" ).off().click( function () {


        const id_list = $( this ).siblings( "input[name='id_list']" ).val();

        let titleField = $( "#list-" + id_list + " #list-title" ).text();

        $( "#list_modal_title" ).text( titleField );

        $( "#delete_list_overlay" ).fadeIn( 400 );

        $( "#delete_list_button" ).off().click( function () {

            $( "#delete_list_overlay" ).fadeOut( 400 );

            const id_user = $( "input[name='id_user']" ).val();


            let form_data = {
                "id_user": id_user,
                "id_list": id_list,
            };

            form_data = JSON.stringify( form_data );

            // send them to the server
            $.ajax( {
                url: "http://localhost/todo/app/list_delete.php",
                method: "DELETE",
                data: form_data,
                contentType: "application/json; charset=UTF-8",
                cache: false,
                processData: false,
                success: handleResponse

            } );
        } );

    } );

    $( "#close_delete_list" ).off().click( function () {
        $( "#delete_list_overlay" ).fadeOut( 400 );
    } );


} );




