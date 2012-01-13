<?php

class Application_Model_User extends Zend_Db_Table
{
	protected $_name = 'usuario';
	
	public function init()
	{
		date_default_timezone_set( 'America/Sao_Paulo' );
	}
	
	/**
	 * Insere um novo usuário.
	 * 
	 * @param array $data Dados do usuário.
	 * @return boolean
	 */
	public function _insert($data)
	{
		try
		{
			$user['nome'] 			= $data['nome'];
			$user['usuario']		= $data['usuario'];
			$user['senha']			= $data['senha'];
			$user['data_cadastro']	= date('Y-m-d H:i:s');
			$user['grupo_id']		= $data['grupo'];
			
			$this->insert( $user );
			return true;
		}
		catch ( Zend_Db_Exception $e )
		{
			return false;
		}
	}
}