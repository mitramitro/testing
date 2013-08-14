<?php

		$title = 'Single Htl Detail';
		require_once("../include/config.inc.php"); 
		
		require_once(INC_PATH."header.php");
		
//echo '<pre>';		
//print_r($_REQUEST);

//print_r($_SESSION);


$_SESSION['countryname'];


 $_SESSION['finalcheckOut'];
 $_SESSION['room'];

 $_SESSION['finalchin'];
$_SESSION['f1'];
 $_SESSION['noOfAdult'];
 
 $_SESSION['pernite_rate'];


 $trackingId = $_SESSION['nvpReqArray']['trackingId'];
 $invoiceIdFiyatin = $_SESSION['nvpReqArray']['receiverList.receiver(0).invoiceId'];
 $invoiceIdHotel = $_SESSION['nvpReqArray']['receiverList.receiver(1).invoiceId'];
 $bookingAmount = $_SESSION['nvpReqArray']['receiverList.receiver(1).amount'];
 $commAmount = $_SESSION['nvpReqArray']['receiverList.receiver(0).amount'] - $bookingAmount ;
 $totalAmountwithcomm = $_SESSION['nvpReqArray']['receiverList.receiver(0).amount'];
 

 
 
 
 

$hotelId =  $_SESSION['hotelId'];

$String = "INSERT INTO `paypal_payment`(`manual_hotel_id`, `trackingId`, `bookingAmount`, `commAmount`, `invoiceIdFiyatin`, `invoiceIdHotel`, `paymentStatus`) VALUES ('".$hotelId."','".$trackingId."','".$bookingAmount."','".$commAmount."','".$invoiceIdFiyatin."','".$invoiceIdHotel."','paid')";

mysql_query($String);

// USER WORKING

// user

	$fffff = $_SESSION['fffff'];
	$lllll = $_SESSION['lllll'];
	$email_add = $_SESSION['email_add'];
	$contact_no = $_SESSION['contact_no'];
	$address = $_SESSION['address'];
	
	
	 require_once(COMM_PATH."DatabaseManager.php");
	$db = new DatabaseManager();
	 $sql4="select username from  htl_register where username ='".$email_add."'";
	  
	 $result4 = $db->executeQuery($sql4);
	 
	
if($result4[0]['username'] ==  $email_add)
{
	
	echo "Email already exist";
	
	
}
else
{
require_once(COMM_PATH."DatabaseManager.php");
	$db = new DatabaseManager();
	$pass = rand();	
	$a= 'active';
 $sql="INSERT INTO `htl_register` (`firstName`, `middleName`, `lastName`, `username`, `password`, `userStatus`, `timeStamp`) VALUES ('".$fffff."', '".$arr['mname']."', '".$lllll."', '".$email_add."', '".md5($pass)."', '".$a."' , '".date('Y-m-d H:is')."');";
				
					
					$result = $dbConnect->executeUpdate($sql);
			/*----------------------------------After paypall payment registration email---------------------------*/		
					
			  $from = 'nanowebtech802@gmail.com';
							$to = $email_add;
							$subject = 'Link  : www.fiyatin.com Click On Link';
		$link = '<a target="_blank" href="http://www.fiyatin.com">http://www.fiyatin.com</a>';
							
				echo	$body5 ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fiyatin</title>
</head>

<body style="margin:0; padding:0;">
<table  width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr bgcolor="#f1f1f1">
    <td style="height:156px;"><a href="#"><img src="http://www.fiyatin.com/images/logo.png" width="188" height="129" alt="img" border="none"/></a></td>
  </tr>
  <tr>
    <td><div style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#015077; font-style:italic">Dear Fiyatin Client</div></td>
  </tr>
   <tr>
    <td><div style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#015077; font-style:italic">Your Payment is successfully done. <br/><br/> Your track id is : '.$trackingId.' .<br/><br/> Now you may login in fiyatin.</div></td>
  </tr>
   <tr>
    <td><div style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#015077; font-style:italic">Name : '.$fffff.' </div></td>
  </tr>
  
   <tr>
    <td><div style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#015077; font-style:italic">Email : '.$email_add.' </div></td>
  </tr>
   <tr>
    <td><div style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#015077; font-style:italic">Password : '.$pass.' </div></td>
  </tr>
  <tr>
    <td><div style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:18px; color:#000; ">Click On Link:
    '.$link.'<br/><br/>

</div></td>
  </tr>
  <tr>
    <td style="margin-top:15px;" bgcolor="#303030"><div style="height:18px;  font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#a4a4a4;">Copyright@2012. All Right Reserved</div></td>
  </tr>

</table>

</body>
</html>';
							
							

							$headers  = 'MIME-Version: 1.0'."\r\n";
	                     	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		                    $headers .= 'From: '.$from.' "\r\n"';
							
                            @mail($to, $subject, $body5, $headers);
				
					
							
				 	
					
					
					
	/*----------------------------------------------------------------------------------------------------------------------------*/				
					
	
	
	
	
	
	
}
	
	
	
	
	
	
	
	
	
	
	
	
	// Hotel detail
	$hotel_name = $_SESSION['hotel_name'];
	$pernite_rate = $_SESSION['pernite_rate'];
	$hotel_description = $_SESSION['hotel_description'];
	$rating = $_SESSION['rating'];
	$country = $_SESSION['country'];
	$state = $_SESSION['state'];
	$city = $_SESSION['city'];
	$service_tax_price = $_SESSION['service_tax_price'];	
	$room_type = $_SESSION['room_type'];
	$hotel_features = $_SESSION['hotel_features'];
	$hotel_address = $_SESSION['hotel_address'];
	$image = $_SESSION['image'];	
	$clientEmailId = 'nanowebtech802@gmail.com';	
	$commision =   $_SESSION['commision'];
	$dash_id = $_SESSION['dash_id'];
	
	
	 require_once(COMM_PATH."DatabaseManager.php");
	$db = new DatabaseManager();
	  $sql1='select * from dashboard_login where dash_id='.$dash_id.'';
	  
	  $str = $db->executeQuery($sql1);
	  
	 $hotelEmailId = $str[0]['username'];
	
	
	
