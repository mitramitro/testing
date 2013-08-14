// JavaScript Document
//ajax validation
$(document).ready(function(){
	$("#showpassword").show();
	$("#password").hide();
	$("#showpassword").focus(function(){
		$("#showpassword").hide();
		$("#password").show();
		$("#password").focus();
	});
	$("#password").blur(function(){
		if($("#password").val()=='')
		{
			$("#password").hide();
		$("#showpassword").show();
		}
		
		});
});


/*$(document).ready(function(){
	$("#email").blur(function(){
		//alert(6);
		var flag='1';
			var elefocus='';
			var str='true';
		var email=$("#email").val();
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				  if( !emailReg.test( email ) ) {
					 str='false';
				 	$('#email').css('color', "red");
				  $('#email').val('Valid Email Address *');
				  }
			 	  if(elefocus=='')
			  			 {
				 		 elefocus='#email';
			 		}	
			 	flag='0'; 
				
	       		//return false;
			if(str=='true')
				{//alert(5);
		$.get("<?php echo base_url();?>register/check_email_availablity",{email:email},function(result){
			$("#emailerror").html(result);
		});
				}
				
	});
	
});

$(document).ready(function(){
	$("#username").keyup(function(){
		//alert(6);
		var username=$("#username").val();
		if(username.length>=4)
		{
		  $.get("<?php echo base_url();?>register/check_user",{username:username},function(result){
			  $("#usererror").html(result);
			});
		}
		else
		{
			//alert(6);
			$("#usererror").html('Username should have at least <strong>4</strong> characters.');
			//$("#username").removeClass('object_ok'); // if necessary
			//$("#username").addClass("object_error");
		}
		
	});
	
});*/
//end ajax validation


