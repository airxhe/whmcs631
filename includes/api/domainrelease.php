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

	if (!function_exists( 'RegSaveRegistrarLock' )) {
		require( ROOTDIR . '/includes/registrarfunctions.php' );

		if ($domainid) {
			$where = array( 'id' => $domainid );
		}
	}

	$data[0];
	$domainid = ;

	if (!$domainid) {
		$apiresults = array( 'result' => 'error', 'message' => 'Domain Not Found' );
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
		$params['sld'] = $domainparts[0];
		$params['tld'] = $domainparts[1];
		$params['regperiod'] = $regperiod;
		$params['registrar'] = $registrar;
		$params['transfertag'] = $newtag;
		RegReleaseDomain;
	}

	( $params );
	$values = ;

	if ($values['error']) {
	}
}

$apiresults = array( 'result' => 'error', 'message' => 'Registrar Error Message', 'error' => $values['error'] );
return false;
?>
