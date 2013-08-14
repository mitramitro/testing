 <?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<?php $this->view('adminPanel/include/header'); ?>    
 
		<div class="clear"></div>
 
<?php //$this->view('adminPanel/include/left'); ?> 
<?php $this->view('adminPanel/include/leftPanel'); ?> 
<?php //$this->view('adminPanel/include/contentPanel'); ?> 
<style type="text/css">
#adminArea
{
	
/*	margin: 0 0 0 360px;*/
	
		
}
#changepass
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
.oldchngpass
{
	margin-left:35px;
}
.newchngpass
{
margin-left:30px	
}
.conchngpass
{
margin-left:13px	
}
.input-long{ width:280px; float:right; border:1px solid #666; margin:0 0 0 30px; height:20px; outline:none;}

/*
.whole-pennel-pass{ float:right; width:400px; height:auto; border:1px solid #ccc;
 padding:10px; background:#dfdfdf; margin:10px 75px 0 0;}*/
 
 .whole-pennel-pass {
 border: 1px solid #CCCCCC;
    float: left;
    margin: -372px 0 0 366px;
    padding: 10px;
    width: 400px;
}
.textpas{ float:left; width:150px; height:15px; font-size:13px;} 

</style>
<div class="whole-pennel-pass">
<div id="changepass">Change Password</div>
<div id="adminArea">
<div style="color:red;padding-bottom:10px; margin-left:118px;">
<?php echo  $this->session->flashdata('successmsg'); ?>
<?php echo  $this->session->flashdata('OldPassError'); ?>
</div>
<?php echo form_open('AdminPanel/updatePass');?>
<div id="uname">
<?php echo form_label('Old Password'); ?>
<?php echo form_password(array('class'=>'input-long','name' => 'oldpass','id' => 'oldpass','type' => 'text','value' => set_value('oldpass')));?> 
          	<div style="color:red; margin-left:118px;"><?php echo form_error('oldpass'); ?> </div>
   </div>  
   <div id="uname">
<?php echo form_label('New Password'); ?>
<?php echo form_password(array('class'=>'input-long','name' => 'newpass','id' => 'newpass','type' => 'text','value' => set_value('newpass')));?> 
          	<div style="color:red; margin-left:118px;"><?php echo form_error('newpass'); ?> </div>
   </div>       
<?php echo form_label('Confirm Password'); ?>
<?php echo form_password(array('class'=>'input-long','name' => 'confPass','id' => 'confPass','value' => set_value('confPass')));?> 
          	<div style="color:red;margin-left:118px;"><?php echo form_error('confPass'); ?> </div>
            <div id="subButton">
            <?php echo form_submit('submit','Change Password');?>
            </div>
<?php echo form_close();?>
        
</div>
 </div>
<?php $this->view('adminpanel/include/footer'); ?>       
