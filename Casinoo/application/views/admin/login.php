<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Casino</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<link href="<?php echo base_url();?>admin/css/screen.css" rel="stylesheet" type="text/css" />
<!--  jquery core -->
<script src="<?php echo base_url();?>js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="<?php echo base_url();?>js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo base_url();?>js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a href="index.html"><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
    
    <div id="uname">
		
		<?php echo form_label('Username'); ?>
		<?php echo form_input(array('class' => 'login-inp' ,'name' => 'username','id' => 'username','type' => 'text',
								'value'=> set_value('username')));?> 
        <div style="color:red; margin-left:118px;"><?php echo form_error('username'); ?> </div>
 </div>   
    
		<?php echo form_label('Password '); ?>
		<?php echo form_password(array('class' => 'login-inp','name' => 'password','id' => 'password',
				'value'=> set_value('password')));?> 
  
  
			<!--<input name="password" type="password" class="form-login" title="Password" value="<?php //echo $password; ?>" size="30" maxlength="2048" />-->
          	<div style="color:red;margin-left:118px;"><?php echo form_error('password'); ?> </div>
	<div id="RememberMe">  
							<?php /*if($checked=='1')
				{
					echo form_checkbox('remember',1,TRUE);
					}
					 else
					{
						echo form_checkbox('remember',1,FALSE);	
						}*/
						?>
						
					   <!--  Remember Me-->
            
            </div>	
		
		<!--<tr>
			<th></th>
			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label></td>
		</tr>-->
        
         <div class="submit-login">
				<?php echo form_submit('submit','Login');?> <?php echo anchor('AdminPanel/forgotPass','forgot password?');?>
            </div>
<?php echo form_close();?>
        
		
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<a href="" class="forgot-pwd">Forgot Password?</a>
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value=""   class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>