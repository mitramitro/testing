<?php

class Application_Model_DbTable_Country extends Zend_Db_Table_Abstract
{

    protected $_name = 'geo_countries';

	public function select_country()
	{
		/*$select  = $this->_db->select()
                            ->from($this->_name,
                    array('key' => 'id','value' => 'country_name'));
        $result = $this->getAdapter()->fetchAll($select);
        return $result;*/
		$data=$this->fetchAll();
		foreach($data as $value)
		{
			$country[$value->con_id]=$value->name;	
		}
		return $country;
			
	}
	
}

