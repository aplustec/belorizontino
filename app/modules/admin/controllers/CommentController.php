<?php

/**
 * @see App_Modules_Admin_Abstract
 */
require_once 'app/modules/admin/Abstract.php';

/**
 * The Comment Controller of Admin module
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

class Admin_CommentController extends App_Modules_Admin_Abstract
{
	/**
	 * Method to initialize the controller
	 * 
	 * @see Zend_Controller_Action::init()
	 */
	function init()
	{
		parent::lock();
		parent::abstractInit();
		parent::flashMessengerInit();
	}
	/**
	 * The index Action
	 */
	function indexAction()
	{
		$comment = new CommentDAO();
		
		$select = $comment->select();
		
		$paginator = Zend_Paginator::factory($select);
		$paginator->setCurrentPageNumber($this->getParam('p'));
		$paginator->setDefaultItemCountPerPage(12);
		
		$this->view->paginator = $paginator;
		
		$this->render();
	}
	/**
	 * The publish Action
	 */
	function publishAction()
	{
		$comment = new CommentDAO();
		
		$idcomment = (int)$this->getParam('idcomment');
		
		$data = array('status'=>1);
		
		$result = $comment->update($data, "`idcomment`={$idcomment}");
		if($result)
		{
			$this->_flashMessenger->addMessage('Comentário publicado com sucesso!');
		} else
		{
			$this->_flashMessenger->addMessage('Ocorreu um erro ao publicar o comentário!');
		}
		
		$this->redirect('/admin/comment');
	}
	/**
	 * The remove Action
	 */
	function removeAction()
	{
		$comment = new CommentDAO();
		
		$idcomment = (int)$this->getParam('idcomment');
		
		$result = $comment->delete("`idcomment`={$idcomment}");
		if($result)
		{
			$this->_flashMessenger->addMessage('Comentário removido com sucesso!');
		} else
		{
			$this->_flashMessenger->addMessage('Ocorreu um erro ao remover os dados do banco!');
		}
		
		$this->redirect('/admin/comment');
	}
}