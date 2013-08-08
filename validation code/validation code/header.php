<?php 

session_start();

include "log/LogInit.php";
include "messaging.php";

$WEBSITE_DOMAIN=ltrim($_SERVER['HTTP_HOST'],'www.');
$FROM_EMAIL='dispatch@'.$WEBSITE_DOMAIN;
$CUSTOMER_EMAIL_SUBJECT_LINE='Florida Injury and Accident Lawyers';








$captcha_incorrect=false;
	

if(isset($_REQUEST['submit_frm']) && $_REQUEST['submit_frm'] == "submit")
{

  if( strcasecmp($_SESSION['input_captcha'],trim($_POST['input_captcha']) ) != 0 )
  { // invalid captcha
	
       $MainLog->Log("$WEBSITE_DOMAIN - new lead coming in, incorrect captcha entered, no further action taken; lead details - first name: ".$_POST['fName'].", last name: ".$_POST['lName'].", phone: ".$_POST['pNumber'].", zip: ".$_POST['zip'].", email: ".$_POST['email'].", ip: ".$_SERVER['REMOTE_ADDR'].".");

       $captcha_incorrect=true;

  }
  else
  { // valid captcha
  

    unset($_SESSION['input_captcha']);

    $new_case_number=rand();

    $MainLog->Log("$WEBSITE_DOMAIN - new lead coming in  - case #: $new_case_number, first name: ".$_POST['fName'].", last name: ".$_POST['lName'].", phone: ".$_POST['pNumber'].", zip: ".$_POST['zip'].", email: ".$_POST['email'].", ip: ".$_SERVER['REMOTE_ADDR'].".");

    include("DatabaseManager.php");
    $db = new DatabaseManager();

    $lead_details=$_POST;

	$acident= explode("/",$_POST['accident_date']);
	$acidentdate=$acident[2]."-".$acident[0]."-".$acident[1];

    $sql = "insert into lead(fname,lname,pnumber,ip_address,zip,email,brief_desc,category,createdDate,date_to_use,case_number,accident_date) values('".$_POST['fName']."','".$_POST['lName']."','".$_POST['pNumber']."','".$_SERVER['REMOTE_ADDR']."','".$_POST['zip']."','".$_POST['email']."','".$_POST['brief_desc']."','".$_POST['category']."',now(),now(),'".$new_case_number."','".$acidentdate."')";
    $result = $db->executeUpdate($sql);

    $new_lead_id = $db->lastInsertId();


			// first - attempt to assign the lead to the attorneys from the assigned ZIPs
		$sqlassignZips = 'SELECT users.* FROM users,assignedzips WHERE assignedzips.zipcode = "'.$lead_details['zip'].'" AND assignedzips.user_id = users.userId LIMIT 1';
		//$sqlassignZips = 'SELECT users.* FROM users,assignedzips WHERE assignedzips.zipcode = "'.$lead_details['zip'].'" AND assignedzips.user_id = users.userId AND users.userStatus="1" LIMIT 1';
		$result_users = $db->executeQuery($sqlassignZips);

		if(count($result_users)>0)
		{ // found attorney that has this ZIP assigned to

			// therefore assign this lead to the attorney that owns this zip
			$assignLead = 'insert into assignlead (leadIds, attorneyId, userId, zip, createdDate) values ("'.$new_lead_id.'", "'.$result_users[0]['userId'].'", "1","'.$_POST['zip'].'",now())';
			$assignedLead = $db->executeUpdate($assignLead);

			$updateLeadStatus = 'update lead set assigned = "1" where id="'.$new_lead_id.'"';
			$updatedLeadStatus = $db->executeUpdate($updateLeadStatus);

			// log that a new lead was assigned to an assigned ZIP attorney
            $MainLog->Log("$WEBSITE_DOMAIN - assigned new lead (id: $new_lead_id, case #: $new_case_number, email: ".$lead_details['email'].") to attorney ".$result_users[0]['companyName']." (id: ".$result_users[0]['userId']."); reason: assigned zip.");

		    $to = $result_users[0]['userEmail'];
		    if ( !empty($result_users[0]['userEmail2']) ) $to .= ",".$result_users[0]['userEmail2'];
		    if ( !empty($result_users[0]['userEmail3']) ) $to .= ",".$result_users[0]['userEmail3'];

		    // notify the attorney about the lead via email
			SendEmailToAttorney($to, $result_users[0]['userName'], $new_case_number, $FROM_EMAIL, $lead_details);


			// notify the attorney about the lead via SMS
			send_sms($result_users, $lead_details, $WEBSITE_DOMAIN, 'New Lead-FIAL');

	        // Lead has been assigned, therefore send confirmation email to customer
	        SendEmailToCustomer($new_case_number,$result_users[0], $FROM_EMAIL, $lead_details, $CUSTOMER_EMAIL_SUBJECT_LINE);

		} // end if users with assigned zips
	 	else
		{ // start auto-rotation
		  // first check attorneys with assigned quotas
			$getUsers = 'SELECT * FROM users WHERE leads_dev>0 AND userStatus="1" ORDER BY last_assigned_lead_time ASC LIMIT 1';
			$result_users=$db->executeQuery($getUsers);


			if(count($result_users)>0)
			{ // next user in auto-rotation found

			  $insertlead = 'insert into assignlead (leadIds,attorneyId,zip,createdDate) values ("'.$new_lead_id.'","'.$result_users[0]['userId'].'","'.$_POST['zip'].'",now())';
			  $insertedLeadAssign=$db->executeUpdate($insertlead);
			  $updateStatus = 'update lead set assigned="1" where id="'.$new_lead_id.'"';
			  $updatedStatus=$db->executeUpdate($updateStatus);

			  // now update the attorney record too - decrease his leads allowance and mark the last time he got a lead
 			  $minus_leads_dev = 'UPDATE users SET leads_dev=leads_dev-1, last_assigned_lead_time=now() where userId="'.$result_users[0]['userId'].'"';
 			  $minusd_leads_dev=$db->executeUpdate($minus_leads_dev);

			  // log that a new lead was assigned via auto-rotation
              $MainLog->Log("$WEBSITE_DOMAIN - assigned new lead (id: $new_lead_id, case #: $new_case_number, email: ".$lead_details['email'].") to attorney ".$result_users[0]['companyName']." (id: ".$result_users[0]['userId']."); reason: autorotation by lead quotas.");

			  // now notify the attorney for the new lead
 		      $to = $result_users[0]['userEmail'];
 			  if ( !empty($result_users[0]['userEmail2']) ) $to .= ",".$result_users[0]['userEmail2'];
 			  if ( !empty($result_users[0]['userEmail3']) ) $to .= ",".$result_users[0]['userEmail3'];

 			  // notify the attorney about the lead via email
			  SendEmailToAttorney($to, $result_users[0]['userName'], $new_case_number, $FROM_EMAIL, $lead_details);


			  // notify the attorney about the lead via SMS
			  send_sms($result_users, $lead_details, $WEBSITE_DOMAIN, 'New Lead-FIAL');

		      // Lead has been assigned, therefore send confirmation email to customer
		      SendEmailToCustomer($new_case_number,$result_users[0], $FROM_EMAIL, $lead_details, $CUSTOMER_EMAIL_SUBJECT_LINE);

			} // end if(count($result_users)>0)
			else
			{ // NO attorneys found i.e. no more available leads in the quotas, therefore do the autoration without the quotas
			  $getUsers = 'SELECT * FROM users WHERE userStatus="1" ORDER BY last_assigned_lead_time ASC LIMIT 1';
			  $result_users=$db->executeQuery($getUsers);

			  if(count($result_users)>0)
			  { // next user in auto-rotation found

				$insertlead = 'insert into assignlead (leadIds,attorneyId,zip,createdDate) values ("'.$new_lead_id.'","'.$result_users[0]['userId'].'","'.$_POST['zip'].'",now())';
			    $insertedLeadAssign=$db->executeUpdate($insertlead);
			    $updateStatus = 'update lead set assigned="1" where id="'.$new_lead_id.'"';
			    $updatedStatus=$db->executeUpdate($updateStatus);

			    // now update the attorney record too - just mark the last time he got a lead
 			    $minus_leads_dev = 'UPDATE users SET last_assigned_lead_time=now() where userId="'.$result_users[0]['userId'].'"';
 			    $minusd_leads_dev=$db->executeUpdate($minus_leads_dev);

                $MainLog->Log("$WEBSITE_DOMAIN- assigned new lead (id: $new_lead_id, case #: $new_case_number, email: ".$lead_details['email'].") to attorney ".$result_users[0]['companyName']." (id: ".$result_users[0]['userId']."); reason: general auto rotation.");

			    // now notify the attorney for the new lead
 			    $to = $result_users[0]['userEmail'];
 			    if ( !empty($result_users[0]['userEmail2']) ) $to .= ",".$result_users[0]['userEmail2'];
 			    if ( !empty($result_users[0]['userEmail3']) ) $to .= ",".$result_users[0]['userEmail3'];

 			    // notify the attorney about the lead via email
			    SendEmailToAttorney($to, $result_users[0]['userName'], $new_case_number, $FROM_EMAIL, $lead_details);


			    // notify the attorney about the lead via SMS
			    send_sms($result_users, $lead_details, $WEBSITE_DOMAIN, 'New Lead-FIAL');

		        // Lead has been assigned, therefore send confirmation email to customer
		        SendEmailToCustomer($new_case_number,$result_users[0], $FROM_EMAIL, $lead_details, $CUSTOMER_EMAIL_SUBJECT_LINE);

			  }
			  else
			  { // no active attorneys found
			    // perhaps report an error
                $MainLog->Error("ERROR: $WEBSITE_DOMAIN - can not assign new lead (id: $new_lead_id, case #: $new_case_number, email: ".$lead_details['email']."), no attorneys found in DB.",true);
			  }
			} // end else auto rotation - no lead quotas available
		} // else else start auto-rotation - with quotas


		header("Location: index.php?msg=1&cn=$new_case_number");
		exit;

  } // end else valid captcha
} // endif submit

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" CONTENT="<?php echo $keywords; ?>" />
<meta name="description" CONTENT="<?php echo $keywords1; ?>" />
<?php /*?><meta name="DC.title" content="Miami Car Accident Lawyers &ndash; Florida Injury and Accident Lawyers" />

<meta property="og:url" content="<?php echo $ogurl;?>">
<meta property="og:title" content="<?php echo $ogtitle;?>">
<meta property="og:description" content="<?php echo $ogdescription;?>"> 
<meta property="og:type" content="<?php echo $ogvideo;?>">
<meta property="og:image" content="<?php echo $ogimage;?>">
<meta property="og:video" content="<?php echo $ogvideo;?>">
<meta property="og:video:type" content="<?php echo $ogvideotype;?>">
<meta property="og:site_name" content="<?php echo $ogsite_name;?>">
<?php */?>

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
<!--  DUDAMOBILE REDIRECT SCRIPT -->
<script src="http://static.dudamobile.com/DM_redirect.js" type="text/javascript"></script>
<script type="text/javascript">DM_redirect("http://m.floridainjuryandaccidentlawyers.com");</script>
<!--  END DUDAMOBILE REDIRECT SCRIPT -->
<title><?php echo $title ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/navo_slider.css" rel="stylesheet" type="text/css" />
<link href="css/default.css" media="screen" rel="stylesheet" type="text/css" />
<!--<link href="css/demos.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/jquery.ui.all.css" rel="stylesheet" type="text/css" />
--><link href="css/popup.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<!--[if lt IE 7]>
<script type="text/javascript" src="js/jquery/jquery.dropdown.js"></script>
<![endif]-->
<!-- / END -->

