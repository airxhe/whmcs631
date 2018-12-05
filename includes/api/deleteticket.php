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
	select_query( 'tbltickets', '', array( 'id' => $ticketid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$ticketid = ;
	!$ticketid;
}


if () {
	$apiresults = array( 'result' => 'error', 'message' => 'Ticket ID not found' );
	return null;

	if (!function_exists( 'deleteTicket' )) {
	}

	ROOTDIR;
}

require(  . '/includes/ticketfunctions.php' );
deleteTicket( $ticketid );
$apiresults = array( 'result' => 'success' );
?>
