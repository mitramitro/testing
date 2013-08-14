// JavaScript Document
function CheckIt(){
   if(isEmpty(document.getElementById('forgot_email').value)){
	if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
	document.getElementById('error').style.display='';
	document.getElementById('error').innerHTML='Please Enter Email Address.';
	document.getElementById('forgot_email').focus();
   return false;
   }
   else if(!isEmail(document.getElementById('forgot_email').value)){
	if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
    document.getElementById('error').style.display='';
	document.getElementById('error').innerHTML='Please Enter Valid Email Address.';
    
  }
    else{
	  document.forgot_pass.submit();
	}
}

function CheckchangePass(){
   if(isEmpty(document.getElementById('curr_pass').value)){
	  if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
	   
	    document.getElementById('error').style.display='';
	    document.getElementById('error').innerHTML='Please Enter Your Current Password.';
		document.getElementById('curr_pass').focus();
     return false;
    }

    else if(isEmpty(document.getElementById('new_pass').value)){
	  if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
		document.getElementById('error').style.display='';
		document.getElementById('error').innerHTML='Please Enter New Password.';
		document.getElementById('new_pass').focus();
		return false;
  }

   else if(isEmpty(document.getElementById('confirm_pass').value)){
	  if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
		document.getElementById('error').style.display='';
		document.getElementById('error').innerHTML='Please Confirm New Password.';
		document.getElementById('confirm_pass').focus();
		return false;
  }
  
  else{
	  document.change_pasword.submit();
	}
}
	