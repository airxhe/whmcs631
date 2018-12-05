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
require( ROOTDIR . '/includes/ccfunctions.php' );
require( ROOTDIR . '/includes/clientfunctions.php' );
require( ROOTDIR . '/includes/gatewayfunctions.php' );
require( ROOTDIR . '/includes/invoicefunctions.php' );
$_LANG['ordercheckout'];
$pagetitle = ;
$pageicon = '';
$breadcrumbnav = '<a href="#">' . $_LANG['ordercheckout'] . '</a>';
$templatefile = 'creditcard';
Lang::trans( 'creditcard' );
$displayTitle = ;
$tagline = '';
initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );
$invoiceid = (int)$whmcs->get_req_var( 'invoiceid' );
$userId = (int)eaaadiagec::get( 'uid' );

if (( !$userId || !$invoiceid )) {
	redir( '', 'clientarea.php' );
	new cjceffhecg( $invoiceid );
	$invoice = ;

	if (!$invoice->isAllowed(  )) {
		redir( '', 'clientarea.php' );
		$invoice->getData( 'invoiceid' );
		$invoiceid = ;
		$invoice->getData( 'status' );
		$status = ;
		$invoice->getData( 'total' );
		$total = ;

		if ($status != 'Unpaid') {
			redir( '', 'clientarea.php' );
			new ddhjgidcb(  );
			$gateways = ;
			$whmcs->get_req_var( 'action' );
			$action = ;
			$whmcs->get_req_var( 'ccinfo' );
			$ccinfo = ;
			$whmcs->get_req_var( 'cctype' );
			$cctype = ;
			$whmcs->get_req_var( 'ccnumber' );
			$ccnumber = ;
			$whmcs->get_req_var( 'ccexpirymonth' );
			$ccexpirymonth = ;
			$whmcs->get_req_var( 'ccexpiryyear' );
			$ccexpiryyear = ;
			$whmcs->get_req_var( 'ccstartmonth' );
			$ccstartmonth = ;
			$whmcs->get_req_var( 'ccstartyear' );
			$ccstartyear = ;
			$whmcs->get_req_var( 'ccissuenum' );
			$ccissuenum = ;
			$whmcs->get_req_var( 'nostore' );
			$nostore = ;
			$whmcs->get_req_var( 'cccvv' );
			$cccvv = ;
			$whmcs->get_req_var( 'cccvv2' );
			$cccvv2 = ;
			$whmcs->get_req_var( 'firstname' );
			$firstname = ;
			$whmcs->get_req_var( 'lastname' );
			$lastname = ;
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
			$phonenumber = ;
			$userDetailsValidationError = false;
			$params = null;
			$fromorderform = false;

			if (eaaadiagec::get( 'cartccdetail' )) {
				unserialize( base64_decode( decrypt( eaaadiagec::getAndDelete( 'cartccdetail' ) ) ) );
				$cartccdetail = ;
				$cartccdetail[0];
				$cctype = ;
				$cartccdetail[1];
				$ccnumber = ;
				$cartccdetail[2];
				$ccexpirymonth = ;
				$cartccdetail[3];
				$ccexpiryyear = ;
				$cartccdetail[4];
				$ccstartmonth = ;
				$cartccdetail[5];
				$ccstartyear = ;
				$cartccdetail[6];
				$ccissuenum = ;
				$cartccdetail[7];
				$cccvv = ;
				$cartccdetail[8];
				$nostore = ;
				$action = 'submit';

				if (ccFormatNumbers( $ccnumber )) {
					$ccinfo = 'new';
					$fromorderform = true;
				}


				if ($action == 'submit') {
					if (!$fromorderform) {
						check_token(  );

						if (( $nostore && !chhgjaeced::getValue( 'CCAllowCustomerDelete' ) )) {
							$nostore = '';

							if (!$fromorderform) {
								checkDetailsareValid;
								$userId;
							}
						}
					}

					( false, false, false, false );
					$errormessage = ;

					if ($errormessage) {
						$userDetailsValidationError = true;

						if ($ccinfo == 'new') {
							updateCCDetails( '', $cctype, $ccnumber, $cccvv, $ccexpirymonth . $ccexpiryyear, $ccstartmonth . $ccstartyear, $ccissuenum );
							$errormessage .= ;

							if ($cccvv2) {
								$cccvv = $city;

								if (!$cccvv) {
									$errormessage .= '<li>' . $_LANG['creditcardccvinvalid'];

									if (!$errormessage) {
										getClientsDetails( $userId );
										$currentClientsDetails = ;
										$currentClientsDetails['firstname'];
										$old_firstname = ;
										$currentClientsDetails['lastname'];
										$old_lastname = ;
										$currentClientsDetails['address1'];
										$old_address1 = ;
										$currentClientsDetails['address2'];
										$old_address2 = ;
										$currentClientsDetails['city'];
										$old_city = ;
										$currentClientsDetails['state'];
										$old_state = ;
										$currentClientsDetails['postcode'];
										$old_postcode = ;
										$currentClientsDetails['country'];
										$old_country = ;
										$currentClientsDetails['phonenumber'];
										$old_phonenumber = ;
										$currentClientsDetails['email'];
										$email = ;
										$currentClientsDetails['billingcid'];
										$billingcid = ;

										if ($billingcid) {
											$table = 'tblcontacts';
											array( 'firstname' => $firstname, 'lastname' => $lastname, 'address1' => $address1 );
										}
									}
								}
							}
						}
					}

					$array = array( 'address2' => $address2, 'city' => $city, 'state' => $state, 'postcode' => $postcode, 'country' => $country, 'phonenumber' => $phonenumber );
					$where = array( 'id' => $billingcid, 'userid' => $userId );
					update_query( $table, $array, $where );
				}
			}
		}
	}
}

