
if ( google && google.load ) {
    
    google.load( 'jquery', '1.6.1' );
    google.setOnLoadCallback(function() {

        var form = $( '.comments form' )
            .hide();
        var toggle = $( '<a></a>' )
            .html( 'Post a comment' )
            .click(function() {
                toggle.parent()
                      .remove();
                form.slideDown();
            });

        $( '<li></li>' )
            .addClass( 'toggle' )
            .append( toggle )
            .prependTo( '.comments ul.links' );

    });

}
