<?php

class Users extends CI_Model {
	
   
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

	function login($username, $password)
	{

		$query = $this->db->get_where('casino_users', array('username'=>$username, 'password'=>$password));
		

		if ($query->num_rows()==0){
	
		
		 return false;
		 }
		else{
	
	
			$result = $query->result();
			//$userid = $result[0]->id;
			$username = $result[0]->username;
			$password = $result[0]->password;

			return true;
		}

	}

}