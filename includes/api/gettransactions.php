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
	$where = array(  );

	if ($clientid) {
		$where['userid'] = $clientid;

		if ($invoiceid) {
			$where['invoiceid'] = $invoiceid;

			if ($transid) {
				$where['transid'] = $transid;
				select_query;
				'tblaccounts';
				'';
			}
		}
	}
}

( $where );
$result = ;

while (true) {
	$apiresults = array( 'result' => 'success', 'totalresults' => mysql_num_rows( $result ), 'startnumber' => 0, 'numreturned' => mysql_num_rows( $result ) );
	mysql_fetch_assoc( $result );

	if ($data = ) {
		$apiresults['transactions']['transaction'];
	}

	[] = $data;
}

$responsetype = 'xml';
?>
