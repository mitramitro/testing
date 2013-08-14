<?php
require_once("PayPal_API.php");

$Item = $_GET["item_number"];
$Desc = "";
$Price = 0.00;

if($Item == "S3KMCGMP3"){
$Desc = "Zero Gravity Widget #1";
$Price = 25.50;
}

if($Item == "S3KMFMMP3"){
$Desc = "Zero Gravity Widget #2";
$Price = 75.50;
}

if($Item == "S3KMHHMP3"){
$Desc = "Zero Gravity Widget #3";
$Price = 45.25;
}

$nvps = array();
$nvps["VERSION"] = "65.1";

// Single-item purchase
$nvps["METHOD"] = "SetExpressCheckout";
$nvps["RETURNURL"] = "http://localhost/paypal_Method/Embedded/success.php";
$nvps["CANCELURL"] = "http://localhost/paypal_Method/Embedded/fail.html";
$nvps["PAYMENTREQUEST_0_PAYMENTACTION"] = "Sale";
$nvps["PAYMENTREQUEST_0_NOTIFYURL"] = "http://www.yourdomain.com/PayPal/YourPayPalListener.php";
$nvps["PAYMENTREQUEST_0_AMT"] = "$Price";
$nvps["PAYMENTREQUEST_0_CURRENCYCODE"] = "USD";
$nvps["PAYMENTREQUEST_0_ITEMAMT"] = "$Price";
$nvps["L_PAYMENTREQUEST_0_NAME0"] = "$Desc";
$nvps["L_PAYMENTREQUEST_0_NUMBER0"] = "$Item";
$nvps["L_PAYMENTREQUEST_0_AMT0"] = "$Price";
$nvps["L_PAYMENTREQUEST_0_QTY0"] = "1";
$nvps["L_PAYMENTREQUEST_0_ITEMCATEGORY0"] = "Digital"; // specific to Digital Goods

// Since it's a digital good (and not physical), we don't need a shipping address.
$nvps["REQCONFIRMSHIPPING"] = "0";
$nvps["NOSHIPPING"] = "1";

//outputArrayValues($nvps);
//die();

// Send the API call to PayPal.
$response = RunAPICall($nvps);

// Did we get an error back from PayPal? Did PayPal not give us a token? If so, fail now.
if(($response["ACK"] != "Success" && $response["ACK"] != "SuccessWithWarning") || !strlen($response["TOKEN"])){
echo "Failure in PayPal API call: SetExpressCheckout<br>";
echo outputArrayValues($response);
die();
}

// If successful, grab our token and redirect the buyer to PayPal.
header("Location: https://www.sandbox.paypal.com/incontext?token=".$response["TOKEN"]); // SANDBOX PayPal URL
//header("Location: https://www.paypal.com/incontext?token=" . $response["TOKEN"]); // LIVE PayPal URL
?> 