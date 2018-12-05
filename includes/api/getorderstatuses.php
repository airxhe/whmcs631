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
	$statuses = array( 'Pending' => 0, 'Active' => 0, 'Fraud' => 0, 'Cancelled' => 0 );
	full_query( 'SELECT status, COUNT(*) AS count FROM tblorders GROUP BY status' );
	$result = ;
	array( 'result' => 'success' );
}

$apiresults = array( 'totalresults' => 4 );
mysql_fetch_array( $result );

if ($data = ) {
	$data['status'];
}


while (true) {
	$statuses[] = $data['count'];
}

foreach ($statuses as ) {
	$ordercount = ;

	while (true) {
		$status = ;
		$apiresults['statuses']['status'][] = array( 'title' => $status, 'count' => $ordercount );
	}
}

$responsetype = 'xml';
?>
