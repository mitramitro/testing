<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<?php $this->view('admin/include/header');?>
<?php $this->view('admin/include/leftpanel');?><head>
<script>
function view_Record()
{
var con=confirm("Are you sure to view record.");
	if(con)
	{
		return true;
	}
	else
	{
		return false;
	
}
}
function manage_Record()
{
var con=confirm("Are you sure to manage record.");
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
.whole-pennel-pass {border: 1px solid #CCCCCC;float: left;margin-top:12px;padding: 10px;width: 785px;}
#UserManage
{background: none repeat scroll 0 0 #0771A5;color: white;font-family: Verdana;font-size: 18px;padding: 12px 0 15px 18px;text-align: left;text-decoration: underline;
margin-bottom:10px;}
.heading
{background-color:#0771A5;color:#FFF;padding:5px;}
.ShowData
{padding-left:110px;padding-top:15px;}
</style>
</head>

<div class="whole-pennel-pass">
<div id="UserManage">Mail Content List</div>
<div  style="height:auto;padding: 4px 0 7px;width:790px;border:1px solid #0771A5;margin-top:5px;">
 <?php
 
 $tmpl = array (
                    'table_open'          => '<table border="0" cellpadding="5px" cellspacing="0" width="790px;" height="auto" class="ManageUser">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th class="heading">',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td class="ShowData">',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td class="ShowData">',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
	
$this->table->set_template($tmpl);
$this->table->set_heading('Sr No.','Mail Content','Action');
$i =1;
if(count(@$register_mailContent)>0)
{
	
foreach($register_mailContent as $value)
{

$content=$value->register_content;
$contentType=$value->content_type;
$id=$value->id;
$this->table->add_row($i,$contentType,
anchor('admincontroller/EditMailContent/'.$id,'Edit',array('onclick'=>'return manage_Record()'))."|".
anchor('admincontroller/ViewMailContent/'.$id,'View',array('onclick'=>'return view_Record()'))
);
 $i++;
}
	echo $this->table->generate(); 
}
else
{
	 $tmpl = array (
                    'table_open'          => '<table border="0" cellpadding="5px" cellspacing="0" width="790px;" height="auto" class="ManageUser">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th class="heading">',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td class="ShowData">',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td class="ShowData">',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
	
$this->table->set_template($tmpl);
$this->table->set_heading('Sr No.','content Type','Action');
$this->table->add_row('','No Record Found','');

	echo $this->table->generate();
} 
	
 ?>
</div>
</div>

<?php $this->view('admin/include/footer');?>