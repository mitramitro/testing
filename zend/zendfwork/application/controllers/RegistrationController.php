<?php

class RegistrationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		//$sess = new Zend_Session_Namespace(’MyNamespace’);
		//$data=$sess->logindata();
		//$test="must show";
		
		
		
		
	    $sess = new Zend_Session_Namespace('MyNamespace');
	  
		//echo "<pre>";
		 //print_r($sess->logindata);
		$test=$sess->logindata;
		Zend_Layout::getMvcInstance()->assign('whatever', $test); 
		
    }

    public function indexAction()
    {
		
       $sess = new Zend_Session_Namespace('MyNamespace');
	  
		//echo "<pre>";
		 //print_r($sess->logindata);
		$data=$sess->logindata;
		/// Zend_Layout::getMvcInstance()->assign('whatever', $data); 
		foreach($data as $val)
		{
			$username=$val->username;
		}
		
		 $this->view->logindata=$username;
    }

    public function registerAction()
    {
		
		
		//echo $countrylist;
		//die;
		 
		 
		$formregister= new Application_Form_Register();
        $formregister->submit->setLabel('SignUp');
		$this->view->register= $formregister;
		
	    
	   
		
		 /*if($this->getRequest()->isPost())
		 {
			 $adapter = new Zend_File_Transfer_Adapter_Http();
		 
		 	//echo '<pre>';
		 	//print_r($adapter );
			 //$adapter->setDestination(baseurl().'');
		 
			// print_r($_FILES);
			// echo $name = $_FILES['file']['name'];
			 //echo "<br/>";
			 //echo $tmppath = $_FILES['file']['tmp_name'];
			 //echo "<br/>";
			 //$tmp=$adapter->getFileName('file');
			 $name1=$adapter->getFileInfo();
			 $name=$name1['file']['name'];
        	 $adapter->setDestination('images/');
			 $adapter->receive();
		//echo $this->view->baseUrl().'/images/download.jpg';//$this->baseUrl('/zendfwork/images/');
			 
		 }*/
		//copy($tmppath,'images/'.$name);
		 
		 //exit;
		 /*$tmp = $adapter->getFileName();
		 echo $tmp;
		 $names = $adapter->getFileName($file = null, $path = false);
		 echo $names;
		 
		 
		 $fullBaseUrl = $this->view->serverUrl() . $this->view->baseUrl();
		 echo $data="images/".$names;
		 //echo $this->url();
		 
		
		copy($tmp,$data);*/
			  //$image_saved = move_uploaded_file($tmp, 'www/zendfwork/images/'.$names);
			 // print_r($image_saved);
			  
			  
		
		/*$upload = new Zend_File_Transfer();
 
// Returns all known internal file information
	$files = $upload->getFileInfo();
		  // print_r($files);
	  echo $upload->receive();*/
   

	  // $validator = new Zend_Validate_NotEmpty();
	   $obj= new Application_Model_DbTable_Zendfwork();

	   $request = $this->getRequest();
	    if($this->getRequest()->isPost()){
		   	//print_r($request->getPost());
			$error=$formregister->getErrors();
			$this->view->error = $error;
			if($formregister->isValid($request->getPost())) 
			{
				$adapter = new Zend_File_Transfer_Adapter_Http();
				
				$name1=$adapter->getFileInfo();
				$name=$name1['file']['name'];
        	 	$adapter->setDestination('images/');
			 	$adapter->receive();
				$data=array('username'=>$this->_request->getPost('username'),
							'email'=>$this->_request->getPost('email'),
							'password'=>$this->_request->getPost('password'),
							'gender'=>$this->_request->getPost('gender'),
							'country'=>$this->_request->getPost('country'),
							'state'=>$this->_request->getPost('state'),
							'city'=>$this->_request->getPost('city'),
							'file'=>$name,
				);
				$obj->addContact($data);
                $this->_helper->flashMessenger->addMessage(array('success' => 'Inserted successfully'));
                $this->view->messages = $this->_helper->flashMessenger->getMessages();
				$this->_redirect('registration/register');
			} 
			else
			{
				//echo "success";
				//$msg=$formregister->getErrors();
				//print_r($msg);
				//$msg=$form->getMessages();	
				//$this->view->error=$msg;
			}
		}
		
	 	//echo "success";
	 	 //die;
	   //echo $this->render('login.phtml');
    }

    public function loginAction()
    {
       $form= new Application_Form_Login();
	   //$formregister= new Application_Form_Register();
	   $login= new Application_Model_DbTable_Zendfwork();
	   $request = $this->getRequest();
	   //echo "<pre>";
	   
	   //$data=$login->login();
	   //echo "<pre>";
	   if(isset($_POST['submit']))
	   {
		   	
	   
		   	 if($form->isValid($request->getPost()))
			 {
				 $username=$this->_request->getPost('username');
				 $password=$this->_request->getPost('password'); 
			
                $data=$login->login($username,$password);
                 //die;
                 $count=count($data);
                 if($count==1)
                 {
                     $sess = new Zend_Session_Namespace('MyNamespace');
                     $sess->logindata=$data;
                     $this->_redirect('registration/index');
                 }
			else
			 {
				//$this->_helper->flashMessenger->addMessage('Wrong username and password');
                // $this->view->loginerror=$this->_helper->flashMessenger->getMessages();
                 $this->_helper->flashMessenger->addMessage(array('loginerror' => 'Wrong username and password'));
                //$this->view->messages = $this->_helper->flashMessenger->getMessages();
                $messages=$this->_helper->flashMessenger->getMessages();
				$this->_redirect('registration/login',array('messages'=>$messages));
				
				
			 }
		  }
		}
	   $this->view->messages = $this->_helper->flashMessenger->getMessages();
	   $this->view->form= $form;
	   $this->view->register= $formregister;
    }

    public function logoutAction()
    {
        Zend_Session::destroy();
		$this->_redirect('registration/login');
    }

    public function stateAction()
    {
		$this->_helper->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		$id = $this->_getParam('con_id');
		
		$obj= new Application_Model_DbTable_State();
		$state=$obj->select_state($id);
		//print_r($state);
		foreach($state as $value)
		{
        	echo "<option value='$value[sta_id]'>".$value['name']."</option>";
		}
    }

    public function cityAction()
    {
		$this->_helper->viewRenderer->setNoRender(true);
		$this->_helper->layout()->disableLayout();
        $sta_id=$this->_getParam('sta_id');
		$obj= new Application_Model_DbTable_City();
		$city=$obj->select_city($sta_id);
		foreach($city as $value)
		{
			echo "<option value='$value[cty_id]'>".$value['name']."</option>";	
		}
    }

    public function showAction()
    {
        // action body
    }

    public function contactusAction()
    {
		 
		 //$helper = $this->view->getHelper('form');
		$form= new Application_Form_Contact();
		
		$this->view->form=$form;
        $request=$this->getRequest();
		if($request->isPost('submit'))
		{
			if($form->isValid($request->getPost())) 
			{
				echo "success";
			}
		}
		//echo "<pre>";
		//print_r($request);
		
    }

    public function showallAction()
    {
		//$this->_helper->viewRenderer->setNoRender(true);
		//$this->_helper->layout()->disableLayout();
		//$this->_helper->viewRenderer('register');
		//echo "success";
		//$obj= new Application_Model_DbTable_Zendfwork();	
		$obj= new Application_Model_Register();
		$userlist=$obj->alldata();
		
		foreach($userlist as $val)
		{
			 $con=$val['country'];
			 $country[]=$obj->country($con);	 
		}
		foreach($userlist as $val)
		{
			 $sta=$val['state'];
			 $state[]=$obj->state($sta);	 
		}
		foreach($userlist as $val)
		{
			 $cty=$val['city'];
			 $city[]=$obj->city($cty);	 
		}
			//echo "<pre>";
			//print_r($state);
			//echo "<br/>";
			//print_r($city);
		//die;
		$page=$this->_getParam('page',1);
	
  	 	$paginator = Zend_Paginator::factory($userlist);
   	 	$paginator->setItemCountPerPage(2);
   	 	$paginator->setCurrentPageNumber($page);

   	 	$this->view->paginator=$paginator;
		//$this->view->userlist=$userlist;
		$this->view->country=$country;
		$this->view->state=$state;
		$this->view->city=$city;
    }

    public function successAction()
    {
		//$this->_helper->viewRenderer->setNoRender(true);
		//$this->_helper->layout()->disableLayout();
		//$this->_helper->viewRenderer->setRender('register');
        //echo $this->view->baseUrl()."<br/>";
       // echo $this->view->url();
      //  die;
		$this->render('testingview');

		//echo "fialid";	
    }

    public function deleteAction($id)
    {
		$this->_helper->viewRenderer->setNoRender(true);
		//$this->_helper->layout()->disableLayout();
		//echo "success";	
		$id=$this->_getParam('id');
		//echo $_GET['id'];
		//$obj= new Application_Model_DbTable_Zendfwork();
		$obj= new Application_Model_Register();
		$obj->delete($id);
		
    }

    public function delete1Action()
    {
       // $this->_helper->viewRenderer->setNoRender(true);
		//$this->_helper->layout()->disableLayout();
		//echo "success";	
		$id=$this->_getParam('id');
		$obj= new Application_Model_DbTable_Zendfwork();
		//$obj= new Application_Model_Register();
		$obj->deleterow($id);
		$this->_redirect('registration/showall');
    }

    public function paginationAction()
    {
		
	//$sql = 'SELECT * FROM register';
    //$result = $db->fetchAll($sql);
	$obj= new Application_Model_DbTable_Zendfwork();
	$result= $obj->alldata();
	//print_r($result);
	//die;
    $page=$this->_getParam('page',1);
	
    $paginator = Zend_Paginator::factory($result);
    $paginator->setItemCountPerPage(2);
    $paginator->setCurrentPageNumber($page);

    $this->view->paginator=$paginator;
	
    //$this->view->paginator=$paginator;
	
	   
    }

    public function paginationtestAction()
    {
        $obj= new Application_Model_DbTable_Zendfwork();
	    $result= $obj->alldata();
	    //print_r($result);
	    //die;
   	    $page=$this->_getParam('page',1);
	
  	    $paginator = Zend_Paginator::factory($result);
   	    $paginator->setItemCountPerPage(1);
   	    $paginator->setCurrentPageNumber($page);

   	    $this->view->paginator=$paginator;
    }

    public function userupdateAction()
    {

        $obj= new Application_Model_DbTable_Zendfwork();
        $updateform= new Application_Form_Register();

        $updateform->submit->setLabel('Update');
        $id=$this->_getParam('id');
        $userdata=$obj->getUser($id);
       // print_r($data);
        //die;
        //Update User Details
        $request = $this->getRequest();


            if($this->getRequest()->isPost()){
                //print_r($request->getPost());
                //$error=$updateform->getErrors();
                //$this->view->error= $error;
                if($updateform->isValid($request->getPost())){
                    $adapter = new Zend_File_Transfer_Adapter_Http();

                    $name1=$adapter->getFileInfo();
                    $name=$name1['file']['name'];
                    $adapter->setDestination('images/');
                    $adapter->receive();
                    $data=array('username'=>$this->_request->getPost('username'),
                        'email'=>$this->_request->getPost('email'),
                        'password'=>$this->_request->getPost('password'),
                        'gender'=>$this->_request->getPost('gender'),
                        'country'=>$this->_request->getPost('country'),
                        'state'=>$this->_request->getPost('state'),
                        'city'=>$this->_request->getPost('city'),
                        'file'=>$name,
                    );
                    $obj->userUpdate($data,$id);
                    $this->_helper->flashMessenger->addMessage(array('update' => 'Updated Successfully'));
                    //$this->view->messages = $this->_helper->flashMessenger->getMessages();
                    $messages=$this->_helper->flashMessenger->getMessages();
                    //$this->view->update=$this->_helper->flashMessenger->getMessages();
                    $this->_redirect('registration/showall',array('messages'=>$messages));
               }
            }
            //End User Update
            else
            {
                //fill value in form

                $updateform->username->setValue($userdata['username']);
                $updateform->email->setValue($userdata['email']);
                $updateform->gender->setValue($userdata['gender']);
                $updateform->country->setValue($userdata['country']);

                //end fill value form
            }
        $this->view->updateform= $updateform;
    }


}























