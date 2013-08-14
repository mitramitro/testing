<?php

class Application_Model_Register
{

	
	public function alldata()
	{
		$db = new Zend_Db_Adapter_Pdo_Mysql(array(
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname'   => 'zendfwork'
    ));
		
		$sql = 'SELECT *
			FROM register';
			$result = $db->fetchAll($sql);
			return $result;
			
			
		     
			 
	}
	
	public function country($con_id)
	{
		$db = new Zend_Db_Adapter_Pdo_Mysql(array(
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname'   => 'zendfwork'
    ));
		
		$sql = "SELECT *
			FROM geo_countries where con_id='$con_id'" ;
			$result = $db->fetchAll($sql);
			return $result;
			
			
		     
			 
	}
	public function state($con_id)
	{
		$db = new Zend_Db_Adapter_Pdo_Mysql(array(
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname'   => 'zendfwork'
    ));
		
		$sql = "SELECT *
			FROM geo_states where sta_id='$con_id'" ;
			$result = $db->fetchAll($sql);
			return $result;
			
			
		     
			 
	}
	public function city($con_id)
	{
		$db = new Zend_Db_Adapter_Pdo_Mysql(array(
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname'   => 'zendfwork'
    ));
		
		$sql = "SELECT *
			FROM geo_cities where cty_id='$con_id'" ;
			$result = $db->fetchAll($sql);
			return $result;
			
			
		     
			 
	}
	public function delete($id)
	{
		$db = new Zend_Db_Adapter_Pdo_Mysql(array(
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname'   => 'zendfwork'
    ));
		
		
		$db->delete('register', 'id ='.$id.'');	
	}
}

