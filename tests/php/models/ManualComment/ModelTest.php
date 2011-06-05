<?php

require_once '../../tests/bootstrap.php';

class ManualComment_ModelTest extends Smut_Tests_ModelTestCase {

    private $model;
    
    protected function setUp() {
        $this->fixture( 'model-manualComment' );
        $this->model = $this->getModel( 'ManualComment' );
    }
    
    public function testFindforpageReturnsComments() {
        $comments = $this->model->findForPage( 'foo' );
        $this->assertEquals( 2, count($comments) );
    }
    
    public function testFindforpageReturnsNothingWhenNoPageSpecified() {
        $comments = $this->model->findForPage( '' );
        $this->assertEquals( 0, count($comments) );
    }
    
    public function testFindforpagewithemailReturnsOnlyCommentsForAPageThatHaveAnEmail() {
        $comments = $this->model->findForPageWithEmail( 'foo' );
        $this->assertEquals( 1, count($comments) );
    }
    
}
