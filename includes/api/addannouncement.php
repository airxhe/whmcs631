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
	dfdidhdbdc::decode( $title );
	$title = ;
	dfdidhdbdc::decode( $announcement );
	$announcement = ;

	if ($published) {
		$isPublished = (true ? '1' : '0');
		insert_query( 'tblannouncements', array( 'date' => $date, 'title' => $title, 'announcement' => $announcement, 'published' => $isPublished ) );
		$id = ;
		run_hook;
		'AnnouncementAdd';
		array( 'announcementid' => $id );
	}

	( array( 'date' => $date, 'title' => $title, 'announcement' => $announcement, 'published' => $isPublished ) );
	$apiresults = array( 'result' => 'success', 'announcementid' => $id );
}

?>
