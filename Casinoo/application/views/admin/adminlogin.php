<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<?php $this->view('admin/include/header'); ?>
<style type="text/css">
#AdminTitle
{
font-size: 16px;
    padding: 12px 0 15px;
    text-align: center;
}
#uname
{
	padding-bottom:10px;
}
#subButton
{
	margin-top:20px;
	margin-left:100px;
}

.input-long{ width:280px; float:right; border:1px solid #666; margin:0 0 0 30px; height:20px; outline:none;}


.whole-pennel-pass{ float:left; width:400px; height:auto; border:1px solid #ccc;
 padding:10px; background:#dfdfdf; margin:10px 75px 0 300px;}
 
.textpas{ float:left; width:150px; height:15px; font-size:13px;} 
#RememberMe
{
	margin: 14px 0 0 123px;
}
</style>

<div class="whole-pennel-pass">
<div id="AdminTitle">Admin Login</div>
<div id="adminArea">
<div style="color:red;padding-bottom:10px; margin-left:118px;">
<?php echo  $this->session->flashdata('errorlogin'); ?>
</div>


<?php echo form_open('admincontroller/adminLogin');?>
	<div id="uname">
		
		<?php echo form_label('Username'); ?>
		<?php echo form_input(array('class' => 'input-long' ,'name' => 'username','id' => 'username','type' => 'text',
								'value'=> set_value('username')));?> 
        <div style="color:red; margin-left:118px;"><?php echo form_error('username'); ?> </div>
 </div>   
	<!-- <input name="username" class="form-login" title="Username" value="<?php //echo $username; ?>" size="30" maxlength="2048" />     --> <br/>
		<?php echo form_label('Password '); ?>
		<?php echo form_password(array('class' => 'input-long','name' => 'password','id' => 'password',
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
            <div id="subButton">
				<?php echo form_submit('submit','Login');?> <?php echo anchor('AdminPanel/forgotPass','forgot password?');?>
            </div>
<?php echo form_close();?>
    
</div>
 </div>

  <br/>  

<?php $this->view('admin/include/footer');  ?>