function validate_reg(){
		
			//alert(5);
			var email=username=password=cpassword=gender=country=state=city=newcaptcha='';
			var flag='1';
			var elefocus='';
			//var challengeField = $("input#recaptcha_challenge_field").val();
			//captcha
				
//console.log(challengeField);
//console.log(responseField);
//return false;
			/*$(document).ready(function(){
				$("#myform").click(function(){
					challengeField = $("input#recaptcha_challenge_field").val();
					responseField = $("input#recaptcha_response_field").val();
					//alert(challengeField);
					$.get("<?php echo site_url('Login/check_captcha');?>",{challengeField:challengeField,responseField:responseField},function(result){
						$("#captchaStatus").html(result);
					});
					});
			
			});*/
			
			//end captcha
			
			
			email=$("#email").val();
			if(email=='Valid Email Address *')
			{		
				email='';
			}
			if(email=='')
			{
			  $('#email').css('color', "red");
			  $('#email').val('Valid Email Address *');
			  if(elefocus=='')
			  {
				  elefocus='#email';
			  }	
			  flag='0';
			}		
			/*else
			{
					var elefocus='';
					var flag='1';
			      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				  if( !emailReg.test( email ) ) {
				 	 $('#email').css('color', "red");
				 	 $('#email').val('Valid Email Address *');
				  }
			 	  if(elefocus=='')
			  		 {
				 		 elefocus='#email';
			 		 }	
			 	 flag='0'; 
				// alert(3); 
	       		//return false;
	    	} */
			if(email!='')
			{
				$('#email').css('color', "#000000");
			}
			
			username=$("#username").val();
			if(username=='Enter Username *')
			{		
				username='';
			}
			if(username=='')
			{
			  $('#username').css('color', "red");
			  $('#username').val('Enter Username *');
			  if(elefocus=='')
			  {
				  elefocus='#username';
			  }	
			  flag='0';
			}
			
			
			if(username!='')
			{
				$('#username').css('color', "#000000");
			}
			
			password=$("#password").val();
			/*if(password=='')
			{
				  $('#perror').show(); 
				  $('#perror').html('Enter Password *');
				  if(elefocus==''){
			      elefocus='#password';}	
			      flag='0';
			}*/
			if(password=='')
			{
				   $('#showpassword').css('color', "red");
			  		$('#showpassword').val('Enter Password *');
			 		 if(elefocus=='')
			  		 {
						  elefocus='#showpassword';
			 		 }	
			  flag='0';
			}
			
			
			if(password!=''){
				$('#perror').hide();
			}
			cpassword=$("#cpassword").val();
			if(password!=cpassword)
			{
				 	$('#cperror').show(); 
				    $('#cperror').html('Password Does Not Match *');
				    if(elefocus==''){
			        elefocus='#cpassword';}	
			        flag='0';
			}
			if(password==cpassword){
			$('#cperror').hide();
		}
		
			gender=$("#gender").val();
			if(gender=='--Select Gender--')
			{		
				gender='';
			}
			if(gender=='')
			{
			  $('#gender').css('color', "red");
			  $('#gender').val('--Select Gender--');
			  if(elefocus=='')
			  {
				  elefocus='#gender';
			  }	
			  flag='0';
			}
			if(gender!='')
			{
				$('#gender').css('color', "#000000");
			}
			
			country=$("#country").val();
			
			if(country=='')
			{
			  $('#country').css('color', "red");
			  $('#country').val('--Country--');
			  if(elefocus=='')
			  {
				  elefocus='#country';
			  }	
			  flag='0';
			}
			if(country!='')
			{
				$('#country').css('color', "#000000");
			}
			
			/*state=$("#state").val();
			if(state=='')
			{
			  $('#state').css('color', "red");
			  $('#state').val('--State--');
			  if(elefocus=='')
			  {
				  elefocus='#state';
			  }	
			  flag='0';
			}
			if(state!='')
			{
				$('#state').css('color', "#000000");
			}
			
			city=$("#city").val();
			if(city!='')
			{
				$('#city').css('color', "#000000");
			}
			if(city=='')
			{
			  $('#city').css('color', "red");
			  $('#city').val('--City--');
			  if(elefocus=='')
			  {
				  elefocus='#city';
			  }	
			  flag='0';
			}*/
			//alert(4);
			if(flag=='0')
		{
			$(elefocus).focus();
			//alert(5);
			return false;
		}
		//alert(6);
		//$.post( $("#myform").attr("action"),
	   // $("#myform :input").serializeArray();
		//$(myform).submit();	
		$("#myform").submit();
		//document.forms["myform"].submit();


		
	}
				
	function check_pass()
	{
		//var challengeField = $("input#recaptcha_challenge_field").val();
		var password='';
		var cpassword='';
		var flag='1';
		var elefocus='';
			password=$("#password").val();
			cpassword=$("#cpassword").val();
			
			if(password==cpassword){
			$('#cperror').hide();
		}
			if(password!=cpassword)
			{
				 	$('#cperror').show(); 
				    $('#cperror').html('Password Does Not Match *');
				    if(elefocus==''){
			        elefocus='#cpassword';}	
			        flag='0';
			}
			
		
	}
	function change_uval()
	{
		var username;
		username=$("#username").val();	
		if(username!='')
		{
			$('#username').css('color', "#000000");
		}	
	}
	function change_eval()
	{
		var email='';
		email=$("#email").val();
		//alert(email);
		/*if(email=="Valid Email Address *")
		{
			email="";	
		}*/	
		if(email!='')
		{
			$('#email').css('color', "#000000");
		}
		
		
	}
	function change_val()
	{
		//alert(5);
		var email=username=password=cpassword=gender=country=state=city='';
		email=$("#email").val();
		//alert(email);
		/*if(email=="Valid Email Address *")
		{
			email="";	
		}*/	
		/*if(email!='')
		{
			$('#email').css('color', "#000000");
		}
		
		username=$("#username").val();	
		if(username!='')
		{
			$('#username').css('color', "#000000");
		}	*/
		password=$("#password").val();
		if(password!=''){
				$('#perror').hide();
			}
		cpassword=$("#cpassword").val();
			if(password==cpassword){
			$('#cperror').hide();
		}
		gender=$("#gender").val();
		if(gender!='')
		{
			$('#gender').css('color', "#000000");
		}
		country=$("#country").val();
		if(country!='')
		{
			$('#country').css('color', "#000000");
		}
		/*state=$("#state").val();
		if(state!='')
		{
			$('#state').css('color', "#000000");
		}
		city=$("#city").val();
		if(city!='')
		{
			$('#city').css('color', "#000000");
		}*/
		
	}
	//call login function
	function validate_login(){
		
			//alert(5);
			var username=password='';
			var flag='1';
			var elefocus='';
			//var challengeField = $("input#recaptcha_challenge_field").val();
			//captcha
				
//console.log(challengeField);
//console.log(responseField);
//return false;
			/*$(document).ready(function(){
				$("#myform").click(function(){
					challengeField = $("input#recaptcha_challenge_field").val();
					responseField = $("input#recaptcha_response_field").val();
					//alert(challengeField);
					$.get("<?php echo site_url('Login/check_captcha');?>",{challengeField:challengeField,responseField:responseField},function(result){
						$("#captchaStatus").html(result);
					});
					});
			
			});*/
			
			//end captcha
			
			
			
			username=$("#username").val();
			if(username=='Enter Username *')
			{		
				username='';
			}
			if(username=='')
			{
			  $('#username').css('color', "red");
			  $('#username').val('Enter Username *');
			  if(elefocus=='')
			  {
				  elefocus='#username';
			  }	
			  flag='0';
			}
			
			
			if(username!='')
			{
				$('#username').css('color', "#000000");
			}
			
			password=$("#password").val();
			/*if(password=='')
			{
				  $('#perror').show(); 
				  $('#perror').html('Enter Password *');
				  if(elefocus==''){
			      elefocus='#password';}	
			      flag='0';
			}*/
			if(password=='')
			{
				   $('#showpassword').css('color', "red");
			  		$('#showpassword').val('Enter Password *');
			 		 if(elefocus=='')
			  		 {
						  elefocus='#showpassword';
			 		 }	
			  flag='0';
			}
			if(password!=''){
				$('#perror').hide();
			}
		
			/*state=$("#state").val();
			if(state=='')
			{
			  $('#state').css('color', "red");
			  $('#state').val('--State--');
			  if(elefocus=='')
			  {
				  elefocus='#state';
			  }	
			  flag='0';
			}
			if(state!='')
			{
				$('#state').css('color', "#000000");
			}
			
			city=$("#city").val();
			if(city!='')
			{
				$('#city').css('color', "#000000");
			}
			if(city=='')
			{
			  $('#city').css('color', "red");
			  $('#city').val('--City--');
			  if(elefocus=='')
			  {
				  elefocus='#city';
			  }	
			  flag='0';
			}*/
			//alert(4);
			if(flag=='0')
		{
			$(elefocus).focus();
			//alert(5);
			return false;
		}
		//alert(6);
		//$.post( $("#myform").attr("action"),
	   // $("#myform :input").serializeArray();
		//$(myform).submit();	
		$("#loginform").submit();
		//document.forms["myform"].submit();


		
	}