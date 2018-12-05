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

	if (!function_exists( 'RegGetEPPCode' )) {
		require( ROOTDIR . '/includes/registrarfunctions.php' );
		select_query;
	}

	( 'tbldomains', 'id,domain,registrar,registrationperiod', array( 'id' => $domainid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data[0];
	$domainid = ;

	if (!$domainid) {
		array( 'result' => 'error', 'message' => 'Domain ID Not Found' );
	}

	$apiresults = ;
}

return false;
?>
