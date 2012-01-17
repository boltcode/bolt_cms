<?php

class PermissionController extends Zend_Controller_Action
{
	public function init()
	{
		$this->_flashMessenger 	= $this->_helper->getHelper( 'FlashMessenger' );
		$this->view->messages	= $this->_flashMessenger->getMessages();
		
		$user = Zend_Auth::getInstance()->getIdentity();
		$this->view->user = $user;
		
		$this->_helper->layout->setLayout( 'backend' );
	}
	
	public function addAction()
	{	
		$form = new Application_Form_Permission();
		
		if ( $this->getRequest()->isPost() )
		{
			$data = $this->getRequest()->getPost();
			
			if ( $form->isValid( $data ) )
			{
				$permission = new Application_Model_Permission();
				
				if ( $permission->_insert( $data ) )
				{
					$message = 'Permissão cadastrada com sucesso!';
				}
				else
				{
					$message = 'Erro ao cadastrar permissão';
				}
				
				$this->_helper->FlashMessenger( $message );
			}
		}
		
		$this->view->form = $form;
	}
}