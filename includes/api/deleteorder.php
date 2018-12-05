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
		function_exists;
	}
}


if (!( 'deleteOrder' )) {
	require( ROOTDIR . '/includes/orderfunctions.php' );
	select_query;
}

( 'tblorders', '', array( 'id' => (int)$orderid ) );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data['id'];
$orderid = ;

if (!$orderid) {
	$apiresults = array( 'result' => 'error', 'message' => 'Order ID not found' );
	return null;

	if (canOrderBeDeleted( $orderid )) {
		deleteOrder( $orderid );
		$apiresults = array( 'result' => 'success' );
		return 1;
		array( 'result' => 'error' );
	}
}

$apiresults = array( 'message' => 'The order status must be in Cancelled or Fraud to be deleted' );
?>
