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
	select_query( 'tblclients', 'id', array( 'id' => $clientid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	!$data['id'];
}


if () {
	$apiresults = array( 'result' => 'error', 'message' => 'Client ID Not Found' );
	return 1;
	insert_query( 'tblcredit', array( 'clientid' => $clientid, 'date' => 'now()', 'description' => $description, 'amount' => $amount ) );
	update_query( 'tblclients', array( 'credit' => '+=' . $amount ), array( 'id' => (int)$clientid ) );
	getCurrency( $clientid );
	$currency = ;
	logActivity(  . 'Added Credit - User ID: ' . $clientid . ' - Amount: ' . formatCurrency( $amount ), $clientid );
	select_query;
	'tblclients';
	'';
}

( array( 'id' => $clientid ) );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data['credit'];
$creditbalance = ;
$apiresults = array( 'result' => 'success', 'newbalance' => $creditbalance );
?>
