<?php

/**
 * @see App_Modules_Defaul_Abstract
 */
require_once 'app/modules/default/Abstract.php';

/**
 * The Index Controller of Default module
 * 
 * @category Controllers
 * @package App/Modules/Default
 * @subpackage Controllers
 * @author Lucas Mendes de Freitas (devsdmf)
 * @since 2012
 * @license http://www.devsdmf.net/license/general.txt
 * @copyright Aplus Tecnologia e Engenharia LTDA | devSDMF Software Development (c)
 *
 */

class IndexController extends App_Modules_Default_Abstract
{
	/**
	 * Method to initialize the controller
	 * 
	 * @see Zend_Controller_Action::init()
	 */
	function init()
	{
		parent::abstractInit();
		parent::flashMessengerInit();
	}
	/**
	 * The index Action
	 */
	function indexAction()
	{
		$banner = new BannerDAO();
		$edition = new EditionDAO();
		
		$this->view->banner = $banner->fetchRow("`idbanner`=1");
		$this->view->edition = $edition->fetchRow(null,"date Desc");
		
		$this->render();
	}
}