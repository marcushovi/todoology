
export class Utilities {

    constructor() {
    }

    static handleResponse( response ) {
        $( "body" ).append( response.message );
        reloadJS();
        if ( response.success === 1 ) {
            setTimeout( function () {
                reloadLists();
            }, 500 );
        }
    }

    static loadList( id_list= "-1") {


        const id_user = $( "input[name='id_user']" ).val();


        let form_data = {
            "id_user": id_user,
            "id_list": id_list,
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

                // reloadJS();

            }

        } );
    }

    static get_list_menu(){

        const id_user = $( "input[name='id_user']" ).val();

        let form_data = {
            "id_user": id_user,
        };

        form_data = JSON.stringify( form_data );

        $.ajax( {
            url: "http://localhost/todo/app/lists_get.php",
            method: "POST",
            data: form_data,
            contentType: "application/json; charset=UTF-8",
            cache: false,
            processData: false,
            success: function ( response ) {
                // console.log( response)
                response = JSON.parse( response );
                $( "#list_menu" ).html( $.parseHTML( response.data ) );
                // $("#list-container").append(response.data);
                // reloadJS();

            }

        } );

    }

}