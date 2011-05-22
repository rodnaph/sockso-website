<?php
/**
 * Manual controller shows pages from the manual, which can be
 * commented on by users.
 *
 */
class Manual_Controller extends Default_Controller {
    
    const DEFAULT_PAGE = 'index';

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
    
    /**
     * Handle saving a post if all the data is specified and the
     * captcha is completed successfully
     *
     */
    public function doPost() {
            
        $req = $this->getRequest();
    
        if ( $this->formDataOk() && $this->captchaOk() ) {
            $this->saveComment();
        }
        
        $this->redirect(
            'index.php?controller=manual&page=' . urlencode($req->page) . '#comments'
        );
        
    }
    
    /**
     * Indicates if the form data provided by the user is ok
     * for saving a new comment
     *
     * @return bool
     */
    protected function formDataOk() {
    
        $req = $this->getRequest();
        
        return ( $req->name && $req->comment && $req->page );
    
    }
    
    /**
     * Indicates if the user has filled in the captcha ok
     *
     * @return bool
     */
    protected function captchaOk() {
    
        $req = $this->getRequest();
        
        return ( strtolower($req->captcha2) == trim(strtolower($req->captcha)) );
    
    }
    
    /**
     * Saves a comment and sets a flash message
     *
     */
    protected function saveComment() {
    
        $req = $this->getRequest();
    
        $comment = $this->getModel( 'ManualComment' );
        $comment->page = $req->page;
        $comment->name = $req->name;
        $comment->email = $req->email;
        $comment->body = $req->comment;
        $comment->dateCreated = date( 'Y-m-d H:i:s' );
        $comment->save();
        
        $this->getSession()
             ->flash( 'commentSaved', true );
             
        $this->sendEmailNotification();
        
    }
    
    /**
     * Sends an email notification to the site admin that a new
     * comment has been posted on a manual page
     *
     */
    protected function sendEmailNotification() {
        
        $req = $this->getRequest();
        $config = $this->getConfig();
        
        mail(
            $config->get( 'site.email' ),
            'Comment posted on Sockso manual',
            "The {$req->page} page has just received a new comment.\n\n" .
            "http://sockso.pu-gh.com/manual/{$req->page}.html"
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
