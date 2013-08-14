<?php $base_url	= 'http://192.168.0.24/casino/'; ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> Gambling prophet </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/style.css" type="text/css"/>
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/nivo-slider.css" type="text/css"/> 
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/style_1.css" type="text/css"/>
  

  
<!-- --------------popup script starts------------------------> 
<script src="<?php echo $base_url;?>scripts/jquery.min.js"></script>
<link href="<?php echo $base_url;?>css/pop-up.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $base_url;?>scripts/jquery.bpopup-0.7.0.min.js"></script>
<script type="application/javascript">
function btn_close()
{
	
$('#registrationpopup').hide();	
	
}

$(document).ready(function(){
	
})

function login_close()
{
	
$('#popup').hide();	
	
}
function forgotbtn_close()
{
	$('#Forgotpwdpopup').hide();	
	
}
</script>

<!--<script type="text/javascript">
	    // Semicolon (;) to ensure closing of earlier scripting
    // Encapsulation
    // $ is assigned to jQuery
    (function($) {

         // DOM Ready
        $(function() {



            // Binding a click event
            // From jQuery v.1.7.0 use .on() instead of .bind()
            $('#my-button').bind('click', function(e) {

                // Prevents the default action to be triggered. 
                e.preventDefault();

                // Triggering bPopup when click event is fired
                $('#popup').bPopup();

            });
			///////////////Registration popup////////////////
			
			     $('#my-Registrationbtn').bind('click', function(e) {
                  
                // Prevents the default action to be triggered.
				 
                e.preventDefault();
				
                // Triggering bPopup when click event is fired
                $('#registrationpopup').bPopup();
				
            });
			///////////////////////////////
			//////////////////////////////
			$('#signuppopup').bind('click',function(e) {
                  
                // Prevents the default action to be triggered.
				 
                e.preventDefault();
				
                // Triggering bPopup when click event is fired
				$('#registrationpopup').show();
				$('#popup').hide();
				
				
            });
			
			//////////////////////////////
			$('#login1').bind('click', function(e) {

                // Prevents the default action to be triggered. 
                e.preventDefault();

                // Triggering bPopup when click event is fired
				$('#registrationpopup').hide();
                $('#popup').show();
				

            });
			//////////////////////////////
			$('#forgot_pwd').bind('click',function(e) {
                  
                // Prevents the default action to be triggered.
				 
                e.preventDefault();
				
                // Triggering bPopup when click event is fired
				$('#Forgotpwdpopup').show();
				$('#popup').hide();				
				
            });
			
			//////////////////////////////
		

        });

    })(jQuery);
	
	</script>-->
    
    
    
    <script type="text/javascript">
	    // Semicolon (;) to ensure closing of earlier scripting
    // Encapsulation
    // $ is assigned to jQuery
    (function($) {

         // DOM Ready
        $(function() {



            // Binding a click event
            // From jQuery v.1.7.0 use .on() instead of .bind()
            $('#my-button').bind('click', function(e) {

                // Prevents the default action to be triggered. 
                e.preventDefault();

                // Triggering bPopup when click event is fired
                $('#popup').bPopup();

            });
			///////////////Registration popup////////////////
			
			     $('#my-Registrationbtn').bind('click', function(e) {
                  
                // Prevents the default action to be triggered.
				 
                e.preventDefault();
				
                // Triggering bPopup when click event is fired
                $('#registrationpopup').bPopup();
				
            });
			///////////////////////////////
			//////////////////////////////
			$('#joinnowpopup').bind('click',function(e) {
                  
                // Prevents the default action to be triggered.
				 
                e.preventDefault();
				
                // Triggering bPopup when click event is fired
				$('#popup').bPopup().close();
				$('#registrationpopup').bPopup();
				
			
            });
			
			//////////////////////////////
			$('#login1').bind('click', function(e) {

                // Prevents the default action to be triggered. 
                e.preventDefault();

                // Triggering bPopup when click event is fired
				$('#registrationpopup').bPopup().close();
				$('#popup').bPopup();
				
				

            });
			//////////////////////////////
			$('#forgot_pwd').bind('click',function(e) {
                  
                // Prevents the default action to be triggered.
				 
                e.preventDefault();
				
                // Triggering bPopup when click event is fired
				$('#Forgotpwdpopup').show();
				$('#popup').hide();				
				
            });
			
			//////////////////////////////
		

        });

    })(jQuery);
	
	</script>
    
	<style>
    #popup { display:none; }
    #registrationpopup { display:none; }
	#Forgotpwdpopup{display:none;}
	.login23
	{
		padding-left:11px;padding-top:11px;padding-bottom:11px; background-color:#C60000; color:#FFFFFF; font-size:12px; font-size:18px
	}
    </style>
  
  <!-- --------------popup script ends------------------------> 
 </head>
 <body>
 
 <!---->
 
 <?php  
	
	$username='';
	$password='';
	$checked='';
	if(isset($_COOKIE['cookname']))
	{
	   $username = $_COOKIE['cookname'];
       $password = base64_decode($_COOKIE['cookpass']);
       $checked  = 1;
	}
	else
	{
	 $username = "Username";
	 $password = "Password";
	}
