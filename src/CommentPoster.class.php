<?php
/**
 * Class to handle posting comments for manual pages
 *
 */
class CommentPoster {
    
    /**
     * @var Smut_Loader
     */
    private $loader;
    
    /**
     * Create new comment poster
     * 
     * @param Smut_Loader $loader 
     */
    public function __construct( Smut_Loader $loader ) {
        
        $this->loader = $loader;
        
    }
    
    /**
     * Handle saving a post if all the data is specified and the
     * captcha is completed successfully
     *
     * @return bool
     */
    public function post( Smut_Request $req ) {
            
        if ( $this->formDataOk($req) && $this->captchaOk($req) ) {
            $this->saveComment($req);
            return true;
        }
        
        return false;
        
    }
    
    /**
     * Indicates if the form data provided by the user is ok
     * for saving a new comment
     *
     * @param Smut_Request $req
     * 
     * @return bool
     */
    protected function formDataOk( Smut_Request $req ) {
    
        return ( $req->name && $req->comment && $req->page );
    
    }
    
    /**
     * Indicates if the user has filled in the captcha ok
     *
     * @param Smut_Request $req
     * 
     * @return bool
     */
    protected function captchaOk( Smut_Request $req ) {
    
        return ( strtolower($req->captcha2) == trim(strtolower($req->captcha)) );
    
    }
    
    /**
     * Saves a comment and sets a flash message
     *
     * @param Smut_Request $req
     */
    protected function saveComment( Smut_Request $req ) {
    
        $comment = $this->loader->getClass( 'ManualComment_Model' );
        $comment->page = $req->page;
        $comment->name = $req->name;
        $comment->email = $req->email;
        $comment->body = $req->comment;
        $comment->dateCreated = date( 'Y-m-d H:i:s' );
        $comment->save();
        
    }
    
}
