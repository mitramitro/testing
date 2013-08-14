<?php
require_once("PayPal_API.php");

$Token = $_GET["token"];
$PayerID = $_GET["PayerID"];

$nvps = array();
$nvps["VERSION"] = "65.1";

// get details of transaction (needed for Name & Desc in DoExpressCheckoutPayment)
$nvps["METHOD"] = "GetExpressCheckoutDetails";
$nvps["TOKEN"] = $Token;
$response = RunAPICall($nvps); // Send the API call to PayPal.
?> 

<html>
<head>
	<title>Payment Complete</title>
</head>
<body bgcolor="#ffffff">
<h1>THANK YOU</h1>
<br><br>
Your purchase is complete.
<br><br>
Purchase info from PayPal:
<br>
<?php
outputArrayValues($response);
?>
</body>
</html>