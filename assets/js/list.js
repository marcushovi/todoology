function prepare_form_list( title, button, titleField, color ) {
    let modal = "#add_list_overlay";

    $( modal + " h2" ).text( title );
    $( modal + " #add_list_button" ).text( button );

    $( modal + " input[name='list_title']" ).val( titleField );

    $( modal + " select" ).val( color );

    $( modal ).fadeIn( 400 );
}


// if you click "Add List"  button
// window.list_fold = function ( id_list ) {
//
//     $( "#list-" + id_list + "-table" ).slideToggle( "Slow" );
//
// }


// if you click "Add List"  button
window.list_add = function ( id_user, id_list ) {

    prepare_form_list( "New List", "Create", "", "bg-red-500" );

    $( "#add_list_button" ).off().click( function () {

        $( "#add_list_overlay" ).fadeOut( 400 );

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
            success: function ( response ) {
                $( "body" ).append( response.message );

                if ( response.success === 1 ) {
                    window.reload_page();
                }
            }
        } );
    } );
}

window.list_add_close = function () {
    $( "#add_list_overlay" ).fadeOut( 400 );
}


// if you click "Add List"  button
window.list_edit = function ( id_user, id_list, title, color ) {

    prepare_form_list( "Edit List", "Update", title, color );

    $( "#add_list_button" ).off().click( function () {


        $( "#add_list_overlay" ).fadeOut( 400 );

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
            success: function ( response ) {
                $( "body" ).append( response.message );

                if ( response.success === 1 ) {
                    window.reload_page(id_list);
                }
            }

        } );

    } );
}

// if you click "Add List"  button
window.list_delete = function ( id_user, id_list, title ) {

    $( "#list_modal_title" ).text( title );

    $( "#delete_list_overlay" ).fadeIn( 400 );

    $( "#delete_list_button" ).off().click( function () {

        $( "#delete_list_overlay" ).fadeOut( 400 );


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
            success: function ( response ) {
                $( "body" ).append( response.message );

                if ( response.success === 1 ) {
                    window.reload_page();
                }
            }

        } );
    } );

}

window.list_delete_close = function () {
    $( "#delete_list_overlay" ).fadeOut( 400 );
}




