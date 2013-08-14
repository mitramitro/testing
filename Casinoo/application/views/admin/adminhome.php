<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<?php $this->view('admin/include/header');?>
<?php $this->view('admin/include/leftpanel');?>
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


.whole-pennel-pass {
    border: 1px solid #CCCCCC;
    float: left;
    height: auto;
    margin: 9px -54px 0 0;
    padding: 10px;
    width: 650px;
}
 
.textpas{ float:left; width:150px; height:15px; font-size:13px;} 
#UserManage
{
font-size: 16px;
    padding: 12px 0 15px;
    text-align: center;
}
.Field
{
width:271px;
margin-bottom:15px;
}
.AddProducts
{
	padding:0 0 10px 0;
}
.textArea
{
	resize:none;
	margin-bottom:10px;	
}
.error_msg
{
	color:#F00;
}
.post_images
{
	margin: 30px 0 0 14px;
    padding: 7px 0 0 41px;
}
#innerContent
{
	height:112px;
	width:630px;
}
#DashboardIcons
{
	display:inline;
}
#InnerText
{
	
    display: inline;
    height: 23px;
    margin: 0 0 0 3px;
    padding: 0 0 0 30px;
}
.dashboard
{
	  color: #0771A5;
    font-size: 14px;
    margin-left: 14px;
    text-decoration: none;
	font-weight: bold;
}
.dashboard:hover
{
	text-decoration:underline;
	color:#000;
}
.productList
{
	  color: #0771A5;
    font-size: 14px;
    margin-left: 4px;
    text-decoration: none;
	font-weight: bold;
}
.productList:hover
{
	text-decoration:underline;
	color:#000;
}
.ManageUser
{
	   color: #0771A5;
    font-size: 14px;
    margin-left: -6px;
    text-decoration: none;
	font-weight: bold;
}
.ManageUser:hover
{
	text-decoration:underline;
	color:#000;
}
.AddProduct
{
	 color: #0771A5;
    font-size: 14px;
    margin-left: -8px;
    text-decoration: none;
	font-weight: bold;
}
.AddProduct:hover
{
	text-decoration:underline;
	color:#000;
}
</style>
<div class="whole-pennel-pass">
<div  style="font-size:18px; color:#0771A5;"><?php  //$id = $this->session->userdata('userid'); print_r($id);?>
Dashboard
</div>
<div  style="border:1px solid #0771A5; font-size:18px; color:#0771A5;margin:10px 0 0 0;height:181px;">
<div id="innerContent">
<div id="DashboardIcons">
<?php
$image_properties = array(
          'src' => 'admin/images/dashboard.png',
          'alt' => 'Product Images',
          'class' => 'post_images',
          'width' => '60',
          'height' => '60',
          'title' => 'product Images',
         'rel' => 'lightbox',
);
echo anchor('admincontroller/adminHome',img($image_properties));
echo "</div>";
?>
<div id="DashboardIcons">
<?php
$image_properties = array(
          'src' => 'admin/images/casino.jpg',
          'alt' => 'Casino Images',
          'class' => 'post_images',
          'width' => '60',
          'height' => '60',
          'title' => 'product Images',
          'rel' => 'lightbox',
		  
);
echo anchor('admincontroller/casinoList',img($image_properties));
echo "</div>";
?>
<div id="DashboardIcons">
<?php
$image_properties = array(
          'src' => 'admin/images/local-user-manager-icon.gif',
          'alt' => 'Product Images',
          'class' => 'post_images',
          'width' => '60',
          'height' => '60',
          'title' => 'product Images',
          'rel' => 'lightbox',
		  
);
echo anchor('admincontroller/manageUser',img($image_properties));
echo "</div>";
?>
<div id="DashboardIcons">
<?php
$image_properties = array(
          'src' => 'admin/images/game.jpg',
          'alt' => 'gamecat Images',
          'class' => 'post_images',
          'width' => '60',
          'height' => '60',
          'title' => 'Games Images',
          'rel' => 'lightbox',
		  
);
echo anchor('admincontroller/gamecat_list',img($image_properties));
echo "</div>";
?>
<div id="DashboardIcons">
<?php
$image_properties = array(
          'src' => 'admin/images/casinourl.jpg',
          'alt' => 'Games Images',
          'class' => 'post_images',
          'width' => '60',
          'height' => '60',
          'title' => 'Games Images',
          'rel' => 'lightbox',
		  
);
echo anchor('admincontroller/gamesList',img($image_properties));
echo "</div>";
?>
</div>
<div id="InnerText">
<?php echo anchor('admincontroller/adminHome','Dashboard',array('class'=>'dashboard'));?>
</div>
<div id="InnerText">
<?php echo anchor('admincontroller/casinoList','Casino List',array('class'=>'productList'));?>
</div>
<div id="InnerText">
<?php echo anchor('admincontroller/manageUser','Manage User',array('class'=>'ManageUser'));?>
</div>
<div id="InnerText">
<?php echo anchor('admincontroller/gamecat_list','Games Category List',array('class'=>'AddProduct'));?>
</div>
<div id="InnerText">
<?php echo anchor('admincontroller/gamesList','Games List',array('class'=>'AddProduct'));?>
</div>
</div>
 <div id="UserManage" style="color:#0771A5;"></div>
 </div>
<?php $this->view('admin/include/footer');?>