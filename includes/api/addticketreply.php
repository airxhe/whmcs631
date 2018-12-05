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

	if (!function_exists( 'AddReply' )) {
		require( ROOTDIR . '/includes/ticketfunctions.php' );
		$useMarkdown = (string)(int)App::get_req_var( 'markdown' );
		$from = '';
		select_query( 'tbltickets', '', array( 'id' => $ticketid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['id'];
		$ticketid = ;

		if (!$ticketid) {
			$apiresults = array( 'result' => 'error', 'message' => 'Ticket ID Not Found' );
			return null;

			if ($clientid) {
				select_query( 'tblclients', 'id', array( 'id' => $clientid ) );
				$result = ;
				mysql_fetch_array;
			}
		}

		( $result );
		$data = ;

		if (!$data['id']) {
			$apiresults = array( 'result' => 'error', 'message' => 'Client ID Not Found' );
			return null;

			if ($contactid) {
				select_query( 'tblcontacts', 'id', array( 'id' => $contactid, 'userid' => $clientid ) );
				$result = ;
				mysql_fetch_array( $result );
				$data = ;

				if (!$data['id']) {
					$apiresults = array( 'result' => 'error', 'message' => 'Contact ID Not Found' );
					return null;
					(  || !$name );
				}
			}
		}
	}
}

!$email;

if (( (bool) && !$adminusername )) {
	$apiresults = array( 'result' => 'error', 'message' => 'Name and email address are required if not a client' );
	return null;
	$from = array( 'name' => $name, 'email' => $email );

	if (!$message) {
		array( 'result' => 'error', 'message' => 'Message is required' );
	}
}

$apiresults = ;
return null;
?>
