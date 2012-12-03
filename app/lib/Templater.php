<?php
/**
 * PATH OF TEMPLATER MODULE
 * @var string
 */
define("TEMPLATER_PATH", dirname(__FILE__) . '/Templater/');
/**
 * PATH OF TEMPLATER OF TEMPLATER MODULE
 * @var string
 */
define("TEMPLATER_TEMPLATE_PATH", TEMPLATER_PATH . 'Templates/');

/**
 * Templater Module for easyly management of html content for mail templates
 * @author Lucas Mendes de Freitas (devsdmf)
 * @since 2012
 * @copyright Copyright (c) 2012 SDMF Development Systems (devsdmf.net)
 * @category Templater
 * @package Templater
 *
 */

class Templater extends Templater_Abstract implements Templater_Interface
{
	/**
	 * Var to store the actual template
	 * @var string
	 */
	protected $_template = null;
	/**
	 * Var to store the actual data to insert on tempalte
	 * @var Array
	 */
	protected $_data = null;
	/**
	 * Var to store the content of template rendered
	 * @var string
	 */
	protected $_content = null;
	/**
	 * Var to store the instance of Templater_Render
	 * @var Templater_Render
	 */
	protected $_render = null;
	/**
	 * Var to store the instance of Templater_Exception handler
	 * @var Templater_Exception
	 */
	protected $_exception = null;
	/**
	 * Var to control the instance of Templater Class using Singleton pattern
	 * @var Templater
	 */
	protected static $_instance = null;
	/**
	 * The constructor method
	 * @access protected
	 */
	protected function __construct()
	{
		$this->_render = new Templater_Render();
		$this->_exception = new Templater_Exception();
	}
	/**
	 * Method to lock on singleton pattern
	 */
	protected function __clone()
	{}
	/**
	 * Static Method to get the Instance of this class
	 * @return Templater
	 */
	static function getInstance()
	{
		if(!self::$_instance instanceof Templater)
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	/**
	 * Method to get the HTML content rendered on template
	 * @see library/Templater/Templater_Interface::getTemplate()
	 * @return string
	 */
	function getTemplate($file = parent::DEFAULT_TEMPLATE , array $data)
	{
		$this->verifyInstance();
		$this->setTemplate($file);
		$this->setData($data);
		return $this->render();
	}
	/**
	 * Method to set the actual template
	 * @see library/Templater/Templater_Interface::setTemplate()
	 * @return void
	 */
	function setTemplate($file = parent::DEFAULT_TEMPLATE)
	{
		$this->verifyInstance();
		$this->_template = $file . '.' . parent::DEFAULT_TEMPLATE_EXT;
	}
	/**
	 * Method to set the data to render in template
	 * @param array $data
	 * @return void
	 */
	function setData( array $data )
	{
		$this->verifyInstance();
		$this->_data = $data;
	}
	/**
	 * Method to render the template
	 * @see library/Templater/Templater_Interface::render()
	 * @return string
	 */
	function render()
	{
		$this->verifyInstance();
		$this->_render->setTemplate(TEMPLATER_TEMPLATE_PATH . $this->_template);
		$this->_render->setData($this->_data);
		$this->_render->getHTML();
		$this->_render->renderContent();
		$this->_content = $this->_render->getContent();
		return $this->_content;
	}
	/**
	 * Method to verify if class has been correctly instantiated
	 */
	protected function verifyInstance()
	{
		if(!self::$_instance instanceof Templater)
			$this->_exception->triggerException(111);
	}
}