
<div class="column" id="con_l">
	<div style="margin-left:10px; margin-right:50px;">
	
          <div style="border-bottom:1px dotted;height: 20px; width: 150px;">
             <a href="<?php echo adminPath();?>addProducts" style="color: #267FBB;font-weight: bold; text-decoration:none;">Add Products</a>
          </div>
          
          <div style="border-bottom:1px dotted;height: 20px; width: 150px;">
             <a href="<?php echo adminPath();?>productList" style="color: #267FBB;font-weight: bold; text-decoration:none;">Products List</a>
          </div>
          
          <div style="border-bottom:1px dotted;height: 20px; width: 150px;">
             <a href="<?php echo adminPath();?>payment" style="color: #267FBB;font-weight: bold; text-decoration:none;">Payment</a>
          </div>
          
          <div style="border-bottom:1px dotted;height: 20px; width: 150px;">
             <a href="<?php echo site_url('AdminPanel/ChangeAdminpass');?>" style="color: #267FBB;font-weight: bold; text-decoration:none;">Change Password</a>
          </div>
          
          <div style="border-bottom:1px dotted;height: 20px; width: 150px;">
             <a href="" style="color: #267FBB;font-weight: bold; text-decoration:none;">Admin</a>
          </div>
          
          <div style="border-bottom:1px dotted;height: 20px; width: 150px;">
 <a href="<?php echo site_url('AdminPanel/Logout');?>" style="color: #267FBB;font-weight: bold; text-decoration:none;">Logout</a>

          </div>
	<?php $this->session->set_flashdata('successlogout', 'You have successfully logout!'); ?>
		 
	</div>
</div>