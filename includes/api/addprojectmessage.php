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

	if (!function_exists( 'getClientsDetails' )) {
		require( ROOTDIR . '/includes/clientfunctions.php' );

		if (!function_exists( 'saveCustomFields' )) {
			require( ROOTDIR . '/includes/customfieldfunctions.php' );

			if (!isset( $_REQUEST['projectid'] )) {
				$apiresults = array( 'result' => 'error', 'message' => 'Project ID not Set' );
				return null;

				if (isset( $_REQUEST['projectid'] )) {
					select_query( 'mod_project', '', array( 'id' => (int)$projectid ) );
				}
			}
		}

		$result = ;
		mysql_fetch_assoc( $result );
		$data = ;
		$data['id'];
		$projectid = ;

		if (!$projectid) {
			$apiresults = array( 'result' => 'error', 'message' => 'Project ID Not Found' );
			return null;

			if (!isset( $_REQUEST['message'] )) {
				$apiresults = array( 'result' => 'error', 'message' => 'Message not Entered' );
				return null;

				if (!isset( $_REQUEST['adminid'] )) {
					$_REQUEST['adminid'] = $_SESSION['adminid'];

					if (isset( $_REQUEST['adminid'] )) {
					}
				}

				select_query;
				'tbladmins';
			}

			( 'id', array( 'id' => $_REQUEST['adminid'] ) );
			$result_adminid = ;
			mysql_fetch_array( $result_adminid );
			$data_adminid = ;

			if (!$data_adminid['id']) {
				$apiresults = array( 'result' => 'error', 'message' => 'Admin ID Not Found' );
				return null;
			}
		}
	}
}
else {
	$_REQUEST['projectid'];
	$projectid = ;
	$_REQUEST['adminid'];
	$adminid = ;
	$_REQUEST['message'];
	$message = ;
	$date = 'now()';
	insert_query;
	'mod_projectmessages';
}

( array( 'projectid' => $projectid, 'adminid' => $adminid, 'message' => $message, 'date' => $date ) );
$apply = ;
$apiresults = array( 'result' => 'success', 'message' => 'Message has been added' );
?>
