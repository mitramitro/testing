<?php
/*
*Plugin Name: Login
*/
//add_action('init', 'myStartSession', 1);
session_start();

//add_action('wp_login', 'myEndSession');
function login()
{
?>
     <link rel="stylesheet" href="<?php echo plugins_url( 'css/register.css' , __FILE__ );?>" type="text/css" media="all">
     <script type="text/javascript" src="<?php echo plugins_url( 'js/jquery.js' , __FILE__ );?>" ></script>
	<script type="text/javascript" src="<?php echo plugins_url( 'js/signup.js' , __FILE__ );?>" ></script>
    <div class="user_cont">
    <form action="?page_id=34&msg=login" name="loginform" id="loginform" method="post">
       
        <h2>User Name :</h2>
       <input class="user_input" type="text" id="username" name="username" value=""
                      
                     onblur="if(this.value=='')this.value='Enter Username *';" 
                   onfocus="if(this.value=='Enter Username *')this.value='';" onkeypress="return change_uval()"/>
                     <div id="usererror" style="color:red;height:20px;font-size:14px;margin-left: 194px;
    width: 250px;"></div>
    
    
        <div class="clr" style="height:20px;"></div>
        <h2>Password :</h2>
        <input class="user_input" type="text" id="showpassword" name="showpassword" value="" onblur="if(this.value=='')this.value='Enter Password *';" />
        <input class="user_input" type="password" id="password" name="password" value="" onkeypress="return change_val()"/>
       
        <div id="perror" style="color:red;height:20px;font-size:14px;width:500px;"></div>
        <div class="clr" style="height:20px;"></div>
      
      <center><input class="user_login" type="button" name="login button" value="Log in" onClick="return validate_login()"/></center>
      <div class="clr" style="height:20px;"></div>
     </form>
     </div>
<?php     
}

add_shortcode('login','login');
add_shortcode('signup_form','signup');
add_action('loginpage','loginpage');
if($_GET['msg']=="login"){
	do_action('loginpage');
}

function loginpage()
{	
		global $wpdb;
		$username=$_POST['username'];
		$password=$_POST['password'];
		$user_count = $wpdb->get_row( "SELECT * FROM register where username='$username' and password='$password'" );
		//print_r($user_count);
		//die;
		if($user_count>0){
				
				
				$_SESSION['logindata']=$user_count;
				echo "<script>parent.location.href='".site_url()."'</script>";
			}
			else{
				echo "<div style='color:red;height:20px;font-size:14px;margin-left: 194px;
    width: 250px;'>Invalid Username and Password</div>";	
			}

	/*$data=array('username'=>$_POST['username'],
					'email'=>$_POST['email'],
					'password'=>$_POST['password'],
					'gender'=>$_POST['username'],
					'country'=>$_POST['country'],
					'state'=>$_POST['state'],
					'city'=>$_POST['city'],
		
					);
		//print_r($data);
		$wpdb->insert( 'register', $data);
		if($wpdb->insert_id >0){
			
			echo "<center><h4>Inserted Successfully</h5></center>";
		}
		else
		{
			echo "<center><h4>Insertion Failed</h5></center>";
		}*/
		//echo "success";
		
	
}
//logout process
add_action('wp_logout', 'myEndSession');
function myEndSession() {
	session_start();
    session_destroy ();
	echo "<script>parent.location.href='".site_url()."'</script>";
}
if($_GET['msg']=='logout'){
	
		do_action('wp_logout');	
		//echo "success";
	}

//end logout process

?>