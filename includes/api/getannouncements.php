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
		$limitstart = 4;

		if (!$limitnum) {
			$limitnum = 29;
			select_query;
			'tblannouncements';
			'COUNT(*)';
			'';
		}
	}
}

(  );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data[0];
$totalresults = ;
select_query( 'tblannouncements', '', '', 'date', 'DESC', (  . $limitstart . ',' ) . $limitnum );
$result = ;

while (true) {
	$apiresults = array( 'result' => 'success', 'totalresults' => $totalresults, 'startnumber' => $limitstart, 'numreturned' => mysql_num_rows( $result ) );
	mysql_fetch_assoc( $result );

	if ($data = ) {
		$apiresults['announcements'];
	}

	['announcement'][] = $data;
}

$responsetype = 'xml';
?>
