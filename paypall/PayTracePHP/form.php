<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>PayTrace PHP Sample Form</title>
	<style>
		* { margin:0; padding:0; }
		body { background-color: #FFF; font: 100%/1 sans-serif; color:#444; }
		form { width: 40%; padding: 2% 10%; }
		span { display: block; }
		label { display: block; padding: 15px 0 5px; font-style: italic; color: #888; }
		input { width: 98%; padding: 5px; font: inherit; }
		.oneColumn { float: left; width: 30%; padding-right: 3%; }
		.twoColumn { float: left; width: 63%; padding-right: 3%; }
		.date { float: left; padding-right: 6%; width: 30%; }
		.date input { text-align: center; }
		.date span label { font-size: 75%; padding: 5px 0; text-align: center; }
		.symbol { float: left; font-size: 150%; margin: 14% 0 0; padding-right: 3%; width: 2%; }
		input.submit { margin-top: 20px; }
		.error, .good { width: 40%; padding: 2%; background-color: #fdeded; border: 3px dashed red; margin: 2%; }
		.good { background-color: #f4fded; border-color: green; }
		.error ul { width: 80%; margin: 0 auto; }
		li { padding: 5px; }
	</style>
<?php

if (isset( $_POST['submitted'] )) { // check if the form has been sent

	$errors = array();
	
	// Check required fields for blanks
	// NOTE: you will need to sanitize these form values first!
	
	if (empty($_POST['cc_num'])) {
		$errors[] = 'credit card number';
	} else {
		$cc_num = $_POST['cc_num'];
	}
	
	if (empty($_POST['exp_month'])) {
		$errors[] = 'expiration month';
	} else {
		$exp_month = $_POST['exp_month'];
	}
	
	if (empty($_POST['exp_year'])) {
		$errors[] = 'expiration year';
	} else {
		$exp_year = $_POST['exp_year'];
	}
	
	if (empty($_POST['amount'])) {
		$errors[] = 'amount';
	} else {
		$amount = $_POST['amount'];
	}
	
	if (empty($_POST['csc'])) {
		$errors[] = 'CSC';
	} else {
		$csc = $_POST['csc'];
	}
	
	if (empty($_POST['street'])) {
		$errors[] = 'billing street';
	} else {
		$street = $_POST['street'];
	}
	
	if (empty($_POST['zip'])) {
		$errors[] = 'billing zip';
	} else {
		$zip = $_POST['zip'];
	}
	
	if (empty($errors)) { // OK 
	
		include('PayTrace.php'); // grab the PayTrace API
		
		//declare the reference to the class
		$PayTraceAPI = new PayTraceAPI();
		
		//set the properties for this request in the class
		$PayTraceAPI->SetUN("demo123");
		$PayTraceAPI->SetPSWD("demo123");
		$PayTraceAPI->SetTERMS("Y");
		$PayTraceAPI->SetMETHOD("ProcessTranx");
		$PayTraceAPI->SetTRANXTYPE("Sale");
		$PayTraceAPI->SetCC($cc_num); // test value: 4012881888818888
		$PayTraceAPI->SetEXPMNTH($exp_month);
		$PayTraceAPI->SetEXPYR($exp_year);
		$PayTraceAPI->SetAMOUNT($amount);
		$PayTraceAPI->SetCSC($csc);
		$PayTraceAPI->SetBADDRESS($street);
		$PayTraceAPI->SetBZIP($zip);
		
		//process the request which will format the request, send it to the API, and parse the response
		$PayTraceAPI->ProcessRequest();
		//determine if the transaction was approved
		if ( $PayTraceAPI->WasTransactionApproved() == true ) { 
			//...handle the approved transaction, store the order, send a receipt, etc.?>
			<div class="good">Transaction was approved!</div>
			<div class="good">Transaction ID = <?php echo $PayTraceAPI->GetTRANSACTIONID(); ?></div>
			<div class="good">Approval Code = <?php echo $PayTraceAPI->GetAPPCODE(); ?></div>
		<?php
		}
		elseif ( $PayTraceAPI->DidErrorOccur() == true ) {
			//an error was returned from the API, likely invalid data was provided ?>
			<div class="error">Transaction was not processed per this error: <?php echo $PayTraceAPI->GetERROR(); ?></div>
		<?php
		}
		else {
			//the transaction was not approved by the issuer. Depending on your product/industry, you may want to display the response or just prompt for another form of payment ?>
			<div class="error">Transaction was not approved per this response: <?php echo $PayTraceAPI->GetAPPMSG(); ?></div>
		<?php
		}		
		
	} else { // show the form errors ?>
		
		<div class="error">
			<strong>The following fields were blank:</strong>
			<ul>
			<?php
            foreach ($errors as $msg) { // Print each error. ?>
				<li><?php echo $msg; ?></li>
            <?php
			} ?>
			</ul>
        </div>
	<?php
	}
	
} else { // show the form ?>

	<form action="form.php" method="post">
		<span class="twoColumn">
			<label>Credit Card Number</label>
			<input type="text" name="cc_num">
		</span>
		<span class="oneColumn">
			<label>Amount</label>
			<input type="text" name="amount">
		</span>
		<span class="twoColumn">
			<span class="date">
				<label>Exp. Month</label>
				<span>
					<input type="text" name="exp_month" maxlength="2">
					<label>MM</label>
				</span>
			</span>
			<span class="symbol">/</span>
			<span class="date">
				<label>Exp. Year</label>
				<span>
					<input type="text" name="exp_year" maxlength="2">
					<label>YY</label>
				</span>
			</span>
		</span>
		<span class="oneColumn">
			<label>CSC</label>
			<input type="text" name="csc">
		</span>
		<span class="twoColumn">
			<label>Billing Street</label>
			<input type="text" name="street">
		</span>
		<span class="oneColumn">
			<label>BIlling Zip</label>
			<input type="text" name="zip">
		</span>
		<span class="oneColumn">
			<input type="submit" class="submit" name="submit" value="Submit">
			<input type="hidden" name="submitted" value="TRUE">
		</span>
	</form>

</head>
</html>
<?php
} 
?>