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
	select_query( 'tblquotes', '', array( 'id' => $quoteid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$quoteid = ;

	if (!$quoteid) {
		array( 'result' => 'error', 'message' => 'Quote ID Not Found' );
	}

	$apiresults = ;
	return null;
	delete_query( 'tblquotes', array( 'id' => $quoteid ) );
	delete_query;
	'tblquoteitems';
}

( array( 'quoteid' => $quoteid ) );
$apiresults = array( 'result' => 'success' );
?>
