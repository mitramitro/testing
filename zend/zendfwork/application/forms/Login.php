<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
       $this->setMethod('post');
 
        // Add an email element
        $this->addElement('text', 'username', array(
            'label'      => 'Your email address:',
            'required'   => true,
			'class'      =>'inputfield',
            'filters'    => array('StringTrim'),
            'validators' => array(
                
            )
			
        ));
 
        // Add the comment element
        $this->addElement('password', 'password', array(
            'label'      => 'Enter Password:',
			'class'      =>'inputfield',
            'required'   => true,
            'validators' => array(
                array()
                )
        ));
 
        // Add a captcha
        /*$this->addElement('captcha', 'captcha', array(
            'label'      => 'Please enter the 5 letters displayed below:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));*/
 
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Login',
        ));
    }


}

