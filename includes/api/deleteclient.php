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

	if (!function_exists( 'deleteClient' )) {
		require( ROOTDIR . '/includes/clientfunctions.php' );
		select_query( 'tblclients', 'id', array( 'id' => $clientid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['id'];
	}


	if (!) {
		$apiresults = array( 'result' => 'error', 'message' => 'Client ID Not Found' );
		return 1;
		deleteClient;
		$_POST;
	}
}

( ['clientid'] );
$apiresults = array( 'result' => 'success', 'clientid' => $_POST['clientid'] );
?>
