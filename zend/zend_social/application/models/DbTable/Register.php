<?php

class Application_Model_DbTable_Register extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';
	
	public function insert_user($data){
		
		$this->insert($data);
			
		}
	public function check_email($email){
		
			$select  = $this->select()->where('email = ?', $email);
			return $rows = $this->fetchRow($select);
			
		}
	public function check_username($username){
	
		$select  = $this->select()->where('username = ?', $username);
		return $rows = $this->fetchRow($select);
		
	}
	public function login($username,$password)
	{
	
		 $select  = $this->select()->where('username = ?', $username)
									->where('password = ?', $password);
		  
		return $this->fetchAll($select);    
	
	}
	public function userdata($id)
	{
		$select  = $this->select()->where('id = ?', $id);
		return $this->fetchAll($select);
	}
	public function uploadimage($name,$id){
		
	
		$data = array(
						'userfile'=>$name
					);
		$where = $this->getAdapter()->quoteInto('id = ?', $id);
			
		$this->update($data,$where);
	}
	public function edituser($id,$data){
	
		$where = $this->getAdapter()->quoteInto('id = ?', $id);
			
		$this->update($data,$where);
	}
	public function alluser(){
		return $this->fetchAll();	
	}
	//select the user except the current user
	public function nearbyuser($id){
		$select=  $this->select()->where('id = ?', $id);
		return $this->fetchAll($select);
	}


}

