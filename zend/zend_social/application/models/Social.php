<?php
class Application_Model_Social
{
	
	
	public function init(){
		
			return $db = Zend_Db_Table::getDefaultAdapter();
		}
	//insert near by user id in tmp_table	
	public function insertuser($id,$alluserid)
	{
			//echo $id;
			//echo $alluserid;
		$conn=$this->init();
		
		$data = array('current_userid'=>$id,
					   'alluser_id'=>$alluserid
					);
		$conn->insert('tmp_data', $data);	
	}
	//check the insert user when they login second times fetch data from temp table
	public function selectinsertuser($id){
		
			$conn=$this->init();
			return $conn->fetchAll('SELECT * FROM tmp_data where current_userid = ?', $id);
			
		}
	
	//select the tmp table data for the current user
	public function fetchtempdata($id){
		
			$conn= $this->init();
			$query = $conn->query("SELECT * FROM tmp_data tmp, users us
								 where tmp.current_userid =  '$id' 
								 and tmp.display_status = 'active'
								 and us.id = tmp.alluser_id ");
			return $query->fetchAll();	
	}
	//status changed in when friend request send
	public function request_status($sender_id, $reciever_id){
		
			$conn= $this->init();
			$data = array('request_status' => 'sending');
			$where[] = "current_userid = $sender_id";
			$where[] = "alluser_id = $reciever_id";
			$update = $conn->update('tmp_data', $data, $where);
			
		}
	
	public function send_friendrequest($sender_id, $reciever_id)
	{
			 $conn=$this->init();
			 $data=array('sender'=>$sender_id,
						 'reciever'=>$reciever_id
						);

			$conn->insert('friend_request', $data);
			
		    //$sql = 'SELECT * FROM  users';
   			//return $result = $conn->fetchAll($sql);
			
	}
	public function friendrequest($id){
			
			    $conn=$this->init();
				return $result = $conn->fetchAll('SELECT * FROM friend_request WHERE sender = ? order by reciever',$id);
							
		}
	public function request($id){
			$conn= $this->init();
			$query = $conn->query("SELECT * FROM friend_request fr, users us
								 where fr.reciever =  '$id' 
								 and fr.status = 'inactive'
								 and us.id = fr.sender ");
			return $query->fetchAll();
		
		}
	public function confirmrequest($sender, $reciever){
			
			$conn= $this->init();
			$data = array('status' => 'active');
			$where[] = "sender = $reciever";
			$where[] = "reciever = $sender";
			$update = $conn->update('friend_request', $data, $where);
		}
	public function friend_list($id){
		
			$conn= $this->init();
			$query = $conn->query("SELECT * FROM friend_request fr, users us
								 where fr.reciever =  '$id' 
								
								 and fr.status = 'active'
								 and us.id = fr.sender 
								 ");
			return $query->fetchAll();
		}
	//insert the data in friend list after confirm the friend request
	public function send_requestconfirm($sender_id, $reciever_id)
	{
			 $conn=$this->init();
			 $data=array('sender'=>$sender_id,
						 'reciever'=>$reciever_id,
						 'status' => 'active'
						);

			$conn->insert('friend_request', $data);
			
		    //$sql = 'SELECT * FROM  users';
   			//return $result = $conn->fetchAll($sql);
			
	}
	//change display status for CONFIRM in tmp_data table click on the confirm
	public function chagedisplaystatusconfirm($current_userid,$alluser_id){
		
			$conn= $this->init();
			$data = array('display_status' => 'inactive');
			$where[] = "current_userid = $current_userid";
			$where[] = "alluser_id = $alluser_id";
			$update = $conn->update('tmp_data', $data, $where);
		}
	//change display status for SENDER in tmp_data table click on the confirm
	public function chagedisplaystatussender($current_userid,$alluser_id){
		
			$conn= $this->init();
			$data = array('display_status' => 'inactive');
			$where[] = "current_userid = $alluser_id";
			$where[] = "alluser_id = $current_userid";
			$update = $conn->update('tmp_data', $data, $where);
		}
	public function del_friendrequest($sender, $reciever){
			$conn= $this->init();
			$where[] = "sender = $sender";
			$where[] = "reciever = $reciever";
			$conn->delete('friend_request', $where);
		}
	//Changed the request status when discard the request
	public function changetmprequeststatus($sender_id, $reciever_id){
		
			$conn= $this->init();
			$data = array('request_status' => 'pending');
			$where[] = "current_userid = $sender_id";
			$where[] = "alluser_id = $reciever_id";
			$update = $conn->update('tmp_data', $data, $where);
		}
	//count the message
	public function messagelist($id){
		
			
			$conn= $this->init();
			$query = $conn->query("SELECT * FROM message_list msg, users us
								 where msg.reciever =  '$id' 
								 and msg.message_status = 'active'
								 and us.id = msg.sender ");
			return $query->fetchAll();
		
		}
	public function allmessagelist($id){
		
			
			$conn= $this->init();
			/*$query = $conn->query("SELECT * FROM message_list msg, users us
								 where msg.reciever =  '$id' 
								
								 and us.id = msg.sender  order by msg_id desc");*/
			$query = $conn->query("SELECT * FROM(SELECT * FROM message_list msg, users us
								 where msg.reciever =  '$id' 
								
								 and us.id = msg.sender  order by msg_id desc)
			
									 AS whatever
									GROUP BY sender");
								
			return $query->fetchAll();
		
		}
	
	public function sender_conversation($current_id,$sender_id){
		
			$conn= $this->init();
			$query = $conn->query("SELECT msg. * , us.username, us.gender, us.userfile
												FROM message_list msg, users us
												WHERE msg.reciever = '$current_id'
												AND msg.sender = '$sender_id'
												AND us.id = msg.sender
												OR (
												msg.reciever = '$sender_id'
												AND msg.sender = '$current_id'
												AND us.id = msg.sender
												)"
											);
											
			return $query->fetchAll();
												
		}
	public function changestatus($current_id, $sender){
		
			$conn= $this->init();
			$data = array(
						'message_status'=>'inactive'
					);
			$where[] = "sender = $sender";
			$where[] = "reciever = $current_id";
			$update = $conn->update('message_list', $data, $where);
		}
	
		

}