<link rel='stylesheet' id='et-shortcodes-css-css'  href='../css/shortcodes.css?ver=1.6' type='text/css' media='all' />
<script type='text/javascript' src='../js/jquery/jquery.js?ver=1.7.1'></script>
<script type='text/javascript' src='../js/jquery/jquery.ui.core.min.js?ver=1.8.16'></script>
<script type='text/javascript' src='../js/jquery/jquery.ui.widget.min.js?ver=1.8.16'></script>
<script type='text/javascript' src='../js/jquery/jquery.ui.position.min.js?ver=1.8.16'></script>

<script type='text/javascript' src='../js/jquery/et_shortcodes_frontend.js?ver=1.6'></script>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wlwmanifest.xml" /> 

<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
<!-- MOUSEFLOW.COM SCRIPT -->
<script type="text/javascript">document.write(unescape("%3Cscript src='" + (("https:" == document.location.protocol) ? "https" : "http") + "://c.mouseflow.com/projects/e9db6d71-9754-4b1c-a143-38cc526d5fad.js' type='text/javascript'%3E%3C/script%3E"));</script>

<!-- SMITH ALLEN LAW ANALYTICS   -  REPLACED CODE WITH DUAL CODING BELOW ON 5-29-12
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29922976-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
-->
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-29922976-1']);
_gaq.push(['_setDomainName', 'floridainjuryandaccidentlawyers.com']);
_gaq.push(['_trackPageview']);
_gaq.push(['b._setAccount', 'UA-32225317-1']);
_gaq.push(['b._trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

 </script>


</head>


 <?php 

   if(isset($_REQUEST['msg']) && $_REQUEST['msg']==1) { 
		$call="onload=".'"'."showMess();".'"';
	}
	else if(isset($_REQUEST['msg']) && $_REQUEST['msg']==2) { 
		$call="onload=".'"'."showAttMess();".'"';
	}
	else {
		$call='';
	}
	
	?>
	
	
	<body <?php echo $call; ?> >	

	<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg']==1) { 
		?>

<!-- START OF CONVERSION CODE -->	<!-- Google Code for Contact Form Conversion Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1003172547;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "JriYCN3JhQMQw-Ws3gM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1003172547/?value=0&amp;label=JriYCN3JhQMQw-Ws3gM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
        
<!-- Google Code for floridainjuryandaccidentlawyers.com/Popup Conversion Page 
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 969391488;
var google_conversion_language = "en";
var google_conversion_format = "1";
var google_conversion_color = "ffffff";
var google_conversion_label = "v0SbCNj1zgMQgPuezgM";
var google_conversion_value = 0;
if (200.00) {
  google_conversion_value = 200.00;
}
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/969391488/?value=200.00&amp;label=v0SbCNj1zgMQgPuezgM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- END OF CONVERSION CODE -->	
        
        <?php
	}
    ?>
    
	<?php include"messPopup.php";?>

  <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
        
<?php
  if (!empty($_POST['category'])) echo '$("#category").val('.$_POST['category'].');';
  if ($captcha_incorrect) // javascript to scroll down the page in case of error, so people can see the error message
    echo "\n".'$(window).load(function()
	        {
    	      if ( document.getElementById("input_captcha") ) document.getElementById("input_captcha").focus();
		    });';
