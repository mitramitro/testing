<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/leftPanel'); ?><head>
<style>
.whole-pennel-pass {border: 1px solid #CCCCCC;float: left;margin-top:15px;padding: 10px;width: 785px;}
#UserManage
{background: none repeat scroll 0 0 #0771A5;color: white;font-family: Verdana;font-size: 18px;padding: 12px 0 15px 18px;text-align: left;text-decoration:underline;}
.heading{background-color:#0771A5;color:#FFF;padding:5px;}
.ShowData{padding-left: 38px;padding-top: 15px;}
.ManageUser{margin-top:5px;}	
</style>
</head>

<div class="whole-pennel-pass">
<div id="UserManage">Confirm Users List</div>
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
$this->table->set_heading('Sr No.','Email','Username','Status','Created Date');
if(count(@$confirmUsers)>0)
{
	$i =1;
foreach($confirmUsers as $value)
{
 
$email=$value->email;
$uname=$value->username;
$status=$value->login_active;
if($status==1)
{
	$status='In-Active';
	$state='0';
}
else
{
	$status='Active';
	$state='1';
}
$createDate=$value->date_created;	
		
$this->table->add_row($i,$email,$uname,anchor('admincontroller/changeUserStatus/'.$state."/".$uname,$status),$createDate);
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
$this->table->set_heading('Sr No.','Email','Username','Status','Created Date');
$this->table->add_row('','','No Record Found','','');

	echo $this->table->generate();
} 
?>
</div>
</div>

<?php $this->load->view('admin/include/footer'); ?>