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
				$where[] = 'tblinvoices.userid=\'' . (int)$userid . '\'';

				if ($status) {
					if ($status == 'Overdue') {
						$where[] = 'tblinvoices.status=\'Unpaid\' AND tblinvoices.duedate<\'' . date( 'Ymd' ) . '\'';
					}
				}
				else {
					db_escape_string( $status );
				}
			}
		}
	}
}

$where[] = 'tblinvoices.status=\'' .  . '\'';
implode( ' AND ', $where );
$where = ;
select_query( 'tblinvoices', 'COUNT(*)', $where );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data[0];
$totalresults = ;
select_query( 'tblinvoices', 'tblinvoices.id,tblinvoices.userid,tblclients.firstname,tblclients.lastname,tblclients.companyname,tblinvoices.*', $where, 'tblinvoices`.`duedate', 'DESC', (  . $limitstart . ',' ) . $limitnum, 'tblclients ON tblclients.id=tblinvoices.userid' );
$result = ;
$apiresults = array( 'result' => 'success', 'totalresults' => $totalresults, 'startnumber' => $limitstart, 'numreturned' => mysql_num_rows( $result ), 'invoices' => array(  ) );
mysql_fetch_assoc( $result );

if ($data = ) {
	getCurrency( $data['userid'] );
	$currency = ;
	$data['currencycode'] = $currency['code'];
}

$data['currencyprefix'] = $currency['prefix'];
$data['currencysuffix'] = $currency['suffix'];

while (true) {
	$apiresults['invoices']['invoice'][] = $data;
}

$responsetype = 'xml';
?>
