<?php

class GroupController extends Zend_Controller_Action
{
	
	public function init()
	{
		$this->_flashMessenger 	= $this->_helper->getHelper( 'FlashMessenger' );
		$this->view->messages	= $this->_flashMessenger->getMessages();
		
		$user = Zend_Auth::getInstance()->getIdentity();
		$this->view->user = $user;
		
		$this->_helper->layout->setLayout( 'backend' );
	}
	
	/**
	 * Exibe a listagem dos grupos cadastrados.
	 */
	public function indexAction()
	{
		$grid = new Bolt_Grid_Grid( 'grupo' );
		
		$grid->addColumn( 'Código', 'id', 50 );
		$grid->addColumn( 'Nome', 'nome', 90 );
		
		$this->view->grid = $grid->show();
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
					$message = 'Grupo cadastrado com sucesso!';
				}
				else
				{
					$message = 'Erro ao cadastrar grupo!';
				}
				
				$this->_helper->FlashMessenger( $message );
			}
		}
		
		$this->view->form = $form;
	}
}