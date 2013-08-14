<?php

class Application_Model_DbTable_City extends Zend_Db_Table_Abstract
{

    protected $_name = 'geo_cities';

public function select_city($cty_id)
	{
		$select  = $this->select()->where('sta_id = ?', $cty_id);
		return $data=$this->fetchAll($select);	
	}
}