?>
 <!---->

 
<!-- ------------pop-up-code starts here------------->
 <div id="popup">
       
       <!-- <span class="button bClose"><span><img src="images/corss_btn.png" alt="" width="42" height="40" border="0"  onclick="login_close()"/></span></span>-->
        
          <span class="button bClose"><span><img src="<?php echo $base_url;?>images/corss_btn.png" alt="" width="42" height="40" border="0"  onclick="login_close()"/></span></span>
        

 <form action="<?php echo site_url("login/go")?>" id="logForm" method="post"> 

        <div id="pop_wraper" style="height:auto;">
      
       <div class="login23">Login</div>
       <div style="clear:both;"></div>
       
        <div id="form_message"></div>
		<div id="user_name_cont1" style=" float: right;
    height: auto;
    margin: 3px 5px 0 0;
    width: 473px;">
        
        <div id="emptyerror" style="color: red; margin: auto; padding: 12px; width: 410px;"></div>
        
		<div id="enter_username">
        <div class="enter_left_bg"></div>
       <input name="username" id="username1" type="text" class="enter_middle_bg" value="<?php echo $username; ?>" onfocus="if(this.value=='Username'){this.value='';}" onblur="if(this.value==''){this.value='Username';}" />
		<div class="enter_right_bg"></div>
        </div>
        
        <div class="clear"></div>
        
        <div id="second_username">
        <div class="enter_left_bg"></div>
       <input name="password" id="password1" type="text" class="enter_middle_bg" value="<?php echo $password; ?>" onfocus="if(this.value=='Password'){this.value='';}" onblur="if(this.value==''){this.value='Password';}" />
		<div class="enter_right_bg"></div>
        </div>
        
        <div class="clear"></div>
        
		<div class="rember">
        <h2 style="padding:21px 9px 0 0;"><a href="#" id="forgot_pwd">Forgot password</a></h2>
         <p style="float:left; width:310px;padding-top: 7px; color:#FF0000; font-size:13px;">
         <input type="checkbox" name="remember" id="remember" value="1" <?php if($checked=='1') { echo 'checked'; }?>/>	
    &nbsp; <label for="remember">Remember Me</label>
    
    
    </p>
        </div>
        <div class="clear"></div>
        
        
         <div class="sign_in_btn"><a href="#" id="submitlogin"><img src="<?php echo $base_url;?>images/sign_in_btn.png" alt="" width="82" height="38" border="0" /></a></div>
        
      <!--  <input type="submit" value="Login" name="login" class="submit" />
        <div class="sign_in_btn"><a href="#"><img src="images/sign_in_btn.png" alt="" width="82" height="38" border="0" /></a></div>-->
         <div class="clear"></div>
          <h5>Not a Member  yet ?  <a href="#" id="joinnowpopup">join Now !</a></h5>
        <a href="<?php echo $base_url.'main/facebook_request';?>" id="signuppopup" ><img src="<?php echo $base_url;?>images/fbconnect.gif" alt="" width="64" height="20" border="0" /></a>
        </div>
        
        
        </div>
        
        </form>
        
        </div>
       
        
        
        

 </div>


  
  <style>.messagebox{
 position:absolute;
 width:100px;
 margin-left:30px;
 border:1px solid #c93;
 background:#ffc;
 padding:3px;
}
.messageboxok{
 position:absolute;
 width:auto;
 margin-left:30px;
 border:1px solid #349534;
 background:#C9FFCA;
 padding:3px;
 font-weight:bold;
 color:#008000;
}
.messageboxerror{
 position:absolute;
 width:auto;
 margin-left:30px;
 border:1px solid #CC0000;
 background:#F7CBCA;
 padding:3px;
 font-weight:bold;
 color:#CC0000;
}


