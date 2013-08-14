<?Php
$_SESSION['customerId']=session_id();
$_POST['grandTotal']=1;


?>
<script>
function submitform()
{
    document.frm_insert_order.submit();
}
window.onload = submitform; 
</script>


 <?php /*?><form action="https://www.sandbox.paypal.com/cgi-bin/webscr/" method="post" name="frm_insert_order">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="demobiz@gmail.com">
        <input type="hidden" name="item_name" val+ue="Your total purchase amount">
        <input type="hidden" name="no_shipping" value="1">
        <input type="hidden" name="amount" value="<?php echo $_POST['grandTotal']; ?>">
<!--        <input type="hidden" name="invoice" value="<?php //echo invoiceNumber(); ?>">-->
        <input type="hidden" name="custom" value="<?php if($_SESSION['customerId']){ echo $_SESSION['customerId']; }else{ echo '0'; } ?>">
        <input type="hidden" name="cancel_return" value="http://localhost/fiyatin/adaptive/order-failure.php">
        <input type="hidden" name="return" value="http://localhost/fiyatin/adaptive/order-success.php">
        <input type="hidden" name="rm" value="2">
        <input type="hidden" name="currency_code" value="AUD">
      </form><?php */?>
      
      
      <form action="https://www.sandbox.paypal.com/cgi-bin/webscr/" method="post" name="frm_insert_order">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="gmail.com">
        <input type="hidden" name="item_name" val+ue="Your total purchase amount">
        <input type="hidden" name="no_shipping" value="1">
        <input type="hidden" name="amount" value="<?php echo $_POST['grandTotal']; ?>">
<!--        <input type="hidden" name="invoice" value="<?php //echo invoiceNumber(); ?>">-->
        <input type="hidden" name="custom" value="<?php if($_SESSION['customerId']){ echo $_SESSION['customerId']; }else{ echo '0'; } ?>">
        <input type="hidden" name="cancel_return" value="http://localhost/fiyatin/adaptive/order-failure.php">
        <input type="hidden" name="return" value="http://localhost/fiyatin/adaptive/order-success.php">
        <input type="hidden" name="rm" value="2">
        <input type="hidden" name="currency_code" value="AUD">
      </form>
      
      <form action= "https://www.paypal.com/webapps/adaptivepayment/flow/pay"  target="PPDGFrame"> 

   		<input id="type" type="hidden" name="expType" value="mini"> 
		<input id="paykey" type="hidden" name="paykey" value="AP-..."> 
        <input id="preapprovalkey" 	type="hidden" name="preapprovalkey" value="PA-..."> 
        <input type="submit" id="submitBtn" value="Pay with PayPal"> 
        
   	</form>
    

    <!--curl -s --insecure 
-H "X-PAYPAL-SECURITY-USERID: api_username" 
-H "X-PAYPAL-SECURITY-PASSWORD: api_password" 
-H "X-PAYPAL-SECURITY-SIGNATURE: api_signature" 
-H "X-PAYPAL-REQUEST-DATA-FORMAT: NV" 
-H "X-PAYPAL-RESPONSE-DATA-FORMAT: NV 
-H "X-PAYPAL-APPLICATION-ID: your_app_id "  
https://svcs.sandbox.paypal.com/AdaptivePayments/Refund  -d  
"requestEnvelope.errorLanguage=en_US 
&payKey=AP-95V43510SV018561T" 
-->