<?php

class Ios_Controller extends Comment_Controller {

    /**
     * Show the index page with comments
     *
     */
    public function doIndex() {
    
        $this->render( 'index', array(
            'comments' => $this->getComments( 'page-ios' )
        ));
    
    }

}

