<?php 
class Zend_View_Helper_Sidebar extends Zend_View_Helper_Abstract
{
    //protected $_list;
    public function sidebar()
    {
		$obj= new Application_Model_DbTable_Register();
	   $sess = new Zend_Session_Namespace('MyNamespace');
	  	
		//object for social model
	  	$objsocial = new Application_Model_Social();
		//echo "<pre>";
		 //print_r($sess->logindata);
		$data=$sess->logindata;
		/// Zend_Layout::getMvcInstance()->assign('whatever', $data); 
		foreach($data as $val)
		{
			$id=$val->id;
			$username=$val->username;
		}
		 
		 
			
		 //login userdata
		 //$userdata=$obj->userdata($id);
		 //all user in table
		 $alldata= $obj->alluser();
			
		 $alltmpdata = $objsocial->selectinsertuser($id);
		 //print_r($alldata);
		$cuserid=$alltmpdata[0]['current_userid'];
		 foreach($alltmpdata as $userid){
			 $tmpalluser[]= $userid['alluser_id']; 
			 
		 }
		
		//print_r($tmpalluser);
		 
		 //exclude the current user
		 $i=0;
		 foreach($alldata as $value)
		 {
			if($id != $value->id){
				 	//$alluser[]=$obj->nearbyuser($value->id);
					if($id == $cuserid)
					{
						
						if($tmpalluser[$i]!==$value->id){
							//echo $value->id;
							$insertalluser = $objsocial->insertuser($id,$value->id);
						}
						
						//echo $objsocial->updatetmp_data($cuserid,$value->id);
						//echo $cuserid;
						//echo $value->id;
						//echo "success";
						$i++;
					}
					else
					{
						$insertalluser = $objsocial->insertuser($id,$value->id);
						//echo "failed";
					}
					
				}
					 
		 }
		 //fetach all user from tmp tale
		 $alluser = $objsocial->fetchtempdata($id);
		 //echo "<pre>";
		 //print_r($alluser);
		 
		 
		 //users friend request
		 $objsocial = new Application_Model_Social();
		 $friendrequest = $objsocial->friendrequest($id);
		// echo "<pre>";
		 //print_r($friendrequest);
		 
		 //$this->view->friendrequest=$friendrequest;
		// $this->view->alluser = $alluser;
		 //Zend_Layout::getMvcInstance()->assign('friendrequest', $friendrequest); 
		// Zend_Layout::getMvcInstance()->assign('alluser', $alluser); 
	   	 //$this->view->fileform  = $fileuplaod;
		// $this->view->userdata=$userdata;
		
		//friend list
			$sess = new Zend_Session_Namespace('MyNamespace');
		  $id=$sess->logindata[0]->id;
		
		 $objsocial = new Application_Model_Social();
		 $friendlist = $objsocial->friend_list($id);
		 //print_r($friendrequest);
		 $this->view->request = $friendlist;
		 $this->view->id = $id;
		//end friend list
		
		//succcess message
			
		
		//
		 return $data = array('alluser'=>$alluser, 'friendrequest' => $friendrequest, 'friendlist' => $friendlist,
		 						);
    }
}
?>