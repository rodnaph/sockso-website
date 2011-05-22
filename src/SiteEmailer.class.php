<?php

class SiteEmailer {
    
    /**
     * @var Smut_Config
     */
    private $config;
    
    /**
     * Create a new object for sending emails to site admin
     * 
     * @param Smut_Config $config 
     */
    public function __construct( Smut_Config $config ) {
        
        $this->config = $config;
        
    }
    
    /**
     * Send email with specified $subject and $message
     * 
     * @param type $subject
     * @param type $message 
     */
    public function send( $subject, $message ) {
        
        mail(
            $this->config->get( 'site.email' ),
            $subject,
            $message
        );
            
    }
    
}
