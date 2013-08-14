<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<?php $this->view('adminPanel/include/header'); ?>    
<?php $this->view('adminPanel/include/leftPanel'); ?><head>
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
    margin: -372px 0 0 366px;
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
</style>
</head>
 

<div class="whole-pennel-pass">
 <div id="UserManage">Add Product</div>
 
 
 <?php
 echo form_open_multipart('AdminPanel/Add_prod');
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
$this->table->add_row('Product Name',form_input(array('name'=> 'proName' ,'id' =>'proName','type' => 'text'
 ,'value' => set_value('proName'),'class' => 'Field' ,'maxlength'   => '30')));

$this->table->add_row('Short Desc',form_textarea(array('name'=> 'short_desc' ,'id' =>'short_desc','rows' => 2, 'cols' => 41
 , 'value' => set_value('short_desc'),'class' => 'textArea','maxlength'   => '150')));
 $this->table->add_row('Long Desc',form_textarea(array('name'=> 'long_desc' ,'id' =>'long_desc','class' =>'textArea','value' =>  set_value('long_desc'))),display_ckeditor($ckeditor));

 $this->table->add_row('Dimensions',form_input(array('name'=> 'dimension' ,'id' =>'dimension'
 , 'value' => set_value('dimension'),'class' => 'Field','maxlength'   => '15')));
 $this->table->add_row('Price',form_input(array('name'=> 'price' ,'id' =>'price'
 ,'value' =>  set_value('price'),'class' => 'Field','maxlength'   => '10')));
 $this->table->add_row('Material',form_input(array('name'=> 'material' ,'id' =>'material'
 , 'value' => set_value('material'),'class' => 'Field','maxlength'   => '50')));
 $this->table->add_row('Image',form_input(array('name'=> 'userfile[]' ,'id' =>'userfile','type' =>'file'
 ,'value' =>  set_value('userfile'),'multiple'=> 'mulltiple','class' => 'multi')));
 $this->table->add_row('<br/>');
 $this->table->add_row('Is Active',form_checkbox('status','1',FALSE));
$this->table->add_row('<br/>');
  $this->table->add_row('',form_submit('submit','Add Product'));

echo $this->table->generate();
echo form_close(); 
?>




 </div>
<div id="manageUserPagination">

</div>
 <?php $this->view('adminpanel/include/footer'); ?>  