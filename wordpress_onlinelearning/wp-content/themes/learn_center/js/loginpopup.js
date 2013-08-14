/* Code is organized as follows:
 * 1) Thickbox Code
 * 2) Popup Code
 * 3) Cookie Code
 * 4) CheckEnterForSubmit() function
 */


/********************  Thickbox Begin  ********************/
/*
 * Thickbox 2.1 - One Box To Rule Them All.
 * By Cody Lindley (http://www.codylindley.com)
 * Copyright (c) 2006 cody lindley
 * Licensed under the MIT License:
 *   http://www.opensource.org/licenses/mit-license.php
 * Thickbox is built on top of the very light weight jQuery library.
 */
var refreshParent = false;
var scrollMode = false;

//on page load call TB_init
$(document).ready(TB_init);
$(window).scroll(TB_changeScrollMode);

//add login to href elements that have a class of .login
function TB_init(){
    $("a.login").unbind("click").click(function(){
	//var t = this.title || this.name || null;
	var t = 'Log In';
	var g = this.rel || false;
	TB_show(t,this.href,g);
	//alert(this.href);
	this.blur();
	return false;
	});
}

function TB_show(caption, url, imageGroup) {//function called when the user clicks on a login link

	try {
	    if (document.getElementById("TB_HideSelect") == null) {
	    $("body").append("<iframe id='TB_HideSelect'></iframe><div id='TB_overlay'></div><div id='TB_window'></div>");
	    //$("#TB_overlay").click(TB_remove);
	    }
    	
	    if(caption==null){caption=""};
    	
    	
    	
	    //$("body").append("<div id='TB_load'><img src='img/loadingAnimation.gif' /></div>");
	    TB_load_position();
		
		
        if(url.indexOf("?")!==-1){ //If there is a query string involved
		    var baseURL = url.substr(0, url.indexOf("?"));
        }else{ 
   		    var baseURL = url;
        }
        var urlString = /\.jpg|\.jpeg|\.png|\.gif|\.bmp/g;
        var urlType = baseURL.toLowerCase().match(urlString);
		
		var queryString = url.replace(/^[^\?]+\??/,'');
		var params = TB_parseQuery( queryString );
		
		var pageSize = TB_getPageSize();
		TB_WIDTH = (params['width']*1) + 30;
		if (pageSize[0] < TB_WIDTH)
		    TB_WIDTH = pageSize[0] - 20;
		ajaxContentW = TB_WIDTH - 30;
		
		if (params['height'] == "*")
	    {
	        TB_HEIGHT = pageSize[1] - 50;
	    }
	    else
	    {
		    TB_HEIGHT = (params['height']*1) + 40;
		    if (pageSize[1] < TB_HEIGHT)
		        TB_HEIGHT = pageSize[1] - 70;
		}
		ajaxContentH = TB_HEIGHT - 45;
		
		//---------------------------------------------------------
		//--This check is necessary based on whether the login query data were passed as
		//--the first part of the query string or not.  If so we need to use a ?d= instead of
		//--&d= in the random number portion.
		//---------------------------------------------------------
		var frameURL;
		var rand_no = Math.random();
		if (url.match(/&TB_/))
		{
		    frameURL = url.split(/&TB_/)[0] + "&d=" + rand_no;
		}
		else
		{
		    frameURL = url.split(/\?TB_/)[0] + "?d=" + rand_no;
		}
		$("#TB_window").append("<div  id=\"popupTitleBar\" class=\"singup_cont\"><div id=\"popupTitle\">" + caption + "</div><div id=\"popupControls\"><a href='#' id='TB_closeWindowButton' title='Close'><img class=\"TB_CloseButton\" style=\"margin:0px; border-width:0px\" src=\"img/t.gif\" border=\"0\" width=\"24\" height=\"24\" /></a></div></div><div id=\"TB_ContentShadow\">&nbsp;</div><iframe frameborder='0' hspace='0' src='"+frameURL+"' id='TB_iframeContent' name='TB_iframeContent' style='width:"+(ajaxContentW + 29)+"px;height:"+(ajaxContentH + 17)+"px;' onload='TB_showIframe()'> </iframe>");
				
		$("#TB_closeWindowButton").click(TB_remove);
		
		$("#TB_ajaxContent").html($('#' + params['inlineId']).html());
		TB_position();
		$("#TB_load").remove();
		$("#TB_window").css({display:"block"}); 

        $(window).unbind("resize");
		$(window).resize(TB_position);
		$(window).resize(TB_overlaySize);
		
		$(window).unbind("scroll");
	    $(window).scroll(TB_position);
	    $(window).scroll(TB_overlaySize);
    	
	    if (scrollMode == false)
	        TB_overlaySizeFirstTime();
	    else
	        TB_overlaySize();
	        
		document.onkeyup = function(e){ 	
			if (e == null) { // ie
				keycode = event.keyCode;
			} else { // mozilla
				keycode = e.which;
			}
			if(keycode == 27){ // close
				TB_remove();
			}	
		}
		
	} catch(e) {
		alert( e );
	}
}

