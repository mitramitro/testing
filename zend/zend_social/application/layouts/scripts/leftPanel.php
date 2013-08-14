<script src="<?php echo $this->baseUrl('admin/menu/sdmenu/sdmenu.js')?>" type="text/javascript"></script>
<link href="<?php echo $this->baseUrl('admin/menu/sdmenu/sdmenu.css')?>" rel="stylesheet" type="text/css" />
<div id="leftpanel">
	
	    <div style="float: left" id="my_menu" class="sdmenu">
        
       <div>
        <span>Change Password </span>
        <a href="<?php echo $this->url(array('controller'=>'adminmain','action'=>'home'));?>">Dashboard</a>
       <a href="<?php echo $this->url(array('controller'=>'adminmain','action'=>'changepassword','id'=>$id));?>">Change Password</a>
      </div>
      
      <div>
        <span>Manage Users</span>
       <a href="<?php echo $this->url(array('controller'=>'adminmain','action'=>'manageuser'));?>">User List</a>
       
      <?php //echo anchor('home/Show_Details','Registered Users');?>
      <?php //echo anchor('home/showcat','Show Category');?>
      </div>
   
      </div>
</div>