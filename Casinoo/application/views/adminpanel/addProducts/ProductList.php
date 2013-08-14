 <?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<?php $this->view('adminPanel/include/header'); ?>    
<?php $this->view('adminPanel/include/leftPanel'); ?><head>
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
#manageUserPagination
{
 float:right;
}
.input-long{ width:280px; float:right; border:1px solid #666; margin:0 0 0 30px; height:20px; outline:none;}

/*.whole-pennel-pass {
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
	margin-bottom:10px;
}
.proListheading
{
padding-left:1px;
 background-color: #0771A5;
 padding:5px;
 color:#FFF;
}
.ShowData
{
	 padding-left: 8px;
    padding-top: 15px;
	}
.ProductList
{
	margin:0 0 0 -10px;
}
</style>
</head>
 <div class="whole-pennel-pass">
 <div id="UserManage">Product List</div>


 <?php
echo  form_open('AdminPanel/delete_checkbox',array('id'=>'myform'));
 $tmpl = array (
                    'table_open'          => '<table border="0" cellpadding="5px" cellspacing="2" width="805px" height="auto" class="ProductList">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th class="proListheading">',
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
 
 $ChkUnchk = array(
    'name'        => 'checkall[]',
    'id'          => 'chkuser',
    'checked'     => FALSE,
	'onclick' => 'checkedAll()'
  
    );
$this->table->set_heading('S No.',form_checkbox($ChkUnchk),'Product Name','Short Description','Long Description','Price','Is Active','Dimension','Action','Add Images');
$i =$this->uri->segment(3) + 0;
if(is_array($proListData))
{

foreach($proListData as $val)
{

	$i++;
	 $id=$val->id;
	 $sid=$val->status;
$LongDesc=html_entity_decode($val->long_des);
	 
$NewLongDesc=substr($LongDesc,0,30) ;
	 
	 $Prod_Name = $val->name;
	 


	 
	

	 $data = array(
    'name'        => 'forms[]',
    'id'          => 'chk',
    'value'       => $id,
    'checked'     => FALSE,
  
    );

$this->table->add_row($i,form_checkbox($data),substr($val->name,0,10),substr($val->short_des,0,10),$NewLongDesc,substr($val->price,0,50),

anchor('AdminPanel/ProductStatus/'.$id.'/'.$sid,$sid,
array('onclick'=> "javascript:return update_Status()",'class'=>'inactive'))
,substr($val->dimensions,0,10),
anchor('AdminPanel/EditProduct/'.$id,'Edit').'&nbsp;'.anchor('AdminPanel/delProdLisItem/'.$id,'Delete',array('onclick'=> "javascript:return del_Record()")),

anchor('AdminPanel/ProdImages/'.$id.'/'.$Prod_Name,'Add images')

);



}

$this->table->add_row("&nbsp;");
echo $this->table->generate(); 

echo form_submit('submit','Delete'); 
}
else
{
 $tmpl = array (
                    'table_open'          => '<table border="0" cellpadding="5px" cellspacing="2" width="805px" height="auto" class="ProductList">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th class="proListheading">',
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
 
 $ChkUnchk = array(
    'name'        => 'checkall[]',
    'id'          => 'chkuser',
    'checked'     => FALSE,
	'onclick' => 'checkedAll()'
  
    );
$this->table->set_heading('S No.',form_checkbox($ChkUnchk),'Product Name','Short Description','Long Description','Price','Is Active','Dimension','Action','Add Images');
$this->table->add_row('','','','','No Record Found','','','','','');
	echo $this->table->generate(); 

}
 ?>
<div id="manageUserPagination">

<?php echo $links; ?>

   </div>
</div>

<?php $this->view('adminpanel/include/footer'); ?>    
