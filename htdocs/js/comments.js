
if ( google && google.load ) {
    
    google.load( 'jquery', '1.6.1' );
    google.setOnLoadCallback(function() {

        var form = $( '.comments form' )
            .hide();
        var toggle = $( '<a></a>' )
            .addClass( 'toggle' )
            .html( 'Post a comment' )
            .insertBefore( form )
            .click(function() {
                toggle.remove();
                form.slideDown();
            });

    });

}
