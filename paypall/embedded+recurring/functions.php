<?php
/**
 * Get the PayPal Digital Goods class definitions from the PayPal Digital Goods PHP Library.
 */
require_once( 'lib/paypal-digital-goods/paypal-digital-goods.class.php' );
require_once( 'lib/paypal-digital-goods/paypal-subscription.class.php' );
require_once( 'lib/paypal-digital-goods/paypal-purchase.class.php' );


/**
 * A central function for settings the credentials for both subscription & purchase 
 * objects with the PayPal_Digital_Goods_Configuration registry class.
 */
function set_credentials() {

	/*
	PayPal_Digital_Goods_Configuration::username( 'your_api_username' );
	PayPal_Digital_Goods_Configuration::password( 'your_api_password' );
	PayPal_Digital_Goods_Configuration::signature( 'your_api_signature' );
	*/

	PayPal_Digital_Goods_Configuration::username( 'nehu.p_1347014454_biz_api1.nanowebtech.com' );
	PayPal_Digital_Goods_Configuration::password( '1347014477' );
	PayPal_Digital_Goods_Configuration::signature( 'AMJexHa71k0DmyHmTPAH8wq2TBKQA6ATWtFusj7IPr4LebUpkotfTJ4c' );

	PayPal_Digital_Goods_Configuration::return_url( get_script_uri( 'return.php?paypal=paid' ) );
	PayPal_Digital_Goods_Configuration::cancel_url( get_script_uri( 'return.php?paypal=cancel' ) );
	PayPal_Digital_Goods_Configuration::business_name( 'Demo Store' );

	PayPal_Digital_Goods_Configuration::notify_url( get_script_uri( 'return.php?paypal=notify' ) );

	// Uncomment the line below to switch to the live PayPal site
	//PayPal_Digital_Goods_Configuration::environment( 'live' );

	if( PayPal_Digital_Goods_Configuration::username() == 'your_api_username' || PayPal_Digital_Goods_Configuration::password() == 'your_api_password' || PayPal_Digital_Goods_Configuration::signature() == 'your_api_signature' )
		exit( 'You must set your API credentials in ' . __FILE__ . ' for this example to work.' );
}


/**
 * Creates and returns a PayPal DG Purchase Object
 */
function create_example_purchase() {

	set_credentials();

	$purchase_details = array(
		'name'        => 'Digital Good Purchase Example',
		'description' => 'Example Digital Good Purchase',
		'amount'      => '15.50',
		'tax_amount'  => '2.50',
		'items'       => array(
			array( // First item
				'item_name'        => 'First item name',
				'item_description' => 'This is a description of the first item in the cart, it costs $9.00',
				'item_amount'      => '10.00',
				'item_tax'         => '1.00',
				'item_quantity'    => 1,
				'item_number'      => 'XF100',
			),
			array( // Second item
				'item_name'        => 'Second Item',
				'item_description' => 'This is a description of the SECOND item in the cart, it costs $1.00 but there are 3 of them.',
				'item_amount'      => '1.00',
				'item_tax'         => '0.50',
				'item_quantity'    => 3,
				'item_number'      => 'XJ100',
			),
		)
	);

	return new PayPal_Purchase( $purchase_details );
}


/**
 * Creates and returns a PayPal DG Subscription Object
 */
function create_example_subscription() {

	set_credentials();

	$subscription_details = array(
		'description'        => 'Example Subscription: $10 sign-up fee then $2/week for the next four weeks.',
		'initial_amount'     => '10.00',
		'amount'             => '2.00',
		'period'             => 'Week',
		'frequency'          => '1', 
		'total_cycles'       => '4',
	);

	return new PayPal_Subscription( $subscription_details );
}


/**
 * Helper function to get the URI for the script
 */
function get_script_uri( $script = 'index.php' ){
	// IIS Fix
	if( empty( $_SERVER['REQUEST_URI'] ) )
		$_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'];

	// Strip off query string
	$url = preg_replace( '/\?.*$/', '', $_SERVER['REQUEST_URI'] );
	//$url = 'http://'.$_SERVER['HTTP_HOST'].'/'.ltrim(dirname($url), '/').'/';
	$url = 'http://'.$_SERVER['HTTP_HOST'].implode( '/', ( explode( '/', $_SERVER['REQUEST_URI'], -1 ) ) ) . '/';

	return $url . $script;
}