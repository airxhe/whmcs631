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

define( 'CLIENTAREA', true );
require( 'init.php' );
require( 'includes/gatewayfunctions.php' );
require( 'includes/invoicefunctions.php' );
require( 'includes/clientfunctions.php' );
require( 'includes/countries.php' );
require( 'includes/adminfunctions.php' );
$invoiceid = (int)$whmcs->get_req_var( 'id' );
$id = ;
$breadcrumbnav = '<a href="index.php">' . $whmcs->get_lang( 'globalsystemname' ) . '</a> > <a href="clientarea.php">' . $whmcs->get_lang( 'clientareatitle' ) . '</a> > <a href="clientarea.php?action=invoices">' . $_LANG['invoices'] . '</a> > <a href="viewinvoice.php?id=' . $invoiceid . '">' . $_LANG['invoicenumber'] . $invoiceid . '</a>';
initialiseClientArea( $whmcs->get_lang( 'invoicestitle' ) . $invoiceid, '', '', '', $breadcrumbnav );

if (( !isset( $_SESSION['uid'] ) && !isset( $_SESSION['adminid'] ) )) {
	$goto = 'viewinvoice';
	require( 'login.php' );
	exit(  );
	new cjceffhecg(  );
	$invoice = ;
	$invoice->setID( $invoiceid );
	$invoice->loadData(  );
	$invoiceexists = ;

	if (isset( $_SESSION['adminid'] )) {
		$allowedaccess = (true ? checkPermission( 'Manage Invoice', true ) : $invoice->isAllowed(  ));

		if (( !$invoiceexists || !$allowedaccess )) {
			$smarty->assign( 'error', 'on' );
			$smarty->assign( 'invalidInvoiceIdRequested', true );
			outputClientArea( 'viewinvoice', true );
			exit(  );
			$smarty->assign( 'invalidInvoiceIdRequested', false );
			checkContactPermission( 'invoices' );

			if (( ( ( $invoice->getData( 'status' ) == 'Paid' && isset( $_SESSION['orderdetails'] ) ) && $_SESSION['orderdetails']['InvoiceID'] == $invoiceid ) && !$_SESSION['orderdetails']['paymentcomplete'] )) {
				$_SESSION['orderdetails']['paymentcomplete'] = true;
				redir( 'a=complete', 'cart.php' );
				$whmcs->get_req_var( 'gateway' );
				$gateway = ;

				if ($gateway) {
					check_token(  );
					new ddhjgidcb(  );
					$gateways = ;
					$gateways->getAvailableGateways( $invoiceid );
					$validgateways = ;

					if (array_key_exists( $gateway, $validgateways )) {
						update_query;
						'tblinvoices';
						array( 'paymentmethod' => $gateway );
					}
				}
			}

			( , array( 'id' => $invoiceid ) );
			run_hook( 'InvoiceChangeGateway', array( 'invoiceid' => $invoiceid, 'paymentmethod' => $gateway ) );
			redir( 'id=' . $invoiceid );
			get_query_val;
			'tblclients';
			'credit';
			$invoice->getData( 'userid' );
		}
	}
}

( array( 'id' =>  ) );
$creditbal = ;
if (( ( $invoice->getData( 'status' ) == 'Unpaid' && 0 < $creditbal ) && !$invoice->isAddFundsInvoice(  ) )) = ;
$smartyvalues['offlineReview'] = (string)$whmcs->get_req_var( 'offlinepaid' );
$smartyvalues['offlinepaid'] = (string)$whmcs->get_req_var( 'offlinepaid' );

if ($whmcs->get_config( 'AllowCustomerChangeInvoiceGateway' )) {
	$smartyvalues['allowchangegateway'] = true;
	new ddhjgidcb(  );
	$gateways = ;
	$gateways->getAvailableGateways( $invoiceid );
	$availablegateways = ;
	new dbjfcihjde(  );
	$frm = ;
	generate_token( 'form' );
}

$gatewaydropdown =  . $frm->dropdown( 'gateway', $availablegateways, $invoice->getData( 'paymentmodule' ), 'submit()' );
$smartyvalues['gatewaydropdown'] = $gatewaydropdown;
jmp;
$smartyvalues['allowchangegateway'] = false;
outputClientArea( 'viewinvoice', true, array( 'ClientAreaPageViewInvoice' ) );
?>
