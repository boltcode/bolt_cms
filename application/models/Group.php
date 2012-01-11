<?php

class Application_Model_Group extends Zend_Db_Table
{
	protected $_name = 'grupo';
	
	public function init()
	{
		date_default_timezone_set( 'America/Sao_Paulo' );
	}
	
	/**
	 * Inserir um grupo.
	 * 
	 * @param array $data	Dados do grupo.
	 * @return boolean
	 */
	public function _insert($data)
	{
		try
		{
			unset( $data['Cadastrar'] );
			
			$data['data_cadastro'] = date('Y-m-d H:i:s');
			
			$this->insert( $data );
			return true;
		}
		catch ( Zend_Db_Exception $e )
		{
			return false;
		}
	}
}