// Send mail to user and hotel 
	
	
		 
		 
		 	 $from = 'fiyatin';
			 $to = $email_add.','.$hotelEmailId;
			 $subject = 'Your Booking Has Been Completed On Fiyatin';
							
					$body ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hotel Book</title>
</head>

<body>
<div style="float:left; width:700px;  height:auto;">

<div style="float:left; width:700px; height:64px; ">
<div style="float:left; margin-right:10px; width:64px; height:64px;"><img src="http://localhost/fiyatin/uploads/'.$image.'" width="64" height="64" alt="img" border="none"/></div>
<div style="font-family:Arial, Helvetica, sans-serif; float:left; font-size:15px; color:#0d447f; font-weight:bold;">

'.$hotel_name.'

</div>
<div style="float:left; width:471px; height:18px;">

<img src="http://localhost/fiyatin/images/'.$rating.'_stars.gif"  alt="img" border="none"/>

</div>
<div style="font-family:Arial, Helvetica, sans-serif; float:left; font-size:12px; color:#0d447f; ">

'.$hotel_address.'<br/>


</div>


<table style="float:left; width:700px; margin-top:10px; font-family:Arial, Helvetica, sans-serif; color:#0d447f;" width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td colspan="2"><strong>YOUR RESERVATION HAS BEEN BOOKED !</strong></td>
    </tr>
  <tr>
    <td>Hotel Id :</td>
    <td><strong>4</strong></td>
  </tr>
   <tr>
    <td>Tracking Id :</td>
    <td>'.$trackingId.'</td>
  </tr>
  <tr>
    <td colspan="2">Please refer to your hotel Id number above if you contact customer service for any reason.</td>
    </tr>
</table>


<table style="float:left; border:1px solid #0d447f; width:700px; margin-top:10px; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#0d447f;" width="700" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td bgcolor="#ebebeb" style=" color:#000; border-bottom:1px solid #0d447f; font-size:15px;" colspan="4"><strong>RESERVATION DETAILS</strong></td>
    </tr>
  <tr>
    <td style="font-size:12px;" colspan="2">Check-in: <strong>'.$_SESSION['finalchin'].'</strong><br />
      </td>
    <td colspan="2">'.$_SESSION['noOfAdult'].' Adult, '.$_SESSION['noOfChild'].' children</td>
    </tr>
  <tr>
    <td colspan="2"><span style="font-size:12px;">Check-Out: <strong>'.$_SESSION['finalcheckOut'].'</strong><br />