//helper functions below

function TB_showIframe(){
	$("#TB_load").remove();
	$("#TB_window").css({display:"block"});
}

function TB_remove() {
    $(window).unbind();
    if(refreshParent == true)
    { parent.location.href = parent.location.href; }
	$('#TB_window,#TB_overlay,#TB_HideSelect').remove();
	$("#TB_load").remove();
	TB_overlaySize();
	return false;
}

function TB_position() {
    var pagesize = TB_getPageSize();	
	var arrayPageScroll = TB_getPageScrollTop();	
	$("#TB_window").css({width:TB_WIDTH+"px",left: (arrayPageScroll[0] + (pagesize[0] - TB_WIDTH)/2)+"px", top: (arrayPageScroll[1] + (pagesize[1]-TB_HEIGHT)/2)+"px" });
}

function TB_changeScrollMode()
{
    scrollMode = true;
}

function TB_overlaySizeFirstTime()
{
    $("#TB_HideSelect").css({"height":"100%","width":"100%"});
	$("#TB_overlay").css({"height":"100%", "width":"100%"});
}
function TB_overlaySize(){
	if (window.innerHeight && window.scrollMaxY || window.innerWidth && window.scrollMaxX) {	
		yScroll = window.innerHeight + window.scrollMaxY;
		xScroll = window.innerWidth + window.scrollMaxX;
		var deff = document.documentElement;
		var wff = (deff&&deff.clientWidth) || document.body.clientWidth || window.innerWidth || self.innerWidth;
		var hff = (deff&&deff.clientHeight) || document.body.clientHeight || window.innerHeight || self.innerHeight;
		xScroll -= (window.innerWidth - wff);
		yScroll -= (window.innerHeight - hff);
	} else if (document.body.scrollHeight > document.body.offsetHeight || document.body.scrollWidth > document.body.offsetWidth){ // all but Explorer Mac
		yScroll = document.body.scrollHeight;
		xScroll = document.body.scrollWidth;
	} else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
		yScroll = document.body.offsetHeight;
		xScroll = document.body.offsetWidth;
  	}
  	$("#TB_overlay").css({"height":yScroll +"px", "width":xScroll +"px"});
	$("#TB_HideSelect").css({"height":yScroll +"px","width":xScroll +"px"});
	scrollMode = true;
	//alert("Scroll Time");
	
}

function TB_load_position() {
	var pagesize = TB_getPageSize();
	var arrayPageScroll = TB_getPageScrollTop();
	$("#TB_load")
	.css({left: (arrayPageScroll[0] + (pagesize[0] - 100)/2)+"px", top: (arrayPageScroll[1] + ((pagesize[1]-100)/2))+"px" })
	.css({display:"block"});
}

function TB_parseQuery ( query ) {
   var Params = new Object ();
   if ( ! query ) return Params; // return empty object
   var Pairs = query.split(/[;&]/);
   for ( var i = 0; i < Pairs.length; i++ ) {
      var KeyVal = Pairs[i].split('=');
      if ( ! KeyVal || KeyVal.length != 2 ) continue;
      var key = unescape( KeyVal[0] );
      var val = unescape( KeyVal[1] );
      val = val.replace(/\+/g, ' ');
      Params[key] = val;
   }
   return Params;
}

function TB_getPageScrollTop(){
	var yScrolltop;
	var xScrollleft;
	if (self.pageYOffset || self.pageXOffset) {
		yScrolltop = self.pageYOffset;
		xScrollleft = self.pageXOffset;
	} else if (document.documentElement && document.documentElement.scrollTop || document.documentElement.scrollLeft ){	 // Explorer 6 Strict
		yScrolltop = document.documentElement.scrollTop;
		xScrollleft = document.documentElement.scrollLeft;
	} else if (document.body) {// all other Explorers
		yScrolltop = document.body.scrollTop;
		xScrollleft = document.body.scrollLeft;
	}
	yScrolltop = yScrolltop - 15;
	arrayPageScroll = new Array(xScrollleft,yScrolltop) 
	return arrayPageScroll;
}

