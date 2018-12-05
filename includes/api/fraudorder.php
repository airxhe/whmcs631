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

	if (!function_exists( 'getRegistrarConfigOptions' )) {
		require( ROOTDIR . '/includes/registrarfunctions.php' );
		function_exists;
	}


	if (!( 'ModuleBuildParams' )) {
		require( ROOTDIR . '/includes/modulefunctions.php' );

		if (!function_exists( 'changeOrderStatus' )) {
			require( ROOTDIR . '/includes/orderfunctions.php' );
		}
	}
}

App::self(  );
$whmcs = ;
select_query( 'tblorders', '', array( 'id' => $orderid ) );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data['id'];
$orderid = ;

if (!$orderid) {
	$apiresults = array( 'result' => 'error', 'message' => 'Order ID Not Found' );
	return null;

	if ($cancelSubscription = (string)$whmcs->get_req_var( 'cancelsub' )) {
		ROOTDIR . '/includes/gatewayfunctions.php';
	}

	require_once(  );
	changeOrderStatus( $orderid, 'Fraud', $cancelSubscription );
	$msg = ;

	if ($msg == 'subcancelfailed') {
	}
}

$apiresults = array( 'result' => 'error', 'message' => 'Subscription Cancellation Failed - Please check the gateway log for further information' );
?>
