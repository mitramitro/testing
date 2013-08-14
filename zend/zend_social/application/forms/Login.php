<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
    	$this->setMethod('post');
		$this->setName('login');
 
        // Add an email element
        
		
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
		
		
		$this->addElement('submit','submit',array('class'=>'user_submit'));
    }
	


}

