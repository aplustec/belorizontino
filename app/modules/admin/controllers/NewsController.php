<?php

/**
 * @see App_Modules_Admin_Abstract
 */
require_once 'app/modules/admin/Abstract.php';

/**
 * The News Controller of Admin module
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

class Admin_NewsController extends App_Modules_Admin_Abstract
{
	/**
	 * The destination path of uploaded files
	 * 
	 * @var string
	 */
	protected $_destinationPath = null;
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
		
		$this->_destinationPath = PUBLIC_PATH . 'uploads/images/news/';
	}
	/**
	 * The index Action
	 */
	function indexAction()
	{
		$news = new NewsDAO();
		
		$select = $news->select();
		
		$paginator = Zend_Paginator::factory($select);
		$paginator->setCurrentPageNumber($this->_request->getParam('p'));
		$paginator->setDefaultItemCountPerPage(12);
		
		$this->view->paginator = $paginator;
		
		$this->render();
	}
	/**
	 * The new Action
	 */
	function newAction()
	{
		if(parent::isPost())
		{
			$news = new NewsDAO();
			$filter = new Zend_Filter_StripTags();
			$transfer = new Zend_File_Transfer_Adapter_Http();
			$validator = $this->getHelper('FileValidator');
			
			$errors = 0;
			
			$transfer->setDestination($this->_destinationPath);
			
			$validator->addExtension('jpg,jpeg');
			
			$title = trim($filter->filter($this->_request->getPost('title')));
			$author = trim($filter->filter($this->_request->getPost('author')));
			$email = trim($filter->filter($this->_request->getPost('email')));
			$content = trim($this->_request->getPost('content'));
			
			$validator->setFileName($transfer->getFileName());
			
			if($validator->validate())
			{
				if($transfer->receive())
				{
					$ext = $validator->getExtension();
					$image = $this->_helper->generateFileName($ext,null,null,true);
					rename( $transfer->getFileName() , $this->_destinationPath . $image );
				} else
				{
					$errors++;
					$this->_flashMessenger->addMessage('Ocorreu um erro ao enviar o arquivo ao servidor!');
				}
			} else
			{
				$errors++;
				$this->_flashMessenger->addMessage('Selecione um arquivo de imagem válido!');
			}
			
			if($errors == 0)
			{
				$data = array('title'=>$title,'author'=>$author,'email'=>$email,'content'=>$content,'image'=>$image,'date'=>date("Y-m-d"));
				$result = $news->insert($data);
				if($result)
				{
					$this->_flashMessenger->addMessage('Notícia cadastrada com sucesso!');
					$this->redirect('/admin/news');
				} else
				{
					unlink($this->_destinationPath . $image);
					$this->_flashMessenger->addMessage('Ocorreu um erro ao inserir os dados no banco!');
					$this->redirect('/admin/news/new');
				}
			} else
			{
				$this->redirect('/admin/news/new');
			}
		} else
		{
			$this->render();
		}
	}
	/**
	 * The edit Action
	 */
	function editAction()
	{
		if(parent::isPost())
		{
			$news = new NewsDAO();
			$filter = new Zend_Filter_StripTags();
			$transfer = new Zend_File_Transfer_Adapter_Http();
			$validator = $this->getHelper('FileValidator');
			
			$errors = 0;
			
			$transfer->setDestination($this->_destinationPath);
			
			$idnews = (int)$this->getParam('idnews');
			
			$title = trim($filter->filter($this->_request->getPost('title')));
			$author = trim($filter->filter($this->_request->getPost('author')));
			$email = trim($filter->filter($this->_request->getPost('email')));
			$content = trim($this->_request->getPost('content'));
			
			$old = $news->fetchRow("`idnews`={$idnews}");
			
			if(is_string($transfer->getFileName()))
			{
				$validator->addExtension('jpg,jpeg');
				$validator->setFileName($transfer->getFileName());
				if($validator->validate())
				{
					if($transfer->receive())
					{
						$ext = $validator->getExtension();
						$image = $this->_helper->generateFileName($ext,null,null,true);
						rename($transfer->getFileName(),$this->_destinationPath . $image);
					} else
					{
						$errors++;
						$this->_flashMessenger->addMessage('Ocorreu um erro ao enviar a imagem ao servidor!');
					}
				} else
				{
					$errors++;
					$this->_flashMessenger->addMessage('O arquivo de imagem enviado é inválido!');
				}
			} else
			{
				$image = $old->image;
			}
			
			if($errors == 0)
			{
				$data = array('title'=>$title,'author'=>$author,'email'=>$email,'content'=>$content,'image'=>$image);
				$result = $news->update($data,"`idnews`={$idnews}");
				if($result)
				{
					if($image != $old->image)
					{
						unlink($this->_destinationPath . $old->image);
					}
					$this->_flashMessenger->addMessage('Notícia atualizada com sucesso!');
				} else
				{
					if($image != $old->image)
					{
						unlink($this->_destinationPath . $image);
					}
					$this->_flashMessenger->addMessage('Ocorreu um erro ao salvar os dados no banco!');
				}
			}
			
			$this->redirect('/admin/news/edit/' . $idnews);
		} else
		{
			$news = new NewsDAO();
			
			$idnews = (int)$this->getParam('idnews');
			
			$this->view->news = $news->fetchRow("`idnews`={$idnews}");
			
			$this->render();
		}
	}
	/**
	 * The remove Action
	 */
	function removeAction()
	{
		$news = new NewsDAO();
		$comment = new CommentDAO();
		
		$idnews = (int)$this->getParam('idnews');
		
		$data = $news->fetchRow("`idnews`={$idnews}");
		if($data)
		{
			$result = $news->delete("`idnews`={$idnews}");
			if($result)
			{
				unlink($this->_destinationPath . $data->image); 
				$comment->delete("`idnews`={$idnews}");
				$this->_flashMessenger->addMessage('Notícia removida com sucesso!');
			} else
			{
				$this->_flashMessenger->addMessage('Ocorreu um erro ao remover os dados do banco!');
			}
		} else
		{
			$this->_flashMessenger->addMessage('Notícia não encontrada!');
		}
		
		$this->redirect('/admin/news');
	}
}