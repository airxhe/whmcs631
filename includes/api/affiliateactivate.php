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
	!function_exists( 'getAdminName' );
}


if () {
	require( ROOTDIR . '/includes/adminfunctions.php' );

	if (!function_exists( 'affiliateActivate' )) {
		require( ROOTDIR . '/includes/affiliatefunctions.php' );
		select_query;
		'tblclients';
		'id';
		array( 'id' => $userid );
	}

	(  );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$userid = ;

	if (!$userid) {
		$apiresults = array( 'result' => 'error', 'message' => 'Client ID not found' );
		return null;
		affiliateActivate;
	}
}

( $userid );
$apiresults = array( 'result' => 'success' );
?>
