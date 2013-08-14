<?php
class users extends CI_Model
{



function __construct()
	{
		parent::__construct();
		
	}
	
	function register($email,$username, $password)
	{
	    $new_user = array (
		'email'=>$email,
	    	'username'=>$username,
	    	'password'=>$password
	    );

	    $this->db->insert('casino_users', $new_user);

		return true;
	}
	/******************************************/
	function update_loginstatus($username)
	{
		
	    $data = array(
               'login_active' => '1',
               'date_created' => date('d-m-y')
            );

			$this->db->where('username',$username);
			$this->db->update('casino_users', $data); 
			
		return true;
	}
	
	function update_logoutstatus($username)
	{
		
	    $data = array(
               'login_active' => '0',
               'date_created' => date('d-m-y')
            );
			

			$this->db->where('username',$username);
			$this->db->update('casino_users', $data); 
			
		return true;
	}
	
	
	function user_detailss($username)
	{
		$this->db->where('username',$username);
		$query = $this->db->get('casino_users');

		foreach ($query->result_array() as $row)
		{
			$email= $row['email'];
			$uname=$row['username'];
			$pwd=$row['password'];
			$login_act=$row['login_active'];
			
			return $row;
		}
		
	}
	
	
	/******************************************/
	
	function check_email_availablity()
{
        $email = trim($this->input->post('email'));
	$email = strtolower($email);	
 
	$query = $this->db->query('SELECT * FROM casino_users where email="'.$email.'"');
 
	if($query->num_rows() > 0)
	return false;
	else
	return true;
}

public function check_user_exist($usr)
{
 $this->db->where("username",$usr);
 $query=$this->db->get("casino_users");
 if($query->num_rows()>0)
 {
  return true;
 }
 else
 {
  return false;
 }
}


function login($username,$password)
 {
  $this->db->where("username",$username);
  $this->db->where("password",$password);

  $query=$this->db->get("casino_users");
  if($query->num_rows()>0)
  {
   foreach($query->result() as $rows)
   {
    //add all data to session
    $newdata = array(
      'user_id'  => $rows->uid,
      'user_name'  => $rows->username,
      'user_email'    => $rows->email,
      'logged_in'  => TRUE,
    );
   }
   
   $this->session->set_userdata($newdata);
   return true;
  }
  return false;
 }



