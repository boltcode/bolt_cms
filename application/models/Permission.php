<?php

class Application_Model_Permission extends Zend_Db_Table
{
	protected $_name = 'permissao';
	
	public function init()
	{
		date_default_timezone_set( 'America/Sao_Paulo' );
	}
	
	/**
	 * Insere uma nova permissão.
	 * @param array $data Dados da permissão.
	 */
	public function _insert($data)
	{
		try
		{
			$permission['nome'] 			= $data['nome'];
			$permission['data_cadastro']	= date( 'Y-m-d H:i:s' );
			
			$this->insert( $permission );
			return true;
		}
		catch ( Zend_Db_Exception $e )
		{
			return false;
		}
	}
}