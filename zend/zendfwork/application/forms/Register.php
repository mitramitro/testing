<?php

class Application_Form_Register extends Zend_Form
{

    public function init()
    {
		$country= new Application_Model_DbTable_Country();
		$countrylist=$country->select_country();
		//echo "<pre>";
		//print_r($countrylist);
		//$passwordConfirmation = new App_Validate_PasswordConfirmation();
         $this->setMethod('post');
 		 $this->setAttrib('enctype', 'multipart/form-data');
 
 		 $this->addElement('text', 'username', array(
            'label'      => 'Enter Username:',
		
            'required'   => true,
			'elementdecorators' => array('ViewHelper', 'Errors'),
			'class'      => 'inputfield',
            'filters'    => array('StringTrim'),
			 'validators' => array(
            array(
                'NotEmpty', true, array(
                    'messages' => 'Enter Username'
                )
            )),			
           
			
        ));
 
        // Add an email element
        $this->addElement('text', 'email', array(
            'label'      => 'Enter Email:',
            'required'   => true,
			'class'      =>'inputfield',
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('NotEmpty',true,array('messages' => 'Enter Valid Email')),
				array('regex', false, array(
                    'pattern' => '/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',
                    'messages' => 'Enter a valid Email Address'
                ))
            ),
			
        ));
 
        // Add the comment element
        $this->addElement('password', 'password', array(
            'label'      => 'Enter Password:',
            'required'   => true,
			'class'      =>'inputfield',
            'filters'    => array('StringTrim'),
			'validators' =>array(array('NotEmpty',true,array('messages'=>'Enter Password'))),			
       			
        ));
		 $this->addElement('password', 'cpassword', array(
            'label'      => 'Confirm Password:',
            
			'class'      =>'inputfield',
            'filters'    => array('StringTrim'),
			'validators' => array(
			
									array('identical', true, array('token' => 'password','messages'=>'Password did not match'))
								)
          
			
        ));
		 $this->addElement('select', 'gender', array(
            'label'      => 'Select Gender:',
            'required'   => true,
			'class'      =>'inputfield',
            'filters'    => array('StringTrim'),
			'multioptions'=>array('male'=>'Male',
								  'female'=>'Female'
									),
          
			
        ));
		 $this->addElement('select', 'country', array(
            'label'      => 'Select Country:',
            'required'   => true,
			'class'      =>'inputfield',
            'filters'    => array('StringTrim'),
			'multioptions'=>$countrylist,
			'onchange'=>'stateshow()',
          
			
        ));
		$this->addElement('select', 'state', array(
            'label'      => 'Select State:',
            'required'   => true,
			'class'      =>'inputfield',
            'filters'    => array('StringTrim'),
			'registerInArrayValidator' => false,
			'multioptions'=>array('s'=>'--State--'),
          	'onchange'=>'cityshow()',
			
        ));
		$this->addElement('select', 'city', array(
            'label'      => 'Select City:',
            'required'   => true,
			'class'      =>'inputfield',
			'registerInArrayValidator' => false,
            'filters'    => array('StringTrim'),
			'multioptions'=>array('c'=>'--City--'),
          
			
        ));
		
   
    	$this->addElement('file', 'file', array(
            'label'      => 'Image Upload:',
             'required'   => true,
			'class'      =>'inputfield',
            'filters'    => array('StringTrim'),
			
			));

		/*$this->addElement('captcha', 'captcha', array(
            'label'      => 'Please enter the 5 letters displayed below:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Dumb',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));*/
		

		
		/*$country = $this->createElement('select',’countries’);
        $country ->setLabel('Countries:')
            ->addMultiOptions(array(
                    'US' => 'United States',
                    'UK' => 'United Kingdom' 
                        ));    */
 
        // Add a captcha
        $this->addElement('captcha', 'captcha', array(
            'label'      => 'Please enter the 5 letters displayed below:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));
 
        // Add the submit button
        $this->addElement('submit','submit');

 
        // And finally add some CSRF protection
        /*$this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));*/
	}


}

?>