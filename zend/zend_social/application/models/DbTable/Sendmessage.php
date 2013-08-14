<?php

class Application_Model_DbTable_Sendmessage extends Zend_Db_Table_Abstract
{

    protected $_name = 'message_list';

	public function sendmessage($data){
			
			$this->insert($data);
			
		}
	/*public function changestatus($id){
			
			$data = array(
						'message_status'=>'inactive'
					);
		$where = $this->getAdapter()->quoteInto('msg_id = ?', $id);
		$this->update($data,$where);
		
		}*/

}