?>

    });
    </script>
<!--main con start here-->
<div id="main-con">
<!--header start here-->
<div id="header"> <a href="http://www.floridainjuryandaccidentlawyers.com"><img src="images/logo.png" alt="Florida injury and accident lawyers" border="0" class="logo" style="padding-top:5px;" /></a>
  <!--protecting-btn start here-->
  <div class="protecting-btn"><!--<a style="text-decoration:none !important">Protecting your legal rights</a>--></div>
  <!--protecting-btn ends here-->
  <!--live-section start here-->
  <div class="live-section"> <img src="images/live-L.png" alt="live-left" class="live-r" />
    <div class="live-m">Call us: <span style="color:white;">24/7 &nbsp;&nbsp; 1-888-725-5447</span><br>
	<a href="../downloadapp.php" title="Download Our Florida Injury and Accident App Here"><img src="images/image21-thumbnail.png" alt="Florida injury and accident lawyers APP" border="0" style="float:left;padding-top:2px;padding-left:25px;" /></a>
      <!--<div class="live-chat"><a href="#"><img src="images/live-chat.png" alt="live chat" border="0" /></a></div>-->
      <!--<div class="live-chat-top"><a href="http://www.comm100.com/livechat/" title="Live Chat"><span id="comm100_ButtonImage"><img src="http://chatserver.comm100.com/BBS.aspx?siteId=110012&amp;planId=39&amp;partnerId=-1" width="124" height="40" alt="Live Chat" onclick="comm100_Chat();return false;" target="_blank" title="Live Chat"/></span></a>
        <script src="http://chatserver.comm100.com/js/LiveChat.js?siteId=110012&amp;planId=39&amp;partnerId=-1" type="text/javascript"></script>
      </div>-->
      <div style=" position:fixed; z-index:100; height:112px; width:150px; top:70px; right:0px;">
  <!-- BEGIN Comm100 Live Chat Button Code --><link href="https://chatserver.comm100.com/css/comm100_livechatbutton.css" rel="stylesheet" type="text/css"/><a href="http://www.comm100.com/livechat" target="_blank" onclick="comm100_110012.openChatWindow(event,38,-1);return false;"><img style="border:0px" id="comm100_ButtonImage" src="https://chatserver.comm100.com/BBS.aspx?siteId=110012&amp;planId=38&amp;partnerId=-1"></img></a><script src="https://chatserver.comm100.com/js/LiveChat.js?siteId=110012&amp;planId=38&amp;partnerId=-1" type="text/javascript"></script><div id="comm100_ChatButton"><div id="comm100_warp"><div id="comm100_dvhelp"><div id="comm100_track"><a href="http://www.comm100.com/livechat/" target="_blank"><b>Live Chat</b></a> by <a style="color:#009999;cursor:pointer;" onclick="javascript:document.getElementById('comm100_dvbox').style.display='';">Comm100</a></div></div><div id="comm100_dvbox" class="comm100_dvbox_css" style="display:none;" onmouseover="this.style.display=''" onmouseout="this.style.display='none'"><div class="comm100_dvcontent_css"><p class="comm100_ptitle_css"><b><a href="http://www.comm100.com/" target="_blank" class="comm100_atitle_css" >Comm100</a> Products:</b></p><ul class="comm100_ulbox_css"><li style="display:none;" class="comm100_onelinone">&nbsp;</li><li><a href="http://www.comm100.com/" target="_blank">Customer Service Software</a></li><li><a href="http://www.comm100.com/livesupport/" target="_blank" >Live Support</a> Software</li><li><a href="http://www.comm100.com/emailmarketing/" target="_blank">Email Marketing Software</a></li><li><a href="http://www.comm100.com/helpdesk/" target="_blank">Help Desk</a> Software</li><li><a href="http://www.comm100.com/emailmarketing/" target="_blank">Email Marketing</a></li><li><a href="http://www.comm100.com/ticket/" target="_blank">Support Ticket</a> Software</li></ul></div></div></div></div><!-- End Comm100 Live Chat Button Code -->
      </div>
    </div>
    <img src="images/live-R.png" alt="live-right" class="live-r" /> </div>
  <!--live-section ends here-->
  <div class="clr"></div>
  <!--navigation start here-->
  <div class="navigation">
    <ul class="dropdown dropdown-horizontal">
      <li> <a href="http://www.floridainjuryandaccidentlawyers.com" <?php if($page =="home") {?> class="active2" <?php } ?> title="Florida injury and accident lawyers"> <span <?php if($page =="home") { ?> class="active" <?php } ?>>Home</span> </a> </li>
      <li> <a href="about-us.php" <?php if($page =="Our Services") {?> class="active2" <?php } ?> title="About our Services"><span <?php if($page =="Our Services") { ?> class="active" <?php } ?>>About our Services</span> </a> </li>
      <li> <a href="attorneys.php" <?php if($page =="Attorneys") {?> class="active2" <?php } ?> title="Attorneys"> <span <?php if($page =="Attorneys") { ?> class="active" <?php } ?> >Attorneys</span> </a> </li>
      <li> <a href="practiceareas.php" <?php if($page =="Practice Areas") {?> class="active2" <?php } ?> title="Practice Areas"> <span <?php if($page =="Practice Areas") { ?> class="active" <?php } ?>>Practice Areas</span> </a>
        <!---<ul>
          <li><a href="dog-bite.php" title="Animal Attacks/Dog Bite">Animal Attacks/Dog Bite</a></li>
          <li><a href="automotive-accidents.php" title="Automotive Accidents">Automotive Accidents</a></li>
          <li><a href="bus-acc.php" title="Bus Accidents">Bus Accidents</a></li>
          <li><a href="motorcycle-acc.php" title="Motorcycle Accidents">Motorcycle Accidents</a></li>
          <li><a href="nursing.php" title="Nursing Home Abuse">Nursing Home Abuse</a></li>
          <li><a href="slip-fall-injury.php" title="Premises Liability (Slip & Fall)">Premises Liability (Slip & Fall)</a></li>
          <li><a href="product-liability.php" title="Product Liability">Product Liability</a></li>
          <li><a href="truck-accident.php" title="Truck Accidents">Truck Accidents</a></li>
          <li><a href="workers_compensation.php" title="Workers Compensation">Workers Compensation</a></li>
          <li><a href="wrongful.php" title="Wrongful Death">Wrongful Death</a></li>
        </ul>--->
      </li>
      <li> <a href="verdict.php" <?php if($page =="Verdicts") {?> class="active2" <?php } ?> title="Verdicts"> <span <?php if($page =="Verdicts") { ?> class="active" <?php } ?>>Verdicts </span> </a> </li>
      <li> <a href="faq.php" <?php if($page =="Frequently Asked Questions") {?> class="active2" <?php } ?> title="FAQ's"> <span <?php if($page =="Frequently Asked Questions") { ?> class="active" <?php } ?>>FAQ's</span> </a> </li>
     <li> <a href="location.php" <?php if($page =="Locations") {?> class="active2" <?php } ?> title="Locations"><span <?php if($page =="Locations") { ?> class="active" <?php } ?>>Locations</span> </a> </li>
      <li class="no"><a href="contact.php" <?php if($page =="Contact Us") {?> class="active2" <?php } ?> title="Contact Us"><span <?php if($page =="Contact Us") { ?> class="active" <?php } ?>>Contact Us</span> </a> </li>
    </ul>
    
  </div>
  <!--navigation ends here-->
  <div class="clr"></div>
