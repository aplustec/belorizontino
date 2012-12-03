<?php

/**
 * @see App_Modules_Admin_Abstract
 */
require_once 'app/modules/admin/Abstract.php';

/**
 * The Banner Controller of Admin module
 * 
 * @category Controllers
 * @package App/Modules/Admin
 * @subpackage Controllers
 * @author Lucas Mendes de Freitas (devsdmf)
 * @since 2012
 * @license http://www.devsdmf.net/license/general.txt
 * @copyright Aplus Tecnologia e Engenharia LTDA
 *
 */

class Admin_BannerController extends App_Modules_Admin_Abstract
{
	/**
	 * The destination path for uploaded files
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
		
		$this->_destinationPath = PUBLIC_PATH . 'uploads/images/banner/';
	}
	/**
	 * The index Action
	 */
	function indexAction()
	{
		if(parent::isPost())
		{
			$banner = new BannerDAO();
			$transfer = new Zend_File_Transfer_Adapter_Http();
			$validator = $this->getHelper('FileValidator');
			
			$errors = 0;
			
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
						$result = rename($transfer->getFileName() , $this->_destinationPath . $image);
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
				$errors++;
				$this->_flashMessenger->addMessage('Selecione um arquivo de imagem para atualizar!');
			}
			
			if($errors == 0)
			{
				$data = array('image'=>$image);
				$result = $banner->update($data, "`idbanner`=1");
				if($result)
				{
					$this->_flashMessenger->addMessage('Banner atualizado com sucesso!');
				} else
				{
					unlink($this->_destinationPath . $image);
					$this->_flashMessenger->addMessage('Ocorreu um erro ao salvar os dados no banco!');
				}
			}
			
			$this->redirect('/admin/banner');
		} else
		{
			$banner = new BannerDAO();
			
			$this->view->banner = $banner->fetchRow("`idbanner`=1");
			
			$this->render();
		}
	}
}