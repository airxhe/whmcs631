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

	if (!function_exists( 'addTransaction' )) {
		require( ROOTDIR . '/includes/invoicefunctions.php' );
		App::self(  );
		$whmcs = ;

		if ($userid) {
			select_query( 'tblclients', 'id', array( 'id' => $userid ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;

			if (!$data['id']) {
				$apiresults = array( 'result' => 'error', 'message' => 'Client ID Not Found' );
				return null;

				if ($invoiceid) {
					select_query( 'tblinvoices', 'id', array( 'id' => (int)$_POST['invoiceid'] ) );
					$result = ;
					mysql_fetch_array( $result );
					$data = ;
					$data['id'];
				}
			}
		}
	}
}

$invoiceid = ;

if (!$invoiceid) {
	$apiresults = array( 'result' => 'error', 'message' => 'Invoice ID Not Found' );
	return null;

	if (!$paymentmethod) {
		$apiresults = array( 'result' => 'error', 'message' => 'Payment Method is required' );
		return null;

		if (( $transid && !isUniqueTransactionID( $transid, $paymentmethod ) )) {
			$apiresults = array( 'result' => 'error', 'message' => 'Transaction ID must be Unique' );
			return null;
			$whmcs->get_req_var( 'date' );
			$date = ;

			if (empty( $$date )) {
				fromMySQLDate( date( 'Y-m-d H:i:s' ) );
			}
		}
	}
}

$date = ;
addTransaction( $userid, $currencyid, $description, $amountin, $fees, $amountout, $paymentmethod, $transid, $invoiceid, $date, '', $rate );

if (( ( $userid && $credit ) && ( !$invoiceid || $invoiceid == 0 ) )) {
	if ($transid) {
		$description .= (  . ' (Trans ID: ' . $transid . ')' );
		insert_query( 'tblcredit', array( 'clientid' => $userid, 'date' => toMySQLDate( $date ), 'description' => $description, 'amount' => $amountin ) );
		update_query( 'tblclients', array( 'credit' => '+=' . $amountin ), array( 'id' => (int)$userid ) );

		if (0 < $invoiceid) {
			get_query_val;
			'tblaccounts';
			'SUM(amountin)-SUM(amountout)';
		}

		( array( 'invoiceid' => $invoiceid ) );
		$totalPaid = ;
		get_query_vals( 'tblinvoices', 'status, total', array( 'id' => $invoiceid ) );
		$invoiceData = ;
	}

	$balance = $invoiceData['total'] - $totalPaid;

	if (( $balance <= 0 && $invoiceData['status'] == 'Unpaid' )) {
		processPaidInvoice( $invoiceid, '', $date );
	}
}

$apiresults = array( 'result' => 'success' );
?>
