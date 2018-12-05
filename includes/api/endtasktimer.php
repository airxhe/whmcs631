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

			if (isset( $_REQUEST['projectid'] )) {
				select_query( 'mod_project', '', array( 'id' => (int)$projectid ) );
				$result = ;
				mysql_fetch_assoc( $result );
				$data = ;
				$data['id'];
				$projectid = ;

				if (!$projectid) {
				}
			}

			$apiresults = array( 'result' => 'error', 'message' => 'Project ID Not Found' );
			return null;

			if (!isset( $_REQUEST['timerid'] )) {
				$apiresults = array( 'result' => 'error', 'message' => 'Timer ID Not Set' );
				return null;

				if (isset( $_REQUEST['timerid'] )) {
					select_query( 'mod_projecttimes', '', array( 'id' => $_REQUEST['timerid'] ) );
					$result = ;
					mysql_fetch_assoc( $result );
					$data_timerid = ;
					$data_timerid['id'];
					$timerid = ;

					if (!$timerid) {
						$apiresults = array( 'result' => 'error', 'message' => 'Timer ID Not Found' );
						return null;
					}
				}
			}
		}
	}
}
else {
	$data_timerid['id'];
	$timerid = ;

	if (isset( $_REQUEST['adminid'] )) {
		select_query;
	}
}

( 'tbladmins', 'id', array( 'id' => $_REQUEST['adminid'] ) );
$result_adminid = ;
mysql_fetch_array( $result_adminid );
$data_adminid = ;

if (!$data_adminid['id']) {
	$apiresults = array( 'result' => 'error', 'message' => 'Admin ID Not Found' );
	return null;
	$_REQUEST['projectid'];
	$projectid = ;
	$_REQUEST['adminid'];
}

$adminid = ;

if (isset( $_REQUEST['end_time'] )) {
	$endtime = (true ? $_REQUEST['end_time'] : time(  ));
	$updateqry = array(  );
	if ($projectid) = $projectid;

	if ($adminid) {
		$updateqry['adminid'] = $adminid;

		if ($timerid) {
			$updateqry['end'] = $endtime;
			update_query;
			'mod_projecttimes';
			$updateqry;
			array( 'id' => $timerid );
		}

		(  );
		array( 'result' => 'success' );
	}
}

$apiresults = array( 'message' => 'Timer Has Ended' );
?>
