<?php
/**
 * Manual controller shows pages from the manual, which can be
 * commented on by users.
 *
 */
class Manual_Controller extends Comment_Controller {
    
    /**
     * The index action shows the requested page, or defaults
     * to the index page.
     *
     */    
    public function doIndex() {
        
        $req = $this->getRequest();
        $page = $req->getParam( 'page', self::DEFAULT_PAGE );
        
        $this->render( $page, array(
            'comments' => $this->getComments( $page ),
            'page' => $page
        ));

    }
    
}

