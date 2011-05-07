<?php

class CommunityHistory_Model extends Default_Model {

    /**
     * Finds a servers ping history for the last 3 months
     *
     * @param int $id
     *
     * @return array
     */
    public function findByActiveId( $id ) {

        $sinceDate = date( 'Y-m-d H:i:s', strtotime('-3 months') );

        return $this->createQuery()
                    ->where( 'active_id', '=', $id )
                    ->where( 'dateUpdated', '>', $sinceDate )
                    ->orderBy( 'dateUpdated', 'asc' )
                    ->find();
        
    }

}
