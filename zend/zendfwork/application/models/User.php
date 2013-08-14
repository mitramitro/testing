<?php
class Application_Model_User
{
	    
	  
	  
	 $db = new Zend_Db_Adapter_Pdo_Mysql(array(
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname'   => 'zendfwork'
    ));
	  
     
	
	
	public function alldata()
	{
		
		$sql = 'SELECT * FROM register';
		$result = $db->fetchAll($sql);
		return $result;
	}

}

?>
