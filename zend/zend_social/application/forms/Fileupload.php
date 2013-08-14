<?php

class Application_Form_Fileupload extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
		
		$this->setMethod('post');
		$this->setName('userfile');
		
		$this->addElement('file', 'userfile', array(
            
			'class'	  =>'user_input',
            'required'   => true,
            'filters'    => array('StringTrim'),
			
        ));
		$this->addElement('submit','Upload',array('class'=>'user_submit'));
    }


}

