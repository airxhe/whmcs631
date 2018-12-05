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
	$projectid = (int)$_REQUEST['projectid'];
	$taskid = (int)$_REQUEST['taskid'];

	if (!$projectid) {
		$apiresults = array( 'result' => 'error', 'message' => 'Project ID is Required' );
		return null;

		if (!$taskid) {
			$apiresults = array( 'result' => 'error', 'message' => 'Task ID is Required' );
			return null;
			select_query;
			'mod_project';
			'';
			(int)$projectid;
		}
	}
}

( array( 'id' =>  ) );
$result = ;
mysql_fetch_assoc( $result );
$data = ;
$data['id'];
$projectid = ;

if (!$projectid) {
	$apiresults = array( 'result' => 'error', 'message' => 'Project ID Not Found' );
	return null;
	select_query( 'mod_projecttasks', 'id', array( 'id' => $_REQUEST['taskid'] ) );
	$result_taskid = ;
	mysql_fetch_array;
	$result_taskid;
}

(  );
$data_taskid = ;

if (!$data_taskid['id']) {
	$apiresults = array( 'result' => 'error', 'message' => 'Task ID Not Found' );
	return null;
	delete_query;
	'mod_projecttasks';
	array( 'id' => $taskid );
}

( array( 'projectid' => $projectid ) );
$apiresults = array( 'result' => 'success', 'message' => 'Task has been deleted' );
?>
