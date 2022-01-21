$( document ).ready( function () {


    $( ".form-ajax" ).submit( function ( event ) {
        event.preventDefault();
    } );


    // delete status alerts
    setTimeout( function () {
        $( ".status-container" ).fadeOut( 1000, function () {
            $( this ).remove();
        } );
    }, 5000 );

    $( "#number-of-tasks" ).text( $( ".complete_task" ).not( ".complete_task[checked]" ).length );
    $( ".complete_task[checked]" ).parent().parent().fadeTo( 'fast', 0.33 ).addClass( "bg-gray-300" )


    $( "#sign_out_overlay" ).hide();
    // If you click sign out button, please be sure you are sure
    $( "#sign_out" ).click( function () {

        $( "#sign_out_overlay" ).fadeIn( 300 );

    } );

    // if you are sure then redirect to sign_out.php file
    $( "#yes_sign_out" ).click( function () {

        window.location.replace( "http://localhost/todo/app/sign_out.php" );
    } );

    // if you are not sure then hide alert
    $( "#no_sign_out" ).click( function () {

        $( "#sign_out_overlay" ).fadeOut( 300 );


    } );


} );
