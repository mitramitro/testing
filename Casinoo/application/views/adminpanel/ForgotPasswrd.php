<?php $this->view('adminPanel/include/header'); ?>    

		<div class="clear"></div>
 
<?php //$this->view('adminPanel/include/left'); ?>  
<?php //$this->view('adminPanel/include/contentPanel'); ?> 
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


/*.whole-pennel-pass{ float:right; width:400px; height:auto; border:1px solid #ccc;
 padding:10px; background:#dfdfdf; margin:10px 75px 0 0;}*/
 
 .whole-pennel-pass {
    border: 1px solid #CCCCCC;
    float: right;
    height: auto;
    margin: 9px -54px 0 0;
    padding: 10px;
    width: 585px;
}
 
.textpas{ float:left; width:150px; height:15px; font-size:13px;} 
</style>

<div class="whole-pennel-pass">
<div id="AdminTitle">Admin Login</div>
<div id="adminArea">

<div style="color:red;padding-bottom:10px; margin-left:118px;">
<?php echo  $this->session->flashdata('forgotpasserror'); ?>
</div>
<?php echo form_open('AdminPanel/ForGotAdminPass');?>
<div id="uname">
<?php echo form_label('Email id :'); ?>
 <?php echo form_input(array('class' => 'input-long' ,'name' => 'email','id' => 'email','type' => 'text','value' => set_value('email')));?> 
          	<div style="color:red; margin-left:118px;"><?php echo form_error('email'); ?> </div>
   </div>        

            <div id="subButton">
          
            <?php echo form_submit('submit','Forgot password');?> 
            </div>
<?php echo form_close();?>
        
</div>
 </div>
 <?php $this->view('include/footer'); ?>    
