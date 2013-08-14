<?php 
/*
*Plugin Name: Signup
*/
add_action('signup','signup');
function signup()
{
	global $wpdb;
	$query="select * from geo_countries order by name asc";
	$sql=mysql_query($query);
	while($data=mysql_fetch_assoc($sql))
	{
		//echo "<pre>";
		$country[]=$data;	
	}
	
	?>
    <link rel="stylesheet" href="<?php echo plugins_url( 'css/register.css' , __FILE__ );?>" type="text/css" media="all">
    <script type="text/javascript" src="<?php echo plugins_url( 'js/jquery.js' , __FILE__ );?>" ></script>
	<script type="text/javascript" src="<?php echo plugins_url( 'js/signup.js' , __FILE__ );?>" ></script>
	<script>
    	$(document).ready(function(){
			$("#country").change(function(){
			//alert(6);
				var country=$("#country").val();
				
				//var country=countryname';
				//alert(country);
				$.get('<?php echo plugins_url('ajax.php', __FILE__); ?>',{country:country},function(result){
				$("#state").html(result);
				});
			});
	
			$("#state").change(function(){
				var state=$("#state").val();
				$.get("<?php echo plugins_url('city.php', __FILE__); ?>",{state:state},function(result){
				$("#city").html(result);
				});
			});
			//check email
			
				$("#email").blur(function(){
				//alert(6);
				var flag='1';
					var elefocus='';
					var str='true';
				var email=$("#email").val();
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
						  if( !emailReg.test( email ) ) {
							 str='false';
							$('#email').css('color', "red");
						  $('#email').val('Valid Email Address *');
						  }
						  if(elefocus=='')
								 {
								 elefocus='#email';
							}	
						flag='0'; 
						
						//return false;
					if(str=='true')
						{//alert(5);
				$.get("<?php echo plugins_url('checkemail.php', __FILE__); ?>",{email:email},function(result){
					$("#emailerror").html(result);
				});
						}
						
			});
			
				$("#username").keyup(function(){
				//alert(6);
				var username=$("#username").val();
				if(username.length>=4)
				{
				  $.get("<?php echo plugins_url('checkusername.php', __FILE__); ?>",{username:username},function(result){
					  $("#usererror").html(result);
					});
				}
				else
				{
					//alert(6);
					$("#usererror").html('Username should have at least <strong>4</strong> characters.');
					//$("#username").removeClass('object_ok'); // if necessary
					//$("#username").addClass("object_error");
				}
				
			});
		});
    </script>
    
    <div class="user_cont">
    <form action="?page_id=24&msg=success" name="myform" id="myform" method="post">
        <h2>Email Address:</h2>
        <input class="user_input" type="text" id="email" name="email" value=""
                   onblur="if(this.value=='')this.value='Valid Email Address *';" 
                   onfocus="if(this.value=='Valid Email Address *')this.value='';" onkeypress="return change_eval()" />
                    <div  id="emailerror" style="color:red;height:20px;font-size:14px;margin-left: 194px;
    width: 250px;"></div>
    
        <div class="clr" style="height:20px;"></div>
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
        <h2>Confirm Password :</h2>
        <input class="user_input" type="password" id="cpassword" name="cpassword" value="" onkeyup="check_pass()" onkeypress="return change_val()"/>
       	<br/>
        <div id="cperror" style="color:red;height:20px;font-size:14px;width:500px;"></div>
    
        <div class="clr" style="height:20px;"></div>
        <h2>I am a :</h2>
       <select class="user_input" name="gender" id="gender" onclick="return change_val()">
                    	<option value="">--Select Gender--</option>
                    	<option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
        
        <div class="clr" style="height:20px;"></div>
        <h2>From :</h2>
        
        <select class="user_input" name="country" id="country"  onclick="return change_val()">
                    		<option value="">--Country--</option>
                            <?php foreach($country as $value)
									{
							?>
										<option value="<?php echo $value['con_id'];?>"><?php echo $value['name']?></option>
                            <?php 
									}
							?>
                   			 </select>
        <div class="clr" style="height:20px;"></div>
        <h2>&nbsp;</h2>
       <select class="user_input" name="state" id="state" onFocus="return change_val()">
                    		<option value="">--State--</option>
                          
                                                 
                   			 </select>
       <div class="clr" style="height:20px;"></div>
       <h2>&nbsp;</h2>
        <select class="user_input"  name="city" id="city"  onFocus="return change_val()">
                    		<option value="">--City--</option>
                
                           
                            
                   		  </select>
       
       <div class="clr" style="height:20px;"></div>
       <center><div><?php //echo form_error('recaptcha_response_field'); ?>
                  <?php //echo $recaptcha; ?></div></center>
       
       <div class="clr" style="height:20px;"></div>
       <h3>-I agree to the Terms of Use and Privacy Policy</h3>
       
       <div class="clr" style="height:20px;"></div>
      <center><input class="user_submit" type="button" name="button" value="Sign Up" onClick="return validate_reg()"/></center>
      <div class="clr" style="height:20px;"></div>
     </form>
     </div>
<?php	
}
add_shortcode('signup_form','signup');
add_action('insert','insert');
if($_GET['msg']=="success"){
	do_action('insert');
}
function insert()
{	
		global $wpdb;	
		$data=array('username'=>$_POST['username'],
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
			/*echo "<script>window.location.href='?page_id=24&msg=insert'</script>";*/
			echo "<center><h4>Inserted Successfully</h5></center>";
		}
		else
		{
			echo "<center><h4>Insertion Failed</h5></center>";
		}
		//echo "success";
	
}
?>