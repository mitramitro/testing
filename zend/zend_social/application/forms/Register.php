<?php

class Application_Form_Register extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
		$this->setMethod('post');
		$this->setName('testing');
 
        // Add an email element
        $this->addElement('text', 'email', array(
           
            'required'   => true,
			'class'		=>'user_input',
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('NotEmpty',true,array('messages' => 'Enter Email Address')),
				array('regex', false, array(
                    'pattern' => '/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',
                    'messages' => 'Enter a valid Email Address'
                ))
            ),
            
        ));
		
		 $this->addElement('text', 'username', array(
            
			'class'		=>'user_input',
            'required'   => true,
            'filters'    => array('StringTrim'),
			'validators' => array(
                array('NotEmpty',true,array('messages' => 'Enter Username')))
        ));
		$this->addElement('password', 'password', array(
           
			'class'		=>'user_input',
            'required'   => true,
            'filters'    => array('StringTrim'),
			'validators' => array(
                array('NotEmpty',true,array('messages' => 'Enter Password')))
        ));
		$this->addElement('password', 'cpassword', array(
            
			'class'		=>'user_input',
            
            'filters'    => array('StringTrim'),
			'validators' => array(
							array('identical', true, array('token' => 'password','messages'=>'Password did not match'))
								)
        ));
	
		 $this->addElement('select', 'gender', array(
           
            'required'   => true,
			'class'      =>'user_input',
            'filters'    => array('StringTrim'),
			'multioptions'=>array('male'=>'Male',
								  'female'=>'Female'
									),
			'validators' => array(
                array('NotEmpty',true,array('messages' => 'Select Gender')))
          
			
        ));
		
		$this->addElement('submit','submit',array('class'=>'user_submit'));
    }
	


}

