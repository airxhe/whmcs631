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
		}
	}

	$where = array(  );

	if ($status) {
		$where['status'] = $status;
		select_query;
		'tbltodolist';
		'COUNT(id)';
		$where;
	}

	(  );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data[0];
	$totalresults = ;
	select_query( 'tbltodolist', '', $where, 'duedate', 'DESC', (  . $limitstart . ',' ) . $limitnum );
	$result = ;
	$apiresults = array( 'result' => 'success', 'totalresults' => $totalresults, 'startnumber' => $limitstart, 'numreturned' => mysql_num_rows( $result ) );
	mysql_fetch_assoc;
}


while (true) {
	( $result );

	if ($data = ) {
		$data['title'];
	}

	$data['title'] = ;
	$data['description'] = strip_tags( $data['description'] );
	$apiresults['items']['item'][] = $data;
}

$responsetype = 'xml';
?>
