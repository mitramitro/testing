<?php

class Application_Form_Useredit extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
		$this->setMethod('post');
		$this->setName('useredit');
 
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
		$this->addElement('submit','submit',array('class'=>'user_submit'));
    }


}

