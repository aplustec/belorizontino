<?php

/**
 * Exception Handler of Templater Class
 * @author Lucas Mendes de Freitas (devsdmf)
 * @since 2012
 * @copyright Copyright (c) 2012 SDMF Development Systems (devsdmf.net)
 * @category Templater
 * @package Templater
 *
 */

class Templater_Exception
{
	
	const NOT_SINGLETON_CALLED = 'Templater Exception => The Templater class can not be instantiated directly.';
	
	const TEMPLATE_NOT_FOUND = 'Templater Exception => The template file not found in template folder.';
	
	const INVALID_DATA_FORMAT = 'Templater Exception => The data setted on object are an invalid format. Valid: Array().';
	
	const INVALID_DATA_STREAM = 'Templater Exception => The data to insert on template has not been setted.';
	
	const CONTENT_NOT_READ = 'Templater Exception => The content of template cannot be read, run Templater_Render::getHTML() method first.';
	
	const UNKNOW_ERROR = 'Templater Exception => Unknow error.';
	/**
	 * Method to get the message text of Exception Code
	 * @param int $code
	 * @return string
	 */
	static function getMessage( $code = null)
	{
		switch($code)
		{
			case 111 :
				return self::NOT_SINGLETON_CALLED;
				break;
			case 222 :
				return self::TEMPLATE_NOT_FOUND;
				break;
			case 333 :
				return self::INVALID_DATA_FORMAT;
				break;
			case 334 :
				return self::INVALID_DATA_STREAM;
				break;
			case 444 :
				return self::CONTENT_NOT_READ;
				break;
			default :
				return self::UNKNOW_ERROR;
				break;
		}
	}
	/**
	 * Method to trigger the Exception of Templater Class
	 * @param int $code
	 * @return void
	 */
	static function triggerException( $code = null)
	{
		$message = self::getMessage($code);
		$e = new Exception();
		
		echo '<h1>Templater Exception</h1><br />';
		echo '<h2><strong>' . $message . '</strong></h2>';
		echo $e->getTraceAsString();
		die();
	}
}