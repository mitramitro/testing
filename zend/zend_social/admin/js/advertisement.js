function validateAdvertisement(){
  
	for (var i=0; i<document.frmAdver.radType.length; i++)  {
	
		if (document.frmAdver.radType[i].checked)  {
	
			 radvalue = document.frmAdver.radType[i].value //set found_it equal to checked button's value
	
		} 
	
	}
   if(radvalue == '2'){
		file = document.getElementById('banner').value;
		if(file!=''){
			size = file.length -4;
			ext =  file.substring(size) ;
			if(ext != ".gif" && ext != ".jpeg" && ext != ".png" && ext != ".jpg" && ext != ".GIF" && ext != "JPEG" && ext != ".PNG" && ext != ".JPG")
			{
				if(document.getElementById('server_error_msg'))
				document.getElementById('server_error_msg').style.display='none';
				document.getElementById('error').style.display='';
				document.getElementById('error').innerHTML='Please upload image with extension gif, jpg or png';
				return false;
			}
		}
   }
	
}

function editBanner(){
	document.getElementById('thumbimage').style.display='none';
	document.getElementById('editbanner').style.display='block';
}
function canceleditBanner(){
	document.getElementById('banner').value='';
	document.getElementById('thumbimage').style.display='block';
	document.getElementById('editbanner').style.display='none';
	
}