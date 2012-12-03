<?php

/**
 * @see Zend_View_Helper_Abstract
 */
require_once 'Zend/View/Helper/Abstract.php';

/**
 * The Zend View Helper for strip html tags from string
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

class Zend_View_Helper_StripTags extends Zend_View_Helper_Abstract
{
	/**
	 * Method to strip html tags
	 * 
	 * @param string $data
	 * @return string
	 */
	function stripTags( $data )
	{
		$filter = new Zend_Filter_StripTags();
		$data = $filter->filter($data);
		return $data;
	}
}