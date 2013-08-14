<?php 
class My_Acl extends Zend_Acl
{
    public function __construct()
    {
        // Add a new role called "guest"
        $this->addRole(new Zend_Acl_Role('guest'));
		
        // Add a role called user, which inherits from guest
        $this->addRole(new Zend_Acl_Role('user'), 'guest');
		
		// Add some resources in the form controller::action
		$this->add(new Zend_Acl_Resource('index::index'));
        $this->add(new Zend_Acl_Resource('zendauth::index'));
        $this->add(new Zend_Acl_Resource('zendauth::home'));
		$this->add(new Zend_Acl_Resource('zendauth::testing'));
		//$this->add(new Zend_Acl_Resource('adminmain::index','adminpanel'));
		 
		// Allow guests to see the error, login and index pages
        $this->allow('guest', 'zendauth::index');
		$this->allow('guest', 'index::index');
		//$this->allow('guest', 'adminmain::index','adminpanel');
        
		// Allow users to access logout and the index action from the user controller
        $this->allow('user', 'zendauth::home');
		$this->allow('user', 'zendauth::testing');
        
    }
}
?>