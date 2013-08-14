<?php

class SocialController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		$messages = $this->_helper->flashMessenger->getMessages();
			
		Zend_Layout::getMvcInstance()->assign('sendmessage', $messages); 
			//$this->_helper->layout->getView()->message = $messages[0];
		
    }

    public function indexAction()
    {
        // action body
    }

    public function alluserAction()
    {
      	/*$data="this is testing variable";
		
		$this->view->data = $data;
		$this->render('home.phtml');*/
    }

    public function sendfriendrequestAction()
    {
        $obj = new Application_Model_Social();
		
		$sender_id = $this->_getParam('sender_id');
		$reciever_id = $this->_getParam('reciever_id');
		$test = $obj->send_friendrequest($sender_id, $reciever_id);
		//change request status in tmp table
		$obj->request_status($sender_id, $reciever_id);
		$this->_redirect('auth/home');
    }

    public function friendrequestAction()
    {
       	  $sess = new Zend_Session_Namespace('MyNamespace');
		  $id=$sess->logindata[0]->id;
		
		 $objsocial = new Application_Model_Social();
		 $friendrequest = $objsocial->request($id);
		 //print_r($friendrequest);
		 $this->view->request = $friendrequest;
		 $this->view->id = $id;
    }

    public function confirmrequestAction()
    {
        $sender_id = $this->_getParam('sender');
		$reciever_id = $this->_getParam('reciever');
		
		$objsocial = new Application_Model_Social();
		
		$value = $objsocial->confirmrequest($sender_id, $reciever_id);
		
		$objsocial->send_requestconfirm($sender_id, $reciever_id);
		
		$objsocial->chagedisplaystatusconfirm($sender_id,$reciever_id);
		$objsocial->chagedisplaystatussender($sender_id,$reciever_id);
		$this->_redirect('social/friendrequest');
    }

    public function friendlistAction()
    {
       	 $sess = new Zend_Session_Namespace('MyNamespace');
		 $id=$sess->logindata[0]->id;
		
		 $objsocial = new Application_Model_Social();
		 $friendlist = $objsocial->friend_list($id);
		 //print_r($friendrequest);
		 $this->view->request = $friendlist;
		 $this->view->id = $id;
		
		// action body
    }

    public function deletefriendrequestAction()
    {
        
		$sender_id = $this->_getParam('sender');
		$reciever_id = $this->_getParam('reciever');
		$objsocial = new Application_Model_Social();
		$friendlist = $objsocial->del_friendrequest($sender_id, $reciever_id);
		$objsocial->changetmprequeststatus($sender_id, $reciever_id);
		$this->_redirect('social/friendrequest');
    }

    public function sendmessageAction()
    {
        // action body
		$this->_helper->layout()->disableLayout(); 
		//echo "success";
		$obj = new Application_Model_DbTable_Sendmessage();
		$form = new Application_Form_Sendmessage();
		$request = $this->getRequest();
		if($request->isPost()){
			if($form->isValid($request->getPost())){
				
				$data  = array(
								'sender' => $this->_getParam('sender'),
								'reciever' => $this->_getParam('reciever'),
								'message' => $this->_request->getPost('message'),
								);
				//print_r($data);
				$obj->sendmessage($data);
				$this->_helper->flashMessenger->addMessage(array('msgsuccess'=>'Message Sent'));
				echo "<script>parent.location.href='".$this->view->baseUrl('auth/home')."'</script>";
				
				
				
				
			}	
		}
		
		$this->view->form = $form;
    }

    public function messagelistAction()
    {
        // action body
		$objmsglist = new Application_Model_Social();
		$sess = new Zend_Session_Namespace('MyNamespace');
		$id=$sess->logindata[0]->id;
		$data = $objmsglist->allmessagelist($id);
		$this->view->data = $data;
		
    }

    public function changestatusAction()
    {
        // action body

    }

    public function conversationAction()
    {
        // action body
		$objmsglist = new Application_Model_Social();
		//$obj = new Application_Model_DbTable_Sendmessage();
		
		
		
		
		$sess = new Zend_Session_Namespace('MyNamespace');
		$id = $sess->logindata[0]->id;
		$sender = $this->_getParam('sender');
		$objmsglist->changestatus($id, $sender);
		$allconversation = $objmsglist->sender_conversation($id, $sender);
		
		
		$data = $objmsglist->allmessagelist($id);
		$this->view->data = $data;
		
		//echo "<pre>";
		//print_r($senderconversation);
		$this->view->senderconversation = $allconversation;
    }

    public function conversationmessageAction()
    {
		//echo "success";
        // action body
		/*$obj = new Application_Model_DbTable_Sendmessage();
		$cvsform = new Application_Form_Sendmessage();
		
		
		$request = $this->getRequest();
		if($request->isPost()){
			if($form->isValid($request->getPost())){
				
				$data  = array(
								'sender' => $this->_getParam('sender'),
								'reciever' => $this->_getParam('reciever'),
								'message' => $this->_request->getPost('message'),
								);
				//print_r($data);
				//$obj->sendmessage($data);
			}
		}*/
		//$this->_helper->layout->getView()->test = 'success';
	
    }

    public function ajaxconversationAction()
    {
        // action body
		//code for insertion
		$obj = new Application_Model_DbTable_Sendmessage();
		//$this->_helper->viewRenderer->setNoRender(true);
		$this->_helper->layout()->disableLayout();
		$sender = $this->_getParam('sender');
		$message = $this->_getParam('message');
		$sess = new Zend_Session_Namespace('MyNamespace');
		$curretn_id = $sess->logindata[0]->id;
		
		$data  = array(
								'sender' => $curretn_id,
								'reciever' => $sender,
								'message' => $message,
								);
				//print_r($data);
				$obj->sendmessage($data);
		//end insetion
		
		
		//code for select data
		
			$objmsglist = new Application_Model_Social();
		//$obj = new Application_Model_DbTable_Sendmessage();
		$allconversation = $objmsglist->sender_conversation($curretn_id, $sender);
		
		
		
		//print_r($senderconversation);
		$this->view->senderconversation = $allconversation;
		
		//end select data
    }

    public function refreshcoversationAction()
    {
        // action body
		$this->_helper->layout()->disableLayout();
		$objmsglist = new Application_Model_Social();
		//$obj = new Application_Model_DbTable_Sendmessage();
		$sender = $this->_getParam('sender');
	
		$sess = new Zend_Session_Namespace('MyNamespace');
		$curretn_id = $sess->logindata[0]->id;
		$allconversation = $objmsglist->sender_conversation($curretn_id, $sender);
		
		
		
		//print_r($senderconversation);
		$this->view->senderconversation = $allconversation;
    }


}



























