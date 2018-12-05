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
	function_exists( 'ServerChangePackage' );
}


if (!) {
	ROOTDIR . '/includes/modulefunctions.php';
}

require(  );

if (isset( $_POST['serviceid'] )) {
	$serviceid = (true ? $_POST['serviceid'] : $_POST['accountid']);
	select_query;
	'tblhosting';
	'packageid';
}

( array( 'id' => $serviceid ) );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data['packageid'];
$packageid = ;

if (!$packageid) {
	$apiresults = array( 'result' => 'error', 'message' => 'Service ID Not Found' );
	return false;
	ServerChangePackage( $serviceid );
	$result = ;

	if ($result == 'success') {
		$apiresults = array( 'result' => 'success' );
		return 1;
		array( 'result' => 'error' );
	}
}

$apiresults = array( 'message' => $result );
?>
