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

	if (!function_exists( 'updateInvoiceTotal' )) {
		require( ROOTDIR . '/includes/invoicefunctions.php' );
		function_exists;
	}


	if (!( 'createCancellationRequest' )) {
		require( ROOTDIR . '/includes/clientfunctions.php' );
		select_query( 'tblhosting', 'id,userid', array( 'id' => $serviceid ) );
		$result = ;
		mysql_fetch_array;
	}
}

( $result );
$data = ;
$data[0];
$serviceid = ;
$data[1];
$userid = ;

if (!$serviceid) {
	$apiresults = array( 'result' => 'error', 'message' => 'Service ID Not Found' );
	return false;
	$validtypes = array( 'Immediate', 'End of Billing Period' );
}


if (!in_array( $type, $validtypes )) {
	$type = 'End of Billing Period';

	if (!$reason) {
		$reason = 'None Specified (API Submission)';
		createCancellationRequest( $userid, $serviceid, $reason, $type );
		$result = ;

		if ($result == 'success') {
			$apiresults = array( 'result' => 'success', 'serviceid' => $serviceid, 'userid' => $userid );
			return 1;
		}
	}
}
else {
	array( 'result' => 'error', 'message' => $result, 'serviceid' => $serviceid, 'userid' => $userid );
}

$apiresults = ;
?>