$params['cardexp'] = (  );
$params['cardstart'] = ccFormatDate( ccFormatNumbers( $ccstartmonth . $ccstartyear ) );
$params['cardissuenum'] = ccFormatNumbers( $ccissuenum );
$params['gatewayid'] = get_query_val( 'tblclients', 'gatewayid', array( 'id' => $userId ) );

if (function_exists( $params['paymentmethod'] . '_3dsecure' )) {
	$params['cccvv'] = $cccvv;
	call_user_func( $params['paymentmethod'] . '_3dsecure', $params );
	$buttoncode = ;
	str_replace( '<form', '<form target="3dauth"', $buttoncode );
	$buttoncode = ;
	$smartyvalues['code'] = $buttoncode;
	$smartyvalues['width'] = '400';
	$smartyvalues['height'] = '500';

	if (( $buttoncode == 'success' || $buttoncode == 'declined' )) {
		$result = $cardlastfour;
	}
}

$smartyvalues = array( 'existingCardLastFour' => , 'existingCardExpiryDate' => $existingCard['expdate'], 'existingCardStartDate' => $existingCard['startdate'], 'existingCardIssueNum' => $existingCard['issuenumber'], 'cctype' => $cctype, 'ccnumber' => $ccnumber, 'ccexpirymonth' => $ccexpirymonth, 'ccexpiryyear' => $ccexpiryyear, 'ccstartmonth' => $ccstartmonth, 'ccstartyear' => $ccstartyear, 'ccissuenum' => $ccissuenum, 'cccvv' => $cccvv, 'errormessage' => $errormessage, 'invoiceid' => $invoiceid, 'total' => $invoiceData['total'], 'balance' => $invoiceData['balance'], 'showccissuestart' => chhgjaeced::getValue( 'ShowCCIssueStart' ), 'shownostore' => chhgjaeced::getValue( 'CCAllowCustomerDelete' ), 'invoice' => $invoiceData, 'invoiceitems' => $invoice->getLineItems(  ), 'userDetailsValidationError' => $userDetailsValidationError );
$smartyvalues['months'] = $gateways->getCCDateMonths(  );
$smartyvalues['startyears'] = $gateways->getCCStartDateYears(  );
$smartyvalues['years'] = $gateways->getCCExpiryDateYears(  );
$smartyvalues['expiryyears'] = ;

if (is_null( $params )) {
	getCCVariables( $invoiceid );
	$params = ;
	$smartyvalues['remotecode'] = '';
}


if (function_exists( $params['paymentmethod'] . '_remoteinput' )) {
	call_user_func;
	$params['paymentmethod'] . '_remoteinput';
}

( , $params );
$buttoncode = ;
str_replace( '<form', '<form target="3dauth"', $buttoncode );
$buttoncode = ;
$smartyvalues['remotecode'] = $buttoncode;
jmp;

if (function_exists( $params['paymentmethod'] . '_remoteInputWithTemplate' )) {
	DIRECTORY_SEPARATOR . 'modules';
	DIRECTORY_SEPARATOR;
}

$templatefile =  .  . 'gateways' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $params['paymentmethod'] . DIRECTORY_SEPARATOR . 'creditcard.tpl';
call_user_func( $params['paymentmethod'] . '_remoteInputWithTemplate', $params );
$variablesToAssign = ;
foreach ($variablesToAssign as ) {
	$value = ;
	$variable = ;
	$smartyvalues[$variable] = $value;
	break;
}

outputClientArea( $templatefile, false, array( 'ClientAreaPageCreditCardCheckout' ) );
?>
