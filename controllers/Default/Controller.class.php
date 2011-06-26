<?php

class Default_Controller extends Smut_Controller_Standard {

    /**
     * Default index action just renders template
     * 
     */
    public function doIndex() {
        
        $this->render( 'index' );
        
    }
    
    /**
     * Fetches data from the URL via CURL
     *
     * @param string $url
     *
     * @return string
     */
    protected function getUrlData( $url ) {

        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 5 );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
        $data = curl_exec( $ch );
        curl_close( $ch );

        return $data;

    }

}