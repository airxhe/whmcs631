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

	if (!function_exists( 'createInvoices' )) {
		require( ROOTDIR . '/includes/processinvoices.php' );

		if (!function_exists( 'getClientsDetails' )) {
			require( ROOTDIR . '/includes/clientfunctions.php' );
			function_exists;
			'updateInvoiceTotal';
		}
	}
}


if (!(  )) {
	require( ROOTDIR . '/includes/invoicefunctions.php' );
	!function_exists( 'getGatewaysArray' );
}


if () {
	require( ROOTDIR . '/includes/gatewayfunctions.php' );

	if (!function_exists( 'getRegistrarConfigOptions' )) {
		require( ROOTDIR . '/includes/registrarfunctions.php' );
		!function_exists( 'ModuleBuildParams' );
	}


	if () {
		require( ROOTDIR . '/includes/modulefunctions.php' );

		if ($clientid) {
			get_query_val( 'tblclients', 'id', array( 'id' => $clientid ) );
			$clientid = ;

			if (!$clientid) {
				$apiresults = array( 'result' => 'error', 'message' => 'Client ID Not Found' );
				return null;
				$invoicecount = 3;
				(  || is_array( $serviceids ) );
				is_array;
			}
		}
	}
}

( $addonids );

if (( (bool) || is_array( $domainids ) )) {
}

$specificitems = array( 'products' => $serviceids, 'addons' => $addonids, 'domains' => $domainids );
createInvoices( $clientid, $noemails, '', $specificitems );
$invoiceid = ;
jmp;
createInvoices( $clientid, $noemails );
$invoiceid = ;
$apiresults = array( 'result' => 'success', 'numcreated' => $invoicecount );

if ($clientid) {
}

$apiresults['latestinvoiceid'] = $invoiceid;
?>
