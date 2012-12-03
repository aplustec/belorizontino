<?php

/**
 * @see Zend_Controller_Action_Helper_Abstract
 */
require_once 'Zend/Controller/Action/Helper/Abstract.php';

/**
 * This is a Helper for validate uploaded files
 * 
 * @category Helpers
 * @package App/Plugins
 * @subpackage Helpers
 * @author Lucas Mendes de Freitas (devsdmf)
 * @since 2012
 * @license http://www.devsdmf.net/license/general.txt
 * @copyright Aplus Tecnologia e Engenharia LTDA | devSDMF Software Development (c)
 *
 */

class Helper_FileValidator extends Zend_Controller_Action_Helper_Abstract
{
	/**
	 * The default delimiter for explode extensions strings
	 * 
	 * @var string
	 */
	const DEFAULT_DELIMITER = ',';
	/**
	 * The array with valid extensions
	 * 
	 * @var array
	 */
	protected $_validExtensions = array();
	/**
	 * The filename to validate 
	 * 
	 * @var string
	 */
	protected $_filename = null;
	/**
	 * The extension of file
	 * 
	 * @var string
	 */
	protected $_ext = null;
	/**
	 * The result of validate() method
	 * 
	 * @var boolean
	 */
	protected $_valid = false;
	/**
	 * Constructor
	 */
	function __construct(){}
	/**
	 * Method to add extensions in validator
	 * 
	 * @param string|array $extension
	 * @param string $delimiter Optional;
	 */
	function addExtension( $extension , $delimiter = null )
	{
		if(is_string($extension))
		{
			if(is_null($delimiter))
			{
				$delimiter = self::DEFAULT_DELIMITER;
			}

			$extension = explode($delimiter, $extension);
		}

		foreach($extension as $ext)
		{
			$this->_validExtensions[] = strtolower($ext);
		}
	}
	/**
	 * Method to set the filename to validate 
	 * 
	 * @param string $filename
	 */
	function setFileName( $filename )
	{
		if(is_string($filename))
			$this->_filename = strtolower($filename);
	}
	/**
	 * Method to get the extension of file
	 * 
	 * @param boolean $flag Optional; Set the flag as true to return the extensions on string format
	 * @return string|array
	 */
	function getValidExtensions( $flag = false )
	{
		$exts = null;

		if($flag)
		{
			foreach( $this->_validExtensions as $extension )
			{
				$exts .= $extension . self::DEFAULT_DELIMITER;
			}
			$exts = substr($exts, 0, strlen($exts) - 1);
		} else
		{
			$exts = $this->_validExtensions;
		}

		return $exts;
	}
	/**
	 * Method to get the current filename
	 * 
	 * @return string
	 */
	function getFileName()
	{
		return $this->_filename;
	}
	/**
	 * Method to get the extension of file
	 * 
	 * @return string
	 */
	function getExtension()
	{
		if(!$this->_ext)
		{
			$fn = explode('.',$this->_filename);
			$i = count($fn) - 1;
			$this->_ext = $fn[$i];
		}

		return $this->_ext;
	}
	/**
	 * Method to get the result of validate() method
	 * 
	 * @return boolean
	 */
	function getResult()
	{
		return $this->_valid;
	}
	/**
	 * Method to validate the file
	 * 
	 * @param string $filename Optional; If you not have setted the filename using specific method
	 * @param string|array $validExtensions Optional; If you not have added extensions in validator
	 * @param string $delimiter Optional; Custom delimiter to explode the string of extensions 
	 * @return boolean
	 */
	function validate( $filename = null , $validExtensions = null , $delimiter = null )
	{
		if(!is_null($filename))
			$this->setFileName($filename);

		if(!is_null($validExtensions))
			$this->addExtension($extension,$delimiter);

		$this->getExtension();

		foreach($this->_validExtensions as $ext)
		{
			if($this->_ext == $ext)
			{
				$this->_valid = true;
				break;
			}
		}

		return $this->getResult();
	}
	/**
	 * Method to reset the validator state
	 */
	function reset()
	{
		$this->_filename = null;
		$this->_ext = null;
		$this->_valid = false;
	}
	/**
	 * Method to remove all valid extensions of validator
	 */
	function clearValidExtensions()
	{
		$this->_validExtensions = array();
	}
	/**
	 * Strategy pattern to allow direct access by controller
	 * 
	 * @param string $filename
	 * @param string|array $validExtensions
	 * @param string $delimiter Optional; Custom delimiter to explode the string of extensions
	 * @return boolean
	 */
	function direct( $filename , $validExtensions , $delimiter = null )
	{
		return $this->validate($filename,$validExtensions,$delimiter);
	}
}