<div id="leftpanel">
	
	    <div style="float: left" id="my_menu" class="sdmenu">
      <div>
        <span>Dashboard</span>
        <?php echo anchor('admincontroller/adminhome','Dashboard');?>

      </div>
      
      <div>    
      <span>Manage User</span>
      <?php echo anchor('admincontroller/manageUser','Manage User'); ?>
      </div>
       <div>    
      <span>Add Casino</span>
      <?php echo anchor('admincontroller/admincasino','Add Casino');?>
       <?php echo anchor('admincontroller/casinoList','Casino List');?>
       </div>
         <div>    
      <span>Games Panel</span>
     <?php echo anchor('admincontroller/addGamescat','Add Games Category');?>
     <?php echo anchor('admincontroller/gamecat_list','Games Category List');?>
     <?php echo anchor('admincontroller/addGames','Add Games');?>
     <?php echo anchor('admincontroller/GamesList','Games List');?>
       </div>
       <div>    
      <span>Manage Newsetter</span>
      <?php echo anchor('Newsletter/create_newsletter','Create Newsletter');?>
      <?php echo anchor('Newsletter/subscriberlist','Subscriber List');?>
       
       </div>
       <div>    
      <span>Mail Content</span>
      <?php echo anchor('admincontroller/show_mailContent','Manage Content'); ?>
      </div> 
      <div>    
      <span>Confirm Users List</span>
      <?php echo anchor('admincontroller/ShowConfirmUsers','Confirm Users'); ?>
      </div>
      <div>    
      <span>All Games</span>
      <?php echo anchor('admincontroller/Set_newgame','Manage Games'); ?>
      </div>


     
	   <!--
       <div>    
      <span>Express Dashboard</span>
      <a href="<?php //echo ADMIN_MODULES_PATH_HTTP;?>dashdetail/manageDashdetail.php">Hotel Info</a>
      <a href="<?php //echo ADMIN_MODULES_PATH_HTTP;?>dashdetail/expressBid.php">Express Bid</a>
      <a href="<?php //echo ADMIN_MODULES_PATH_HTTP;?>dashdetail/expressDeal.php">Express Deal</a>
      </div>
      <div>    
      <span>Manage Bid Alerts</span>
      <a href="<?php //echo ADMIN_MODULES_PATH_HTTP;?>alert/manageAlert.php">Alert Details</a>
      <a href="<?php //echo ADMIN_MODULES_PATH_HTTP;?>alert/manageDestination.php">Favorite Destinations</a>
       </div>-->
      </div>
</div>