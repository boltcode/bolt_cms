<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	/**
	 * Layout do sistema.
	 */
	public function _initLayout()
	{
		Zend_Layout::startMvc(
			array(
				'layout'		=> 'frontend',
				'layoutPath'	=> APPLICATION_PATH . '/views/scripts/layouts'
			)
		);
	}
	
	/**
	 * Inicia o autoloader para carregar as classes dinamicamente em tempo de execu��o ao instanciar um objeto.
	 */
	public function _initAutoloader()
	{
		require_once 'Zend/Loader/Autoloader.php';
		$loader = Zend_Loader_Autoloader::getInstance();
		$loader->setFallbackAutoloader( true );
	}
	
	/**
	* Setar o idioma pt-BR nas mensagens de valida��o.
	* Obs: Para funcionar corretamente, � necess�rio copiar o diret�rio 'resources\languages' para o diret�rio 'application' do projeto.
	*/
	protected function _initTranslate()
	{
		try
		{
			$translate = new Zend_Translate(
				'Array',
				APPLICATION_PATH . '/languages/pt_BR/Zend_Validate.php',
				'pt_BR'
			);
	
			Zend_Validate_Abstract::setDefaultTranslator( $translate );
		}
		catch( Exception $e )
		{
			die( $e->getMessage() );
		}
	}
}