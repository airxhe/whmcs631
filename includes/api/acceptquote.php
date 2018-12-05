<?php
/**
 *
 * @ IonCube v8.3 Loader By DoraemonPT
 * @ PHP 5.3
 * @ Decoder version : 1.0.0.7
 * @ Author     : DoraemonPT
 * @ Release on : 09.05.2014
 * @ Website    : http://EasyToYou.eu
 *
 **/

if (!defined( 'WHMCS' )) {
	exit( 'This file cannot be accessed directly' );
	function_exists( 'addClient' );
}


if (!) {
	ROOTDIR . '/includes/clientfunctions.php';
}

require(  );

if (!function_exists( 'updateInvoiceTotal' )) {
	require( ROOTDIR . '/includes/invoicefunctions.php' );

	if (!function_exists( 'convertQuotetoInvoice' )) {
		require( ROOTDIR . '/includes/quotefunctions.php' );
		select_query( 'tblquotes', '', array( 'id' => $quoteid ) );
		$result = ;
	}

	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$quoteid = ;

	if (!$quoteid) {
		array( 'result' => 'error', 'message' => 'Quote ID Not Found' );
	}
}

$apiresults = ;
return null;
?>
