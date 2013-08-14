<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<?php $this->view('admin/include/header');?>
<?php $this->view('admin/include/leftpanel');?>
 <script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.tokeninput.js"></script>

    <link rel="stylesheet" href="<?php echo base_url();?>css/token-input.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/token-input-facebook.css" type="text/css"/>
    
     <script type="text/javascript">
        $(document).ready(function() {
            $("#demo-input-facebook-theme").tokenInput([
			
		<?php 	foreach($country_t as $country_t) {?>
			{
				"short_name": "<?php echo $country_t->short_name;?>",
                "long_name": "<?php echo $country_t->long_name;?>",
                "url": "<?php echo $country_t->flag_path;?>"
            },  
			<?php }?>         
          ],
		    
		   {
			  theme: "facebook",
              propertyToSearch: "short_name",
              resultsFormatter: function(item){ return "<li>" + "<img src='" + item.url + "' title='" + item.short_name + " " +"' height='25px' width='25px' />" + "<div style='display: inline-block; padding-left: 10px;'><div class='full_name'>" + item.short_name +"</div><div class='long_name'>" + item.long_name + "</div></div></li>"},
              //tokenFormatter: function(item) { return "<li><p>" + item.short_name + " " + item.last_name + "</p></li>" },
          });
		 		  
			
        });
        </script>
       

<?php //echo $id;?>
 

<div id="rightpanel">
  </div>
 
  

  <div id="server_error_msg" class="success_message"></div>
	<div id="server_error_msg" class="error_message"></div>
   <?php echo form_open_multipart('AdminController/add_game_desc/'.$id.''); ?>
  <table border="1" width="80%"  cellpadding="5" cellspacing="5" style="float:left;">
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
              <td width="25%" class="fontstyle">Game Description </td>
              <td width="65%">
			  <?php echo form_textarea('description');
			 
			 		?>
			
			 <span id="errcat_title" class="error_message" style="padding-left:12px;"></span></td>
              <td>&nbsp;</td>
            </tr>
			<tr>
				<td colspan="3"><div id="server_error_msg" class="error_message"></div></td>
			</tr>
			<tr>
              <td>&nbsp;</td>
              <td width="25%" class="fontstyle">Site Url</td>
              <td width="65%">
            <?php echo form_input('site_url');?>
			
			 <span id="errcat_title" class="error_message" style="padding-left:12px;"></span></td>
              <td>&nbsp;</td>
            </tr>
			
              
			<tr>
				<td colspan="3"><div id="server_error_msg" class="error_message"></div></td>
			</tr>
			<tr>
              <td>&nbsp;</td>
              <td width="25%" class="fontstyle">Download Url</td>
              <td width="65%">
			  <?php
					echo form_input('download_url');
			  ?>
			
			 <span id="errcat_title" class="error_message" style="padding-left:12px;"></span></td>
              <td>&nbsp;</td>
            </tr>
			<tr>
              <td>&nbsp;</td>
              <td width="25%" class="fontstyle">Game Image</td>
              <td width="65%">
			 
					<input type="file" name="gm_image" size="20" />
			 
			
			 <span id="errcat_title" class="error_message" style="padding-left:12px;"></span></td>
              <td>&nbsp;</td>
            </tr>
            			<tr>
              <td>&nbsp;</td>
              <td width="25%" class="fontstyle">Countries not allowed</td>
              <td width="65%">
              
	        	<?php
				$countries_not_allowed=array(
              'name'        => 'countries_not_allowed',
              'id'          => 'demo-input-facebook-theme',
             
                );
				
				
				echo form_input($countries_not_allowed);?>
               		 
			
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