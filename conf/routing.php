<?php

$this->addRoute( new Smut_Routing_BasicRoute('/manual/comments/:action',array(),array('controller'=>'manual')) );
$this->addRoute( new Smut_Routing_BasicRoute('/manual/:page',array(),array('controller'=>'manual')) );

$this->addRoute( new Smut_Routing_BasicRoute('/:controller/:id/:action',array(),array('controller'=>'manual')) );

$this->addRoute( new Smut_Routing_BasicRoute('/:controller/:id', array( 'id' => '\d+' ), array( 'action' => 'info' ) ) );

$this->addRoute( new Smut_Routing_BasicRoute('/:controller/:action') );

$this->addRoute( new Smut_Routing_BasicRoute('/:controller') );

$this->addRoute( new Smut_Routing_BasicRoute('/',array(),array('controller'=>'home')) );
