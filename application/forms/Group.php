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
		
		// TESTE
		$teste = new Zend_Form_Element_Select( 'teste' );
		$teste->setLabel( 'Teste' )
			->addMultiOptions( array
				(
					'1'=>'Teste01',
					'2'=>'Teste 02',
					'3'=>'Teste 03',
					'4'=>'Teste 04'
				));
		
		$name2 = new Zend_Form_Element_Text( 'nome2' );
		$name2->setLabel( 'Nome' )
		->setRequired( true );
		
		$name3 = new Zend_Form_Element_Text( 'nome3' );
		$name3->setLabel( 'Nome' )
		->setRequired( true );
		
		$elements = array
		(
			$name,
			$name2,
			$name3,
			$teste,
			$btSubmit
		);
		
		return $elements;
	}
}