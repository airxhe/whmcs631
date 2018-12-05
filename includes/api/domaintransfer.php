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

	if (!function_exists( 'RegTransferDomain' )) {
	}
}

require( ROOTDIR . '/includes/registrarfunctions.php' );

if ($domainid) {
	select_query( 'tbldomains', 'id', array( 'id' => $domainid ) );
	$result = ;
	jmp;
	select_query( 'tbldomains', 'id', array( 'domain' => $domain ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data[0];
	$domainid = ;

	if (!$domainid) {
		$apiresults = array( 'result' => 'error', 'message' => 'Domain Not Found' );
		return false;
		$params = array( 'domainid' => $domainid );

		if ($eppcode) {
			$params['transfersecret'] = $eppcode;
			RegTransferDomain( $params );
			$values = ;

			if ($values['error']) {
				array( 'result' => 'error', 'message' => 'Registrar Error Message', 'error' => $values['error'] );
			}
		}
	}
}

$apiresults = ;
return false;
?>
