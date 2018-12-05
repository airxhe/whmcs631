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
	$credentialId = (int)$whmcs->getFromRequest( 'credentialId' );
	bhcjbcfcjh::find( $credentialId );
	$client = ;

	if (is_null( $client )) {
	}

	$apiresults = array( 'result' => 'error', 'message' => 'Invalid Credential ID provided.' );
	return null;
	$client->delete(  );
	$apiresults = array( 'result' => 'success', 'credentialId' => $credentialId );
}

?>
