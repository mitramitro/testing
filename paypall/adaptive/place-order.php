<?php
include_once("db/connection.php");

echo $a= session_id();
$_SESSION['customerId']='5555';
//$_POST['grandTotal'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Entertainment - CHeckout Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="mm_entertainment.css" type="text/css" />

<script>
function submitform()
{
    document.frm_insert_order.submit();
}
window.onload = submitform; 
</script>



</head>
<body bgcolor="#14285f">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="02021e">
    <td width="400" colspan="4" rowspan="2" nowrap="nowrap"><img src="mm_entertainment_image.jpg" alt="Header image" width="400" height="140" border="0" /></td>
    <td width="360" height="58" nowrap="nowrap" colspan="3" id="logo" valign="bottom">WEBSITE NAME HERE</td>
    <td width="100%">&nbsp;</td>
  </tr>
  <tr bgcolor="02021E">
    <td height="57" nowrap="nowrap" colspan="3" id="tagline" valign="top">Optional Tagline
      Here</td>
	<td width="100%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" bgcolor="#cc3300"><img src="mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>

   <tr>
    <td colspan="8"><img src="mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>

   <tr>
    <td colspan="8" bgcolor="#cc3300"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

   <tr>
    <td colspan="8">&nbsp;<br />
	&nbsp;<br />	</td>
  </tr>
  <tr>
    <td width="155" valign="top" height="370">
	<?php include_once("include/left-categories.php") ?>
	</td>
    <td width="1" bgcolor="#445DA0"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
    <td width="50"><img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td width="100%" colspan="2" valign="top"><img src="mm_spacer.gif" alt="" width="304" height="1" border="0" /><br />
	<!-- Midlle portion starts-->
    <h1>Checkout Page</h1>

<table width="500" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF" height="30">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF" ><p style="text-align:center">Redirecting to Paypal. Please Wait...</p>
      
      <form action="https://www.sandbox.paypal.com/cgi-bin/webscr/" method="post" name="frm_insert_order">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="ankit._1312549418_biz@gmail.com">
        <input type="hidden" name="item_name" val+ue="Your total purchase amount">
        <input type="hidden" name="no_shipping" value="1">
        <input type="hidden" name="amount" value="400">
<!--        <input type="hidden" name="invoice" value="<?php //echo invoiceNumber(); ?>">-->
        <input type="hidden" name="custom" value="<?php if($_SESSION['customerId']){ echo $_SESSION['customerId']; }else{ echo '0'; } ?>">
        <input type="hidden" name="cancel_return" value="http://localhost/c7/show/order-failure.php">
        <input type="hidden" name="return" value="http://localhost/fiyatin/adaptive/success.php">
        <input type="hidden" name="rm" value="2">
        <input type="hidden" name="currency_code" value="AUD">
      </form></td>
  </tr>
  <tr>
  	<td align="center"><img src="media/images/loader.gif" alt="bot" /></td>
  </tr>  
</table>



    
    
    <!-- Middle portion ends-->
    	</td>
    <td width="10"><img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td width="200" valign="top"><img src="mm_spacer.gif" alt="" width="1" height="10" border="0" /><br />
     <table border="0" cellspacing="0" cellpadding="0" width="200">
        <tr>
          <td colspan="3" id="sidebarHeader" class="sidebarHeader" align="center">On Stage This Week</td>
        </tr>

        <tr>
		<td width="45"><img src="mm_spacer.gif" alt="" width="40" height="1" border="0" /></td>
		<td width="110" id="sidebar" class="smallText">
			<p><img src="mm_entertainment_image1.jpg" alt="image 1" width="110" height="110" border="0" vspace="6" /><br />
            Lorem ipsum dolor sit amet consetetur.<br /> <a href="javascript:;">read more &gt;</a></p>

			<p><img src="mm_entertainment_image2.jpg" alt="image 2" width="110" height="110" border="0" vspace="6" /><br />
              Lorem ipsum dolor sit amet consetetur.<br />
              <a href="javascript:;">read more &gt;</a><br /></p>
			   <br />
			  &nbsp;<br />
			  &nbsp;<br />
			  &nbsp;<br />          </td>
         <td width="45">&nbsp;</td>
        </tr>
      </table>
      <br /> </td>
    <td width="100%">&nbsp;</td>
  </tr>
  <tr>
    <td width="155">&nbsp;</td>
    <td width="1"></td>
    <td width="50">&nbsp;</td>
    <td width="194">&nbsp;</td>
    <td width="110">&nbsp;</td>
    <td width="50">&nbsp;</td>
    <td width="200">&nbsp;</td>
    <td width="100%">&nbsp;</td>
  </tr>
</table>
</body>
</html>
