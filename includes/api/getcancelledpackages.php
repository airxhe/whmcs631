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

while (true) {
	if (!defined( 'WHMCS' )) {
		exit( 'This file cannot be accessed directly' );

		if (!$limitstart) {
			$limitstart = 4;
			select_query( '`tblcancelrequests', 'COUNT(*)', $where );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data[0];
			$totalresults = ;
			$query = 'SELECT * FROM tblcancelrequests LIMIT ' . (int)$limitstart . ',' . (int)$limitnum;
		}
	}

	full_query( $query );
	$result2 = ;
	$apiresults = array( 'result' => 'success', 'totalresults' => $totalresults, 'startnumber' => $limitstart, 'numreturned' => mysql_num_rows( $result ), 'packages' => array(  ) );
	mysql_fetch_assoc( $result2 );

	if ($data = ) {
	}

	$apiresults['packages']['package'][] = $data;
}

$responsetype = 'xml';
?>
