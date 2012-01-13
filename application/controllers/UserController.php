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
		$form = new Application_Form_User();
		
		if ( $this->getRequest()->isPost() )
		{
			$data = $this->getRequest()->getPost();
			
			if ( $form->isValid( $data ) )
			{
				$user = new Application_Model_User();
				
				if ( $user->_insert( $data ) )
				{
					$this->view->notificationMessage = 'Usuário cadastrado com sucesso!';
				}
				else
				{
					$this->view->notificationMessage = 'Erro ao cadastrar usuário.';
				}
			}
		}
		
		$this->view->form = $form;
	}
}