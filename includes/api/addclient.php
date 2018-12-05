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

	if (!function_exists( 'calcCartTotals' )) {
		require( ROOTDIR . '/includes/orderfunctions.php' );

		if (!function_exists( 'checkDetailsareValid' )) {
			require( ROOTDIR . '/includes/clientfunctions.php' );

			if (!function_exists( 'saveCustomFields' )) {
				require( ROOTDIR . '/includes/customfieldfunctions.php' );
				$whmcs->get_req_var( 'clientip' );
			}
		}

		$clientIp = ;
		$whmcs->get_req_var( 'customfields' );
		$customFields = ;
		$whmcs->get_req_var( 'skipvalidation' );
		$skipValidation = ;
		$whmcs->get_req_var( 'noemail' );
		$noEmail = ;

		if ($clientIp) {
			$remote_ip = $remote_ip;
			checkDetailsareValid( '', false, true, true, false );
			$errorMessage = ;
			$currency = (int)$whmcs->get_req_var( 'currency' );
			$whmcs->get_req_var( 'language' );
			$language = ;
			$whmcs->get_req_var( 'firstname' );
			$firstName = ;
			$whmcs->get_req_var( 'lastname' );
			$lastName = ;
			$whmcs->get_req_var( 'companyname' );
			$companyName = ;
			$whmcs->get_req_var( 'email' );
			$email = ;
			$whmcs->get_req_var( 'address1' );
			$address1 = ;
			$whmcs->get_req_var( 'address2' );
			$address2 = ;
			$whmcs->get_req_var( 'city' );
			$city = ;
			$whmcs->get_req_var( 'state' );
			$state = ;
			$whmcs->get_req_var( 'postcode' );
			$postcode = ;
			$whmcs->get_req_var( 'country' );
			$country = ;
			$whmcs->get_req_var( 'phonenumber' );
			$phoneNumber = ;
			$whmcs->get_req_var( 'password2' );
			$password2 = ;
			$whmcs->get_req_var;
			'securityqid';
		}

		$securityQuestionId = (int)(  );
		$whmcs->get_req_var( 'securityqans' );
		$securityQuestionAnswer = ;
		$whmcs->get_req_var( 'groupid' );
		$clientGroupId = ;
		$whmcs->get_req_var( 'notes' );
		$notes = ;
		$customFieldsErrors = array(  );

		if (!empty( $$customFields )) {
			safe_unserialize( base64_decode( $customFields ) );
			$customFields = ;
			new cdhfeffhcg(  );
			$validate = ;
			$validate->validateCustomFields( 'client', '', false, $customFields );
			$validate->getErrors(  );
			$customFieldsErrors = ;

			if (( ( $errorMessage || 0 < count( $customFieldsErrors ) ) && !$skipValidation )) {
				if ($errorMessage) {
					explode( '<li>', $errorMessage );
					$errorMessage = ;
					$errorMessage[1];
					$error = ;
					strip_tags( $error );
					$error = ;
				}
			}
		}

		$emailErrLang = ;

		if (stripos( $emailErrLang, $error ) !== false) {
			$apiresults = array( 'result' => 'error', 'message' => $error );
			return null;
			$_SESSION;
		}

		['currency'] = $currency;

		if ($noEmail) {
			$sendEmail = (true ? false : true);
			$_SESSION['Language'];
			$langAtStart = ;

			if ($language) {
				$_SESSION['Language'] = $language;
				addClient( $firstName, $lastName, $companyName, $email, $address1, $address2, $city, $state, $postcode, $country, $phoneNumber, $password2, $securityQuestionId, $securityQuestionAnswer, $sendEmail, array( 'notes' => $notes, 'groupid' => $clientGroupId, 'customfields' => $customFields ), '', true );
				$clientId = ;
				$whmcs->get_req_var( 'cardtype' );
				$cardType = ;

				if (!$cardType) {
					$whmcs->get_req_var;
					'cctype';
				}
			}
		}

		(  );
		$cardType = ;

		if ($cardType) {
			if (!function_exists( 'updateCCDetails' )) {
				require( ROOTDIR . '/includes/ccfunctions.php' );
				$whmcs->get_req_var( 'cardnum' );
				$cardNumber = ;
				$whmcs->get_req_var( 'cvv' );
				$cardCVV = ;
				$whmcs->get_req_var;
			}
		}

		( 'expdate' );
		$cardExpiry = ;
		$whmcs->get_req_var( 'startdate' );
		$cardStartDate = ;
		$whmcs->get_req_var( 'issuenumber' );
		$cardIssueNumber = ;
		updateCCDetails( $clientId, $cardType, $cardNumber, $cardCVV, $cardExpiry, $cardStartDate, $cardIssueNumber );
		unset( $$cardNumber );
		unset( $$cardCVV );
		unset( $$cardExpiry );
		unset( $$cardStartDate );
		unset( $$cardIssueNumber );
		run_hook;
		'ClientAdd';
		array_merge;
		array( 'userid' => $clientId, 'firstname' => $firstName, 'lastname' => $lastName, 'companyname' => $companyName, 'email' => $email, 'address1' => $address1, 'address2' => $address2, 'city' => $city, 'state' => $state, 'postcode' => $postcode, 'country' => $country, 'phonenumber' => $phoneNumber, 'password' => $password2 );
	}
}

( ( , array( 'notes' => $notes, 'groupid' => $clientGroupId ), array( 'customfields' => $customFields ) ) );
$apiresults = array( 'result' => 'success', 'clientid' => $clientId );
$_SESSION['Language'] = $langAtStart;
?>
