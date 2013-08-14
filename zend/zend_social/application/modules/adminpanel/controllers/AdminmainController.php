<?php

class Adminpanel_AdminmainController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		
		
		
		
		 $messages = $this->_helper->flashMessenger->getMessages();
			if(!empty($messages)){
			$this->_helper->layout->getView()->message = $messages[0];
			}
			
		 $layout = $this->_helper->layout();
       	 $layout->setLayout('admin');
    }

    public function indexAction()
    {
			$sess = new Zend_Session_Namespace('Namespace');
			if($sess->logindata=='')
			{
			
				$obj=new Adminpanel_Model_DbTable_Admin();
				$form = new Adminpanel_Form_Adminlogin();
				$request=$this->getRequest();
				if($request->isPost())
				{
					if($form->isValid($request->getPost())){
						 $username=$this->_request->getPost('username');
						 $password=$this->_request->getPost('password');
						 $logincheck=$obj->login($username,$password);
						 $login=count($logincheck);
						 if($login==1){
								$sess = new Zend_Session_Namespace('Namespace');
								$sess->logindata=$logincheck;
								$this->_redirect('adminpanel/adminmain/home');
							 }
							 else{
								 $this->_helper->flashMessenger->addMessage(array('error1'=>'Invalid Username and Password'));
								 //$this->view->adminlogin = $this->_helper->flashMessenger->getMessages();
								 $this->_redirect('adminpanel/adminmain');
							}
						}	
			}
			
			$this->view->form=$form; 
		}
		else
		{
			$this->_redirect('adminpanel/adminmain/home');	
		}
		
    }

    public function homeAction()
    {
		$sess = new Zend_Session_Namespace('Namespace');
			if($sess->logindata!='')
			{
       			 // action body
			}
			else
			{
					$this->_redirect('adminpanel/adminmain');
			}
    }

    public function logoutAction()
    {
        Zend_Session::destroy();
		$this->_redirect('adminpanel/adminmain');
    }

    public function manageuserAction()
    {
		$sess = new Zend_Session_Namespace('Namespace');
			if($sess->logindata!='')
			{
				$obj=new Adminpanel_Model_DbTable_User();
				$userlist=$obj->userlist();
				$page=$this->_getParam('page',1);
			
				$paginator = Zend_Paginator::factory($userlist);
				$paginator->setItemCountPerPage(2);
				$paginator->setCurrentPageNumber($page);
				$this->view->userlist=$paginator;
			}
			else
			{
				$this->_redirect('adminpanel/adminmain');
			}
    }

    public function deleteuserAction()
    {
        $id=$this->_getParam('id');
		$obj=new Adminpanel_Model_DbTable_User();
		$delele=$obj->deleteuser($id);
		$this->_helper->flashMessenger->addMessage(array('deluser'=>'User deleted successfully'));
		//$this->_helper->FlashMessenger('Your message was sent.');
		$this->_redirect('adminpanel/adminmain/manageuser');
		
		
		
    }

    public function updateuserAction()
    {
        echo $id=$this->_getParam('id');
		echo $status=$this->_getParam('status');
		$obj = new Adminpanel_Model_DbTable_User();
		$update = $obj->updateuser($id,$status);
		$this->_helper->flashMessenger->addMessage(array('updateuser'=>'User status updated successfully'));
		$this->_redirect('adminpanel/adminmain/manageuser');
    }
    public function changepasswordAction()
    {
		$sess = new Zend_Session_Namespace('Namespace');
			if($sess->logindata!='')
			{
				$obj= new Adminpanel_Model_DbTable_Admin();
				$id=$this->_getParam('id');
				$form=new Adminpanel_Form_Changepassword();
				$request=$this->getRequest();
				if($request->isPost()){
						if($form->isValid($request->getPost())){
								$password=$this->_request->getPost('newpassword');
								$changepass= $obj->changepassword($password,$id);
								$this->_helper->flashMessenger->addMessage(array('updatepassword'=>'Password updated successfully!'));
								$this->_redirect('adminpanel/adminmain/changepassword');
							}		
				}
				$this->view->form=$form;
			}
			else
			{
				$this->_redirect('adminpanel/adminmain');
			}
		}
	/*public function preDispatch($request)
	 {
		 $sess = new Zend_Session_Namespace('Namespace');
			if($sess->logindata!='')
			{
				$this->homeAction();
				//$this->changepasswordAction();
			}
			else
			{
				echo "success";	
			}
	 }*/

}













