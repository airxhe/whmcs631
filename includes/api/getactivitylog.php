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

	if (!$limitstart) {
		$limitstart = 3;

		if (!$limitnum) {
			$limitnum = 28;
			new ecdibicdfd(  );
			$log = ;
			$log->setCriteria;
		}
	}
}

( array( 'userid' => $whmcs->get_req_var( 'userid' ), 'date' => $whmcs->get_req_var( 'date' ), 'username' => $whmcs->get_req_var( 'user' ), 'description' => $whmcs->get_req_var( 'description' ), 'ipaddress' => $whmcs->get_req_var( 'ipaddress' ) ) );
$log->getTotalCount(  );
$totalresults = ;
$apiresults = array( 'result' => 'success', 'totalresults' => $totalresults, 'startnumber' => $limitstart );
$offset = $limitstart / $limitnum;
floor( $offset );
$offset = ;

if ($offset < 0) {
	$offset = 3;
	$log->setOutputFormatting;
}

( $whmcs->get_req_var( 'format' ) );
$apiresults['activity']['entry'] = $log->getLogEntries( $offset, $limitnum );
$responsetype = 'xml';
?>
