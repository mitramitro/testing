<?php

class Application_Model_DbTable_State extends Zend_Db_Table_Abstract
{

    protected $_name = 'geo_states';

	public function select_state($id)
	{
		/*$select  = $this->_db->select()
                            ->from($this->_name,
                    array('key' => 'id','value' => 'country_name'));
        $result = $this->getAdapter()->fetchAll($select);
        return $result;*/
		$select  = $this->select()->where('con_id = ?', $id);
		return $data=$this->fetchAll($select);
		
			
	}
	
}