</span></td>
    <td colspan="2">One bed room appartment</td>
    </tr>
  <tr>
    <td colspan="4"><hr/></td>
    </tr>
  <tr>
    <td colspan="2"><strong>RATES PER ROOM</strong><br/>(excluding tax recovery charges and service fees)</td>
    <td colspan="2"><strong>PAYMENT INFORMATION</strong></td>
    </tr>
  <tr>
    <td style="  border-top:1px solid #0d447f;border-bottom:1px solid #0d447f;" width="167"><strong>Tax Recovery charges and <br />
      Service Fes</strong></td>
    <td style=" border-top:1px solid #0d447f;border-bottom:1px solid #0d447f;"  width="165">$'.$service_tax_price.' USD</td>
    <td width="160">Payment method:</td>
    <td width="166">Paypal</td>
  </tr>
  <tr>
    <td>total charges:</td>
    <td>$'.$totalAmountwithcomm.' USD</td>
    <td></td>
    <td></td>
  </tr>
  
    <tr>
    <td  style="font-size:10px;" colspan="2"></td>
    <td width="160">Per night Amount charged:</td>
    <td width="166">$'.$_SESSION['pernite_rate'].'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
  </tr>
  
  
    <tr>
    <td width="167">&nbsp;</td>
    <td width="165">&nbsp;</td>
    <td colspan="2"><strong>BILLING INFORMATION</strong></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Billing Name:</td>
    <td><strong>'.$fffff. ' '. $lllll.'</strong></td>
  </tr>
  
      <tr>
    <td width="167">&nbsp;</td>
    <td width="165">&nbsp;</td>
    <td width="160">Billing Address:</td>
    <td width="166">Adren street , Dubai, 123 street food..</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Phone no:</td>
    <td>'.$contact_no.'</td>
  </tr>
  
  
      <tr>
    <td width="167">&nbsp;</td>
    <td width="165">&nbsp;</td>
    <td width="160">Email Address:</td>
    <td width="166">'.$email_add.'</td>
  </tr>
  <tr>
    <td bgcolor="#ebebeb" style=" color:#000; border-top:1px solid #0d447f; border-bottom:1px solid #0d447f; font-size:15px;" colspan="4">Cancellation policy </td>
    </tr>
  
   <tr>
     <td colspan="4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin lobortis dignissim justo non porta. Mauris in nulla nunc, quis congue massa. Nunc pharetra laoreet nisi, imperdiet ullamcorper ipsum tempor eu. Quisque luctus posuere odio et fermentum. Donec posuere mattis orci, nec vulputate sapien pretium vel.</td>
   </tr>
   </table>



</div>


</div>

</body>
</html>';
		
		
	  $body;					
		 
							$headers  = 'MIME-Version: 1.0'."\r\n";
	                     	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		                    $headers .= 'From: '.$from.' "\r\n"';
							
   
  
                           // @mail($to, $subject, $body, $headers);
							
							
// Send Mail to Client Fiyatin
	
		 
		 	 $from2 = 'fiyatin';
			 $to2 = $clientEmailId;
			 $subject2 = 'New Booking  : Hotel Id -"'.$hotelId.'" ,HOtel Name - "'.$hotel_name.','.$city.'" ';
							
					$body2 ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fiyatin</title>
</head>

<body style="margin:0; padding:0;">
<table  width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr bgcolor="#f1f1f1">
    <td style="height:156px;"><a href="#"><img src="http://fiyatin.com/images/logo.png" width="188" height="129" alt="img" border="none"/></a></td>
  </tr>
  <tr>
    <td><div style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#015077; font-style:italic">Dear Fiyatin, </div></td>
  </tr>
   <tr>
    <td><div style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#015077; font-style:italic">Tracking Id : '. $trackingId.' </div></td>
  </tr>
  
   <tr>
    <td><div style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#015077; font-style:italic">Invoice Id Fiyatin (Paypal) : '.$invoiceIdFiyatin.' </div></td>
  </tr>
  <tr>
    <td><div style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:18px; color:#000; ">
	
  <strong> Hotel id : '.$hotelId.'</strong> <br/> 
   <strong> Hotel Email Id : '.$hotelEmailId.'</strong> <br/>
   <strong>Per Night Rate : $'.$pernite_rate.'</strong> <br/>
 <strong>  Tax and Services : $'.$service_tax_price.'</strong><br/>
  <strong> Commession : '.$commision.'%</strong></br>  
   <strong>Booking Amount : $'.$bookingAmount.'</strong></br> 
   <strong>Commession Amount: $'.$commAmount.'</strong></br>
  <strong> Total Charge : $'.$totalAmountwithcomm.'</strong> <br/>

