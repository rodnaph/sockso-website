<?php
/**
 * Model that stores comments for manual pages
 *
 */
class ManualComment_Model extends Default_Model {

    /**
     * Find comments for a page, newest first
     *
     * @return array
     */    
    public function findForPage( $page ) {
        
        return $this->getFindForPageQuery( $page )
                    ->find();
        
    }
    
    /**
     * Returns query to find comments for a page
     * 
     * @return Smut_Model_Query
     */
    protected function getFindForPageQuery( $page ) {
        
        return $this->createQuery()
                    ->where( 'page', '=', $page )
                    ->orderBy( 'dateCreated', 'desc' );

    }
    
    /**
     * Find comments for a page with an email specified
     * 
     * @return array
     */
    public function findForPageWithEmail( $page ) {
        
        return $this->getFindForPageQuery( $page )
                    ->where( 'email', '!=', '' )
                    ->find();
        
    }
    
}
