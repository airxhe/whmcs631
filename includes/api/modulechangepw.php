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

	if (!function_exists( 'ServerChangePassword' )) {
		require( ROOTDIR . '/includes/modulefunctions.php' );

		if (isset( $_POST['serviceid'] )) {
			$serviceid = (true ? $_POST['serviceid'] : $_POST['accountid']);
			select_query( 'tblhosting', 'packageid', array( 'id' => $serviceid ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data['packageid'];
			$packageid = ;

			if (!$packageid) {
				array( 'result' => 'error' );
			}
		}
	}

	$apiresults = array( 'message' => 'Service ID Not Found' );
	return false;

	if ($servicepassword) {
		update_query;
		'tblhosting';
		encrypt;
	}
}

( array( 'password' => ( $servicepassword ) ), array( 'id' => $serviceid ) );
ServerChangePassword( $serviceid );
$result = ;

if ($result == 'success') {
	$apiresults = array( 'result' => 'success' );
	return 1;
	array( 'result' => 'error' );
}

$apiresults = array( 'message' => $result );
?>
