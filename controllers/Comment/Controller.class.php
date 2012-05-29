<?php

class Comment_Controller extends Default_Controller {

    const DEFAULT_PAGE = 'index';

    /**
     * @var CommentPoster
     */
    private $poster;
    
    /**
     * @var SiteEmailer
     */
    private $emailer;
    
    /**
     * Sets controller dependencies
     * 
     * @inject
     * 
     * @param CommentPoster $poster 
     * @param SiteEmailer $emailer
     */
    public function init( CommentPoster $poster, SiteEmailer $emailer ) {
        
        $this->poster = $poster;
        $this->emailer = $emailer;
        
    }

    /**
     * Handle saving a post if all the data is specified and the
     * captcha is completed successfully
     *
     */
    public function doPost() {
            
        $req = $this->getRequest();
        $commentWasPosted = $this->poster->post( $req );

        if ( $commentWasPosted ) {
            $this->getSession()
                 ->flash( 'commentSaved', true );
            $this->emailer
                 ->sendCommentEmails( $req );
        }
        
        $this->redirect(
            $_SERVER[ 'HTTP_REFERER' ] . '#comments'
        );
        
    }
     /**
     * Returns the comments for the specified page, but only
     * if we're not on the index page
     *
     * �@return array
     */
    protected function getComments( $page ) {
        
        return $page == self::DEFAULT_PAGE
            ? array()
            : $this->getModel( 'ManualComment' )
                   ->findForPage( $page );
        
    }

}

