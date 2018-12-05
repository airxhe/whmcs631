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

	if (!function_exists( 'getClientsDetails' )) {
		require( ROOTDIR . '/includes/clientfunctions.php' );

		if (!function_exists( 'updateInvoiceTotal' )) {
			require( ROOTDIR . '/includes/invoicefunctions.php' );
			App::get_req_var( 'sendinvoice' );
			$sendInvoice = ;
			App::get_req_var( 'paymentmethod' );
			$paymentMethod = ;
			App::get_req_var( 'status' );
			$status = ;
			$createAsDraft = (string)App::get_req_var( 'draft' );
			chhjeidgjf::getInvoiceStatusValues(  );
			$invoiceStatuses = ;
			$defaultStatus = 'Unpaid';
			$doprocesspaid = false;
			select_query( 'tblclients', 'id', array( 'id' => $_POST['userid'] ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;

			if (!$data['id']) {
				$apiresults = array( 'result' => 'error', 'message' => 'Client ID Not Found' );
				return null;

				if (( $createAsDraft && $sendInvoice )) {
					$apiresults = array( 'result' => 'error', 'message' => 'Cannot create and send a draft invoice in a single API request. Please create and send separately.' );
					return null;
					$_POST['taxrate'];
					$taxrate = ;
					$_POST['taxrate2'];
					$taxrate2 = ;
					!$taxrate2;
				}
			}
		}
	}
}
?>
