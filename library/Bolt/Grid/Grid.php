<?php

class Bolt_Grid_Grid
{
	private $body;
	private $header;
	
	public function __construct()
	{
		$this->body = '<table>';
	}
	
	/**
	 * Cria a estrutura do cabeçalho da grid.
	 * @param array $header Dados do cabeçalho.
	 */
	public function setHeader(array $header)
	{
		$i = 0;
		$this->header = '<tr>';
		while ( $i < ( sizeof( $header ) ) )
		{
			$this->header .= "<td style='width:" . $header[$i]->getWidth() . "px'>" . $header[$i]->getTitle() . "</td>";
			$i++;
		}
		
		$this->header .= '</tr>';
	}
	
	public function show()
	{
		$this->body .= $this->header;
		$this->body .= '</table>';
		
		return $this->body;
	}
}