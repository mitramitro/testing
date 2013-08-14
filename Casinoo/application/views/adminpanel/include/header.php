 <?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>



<!--Fancybox css starts here-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.fancybox.css" />
<!--Fancybox css ends here-->

<!--Fancybox script starts here-->

	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.8.0.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->

	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.fancybox.js?v=2.1.0"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.0" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.fancybox-buttons.css" />
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.fancybox-buttons.js?v=1.0.3"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.fancybox-thumbs.css?v=1.0.6" />
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.fancybox-thumbs.js?v=1.0.6"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.fancybox-media.js?v=1.0.3"></script>
    
<!--Fancybox script ends here--> 
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>menu/sdmenu/sdmenu.css" />
<script type="text/javascript" src="<?php echo base_url();?>/menu/sdmenu/sdmenu.js"></script>
<script type="text/javascript">
// <![CDATA[
var myMenu;
window.onload = function() {
	myMenu = new SDMenu("my_menu");
	myMenu.init();
};
// ]]>
</script>
<!--<script type="text/javascript" src="<?php //echo base_url();?>js/jquery.MultiFile.min"></script>
<script type="text/javascript" src="<?php//echo base_url();?>js/jquery-1.2.6.js"></script>-->
<style>
.tableTdClass{
 border: medium none;
    color: #4D4D4D;
    float: left;
    font-family: small-caption;
    font-size: 15px;
    padding: 10px;
	width:100px;
	
}

.anchorPaging{width:20px; font-size:14px; float:left;'}

#con_c input {
    border-radius: 6px 6px 6px 6px;
    color: #4D4D4D;
    float: left;
    font-family: small-caption;
    font-size: 15px;
    height: 30px;
    width: 200px;
	border: 1px solid #717171;
}


#con_c textarea {
    border-radius: 6px 6px 6px 6px;
    color: #4D4D4D;
    float: left;
    font-family: small-caption;
    font-size: 15px;
    height: 100px;
    width: 200px;
	border: 1px solid #717171;
}
.welcomeAdmin
{
	background-color:#0771A5;
	color:white;
	font-size:24px;
	
}
</style>
</head>

<body>
	<div style="width:1001px;margin:0 0 0 173px" >
       <img src="<?php //echo images(); ?>banners_attack.jpg" width="1000px" height="130">
     </div>
     
     <?php if($this->session->userdata('id') == null || $this->session->userdata('id') == '')
	 {
	 ?>
	<div style="background-color: #0771A5;
    color: white;
    font-family: Times New Roman;
    font-size: 20px;
    height: 36px;
    margin: 0 0 0 173px;
    padding-left: 10px;
    width: 992px;
    display:none;">
	</div>
    <?php
    }
	 else
	 {
	 ?>
<div style="background-color: #0771A5;
    color: white;
    font-family: Times New Roman;
    font-size: 20px;
    height: 36px;
    margin: 0 0 0 173px;
    padding-left: 10px;
    width: 992px;">
     Welcome <?php echo $this->session->userdata('username'); ?>!
     
     <a href="<?php echo site_url('AdminPanel/Logout');?>" style="color:white;font-weight: bold; text-decoration:none;float:right;font-size:18px; margin-right: 10px;font-family:'Arial Sans MS;';
    padding-top: 5px;">Logout</a>
    </div>
		<?php
		}
	 	?>
         <div id="contentpanel">
        
     
			
				
			
			
			
		
		