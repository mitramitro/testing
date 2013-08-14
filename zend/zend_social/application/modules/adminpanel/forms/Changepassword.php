<?php

class Adminpanel_Form_Changepassword extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
	/*	$this->addElement('password', 'password', array(
           	
			'class'	  =>'user_input',
            'required'   => true,
            'filters'    => array('StringTrim'),
			'validators' => array(
                array('NotEmpty',true,array('messages' => 'Enter Password')))
        ));*/
		$this->addElement('password', 'newpassword', array(
           
			'class'		=>'user_input',
            'required'   => true,
            'filters'    => array('StringTrim'),
			'validators' => array(
                array('NotEmpty',true,array('messages' => 'Enter Password')))
        ));
		$this->addElement('password', 'cnewpassword', array(
            
			'class'		=>'user_input',
            
            'filters'    => array('StringTrim'),
			'validators' => array(
							array('identical', true, array('token' => 'newpassword','messages'=>'Password did not match'))
								)
        ));
	
		$this->addElement('submit','submit',array('class'=>'user_submit'));
    }


}

