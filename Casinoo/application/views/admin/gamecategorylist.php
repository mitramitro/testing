<?php $this->view('admin/include/header');?>
<?php $this->view('admin/include/leftpanel');?>
<script src="<?php echo base_url();?>admin/js/userJs.js" type="text/javascript"></script>
<script type="text/javascript">
function user_Status()
{
	var con=confirm("Are you sure to change status.");
	if(con)
	{
		return true;
	}
	else
	{
		return false;
	
	}
}
function deleteCasino()
{
	var con=confirm("Are you wish to delete the record");
	if(con)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function deleteCasino()
{
	var con=confirm("Are you wish to delete the record");
	if(con)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function editCasino()
{
	var con=confirm("Are you wish to edit the record");
	if(con)
	{
		return true;
	}
	else
	{
		return false;
	}
}

</script>
<div id="rightpanel">
  <table border="1" width="100%" cellpadding="5" cellspacing="5">
    <tr>
      <td colspan="5" class="heading">Casino List:</td>
    </tr>
    <tr>
      <td width="100%"><table width="100%" border="0">
          <tr>
            <td width="7%" class="grey"><strong>Category Id</strong></td>
            <td width="13%" class="grey"><strong>Categroy Name</strong></td>
			<td width="8%" class="grey"><strong>Description</a></strong></td> 
			<td width="8%" class="grey"><strong></a>Image</strong></td> 
            <td width="8%" class="grey"><strong>Status</strong></td>	
			<td width="30%" class="grey"><strong>Action</strong></td>
          </tr>
			<?php foreach($select_gcat as $value)
			{
			?>
				<tr>
				<td width="7%"  align="left"><?php echo $value['cat_id']; ?></td>
				<td width="13%"  align="left"><?php echo $value['game_cat_name']; ?></td>
				<td width="8%"  align="left"><?php echo $value['description']; ?></td>
				<td width="8%"  align="left">
				
			
			<?php 
			$image_properties = array(
									'src' => 'admin/upload/'.$value['filename'],
									'alt' => 'Product Images',
									'class' => 'post_images',
									'width' => '100',
									'height' => '60',
									'title' => 'gamecat Images',
									'rel' => 'lightbox',
		  
									);
					echo img($image_properties);
			
			//echo $value['filename']; ?>
			
			</td>
            <td width="5%"  align="left"><?php $status=$value['status'];
											echo anchor("admincontroller/statusGcat/".$value['cat_id'].'/'.$value['status'],$status,array('onclick'=>'return user_Status()'));
											?></td>
			<td width="10%"  align="left">
				<?php echo anchor("admincontroller/deleteGcat/".$value['cat_id'],'Delete',array('onclick'=>'return deleteCasino()'));?>
				<?php echo anchor("admincontroller/editGcat/".$value['cat_id'],'Edit',array('onclick'=>'return editCasino()'));?>
                </td>
          </tr>
		  <?php }?>
        </table></td>
    </tr>
  </table>
</div>
<?php $this->view('admin/include/footer');?>