</div>
<!--header ends here-->
<div class="clr"></div>
<!--content-section start here-->
<div class="content-section">
<!--banner start here-->
 <?php if($page=="home" || $page=="Practice Areas") { ?>
<div class="banner"> <img src="images/banner-left.png" alt="banner-left" class="banner-left" />
  <div class="banner-middle">
    <!--banner-section-left start here-->
    <div class="banner-section-left">
	  
	  
	 <div id="wrapper">
        <div class="slider-wrapper theme-default bg-cont">
            <div id="slider" class="nivoSlider">
            	<img src="images/image24.jpg" alt="" />
                <img src="images/image21.png" alt="" />
				<!--<img src="images/image3.jpg" alt="" />-->
                <!--<img src="images/image6.jpg" alt="" />-->
                <img src="images/image9.jpg" alt="" />
                <!--<img src="images/image12.jpg" alt="" />-->
                <img src="images/image15.jpg" alt="" />
                <img src="images/image18.jpg" alt="" />
                <!--<img src="images/image21.jpg" alt="" />-->
                
            </div>
        </div>
    </div>
	  
	  
    </div>
    <!--banner-section-left ends here-->
    <!--contact panel start here-->
   

	

    <div class="contact-panel">
      <div class="top-contact1">Contact</div>
	  
	  <form name="contactfrm_header_right" action="index.php" method="post">
	  
      <!--<div class="middle-round">-->
	  <div class="contact_center">
	  <div class="contact_forms">
        <input type="text" name="fName" id="fName" class="cont_txtfeild1" value="<?php if($_POST['fName']){echo $_POST['fName'];}else{echo 'First Name *';}?>" onblur="if(this.value=='')this.value='First Name *';" onfocus="if(this.value=='First Name *')this.value='';" onkeypress="change_valcol();" />

        <input name="lName" id="lName" type="text" class="cont_txtfeild1" value="<?php if($_POST['lName']){echo $_POST['lName'];}else{echo 'Last Name *';}?>" onblur="if(this.value=='')this.value='Last Name *';" onfocus="if(this.value=='Last Name *')this.value='';" onkeypress="change_valcol();" />  
		
        <input name="email" id="email" type="text" class="cont_txtfeild1" value="<?php if($_POST['email']){echo $_POST['email'];}else{echo 'Email Address *';}?>" onblur="if(this.value=='')this.value='Email Address *';" onfocus="if(this.value=='Email Address *')this.value='';" onkeypress="change_valcol();"  />
		
        <input name="pNumber" id="pNumber" type="text" class="cont_txtfeild1" value="<?php if($_POST['pNumber']){echo $_POST['pNumber'];}else{echo 'Telephone Number *';}?>" onblur="if(this.value=='')this.value='Telephone Number *';" onfocus="if(this.value=='Telephone Number *')this.value='';" onkeypress="change_valcol();"  />
		
        
		        
        <input name="zip" id="zip" type="text" class="cont_txtfeild1" value="<?php if($_POST['zip']){echo $_POST['zip'];}else{echo 'Zip *';}?>" onblur="if(this.value=='')this.value='Zip *';" onfocus="if(this.value=='Zip *')this.value='';" onkeypress="change_valcol();"  />
		
        <input type="text" id="datepicker" name="accident_date" class="cont_txtfeild1" readonly="readonly"  onFocus="displayCalendar('datepicker','mm/dd/yyyy',this)" value="<?php if($_POST['accident_date']){echo $_POST['accident_date'];}else{echo 'Accident Date';}?>">
		 
  <select name="category" id="category" class="cont_txtfeild2" onkeypress="change_valcol();" >
    <option value="">Select Accident Type</option>
    <option value="1" <?php if($_POST['category']==1){echo 'selected="selected"';}?>>Bus Accident</option>
	<option value="2" <?php if($_POST['category']==2){echo 'selected="selected"';}?>>Dog Bite</option>
	<option value="3" <?php if($_POST['category']==3){echo 'selected="selected"';}?>>Car Accident</option>
	<option value="4" <?php if($_POST['category']==4){echo 'selected="selected"';}?>>Truck Accident</option>
	<option value="5" <?php if($_POST['category']==5){echo 'selected="selected"';}?>>Slip and Fall</option>
	<option value="6" <?php if($_POST['category']==6){echo 'selected="selected"';}?>>Motorcycle Accident</option>
	<option value="7" <?php if($_POST['category']==7){echo 'selected="selected"';}?>>Workers Comp</option>
	<option value="8" <?php if($_POST['category']==8){echo 'selected="selected"';}?>>Wrongful Death</option>
	<option value="9" <?php if($_POST['category']==9){echo 'selected="selected"';}?>>Product Liability</option>
	<option value="10" <?php if($_POST['category']==10){echo 'selected="selected"';}?>>Nursing Home</option>
	<option value="11" <?php if($_POST['category']==11){echo 'selected="selected"';}?>>Personal Injury</option>
	<option value="12" <?php if($_POST['category']==12){echo 'selected="selected"';}?>>Other</option>
  </select>
		
         
		<textarea name="brief_desc" id="brief_desc" cols="" rows="" class="cont_txtfeild3" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';" onkeypress="change_valcol();" ><?php if($_POST['brief_desc']){echo $_POST['brief_desc'];}else{echo 'Comment *';}?></textarea>
		<div class="ac">To protect your privacy, please enter the following code.</div>
		
		<div>
		 
		 <div class="cap_txt">    
        <input type="text" class="cap_txt1" id="input_captcha" name="input_captcha">
		</div>
		
       <div class="cap_code"><img id="captchaimg" src="captcha_code_file.php?rand=329836837"></div>
	   <div id="captchaError" class="error"></div>
	   <div style="clear:both"></div>
	   

	   </div>
	   
	    <div class="clr"></div>
        
		 <?php if($captcha_incorrect) {?>
         <div id="captchaError" class="error">Please enter a valid Captcha</div>
        <?php } ?>
		
		
        <div class="cn_rd">Can't read the image? click <a href="javascript: refreshCaptcha();"><span class="cn_rd1">here</span></a> to refresh</div>
		
		 <input type="hidden" name="submit_frm" value="submit" />
        <div class="submit-btn"><a href="#" onclick="return validate_header_right();">Submit</a></div>
        <div class="clr"></div>
		<div class="cont_req">
        
        Your request is private & Confidential
        
        <ul>
        
        <li>No Hidden Fees or Obligations</li>
        <li>Strictly Confidential</li>
        <li>It's Fast and Free</li>
        
        </ul>
        
        </div>
		
      </div>
	  </div>
	  <div class="contact_bottom"></div>

	</form>
	
   
   
	</div>
	
    <!--contact panel ends here-->
  </div>
	  
   <!--   <img src="images/bottom-round.png" alt="bottom-round" />-->
   <img src="images/banner-right.png" alt="banner-right" class="banner-left" />
    </div>
    <?php } else { ?>
	<img src="images/banner-left2.png" alt="banner-left" class="banner-left" />
   <div class="banner-middle" style="height:422px;">
    <!--banner-section-left start here-->
    <div class="banner-section-left">
	  
	  
	 <div id="wrapper">
        <div class="slider-wrapper theme-default bg-cont">
            <div id="slider" class="nivoSlider">
                <img src="images/image21.png" alt="" />
				<!--<img src="images/image3.jpg" alt="" />-->
                <!--<img src="images/image6.jpg" alt="" />-->
                <img src="images/image9.jpg" alt="" />
                <!--<img src="images/image12.jpg" alt="" />-->
                <img src="images/image15.jpg" alt="" />
                <img src="images/image18.jpg" alt="" />
                <!--<img src="images/image21.jpg" alt="" />-->
                <img src="images/image24.jpg" alt="" />
            </div>
        </div>
    </div>
	  
	  
    </div>
	
	
    <!--banner-section-left ends here-->
    <!--contact panel start here-->
  
    <div class="contact-panel-down">
      <!--title-bg start here-->
      <div class="title-bg"><?php echo $page; ?></div>
      <!--title-bg endss here-->
    </div>
	 </div>
	 <img src="images/banner-right2.png" alt="banner-right" class="banner-left" />
    <?php } ?>
    <!--contact panel ends here-->
  </div>
 <!-- <img src="images/banner-right.png" alt="banner-right" class="banner-left" />--> 
<!--banner ends here-->
<div class="clr"></div>
<?php include "include/attornpopup.php" ?>

<!--  SERGIO SMITH ADWORDS - ACCOUNT ISN'T USED FOR ADWORDS ANYMORE  -  REPLACED CODE WITH DUAL CODING ABOVE ON 5-29-12
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26086714-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
-->


<!-- CRAZY EGG SCRIPT FOR HEAT MAP -->
<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName('script')[0];
a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0012/6447.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>
