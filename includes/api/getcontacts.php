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
			$where = array(  );

			if ($userid) {
				$where['userid'] = $userid;

				if ($firstname) {
					$where['firstname'] = $firstname;

					if ($lastname) {
					}
				}
			}
		}

		$where['lastname'] = $lastname;
		if ($lastname) = $state;

		if ($postcode) {
			$where['postcode'] = $postcode;
			if ($country) = '1';
			select_query( 'tblcontacts', 'COUNT(*)', $where );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data[0];
			$totalresults = ;
			select_query;
			'tblcontacts';
			'';
			$where;
			'id';
			'ASC';
		}
	}
}

( (  . $limitstart . ',' ) . $limitnum );
$result = ;
$apiresults = array( 'result' => 'success', 'totalresults' => $totalresults, 'startnumber' => $limitstart, 'numreturned' => mysql_num_rows( $result ) );
mysql_fetch_assoc( $result );

if ($data = ) {
	$apiresults['contacts']['contact'][] = $data;
}

jmp;
?>
