<?php

class Adminpanel_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';

	public function userlist(){
			return $this->fetchAll();
		}
	public function deleteuser($id)
	{
			$where = $this->getAdapter()->quoteInto('id = ?', $id);
 
			$this->delete($where);
	}
	public function updateuser($id,$status){
			   
     		if($status==active){
				
				   $data = array(
						'status' => 'inactive'
					 );
				}
			elseif($status==inactive){
					$data=array(
						'status' => 'active'	
					);
				}
     
   			$where = $this->getAdapter()->quoteInto('id = ?', $id);
     
    		$this->update($data, $where);
		}
	

}

