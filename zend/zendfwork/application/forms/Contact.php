<?php

class Application_Form_Contact extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
		$this->setName('contactus');
							$this->setAction('contactus');
							$this->setMethod('post');
							$this->setAttrib('id', 'add');
						
							$name = $this->createElement('text','name',array('required'=>'true'));
							$name->setLabel('Name');
							
							$name->removeDecorator('Errors');
							
							$email = $this->createElement('text','email',array('required'=>'true'));
							$email->setLabel('E-Mail Address');
							$email->removeDecorator('Errors');
							
							$message = $this->createElement('textarea','message',array('required'=>'true'));
							$message->setLabel('Message');
							$message->removeDecorator('Errors');
							
							$submit = $this->createElement('submit','Send');
							
							
							//$username=new Zend_Form_Element_Text('username');
							$this->addElements(array($name,$email,$message,$submit));
    }


}

