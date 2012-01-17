<?php

class UserController extends Zend_Controller_Action
{
	public function init()
	{
		$this->_flashMessenger 	= $this->_helper->getHelper( 'FlashMessenger' );
		$this->view->messages	= $this->_flashMessenger->getMessages();
		
		$user = Zend_Auth::getInstance()->getIdentity();
		$this->view->user = $user;
		
		$this->_helper->layout->setLayout( 'backend' );
	}
	
	public function indexAction()
	{
		$this->view->testMessage = 'UserController - indexAction()';
	}
	
	public function addAction()
	{
		$form = new Application_Form_User();
		
		if ( $this->getRequest()->isPost() )
		{
			$data = $this->getRequest()->getPost();
			
			if ( $form->isValid( $data ) )
			{
				$user = new Application_Model_User();
				
				if ( $user->_insert( $data ) )
				{
					$message = 'Usuário cadastrado com sucesso!';
				}
				else
				{
					$message = 'Erro ao cadastrar usuário.';
				}
				
				$this->_helper->FlashMessenger( $message );
			}
		}
		
		$this->view->form = $form;
	}
}