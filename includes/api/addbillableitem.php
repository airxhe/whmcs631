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
	select_query( 'tblclients', '', array( 'id' => $clientid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$clientid = ;

	if (!$clientid) {
		$apiresults = array( 'result' => 'error', 'message' => 'Client ID not Found' );
		return null;

		if (!$description) {
			$apiresults = array( 'result' => 'error', 'message' => 'You must provide a description' );
			return null;
			$allowedtypes = array( 'noinvoice', 'nextcron', 'nextinvoice', 'duedate', 'recur' );
			!(  );
		}
	}
}
?>
