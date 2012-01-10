<?php

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	// Apenas enquanto o layout inicial não está finalizado.
    	$this->_helper->layout->setLayout( 'backend' );
    }
}

