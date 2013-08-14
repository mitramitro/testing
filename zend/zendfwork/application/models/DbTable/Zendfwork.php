<?php

class Application_Model_DbTable_Zendfwork extends Zend_Db_Table_Abstract
{

    protected $_name = 'register';
	
	public function addContact($data)

{

		
		//$data=array("username"=>'sadfasd',"email"=>'asdfdasf','password'=>'passdsfds');
//print_r($data);
//die;
		$this->insert($data);

}
	public function login($username,$password)
	{
		
		 $select  = $this->select()->where('username = ?', $username)
										->where('password = ?', $password);
              
		return $this->fetchAll($select);
		
	}
	public function alldata()
	{
		
		$select=$this->select()->order('id DESC');
		$data=$this->fetchAll($select);	
		return $data;
	}
	public function deleterow($id)
	{
		$where = $this->getAdapter()->quoteInto('id = ?', $id);
		
		//$row = $this->fetchRow('id = 6');
 		$this->delete($where);
		
		// DELETE this row
			
		//echo "success";
		
		
	}
    public function getUser($id)
    {

        $row=$this->fetchRow('id ='.$id);
        if(!$row)
        {
            throw new Exception("Could not find row");
        }
        return $row->toArray();
    }
    public function userUpdate($data,$id)
    {
        $this->update($data, 'id = '. $id);
    }
}

