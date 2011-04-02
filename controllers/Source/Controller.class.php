<?php

class Source_Controller extends Default_Controller {

    private $commitsRssUrl = 'https://github.com/rodnaph/sockso/commits/master.atom';

    public function doIndex() {

        $this->render( 'index', array(
            'commits' => $this->getRecentCommits()
        ));
        
    }

    private function getRecentCommits() {
        
        $data = $this->getUrlData( $this->commitsRssUrl );
        $xml = simplexml_load_string( $data );
        $commits = array();


        return $commits;

    }

}
