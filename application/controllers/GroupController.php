<?php

class GroupController extends Zend_Controller_Action
{
	
	public function init()
	{
		$this->_helper->layout->setLayout( 'backend' );
	}
	
	/**
	 * Exibe a listagem dos grupos cadastrados.
	 */
	public function indexAction()
	{
		$this->view->testMessage = 'GroupController - indexAction()';
	}
	
	public function permissionsAction()
	{
		$this->view->testMessage = 'GroupController - permissionsAction()';
	}
	
	/**
	 * Exibe o formulário de cadastro dos grupos.
	 */
	public function addAction()
	{
		$form = new Application_Form_Group();
		
		if ( $this->getRequest()->isPost() )
		{
			$data = $this->getRequest()->getPost();
			
			if ( $form->isValid( $data ) )
			{
				$group = new Application_Model_Group();
				
				if ( $group->_insert( $data ) )
				{
					$this->view->notificationMessage = 'Grupo cadastrado com sucesso!';
				}
				else
				{
					$this->view->notificationMessage = 'Erro ao cadastrar grupo!';
				}
			}
		}
		
		$this->view->form = $form;
	}
}