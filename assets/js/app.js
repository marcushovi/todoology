window.reloadJS = function () {
    $( "script" ).each( function () {

        if ( $( this ).attr( "src" ) !== undefined && $( this ).attr( "src" ).includes( "flowbite.js" ) ) {
            $( this ).remove();

        }
    } );

    const script = $( "<script></script>" )
    script.attr( "src", "../assets/js/flowbite.js" )
    // script.attr( "defer", 'true')
    $( "body" ).append( script );


}

window.load_list = function ( id_list = "-2" ) {

    const id_user = $( "input[name='id_user']" ).val();

    let form_data = {
        "id_user": id_user,
        "id_list": id_list,
    };

    form_data = JSON.stringify( form_data );

    $.ajax( {
        url: "http://localhost/todoology/app/list_get.php",
        method: "POST",
        data: form_data,
        contentType: "application/json; charset=UTF-8",
        cache: false,
        processData: false,
        success: function ( response ) {
            response = JSON.parse( response );
            $( "#list-container" ).html( $.parseHTML( response.data ) );
            window.task_fade_out();
            window.reloadJS();
        }
    } );
}

window.get_list_menu = function () {

    const id_user = $( "input[name='id_user']" ).val();

    let form_data = {
        "id_user": id_user,
    };

    form_data = JSON.stringify( form_data );

    $.ajax( {
        url: "http://localhost/todoology/app/lists_get.php",
        method: "POST",
        data: form_data,
        contentType: "application/json; charset=UTF-8",
        cache: false,
        processData: false,
        success: function ( response ) {
            response = JSON.parse( response );
            $( "#list_menu" ).html( $.parseHTML( response.data ) );
            window.task_count();
            window.reloadJS();
        }

    } );

}


window.status_delete = function () {
    // delete status alerts
    setTimeout( function () {
        $( ".status" ).parent().fadeOut( 1000, function () {
            $( this ).remove();
        } );
    }, 3000 );
}


window.task_count = function () {
    let number_of_tasks = 0;
    $( ".list-task-number" ).each( function () {
        number_of_tasks += parseInt( this.innerText );
    } );
    $( "#number-of-tasks" ).text( number_of_tasks );
}

// window.dropdown = function (event) {
//     console.log(event.currentTarget);
//     $(event.currentTarget).attr("data-dropdown-toggle");
//
//     $("#"+$(event.currentTarget).attr("data-dropdown-toggle")).slideToggle(200);
// }


// If you click sign out button, please be sure you are sure
window.sign_out = function () {

    $( "#sign_out_overlay" ).fadeIn( 300 );


    // if you are sure then redirect to sign_out.php file
    $( "#yes_sign_out" ).click( function () {

        window.location.replace( "http://localhost/todoology/app/sign_out.php" );
    } );

    // if you are not sure then hide alert
    $( "#no_sign_out" ).click( function () {

        $( "#sign_out_overlay" ).fadeOut( 300 );
    } );
}

