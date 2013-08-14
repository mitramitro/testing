<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		//$sess = new Zend_Session_Namespace(’MyNamespace’);
		//$data=$sess->logindata();
		//$test="must show";
		
		
		$messages = $this->_helper->flashMessenger->getMessages();
			if(!empty($messages)){
			$this->_helper->layout->getView()->message = $messages[0];
			Zend_Layout::getMvcInstance()->assign('sendmessage', $messages); 
			}
		
	    $sess = new Zend_Session_Namespace('MyNamespace');
	  
		//echo "<pre>";
		 //print_r($sess->logindata);
		$test=$sess->logindata;
		Zend_Layout::getMvcInstance()->assign('whatever', $test); 
		
    }

    public function indexAction()
    {
        /*$sess = new Zend_Session_Namespace('MyNamespace');
	  
		//echo "<pre>";
		 //print_r($sess->logindata);
		$data=$sess->logindata;
		/// Zend_Layout::getMvcInstance()->assign('whatever', $data); 
		foreach($data as $val)
		{
			$username=$val->username;
		}
		
		 $this->view->logindata=$username;*/
    }

    public function registerAction()
    {
         
		 $this->_helper->layout()->disableLayout(); 
		 $obj= new Application_Model_DbTable_Register();
		 $form    = new Application_Form_Register();
		 $request = $this->getRequest();
		 //$email=$this->_request->getPost('email');
		 //echo $checkemail=$this->checkuserAction($email);
		 if($request->isPost()){
			 if($form->isValid($request->getPost())){
			 	$data=array('username'=>$this->_request->getPost('username'),
							'email'=>$this->_request->getPost('email'),
							'password'=>$this->_request->getPost('password'),
							'gender'=>$this->_request->getPost('gender'));
							$register=$obj->insert_user($data);
							$this->_helper->flashMessenger->addMessage(array('errorsuccess'=>'Insert Successfully'));
							$this->view->messages = $this->_helper->flashMessenger->getMessages();
							//$this->_helper->redirector('register');
							$this->_redirect('auth/register');
				 }
			 }
		 
		 
		 $this->view->form=$form;
    }

    public function checkuserAction()
    {
        //$this->_helper->layout()->disableLayout(); 
		$obj= new Application_Model_DbTable_Register();
		
		$this->_helper->viewRenderer->setNoRender(true);
		$this->_helper->layout()->disableLayout();
		$email=$_GET['email'];
		$check=$obj->check_email($email);
		$row=count($check);
		if($row==1){
				echo $email."&nbsp;"."Already Exists! Try Another One";
			}
			else{
				echo $email."&nbsp;"."is Available";
			}
		
		
    }

    public function checkusernameAction()
    {
        $obj= new Application_Model_DbTable_Register();
		
		$this->_helper->viewRenderer->setNoRender(true);
		$this->_helper->layout()->disableLayout();
		//echo "success";
		$username=$_GET['username'];
		$check=$obj->check_username($username);
		$row=count($check);
		if($row==1){
				echo $username."&nbsp;"."Already Exists! Try Another One";
			}
			else{
				echo $username."&nbsp;"."is Available";
			}
    }

    public function loginAction()
    {
       	 $this->_helper->layout()->disableLayout(); 
		 $obj= new Application_Model_DbTable_Register();
		 $form    = new Application_Form_Login();
		 $request = $this->getRequest();
		 //$email=$this->_request->getPost('email');
		 //echo $checkemail=$this->checkuserAction($email);
		 if($request->isPost()){
			 if($form->isValid($request->getPost())){
			 	$username=$this->_request->getPost('username');
				$password=$this->_request->getPost('password');
				$data=$obj->login($username,$password);
				//print_r($data);
                 //die;
                 $count=count($data);
                 if($count==1)
                 {
					 //echo "success";
					 //die;
                     $sess = new Zend_Session_Namespace('MyNamespace');
                     $sess->logindata=$data;
                     //$this->_redirect('auth/index');
					 echo "<script>parent.location.href='".$this->view->baseUrl('auth/home')."'</script>";
                 }
				else
			 	{
				 	$this->_helper->flashMessenger->addMessage(array('error'=>'Invalid Username and Password'));
					$this->_redirect('auth/login');
				
			 	}		
				
				//$this->_helper->flashMessenger->addMessage(array('error'=>'Insert Successfully'));
				//$this->view->messages = $this->_helper->flashMessenger->getMessages();
				//$this->_helper->redirector('register');
				//$this->renderScript('auth/login.phtml');
				 }
			 }
		 
		  
		 $this->view->form=$form;
    }

    public function logoutAction()
    {
        Zend_Session::destroy();
		$this->_redirect('auth/index');
		/*echo "<script>parent.location.href='".$this->view->baseUrl('auth/index')."'</script>";*/
    }

    public function homeAction()
    {
       $sess = new Zend_Session_Namespace('MyNamespace');
	   if($sess->logindata!=''){
	   $obj= new Application_Model_DbTable_Register();
	   
	  
		//echo "<pre>";
		 //print_r($sess->logindata);
		$data=$sess->logindata;
		/// Zend_Layout::getMvcInstance()->assign('whatever', $data); 
		foreach($data as $val)
		{
			$id=$val->id;
			$username=$val->username;
		}
		 
		 
		 $fileuplaod = new Application_Form_Fileupload();
		 $request= $this->getRequest();
		 
		 if($request->isPost()){
			if($fileuplaod->isValid($request->getPost())){
				$adapter = new Zend_File_Transfer_Adapter_Http();
				$name1=$adapter->getFileInfo();
				$name=$name1['userfile']['name'];
        	 	$adapter->setDestination('upload/');
			 	$adapter->receive();
				$obj->uploadimage($name,$id);
			}
		}
		 //login userdata
		 $userdata=$obj->userdata($id);
		 //all user in table
		 $alldata= $obj->alluser();
			
		 //exclude the current user
		 foreach($alldata as $value)
		 {
			if($id != $value->id){
				 	$alluser[]=$obj->nearbyuser($value->id);
					
				}
					 
		 }
		 //users friend request
		 $objsocial = new Application_Model_Social();
		 $friendrequest = $objsocial->friendrequest($id);
		// echo "<pre>";
		 //print_r($friendrequest);
		 
		 //$this->view->friendrequest=$friendrequest;
		// $this->view->alluser = $alluser;
		 //Zend_Layout::getMvcInstance()->assign('friendrequest', $friendrequest); 
		 //Zend_Layout::getMvcInstance()->assign('alluser', $alluser); 
	   	 $this->view->fileform  = $fileuplaod;
		 $this->view->userdata=$userdata;
	   }
	   else
	   {
			$this->_redirect('auth/index');   
	   }
    }

    public function imageuploadAction()
    {
       $fileuplaod = new Application_Form_Fileupload();
	   $this->view->fileform = $fileuplaod;
    }

    public function updateuserAction()
    {
       	$this->_helper->layout()->disableLayout(); 
		
		
		$obj= new Application_Model_DbTable_Register();
		$id=$this->_getParam('id');
		$userdata=$obj->userdata($id);
		
		
		$editform= new Application_Form_Useredit();
		$editform->email->setValue($userdata[0]->email);
		$editform->username->setValue($userdata[0]->username);
		
		$request=$this->getRequest();
		if($request->isPost()){
			
			$data=array('email' => $this->_request->getPost('email'),
				  'username' => $this->_request->getPost('username')
			);
			$update= $obj->edituser($id,$data);
			$this->_helper->flashMessenger->addMessage(array('update'=>'Updated Successfully'));
			 echo "<script>parent.location.href='".$this->view->baseUrl('auth/home')."'</script>";
		}
		
		$this->view->editform=$editform;
    }


}

















