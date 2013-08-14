<?php

class Application_Form_Sendmessage extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
		/* Form Elements & Other Definitions Here ... */
		$this->setMethod('post');
		$this->setName('testing');
 
        // Add an email element
        $this->addElement('textarea', 'message', array(
           
            'required'   => true,
			'class'		=>'user_textarea',
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('NotEmpty',true,array('messages' => 'Type Text For Send a Message')),
				
            ),
            
        ));
		
		$this->addElement('submit','Send',array('class'=>'user_submit'));
    }


}

