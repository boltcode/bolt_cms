<?php

class Application_Form_Login extends Zend_Form
{
	public function init()
	{
		$this->setName( 'form-login' )
			->setAction( 'login' )
			->setMethod( self::METHOD_POST )
			->addElements( $this->getFields() );
	}
	
	/**
	 * Retorna os elementos do formulário.
	 * 
	 * @return array $elements Array com os elementos do formulário.
	 */
	public function getFields()
	{
		$user = new Zend_Form_Element_Text( 'usuario' );
		$user->setLabel( 'Usuário' )
			->setRequired( true )
			->addFilter( new Zend_Filter_StripTags() )
			->addFilter( new Zend_Filter_StringTrim() )
			->addValidator( new Zend_Validate_NotEmpty() )
			->removeDecorator( 'HtmlTag' )
			->removeDecorator( 'DtDdWrapper' );
			
		$pass = new Zend_Form_Element_Password( 'senha' );
		$pass->setLabel( 'Senha' )
			->setRequired( true )
			->addFilter( new Zend_Filter_StripTags() )
			->addFilter( new Zend_Filter_StringTrim() )
			->addValidator( new Zend_Validate_NotEmpty() )
			->removeDecorator( 'HtmlTag' )
			->removeDecorator( 'DtDdWrapper' );
			
		$btSubmit = new Zend_Form_Element_Submit( 'Entrar' );
		
		$elements = array
		(
			$user,
			$pass,
			$btSubmit
		);
		
		return $elements;
	}
}