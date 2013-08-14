 <?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<?php $this->view('admin/include/header');?>
<?php $this->view('admin/include/leftpanel');?><head>
<script>

      checked = false;
      function checkedAll () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('myform').elements.length; i++) {
	  document.getElementById('myform').elements[i].checked = checked;
	}
      }
  </script>
  <script>


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
	color:#FFF;
	padding:5px;
	
}
.ShowData
{
	 padding-left: 38px;
    padding-top: 15px;
	}

#manageUserPagination
{
 float:right;
}
.input-long{ width:280px; float:right; border:1px solid #666; margin:0 0 0 30px; height:20px; outline:none;}


/*.whole-pennel-pass{
    border: 1px solid #CCCCCC;
    float: right;
    height: auto;
    margin: 9px 5px 0 0;
    padding: 10px;
    width: 530px;
	background-color:#dfdfdf;
}*/
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
    margin: -325px 0 0 190px;
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
	margin-bottom:10px;
}
.ManageUser
{
	margin:0;
}
	
</style>
</head>
 

<div class="whole-pennel-pass">
 <div id="UserManage">Manage User List</div>
<div  style="height: auto;padding: 4px 0 7px;width: 790px; border:1px solid #0771A5;">
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
$this->table->set_heading('S No.','Username','Password','E-Mail','Status','Delete');
if(count($userlist)>0)
{
	$i = $this->uri->segment(3) + 0;
foreach($userlist as $value)
{
$i++;
$id=$value['id'];
$username = $value['username'];
$password=$value['password'];
$email=$value['email'];
$status = $value['status'];

$this->table->add_row($i,$username,$password,$email,
anchor("AdminController/userStatus/".$id.'/'.$status,$status,
array('onclick'=>'return user_Status()')),
anchor("admincontroller/deleteUser/".$id,'Delete',array('onclick'=>'return del_Record()')));
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
$this->table->set_heading('S No.','Username','Password','E-Mail','Status','Delete');
$this->table->add_row('','','','No Record Found','','','');

	echo $this->table->generate();
} 
	

 ?>
 <?php /*?><?php 
echo $links;
 ?><?php */?>
 <?php if($this->session->flashdata('delerror'))
 {
 ?>
 <script>
 	alert("<?php echo $this->session->flashdata('delerror')?>");
 </script>
 <?php }?>
 </div>

</div>
<?php $this->view('admin/include/footer');?>
