<?php

class Adminpanel_Model_DbTable_Admin extends Zend_Db_Table_Abstract
{

    protected $_name = 'admin';
	
	public function login($username,$password){
		
			$select  = $this->select()->where('username = ?', $username)
									->where('password = ?', $password);
		  
		return $this->fetchAll($select);
		}
	public function changepassword($password,$id){
			$data = array(
						'password'=>$password
					);
			$where = $this->getAdapter()->quoteInto('id = ?', $id);
			
			$this->update($data,$where);
		}
	

}

