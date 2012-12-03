<?php

/**
 * @see App_Modules_Admin_Abstract
 */
require_once 'app/modules/admin/Abstract.php';

/**
 * The Access Controller of Admin module
 * 
 * @category Controllers
 * @package App/Modules/Admin
 * @subpackage Controllers
 * @author Lucas Mendes de Freitas (devsdmf)
 * @since 2012
 * @license http://www.devsdmf.net/license/general.txt
 * @copyright Aplus Tecnologia e Engenharia LTDA | devSDMF Software Development (c)
 *
 */

class Admin_AccessController extends App_Modules_Admin_Abstract
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
	 * The login Acton
	 */
	function loginAction()
	{
		$this->render();
	}
	/**
	 * The auth Action
	 */
	function authAction()
	{
		if(parent::isPost())
		{
			$filter = new Zend_Filter_StripTags();
			
			$username = trim($filter->filter($this->_request->getPost('username')));
			$password = trim($filter->filter($this->_request->getPost('password')));
			
			$password = $this->_helper->encrypt($password);
			
			$dbadapter = Zend_Db_Table::getDefaultAdapter();
			
			$adapter = new Zend_Auth_Adapter_DbTable($dbadapter);
			$adapter->setTableName('administrator')
					->setIdentityColumn('username')
					->setCredentialColumn('password')
					->setIdentity($username)
					->setCredential($password);
			
			$auth = Zend_Auth::getInstance();
			$result = $auth->authenticate($adapter);
			
			if($result->isValid())
			{
				$storage = $auth->getStorage();
				$contents = $adapter->getResultRowObject(null,'password');
				$storage->write($contents);
				$this->redirect('/admin');
			} else
			{
				$this->_flashMessenger->addMessage('Usuario ou senha incorretos!');
				$this->redirect('/login');
			}
		} else
		{
			$this->redirect('/admin');
		}
	}
	/**
	 * The logout Action
	 */
	function logoutAction()
	{
		if($this->isLogged())
			Zend_Auth::getInstance()->clearIdentity();
		
		$this->redirect('/admin');
	}
}