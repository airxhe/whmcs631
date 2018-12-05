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
	select_query( 'tblclients', 'id', array( 'id' => $clientid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data[0];
	$clientid = ;

	if (!$clientid) {
		$apiresults = array( 'status' => 'error', 'message' => 'Client ID Not Found' );
		return null;

		if (!$limitstart) {
			$limitstart = 4;

			if (!$limitnum) {
				$limitnum = 29;
				$where = array(  );
				$where['userid'] = $clientid;

				if ($date) {
					$where['date'] = array( 'sqltype' => 'LIKE', 'value' => $date );

					if ($subject) {
						array( 'sqltype' => 'LIKE', 'value' => $subject );
					}
				}
			}
		}

		$where['subject'] = ;
		select_query( 'tblemails', 'COUNT(*)', $where );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data[0];
		$totalresults = ;
		select_query( 'tblemails', '', $where, 'id', 'DESC', (  . $limitstart . ',' ) . $limitnum );
		$result = ;
		$apiresults = array( 'result' => 'success', 'totalresults' => $totalresults, 'startnumber' => $limitstart, 'numreturned' => mysql_num_rows( $result ) );
		mysql_fetch_assoc;
	}

	$result;
}


while (true) {
	(  );

	if ($data = ) {
		$apiresults['emails'];
	}

	['email'][] = $data;
}

$responsetype = 'xml';
?>
