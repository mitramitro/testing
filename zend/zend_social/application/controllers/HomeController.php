<?php

class HomeController extends Zend_Controller_Action
{

    public function init()
    {
         
        $layout = $this->_helper->layout();
        $layout->setLayout('admin');
    
    }

    public function indexAction()
    {
        // action body
    }

    


}