table
{
font-size: 12px;
font-family: Verdana;
}

.object_ok
{

color: #333333; 
}

.object_error
{

color: #333333; 
}

/* Input */
input
{
margin: 5 5 5 0;
padding: 2px; 

border: 1px solid #999999; 
border-top-color: #CCCCCC; 
border-left-color: #CCCCCC; 

color: #333333; 

font-size: 13px;
-moz-border-radius: 3px;
}

#submit5
{
background:url(/images/registration.png)repeat scroll center center transparent;
width:102px;height:38px;
}

</style>

 <!-- ------------pop-up-code ends here------------->
 <!-- ------------Registration pop-up-code starts here------------->
 <div id="registrationpopup" style="left: 388px; position: absolute; top: 20px; z-index: 9999; display: none;">

        <span class="button bClose"><span><img src="<?php echo $base_url;?>images/corss_btn.png" alt="" width="42" height="40" border="0" onclick="btn_close();"/></span></span> 
        <!--<span class="button bClose"><span><img src="images/corss_btn.png" alt="" width="42" height="40" border="0" onclick="btn_close();"/></span></span>-->
        
        
     
        
 
 <form action="<?php echo site_url('login/register');?>" id="myForm"  method="post">

    <div id="pop_registration">
      
    
    
      <div class="login23">Sign Up</div>
       <div style="clear:both;"></div>
         <div style=" color: red;
    margin: auto;
    font-size:15px;   
    width: 430px;" id="emailconfirm"></div>
       
       
       <div style="color: red; margin: auto; padding: 12px; width: 493px; text-align: center;" id="ack"></div>
		<div id="user_name_cont">
        
		<div id="enter_username">
        <div class="enter_left_bg"></div>
       <input name="email" id="email" type="text" class="enter_middle_bg" value="Email" onfocus="if(this.value=='Email'){this.value='';}" onblur="if(this.value==''){this.value='Email';}" />
		<div class="enter_right_bg"></div>
        </div>
        
        
        <div class="clear"></div>
        
 
      
        
        <div id="second_username">
        <div class="enter_left_bg"></div>
      <input name="username" id="username" type="text" class="enter_middle_bg" value="Username" onfocus="if(this.value=='Username'){this.value='';}" onblur="if(this.value==''){this.value='Username';}" />
     <span id="usr_verify" class="verify"></span>	
		<div class="enter_right_bg"></div>
        <div style="float:left;" id="status"></div>
        </div>
        
        <div class="clear"></div>
        <div id="second_username">
        <div class="enter_left_bg"></div>
       <input name="password" id="password" type="text" class="enter_middle_bg" value="Password" onfocus="if(this.value=='Password'){this.value='';}" onblur="if(this.value==''){this.value='Password';}" />
		<div class="enter_right_bg"></div>
        </div>
        
        
    
        
        <div class="clear"></div>
        	
		<div class="rember">
      
         <div class="sign_in_btn"><a href="#" id="submit5"><img src="images/registration.png" alt="" width="82" height="38" border="0" /></a></div>
         </div>
         
        
         <div class="clear"></div>
          <h5>You are a member?  <a href="#" id="login1">Login !</a></h5>
        
        </div>
        
        
        </div>
        </form>
        </div>
        
        
       
  
  <div id="Forgotpwdpopup" style="left: 383px; position: absolute; top: 20px; z-index: 9999; display:none; ">

       
        <span class="button bClose"><span><img src="<?php echo $base_url;?>images/corss_btn.png" alt="" width="42" height="40" border="0" onclick="btn_close();"/></span></span>


        <div id="pop_forgetpwd">
      <div class="login23">Forgot Password</div>
       <div style="clear:both;"></div>
		<div id="user_name_cont">
		<div id="enter_username">
        <div class="enter_left_bg"></div>
       <input name="" type="text" class="enter_middle_bg" value="Email" onfocus="if(this.value=='Email'){this.value='';}" onblur="if(this.value==''){this.value='Email';}" />
		<div class="enter_right_bg"></div>
        </div>
        
		<div class="rember">
         <div class="sign_in_btn"><a href="#"><img src="<?php echo $base_url;?>images/forget_pwd.png" alt="" width="82" height="38" border="0" /></a></div>
         <div class="clear"></div>
                 
        </div>
        
        
        </div>
        
        
        </div>
        



