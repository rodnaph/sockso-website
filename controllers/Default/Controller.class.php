<?php

class Default_Controller extends Smut_Controller_Standard {

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
        $data = curl_exec( $ch );
        curl_close( $ch );

        return $data;

    }

}