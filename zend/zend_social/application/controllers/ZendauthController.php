<?php

class ZendauthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		 //$layout = $this->_helper->layout();
       	// $layout->setLayout('zendauth');
    }

    public function indexAction()
    {
        // action body
		 $auth   = Zend_Auth::getInstance();
		if($auth->getIdentity()->username == ''){
		
			
		$db = Zend_Db_Table::getDefaultAdapter();
		
		$loginForm  = new Application_Form_Zendlogin();
		if($this->getRequest()->isPost()){
			
			 if ($loginForm->isValid($_POST)) {
				 
				  $adapter = new Zend_Auth_Adapter_DbTable(
					$db,
					'users',
					'username',
					'password'
					);
				 $adapter->setIdentity($loginForm->getValue('username'));
            	 $adapter->setCredential($loginForm->getValue('password'));
				 
            	
            	 $result = $auth->authenticate($adapter);
				 
				  if ($result->isValid()) {
                		//$this->_helper->FlashMessenger('Successful Login');
                		//$this->_redirect('/');
						//echo "success";
                		//return;
						 //$storage = $this->_auth->getStorage();
						 //$storage->write($adapter->getResultRowObject());
						$data = $adapter->getResultRowObject(null,'password');
      					$auth->getStorage()->write($data);
						
						$mysession = new Zend_Session_Namespace('mysession');
                   		 if(isset($mysession->destination_url)) {
                        $url = $mysession->destination_url;
                        unset($mysession->destination_url);
                        $this->_redirect($url);
						// $this->view->passedAuthentication = true;
            			//$this->_forward('zendauth', 'index', 'adminpanel');
						//
                    }
						$this->_redirect('zendauth/home');
           			 }
					 else{
						 	echo "Wrong username and password";
					 }
			 }
		}
		
		
		$this->view->loginForm = $loginForm;
		}
		else
		{
			echo "failed";	
		}
    }

    public function homeAction()
    {
        // action body
		echo "<pre>";
		$auth = Zend_Auth::getInstance();
		$request = $this->getRequest();
		
		
		echo $username = $auth->getIdentity()->username;
		//get all table value
		$data = $auth->getStorage()->read();
		print_r($data);
		//print_r($request);
    }

    public function testingAction()
    {
        // action body
		echo "success";
    }


}





