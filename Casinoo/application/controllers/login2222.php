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
            $this->email->message('<div style="width:700px; height:auto; margin:auto;">
        
        <div style="width:700px; height:90px; float:left;">
        <div style="width:233px; height:67px; float:left; padding-top:13px;"><a href="#"><img width="233" height="67" border="0" alt="" src="http://www.webgamblingtalk.com/images/logo.png"></a></div>
        <div style="float:right; font-family:Georgia, Times, serif; font-size:20px; font-weight:normal; color:#FFF; font-style:italic; padding-top:30px;">Tuesday 15th October 2012</div>
        </div>
     <div style="clear:both;"></div>   

    <div style="width:700px; height:56px; background:#007dda;">
    <h1 style="font-family: Arial, Helvetica, sans-serif; font-size:29px; font-weight:normal; float:left; padding:5px 0 0 17px; margin:0px; color:#FFF;"><span style="font-family: Arial, Helvetica, sans-serif; font-size:29px; font-weight:normal; color:#fff;">Confirmation Mail</span></h1>
    
    <h2 style="font-family: Arial, Helvetica, sans-serif; font-size:20px; font-weight:normal; margin:0px; float:right; padding:13px 17px 0 0; color:#fff; font-weight:normal;">Thank You for registration</h2>
    
    </div>
    
    <div style="width:700px; height:330px; background:url(http://www.webgamblingtalk.com/images/about_bg.png) repeat-x; float:left;">
    
    <div style="float:left; height: auto; padding: 0 20px; width: 660px;">
    <h2 style="font-family: Arial, Helvetica, sans-serif; margin:0px; padding-top:30px; font-size:25px; font-weight:normal; color:#0972B4;">Confirmation mail</h2>
   <p style="font-family:Verdana, Geneva, sans-serif; font-size:13px; font-weight:normal; padding-top:10px; color:#5f5f5f; line-height:24px; margin:0px; font-family:Times New Roman, Times, serif;"><i>Thanks for registration on webgamblingtalk</i>
    <p>for activation of your account click on folowing link  '.anchor("http://www.webgamblingtalk.com/index.php/login/confirmation/1/$username","webgamblingtalk").'</p> </p>
    </div>
      <div style="width:700px; height:auto; float:left; padding-top:44px;"><img width="700" height="93" border="0" alt="" src="http://www.webgamblingtalk.com/images/banner.png"></div>
    
    </div>
            
        <div style="clear:both;"></div>
        </div>');
		  
		 
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
			
				//else {
				
			//  setcookie("cookname", $username, time()-60*60*24, "/");
            //  setcookie("cookpass", base64_encode($password), time()-60*60*24, "/");
			//}
        if (($username =='' || $username =='Username' ) || ($password =='' || $password =='Password' ))
	
		{
		
		$message = "Please Enter Username and Password ";
		$bg_color = "#FFEBE8";
		//redirect('casino');
		} 

		else if ($results==0) {  
		$message = "Please Enter Correct Username and Password";
			  $bg_color = "#FFEBE8";
		      
		
		 }		
		 
		else 
		{	
	       $message = "LOGIN SUCCESSFULLY";
		   $bg_color = "LawnGreen";
		   $this->session->set_userdata(array('userid'=>$results,'username'=>$results, $remember));
			//redirect('casino');
			
			
		}
		 $output = '{ "message": "'.$message.'", "bg_color": "'.$bg_color.'" }';
        echo $output;
		

	}
	  }
	function logout()
	{
	$this->session->set_userdata(array('userid'=>''));
	
	$this->load->view('indexlogin');
	
	}
	
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
		  $email=$result['email'];
		  $this->load->library('email');
     		  $this->email->from('nanowebtech802@gmail.com', 'nano');
               $this->email->to($email);
			    $this->email->set_mailtype('html');
               $this->email->subject('Registration Confirmation');
			    $this->email->message('<div style="width:700px; height:auto; margin:auto;">
        
        <div style="width:700px; height:90px; float:left;">
        <div style="width:233px; height:67px; float:left; padding-top:13px;"><a href="#"><img width="233" height="67" border="0" alt="" src="http://www.webgamblingtalk.com/images/logo.png"></a></div>
        <div style="float:right; font-family:Georgia, Times, serif; font-size:20px; font-weight:normal; color:#FFF; font-style:italic; padding-top:30px;">Tuesday 15th October 2012</div>
        </div>
     <div style="clear:both;"></div>   

    <div style="width:700px; height:56px; background:#007dda;">
    <h1 style="font-family: Arial, Helvetica, sans-serif; font-size:29px; font-weight:normal; float:left; padding:5px 0 0 17px; margin:0px; color:#FFF;"><span style="font-family: Arial, Helvetica, sans-serif; font-size:29px; font-weight:normal; color:#fff;">Activation Mail</span></h1>
    
    <h2 style="font-family: Arial, Helvetica, sans-serif; font-size:20px; font-weight:normal; margin:0px; float:right; padding:13px 17px 0 0; color:#fff; font-weight:normal;">Account Activated</h2>
    
    </div>
    
    <div style="width:700px; height:330px; background:url(http://www.webgamblingtalk.com/images/about_bg.png) repeat-x; float:left;">
    
    <div style="float:left; height: auto; padding: 0 20px; width: 660px;">
    <h2 style="font-family: Arial, Helvetica, sans-serif; margin:0px; padding-top:30px; font-size:25px; font-weight:normal; color:#0972B4;">Activation Mail</h2>
   <p style="font-family:Verdana, Geneva, sans-serif; font-size:13px; font-weight:normal; padding-top:10px; color:#5f5f5f; line-height:24px; margin:0px; font-family:Times New Roman, Times, serif;"><i>Your account has been activated .your login details are as follows:-</i>
   
   <p>Username:-'.$uname.'</p>
   <p>password:-'.$password.'</p>
    <p>You Can Login By Clicking On '.anchor("http://www.webgamblingtalk.com/","webgamblingtalk").'</p> </p>
    </div>
      <div style="width:700px; height:auto; float:left; padding-top:44px;"><img width="700" height="93" border="0" alt="" src="http://www.webgamblingtalk.com/images/banner.png"></div>
    
    </div>
            
        <div style="clear:both;"></div>
        </div>');
		
		$this->email->send();
		 
		
		
		}
		echo '<script>document.location.href="http://www.webgamblingtalk.com"</script>';
		
	}


		
		
	}
	
