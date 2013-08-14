// JavaScript Document
function validateLogin(){
if(isEmpty(document.getElementById('adminname').value)){
	if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
document.getElementById('error').style.display='';
document.getElementById('error').innerHTML='<center><font color="red">Please Enter Username</font></center>';
return false;
}
else if(isEmpty(document.getElementById('adminpass').value)){
	if(document.getElementById('server_error_msg'))
		document.getElementById('server_error_msg').style.display='none';
document.getElementById('error').style.display='';
document.getElementById('error').innerHTML='<center><font color="red">Please Enter Password</font></center>';
return false;
}
else{
return true;
}
 }