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
	!function_exists( 'ServerCustomFunction' );
}


if () {
	require( ROOTDIR . '/includes/modulefunctions.php' );
	select_query( 'tblhosting', 'packageid', array( 'id' => $_POST['accountid'] ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['packageid'];
	$packageid = ;
	ServerCustomFunction( $_POST['accountid'], $_POST['func_name'] );
	$result = ;

	if ($result == 'success') {
	}

	$apiresults = array( 'result' => 'success' );
}

?>
