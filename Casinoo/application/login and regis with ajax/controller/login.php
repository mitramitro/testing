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
               $this->email->subject('Registration Confirmation');
			   
			    /* $this->email->message('Click the link below to activate your account' . anchor('http://localhost/codetwo/index.php/user/confirmation_activation/' . $activation_code,'Confirmation Register'));*/
            $this->email->message('<div style="width:700px; height:auto; margin:auto;">
        
        <div style="width:700px; height:90px; float:left;">
        <div style="width:233px; height:67px; float:left; padding-top:13px;"><a href="#"><img width="233" height="67" border="0" alt="" src="images/logo.png"></a></div>
        <div style="float:right; font-family:Georgia, Times, serif; font-size:20px; font-weight:normal; color:#FFF; font-style:italic; padding-top:30px;">Tuesday 15th October 2012</div>
        </div>
     <div style="clear:both;"></div>   

    <div style="width:700px; height:56px; background:#007dda;">
    <h1 style="font-family: Arial, Helvetica, sans-serif; font-size:29px; font-weight:normal; float:left; padding:5px 0 0 17px; margin:0px; color:#FFF;"><span style="font-family: Arial, Helvetica, sans-serif; font-size:29px; font-weight:normal; color:#fff;">Email</span> Newsletter</h1>
    
    <h2 style="font-family: Arial, Helvetica, sans-serif; font-size:20px; font-weight:normal; margin:0px; float:right; padding:13px 17px 0 0; color:#fff; font-weight:normal;">Your nice company heading goes here</h2>
    
    </div>
    
    <div style="width:700px; height:330px; background:url(images/about_bg.png) repeat-x; float:left;">
    
    <div style="float:left; height: auto; padding: 0 20px; width: 660px;">
    <h2 style="font-family: Arial, Helvetica, sans-serif; margin:0px; padding-top:30px; font-size:25px; font-weight:normal; color:#0972B4;">About Us</h2>
    <p style="font-family:Verdana, Geneva, sans-serif; font-size:12px; font-weight:normal; padding-top:10px; color:#5f5f5f; line-height:24px; margin:0px;">consectetur adipiscing elit. Proin leo augue, ornare a pretium in, imperdiet sit amet est. Proin ac elit mauris, ut lacinia eros. Aliquam fringilla suscipit turpis eu dapibus. <br>

consectetur adipiscing elit. Proin leo augue, ornare a pretium in, imperdiet sit amet est. Proin ac elit mauris, ut lacinia eros. Aliquam fringilla suscipit turpis eu dapibus.<br><br>
<br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
 
<span style="font-family:Verdana, Geneva, sans-serif; font-size:12px; font-weight:bold; color:#0f535b;"><a style="text-decoration:none; color:#0f535b;" href="#">read more...</a></span></p>
    </div>
    
    </div>
    
    
    <div style="width:700px; height:auto; float:left; background-color:#FFF; padding-bottom:20px;">
    
    <div style="width:603px; height:auto; margin:auto; padding-top:43px;">
    <div style="width:273px; height:auto; float:left;"> <a href="#"><img width="265" height="145" border="0" style="border:solid 1px #d2d2d2; padding:5px;" alt="" src="images/pro_img-1.png"></a>
      <h3 style="font-family: Arial, Helvetica, sans-serif; font-size:15px; font-weight:normal; color:#000; margin:0px; padding-top:5px;">Lorem ipsum dolor sit amet </h3>
      <p style="font-family:Verdana, Geneva, sans-serif; font-size:12px; font-weight:normal; padding-top:3px; color:#818080; margin:0px; line-height:18px;">consectetur adipiscing elit. Proin leo augue, ornare a pretium in, imperdiet sit amet est. Proin ac elit mauris, ut lacinia eros. Aliquam fringilla suscipit turpis...<br>
<span><a style="color:#bb2810; text-decoration:none;" href="#">See Details</a></span></p>
      </div>
      
      <div style="width:273px; height:auto; float:left; margin-left:40px;"> <a href="#"><img width="265" height="145" border="0" style="border:solid 1px #d2d2d2; padding:5px;" alt="" src="images/pro_img-2.png"></a>
      <h3 style="font-family: Arial, Helvetica, sans-serif; font-size:15px; font-weight:normal; color:#000; margin:0px; padding-top:5px;">Lorem ipsum dolor sit amet </h3>
      <p style="font-family:Verdana, Geneva, sans-serif; font-size:12px; font-weight:normal; padding-top:3px; color:#818080; margin:0px; line-height:18px;">consectetur adipiscing elit. Proin leo augue, ornare a pretium in, imperdiet sit amet est. Proin ac elit mauris, ut lacinia eros. Aliquam fringilla suscipit turpis...<br>
<span><a style="color:#bb2810; text-decoration:none;" href="#">See Details</a></span></p>
      </div>
      
      
    </div>
    
    <div style="clear:both;"></div>
    <div style="width:603px; height:auto; margin:auto; padding-top:28px; ">
    <div style="width:273px; height:auto; float:left;"> <a href="#"><img width="265" height="145" border="0" style="border:solid 1px #d2d2d2; padding:5px;" alt="" src="images/pro_img-1.png"></a>
      <h3 style="font-family: Arial, Helvetica, sans-serif; font-size:15px; font-weight:normal; color:#000; margin:0px; padding-top:5px;">Lorem ipsum dolor sit amet </h3>
      <p style="font-family:Verdana, Geneva, sans-serif; font-size:12px; font-weight:normal; padding-top:3px; color:#818080; margin:0px; line-height:18px;">consectetur adipiscing elit. Proin leo augue, ornare a pretium in, imperdiet sit amet est. Proin ac elit mauris, ut lacinia eros. Aliquam fringilla suscipit turpis...<br>
<span><a style="color:#bb2810; text-decoration:none;" href="#">See Details</a></span></p>
      </div>
      
      <div style="width:273px; height:auto; float:left; margin-left:40px;"> <a href="#"><img width="265" height="145" border="0" style="border:solid 1px #d2d2d2; padding:5px;" alt="" src="images/pro_img-2.png"></a>
      <h3 style="font-family: Arial, Helvetica, sans-serif; font-size:15px; font-weight:normal; color:#000; margin:0px; padding-top:5px;">Lorem ipsum dolor sit amet </h3>
      <p style="font-family:Verdana, Geneva, sans-serif; font-size:12px; font-weight:normal; padding-top:3px; color:#818080; margin:0px; line-height:18px;">consectetur adipiscing elit. Proin leo augue, ornare a pretium in, imperdiet sit amet est. Proin ac elit mauris, ut lacinia eros. Aliquam fringilla suscipit turpis...<br>
<span><a style="color:#bb2810; text-decoration:none;" href="#">See Details</a></span></p>
      </div>
      
      
    </div>
    
    
    
    <div style="width:700px; height:auto; float:left; padding-top:44px;"><img width="700" height="93" border="0" alt="" src="images/banner.png"></div>
    
    
    
    
    
    
    
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
                echo 'Click the link below to activate your account' . anchor('http://localhost/codetwo/index.php/user/account_activation/' . $activation_code,'Confirmation Register');
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
	  
	 
	  	
	    
		$username = $_POST['username'];
	 	$password = $_POST['password'];
	
		
		
		//Returns userid is successful, false is unsuccessful
		$results = $this->users->login($username,$password);
		
		$remember = (bool) $this->input->post('remember');
		if(isset($remember ) && $remember =='1'){
		
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

		else if ($results==false) {
		$message = "Username and Password do not match.";
			  $bg_color = "#FFEBE8";
		      
		
		 }		
		 
		else 
		{	
	
		$message = "Username and Password Matched.";
      $bg_color = "#FFA";
			$this->session->set_userdata(array('userid'=>$results,'username'=>$results,$remember));
			
			//redirect('casino');
		}
		 $output = '{ "message": "'.$message.'", "bg_color": "'.$bg_color.'" }';
        echo $output;
		

	}
	
	function logout()
	{
	$this->session->set_userdata(array('userid'=>''));
	
	$this->load->view('indexlogin');
	
	}
	
	/** Clear the old cache (usage optional) **/

	


		
		
	}
	
