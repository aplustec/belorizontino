<?php

/**
 * Interface of Templater Class
 * @author Lucas Mendes de Freitas (devsdmf)
 * @since 2012
 * @copyright Copyright (c) 2012 SDMF Development Systems (devsdmf)
 * @category Templater
 * @package Templater
 *
 */

interface Templater_Interface
{
	/**
	 * The static function for get the instance of Templater Class using Singleton pattern
	 */
	static function getInstance();
	/**
	 * The method for get the template rendered by Templater Class
	 * @param string $file
	 * @param array $data
	 * @return string
	 */
	function getTemplate($file = 'default' , array $data);
	/**
	 * Method to set the template file
	 * @param string $file
	 * @return void
	 */
	function setTemplate($file);
	/**
	 * Method to set the data to a render in template file
	 * @param array $data
	 * @return void
	 */
	function setData( array $data ); 
	/**
	 * Method to render the data in template
	 * @param array $data
	 * @return string
	 */
	function render();
}