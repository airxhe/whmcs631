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
	select_query( 'tblannouncements', 'id', array( 'id' => $announcementid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;

	if (!$data['id']) {
		$apiresults = array( 'result' => 'error', 'message' => 'Announcement ID Not Found' );
		return false;
		delete_query( 'tblannouncements', array( 'id' => $announcementid ) );
		delete_query;
		'tblannouncements';
		array( 'parentid' => $announcementid );
	}
}

(  );
$apiresults = array( 'result' => 'success', 'announcementid' => $announcementid );
?>
