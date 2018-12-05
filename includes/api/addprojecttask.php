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
				$apiresults = array( 'result' => 'error', 'message' => 'Project ID Not Set' );
				return null;

				if (isset( $_REQUEST['projectid'] )) {
					select_query( 'mod_project', '', array( 'id' => (int)$projectid ) );
					$result = ;
					mysql_fetch_assoc( $result );
					$data = ;
					$data['id'];
					$projectid = ;

					if (!$projectid) {
						$apiresults = array( 'result' => 'error', 'message' => 'Project ID Not Found' );
						return null;
						isset( $_REQUEST['userid'] );
					}
				}
			}
		}
	}
}


if () {
	select_query( 'tblclients', 'id', array( 'id' => $_REQUEST['userid'] ) );
	$result_userid = ;
	mysql_fetch_array( $result_userid );
	$data_userid = ;

	if (!$data_userid['id']) {
		$apiresults = array( 'result' => 'error', 'message' => 'Client ID Not Found' );
		return null;

		if (isset( $_REQUEST['adminid'] )) {
			select_query;
		}

		( 'tbladmins', 'id', array( 'id' => $_REQUEST['adminid'] ) );
		$result_adminid = ;
		mysql_fetch_array( $result_adminid );
		$data_adminid = ;

		if (!$data_adminid['id']) {
			$apiresults = array( 'result' => 'error', 'message' => 'Admin ID Not Found' );
			return null;
		}
	}
	else {
		isset( $_REQUEST['task'] );
	}
}


if (!) {
	$apiresults = array( 'result' => 'error', 'message' => 'A task description must be specified' );
	return null;
	get_query_val( 'mod_projecttasks', '`order`', array( 'projectid' => $projectid ), 'order', 'DESC' );
	$ordervalue = ;
	$_REQUEST['projectid'];
	$projectid = ;

	if (isset( $_REQUEST['adminid'] )) {
		$adminid = (true ? $data_adminid['id'] : 0);
		$_REQUEST['task'];
		$task = ;
		$_REQUEST['notes'];
		$notes = ;
		$_REQUEST['duedate'];
		$duedate = ;

		if (isset( $_REQUEST['completed'] )) {
			$completed = (true ? 1 : 0);

			if (isset( $_REQUEST['billed'] )) {
			}
		}
	}
}

$billed = (true ? 1 : 0);
$created = 'now()';
++$ordervalue;
insert_query( 'mod_projecttasks', array( 'projectid' => $projectid, 'adminid' => $adminid, 'task' => $task, 'notes' => $notes, 'completed' => $completed, 'created' => $created, 'duedate' => $duedate, 'billed' => $billed, 'order' => $ordervalue ) );
$apply = ;
$apiresults = array( 'result' => 'success', 'message' => 'Task has been added' );
?>
