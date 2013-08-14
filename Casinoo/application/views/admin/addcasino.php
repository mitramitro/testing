<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<?php $this->view('admin/include/header');?>
<?php $this->view('admin/include/leftpanel');?><head>
<script>
function update_Status()
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
function del_Record()
{
var con=confirm("Are you sure to delete record.");
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
<style type="text/css">
.heading

{
	background-color:#0771A5;
}
.ShowData
{
	text-align:center;
}
#manageUserPagination
{
 float:right;
}
.input-long{ width:280px; float:right; border:1px solid #666; margin:0 0 0 30px; height:20px; outline:none;}

/*
.whole-pennel-pass {
    border: 1px solid #CCCCCC;
    float: right;
    height: auto;
    margin: 9px -54px 0 0;
    padding: 10px;
    width: 585px;
}*/
.whole-pennel-pass {
  border: 1px solid #CCCCCC;
    float: left;
    margin: -326px 0 0 188px;
    padding: 10px;
    width: 785px;
}
.textpas{ float:left; width:150px; height:15px; font-size:13px;} 
#UserManage
{
/*font-size: 16px;
    padding: 12px 0 15px;
    text-align: center;
	background: none repeat scroll 0 0 #0771A5;border: 1px solid #0771A5;color: white;
	text-decoration:underline;*/
	 background: none repeat scroll 0 0 #0771A5;
    color: white;
    font-family: Verdana;
    font-size: 18px;
    padding: 12px 0 15px 18px;
    text-align: left;
    text-decoration: underline;
}
.Field
{
margin-bottom: 15px;
    margin-top: 15px;
    width: 271px;
}
.AddProducts
{
	 margin: 0 0 0 100px;
}
.textArea
{
	margin-bottom:5px;
    margin-top: 10px;
    resize: none;
    width: 450px;
}
.error_msg
{
	color:#F00;
}
#cke_long_desc
{
margin-bottom:8px;	
}
.addProd
{
	margin:0 0 0 100px;	
}
.validationErrorMsg
{
	color: red;
    height: auto;
    margin: 0 0 6px 185px;
    padding: 6px 9px 10px;
    width: auto;
}
#newslettersuccess
{
	color:red;
    font-family: cursive;
    font-size: 16px;
    text-align: center;
	padding:0 0 5px 0;
}
</style>
</head>
<?php /*?> <?php $ckeditor = $editor['ckeditor']; ?><?php */?>


<div class="whole-pennel-pass">
<div id="newslettersuccess">
<?php echo $this->session->flashdata('successmsg');?>
</div>
 <div id="UserManage">Add Casino</div>
 
 
 <?php
 echo form_open_multipart();
 $tmpl = array (
                    'table_open'          => '<table border="0" class="AddProducts" cellpadding="5px" cellspacing="0" width="100%" height="auto">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

$this->table->set_template($tmpl);
?>
<div class="validationErrorMsg">
<?php
echo validation_errors();
?>
</div>

<?php
				$cat_data = array(
								'name'        => 'category',
								'id'          => 'cat',
								'class'	   => 'token-input-list-facebook',
								'value'       => set_value('category'),
								'maxlength'   => '100',
								'size'        => '50',
								'style'       => 'width:217px',
								);
				$cat_desc=array(
									'name'=>'cat_desc',
									'id'=>'entry_body',
									'class'=>'textArea',
									'rows'=>'10',
									'cols'=>'50',
									'value'=>set_value('cat_desc'),
				
				);
				$site_url=array(
							    	'name'=>'siteUrl',
									'id'=>'siteUrl',
									'maxlength'   => '100',
									'size' => '50',
									'value'=>set_value('siteUrl'),
				);
				
				
$this->table->add_row('Casino Name',form_input($cat_data));
$this->table->add_row('Description',form_textarea($cat_desc));
/*$this->table->add_row('Description',form_textarea($cat_desc),display_ckeditor($ckeditor));*/
?>
<label style="margin-left:106px;">Select Country</label>
<select multiple="multiple" name="country[]" style="margin-left:20px;">
<?php foreach($country_name as $country){?>
<option value="<?php echo $country->coun_value; ?>"><?php echo $country->country; ?></option>
<?php } ?>
</select>
<?php
//$this->table->add_row('Select Country',form_multiselect('country',$options,'IND'));
$this->table->add_row('Site Url',form_input($site_url));
$this->table->add_row('Download Link',form_input('download_link'));
$this->table->add_row('Casino Image',form_upload('casinoImg'));
$this->table->add_row('<br/>');
$this->table->add_row('',form_submit(array('name'=>'submit','value'=>'Submit','class'=>'button')));

echo $this->table->generate();
echo form_close(); 
?>




 </div>
<div id="manageUserPagination">

</div>
<?php $this->view('admin/include/footer');?>