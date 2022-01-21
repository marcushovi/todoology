$( document ).ready( function () {

    // redirect to the main page after registration
    $( "#ok" ).click( function () {
        window.location.replace( "log_in.php" );

        $( "#ok" ).remove();
    } );

    // icon to show password in inputs
    var showPass = $( "#show-pass" );

    showPass.mousedown( function () {

        $( "input[name='password']" ).attr( "type", "text" );
        $( "input[name='conPassword']" ).attr( "type", "text" );
    } );

    showPass.mouseup( function () {
        $( "input[name='password']" ).attr( "type", "password" );
        $( "input[name='conPassword']" ).attr( "type", "password" );

    } );

    showPass.mouseleave( function () {
        $( "input[name='password']" ).attr( "type", "password" );
        $( "input[name='conPassword']" ).attr( "type", "password" );

    } );

} );



