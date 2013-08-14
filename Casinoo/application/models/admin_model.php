<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_Model extends CI_Model
{
	public function __construct()
    {
        parent :: __construct();   
    }
	//select username and password from admin_user for admin login
	public function loginAdmin()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$query=$this->db->get_where('admin_user',array('username'=>$username,'password'=>$password));
		if($query->num_rows()>0)
		{
			$fetch=$query->result();
			foreach($fetch as $value)
			{
				$id=$this->session->set_userdata('id',$value->id);
								$row=$value;
				$this->session->set_userdata('userid',$row);
			}
			redirect('admincontroller/adminhome');
		}
		else
		{
			$this->session->set_flashdata('errorlogin', 'Invalid Username and Password!');
			redirect('adminController/show');
		}
		
	}
	//insert data into casino table
	public function insert_data()
	{
	
		$check=$this->checkData();
		
		if($check>0)
		{
		
			$this->session->set_flashdata('error', 'Casino Name Already Exist');
			/*redirect('admincontroller/admincasino');*/
			$this->load->view('admin/addcasino');
		}
		else
		{
		
			$country=$this->input->post('country');
			$coun = array();
			for($i=0;$i<count($country);$i++)
			{
				$coun[] = $country[$i];
				
			}
			$conData = implode(",",$coun);
			$casino_name=$this->input->post('category');
			$description=$this->input->post('cat_desc');
			$url=$this->input->post('siteUrl');
			$filename=$_FILES['casinoImg']['name'];
			$data=array(
						'country' => $conData,
						'casino_name'=>$casino_name,
						'description'=>$description,
						'site_url' =>$url,
						'filename'=>$filename
						
						);
						
			$query=$this->db->insert('casino',$data);
			if($this->db->insert_id())
			{
				redirect('admincontroller/casinoList');
			}
			else
			{
				//$this->session->set_flashdata('error','plz try again');
				redirect('admincontroller/addcasino');
			}
		}
	}
	//check casino exist or not
	public function checkData()
	{
		$casino_name=$this->input->post('category');
		$query=$this->db->get_where('casino',array('casino_name'=>$casino_name));
		$rows=$query->num_rows();
		return $rows;
	}
	//return id exist of not
	public function checkId()
	{
		$casino_name=$this->input->post('category');
		$query=$this->db->get_where('casino',array('casino_name'=>$casino_name));
		$rows=$query->num_rows();
		if($rows>0)
		{
			$fetch=$query->result();
			foreach($fetch as $value)
			{
				$fetchid=$value->id;
			}
		}
		return $fetchid;
	}
	public function casinorecord_count()
	{
		 return $this->db->count_all("casino");
	}
	//select casino list from the table from casino table
	public function selectCasino($limit,$start)
	{
		$query=$this->db->get('casino',$limit, $start);
		$fetch=$query->result_array();
		return $fetch;
	}
	//update status active or inactive
	public function update_status($id,$status)
	{
		if($status=='active')
		{
			$data=array('status'=>'inactive');
			$this->db->where('id',$id);
			$this->db->update('casino',$data);
		}
		elseif($status=='inactive')
		{
			$data=array('status'=>'active');
			$this->db->where('id',$id);
			$this->db->update('casino',$data);
		}
		redirect('AdminController/casinoList');
	}
	//delet the record form table casino
	public function deleteCasino($id)
	{
		$this->db->delete('casino',array('id'=>$id));
		$this->session->set_flashdata('cderror','Deleted Successfully');
		redirect('AdminController/casinoList');
	}
	//select the data from casino for update
	public function selectupdateCasino($id)
	{
		$query=$this->db->get_where('casino',array('id'=>$id));
		$fetch=$query->result();
		return $fetch;	
	}
	//update casino table
	public function updateCasino($id)
	{
		$data=array('casino_name'=>$this->input->post('category'),'description'=>$this->input->post('cat_desc'));
		$this->db->where('id',$id);
		$this->db->update('casino',$data);
		$this->session->set_flashdata('ecerror','Updated Successfully');
		redirect('AdminController/casinoList');
	}
	public function count_user()
	{
		return $this->db->count_all('register');	
	}
	//select user from register table
	public function selectUser($limit,$status)
	{
		$query=$this->db->get('register',$limit,$status);
		
			$fetch=$query->result_array();	
			
		
		return $fetch;
		
	}
	//update user status
	public function user_Status($id,$status)
	{
		if($status=='active')
		{
			$data=array('status'=>'inactive');
			$this->db->where('id',$id);
			$this->db->update('register',$data);
		}
		elseif($status=='inactive')
		{
			$data=array('status'=>'active');
			$this->db->where('id',$id);
			$this->db->update('register',$data);
		}
		redirect('AdminController/manageUser');
	}
	//delete user from table register
	public function delete_User($id)
	{
			$this->db->delete('register',array('id'=>$id));
			$this->session->set_flashdata('delerror','User deleted Successfully');
			redirect('AdminController/manageUser');
	}
	//add games categories in table gamecategory
	public function addgames_Cat()
	{
			$gcat_name=$this->input->post('category');
			$description=$this->input->post('cat_desc');
			$filename=$_FILES['userfile']['name'];
			$data=array('game_cat_name'=>$gcat_name,
						'description'=>$description,
						'filename'=>$filename
						);
			$query=$this->db->insert('games_category',$data);
			if($this->db->insert_id())
			{
				redirect('AdminController/gamecat_list');
			}
			else
			{
				//$this->session->set_flashdata('gcat_error','plz try again');
				redirect('AdminController/addGamescat');
			}
	}
	//select games cat from table games_category
	public function select_Gcat()
	{
		$query=$this->db->get('games_category');
		$fetch=$query->result_array();
		return $fetch;
	}
	//delete games category
	public function deleteGcat($id)
	{
		$this->db->delete('games_category',array('cat_id'=>$id));
		redirect('AdminController/gamecat_list');
	}
	public function statusGcat($id,$status)
	{
		if($status=='active')
		{
			$data=array('status'=>'inactive');
			$this->db->update('games_category',$data,array('cat_id'=>$id));
		}
		elseif($status=='inactive')
		{
			$data=array('status'=>'active');
			$this->db->update('games_category',$data,array('cat_id'=>$id));
		}
		redirect('AdminController/gamecat_list');
	}
	//select the data from games category for updating
	public function selectGcat($id)
	{
		$cat_id=$id;
		$query=$this->db->get_where('games_category',array('cat_id'=>$cat_id));
		$fetch=$query->result();
		foreach($fetch as $value)
		{
			$fetchd[]=$value;
		}
		return $fetchd;
	}
	public function edit_Gcat($id)
	{
			$gcat_name=$this->input->post('category');
			$description=$this->input->post('cat_desc');
			$filename=$_FILES['userfile']['name'];
			$data=array('game_cat_name'=>$gcat_name,
						'description'=>$description,
						'filename'=>$filename
						);
		$this->db->update('games_category',$data,array('cat_id'=>$id));
		
		redirect('AdminController/gamecat_list');
	}
	//Insert the Games name into gamestable 
	public function insertGames()
	{
		$data=array('game_name'=>$this->input->post('category'),
					'game_cat_id'=>$this->input->post('cat_id'),
					'description'=>$this->input->post('cat_desc'),
					'filename'=>$_FILES['userfile']['name']
					);
		$query=$this->db->insert('game_names',$data);
		$this->session->set_flashdata('inserterrror','Inserted Succesfully');
		redirect('AdminController/gamesList');
	}
	public function gamesrecord_count()
	{
		return $this->db->count_all("game_names");
	}
	public function selectGames($limit,$start)
	{
		$query = $this->db->get('game_names', $limit, $start);
		//$query=$this->db->get('game_names');
		$fetch=$query->result_array();
		return $fetch;
	}
	public function game_Status($id,$status)
	{
		if($status=='active')
		{
			$data=array('status'=>'inactive');
			$this->db->update('game_names',$data,array('game_id'=>$id));
		}
		elseif($status=='inactive')
		{
			$data=array('status'=>'active');
			$this->db->update('game_names',$data,array('game_id'=>$id));
		}
		redirect('AdminController/gamesList');
	}
	public function delete_game($id)
	{
		$this->db->delete('game_names',array('game_id'=>$id));
		$this->session->set_flashdata('deleteerror','Delelted Successfully');
		redirect('AdminController/gamesList');
	}
	 public function record_count() {
        return $this->db->count_all("casino_newsletter");
    }
	 public function fetch_Records($limit, $start) {
		
  
	  $query= $this->db->order_by("email", "asc"); 
	   $query = $this->db->get('casino_newsletter', $limit, $start);
     


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
	     }
            return $data;
        }
       
   }
	
	function DeleteRecord($id)
	{
			$query=$this->db->where('news_id', $id);
		$query=$this->db->delete('casino_newsletter'); 
		redirect('Newsletter/subscriberlist');	
	}
	
	
	function UpdateStatus($id,$sid)
{
	
	
	if($sid=='inactive')
		{
			$data=array('status' => 'active');
			
		$query=$this->db->where('news_id', $id);
		$query=$this->db->update('casino_newsletter',$data);
		
		}
		else if($sid=='active')
		{
			$data=array('status' => 'inactive');
			$query=$this->db->where('news_id', $id);
			$query=$this->db->update('casino_newsletter',$data);
				
		}
redirect('Newsletter/subscriberlist');	
}
	
	
	   /* function GetAutocomplete($options = array())
    {
	    $this->db->select('email');
	    $this->db->like('email', $options['keyword'], 'after');
   		$query = $this->db->get('casino_newsletter');
		return $query->result();
    }*/
	
	function GetAutocomplete($options = array())
	{
		$q = strtolower($_GET["q"]);
	if (!$q) return;

 	   
	  $query="select email from casino_newsletter";

	$arr = array();
	$rs = mysql_query($query);
	
	
	  $count=mysql_num_rows($rs);
	 
	$i=0;
	$str="";
	echo "[";

	while($obj = mysql_fetch_array($rs)) {

		 

	   if($i < $count-1){

		$str=",";

	   } else {

		$str="";

	   }
	
	
	 echo '{'.'"id"'.':'.'"'.$obj['email'].'"'.','.'"name"'.':'.'"'.$obj['email'].'"}'.$str;
	   $i++;

	}
	echo "]";
	}
	
	public function SendDATA($image_name)
	{
		$data =array('attachment_name' => $image_name);
		$query = $this->db->insert('casino_uploads',$data);
	}
	
	public function getcountryNames()
	{
		$this->db->select('*');
		$this->db->from('country');
		$query=$this->db->get();
		return $query->result();
	}
	/*---------------------------admin mail content module model functions starts from here----------------------*/
	
	public function getResiterMailContent()
	{
		$this->db->select('*');
		$this->db->from('mail_content');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function getUniqueMailContent($id)
	{
		$this->db->select('*');
		$this->db->from('mail_content');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function updateMailContent($id)
	{
			$content=$this->input->post('cat_desc');
		
			$data=array('register_content' => $content);
			$this->db->where('id',$id);
			$query=$this->db->update('mail_content',$data);
			redirect('admincontroller/show_mailContent');
	}
	
	/*---------------------------admin mail content module model functions ends here------------------------------*/ 
	/*--------------------admin confirm users module model functions starts from here-------------------------*/
	public function getConfirmUsers()
	{
		$this->db->select('*');
		$this->db->from('casino_users');
		//$this->db->where('login_active','1');
		$query=$this->db->get();
		return $query->result();
		
	}
	/*--------------------admin confirm users module model functions ends here-------------------------*/
	/*--------------------get user status for active inactive starts-------------------------*/
	public function getLogin_Status($val,$uname)
	{
		$data=array('login_active' => $val);
		$this->db->where('username',$uname);
		$query=$this->db->update('casino_users',$data);
		redirect('admincontroller/ShowConfirmUsers');
	}
	/*--------------------get user status for active inactive ends-------------------------*/
	public function setnewGames()
	{
		$data=array('game_name'=>$this->input->post('game_name'),
					'type'=>$this->input->post('type'),
					'software'=>$this->input->post('software')
				   );
		$query=$this->db->insert('games',$data);
		$id=$this->db->insert_id() ; 
		redirect('admincontroller/Setgamedescription/'.$id.'');
	}
	
	public function setgame_desc()
	{
		/*$data=array('game_name'=>$this->input->post('game_name'),
					'type'=>$this->input->post('type'),
					'software'=>$this->input->post('software')
				   );
		$query=$this->db->update('games',$data);
		redirect('admincontroller/Setgamedescription');*/
	}
	public function fetch_cntry_name()
	{
		$query = $this->db->get('country_t');
         
		
		foreach ($query->result() as $row)
		{
			 $data=array($short_name=$row->short_name,
	    	 $flag_path=$row->flag_path,
			 $long_name=$row->long_name);
			 		
		}
		
		return $this->db->get('country_t')->result();
		
	}
	

		
} 
?>