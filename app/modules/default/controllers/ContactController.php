<?php

/**
 * @see App_Modules_Default_Abstract
 */
require_once 'app/modules/default/Abstract.php';

/**
 * The Contact Controller of Default module
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

class ContactController extends App_Modules_Default_Abstract
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
		if(parent::isPost())
		{
			$filter = new Zend_Filter_StripTags();
			$mail = new Zend_Mail();
			$templater = Templater::getInstance();
			
			$to = 'devsdmf@gmail.com';
			
			$name = trim($filter->filter($this->_request->getPost('name')));
			$email = trim($filter->filter($this->_request->getPost('email')));
			$subject = trim($filter->filter($this->_request->getPost('subject')));
			$message = trim($filter->filter($this->_request->getPost('message')));
			
			$data = array('NAME'=>$name,'EMAIL'=>$email,'SUBJECT'=>$subject,'MESSAGE'=>$message,'DATA'=>date("d/m/Y H:i:s"));
			
			$templater->setTemplate('contato');
			$templater->setData($data);
			$html = $templater->render();
			
			$mail->addTo($to)
				 ->setBodyHtml($html)
				 ->setSubject('Mensagem enviada via site!')
				 ->addHeader('X-Priority', '1 (Higuest)')
				 ->addHeader('X-MSMail-Priority', 'High')
				 ->addHeader('Importance', 'High');
			
			$result = $mail->send();
			if($result)
			{
				$this->_flashMessenger->addMessage('Mensagem enviada com sucesso!');
			} else
			{
				$this->_flashMessenger->addMessage('Ocorreu um erro ao enviar a mensagem!');
			}
			
			$this->redirect('/contato');
		} else
		{
			$this->render();
		}
	}
}