function TB_getPageSize(){
	var de = document.documentElement;
	var w = window.innerWidth || self.innerWidth || (de&&de.clientWidth) || document.body.clientWidth;
	var h = window.innerHeight || self.innerHeight || (de&&de.clientHeight) || document.body.clientHeight
	arrayPageSize = new Array(w,h) 
	return arrayPageSize;
}
/********************  Thickbox  End   ********************/


/********************  Popup Begin  ********************/
var win = null;
if(window.opener == null) window.name = "Main";

function Kill()
{
	if(win) { win.close(); }
}

if(window.addEventListener)
{
	window.addEventListener("unload", Kill, false);
}
else
{
	window.attachEvent("onunload", Kill);
}

function EditPop(url, name, w, h)
{
	var left = (screen.width - w) / 2;
	var top = (screen.height - h) / 2;
	
	var features = "height=" + h + ",width=" + w + ",top=" + top + ",left=" + left;
	features += ",close=yes,toolbar=no,menubar=no,location=no,scrollbars=yes,resizable=yes";
	
	if(win && !win.closed) win.close();
	win = window.open(url, name, features);
	
	if(parseInt(navigator.appVersion) >= 4)
	{
		win.window.focus();
		if(!win.opener) win.opener = self;
	}
}

function refreshParent_wLink(href) {
    window.opener.location.href = href;
    window.close();
}

function refreshParentWindow() {
window.opener.location.href = window.opener.location.href;
window.close();
}

function closePop() { 
window.close();
}

function hideMsg(){
document.getElementById("MsgZone").style.display="none";
}

function refreshModal_Parent() {
window.opener.location.href = window.opener.location.href;
}

function closeModal_Pop() {
window.opener.location.href = window.opener.location.href;
}

//function helpcenter(url)
//{
//	var width = 850;
//	var height = 700;
//	
//    var features = "width=" + width + ",height=" + height + ",resizable=1,status=1,";
//    features += "scrollbars=1,menubar=1";
//    
//    var hc_wnd = window.open(url, 'HelpCenter', features);
//    hc_wnd.focus();
//}

function helpcenter(element)
{
	var name = "HelpCenter";
	
	if(element)
	{
		element.target = name;
	}
	
	var width = 850;
	var height = 700;
	
    var features = "width=" + width + ",height=" + height + ",resizable=1,status=1,";
    features += "scrollbars=1,menubar=1";
    
    var hc_wnd = window.open('', 'HelpCenter', features);
    hc_wnd.focus();
}
/********************  Popup  End   ********************/




/********************  Cookie Begin  ********************/
function createCookie(name, value, days)
{
	var expires = "";
	if(days)
	{
		var date = new Date();
		date.setTime(date.getTime() + (days * 86400000)); // 86400000 = number of milliseconds in a day.
		expires = "; expires="+date.toGMTString();
	}
	document.cookie = name + "=" + value + expires + "; path=/";
}
function readCookie(name)
{
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	var c;
	for(var i = 0; i < ca.length; i++)
	{
		c = ca[i];
		while(c.charAt(0) == ' ')
		{
			c = c.substring(1, c.length);
		}
		
		if(c.indexOf(nameEQ) == 0)
		{
			return c.substring(nameEQ.length, c.length);
		}
	}
	return null;
}
function eraseCookie(name)
{
	createCookie(name, "", -1);
}
/********************  Cookie  End   ********************/





function findUser(encURL)
    {
        refreshParent_wLink('MySurvey_ResponsesDetail.aspx?' + encURL);
    }
    function checkEnter(e, btnName){
    if (btnName == null)
        btnName = "btnUpdate";
        
	var characterCode;
	if (e && e.which) {
		characterCode = e.which
		}
	else {
		e = event;
		characterCode = e.keyCode;
		}	 
	if (characterCode == 13) {
		WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(btnName, "", true, "", "", false, true));
		return false;
		}
	return true;
}


function checkEnter(e, btnName){
    if (btnName == null)
        btnName = "btnUpdate";
        
	var characterCode;
	if (e && e.which) {
		characterCode = e.which
		}
	else {
		e = event;
		characterCode = e.keyCode;
		}	 
	if (characterCode == 13) {
		WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(btnName, "", true, "", "", false, true));
		return false;
		}
	return true;
}

function CheckEnterForSubmit(e, buttonID)
{
	e = (e) ? e : window.event;

	var charcode = (e.which) ? e.which : e.keyCode;
	
	if(charcode == 13) // ENTER
	{
		var element = document.getElementById(buttonID);
		if(element)
		{
			var executeCode = "";
			switch(element.tagName.toUpperCase())
			{
				case "A":
					executeCode = element.href;
					break;
				case "INPUT":
				case "BUTTON":
					executeCode = element.onclick;
					break;
			}

			if(executeCode.indexOf("javascript:") != -1)
			{
				executeCode = executeCode.replace("javascript:", "");
			}
			
			eval(decodeURI(executeCode));
		}
	}
	
	return false;
}



