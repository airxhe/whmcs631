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
	get_query_val;
	'tblclients';
	'id';
	array( 'id' => $userid );
}

(  );
$userid = ;

if (!$userid) {
	$apiresults = array( 'result' => 'error', 'message' => 'Client ID not found' );
	return null;

	if (!$notes) {
		$apiresults = array( 'result' => 'error', 'message' => 'Notes can not be empty' );
		return null;

		if ($sticky) {
			1;
		}
	}
}

$sticky = 0;
insert_query( 'tblnotes', array( 'userid' => $userid, 'adminid' => $_SESSION['adminid'], 'created' => 'now()', 'modified' => 'now()', 'note' => $notes, 'sticky' => $sticky ) );
$noteid = ;
$apiresults = array( 'result' => 'success', 'noteid' => $noteid );
?>
