$( document ).ready( function () {


    // icon to show password in inputs
    let showPass = $( "#show-pass" );

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



