<?php 
class Zend_View_Helper_Header extends Zend_View_Helper_Abstract
{
    //protected $_list;
    public function header()
    {
		$sess = new Zend_Session_Namespace('MyNamespace');
	    $id=$sess->logindata[0]->id;
		
		$obj = new Application_Model_Social();
		
		$countrequest = count($obj->request($id));
		$countmessage = count($obj->messagelist($id));
		return array('countrequest'=>$countrequest,'countmessage' => $countmessage);
		
		
	}
}
?>