<?php

class Application_Form_Group extends Zend_Form
{
	public function init()
	{
		$this->setName( 'form-group' )
			->setAction( 'add' )
			->setMethod( self::METHOD_POST )
			->addElements( $this->getFields() );
	}
	
	public function getFields()
	{
		// Nome
		$name = new Zend_Form_Element_Text( 'nome' );
		$name->setLabel( 'Nome' )
			->setRequired( true )
			->removeDecorator( 'HtmlTag' )
			->removeDecorator( 'DtDdWrapper' );
		
		// Bot�o Cadastrar
		$btCadastrar = new Zend_Form_Element_Submit( 'Cadastrar' );
		
		$btCadastrar->removeDecorator( 'HtmlTag' );
		
		$elements = array
		(
			$name,
			$btCadastrar
		);
		
		return $elements;
	}
}