<?php
/**
 * Manual controller shows pages from the manual, which can be
 * commented on by users.
 *
 */
class Manual_Controller extends Default_Controller {
    
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

        if ( $this->poster->post($req) ) {
            $this->getSession()
                 ->flash( 'commentSaved', true );
            $this->sendEmailNotification();
        }
        
        $this->redirect(
            'index.php?controller=manual&page=' . urlencode($req->page) . '#comments'
        );
        
    }
    
    /**
     * Sends an email notification to the site admin that a new
     * comment has been posted on a manual page
     *
     */
    protected function sendEmailNotification() {
        
        $req = $this->getRequest();
        
        $this->emailer->send(
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
