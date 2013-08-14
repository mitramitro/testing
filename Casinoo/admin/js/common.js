// JavaScript Document

function isEmpty(s)
{
		 s=trim(s); 
		  return ((s == null) || (s.length == 0));
}

function trim(b)
{
	var i=0;
	while(b.charAt(i)==" ")
	{
	i++;
	}
	b=b.substring(i,b.length);
	len=b.length-1;
	while(b.charAt(len)==" ")
	{
	len--;
	}
	b=b.substring(0,len+1);
	return b;
}

function isEmail(s)
{
	
	var regex = /(^[a-z]([a-z_\.]*)@([a-z_\.]*)([.][a-z]{3})$)|(^[a-z]([a-z_\.]*)@([a-z_\.]*)(\.[a-z]{3})(\.[a-z]{2})*$)/i
	var regex =	/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	return regex.test(s);

}
function validateHtml(str){
	if(str.match(/([\<])([^\>]{1,})*([\>])/i)==null)
	 return false;
	else
	 return true;
}
function isInteger (s)
   {
      var i;

      if (isEmpty(s))
      if (isInteger.arguments.length == 1) return 0;
      else return (isInteger.arguments[1] == true);

      for (i = 0; i < s.length; i++)
      {
         var c = s.charAt(i);

         if (!isDigit(c)) return false;
      }

      return true;
}

function isDigit (c)
{
  return ((c >= "0") && (c <= "9"))
}

function isCharsInBag (s, bag)
  {
  var i;
    // Search through string's characters one by one.
    // If character is in bag, append to returnString.

    for (i = 0; i < s.length; i++)
    {
        // Check that current character isn't whitespace.
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) return false;
    }
    return true;
 }
function isPhone(s)
  {
	return isCharsInBag (s, "0123456789-+(). ");//simple test
	
	var PNum = new String(s);
	
	//	555-555-5555
	//	(555)555-5555
	//	(555) 555-5555
	//	555-5555

    // NOTE: COMBINE THE FOLLOWING FOUR LINES ONTO ONE LINE.
	
	var regex = /^[0-9]{3,3}\-[0-9]{3,3}\-[0-9]{4,4}$|^\([0-9]{3,3}\) [0-9]{3,3}\-[0-9]{4,4}$|^\([0-9]{3,3}\)[0-9]{3,3}\-[0-9]{4,4}$|^[0-9]{3,3}\-[0-9]{4,4}$/;
	
//	var regex = /^\([1-9]\d{2}\)\s?\d{3}\-\d{4}$/; //(999) 999-9999 or (999)999-9999
	if( regex.test(PNum))
		return true;
	else
		return false;

}
function isValidUrl(strUrl) {

	var tomatch= /http:\/\/[A-Za-z0-9\.-]{3,}\.[A-Za-z]{3}/
	var tomatch1 = /[A-Za-z0-9\.-]{3,}\.[A-Za-z]{3}/
	if(tomatch.test(strUrl) ||  tomatch1.test(strUrl)){
		return true;
	}else{
		return false;
	}


}
