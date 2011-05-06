<?php
/**
 * Shows info about the Sockso source code
 * 
 */
class Source_Controller extends Default_Controller {

    const RECENT_COMMITS_URL = 'source.recentCommitsUrl';
    const RECENT_COMMITS_CACHE_FILE = 'sourceCommits.cache';
    const RECENT_COMMITS_CACHE_TIMEOUT = 3600;

    /**
     * @var Smut_Cache_CacheCreator
     */
    private $cacheCreator;

    /**
     * @var Smut_Config
     */
    private $config;

    /**
     * Set the cache creator object
     *
     * @inject
     *
     * @param Smut_Cache_Creator $cacheCreator
     * @param Smut_Config $config
     */
    public function setDependencies( Smut_Cache_Creator $cacheCreator, Smut_Config $config ) {

        $this->cacheCreator = $cacheCreator;
        $this->config = $config;

    }

    /**
     * Show the index page with source info and recent commits
     * 
     */
    public function doIndex() {

        $this->render( 'index', array(
            'commits' => $this->getRecentCommits()
        ));
        
    }

    /**
     * Fetches simple xml object of recent commit data
     *
     * @return SimpleXml
     */
    private function getRecentCommits() {

        $url = $this->config->get( self::RECENT_COMMITS_URL );
        $cache = $this->cacheCreator->getFileCache(
            self::RECENT_COMMITS_CACHE_FILE,
            self::RECENT_COMMITS_CACHE_TIMEOUT
        );

        if ( !$cache->isCached() ) {
            $data = $this->getUrlData( $url );
            $cache->write( $data );
        }

        return simplexml_load_string( $cache->read() );

    }

}
