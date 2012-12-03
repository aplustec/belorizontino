<?php

/**
 * @see Zend_View_Helper_Abstract
 */
require_once 'Zend/View/Helper/Abstract.php';

/**
 * The Zend View Helper for get the last comments of news
 * 
 * @category Helpers
 * @package App/Modules/Default/Views
 * @subpackage Helpers
 * @author Lucas Mendes de Freitas (devsdmf)
 * @license http://www.devsdmf.net/license/general.txt
 * @copyright Aplus Tecnologia e Engenharia LTDA
 *
 */

class Zend_View_Helper_GetLastCommentsFromNews extends Zend_View_Helper_Abstract
{
	/**
	 * Method to get the comments
	 * 
	 * @param integer $idnews
	 * @return Zend_Db_Table_Rowset_Abstract
	 */
	function getLastCommentsFromNews( $idnews )
	{
		$obj = new CommentDAO();
		$data = $obj->fetchAll("`idnews`={$idnews} AND `status`=1","date Desc",4);
		return $data;
	}
}