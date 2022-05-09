window.reload_page =  function(id_list='-2') {
    window.load_list(id_list);
    window.get_list_menu();

}
window.reload_list =  function(id_list) {
     window.load_list(id_list);
}

$( document ).ready( function () {
    window.reload_page();

} );





