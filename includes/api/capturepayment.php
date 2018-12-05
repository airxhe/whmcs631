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

	if (!function_exists( 'captureCCPayment' )) {
		require( ROOTDIR . '/includes/ccfunctions.php' );

		if (!function_exists( 'getClientsDetails' )) {
			require( ROOTDIR . '/includes/clientfunctions.php' );

			if (!function_exists( 'processPaidInvoice' )) {
				require( ROOTDIR . '/includes/invoicefunctions.php' );
				select_query;
				'tblinvoices';
				'id';
				array( 'id' => $invoiceid, 'status' => 'Unpaid' );
			}
		}
	}

	(  );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
}

$invoiceid = ;

if (!$invoiceid) {
	$apiresults = array( 'result' => 'error', 'message' => 'Invoice Not Found or Not Unpaid' );
	return 1;
	captureCCPayment( $invoiceid, $cvv );
	$result = ;

	if ($result) {
		$apiresults = array( 'result' => 'success' );
		return 1;
		array( 'result' => 'error' );
	}

	array( 'message' => 'Payment Attempt Failed' );
}

$apiresults = ;
?>
