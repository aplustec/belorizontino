<?php

/**
 * @see Zend_View_Helper_Abstract
 */
require_once 'Zend/View/Helper/Abstract.php';

/**
 * The Zend View Helper for import assets in views of modules
 * 
 * @category Helpers
 * @package App/Plugins
 * @subpackage Helpers
 * @author Lucas Mendes de Freitas (devsdmf)
 * @since 2012
 * @license http://www.devsdmf.net/license/general.txt
 * @copyright devSDMF Software Development (c)
 *
 */

class Zend_View_Helper_Asset extends Zend_View_Helper_Abstract
{
	/**
	 * Method to import assets
	 * 
	 * @param string $filename
	 * @param string $folder
	 * @return void
	 */
	function asset( $filename , $folder )
	{
		echo $this->view->assetUrl . $this->view->currentModule . '/' . $folder . '/' . $filename; 
	}
}