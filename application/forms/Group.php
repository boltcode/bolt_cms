<?php

class Application_Form_Group extends Zend_Form
{
	public function init()
	{
		$this->setName( 'form-group' )
			->setAction( 'add' )
			->setMethod( 'post' )
			->addElements( $this->getFields() );
	}
	
	public function getFields()
	{
		// Nome
		$name = new Zend_Form_Element_Text( 'nome' );
		$name->setLabel( 'Nome' )
			->setRequired( true );
		
		// Botão Cadastrar
		$btSubmit = new Zend_Form_Element_Submit( 'Cadastrar' );
		
		$elements = array
		(
			$name,
			$btSubmit
		);
		
		return $elements;
	}
}