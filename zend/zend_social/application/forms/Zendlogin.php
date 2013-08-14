<?php

class Application_Form_Zendlogin extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
		
		$this->setMethod('post');
 
        $this->addElement(
            'text', 'username', array(
                'label' => 'Username:',
				'class' => 'userinput',
                'required' => true,
                'filters'    => array('StringTrim'),
            ));
 
        $this->addElement('password', 'password', array(
		'class' => 'userinput',
            'label' => 'Password:',
            'required' => true,
            ));
 
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Login',
            ));
    }


}

