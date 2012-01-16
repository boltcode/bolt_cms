<?php

class Bolt_Grid_Grid extends Zend_Db_Table
{
	protected $_name;
	
	private $dom;
	private $columnLabel	= array();
	private $columnRegister	= array();
	private $columnWidth	= array();
	
	public function __construct($table)
	{
		$this->_name	= $table;
		$this->dom		= new DOMDocument();
	}
	
	/**
	 * Configuração das colunas da grid.
	 * 
	 * @param string $label		Título da coluna.
	 * @param string $field		Campo da tabela que deve ser listado na coluna.
	 * @param integer $width	Largura da coluna em px.
	 */
	public function addColumn($label, $field, $width = 50)
	{
		$this->columnLabel[]	= $label;
		$this->columnRegister[]	= $field;
		$this->columnWidth[]	= $width;
	}
	
	/**
	 * Cria a estrutura do cabealho da grid.
	 */
	public function createHeader()
	{
		$table = $this->dom->createElement( 'table' );
		$table = $this->dom->appendChild( $table );
		
		$tr = $this->dom->createElement( 'tr' );
		$tr = $table->appendChild( $tr );
		
		$i = 0;
		
		while ( $i < count( $this->columnLabel ) )
		{
			$td = $this->dom->createElement( 'td', $this->columnLabel[$i] );
			$td = $tr->appendChild( $td );
			
			$i++;
		}
	}
	
	public function query()
	{
		try
		{
			$teste = 'teste';
			
			var_dump( $teste );
			exit();
		}
		catch ( Zend_Db_Exception $e )
		{
			echo $e->getMessage();
		}
	}
	
	public function show()
	{
		$this->query();
		$this->createHeader();
		return $this->dom->saveHTML();
	}
}