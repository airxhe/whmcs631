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

	if (!function_exists( 'RegSaveNameservers' )) {
		require( ROOTDIR . '/includes/registrarfunctions.php' );

		if ($domainid) {
			$where = array( 'id' => $domainid );
		}
	}
}

$domainid = ;
if (!$domainid) = $ns4;
$params['ns5'] = $ns5;
RegSaveNameservers( $params );
$values = ;

if ($values['error']) {
	$apiresults = array( 'result' => 'error', 'message' => 'Registrar Error Message', 'error' => $values['error'] );
	return false;

	if (!$values) {
	}
}

$values = array(  );
array_merge( array( 'result' => 'success' ), $values );
$apiresults = ;
?>
