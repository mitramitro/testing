function checkPass(){

	if(isEmpty(getObject('curr_pass').value)){
		if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
		var errMsg="Old Password cannot be empty.";
		getObject('errorMsg').style.display = "";	
		getObject('errorMsg').innerHTML	= errMsg;
		setFocus('curr_pass');	
		return false;
	}
	else if(!isPassword(getObject('curr_pass').value)){
		if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
		var errMsg="Old Password can contain (a-z)(0-9)(_)(-)";
		getObject('errorMsg').style.display = "";
		getObject('errorMsg').innerHTML	= errMsg;
		setFocus('curr_pass');
		return false;
	}else{
		if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
		unsetAlertStyle('curr_pass');	
		getObject('errorMsg').style.display = "none";		
		getObject('errorMsg').innerHTML	= "";
	}	
	
	
	// password check
	if(isEmpty(getObject('new_pass').value)){
		if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
		var errMsg="New Password cannot be empty.";
		getObject('errorMsg').style.display = "";	
		getObject('errorMsg').innerHTML	= errMsg;
		setFocus('new_pass');	
		return false;
	}
	else if(!isPassword(getObject('new_pass').value)){
		if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
		var errMsg="New Password can contain (a-z)(0-9)(_)(-)";
		getObject('errorMsg').style.display = "";
		getObject('errorMsg').innerHTML	= errMsg;
		setFocus('new_pass');
		return false;
	}else{
		
		if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
		unsetAlertStyle('new_pass');	
		getObject('errorMsg').style.display = "none";		
		getObject('errorMsg').innerHTML	= "";
	}
	
	// confirm password
	if(isEmpty(getObject('confirm_pass').value)){
		if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
		var errMsg="Confirm Password cannot be empty.";
		getObject('errorMsg').style.display = "";	
		getObject('errorMsg').innerHTML	= errMsg;
		setFocus('confirm_pass');	
		return false;
	}
	else if(!isPassword(getObject('confirm_pass').value)){
		if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
		var errMsg="New Password can contain (a-z)(0-9)(_)(-)";
		getObject('errorMsg').style.display = "";
		getObject('errorMsg').innerHTML	= errMsg;
		setFocus('confirm_pass');
		return false;
	}	
	else{
		if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
		unsetAlertStyle('confirm_pass');	
		getObject('errorMsg').style.display = "none";		
		getObject('errorMsg').innerHTML	= "";
	}
	
	// confirm password
	if(getObject('new_pass').value!=getObject('confirm_pass').value){
		if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
		var errMsg="The passwords does not match, please re-enter and try again.";
		getObject('errorMsg').style.display = "";	
		getObject('errorMsg').innerHTML	= errMsg;
		setFocus('confirm_pass');	
		return false;
	} else{
		if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
		unsetAlertStyle('confirm_pass');	
		getObject('errorMsg').style.display = "none";		
		getObject('errorMsg').innerHTML	= "";
	}
	 
	return true; 

}	