function changeCollectorTitle(newTitle)
{
    document.getElementById("Wc_Site_CollectorBar1_lblColTitle").innerHTML = newTitle;
}

function changeSurveyTitle(newTitle)
{
    document.getElementById("Wc_Site_SurveyBar1_lblSurveyTitle").innerHTML = newTitle;
    
    //--used for collectorWizard screen
    if (document.getElementById("lblSurveyNameHeading"))
    {
        var _truncTitle = newTitle;
        if (_truncTitle.length > 40)
            _truncTitle = _truncTitle.substring(0, 40) + "...";
        document.getElementById("lblSurveyNameHeading").innerHTML = _truncTitle;
    }
}
 
function printpage()
{
	window.print();
}


/*** EVENT HANDLERS ***/
function addListener(type, element, func)
{
	if(window.attachEvent)
	{
		element.attachEvent("on" + type, func);
	}
	else
	{
		element.addEventListener(type, func, false);
	}
}





//mkGUI begin
function mkLblOn(label)
{
label.style.textDecoration = 'underline';
label.style.backgroundColor = '#C3D2E8';
label.style.cursor = 'pointer';
}
function mkLblOff(label)
{
label.style.textDecoration = 'none';
label.style.backgroundColor = '';
label.style.cursor = '';
}
function mkChkToggle(_bChecked, _onDivID, _offDivID)
{
	if(_bChecked==true)
	{
		if (_offDivID != null)
			document.getElementById(_offDivID).style.display='none';
		if (_onDivID != null)
			document.getElementById(_onDivID).style.display='inline';
	}
	else
	{
		if (_onDivID != null)
			document.getElementById(_onDivID).style.display='none';
		if (_offDivID != null)
			document.getElementById(_offDivID).style.display='inline';
	}
}
function mkHovClick(_chkID, _onDivID, _offDivID)
{
	var _chkObj = document.getElementById(_chkID);
	if (_chkObj.checked)
		_chkObj.checked = false;
	else
		_chkObj.checked = true;
	mkChkToggle(_chkObj.checked, _onDivID, _offDivID);
}

function radioToggle(_inputName, _selectedIndex, _toggleDivID)
{
	document.getElementById(_toggleDivID).style.display='none';
	var inputs = document.getElementsByTagName('input');
	if (inputs)
	{
		for (var i = 0; i < inputs.length; ++i) 
		{
			if (inputs[i].type == 'radio' && inputs[i].name == _inputName && inputs[i].value == _selectedIndex  && inputs[i].checked)
			{
				document.getElementById(_toggleDivID).style.display='inline';
			}
		}
	}
}

function highlightRows()
{
	if (document.getElementById && document.createTextNode)
	{
		var tables=document.getElementsByTagName('TABLE');
		for (var i=0;i<tables.length;i++)
		{
			if (tables[i].className=='Grid' || tables[i].className=='GridAlt')
			{
				var trs=tables[i].getElementsByTagName('tr');
				for(var j=0;j<trs.length;j++)
				{
					var rowNode = trs[j];
					if (rowNode.className == 'hl')
					{
						rowNode.onmouseover=function(){this.style.backgroundColor='#ffffdc'; };
						rowNode.onmouseout=function(){this.style.backgroundColor='#ffffff'; }; 
					}
				}
			}
		}
	}
}	

//duplicate check
function onesubmit(element, delay)
{
	// This function takes an element (typically a submit button) and effectively
	// disables it immediately upon clicking so that duplicate submissions are not
	// sent to the server when users get a little click-happy.  The element is then
	// reset back to its original state after a delay of time (defaults to 1.5
	// seconds) so that users can use the buttons if they click Back in the browser.
	var tagname = element.tagName.toLowerCase();
	
	delay = (delay) ? delay : 1500;
	
	if(tagname == "a")
	{
		var href = element.href;

		var click = element.onclick;
		
		setTimeout(function() { element.href = "javascript:void(0);"; element.onclick = null; }, 0);
		setTimeout(function() { element.href = href; element.onclick = click; }, delay);
	}
	else if(tagname == "input")
	{
		var click = element.onclick;
		
		setTimeout(function() { element.disabled = true; element.onclick = null; }, 0);
		setTimeout(function() { element.disabled = false; element.onclick = click; }, delay);
	}
}


