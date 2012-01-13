<?php

class Bolt_Grid_Header
{
	private $title;
	private $width;
	
	public function __construct($title, $width)
	{
		$this->setTitle( $title );
		$this->setWidth( $width );
	}
	
	private function setTitle($title)
	{
		$this->title = $title;
	}

	private function setWidth($width)
	{
		$this->width = $width;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getWidth()
	{
		return $this->width;
	}
}