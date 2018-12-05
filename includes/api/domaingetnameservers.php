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

	if (!function_exists( 'RegGetNameservers' )) {
		ROOTDIR . '/includes/registrarfunctions.php';
	}

	require(  );
	select_query( 'tbldomains', 'id,domain,registrar,registrationperiod', array( 'id' => $domainid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data[0];
	$domainid = ;

	if (!$domainid) {
		$apiresults = array( 'result' => 'error', 'message' => 'Domain ID Not Found' );
		return false;
		$data['domain'];
		$domain = ;
		$data['registrar'];
		$registrar = ;
		$data['registrationperiod'];
		$regperiod = ;
		explode( '.', $domain, 2 );
		$domainparts = ;
		$params = array(  );
		$params['domainid'] = $domainid;
	}

	$params['sld'] = $domainparts[0];
	$params['tld'] = $domainparts[1];
	$params['regperiod'] = $regperiod;
	$params['registrar'] = $registrar;
	RegGetNameservers;
}

( $params );
$values = ;

if (isset( $values['na'] )) {
	$apiresults = array( 'result' => 'error', 'message' => 'Registrar Function Not Supported' );
	return false;

	if ($values['error']) {
		array( 'result' => 'error', 'message' => 'Registrar Error Message', 'error' => $values['error'] );
	}
}

$apiresults = ;
return false;
?>
