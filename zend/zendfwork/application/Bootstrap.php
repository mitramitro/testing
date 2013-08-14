<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected function _initDoctype()
    {
		//$this->addHelperPath("Zend/JQuery/View/Helper", "Zend_JQuery_View_Helper");
		$this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
		
		
		$view = new Zend_View();
		$view->addHelperPath('Zend/JQuery/View/Helper/', 'Zend_JQuery_View_Helper');
 
		$viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
		$viewRenderer->setView($view);
		Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
    }
	protected function _initNavigationXml()
	{
	    $this->bootstrap('layout');
	    $layout = $this->getResource('layout');
	    $view = $layout->getView();
	    $config = new Zend_Config_Xml(APPLICATION_PATH.'/configs/navigation.xml');
	 
	    $navigation = new Zend_Navigation($config);
	    $view->navigation($navigation);
	}
	/*protected function _initNavigationConfig()
	{
		$this->bootstrap('layout');
		$layout = $this->getResource('layout');
		$view = $layout->getView();
		
		$navigation = new Zend_Navigation($this->getOption('navigation'));
		$view->navigation($navigation);
	}*/
}

