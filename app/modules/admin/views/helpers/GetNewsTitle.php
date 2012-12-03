<?php

/**
 * @see Zend_View_Helper_Abstract
 */
require_once 'Zend/View/Helper/Abstract.php';

/**
 * The Admin View Helper for get the title of news
 * 
 * @category Helpers
 * @package App/Modules/Admin/Views
 * @subpackage Helpers
 * @author Lucas Mendes de Freitas (devsdmf)
 * @since 2012
 * @license http://www.devsdmf.net/license/general.txt
 * @copyright Aplus Tecnologia e Engenharia LTDA | devSDMF Software Development (c)
 *
 */

class Admin_View_Helper_GetNewsTitle extends Zend_View_Helper_Abstract
{
	/**
	 * Method to get the title of news
	 * 
	 * @param integer $idnews
	 * @return string
	 */
	function getNewsTitle( $idnews )
	{
		$obj = new NewsDAO();
		$data = $obj->fetchRow("`idnews`={$idnews}");
		return $data->title;
	}
}