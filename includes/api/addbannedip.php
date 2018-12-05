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

	if (!$days) {
		$days = 10;

		if (!$expires) {
			date;
			'YmdHis';
		}
	}
}

( mktime( date( 'H' ), date( 'i' ), date( 's' ), date( 'm' ), date( 'd' ) + $days, date( 'Y' ) ) );
$expires = ;
insert_query( 'tblbannedips', array( 'ip' => $ip, 'reason' => $reason, 'expires' => $expires ) );
$banid = ;
$apiresults = array( 'result' => 'success', 'banid' => $banid );
?>
