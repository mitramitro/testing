	function validateContacts_frm(){		
		var fName=lName=pNumber=zip=email=brief_desc=category='';
		var flag='1';		
		fName=$('#fName').val();
		lName=$('#lName').val();
		pNumber=$('#pNumber').val();
		zip=$('#zip').val();
		email = $('#email').val();
		brief_desc=$('#brief_desc').val();
		category=$('#category').val();
		var elefocus='';
		
		if(fName==''){
			$('#fnameError').show(); 
			$('#fnameError').html('Please enter first name.');
			if(elefocus==''){
			elefocus='#fName';}	
			flag='0';
			}		
		
		if(fName!=''){
			$('#fnameError').hide();
		}
		
				
		if(lName==''){
			$('#lnameError').show(); 
			$('#lnameError').html('Please enter last name.');
			if(elefocus==''){
			elefocus='#lName';}	
			flag='0';
		}		
		
		if(lName!=''){
			$('#lnameError').hide();
		}
		
		
		/*if(pNumber==''){
			$('#pNumberError').show(); 
			$('#pNumberError').html('Please enter your phone number.');
			if(elefocus==''){
			elefocus='#pNumber';}	
			flag='0';
		}*/		
		
		if(pNumber!=''){
			$('#pNumberError').hide();
		}	
		

		if(zip==''){
			$('#zipError').show(); 
			$('#zipError').html('Please enter your zip code.');
			if(elefocus==''){
			elefocus='#zip';}	
			flag='0';
		}		
		
		if(zip!=''){
			$('#zipError').hide();
		}	
		
		
		if(email==''){
			$('#emailError').show(); 
			$('#emailError').html('Please enter your email address.');
			if(elefocus==''){
			elefocus='#email';}	
			flag='0';}
			
		else if(email!=''){		
			if(!isEmail(email)){
			$('#emailError').show(); 
			$('#emailError').html('Please enter valid email address');		
			if(elefocus==''){
			elefocus='#email';}			
			flag='0';}	
			else {	
			$('#emailError').hide();}
			}
			
			
		if(category ==''){
			$('#accidenttypeError').show(); 
			$('#accidenttypeError').html('Please select accident type.');
			if(elefocus==''){
			elefocus='#category';}	
			flag='0';
		}		
		
		if(category!=''){
			$('#accidenttypeError').hide();
		}		
		
		if(brief_desc==''){
			$('#BriefError').show(); 
			$('#BriefError').html('Please enter brief description.');
			if(elefocus==''){
			elefocus='#brief_desc';}	
			flag='0';
		}		
		
		if(brief_desc!=''){
			$('#BriefError').hide();
		}		
		
		if(flag=='0'){
			$(elefocus).focus();
			return false;
		}
	
		document.frmContact.submit();
	}
	
	
	
	
	function validate_header_right_panel(){
		var fName=lName=email=pNumber=zip=brief_desc=category=input_captcha='';
		var flag='1';
		var elefocus='';
		
		fName=$('#fName').val();
			if(fName=='First Name'){		
				fName='';
			}
		
		lName=$('#lName').val();
			if(lName=='Last Name'){		
				lName='';
			}
		
		email = $('#email').val();
			if(email=='Email Address'){		
				email='';
			}
		
		pNumber=$('#pNumber').val();
			if(pNumber=='Telephone Number'){		
				pNumber='';
			}
		
		zip=$('#zip').val();
			if(zip=='Zip'){		
				zip='';
			}
			
	   category=$('#category').val();
	    input_captcha=$('#input_captcha').val();
		
		brief_desc=$('#brief_desc').val();
			if(brief_desc=='Comment'){		
				brief_desc='';
			}
		
		if(fName==''){
			$('#fnameError').show(); 
			$('#fnameError').html('Please enter first name.');
			if(elefocus==''){
			elefocus='#fName';}	
			flag='0';
			}		
		
		if(fName!=''){
			$('#fnameError').hide();
		}
		
				
		if(lName==''){
			$('#lnameError').show(); 
			$('#lnameError').html('Please enter last name.');
			if(elefocus==''){
			elefocus='#lName';}	
			flag='0';
		}		
		
		if(lName!=''){
			$('#lnameError').hide();
		}
		
		
				
		if(email==''){
			$('#emailError').show(); 
			$('#emailError').html('Please enter your email address.');
			if(elefocus==''){
			elefocus='#email';}	
			flag='0';}
			
		else if(email!=''){		
			if(!isEmail(email)){
			$('#emailError').show(); 
			$('#emailError').html('Please enter valid email address');		
			if(elefocus==''){
			elefocus='#email';}			
			flag='0';}	
			else {	
			$('#emailError').hide();}
			}	
		
		/*if(pNumber==''){
			$('#pNumberError').show(); 
			$('#pNumberError').html('Please enter your phone number.');
			if(elefocus==''){
			elefocus='#pNumber';}	
			flag='0';
		}	*/	
		
		if(pNumber!=''){
			$('#pNumberError').hide();
		}	
		

		if(zip==''){
			$('#zipError').show(); 
			$('#zipError').html('Please enter your zip code.');
			if(elefocus==''){
			elefocus='#zip';}	
			flag='0';
		}		
		
		if(zip!=''){
			$('#zipError').hide();
		}
		
		if(category==''){
			$('#accidenttypeError').show(); 
			$('#accidenttypeError').html('Please select accident type.');
			if(elefocus==''){
			elefocus='#category';}	
			flag='0';
		}		
		
		if(category!=''){
			$('#accidenttypeError').hide();
		}
		
		if(brief_desc==''){
			$('#BriefError').show(); 
			$('#BriefError').html('Please enter brief Description.');
			if(elefocus==''){
			elefocus='#brief_desc';}	
			flag='0';
		}		
		
		if(brief_desc!=''){
			$('#BriefError').hide();
		}
		
		if(input_captcha==''){
			$('#captchaError').show(); 
			$('#captchaError').html('Please enter valid Captcha.');
			if(elefocus==''){
			elefocus='#input_captcha';}	
			flag='0';
		}		
		
		if(input_captcha!=''){
			$('#captchaError').hide();
		}
		
		if(flag=='0'){
			$(elefocus).focus();
			return false;
		}
	
		document.contactfrm_header_right_panel.submit();
	}
	

	function showAttornPopup() {
		drawBackLayer();
		$('#attornpopup').show();
		var snpopup = $('#attornpopup');
		var height = $(window).height();
		var width = $(document).width();
		// $("#signupFName").focus();
		snpopup.css({
		'left' : width/2 - (snpopup.width() / 2),  
		'top' : height/2 - (snpopup.height() / 2), 
		'z-index' : 1000000                        
		});	
	}
	
	
	function hideSignupPopup() {
		
		$('#contactError').hide();
		$('#lawFirmError').hide();
		$('#cNumberError').hide();
		$('#email_add_Error').hide();
		$('#cityError').hide();
		$('#stateError').hide();
		$('#zipCodeError').hide();
		$('#commentError').hide();
		
		removeBackLayer();
		$('#attornpopup').hide();
	} 
	
	function drawBackLayer(){
		var winheight = $(document).height();	
        $('#winhidelayer').css('height',winheight);
		$('#winhidelayer').show();
	}
	
	function removeBackLayer(){
		$('#winhidelayer').hide();
	} 
	
	
	function validate_popup(){
		var contactName=lawFirmName=contactNumber=email_add=city=state=zip_code=comment='';
		var flag='1';
		var elefocus='';
		
		contactName=$('#contactName').val();
			if(contactName=='Contact Name:'){		
				contactName='';
			}
		
		lawFirmName=$('#lawFirmName').val();
			if(lawFirmName=='Law Firm Name:'){		
				lawFirmName='';
			}
		
		contactNumber=$('#contactNumber').val();
			if(contactNumber=='Contact Number:'){		
				contactNumber='';
			}
		
		email_add = $('#email_add').val();
			if(email_add=='Email Address:'){		
				email_add='';
			}
			
		city = $('#city').val();
			if(city=='City:'){		
				city='';
			}
			
		state = $('#state').val();
			if(state=='State:'){		
				state='';
			}
			
		zip_code=$('#zip_code').val();
			if(zip_code=='Zip Code:'){		
				zip_code='';
			}
		
		comment=$('#comment').val();
			if(comment=='Comment box with (500 Character)'){		
				comment='';
			}
		
		if(contactName==''){
			$('#contactError').show(); 
			$('#contactError').html('Please enter contact name.');
			if(elefocus==''){
			elefocus='#contactName';}	
			flag='0';
			}		
		
		if(contactName!=''){
			$('#contactError').hide();
		}
		
				
		if(lawFirmName==''){
			$('#lawFirmError').show(); 
			$('#lawFirmError').html('Please enter law firm name.');
			if(elefocus==''){
			elefocus='#lawFirmName';}	
			flag='0';
		}		
		
		if(lawFirmName!=''){
			$('#lawFirmError').hide();
		}
		
		
		if(contactNumber==''){
			$('#cNumberError').show(); 
			$('#cNumberError').html('Please enter contact number.');
			if(elefocus==''){
			elefocus='#contactNumber';}	
			flag='0';
		}		
		
		if(contactNumber!=''){
			$('#cNumberError').hide();
		}	
		
		if(email_add==''){
			$('#email_add_Error').show(); 
			$('#email_add_Error').html('Please enter email address.');
			if(elefocus==''){
			elefocus='#email_add';}	
			flag='0';}
			
		else if(email_add!=''){		
			if(!isEmail(email_add)){
			$('#email_add_Error').show(); 
			$('#email_add_Error').html('Please enter valid email address');		
			if(elefocus==''){
			elefocus='#email_add';}			
			flag='0';}	
			else {	
			$('#email_add_Error').hide();}
			}
		
		if(city==''){
			$('#cityError').show(); 
			$('#cityError').html('Please enter your city.');
			if(elefocus==''){
			elefocus='#city';}	
			flag='0';
		}		
		
		if(city!=''){
			$('#cityError').hide();
		}	
		
		
		if(state==''){
			$('#stateError').show(); 
			$('#stateError').html('Please enter your state.');
			if(elefocus==''){
			elefocus='#state';}	
			flag='0';
		}		
		
		if(state!=''){
			$('#stateError').hide();
		}	
		
		if(zip_code==''){
			$('#zipCodeError').show(); 
			$('#zipCodeError').html('Please enter zip code.');
			if(elefocus==''){
			elefocus='#zip_code';}	
			flag='0';
		}		
		
		if(zip_code!=''){
			$('#zipCodeError').hide();
		}			
		
		if(comment==''){
			$('#commentError').show(); 
			$('#commentError').html('Please enter comment description.');
			if(elefocus==''){
			elefocus='#comment';}	
			flag='0';
		}		
		
		if(comment!=''){
			$('#commentError').hide();
		}		
		
		if(flag=='0'){
			$(elefocus).focus();
			return false;
		}
	
		document.frm_attorney.submit();
	}
	
	
	
	
	function showDetail1(){
		$('#signMapPopup1').show();
		var winheight = $(document).height();	
		$('#winhidelayer1').css('height',winheight);
		$('#winhidelayer1').show();
		}

	function showDetail2(){
		$('#signMapPopup2').show();
		var winheight = $(document).height();	
		$('#winhidelayer1').css('height',winheight);
		$('#winhidelayer1').show();
		}

	function showDetail3(){
		$('#winhidelayer3').show();
		$('#signMapPopup3').show();
		var winheight = $(document).height();	
		$('#winhidelayer3').css('height',winheight);
		$('#winhidelayer3').show();
		}

	function showDetail4(){
		$('#winhidelayer4').show();
		$('#signMapPopup4').show();
		var winheight = $(document).height();	
		$('#winhidelayer4').css('height',winheight);
		$('#winhidelayer4').show();
		}

	function showDetail5(){
		$('#winhidelayer5').show();
		$('#signMapPopup5').show();
		var winheight = $(document).height();	
		$('#winhidelayer5').css('height',winheight);
		$('#winhidelayer5').show();
		}


	function showDetail6(){
		$('#winhidelayer6').show();
		$('#signMapPopup6').show();
		var winheight = $(document).height();	
		$('#winhidelayer6').css('height',winheight);
		$('#winhidelayer6').show();
		}

	function showDetail7(){
		$('#winhidelayer7').show();
		$('#signMapPopup7').show();
		var winheight = $(document).height();	
		$('#winhidelayer7').css('height',winheight);
		$('#winhidelayer7').show();
		}

	function showDetail8(){
		$('#winhidelayer8').show();
		$('#signMapPopup8').show();
		var winheight = $(document).height();	
		$('#winhidelayer8').css('height',winheight);
		$('#winhidelayer8').show();
		}

	function showDetail9(){
		$('#winhidelayer9').show();
		$('#signMapPopup9').show();
		var winheight = $(document).height();	
		$('#winhidelayer9').css('height',winheight);
		$('#winhidelayer9').show();
		}

	function showDetail10(){
		$('#winhidelayer10').show();
		$('#signMapPopup10').show();
		var winheight = $(document).height();	
		$('#winhidelayer10').css('height',winheight);
		$('#winhidelayer10').show();
		}
	
	function showDetail11(){
		$('#winhidelayer11').show();
		$('#signMapPopup11').show();
		var winheight = $(document).height();	
		$('#winhidelayer11').css('height',winheight);
		$('#winhidelayer11').show();
		}


	function hideMapPopup() {
		removeBackMapLayer();
		$('#signMapPopup1').hide();
		$('#signMapPopup2').hide();
		$('#signMapPopup3').hide();
		$('#signMapPopup4').hide();
		$('#signMapPopup5').hide();
		$('#signMapPopup6').hide();
		$('#signMapPopup7').hide();
		$('#signMapPopup8').hide();
		$('#signMapPopup9').hide();
		$('#signMapPopup10').hide();
		$('#signMapPopup11').hide();
		$('#winhidelayer2').hide();
	} 
	
	function removeBackMapLayer(){
		$('#winhidelayer1').hide();
	}



	function showMess() {
		drawBackLayer();
		$('#messpopup').show();
		var snpopup = $('#messpopup');
		var height = $(window).height();
		var width = $(document).width();
		// $("#signupFName").focus();
		snpopup.css({
		'left' : width/2 - (snpopup.width() / 2),  
		'top' : height/2 - (snpopup.height() / 2), 
		'z-index' : 10000000                        
		});
	
	}
	
	
	function hidemessPopup() {
		removeBackLayer();
		$('#messpopup').hide();
	} 
	
	
	function showAttMess() {
		drawBackLayer();
		$('#messAttpopup').show();
		var snpopup = $('#messAttpopup');
		var height = $(window).height();
		var width = $(document).width();
		snpopup.css({
		'left' : width/2 - (snpopup.width() / 2),  
		'top' : height/2 - (snpopup.height() / 2), 
		'z-index' : 10000000                        
		});
	
	}
	
	function hideAttmessPopup() {
		removeBackLayer();
		$('#messAttpopup').hide();
	} 
	
	
	function showBio(showId){
		$('#'+showId).show();
		var winheight = $(document).height();	
		$('#winhidelayer1').css('height',winheight);
		$('#winhidelayer1').show();
	}


	function hideBipPopup(showId) {
		removeBackMapLayer();
		$('#'+showId).hide();
	} 

	
	function validate_header_right(){		
		var fName=lName=email=pNumber=zip=brief_desc=category=input_captcha='';
		var flag='1';
		var elefocus='';
		
		fName=$('#fName').val();
		if(fName=='First Name *')
		{		
			fName='';
		}
		lName=$('#lName').val();
		if(lName=='Last Name *')
		{		
			lName='';
		}
		email=$('#email').val();
		if(email=='Email Address *')
		{		
			email='';
		}
		pNumber=$('#pNumber').val();
		if(pNumber=='Telephone Number *')
		{		
			pNumber='';
		}
		zip=$('#zip').val();
		if(zip=='Zip *')
		{		
			zip='';
		}
		category=$('#category').val();
		if(category=='Select Accident Type *')
		{		
			category='';
		}
		
		brief_desc = $('#brief_desc').val();
		if(brief_desc=='Comment *')
		{		
			brief_desc='';
		}
		
		input_captcha = $('#input_captcha').val();
		
		
		if(fName=='')
		{
			$('#fName').css('color', "red");
			$('#fName').val('First Name *');
			if(elefocus=='')
			{
				elefocus='#fName';
			}	
			flag='0';
		}		
		
		if(fName!='')
		{
			$('#fName').css('color', "#000000");
		}
		
				
		if(lName=='')
		{
			$('#lName').css('color', "red");
			$('#lName').val('Last Name *');
			if(elefocus=='')
			{
				elefocus='#lName';
			}	
			flag='0';
		}		
		
		if(lName!='')
		{
			$('#lName').css('color', "#000000");
		}
		
		if(email=='')
		{
			$('#email').css('color', "red");
			$('#email').val('Email Address *');
			if(elefocus=='')
			{
				elefocus='#email';
			}	
			flag='0';
		}
			
		else if(email!='')
		{		
			if(!isEmail(email))
			{
				$('#email').css('color', "red");
				$('#email').val('Email Address *');		
				if(elefocus==''){
				elefocus='#email';}			
				flag='0';
				
			} else {
				
				$('#email').css('color', "#000000");
			}
		}		
		
		
		if(pNumber=='')
		{
			$('#pNumber').css('color', "red");
			$('#pNumber').val('Telephone Number *');
			if(elefocus=='')
			{
				elefocus='#pNumber';
			}	
			flag='0';
		}		
		
		if(pNumber!='')
		{
			$('#pNumber').css('color', "#000000");
		}	
		

		if(zip=='')
		{
			$('#zip').css('color', "red");
			$('#zip').val('Zip *');
			if(elefocus=='')
			{
				elefocus='#zip';
			}	
			flag='0';
		}		
		
		if(zip!='')
		{
			$('#zip').css('color', "#000000");
		}
		
		if(category=='')
		{
			$('#category').css('color', "red");
			$('#category').val('Select Accident Type *');
			if(elefocus=='')
			{
				elefocus='#category';
			}	
			flag='0';
		}		
		
		if(category!='')
		{
			$('#category').css('color', "#000000");
		}
		
		if(brief_desc=='')
		{
			$('#brief_desc').css('color', "red");
			$('#brief_desc').val('Comment *');
			if(elefocus==''){
			elefocus='#brief_desc';}	
			flag='0';
		}		
		
		if(brief_desc!='')
		{
			$('#brief_desc').css('color', "#000000");
		}
		
		if(input_captcha==''){
			$('#captchaError').show(); 
			$('#captchaError').html('Please enter valid Captcha.');
			if(elefocus==''){
			elefocus='#input_captcha';}	
			flag='0';
		}		
		
		if(input_captcha!=''){
			$('#captchaError').hide();
		}
		
		
		if(flag=='0')
		{
			$(elefocus).focus();
			return false;
		}
	
		document.contactfrm_header_right.submit();	
	}


	function change_valcol(){
		var fName=lName=email=pNumber=zip=brief_desc=category='';

		fName=$('#fName').val();
		if(fName=='First Name *')
		{		
			fName='';
		}
		
		lName=$('#lName').val();
		if(lName=='Last Name *')
		{		
			lName='';
		}
		
		email=$('#email').val();
		if(email=='Email Address *')
		{		
			email='';
		}
		
		pNumber=$('#pNumber').val();
		if(pNumber=='Telephone Number *')
		{		
			pNumber='';
		}
		
		zip=$('#zip').val();
		if(zip=='Zip *')
		{		
			zip='';
		}
		
		category=$('#category').val();
		if(category=='Select Accident Type *')
		{		
			category='';
		}
		
		brief_desc = $('#brief_desc').val();
		if(brief_desc=='Comment *')
		{		
			brief_desc='';
		}	
		
		if(fName!='')
		{
			$('#fName').css('color', "#000000");
		}
		
		if(lName!='')
		{
			$('#lName').css('color', "#000000");
		}
		
		if(email!='' && !isEmail(email))
		{
			$('#email').css('color', "#000000");
		}
		
		if(pNumber!='')
		{
			$('#pNumber').css('color', "#000000");
		}
		
		if(zip!='')
		{
			$('#zip').css('color', "#000000");
		}
		
		if(brief_desc!='')	
		{
			$('#brief_desc').css('color', "#000000");
		}
	}