	public function logins($username, $password)
	{

		$query = $this->db->get_where('casino_users', array('username'=>$username, 'password'=>$password, 'login_active'=>'1'));



		if ($query->num_rows()==0){
		
	
		 return false;
		 }
		else{

	
			$result = $query->result();
			
			$userid = $result[0]->uid;
			$username = $result[0]->username;
			$password = $result[0]->password;

			return true;
		}

	}
	
	
	public function  is_member($facebook_user)
	{
		$this->db->where('email',$facebook_user['email']);
		$query=$this->db->get('facebook_users');
		if($query->num_rows()==1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function  log_in($facebook_user)
	{
		$data=array('is_logged_in'=>1,
		             'email'=>$facebook_user['email'],
					 'name'=>$facebook_user['name']
					 );
					 $this->session->set_userdata($data);
					 
	}
	public function  sign_up_from_facebook($facebook_user)
	{
		$hash = strtoupper(md5(rand()));
        $password = substr($hash, rand(0, 22), 10);  
		$data=array('first_name'=>$facebook_user['first_name'],
		             'last_name'=>$facebook_user['last_name'],
					 'email'=>$facebook_user['email'],
					 'facebook_id'=>$facebook_user['id'],
					 'password'=> $password
					 
		);
		
		$this->db->insert('facebook_users',$data);
		$userdata=array('username'=>$facebook_user['first_name']."".$facebook_user['last_name'],
		                'email'=>$facebook_user['email'],
					    'password'=> $password,
						'login_active'=> 1,
					 		);
		$this->db->insert('casino_users',$userdata);
		//$config['mailtype']='html';
		//$this->email->initialize($config); 
		$this->load->library('email');
		$this->email->from('nanowebtech802@gmail.com','Nano web technologies');
		$this->email->to($facebook_user['email']);
		$this->email->subject('Email Test');
		$this->email->set_mailtype("html");
	
        //$a=$this->email->message('new password is "'.$password.'"');
		$dateformat=date("l j F  Y");
	
       $this->email->message('
	   
	   <html><body style="background-image:url('.base_url().'/images/body_background.png); background-repeat:repeat-x; background-color:#d4c5ae; margin:0px; padding:0px;"">
	   
	   <div style="width:700px; height:auto; margin:auto;">
        
        <div style="width:700px; height:90px; float:left;">
        <div style="width:233px; height:67px; float:left; padding-top:13px;"><a href="#"><img src="'. base_url().'/images/logo.png" alt="" width="233" height="67" border="0" /></a></div>
        <div style="float:right; font-family:Georgia, Times New Roman, Times, serif; font-size:20px; font-weight:normal; color:#FFF; font-style:italic; padding-top:30px;">'.$dateformat.'</div>
        </div>
     <div style="clear:both;"></div>   

    <div style="width:700px; height:56px; background:#007dda;">
    <h1 style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:29px; font-weight:normal; float:left; padding:5px 0 0 17px; margin:0px; color:#FFF;"><span style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:29px; font-weight:normal; color:#fff;">Login</span> Details</h1>
    
    <h2 style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; font-size:20px; font-weight:normal; margin:0px; float:right; padding:13px 17px 0 0; color:#fff; font-weight:normal;">Thank You for registration</h2>
    
    </div>
    <div style="font-family:dgfj; ">
	
	<div style="width:700px; height:330px; background:url(http://localhost/Casino//images/about_bg.png) repeat-x; float:left;">
    
    <div style="float:left; height: auto; padding: 0 20px; width: 660px;">
    <h2 style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif; margin:0px; padding-top:30px; font-size:25px; font-weight:normal; color:#0972B4;">Login detail with new password</h2>
    <hr color="#D4C5AE" >
    <p style="font-family:Verdana, Geneva, sans-serif; font-size:13px; font-weight:normal; padding-top:10px; color:#5f5f5f; line-height:24px; margin:0px; font-family:Times New Roman, Times, serif;"><i>Thanks for Login with facebook. your Login Details as follows:</i> 

<br><font color="#6699CC" size="+1">Username:  '.$facebook_user['username'].' 
<br>Password:  '.$password.'
</font>

</p>
<br/>
<p>Now you can successfully login on '.anchor('http://webgamblingtalk.com','webgamblingtalk').' </p>
    </div>
    
    </div>
	    
     <div style="width:700px; height:auto; float:left; background-color:#FFF; padding-bottom:0px;">
    
    
    
    
    <div style="width:700px; height:auto; float:left; padding-top:0px;"><img src="'. base_url().'/images/banner.png" alt="" width="700" height="93" border="0" /></div>
    
    
    
    </div>
   
        <div style="clear:both;"></div>
        </div>
        
        <div style="width:100%; height:131px; background-image:url('. base_url().'/images/footer_bg.png); background-repeat:repeat-x;">
        
        
        <div style="width:700px; height:131px; margin:0 auto;">
    
    <div style="width:400px; float:left;">
    <h5 style="font-family:Verdana, Geneva, sans-serif; font-size:12px; font-weight:normal; color:#115665; padding:30px 0 0 50px; margin:0px;">Copyright@2012.All Right Reserved</h5>
    <h6 style="font-family:Verdana, Geneva, sans-serif; font-size:12px; font-weight:bold; color:#0972B4; margin:0px; padding:8px 0px 0px 50px "><a href="#" style=" color:#0972B4; text-decoration:none;">GAMBLINGPROPHET.COM</a></h6>
    
    </div>
    
    
    <div style="float:right; padding:25px 51px 0 0; margin:0px;"><a href="#"><img src="'. base_url().'/images/footer_logo.png" alt="" width="184" height="58" border="0" /></a></div>
    
    </div>
        
        </div></body></html>');
		
		
		
		$this->email->send();
		/*if($this->email->send())
		{
			echo "mail sent";
		}
		else
		{
			echo "mail sending failed";
		}die('this is die');*/
		  
	}
	
}
?>