</div>
 <!-- ------------pop-up-code ends here------------->
 <!--  starts forgot password popup-->

 <!--  Ends forgot password popup-->
 
 
  <!--header_section start here-->
 <div id="header_section">
 <!--header_inner start here-->
 <div class="logo_cont">
 <div class="top_logo_cont"> 
 <div class="logo"><a href="#"><img src="<?php echo $base_url;?>images/logo.png" width="256" height="79"  alt="img"  border="0"/></a></div>
 
 <div class="top_choose_lang">
 <div class="tp-flags">
 <h4>CHOOSE LANGUAGE :</h4>
 <a href="#"><img src="<?php echo $base_url;?>images/top_flag_1.png" width="26" height="18" alt="" class="pad-flag" border="none" /></a>
 <a href="#"><img src="<?php echo $base_url;?>images/top_flag_2.png" width="26" height="18" alt="" class="pad-flag" border="none" /></a>
  <a href="#"><img src="<?php echo $base_url;?>images/top_flag_3.png" width="26" height="18" alt="" class="pad-flag"border="none" /></a>
   <a href="#"><img src="<?php echo $base_url;?>images/top_flag_4.png" width="26" height="18" alt="" class="pad-flag" border="none" /></a>
    <a href="#"><img src="<?php echo $base_url;?>images/top_flag_5.png" width="26" height="18" alt="" class="pad-flag" border="none" /></a>
      <a href="#"><img src="<?php echo $base_url;?>images/top_flag_6.png" width="26" height="18" alt="" class="pad-flag"border="none" /></a>
        <a href="#"><img src="<?php echo $base_url;?>images/top_flag_7.png" width="26" height="18" alt="" class="pad-flag" border="none" /></a>
        
        </div>
        
        <div class="create-acc-text"><a id="my-button" href="#">Sign In</a> or <a id="my-Registrationbtn" href="#">Register</a></div>
 </div>
 
 <div class="search-pennel">
   <input class="input-search" name="search" type="text">
   <input class="search-top-btn" name="search-btn" type="button">
   
   
   </div>
 
 </div> 
 <div class="clear"></div>
 
   <div class="nav-search-section">
  
  <!--navi css start here-->
  
  <div class="navi">
  <ul>
 <li><a href="http://192.168.0.24/casino/casino/view/mypage">Home</a></li>
  <li><a href="http://192.168.0.24/casino/casino/view/bingo">Bingo</a></li>
  <li><a href="http://192.168.0.24/casino/casino/view/poker">Poker</a></li>
  <li><a href="http://192.168.0.24/casino/casino/view/scratch_cards">Scratch Cards</a></li>
  <li><a href="http://192.168.0.24/casino/new_casino/">New Casino</a></li>
  <li><a href="http://192.168.0.24/casino/casino/view/usa_play">USA Play</a></li>
   <li><a href="http://192.168.0.24/casino/crap">Craps</a></li>
    <li><a href="http://192.168.0.24/casino/blog">Blog</a></li>
  <!-- <li><a href="#">Live Casino</a></li> --> 
   <li><a href="http://192.168.0.24/casino/blog">Blog</a></li>  
     
  </ul>
  
  
  
  </div>
  
   <!--navi css ends here-->
   
   
  </div>
 </div> 
 
<?php /*?><?php  echo $this->breadcrumb->output();?>
<?php */?> 
 
  <!--header_section ends here-->
 
  <div style="clear:both"></div>
  </div>
        



<style>
#form_message{
  display:none;
  text-align:center;

  padding:10px;
  color:red;
}
</style>
<script>
//$(document).ready(function() {
//    /// make loader hidden in start
//    $('#Loading').hide();    
// 
//    $('#email').blur(function(){
//	
//	var a = $("#email").val();
//	var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
//       // check if email is valid
//	if(filter.test(a)){
//	alert(1);
//	
//                // show loader 
//		
//		
//		
//		}
//		
//		else {
//		 $("#ack").css('background-color','#FFEBE8');
//	  $("#ack").html("email are not valid . please enter correct email");
//		}
//		
//		return false;
//	})
//
//});
//
//
//
//</script>
<script>
$(document).ready(function() {
    /// make loader hidden in start
    $('#Loading').hide();    
 
    $('#email').blur(function(){
	
	var a = $("#email").val();
	var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
       // check if email is valid
	if(filter.test(a)){
	 $("#ack").hide();
                // show loader 
		$('#Loading').show();
		$.post("<?php echo $base_url?>index.php/login/check_email_availablity", {
			email: $('#email').val()
		}, function(response){
                        //#emailInfo is a span which will show you message
			$('#Loading').hide();
			setTimeout("finishAjax('Loading', '"+escape(response)+"')", 400);
			
		});
		
		
		return false;
	}
	
	else {
		 $("#ack").css('background-color','#FFEBE8');
	  $("#ack").html("Email are not valid . Please enter correct Email");
	 
		}
		
	
});
});

