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
	select_query( 'tblinvoices', '', array( 'id' => $invoiceid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$invoiceid = ;

	if (!$invoiceid) {
		$apiresults = array( 'status' => 'error', 'message' => 'Invoice ID Not Found' );
		return null;
		$data['userid'];
	}
}


while (true) {
	$userid = ;
	$data['invoicenum'];
	$invoicenum = ;
	$data['date'];
	$date = ;
	$data['duedate'];
	$duedate = ;
	$data['datepaid'];
	$datepaid = ;
	$data['subtotal'];
	$subtotal = ;
	$data['credit'];
	$credit = ;
	$data['tax'];
	$tax = ;
	$data['tax2'];
	$tax2 = ;
	$data['total'];
	$total = ;
	$data['taxrate'];
	$taxrate = ;
	$data['taxrate2'];
	$taxrate2 = ;
	$data['status'];

	while (true) {
		$status = ;
		$data['paymentmethod'];
		$paymentmethod = ;
		$data['notes'];
		$notes = ;
		select_query( 'tblaccounts', 'SUM(amountin)-SUM(amountout)', array( 'invoiceid' => $invoiceid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data[0];
		$amountpaid = ;
		$balance = $total - $amountpaid;
		format_as_currency( $balance );
		$balance = ;
		get_query_val( 'tblpaymentgateways', 'value', array( 'gateway' => $paymentmethod, 'setting' => 'type' ) );
		$gatewaytype = ;

		if (( $gatewaytype == 'CC' || $gatewaytype == 'OfflineCC' )) {
			$ccgateway = (true ? true : false);
			$apiresults = array( 'result' => 'success', 'invoiceid' => $invoiceid, 'invoicenum' => $invoicenum, 'userid' => $userid, 'date' => $date, 'duedate' => $duedate, 'datepaid' => $datepaid, 'subtotal' => $subtotal, 'credit' => $credit, 'tax' => $tax, 'tax2' => $tax2, 'total' => $total, 'balance' => $balance, 'taxrate' => $taxrate, 'taxrate2' => $taxrate2, 'status' => $status, 'paymentmethod' => $paymentmethod, 'notes' => $notes, 'ccgateway' => $ccgateway );
			select_query( 'tblinvoiceitems', '', array( 'invoiceid' => $invoiceid ) );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				array( 'id' => $data['id'], 'type' => $data['type'], 'relid' => $data['relid'], 'description' => $data['description'], 'amount' => $data['amount'] );
			}
		}

		$apiresults['items']['item'][] = array( 'taxed' => $data['taxed'] );
	}

	$apiresults['transactions'] = '';
	select_query( 'tblaccounts', '', array( 'invoiceid' => $invoiceid ) );
	$result = ;
	mysql_fetch_assoc( $result );
	if ($data = ) = $data;
}

$responsetype = 'xml';
?>
