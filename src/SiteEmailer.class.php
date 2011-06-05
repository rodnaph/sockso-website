<?php
/**
 * Handles sending out emails for various things
 * 
 */
class SiteEmailer {
    
    /**
     * @var Smut_Config
     */
    private $config;
    
    /**
     * @var Smut_Loader
     */
    private $loader;
    
    /**
     * Create a new object for sending emails to site admin
     * 
     */
    public function __construct( Smut_Config $config, Smut_Loader $loader ) {
        
        $this->config = $config;
        $this->loader = $loader;
        
    }
    
    /**
     * Send email with specified $subject and $message
     * 
     */
    public function send( $email, $subject, $message ) {
        
        mail( $email, $subject, $message );

    }

    /**
     * Sends an email notification to the site admin that a new
     * comment has been posted on a manual page
     *
     */
    public function sendCommentEmails( Smut_Request $req ) {
        
        $page = $req->page;
        
        $this->sendAdminNotification( $page );
        $this->sendReplyNotifications( $page );
        
    }

    /**
     * Sends email to site admin to notify of new comment
     * 
     */
    protected function sendAdminNotification( $page ) {
        
        $this->send(
            $this->config->get( 'site.email' ),
            'Comment posted on Sockso manual',
            "The {$page} page has just received a new comment.\n\n" .
                "http://sockso.pu-gh.com/manual/{$page}.html"
        );
    
    }
    
    /**
     * Sends emails to users who have also commented to notify them of another
     * reply to the thread.
     * 
     */
    protected function sendReplyNotifications( $page ) {
        
        $emails = $this->getCommentReplyEmails( $page );
        $subject = 'Sockso Manual Reply Posted';
        $message = "The {$page} page on the Sockso manual which you left a comment on has just received another reply.\n\n" .
                "http://sockso.pu-gh.com/manual/{$page}.html\n\n" .
                "Sockso.";
        
        foreach ( $emails as $email ) {
            $this->send( $email, $subject, $message );
        }
        
    }
    
    /**
     * Returns emails of users who posted a comment to a page and left their email
     * 
     * @return array
     */
    protected function getCommentReplyEmails( $page ) {
        
        $comments = $this->loader->getClass( 'ManualComment_Model' )
                                 ->findForPageWithEmail( $page );
        $emails = array();
        
        foreach ( $comments as $comment ) {
            $emails[ $comment->email ] = 1;
        }
        
        return array_keys( $emails );
        
    }
    
}
