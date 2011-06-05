<?php

$comment1 = $this->getModel( 'ManualComment' );
$comment1->page = 'foo';
$comment1->name = 'blah';
$comment1->email = 'foo@bar.com';
$comment1->dateCreated = '2011-01-01';
$comment1->save();

$comment2 = $this->getModel( 'ManualComment' );
$comment2->page = 'foo';
$comment2->name = 'blah';
$comment2->email = '';
$comment2->dateCreated = '2011-01-02';
$comment2->save();

$comment3 = $this->getModel( 'ManualComment' );
$comment3->page = 'foobar';
$comment3->name = 'blah';
$comment3->email = 'foo@bar.com';
$comment3->dateCreated = '2011-01-03';
$comment3->save();
