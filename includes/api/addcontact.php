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

	if (!function_exists( 'addContact' )) {
		require( ROOTDIR . '/includes/clientfunctions.php' );
		select_query( 'tblclients', 'id', array( 'id' => $clientid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;

		if (!$data[0]) {
			$apiresults = array( 'result' => 'error', 'message' => 'Client ID Not Found' );
			return null;

			if ($permissions) {
				$permissions = (true ? explode( ',', $permissions ) : array(  ));

				if (count( $permissions )) {
					select_query;
					'tblclients';
					'id';
					array( 'email' => $email );
				}

				(  );
				$result = ;
				mysql_fetch_array( $result );
				$data = ;
				select_query;
				'tblcontacts';
				'id';
			}
		}
	}
}

( array( 'email' => $email, 'subaccount' => '1' ) );
$result = ;
mysql_fetch_array( $result );
$data2 = ;

if (( $data['id'] || $data2['id'] )) {
	$apiresults = array( 'result' => 'error', 'message' => 'Duplicate Email Address' );
	return null;

	if ($generalemails) {
		$generalemails = '1';

		if ($productemails) {
			$productemails = '1';

			if ($domainemails) {
				$domainemails = '1';

				if ($invoiceemails) {
					$invoiceemails = '1';

					if ($supportemails) {
						$supportemails = '1';
						addContact;
						$clientid;
					}
				}

				$firstname;
				$lastname;
				$companyname;
			}

			$email;
			$address1;
			$address2;
			$city;
			$state;
			$postcode;
		}
	}
}

( $country, $phonenumber, $password2, $permissions, $generalemails, $productemails, $domainemails, $invoiceemails, $supportemails );
$contactid = ;
$apiresults = array( 'result' => 'success', 'contactid' => $contactid );
?>