</div></td>
  </tr>
  <tr>
    <td style="margin-top:15px;" bgcolor="#303030"><div style="height:18px;  font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#a4a4a4;">Copyright@2012. All Right Reserved</div></td>
  </tr>

</table>

</body>
</html>';
		
		
		 $body2;					
		 
							$headers2  = 'MIME-Version: 1.0'."\r\n";
	                     	$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		                    $headers2 .= 'From: '.$from2.' "\r\n"';
							
   
   
                          //  @mail($to2, $subject2, $body2, $headers2);							
							
// Send Mail to Hotel Manager
	
		 
		 	 $from3 = 'Fiyatin';
			 $to3 = $clientEmailId;
			 $subject3 = 'New HOtel Booking Mail  : Client Name - "Fiyatin"  ';
							
					$body3 ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fiyatin</title>
</head>

<body style="margin:0; padding:0;">
<table  width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr bgcolor="#f1f1f1">
    <td style="height:156px;"><a href="#"><img src="http://fiyatin.com/images/logo.png" width="188" height="129" alt="img" border="none"/></a></td>
  </tr>
  <tr>
    <td><div style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#015077; font-style:italic">Dear Sir, </div></td>
  </tr>
   <tr>
    <td><div style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#015077; font-style:italic">Tracking Id : '. $trackingId.' </div></td>
  </tr>
  
   <tr>
    <td><div style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#015077; font-style:italic">Invoice Id Fiyatin (Paypal) : '.$invoiceIdHotel.' </div></td>
  </tr>
  <tr>
    <td><div style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:18px; color:#000; ">
	
  <strong> Custmer Name : '.$_SESSION['f1'].' '.$_SESSION['l1'].'</strong> <br/> 
  <strong> Checkin Date : '.$_SESSION['finalchin'].'</strong> <br/> 
  <strong> CheckOut Date : '.$_SESSION['finalcheckOut'].'</strong> <br/> 
  <strong> Number Of Adults  : '.$_SESSION['noOfAdult'].'</strong> <br/> 
  <strong> Number of Childs: '.$_SESSION['noOfChild'].'</strong> <br/> 
 
   <strong>Per Night Rate : $'.$pernite_rate.'</strong> <br/>
 <strong>  Tax and Services : $'.$service_tax_price.'</strong><br/>
  <strong> Commession : '.$commision.'%</strong></br>  
   <strong>Booking Amount : $'.$bookingAmount.'</strong></br> 
   <strong>Commession Amount: $'.$commAmount.'</strong></br>
  <strong> Total Charge : $'.$totalAmountwithcomm.'</strong> <br/>

</div></td>
  </tr>
  <tr>
    <td style="margin-top:15px;" bgcolor="#303030"><div style="height:18px;  font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#a4a4a4;">Copyright@2012. All Right Reserved</div></td>
  </tr>

</table>

</body>
</html>';
		
		
		 $body3;					
		 
							$headers2  = 'MIME-Version: 1.0'."\r\n";
	                     	$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		                    $headers2 .= 'From: '.$from3.' "\r\n"';
							
   
   
                            @mail($to2, $subject2, $body2, $headers2);




?>
<div class="content_pennel">
<div class="content_inner">




<div class="detail">

<h1>Thank you! for using fiyatin </h1> 
<div class="detail2">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at ligula eu orci feugiat cursus quis sit amet lectus. Mauris sit amet faucibus lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>

<div class="clear"></div>
<div class="yellow_div_gs">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at ligula eu orci feugiat cursus quis sit amet lectus. Mauris sit amet faucibus lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In facilisis ullamcorper magna et cursus..</div>
<div class="clear"></div>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at ligula eu orci feugiat cursus quis sit amet lectus. Mauris sit amet faucibus lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
<div class="clear"></div>
<div class="yellow_div_gs">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at ligula eu orci feugiat cursus quis sit amet lectus. Mauris sit amet faucibus lorem.</div>




</div>



</div>







</div>

</div>


<?Php

require_once(INC_PATH."footer.php");

?>