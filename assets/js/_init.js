function reloadJS() {
    $( "script" ).each( function () {

        if ( $( this ).attr( "src" ) !== undefined && ($( this ).attr( "src" ).includes( "app.js" ) || $( this ).attr( "src" ).includes( "list.js" ) || $( this ).attr( "src" ).includes( "task.js" )) )
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

$( document ).ready( function () {
    reloadLists();

} );