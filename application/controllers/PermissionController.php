<?php

class PermissionController extends Zend_Controller_Action
{
	public function init()
	{
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
					$this->view->notificationMessage = 'Permissão cadastrada com sucesso!';
				}
				else
				{
					$this->view->notificationMessage = 'Erro ao cadastrar permissão';
				}
			}
		}
		
		$this->view->form = $form;
	}
}