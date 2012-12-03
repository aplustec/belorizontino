<?php

/**
 * @see App_Modules_Default_Abstract
 */
require_once 'app/modules/default/Abstract.php';

/**
 * The Redaction Controller of Default module
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

class RedactionController extends App_Modules_Default_Abstract
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
		$news = new NewsDAO();
		
		$select = $news->select()->order("date Desc");
		
		$paginator = Zend_Paginator::factory($select);
		$paginator->setCurrentPageNumber($this->getParam('p',1));
		$paginator->setDefaultItemCountPerPage(3);
		$paginator->setDefaultPageRange(5);
		$paginator->setDefaultScrollingStyle('Sliding');
		
		$this->view->paginator = $paginator;
		$this->view->page = $this->getParam('p',1);
		
		$this->render();
	}
	/**
	 * The comment Action
	 */
	function commentAction()
	{
		$comment = new CommentDAO();
		$news = new NewsDAO();
		$filter = new Zend_Filter_StripTags();
		
		$idnews = (int)$this->getParam('newsId');
		$return = urldecode($this->getParam('returnUrl'));
		
		$data = $news->fetchRow("`idnews`={$idnews}");
		if($data)
		{
			$name = trim($filter->filter($this->_request->getPost('name')));
			$content = trim($filter->filter($this->_request->getPost('comment')));

			$data = array('idnews'=>$idnews,'name'=>$name,'comment'=>$content,'date'=>date("Y-m-d H:i:s"),'status'=>0);
			$result = $comment->insert($data);
			if($result)
			{
				$this->_flashMessenger->addMessage('Comentário enviado com sucesso!\nApós a moderação comentário será postado no site!');
			} else
			{
				$this->_flashMessenger->addMessage('Ocorreu um erro ao inserir os dados no banco!');
			}
		} else
		{
			$this->_flashMessenger->addMessage('Notícia não encontrada no sistema!');
		}
		
		$this->redirect($return);
	}
}