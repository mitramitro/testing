<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		//$contact=new Application_Model_DbTable_Zendfwork();
        // $contact->addContact();
		echo "success";
    }

    public function signAction()
    {
        $request = $this->getRequest();
		 //print_r($request);
		 //echo "success";
		$form= new Application_Form_Register();
		
		if ($this->getRequest()->isPost('test')) {
            if ($form->isValid($request->getPost())) {
				$data['username']=$_POST['email'];
				$data['email']=$_POST['comment'];
				$data['password']='test';
				$contact=new Application_Model_DbTable_Zendfwork();
        		$contact->addContact($data);
               // $comment = new Application_Model_Guestbook($form->getValues());
                //$mapper  = new Application_Model_GuestbookMapper();
                //$mapper->save($comment);
				//$contact=new Application_Model_DbTable_Zendfwork();
				//$contact->save($data);
                return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
    }


}



