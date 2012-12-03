<?php

/**
 * @see Zend_View_Helper_Abstract
 */
require_once 'Zend/View/Helper/Abstract.php';

/**
 * The View Helper for convert the date format
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

class Zend_View_Helper_Date extends Zend_View_Helper_Abstract
{
	/**
	 * Method to convert the date
	 * 
	 * @param string $date
	 * @param string $to Optional;
	 * @return string
	 */
	function date( $date , $to = 'common' )
	{
		switch($to)
		{
			case 'common' : 
				$date = explode('-',$date);
				$date = array_reverse($date);
				$date = implode('/', $date);
				break;
			case 'sql' : 
				$date = explode('/',$date);
				$date = array_reverse($date);
				$date = implode('-', $date);
				break;
			default :
				null;
				break;
		}
		return $date;
	}
}