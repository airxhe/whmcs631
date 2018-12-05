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

	if (!isset( $_REQUEST['projectid'] )) {
		$apiresults = array( 'result' => 'error', 'message' => 'Project ID Not Set' );
		return null;
		select_query;
	}

	( 'mod_project', '', array( 'id' => (int)$projectid ) );
	$result = ;
	mysql_fetch_assoc( $result );
	$data = ;
	$data['id'];
	$projectid = ;

	if (!$projectid) {
		$apiresults = array( 'result' => 'error', 'message' => 'Project ID Not Found' );
		return null;

		while (true) {
			$apiresults['projectinfo'] = $data;
			select_query( 'mod_projecttasks', '', array( 'projectid' => (int)$projectid ) );
			$result_task = ;
			mysql_fetch_assoc( $result_task );
			if ($data_tasks = ) = ;
			$data_tasks['timelogs']['timelog'][] = $DATA;
		}


		while (true) {
			$apiresults['tasks']['task'][] = $data_tasks;
		}

		$apiresults['messages'] = array(  );
		select_query;
	}

	'mod_projectmessages';
	'';
	array( 'projectid' => (int)$projectid );
}

(  );
$result_message = ;
mysql_fetch_assoc( $result_message );

if ($DATA_message = ) {
	$apiresults['messages']['message'][] = $DATA_message;
}

jmp;
?>
