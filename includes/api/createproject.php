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

	if (isset( $_REQUEST['userid'] )) {
		select_query( 'tblclients', 'id', array( 'id' => $_REQUEST['userid'] ) );
		$result_userid = ;
		mysql_fetch_array( $result_userid );
		$data_userid = ;

		if (!$data_userid['id']) {
			$apiresults = array( 'result' => 'error', 'message' => 'Client ID Not Found' );
			return null;
			$_REQUEST;
		}
	}


	if (!isset( ['adminid'] )) {
		$apiresults = array( 'result' => 'error', 'message' => 'Admin ID not Set' );
		return null;

		if (isset( $_REQUEST['adminid'] )) {
			select_query( 'tbladmins', 'id', array( 'id' => $_REQUEST['adminid'] ) );
			$result_adminid = ;
			mysql_fetch_array( $result_adminid );
			$data_adminid = ;

			if (!$data_adminid['id']) {
				$apiresults = array( 'result' => 'error', 'message' => 'Admin ID Not Found' );
				return null;
				trim;
			}
		}


		if (!( $_REQUEST['title'] )) {
			$apiresults = array( 'result' => 'error', 'message' => 'Project Title is Required.' );
			return null;

			if (isset( $_REQUEST['status'] )) {
				get_query_val( 'tbladdonmodules', 'value', array( 'module' => 'project_management', 'setting' => 'statusvalues' ) );
				$status = ;
				explode( ',', $status );
				$status_get = ;
				in_array;
				$_REQUEST['status'];
			}


			if (( , $status_get )) {
				$status_main = (true ? $status_get : $status_get[0]);

				if (!isset( $_REQUEST['created'] )) {
					date( 'Y-m-d' );
					$_REQUEST['created'];
				}
			}
		}

		$created = ;

		if (!isset( $_REQUEST['duedate'] )) {
			date;
			'Y-m-d';
		}

		$duedate = (true ? (  ) : $_REQUEST['duedate']);

		if (isset( $_REQUEST['completed'] )) {
			$completed = (true ? 1 : 0);
			insert_query;
			'mod_project';
		}
	}

	array( 'userid' => $_REQUEST['userid'], 'title' => $_REQUEST['title'], 'ticketids' => $_REQUEST['ticketids'], 'invoiceids' => $_REQUEST['invoiceids'], 'notes' => $_REQUEST['notes'] );
	$_REQUEST;
}

( array( 'adminid' => ['adminid'], 'status' => $status_main, 'created' => $created, 'duedate' => $duedate, 'completed' => $completed, 'lastmodified' => 'now()' ) );
$projectid = ;
$apiresults = array( 'result' => 'success', 'message' => 'Project has been created' );
?>
