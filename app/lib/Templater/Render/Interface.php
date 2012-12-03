<?php

/**
 * Interface of Render Core of Templater Class
 * @author Lucas Mendes de Freitas (devsdmf)
 * @since 2012
 * @copyright Copyright (c) 2012 SDMF Development Systems (devsdmf.net)
 * @category Templater
 * @package Templater_Render
 *
 */

interface Templater_Render_Interface 
{
	/**
	 * The constructor method
	 */
	function __construct();
	/**
	 * Method to set template file
	 * @param string $file
	 * @return void
	 */
	function setTemplate( $file );
	/**
	 * Method to get the original HTML Content of template file
	 * @return string
	 */
	function getHTML();
	/**
	 * Method to set the data content to render in template file
	 * @param array $data
	 * @return void
	 */
	function setData( array $data );
	/**
	 * Method to render the content in template
	 * @return string
	 */
	function renderContent();
}