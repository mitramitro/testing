<?php

//define("PayPal_URL","https://api-3t.paypal.com/nvp"); // Live URL
define("PayPal_URL","https://api-3t.sandbox.paypal.com/nvp"); // SandBox URL

define("API_USERNAME", "amarjit.attri-facilitator_api1.nanowebtech.com"); // sandbox merchant
define("API_PASSWORD", "1366011434"); // sandbox password
define("API_SIGNATURE","A8DIAEah1rYu.oG.f2uEOcxFn5WIA3sepjzPiIDdMAxGIYD.lCe6UPDE"); // sandbox signature

function outputArrayValues($array){
	while (list($key, $value) = each($array))
	{
		if ("" != $value)
		{
			echo "$key = $value<br>";
		}
	}
}

function NVPEncode($nvps) {
	$out = array();
	foreach($nvps as $index => $value) {
		$out[] = $index . "=" . urlencode($value);
	}
	
	return implode("&", $out);
}

function NVPDecode($nvp) {
	$split = explode("&", $nvp);
	$out = array();
	foreach($split as $value) {
		$sub = explode("=", $value);
		$out[$sub[0]] = urldecode($sub[1]);
	}
	
	return $out;
}

function RunAPICall($nvps) {
	$ch = curl_init(PayPal_URL); 
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	
	// On some servers, these two options are necessary to
	// avoid getting "invalid SSL certificate" errors
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	
	// Insert the credentials
	$nvps["USER"] = API_USERNAME;
	$nvps["PWD"] = API_PASSWORD;
	$nvps["SIGNATURE"] = API_SIGNATURE;
	
	// Build the NVP string
	$nvpstr = NVPEncode($nvps);
	
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpstr);
	
	$result = curl_exec($ch);
	
	// If the request failed, return an empty array.
	if($result === FALSE) return array();
	
	// Return the decoded response
	else return NVPDecode($result);
}

function PaymentError() {
	die("An error occurred.");
}

?>