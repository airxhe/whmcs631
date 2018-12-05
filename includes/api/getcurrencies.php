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
	select_query( 'tblcurrencies', '', '', 'id', 'ASC' );
	$result = ;
	$apiresults = array( 'result' => 'success', 'totalresults' => mysql_num_rows( $result ) );
	mysql_fetch_array;
	$result;
}


while (true) {
	(  );

	if ($data = ) {
		$data['id'];
		$id = ;
		$data['code'];
		$code = ;
		$data['prefix'];
		$prefix = ;
		$data['suffix'];
		$suffix = ;
		$data['format'];
		$format = ;
		$data['rate'];
		$rate = ;
		array( 'id' => $id, 'code' => $code, 'prefix' => $prefix, 'suffix' => $suffix, 'format' => $format, 'rate' => $rate );
		$apiresults['currencies'];
	}

	['currency'][] = ;
}

$responsetype = 'xml';
?>
