<?php

/**
 * The Render Core of Templater Class
 * @author Lucas Mendes de Freitas (devsdmf)
 * @since 2012
 * @copyright Copyright 2012 (c) SDMF Development Systems (devsdmf.net)
 * @category Templater
 * @package Templater
 *
 */

class Templater_Render implements Templater_Render_Interface
{
	/**
	 * Var to store the actual templater file
	 * @var string
	 */
	protected $templaterFile = null;
	/**
	 * Var to store the actual data to render in template
	 * @var array
	 */
	protected $data = null;
	/**
	 * Var to store the content of template
	 * @var string
	 */
	protected $content = null;
	/**
	 * Var to store the handler returned by fopen() function
	 * @var handler
	 */
	protected $handle = null;
	/**
	 * Var to store the instance of Exception Handler of Templater Class
	 * @var Templater_Exception
	 */
	protected $_exception = null;
	/**
	 * The constructor method
	 */
	public function __construct()
	{
		$this->_exception = new Templater_Exception();
	}
	/**
	 * Method to set the template file and open
	 * @see library/Templater/Render/Templater_Render_Interface::setTemplate()
	 * @return void
	 */
	function setTemplate( $file = null )
	{
		$this->templaterFile = $file;
		$this->handle = fopen($this->templaterFile, "r");
	}
	/**
	 * Method to get the original content of template
	 * @see library/Templater/Render/Templater_Render_Interface::getHTML()
	 * @return string
	 */
	function getHTML()
	{
		if($this->verifyOpen())
		{
			while($data = fgets($this->handle))
			{
				$this->content .= $data . PHP_EOL;
			}
			return $this->content;
		} else
			$this->_exception->triggerException(222);
	}
	/**
	 * Method to set the data to render in template
	 * @see library/Templater/Render/Templater_Render_Interface::setData()
	 * @return void
	 */
	function setData(array $data)
	{
		if(!is_array($data))
			$this->_exception->triggerException(333);
		else
			$this->data = $data;
	}
	/**
	 * Method to render the data in template
	 * @see library/Templater/Render/Templater_Render_Interface::renderContent()
	 * @return string
	 */
	function renderContent()
	{
		if($this->data == null)
			$this->_exception->triggerException(334);
		if(!is_array($this->data))
			$this->_exception->triggerException(333);
		if(!$this->verifyOpen())
			$this->_exception->triggerException(222);
		if($this->content == null)
			$this->_exception->triggerException(444);
		
		foreach($this->data as $tag => $value)
		{
			$this->content = str_replace("%%" . $tag . "%%", $value, $this->content);
		}
		
		return $this->content;
	}
	/**
	 * Method to return the content of template rendered
	 * @return string
	 */
	function getContent()
	{
		return $this->content;
	}
	/**
	 * Method to verify if templater has been correctly open
	 * @return boolean
	 */
	protected function verifyOpen()
	{
		if($this->handle != null)
			return true;
		else
			return false;
	}
}