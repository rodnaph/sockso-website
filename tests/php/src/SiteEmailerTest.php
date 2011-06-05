<?php

require '../../tests/bootstrap.php';

class SiteEmailerTeste extends Smut_Tests_ModelTestCase {
    
    private $mailer;
    
    protected function setUp() {
        global $oLoader;
        $this->mailer = $this->getMock(
            'SiteEmailer',
            array( 'send' ),
            array( new Smut_Config_String(), $oLoader )
        );
        $this->req = new Smut_Request_Console( new Smut_Log_None() );
        $this->req->page = 'foo';
    }
    
    public function testSiteAdminGetEmailedWhenNewCommentPosted() {
        $this->mailer->expects( $this->once() )
                     ->method( 'send' )
                     ->with( '', 'Comment posted on Sockso manual' );
        $this->mailer->sendCommentEmails( $this->req );
    }
    
    public function testOtherCommentersWhoEnteredTheirEmailsGetEmailedWhenRepliesPosted() {
        $comment = $this->getModel( 'ManualComment' );
        $comment->name = 'name';
        $comment->email = 'some@email.com';
        $comment->page = $this->req->page;
        $comment->body = 'blah';
        $comment->dateCreated = '2011-01-01';
        $comment->save();
        //
        $this->mailer->expects( $this->exactly(2) )
                     ->method( 'send' );
        $this->mailer->sendCommentEmails( $this->req );
    }
    
}
