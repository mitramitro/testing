 <?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<div id="leftpanel">
	
	    <div style="float: left" id="my_menu" class="sdmenu">
      <div>
        <span>Dashboard</span>
        <a href="<?php echo site_url('AdminPanel/adminHome');?>">Dashboard</a>
       <!--<a href="<?php echo adminPath();?>addProducts" style="color: #267FBB;font-weight: bold; text-decoration:none;">Add Products</a>-->
            
      </div>
      <div>
        <span>Add Product</span>
          <a href="<?php echo site_url('adminPanel/Addproduct');?>" style="color: #267FBB;font-weight: bold; text-decoration:none;">Add Product</a>
        </div>
       <div>    
      <span>Product List</span>
     <!--<a href="<?php //echo adminPath();?>productList" style="color: #267FBB;font-weight: bold; text-decoration:none;">Products List</a>-->
           <a href="<?php echo site_url('AdminPanel/ProdList');?>" style="color: #267FBB;font-weight: bold; text-decoration:none;">Product List </a> 
      </div>
      
      
      <div>    
      <span>Payment</span>
     <a href="<?php echo adminPath();?>payment" style="color: #267FBB;font-weight: bold; text-decoration:none;">Payment</a>
      </div>
       <div>    
      <span>Manage User</span>
       <a href="<?php echo site_url('AdminPanel/ManageUser');?>" style="color: #267FBB;font-weight: bold; text-decoration:none;">Manage User</a>
       </div>
       <div>    
      <span>Change Password</span>
       <a href="<?php echo site_url('AdminPanel/ChangeAdminpass');?>" style="color: #267FBB;font-weight: bold; text-decoration:none;">Change Password</a>
       </div>
          
         <div>    
      <span>Product Image Gallery</span>
     <!--<a href="<?php //echo adminPath();?>productList" style="color: #267FBB;font-weight: bold; text-decoration:none;">Products List</a>-->
           <a href="<?php echo site_url('AdminPanel/ProductImageGallary');?>" style="color: #267FBB;font-weight: bold; text-decoration:none;">Product Image Gallery </a> 
      </div>
      
        <div>    
      <span>Manage CMS</span>
     <!--<a href="<?php //echo adminPath();?>productList" style="color: #267FBB;font-weight: bold; text-decoration:none;">Products List</a>-->
           <a href="<?php echo site_url('AdminPanel/ManageCMS');?>" style="color: #267FBB;font-weight: bold; text-decoration:none;">Manage CMS</a> 
      </div>
       <!--   <div> 
      <span>Admin Logout</span>
       <a href="<?php //echo site_url('AdminPanel/Logout');?>" style="color: #267FBB;font-weight: bold; text-decoration:none;">Logout</a>
       </div>-->
     <?php $this->session->set_flashdata('successlogout', 'You have successfully logout!'); ?>
     
   <!--      <div>    
    <span>Test Add Product</span>
<!--       <a href="<?php //echo site_url('AdminPanel/testAddproduct');?>" style="color: #267FBB;font-weight: bold; text-decoration:none;">Test Add Product</a>-->
 <!--      <a href="<?php //echo site_url('AdminPanel/testProdList');?>" style="color: #267FBB;font-weight: bold; text-decoration:none;">Test Add Product List </a> -->

       </div>
      </div>
     
</div>