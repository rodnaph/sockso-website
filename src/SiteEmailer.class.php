<?php

class SiteEmailer {
    
    /**
     * @var Smut_Config
     */
    private $config;
    
    /**
     * Create a new object for sending emails to site admin
     * 
     */
    public function __construct( Smut_Config $config ) {
        
        $this->config = $config;
        
    }
    
    /**
     * Send email with specified $subject and $message
     * 
     */
    public function send( $subject, $message ) {
        
        mail(
            $this->config->get( 'site.email' ),
            $subject,
            $message
        );

    }

    /**
     * Sends an email notification to the site admin that a new
     * comment has been posted on a manual page
     *
     */
    public function sendCommentEmails( Smut_Request $req ) {
        
        $this->send(
            'Comment posted on Sockso manual',
            "The {$req->page} page has just received a new comment.\n\n" .
                "http://sockso.pu-gh.com/manual/{$req->page}.html"
        );
    
    }
    
}
