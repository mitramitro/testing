<?php

class Login extends CI_Controller {



	function __construct()
	{ 
	 
		parent::__construct();
		$this->load->model('users');
	}
	
	
	function register()
	{
	
if(isset($_POST['username']))
		{
			// User has tried registering, insert them into database.
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$this->users->register($email,$username, $password);
			
			 $this->load->library('email');
               $this->email->from('nanowebtech13@gmail.com', 'nano');
               $this->email->to($email);
			   $this->email->set_mailtype('html');
               $this->email->subject('Registration Confirmation');
			   
			    /* $this->email->message('Click the link below to activate your account' . anchor('http://localhost/codetwo/index.php/user/confirmation_activation/' . $activation_code,'Confirmation Register'));*/
            $body=$this->email->message('<div style="width:700px; height:auto; margin:auto;">
        
        <div style="width:700px; height:90px; float:left;">
        <div style="width:233px; height:67px; float:left; padding-top:13px;"><a href="#"><img width="233" height="67" border="0" alt="" src="http://192.168.0.24/Casino/images/logo.png"></a></div>
        <div style="float:right; font-family:Georgia, Times, serif; font-size:20px; font-weight:normal; color:#FFF; font-style:italic; padding-top:30px;">Tuesday 15th October 2012</div>
        </div>
     <div style="clear:both;"></div>   

    <div style="width:700px; height:56px; background:#007dda;">
    <h1 style="font-family: Arial, Helvetica, sans-serif; font-size:29px; font-weight:normal; float:left; padding:5px 0 0 17px; margin:0px; color:#FFF;"><span style="font-family: Arial, Helvetica, sans-serif; font-size:29px; font-weight:normal; color:#fff;">Confirmation Mail</span></h1>
    
    <h2 style="font-family: Arial, Helvetica, sans-serif; font-size:20px; font-weight:normal; margin:0px; float:right; padding:13px 17px 0 0; color:#fff; font-weight:normal;">Thank You for registration</h2>
    
    </div>
    
    <div style="width:700px; height:330px; background:url(http://192.168.0.24/Casino/images/about_bg.png) repeat-x; float:left;">
    
    <div style="float:left; height: auto; padding: 0 20px; width: 660px;">
    <h2 style="font-family: Arial, Helvetica, sans-serif; margin:0px; padding-top:30px; font-size:25px; font-weight:normal; color:#0972B4;">Confirmation mail</h2>
   <p style="font-family:Verdana, Geneva, sans-serif; font-size:13px; font-weight:normal; padding-top:10px; color:#5f5f5f; line-height:24px; margin:0px; font-family:Times New Roman, Times, serif;"><i>Thanks for registration on webgamblingtalk</i>
    <p>for activation of your account click on folowing link  '.anchor("http://192.168.0.24/Casino/index.php/login/confirmation/1/$username","webgamblingtalk").'</p> </p>
    </div>
      <div style="width:700px; height:auto; float:left; padding-top:44px;"><img width="700" height="93" border="0" alt="" src="http://192.168.0.24/Casino/images/banner.png"></div>
    
    </div>
            
        <div style="clear:both;"></div>
        </div>');
		  
		 print_r( $body);
		 die('ffffff');
		 
			   /* $this->email->message('Click the link below to activate your account' . anchor('http://localhost/codetwo/index.php/user/confirmation_activation/' . $activation_code,'Confirmation Register'));
			   */
		   
		
			   if($this->email->send())

{
echo '<span style="color:#f00">Your email was sent. </span>';


}

else

{
echo '<span style="color:#f00">Your email was not sent. </span>';

show_error($this->email->print_debugger());

}
			   
			   
                //$this->email->send();
               // echo 'Click the link below to activate your account' . anchor('http://localhost/codetwo/index.php/user/account_activation/' . $activation_code,'Confirmation Register');
            //    echo " you have been registered $username";
			
			
			
			
			
			//redirect('casino');
		}
		else
		{
			//User has not tried registering, bring up registration information.
			$this->load->view('indexlogin');
		}
	}
	
	
	public function check_email_availablity()
{

	$this->load->model('users');
	$get_result = $this->users->check_email_availablity();
 
	if(!$get_result )
	echo '<span style="color:#f00">Email already in use. </span>';
	else
	echo '<span style="color:#0c0">Email Available</span>';
}
	
	
	


	
	public function check_user()
{
$this->load->model('users');
 $usr=$this->input->post('username');
 $result=$this->users->check_user_exist($usr);
 if($result)
 {
  echo '<font color="red">The user name <STRONG>'.$usr.'</STRONG> is already in use.</font>';
  }
 else{
 echo 'OK';
  }
}
	
	function sign()
	{	
	echo "11";
	die;
		// Enable SSL?
		maintain_ssl($this->config->item("ssl_enabled"));
		
		// Redirect signed in users to homepage
		if ($this->authentication->is_signed_in()) redirect('');
		
		// Set default recaptcha pass
		$recaptcha_pass = $this->session->userdata('sign_in_failed_attempts') < $this->config->item('sign_in_recaptcha_offset') ? TRUE : FALSE;
		
		// Check recaptcha
		$recaptcha_result = $this->recaptcha->check();
		
		// Setup form validation
		$this->form_validation->set_error_delimiters('<span class="field_error">', '</span>');
		$this->form_validation->set_rules(array(
			array('field'=>'sign_in_username_email', 'label'=>'lang:sign_in_username_email', 'rules'=>'trim|required'),
			array('field'=>'sign_in_password', 'label'=>'lang:sign_in_password', 'rules'=>'trim|required')
		));
		
		// Run form validation
		if ($this->form_validation->run() === TRUE) 
		{
			// Get user by username / email
			if ( ! $user = $this->account_model->get_by_username_email($this->input->post('sign_in_username_email'))) 
			{
				// Username / email doesn't exist
				$data['sign_in_username_email_error'] = lang('sign_in_username_email_does_not_exist');
			}
			else
			{
			
				// Either don't need to pass recaptcha or just passed recaptcha
				if ( ! ($recaptcha_pass === TRUE || $recaptcha_result === TRUE) && $this->config->item("sign_in_recaptcha_enabled") === TRUE)
				{
					$data['sign_in_recaptcha_error'] = $this->input->post('recaptcha_response_field') ? lang('sign_in_recaptcha_incorrect') : lang('sign_in_recaptcha_required');
				}
				else
				{
				
					// Check password
					if ( ! $this->authentication->check_password($user->password, $this->input->post('sign_in_password')))
					{
						// Increment sign in failed attempts
						$this->session->set_userdata('sign_in_failed_attempts', (int)$this->session->userdata('sign_in_failed_attempts')+1);
						
						$data['sign_in_error'] = lang('sign_in_combination_incorrect');
					}
					else
					{
					
						// Clear sign in fail counter
						$this->session->unset_userdata('sign_in_failed_attempts');
						
						// Run sign in routine
						$this->authentication->sign_in($user->id, $this->input->post('sign_in_remember'));
						
					}
				}
			}
		}
		
		// Load recaptcha code
		if ($this->config->item("sign_in_recaptcha_enabled") === TRUE) 
			if ($this->config->item('sign_in_recaptcha_offset') <= $this->session->userdata('sign_in_failed_attempts')) 
				$data['recaptcha'] = $this->recaptcha->load($recaptcha_result, $this->config->item("ssl_enabled"));
		
		// Load sign in view
		$this->load->view('sign_in', isset($data) ? $data : NULL);
	}
	
	
	
	function go()
	  
	  { 
	  	
     if(isset($_POST)){
		$username = $_POST['username'];
	 	$password = $_POST['password'];
		$remember =  $_POST['remember'];

		
		
		//Returns userid is successful, false is unsuccessful
		$results = $this->users->login($username,$password);
		
		$remember = (bool) $this->input->post('remember');
	
		
		if(isset($remember) && $remember =='1'){
		
		
			 setcookie("cookname", $username, time()+60*60*24*100, "/");
             setcookie("cookpass", base64_encode($password), time()+60*60*24*100, "/");
			}
			
				else {
				
			  setcookie("cookname", $username, time()-60*60*24, "/");
              setcookie("cookpass", base64_encode($password), time()-60*60*24, "/");
			}
        if (($username =='' || $username =='Username' ) || ($password =='' || $password =='Password' ))
	
		{
		
		$message = "Please Enter Username and Password ";
		$bg_color = "#FFEBE8";
		//redirect('casino');
		} 

		if ($results==false) {  
		$message = "Please Enter Correct Username and Password";
			  $bg_color = "#FFEBE8";
		      
		
		 }		
		 
		else 
		{	
		 $this->users->update_loginstatus($username,$password);
	       $message = "LOGIN SUCCESSFULLY";
		   $bg_color  = "LawnGreen";
		   $data["uid"] = $this->session->set_userdata(array('userid'=>$results,'username'=>$results, $remember));
			//redirect('casino');
			
			
		}
		 $output = '{ "message": "'.$message.'", "bg_color": "'.$bg_color.'" }';
        echo $output;
		

	}
	  }
	  
	  
	  public function logout()
 {
 

  $this->users->update_logoutstatus($username);
  $newdata = array(
  'user_id'   =>'',
  'user_name'  =>'',
  'user_email'     => '',
  
  'logged_in' => FALSE,
  );
 
  $this->session->unset_userdata($newdata );
  $this->session->sess_destroy();
  redirect('casino');
 // $this->index();
 }
	  
	  
	/*function logout()
	{
	$this->session->set_userdata(array('userid'=>''));
	redirect('casino');
	
	
	}*/
	
	/** Clear the old cache (usage optional) **/

	function confirmation($login_status,$uname)
	{
		if(isset($uname)&& isset($login_status)&& $login_status==1 )
		{
		$this->users->update_loginstatus($uname);
		$result=$this->users->user_detailss($uname);
		
		
		
		 $uname=$result['username'];
		 $password=$result['password'];
	     $date_created=$result['date_created'];
		 $log_act=$result['login_active'];
		 
		  $email=$result['email'];
		  /*********************************************/
		  
		  /*********************************************/
		  $this->load->library('email');
     		  $this->email->from('nanowebtech802@gmail.com', 'nano');
               $this->email->to($email);
			    $this->email->set_mailtype('html');
               $this->email->subject('Registration Confirmation');
			    $this->email->message('<div style="width:700px; height:auto; margin:auto;">
        
        <div style="width:700px; height:90px; float:left;">
        <div style="width:233px; height:67px; float:left; padding-top:13px;"><a href="#"><img width="233" height="67" border="0" alt="" src="http://192.168.0.24/Casino/images/logo.png"></a></div>
        <div style="float:right; font-family:Georgia, Times, serif; font-size:20px; font-weight:normal; color:#FFF; font-style:italic; padding-top:30px;">Tuesday 15th October 2012</div>
        </div>
     <div style="clear:both;"></div>   

    <div style="width:700px; height:56px; background:#007dda;">
    <h1 style="font-family: Arial, Helvetica, sans-serif; font-size:29px; font-weight:normal; float:left; padding:5px 0 0 17px; margin:0px; color:#FFF;"><span style="font-family: Arial, Helvetica, sans-serif; font-size:29px; font-weight:normal; color:#fff;">Activation Mail</span></h1>
    
    <h2 style="font-family: Arial, Helvetica, sans-serif; font-size:20px; font-weight:normal; margin:0px; float:right; padding:13px 17px 0 0; color:#fff; font-weight:normal;">Account Activated</h2>
    
    </div>
    
    <div style="width:700px; height:330px; background:url(http://192.168.0.24/Casino/images/about_bg.png) repeat-x; float:left;">
    
    <div style="float:left; height: auto; padding: 0 20px; width: 660px;">
    <h2 style="font-family: Arial, Helvetica, sans-serif; margin:0px; padding-top:30px; font-size:25px; font-weight:normal; color:#0972B4;">Activation Mail</h2>
   <p style="font-family:Verdana, Geneva, sans-serif; font-size:13px; font-weight:normal; padding-top:10px; color:#5f5f5f; line-height:24px; margin:0px; font-family:Times New Roman, Times, serif;"><i>Your account has been activated .your login details are as follows:-</i>
   
   <p>Username:-'.$uname.'</p>
   <p>password:-'.$password.'</p>
    <p>You Can Login By Clicking On '.anchor("http://192.168.0.24/Casino/","webgamblingtalk").'</p> </p>
    </div>
      <div style="width:700px; height:auto; float:left; padding-top:44px;"><img width="700" height="93" border="0" alt="" src="http://www.webgamblingtalk.com/images/banner.png"></div>
    
    </div>
            
        <div style="clear:both;"></div>
        </div>');
		
		$this->email->send();
		 
		
		
		}
		//echo '<script>document.location.href="http://www.webgamblingtalk.com"</script>';
		
	}


		
		
	}
	