function finishAjax(id, response){
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}

</script>
<script>
 $("#submit5").click( function() {
 
	var a = $("#email").val();
	var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;

	if(($("#username").val() == "") || ($("#username").val() == "Username") || (($("#password").val() == "Password" )|| ($("#password").val() == "" )))
	  {
	  $("#ack").css('background-color','#FFEBE8');
	  $("#ack").html("Username/Password are mandatory fields -- Please Enter.");
	}
	else if(filter.test(a)){
	  $.post( $("#myForm").attr("action"),
	         $("#myForm :input").serializeArray(),
			 function(info) {
                 
			   $("#ack").empty();
			   
			   $("#user_name_cont").hide();
			    $("#emailconfirm").css('background-color','#FFEBE8');
			    $("#emailconfirm").css("padding", "15px");
			   
			   $("#emailconfirm").html("Your Confirmation link Has Been Sent To Your Email Address");
			   window.setTimeout(function(){location.reload()},3000)
			   //window.location.reload();
			   //$("#ack").html(info);
				clear();
			 });
 
	$("#myForm").submit( function() {
	   return false;	
	});
	}
});
 
function clear() {
 
	$("#myForm :input").each( function() {
	      $(this).val("");
	});
 
}
</script>
<script>
$(document).ready(function(){

  
  $("#submitlogin").click( 
  
  
    function(){
    
        var username=$("#username1").val();
        var password=$("#password1").val();
		
		 if ($('#remember').is(':checked')) {
        var remember = $('#remember').val()
    } 
	else
	{
	var remember ='0';
	}
   
        $.ajax({
        type: "POST",
        url: "<?php echo $base_url;?>index.php/login/go",  
        dataType: "json",
        data: "username="+username+"&password="+password+"&remember="+remember,
        cache:false,
        success: 
          function(data){
			  var q=$("#form_message").html(data.message).show();
			  
			 
            $("#form_message").html(data.message).css({'background-color' : data.bg_color}).fadeIn('slow');
			 var msg=$("#form_message").html();
			 if(msg=='LOGIN SUCCESSFULLY')
			 {
				 window.setTimeout(function(){location.reload()},3000)
			 } 
          }
        
        });

      return false;

    });
  

});

</script>




<style>.verify
{
    margin-top: 4px;
    margin-left: 9px;
    position: absolute;
    width: 35px;
    height: 35px;
}
#breadcrumb{

    float: left;
    padding-left: 184px;
    padding-top: 27px;

}
</style>
<script type="text/javascript" src="jquery-1.2.6.min.js"></script>
 
<link rel="stylesheet" type="text/css" href="style.css" />

<SCRIPT type="text/javascript">
<!--
/*
Credits: Bit Repository
Source: http://www.bitrepository.com/web-programming/ajax/username-checker.html 
*/

pic1 = new Image(16, 16); 
pic1.src = "loader.gif";

$(document).ready(function(){

$("#username").change(function() { 

var usr = $("#username").val();

if(usr.length >= 4)
{
$("#status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');

    $.ajax({  
    type: "POST",  
    url: "<?php echo $base_url;?>index.php/login/check_user",  
    data: "username="+ usr,  
    success: function(msg){  
   
   $("#status").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#username").removeClass('object_error'); // if necessary
		$("#username").addClass("object_ok");
		$(this).html('&nbsp;<img src="tick.gif" align="absmiddle">');
	}  
	else  
	{  
		$("#username").removeClass('object_ok'); // if necessary
		$("#username").addClass("object_error");
		$(this).html(msg);
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#status").html('<font color="red">The username should have at least <strong>4</strong> characters.</font>');
	$("#username").removeClass('object_ok'); // if necessary
	$("#username").addClass("object_error");
	}

});

});

//-->
</SCRIPT>




 
<div class="clear"></div>