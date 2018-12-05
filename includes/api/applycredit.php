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

	if (!function_exists( 'applyCredit' )) {
		require( ROOTDIR . '/includes/invoicefunctions.php' );
		get_query_vals( 'tblinvoices', 'id,userid,credit,total,status', array( 'id' => $invoiceid ) );
		$data = ;
		$data['id'];
		$invoiceid = ;

		if (!$invoiceid) {
			$apiresults = array( 'result' => 'error', 'message' => 'Invoice ID Not Found' );
			return null;
			$data['userid'];
			$userid = ;
			$data['credit'];
			$credit = ;
			$data['total'];
			$total = ;
			$data['status'];
			$status = ;
			get_query_val( 'tblaccounts', 'SUM(amountin)-SUM(amountout)', array( 'invoiceid' => $invoiceid ) );
			$amountpaid = ;
			round( $total - $amountpaid, 2 );
			$balance = ;

			if ($amount == 'full') {
				$amount = (true ? $balance : round( $amount, 2 ));
				get_query_val( 'tblclients', 'credit', array( 'id' => $userid ) );
				$totalcredit = ;

				if ($status != 'Unpaid') {
					array( 'result' => 'error', 'message' => 'Invoice Not in Unpaid Status' );
				}
			}
		}
	}
}

$apiresults = ;
return null;
?>
