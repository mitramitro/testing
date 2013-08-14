<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<?php $this->view('admin/include/header');?>
<?php $this->view('admin/include/leftpanel');?>
<script src="<?php echo base_url();?>jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>userJs.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/ckeditor/ckeditor.js"></script> 
<script src="<?php echo base_url();?>js/ckeditor/_samples/sample.js" type="text/javascript"></script>
<style type="text/css">
.error_message{
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
color:#FF0000;
padding-bottom:5px;
text-align:center;
}
</style>

<div id="rightpanel">
  </div>
 
  <div id="server_error_msg" class="error_message"></div>

  <div id="server_error_msg" class="success_message"></div>

	
  <table border="1" width="80%"  cellpadding="5" cellspacing="5">
    <tr>
      <td colspan="4" class="heading" >
		<?php echo  $this->session->flashdata('error');?>
        Add Category:
      </td>
    </tr>
    <tr>
      <td width="100%"><table width="80%" border="0" align="center" cellspacing="5">
        <?php echo form_open();?>
			
			</tr>
			<tr>
				<td colspan="3"><div id="server_error_msg" class="error_message"><?php
					
					
						echo $this->session->flashdata('exists');
					?></div></td>
					
			</tr>
         
		 
			<?php foreach($selectupdate as $value)
			{
				//print_r($value);
					//print_r($abc);
				
				
			?>
            <tr>
				<?php echo form_hidden('id',$value->id);
				$id=$value->id;
				?>
              <td>&nbsp;</td>
              <td width="25%" class="fontstyle">Casino Name:</td>
              <td width="65%">
			  <?php $cat_data = array(
								'name'        => 'category',
								'id'          => 'cat',
								'value'       => $value->casino_name,set_value('category'),
								'maxlength'   => '100',
								'size'        => '50',
								'style'       => 'width:217px',
								
												);
			 echo form_input($cat_data);
			 		?>
			
			 <span id="errcat_title" class="error_message" style="padding-left:12px;"></span></td>
              <td>&nbsp;</td>
                   </tr>
			<tr>
				<td colspan="3"><div id="server_error_msg" class="error_message"><?php echo form_error('category');?></div></td>
			</tr>
            <tr>
              <td>&nbsp;</td>
              <td width="25%" class="fontstyle">Description:</td>
              <td width="65%">
			  <?php $cat_desc=array(
									'name'=>'cat_desc',
									'id'=>'entry_body',
									'rows'=>'10',
									'cols'=>'50',
									'value'=>$value->description,set_value('cat_desc'),
									);
				echo form_textarea($cat_desc);
				$ckediter = $abc['ckeditor'];	
				echo display_ckeditor($ckediter);
			?>
			 <span id="errcat_desc" class="error_message" style="padding-left:12px;"></span></td>
              <td>&nbsp;</td>
            </tr>  
            <tr>
            <td>&nbsp;</td>
            <td width="25%" class="fontstyle">Site Url:</td>
              <td width="65%">
			  <?php $cat_dat = array(
								'name'        => 'category',
								'id'          => 'cat',
								'value'       => $value->site_url,set_value('category'),
								'maxlength'   => '100',
								'size'        => '50',
								'style'       => 'width:217px',
								
												);
			 echo form_input($cat_dat);
			 		?>
			
			 <span id="errcat_title" class="error_message" style="padding-left:12px;"></span></td>
       
            </tr>
			<?php }?>
			<tr>
				<td colspan="3"><div id="server_error_msg" class="error_message"><?php echo form_error('category');?></div></td>
			</tr>
			
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
			
              <td><center>
			  
			  <?php
			  
				echo form_submit(array('name'=>'submit','value'=>'Update','class'=>'button'));
			  ?>
               </center></td>
              <td>&nbsp;</td>
            </tr>
          </form>
        </table></td>
    </tr>
  </table>
</div>
<?php $this->view('admin/include/footer');?>




