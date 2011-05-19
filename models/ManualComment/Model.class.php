<?php
/**
 * Model that stores comments for manual pages
 *
 */
class ManualComment_Model extends Default_Model {

    /**
     * Find comments for a page, newest first
     *
     * @param string $page
     */    
    public function findForPage( $page ) {
        
        return $this->createQuery()
                    ->where( 'page', '=', $page )
                    ->orderBy( 'dateCreated', 'desc' )
                    ->find();
        
    }
    
}
