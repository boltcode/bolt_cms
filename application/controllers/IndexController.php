<?php

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
        if ( !Zend_Auth::getInstance()->hasIdentity() )
        {
        	return $this->_redirect( 'login/login' );
        }
    }

    public function indexAction()
    {
    	// Apenas enquanto o layout inicial não está finalizado.
    	$this->_helper->layout->setLayout( 'backend' );
    	$this->_redirect( 'group/add' );
    }
}

