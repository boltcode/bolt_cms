<?php

class UserController extends Zend_Controller_Action
{
	public function init()
	{
		$this->_helper->layout->setLayout( 'backend' );
	}
	
	public function indexAction()
	{
		$this->view->testMessage = 'UserController - indexAction()';
	}
	
	public function addAction()
	{
		
	}
}