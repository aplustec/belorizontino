<?php

/**
 * @see App_Modules_Admin_Abstract
 */
require_once 'app/modules/admin/Abstract.php';

/**
 * The Edition Controller of Admin module
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

class Admin_EditionController extends App_Modules_Admin_Abstract
{
	/**
	 * The destination path for image files
	 * 
	 * @var string
	 */
	protected $_imageDestinationPath = null;
	/**
	 * The destination path for document files
	 * 
	 * @var string
	 */
	protected $_documentDestinationPath = null;
	/**
	 * The folder to make cache of uploaded files
	 * 
	 * @var string
	 */
	protected $_cacheDir = null;
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
		
		$this->_imageDestinationPath = PUBLIC_PATH . 'uploads/images/editions/';
		$this->_documentDestinationPath = PUBLIC_PATH . 'uploads/publish/';
		$this->_cacheDir = APPLICATION_PATH . 'cache/';
	}
	/**
	 * The index Action
	 */
	function indexAction()
	{
		$edition = new EditionDAO();
		
		$select = $edition->select();
		
		$paginator = Zend_Paginator::factory($select);
		$paginator->setCurrentPageNumber($this->getParam('p'));
		$paginator->setDefaultItemCountPerPage(10);
		
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
			require_once 'app/plugins/Helpers/Date.php';
				
			$edition = new EditionDAO();
			$filter = new Zend_Filter_StripTags();
			$transfer = new Zend_File_Transfer_Adapter_Http();
			$validator = $this->getHelper('FileValidator');
			$hDate = new Zend_View_Helper_Date();
			
			$errors = 0;
			$imageSent = false;
			$documentSent = false;
			
			$transfer->setDestination($this->_cacheDir);
			
			$date = $hDate->date(trim($filter->filter($this->_request->getPost('date'))),'sql');
			$label = trim($filter->filter($this->_request->getPost('label')));
			
			if($errors == 0)
			{
				if(is_string($transfer->getFileName('image')))
				{
					$validator->addExtension('jpg,jpeg');
					$validator->setFileName($transfer->getFileName('image'));
					if($validator->validate())
					{
						if($transfer->receive('image'))
						{
							$ext = $validator->getExtension();
							$image = $this->_helper->generateFileName($ext,null,null,true);
							rename( $transfer->getFileName('image') , $this->_imageDestinationPath . $image );
							$imageSent = true;
						} else
						{
							$errors++;
							$this->_flashMessenger->addMessage('Ocorreu um erro ao enviar o arquivo de imagem ao servidor!');
						}
					} else
					{
						$errors++;
						$this->_flashMessenger->addMessage('O arquivo de imagem selecionado é inválido!');
					}
					$validator->reset();
					$validator->clearValidExtensions();
				} else
				{
					$errors++;
					$this->_flashMessenger->addMessage('Selecione um arquivo de imagem!');
				}
			}
			
			if($errors == 0)
			{
				if(is_string($transfer->getFileName('document')))
				{
					$validator->addExtension('pdf');
					$validator->setFileName($transfer->getFileName('document'));
					if($validator->validate())
					{
						if($transfer->receive('document'))
						{
							$ext = $validator->getExtension();
							$file = $this->_helper->generateFileName($ext,null,null,true);
							rename( $transfer->getFileName('document') , $this->_documentDestinationPath . $file );
							$documentSent = true;
						} else
						{
							$errors++;
							$this->_flashMessenger->addMessage('Ocorreu um erro ao enviar o arquivo de jornal ao servidor!');
						}
					} else
					{
						$errors++;
						$this->_flashMessenger->addMessage('O arquivo de jornal enviado é inválido!');
					}
				} else
				{
					$errors++; 
					$this->_flashMessenger->addMessage('Selecione um arquivo de jornal!');
				}
			}
			
			if($errors == 0)
			{
				$data = array('label'=>$label,'date'=>$date,'image'=>$image,'file'=>$file);
				$result = $edition->insert($data);
				if($result)
				{
					$this->_flashMessenger->addMessage('Edição cadastrada com sucesso!');
					$this->redirect('/admin/edition');
				} else
				{
					unlink($this->_imageDestinationPath . $image);
					unlink($this->_documentDestinationPath . $file);
					$this->_flashMessenger->addMessage('Ocorreu um erro ao salvar os dados no banco!');
					$this->redirect('/admin/edition/new');
				}
			} else
			{
				if($imageSent)
				{
					unlink($this->_imageDestinationPath . $image);
				}
				if($documentSent)
				{
					unlink($this->_documentDestinationPath . $file);
				}
				$this->redirect('/admin/edition/new');
			}
		} else
		{
			$this->render();
		}
	}
	/**
	 * The remove Action
	 */
	function removeAction()
	{
		$edition = new EditionDAO();
		
		$idedition = (int)$this->getParam('idedition');
		
		$data = $edition->fetchRow("`idedition`={$idedition}");
		if($data)
		{
			$result = $edition->delete("`idedition`={$idedition}");
			if($result)
			{
				unlink($this->_imageDestinationPath . $data->image);
				unlink($this->_documentDestinationPath . $data->file);
				$this->_flashMessenger->addMessage('Edição removida com sucesso!');
			} else
			{
				$this->_flashMessenger->addMessage('Ocorreu um erro ao remover os dados do banco!');
			}
		} else
		{
			$this->_flashMessenger->addMessage('Edição não encontrada!');
		}
		
		$this->redirect('/admin/edition');
	}
}