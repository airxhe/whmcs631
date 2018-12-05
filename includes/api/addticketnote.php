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

	if (!function_exists( 'getAdminName' )) {
		ROOTDIR;
	}

	require(  . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'adminfunctions.php' );

	if (!function_exists( 'AddNote' )) {
		require( ROOTDIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'ticketfunctions.php' );
		App::get_req_var( 'ticketnum' );
		$ticketnum = ;
		$ticketid = (int)App::get_req_var( 'ticketid' );
	}
}

$useMarkdown = (string)(int)App::get_req_var( 'markdown' );

if ($ticketnum) {
	select_query( 'tbltickets', 'id', array( 'tid' => $ticketnum ) );
	$result = ;
	select_query;
	'tbltickets';
	'id';
	array( 'id' => $ticketid );
}

(  );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data['id'];
$ticketid = ;

if (!$ticketid) {
	$apiresults = array( 'result' => 'error', 'message' => 'Ticket ID not found' );
	return null;
	AddNote( $ticketid, $message, $useMarkdown );
}

$apiresults = array( 'result' => 'success' );
?>
