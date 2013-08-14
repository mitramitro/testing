<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<?php $this->view('admin/include/header');?>
<?php $this->view('admin/include/leftpanel');?>
<script src="<?php echo base_url();?>jquery.js" type="text/javascript"></script>
<script src="<?php //echo base_url();?>userJs.js" type="text/javascript"></script>
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
<script type="text/javascript">
	/*$(document).ready(function(){
		
			$.get('<?php // echo base_url();?>admin_ajax',function(result){
				$("#cat").html(result);
			});
		
	
	});*/
	
</script>
<div id="rightpanel">
  </div>
 
  

  <div id="server_error_msg" class="success_message"></div>
	<div id="server_error_msg" class="error_message"></div>
    <?php echo form_open('AdminController/add_newGam'); ?>
  <table border="1" width="80%"  cellpadding="5" cellspacing="5">
    <tr>
      <td colspan="4" class="heading" >
		
        Add Games
      </td>
    </tr>
    <tr>
      <td width="100%"><table width="80%" border="0" align="center" cellspacing="5">
        
			
			<tr>
				<td colspan="3"><div id="server_error_msg" class="error_message"><?php //echo  $this->session->flashdata('error');?></div></td>
			</tr>
            <tr>
              <td>&nbsp;</td>
              <td width="25%" class="fontstyle">Game Name:</td>
              <td width="65%">
			  <?php echo form_input('game_name');
			 
			 		?>
			
			 <span id="errcat_title" class="error_message" style="padding-left:12px;"></span></td>
              <td>&nbsp;</td>
            </tr>
			<tr>
				<td colspan="3"><div id="server_error_msg" class="error_message"></div></td>
			</tr>
			<tr>
              <td>&nbsp;</td>
              <td width="25%" class="fontstyle">Game Type:</td>
              <td width="65%">
				<select id="type" name="type">
				<option value="1">Casino</option>
                <option value="2">Bingo</option>
                <option value="3">Poker</option>
                </select>
			
			 <span id="errcat_title" class="error_message" style="padding-left:12px;"></span></td>
              <td>&nbsp;</td>
            </tr>
			<tr>
				<td colspan="3"><div id="server_error_msg" class="error_message"></div></td>
			</tr>
              
			<tr>
				<td colspan="3"><div id="server_error_msg" class="error_message"></div></td>
			</tr>
			<tr>
              <td>&nbsp;</td>
              <td width="25%" class="fontstyle">software</td>
              <td width="65%">
			  <?php
					echo form_input('software');
				?>
			
			 <span id="errcat_title" class="error_message" style="padding-left:12px;"></span></td>
              <td>&nbsp;</td>
            </tr>
			
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
			
              <td><center>
			  
			  <?php
					echo form_submit(array('name'=>'submit','value'=>'Submit','class'=>'button'));
			  ?>
               </center></td>
              <td>&nbsp;</td>
            </tr>
         
        </table></td>
    </tr>
  </table>
   </form>
</div>
<?php $this->view('admin/include/footer');?>