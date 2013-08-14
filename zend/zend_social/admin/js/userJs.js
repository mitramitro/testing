
	function deleteUser(cId){
		str= 'deleteUser.php?action=delUser&cId=';
		val = confirm('Are you sure you want to delete this User?');
	
		if(val){
			document.location.href=str+cId;
		}
	}
     function updateStatus(uId,sid){
		str= 'deleteUser.php?action=updates&uId='+uId+'&sId=';
		val = confirm('Are you sure you want to update this Status?');
	
		if(val){
			document.location.href=str+sid;
		}
	}
	
	function deleteCms(cms){
		str= 'deleteCms.php?action=delCms&cms=';
		val = confirm('Are you sure you want to delete this Module?');
	
		if(val){
			document.location.href=str+cms;
		}
	}
function validateCms(){	

		var cat_name=cat_title=cat_create=cat_sub=cat_desc='';
		var flag='1';
			cat_name=$('#cat_name').val();
			cat_title=$('#cat_title').val();
			cat_create=$('#cat_create').val();
			cat_sub=$('#cat_sub').val();
			cat_desc=$('#cat_desc').val();
			var elefocus='';
			
		if(cat_name==''){
			$('#errcat_name').show(); 
			$('#errcat_name').html('Module name is required!.');			
			if(elefocus==''){
			elefocus='#cat_name';}			
			flag='0';}		 
			if(cat_name!=''){
			$('#errcat_name').hide();
			}
				
		if(cat_title==''){
			$('#errcat_title').show(); 
			$('#errcat_title').html('Title is required!.');			
			if(elefocus==''){
			elefocus='#cat_title';}			
			flag='0';}		 
			if(cat_title!=''){
			$('#errcat_title').hide();
			}
				
		if(cat_create==''){
			$('#errcat_create').show(); 
			$('#errcat_create').html('Create Date is required!.');			
			if(elefocus==''){
			elefocus='#cat_create';}			
			flag='0';}		 
			if(cat_create!=''){
			$('#errcat_create').hide();
			}
				
		if(cat_sub==''){
			$('#errcat_sub').show(); 
			$('#errcat_sub').html('Submitted Date is required!.');			
			if(elefocus==''){
			elefocus='#cat_sub';}			
			flag='0';}		 
			if(cat_sub!=''){
			$('#errcat_sub').hide();
			}
				
		if(cat_desc==''){
			$('#errcat_desc').show(); 
			$('#errcat_desc').html('description is required!.');			
			if(elefocus==''){
			elefocus='#cat_desc';}			
			flag='0';
			}		 
			if(cat_desc!=''){
			$('#errcat_desc').hide();
			}
		if(flag=='0'){
			$(elefocus).focus();
			return false;
		}	
			else{
			}
		document.frmform.submit();
	}
	
	function validateNewCms(){	
	
	
	
	var CatName = document.frmform.cat_name;
	var CatTitle = document.frmform.cat_title;
	var CatCreate = document.frmform.cat_create;
	var CatSub = document.frmform.cat_sub;
	var CatDesc = document.frmform.cat_desc;

	
	/*var FilterName=/^[a-zA-Z]+$/;
 var FilerNumeric=/^[0-9]+$/;
  var FilterEmail=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  //var FilterZip = /^[a-zA-Z0-9 ]+$/;*/
  
  
   if (CatName.value == "")
    {
        window.alert("Please enter category name.");
        CatName.focus();
        return false;
    }
	
		
	 if (CatTitle.value == "")
    {
        window.alert("Please enter category title.");
        CatTitle.focus();
        return false;
    }

 if (CatCreate.value == "")
    {
        window.alert("Please enter Created Date.");
        CatCreate.focus();
        return false;
    }

 if (CatSub.value == "")
    {
        window.alert("Please enter Submitted Date.");
        CatSub.focus();
        return false;
    }

 if (CatDesc.value == "")
    {
        window.alert("Please enter Description");
        CatDesc.focus();
        return false;
    }
	//document.frmform.submit();
  
  	
	}
	
/*function validateContact(){	
var cat_desc='';
		var flag='1';
			
			cat_desc=$('#cat_desc').val();
			var elefocus='';
			if(cat_desc==''){
			$('#errcat_desc').show(); 
			$('#errcat_desc').html('description is required!.');			
			if(elefocus==''){
			elefocus='#cat_desc';}			
			flag='0';}		 
			if(cat_desc!=''){
			$('#errcat_desc').hide();
			}
		if(flag=='0'){
			$(elefocus).focus();
			return false;
		}	
			else{
			}
		document.contactform.submit();
	
				
}
	*/

	function deletePaymentRecords(mode,oId){
		str= 'deletePayment.php?mode='+mode+'&action=delPayment&oId=';
		val = confirm('Are you sure you want to delete this Info?');
	
		if(val){
			document.location.href=str+oId;
		}
	}
	function deleteHotelRecord(hId){
		str= 'deleteHotel.php?action=delHotel&hId=';
		val = confirm('Are you sure you want to delete this Hotel Info?');
	
		if(val){
			document.location.href=str+hId;
		}
	}
	 function updateHotelStatus(rId,tid){
		str= 'manageDashdetail.php?action=updatesHotel&rId='+rId+'&tId=';
		val = confirm('Are you sure you want to update this Status?');
	
		if(val){
			document.location.href=str+tid;
		}
	}
	function validateDetail(){		
		var cat_tax=cat_rate=cat_com='';
		var flag='1';
			cat_tax=$('#cat_tax').val();
			cat_rate=$('#cat_rate').val();
			cat_com=$('#cat_com').val();
			var elefocus='';
			
		if(cat_tax==''){
			$('#errcat_tax').show(); 
			$('#errcat_tax').html('Service Tax is required!.');			
			if(elefocus==''){
			elefocus='#cat_tax';}			
			flag='0';}		 
			if(cat_tax!=''){
			$('#errcat_tax').hide();
			}
				
		if(cat_rate==''){
			$('#errcat_rate').show(); 
			$('#errcat_rate').html('Per Night Rate is required!.');			
			if(elefocus==''){
			elefocus='#cat_rate';}			
			flag='0';}		 
			if(cat_rate!=''){
			$('#errcat_rate').hide();
			}
				
		if(cat_com==''){
			$('#errcat_com').show(); 
			$('#errcat_com').html('Commision is required!.');			
			if(elefocus==''){
			elefocus='#cat_com';}			
			flag='0';}		 
			if(cat_com!=''){
			$('#errcat_com').hide();
			}
				
		
		if(flag=='0'){
			$(elefocus).focus();
			return false;
		}	
			else{
			}
		document.Detailform.submit();
	}