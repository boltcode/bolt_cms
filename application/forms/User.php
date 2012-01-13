<?php

class Application_Form_User extends Zend_Form
{
	public function init()
	{
		$this->setName( 'form-user' )
			->setAction( 'add' )
			->setMethod( self::METHOD_POST )
			->addElements( $this->getFields() );
	}
	
	/**
	 * Retorna os elementos que o formulário irá conter
	 * 
	 * @return array $elements Elementos do form
	 */
	public function getFields()
	{
		// Nome
		$name = new Zend_Form_Element_Text( 'nome' );
		$name->setLabel( 'Nome' )
			->setRequired( true )
			->removeDecorator( 'HtmlTag' )
			->removeDecorator( 'DtDdWrapper' );
		
		// Usuário
		$user = new Zend_Form_Element_Text( 'usuario' );
		$user->setLabel( 'Usuário' )
			->setRequired( true );
			
		// Senha
		$password = new Zend_Form_Element_Password( 'senha' );
		$password->setLabel( 'Senha' )
			->setRequired( true )
			->removeDecorator( 'HtmlTag' )
			->removeDecorator( 'DtDdWrapper' );
			
		// Confirmação de senha
		$passwordConfirmation = new Zend_Form_Element_Password( 'confirmacao_senha' );
		$passwordConfirmation->setLabel( 'Confirmação de senha' )
			->setRequired( true )
			->removeDecorator( 'HtmlTag' )
			->removeDecorator( 'DtDdWrapper' );
			
		$group = new Zend_Form_Element_Select( 'grupo' );
		$group->setLabel( 'Grupo' )
			->addMultiOptions( $this->getGroups() )
			->removeDecorator( 'HtmlTag' )
			->removeDecorator( 'DtDdWrapper' );
			
		// Botão Cadastrar
		$btCadastrar = new Zend_Form_Element_Submit( 'Cadastrar' );
		$btCadastrar->removeDecorator( 'HtmlTag' );
			
		$elements = array
		(
			$name,
			$user,
			$password,
			$passwordConfirmation,
			$group,
			$btCadastrar
		);
		
		return $elements;
	}
	
	/**
	 * Retorna os grupos.
	 * 
	 * @return array groups Dados dos grupos
	 */
	private function getGroups()
	{
		$group = new Application_Model_Group();
		return $group->getGroups();
	}
}