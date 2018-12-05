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
		$where = array(  );

		if ($clientid) {
			$where['id'] = $clientid;
			jmp;

			if ($email) {
				$where['email'] = $email;
			}

			( 'tblclients', 'id', $where );
			$result = ;
			mysql_fetch_array;
			$result;
		}
	}

	(  );
	$data = ;
	$data['id'];
	$clientid = ;

	if (!$clientid) {
		$apiresults = array( 'result' => 'error', 'message' => 'Client Not Found' );
		return null;
		getClientsDetails( $clientid );
		$clientsdetails = ;
		full_query( 'SELECT code FROM tblcurrencies WHERE id=' . (int)$clientsdetails['currency'] );
		$currency_result = ;
		mysql_fetch_assoc( $currency_result );
		$currency = ;
		$clientsdetails['currency_code'] = $currency['code'];

		if ($responsetype == 'xml') {
			$apiresults = array( 'result' => 'success', 'client' => $clientsdetails );
		}
	}
}

$apiresults = array( 'client' => $clientsdetails, 'stats' => getClientsStats( $clientid ) );
?>
