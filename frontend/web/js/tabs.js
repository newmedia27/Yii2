$(document).ready(function () {
    $( '#myTab a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
    } );

    $( '#moreTabs a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
    } );
});
