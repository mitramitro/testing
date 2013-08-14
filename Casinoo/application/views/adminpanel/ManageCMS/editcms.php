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
#UpdateProduct
{
	border:1px solid red;
}
#cke_long_desc
{
margin-bottom:8px;	
}
</style>
</head>
 
<div class="whole-pennel-pass">
 <div id="UserManage">Edit Product</div>
<?php 
echo "<pre>";
$ckeditor=$query['b']['ckeditor'];
$id=$query['a']['query']['0']->cms_id;
$name= $query['a']['query']['0']->name;
$contentTitle=$query['a']['query']['0']->content_title;
$content=$query['a']['query']['0']->content;
$date_created=$query['a']['query']['0']->date_created;
$date_updated=$query['a']['query']['0']->date_updated;
?> 
 <?php
 echo form_open_multipart('AdminPanel/UpdateCMS/'.$id);
 $tmpl = array (
                   'table_open'          => '<table border="0" class="AddProducts" cellpadding="5px" cellspacing="0" width="100%" height="auto">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td >',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

$this->table->set_template($tmpl);
?>
<div style="color:red; margin:0 0 0 150px; padding:0 0 10px 0;">
<?php
echo validation_errors();
?>
</div>
<?php
$this->table->add_row('Module Name',form_input(array('name'=> 'modName' ,'id' =>'modName'
 , 'value' => $name,'class' => 'Field')));
 
$this->table->add_row('Title',form_input(array('name'=> 'title' ,'id' =>'title','value' => $contentTitle)));
 
$this->table->add_row('Created Date',form_input(array('name'=> 'createdDate' ,'id' =>'createdDate'
 , 'value' => $date_created,'class' => 'Field')));
 $this->table->add_row('Submitted Date',form_input(array('name'=> 'subDate' ,'id' =>'subDate'
 , 'value' => $date_updated,'class' => 'Field')));
  $this->table->add_row('Description',form_textarea(array('name'=> 'desc' ,'id' =>'long_desc',
  'class' =>'textArea','value' => $content)),display_ckeditor($ckeditor));
  $this->table->add_row('',form_submit('submit','Update Product'));

echo $this->table->generate();
echo form_hidden('id', $id);

echo form_close(); 
?>

 </div>
<div id="manageUserPagination">

</div>
<?php $this->view('adminpanel/include/footer'); ?>    