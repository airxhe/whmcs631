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

	if (!function_exists( 'addInvoicePayment' )) {
	}
}

require( ROOTDIR . '/includes/invoicefunctions.php' );
iciahfajh::getInstance(  );
$whmcs = ;
$id = (int)$whmcs->get_req_var( 'invoiceid' );
$where = array( 'id' => $id );
select_query( 'tblinvoices', 'id', $where );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data['id'];
$invoiceid = ;

if (!$invoiceid) {
	$apiresults = array( 'result' => 'error', 'message' => 'Invoice ID Not Found' );
	return null;
	new cjceffhecg( $invoiceid );
	$invoice = ;
	$invoice->getData( 'status' );
	$invoiceStatus = ;

	if ($invoiceStatus == 'Cancelled') {
		$apiresults = array( 'result' => 'error', 'message' => 'It is not possible to add a payment to an invoice that is Cancelled' );
		return null;
		$whmcs->get_req_var( 'date' );
		$date = ;

		if ($date) {
			$date = (true ? fromMySQLDate( $date ) : '');
			$whmcs->get_req_var( 'date2' );
			$date2 = ;

			if ($date2) {
				fromMySQLDate( $date2 );
				$date = ;
				$whmcs->get_req_var( 'transid' );
				$transid = ;
				$whmcs->get_req_var;
			}
		}
	}

	( 'amount' );
	$amount = ;
	$whmcs->get_req_var( 'fees' );
	$fees = ;
	$whmcs->get_req_var( 'gateway' );
	$gateway = ;
	$whmcs->get_req_var( 'noemail' );
	$noemail = ;
	addInvoicePayment( $invoiceid, $transid, $amount, $fees, $gateway, $noemail, $date );
}

$apiresults = array( 'result' => 'success' );
?>
