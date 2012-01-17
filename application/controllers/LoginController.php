<?php

class LoginController extends Zend_Controller_Action
{
	public function init()
	{
		$this->_flashMessenger 	= $this->_helper->getHelper( 'FlashMessenger' );
		$this->view->messages	= $this->_flashMessenger->getMessages();
		
		$this->_helper->layout->setLayout( 'login' );
	}
	
	/**
	 * Quando o controller for iniciado, redireciona para a tela de login
	 */
	public function indexAction()
	{	
		$this->_helper->redirector( 'login' );
	}
	
	/**
	 * Efetua o login.
	 */
	public function loginAction()
	{
		$form = new Application_Form_Login();
		
		if ( $this->getRequest()->isPost() )
		{
			$data = $this->getRequest()->getPost();
			
			if ( $form->isValid( $data ) )
			{
				$usuario	= $form->getValue( 'usuario' );
				$senha		= $form->getValue( 'senha' );
				
				$dbAdapter 		= Zend_Db_Table::getDefaultAdapter();
				$authAdapter	= new Zend_Auth_Adapter_DbTable( $dbAdapter );
				
				$authAdapter->setTableName( 'usuario' )
					->setIdentityColumn( 'usuario' )
					->setCredentialColumn( 'senha' );
					
				$authAdapter->setIdentity( $usuario )
					->setCredential( $senha );
					
				$auth = Zend_Auth::getInstance();
				
				$result = $auth->authenticate( $authAdapter );
				
				if ( $result->isValid() )
				{
					$info = $authAdapter->getResultRowObject( null, 'senha' );
					$storage = $auth->getStorage();
					$storage->write( $info );
					
					return $this->_helper->redirector->goToRoute( array( 'controller', 'group' ), null, true );
				}
				else
				{
					$this->_helper->FlashMessenger( 'Usuário ou senha inválidos!' );
				}
			}
		}
		
		$this->view->form = $form;
	}
	
	/**
	 * Efetua o logout.
	 */
	public function logoutAction()
	{
		$auth = Zend_Auth::getInstance();
		$auth->clearIdentity();
		
		return $this->_helper->redirector( 'login' );
	}
}