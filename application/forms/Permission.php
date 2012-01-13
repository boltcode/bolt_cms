<?php

class Application_Form_Permission extends Zend_Form
{
	public function init()
	{
		$this->setName( 'form-permissao' )
			->setAction( 'add' )
			->setMethod( self::METHOD_POST )
			->addElements( $this->getFields() );
	}
	
	private function getFields()
	{
		// Nome
		$name = new Zend_Form_Element_Text( 'nome' );
		$name->setLabel( 'Nome' )
			->setRequired( true )
			->removeDecorator( 'Htmltag' )
			->removeDecorator( 'DtDdWrapper' );
		
		// Botão Cadastrar
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