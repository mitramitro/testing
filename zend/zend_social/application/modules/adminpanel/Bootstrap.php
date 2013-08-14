<?php 
class Adminpanel_Bootstrap extends Zend_Application_Module_Bootstrap {
	


	public function _initRoute(){    

		$frontController = Zend_Controller_Front::getInstance();
	
		$router = $frontController->getRouter(); // returns a rewrite router by default
		$router->addRoute(
			'adminmain',
			new Zend_Controller_Router_Route('adminpan:controller',
											 array('module' => 'adminpanel',
													'controller' => 'adminmain',
												   ))
		);
}
	
	}
?>