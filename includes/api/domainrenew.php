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

	if (!function_exists( 'RegRenewDomain' )) {
		require( ROOTDIR . '/includes/registrarfunctions.php' );

		if ($domainid) {
			select_query;
			'tbldomains';
			'id';
		}

		( array( 'id' => $domainid ) );
		$result = ;
	}

	$data = ;
	$data[0];
	$domainid = ;

	if (!$domainid) {
		$apiresults = array( 'result' => 'error', 'message' => 'Domain Not Found' );
		return false;

		if ($regperiod) {
		}
	}
}

update_query( 'tbldomains', array( 'registrationperiod' => $regperiod ), array( 'id' => $domainid ) );
$params = array( 'domainid' => $domainid );
RegRenewDomain( $params );
$values = ;

if ($values['error']) {
	$apiresults = array( 'result' => 'error', 'message' => 'Registrar Error Message', 'error' => $values['error'] );
	return false;
	array_merge( array( 'result' => 'success' ), $values );
}

$apiresults = ;
?>
