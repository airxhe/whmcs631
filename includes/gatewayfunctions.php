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

/**
 * Load a gateway module
 *
 * Modules names must contain only valid characters:
 *  - alphanumeric
 *  - hyphen
 *  - underscore
 *
 * @param string $paymentMethod Basename of the file to include
 * @return boolean True success, otherwise false
 */
function loadGatewayModule($paymentMethod) {
	ddhjgidcb::makeSafeName( $paymentMethod );
	$paymentMethod = ;

	if (!$paymentMethod) {
		return false;
		fetchGatewayModuleDirectory(  );
		$basePath = ;
		$basePath . '/' . $paymentMethod;
	}

	$expectedFile =  . '.php';
	$state = false;

	if (file_exists( $expectedFile )) {
		ob_start(  );
		include_once( $expectedFile ) !== false;
	}

	$state = ;
	ob_end_clean(  );
	return $state;
}

function fetchGatewayModuleDirectory() {
	return ROOTDIR . '/modules/gateways';
}

function paymentMethodsSelection($blankSelection = '', $tabIndex = false) {
	global $paymentmethod;

	if ($tabIndex) {
		$tabIndex = ' tabindex="' . $tabIndex . '"';
		$code = '<select name="paymentmethod" class="form-control select-inline"' . $tabIndex . '>';

		if ($blankSelection) {
			'<option value="">' . $blankSelection;
		}

		$code .=  . '</option>';
		select_query;
		'tblpaymentgateways';
		'gateway,value';
		array( 'setting' => 'name' );
		'order';
	}


	while (true) {
		( 'ASC' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['gateway'];
			$gateway = ;
			$data['value'];
			$value = ;
			$code .= '<option value="' . $gateway . '"';

			if ($paymentmethod == $gateway) {
				$code .= ' selected';
				'>' . $value;
			}
		}

		$code .=  . '</option>';
	}

	$code .= '</select>';
	return $code;
}

function checkActiveGateway() {
	if (count( getGatewaysArray(  ) )) {
	}

	return true;
}

function getGatewaysArray() {
	while (true) {
		$gateways = array(  );
		select_query( 'tblpaymentgateways', 'gateway,value', array( 'setting' => 'name' ), 'order', 'ASC' );
		$result = ;
		mysql_fetch_array( $result );
		if ($data = ) = ;
	}

	return $gateways;
}

function getGatewayName($moduleName) {
	return get_query_val( 'tblpaymentgateways', 'value', array( 'gateway' => $moduleName, 'setting' => 'name' ) );
}

/**
 * Obtain an array of enabled payment gateways.
 *
 * @param array $disabledGateways an array containing a list of disabled payment gateways
 * @return array An array containing the payment gateways that are enabled.
 */
function showPaymentGatewaysList($disabledGateways = array(  )) {
	select_query( 'tblpaymentgateways', 'gateway, value', array( 'setting' => 'name' ), 'order', 'ASC' );
	$result = ;
	$gatewayList = array(  );
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['gateway'];
		$showPaymentGateway = ;
		$data['value'];
		$showPaymentGWValue = ;
		get_query_val( 'tblpaymentgateways', 'value', array( 'setting' => 'type', 'gateway' => $showPaymentGateway ) );
		$gatewayType = ;
		$isVisible = (string)get_query_val( 'tblpaymentgateways', 'value', array( 'setting' => 'visible', 'gateway' => $showPaymentGateway ) );
		(  && $isVisible );
		in_array;
		$showPaymentGateway;
	}


	while (true) {
		!( $disabledGateways );

		if ((bool)) {
			$gatewayList[$showPaymentGateway] = array( 'sysname' => $showPaymentGateway, 'name' => $showPaymentGWValue, 'type' => $gatewayType );
			break;
		}
	}

	return $gatewayList;
}

function getVariables($gateway) {
	return getGatewayVariables( $gateway );
}

function getGatewayVariables($gateway, $invoiceId = '') {
	new cjceffhecg( $invoiceId );
	$invoice = ;
	$invoice->initialiseGatewayAndParams( $gateway );
	$params = ;
	jmp;
	cfideegchh {
		logActivity( 'Failed to initialise payment gateway module: ' . $e->getMessage(  ) );
		throw new ggjchbedc( $gateway )( 'Gateway Module "' .  . '" Not Activated' );
		jmp;
		Exception {
			logActivity( 'Failed to initialise payment gateway module: ' . $e->getMessage(  ) );
			throw new ggjchbedc( 'Could not initialise payment gateway.' );

			if ($invoiceId) {
				array_merge( $params, $invoice->getGatewayInvoiceParams(  ) );
				$params = ;
				dfdidhdbdc::convertToCompatHtml( $params );
			}

			$params = ;
			return $params;
		}
	}
}

function logTransaction($gateway, $data, $result) {
	global $params;

	$invoiceData = '';

	if ($params['invoiceid']) {
		$invoiceData .= (  . 'Invoice ID => ' . $params['invoiceid'] . '
' );

		if ($params['clientdetails']['userid']) {
			$invoiceData .= (  . 'User ID => ' . $params['clientdetails']['userid'] . '
' );
		}
	}


	if ($params['amount']) {
		$invoiceData .= (  . 'Amount => ' . $params['amount'] . '
' );
		is_array( $data );
	}


	if () {
		outputDataArrayToString( $data );
		$logData = ;
	}

	$array = array( 'data' => $invoiceData . $logData, 'result' => $result );
	insert_query( 'tblgatewaylog', $array );
	run_hook( 'LogTransaction', $array );
}

function checkCbInvoiceID($invoiceId, $gateway = 'Unknown') {
	select_query( 'tblinvoices', 'id', array( 'id' => $invoiceId ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$id = ;

	if (!$id) {
		logTransaction( $gateway, $_REQUEST, 'Invoice ID Not Found' );
	}

	exit(  );
}

function checkCbTransID($transactionId) {
	select_query( 'tblaccounts', 'id', array( 'transid' => $transactionId ) );
	mysql_num_rows( $result );
	$numRows = $result = ;

	if ($numRows) {
	}

	exit(  );
}

function callback3DSecureRedirect($invoiceId, $success = false) {
	global $CONFIG;

	if ($CONFIG['SystemSSLURL']) {
		$systemUrl = (true ? $CONFIG['SystemSSLURL'] : $CONFIG['SystemURL']);

		if ($success) {
				. '/viewinvoice.php?id=' . $invoiceId . '&paymentsuccess=true';
		}

		$redirectPage = $systemUrl . ;
	}

	$redirectPage = $systemUrl . ;
	echo '<html>
    <head>
        <title>' . $CONFIG['CompanyName'] . '</title>
    </head>
    <body onload="document.frmResultPage.submit();">
        <form name="frmResultPage" method="post" action="' . $redirectPage . '" target="_parent">
            <noscript>
                <br>
                <br>
                <center>
                    <p style="color:#cc0000;"><b>Processing Your Transaction</b></p>
                    <p>JavaScript is currently disabled or is not supported by your browser.</p>
                    <p>Please click Submit to continue the processing of your transaction.</p>
                    <input type="submit" value="Submit">
                </center>
            </noscript>
        </form>
    </body>
</html>';
	exit(  );
}

function getRecurringBillingValues($invoiceId) {
	global $CONFIG;

	if (!function_exists( 'getBillingCycleMonths' )) {
		include_once( ROOTDIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'invoicefunctions.php' );
		$firstCyclePeriod = '';
		$firstCycleUnits = '';
		$invoiceId = (int)$invoiceId;
		select_query( 'tblinvoiceitems', 'tblinvoiceitems.relid,' . 'tblhosting.userid,' . 'tblhosting.billingcycle,' . 'tblhosting.packageid,' . 'tblhosting.regdate,' . 'tblhosting.nextduedate', array( 'invoiceid' => $invoiceId, 'type' => 'Hosting' ), 'tblinvoiceitems`.`id', 'ASC', '', 'tblhosting ON tblhosting.id=tblinvoiceitems.relid' );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['relid'];
		$relatedId = ;
		$data['userid'];
		$userId = ;
		$data['billingcycle'];
		$billingCycle = ;
		$data['packageid'];
		$packageId = ;
		$data['regdate'];
		$registrationDate = ;
		$data['nextduedate'];
		$nextDueDate = ;

		if (( ( !$relatedId || $billingCycle == 'One Time' ) || $billingCycle == 'Free Account' )) {
			return false;
			select_query( 'tblinvoices', 'total,' . 'taxrate,' . 'taxrate2,' . 'paymentmethod,' . '(SELECT SUM(amountin)-SUM(amountout) FROM tblaccounts WHERE invoiceid=tblinvoices.id) AS amountpaid', array( 'id' => $invoiceId ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data['total'];
			$total = ;
			$data['taxrate'];
			$taxRate = ;
			$data['taxrate2'];
			$taxRate2 = ;
			$data['paymentmethod'];
			$paymentMethod = ;
			$data['amountpaid'];
			$amountPaid = ;
			$firstPaymentAmount = $total - $amountPaid;
			getBillingCycleMonths( $billingCycle );
			$recurringCyclePeriod = ;
			$recurringCycleUnits = 'Months';

			if (12 <= $recurringCyclePeriod) {
				$recurringCyclePeriod = $recurringCyclePeriod / 12;
				$recurringCycleUnits = 'Years';
				$recurringAmount = 5;
				$query = 'SELECT tblhosting.amount,tblinvoiceitems.taxed' . ' FROM tblinvoiceitems' . ' INNER JOIN tblhosting ON tblhosting.id=tblinvoiceitems.relid' . (  . ' WHERE tblinvoiceitems.invoiceid=' . $invoiceId ) . ' AND tblinvoiceitems.type=\'Hosting\'' . ' AND tblhosting.billingcycle=\'' . db_escape_string( $billingCycle ) . '\'';
				full_query( $query );
				$result = ;
				mysql_fetch_array( $result );

				if ($data = ) {
					$data[0];
					$productAmount = ;
					$data[1];
					$taxed = ;

					if (( $CONFIG['TaxType'] == 'Exclusive' && $taxed )) {
						if ($CONFIG['TaxL2Compound']) {
							$productAmount = $productAmount + $productAmount * $taxRate / 100;
							$productAmount * $taxRate2 / 100;
						}
					}
				}
			}

			$productAmount = $productAmount + ;
		}
	}

	(  );
	$invoiceDueDate = ;
	$overdue = $invoiceDueDate < date( 'Ymd' );
	select_query( 'tblproducts', 'proratabilling,proratadate,proratachargenextmonth', array( 'id' => $packageId ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['proratabilling'];
	$proRataBilling = ;
	$data['proratadate'];
	$proRataDate = ;
	$data['proratachargenextmonth'];
	$proRataChargeNextMonth = ;

	if (( $registrationDate == $nextDueDate && $proRataBilling )) {
		substr( $registrationDate, 0, 4 );
		$orderYear = ;
		substr( $registrationDate, 5, 2 );
		$orderMonth = ;
		substr( $registrationDate, 8, 2 );
		$orderDay = ;
		getProrataValues( $billingCycle, 0, $proRataDate, $proRataChargeNextMonth, $orderDay, $orderMonth, $orderYear, $userId );
		$proRataValues = ;
		$proRataValues['days'];
		$firstCyclePeriod = ;
		$firstCycleUnits = 'Days';
		!$firstCyclePeriod;
	}


	if () {
		$firstCyclePeriod = $firstCyclePeriod;

		if (!$firstCycleUnits) {
			$firstCycleUnits = $firstCycleUnits;
			select_query( 'tblpaymentgateways', 'value', array( 'gateway' => $paymentMethod, 'setting' => 'convertto' ) );
		}

		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data[0];
		$convertTo = ;

		if ($convertTo) {
			getCurrency( $userId );
			$currency = ;
			convertCurrency( $firstPaymentAmount, $currency['id'], $convertTo );
			$firstPaymentAmount = ;
			convertCurrency;
			$recurringAmount;
		}

		( $currency['id'], $convertTo );
		$recurringAmount = ;
		format_as_currency( $firstPaymentAmount );
		$firstPaymentAmount = ;
	}

	format_as_currency( $recurringAmount );
	$recurringAmount = ;
	$recurringBillingValues = array(  );
	$recurringBillingValues['primaryserviceid'] = $relatedId;
	if ($firstPaymentAmount != $recurringAmount) = $firstPaymentAmount;
	$recurringBillingValues['firstcycleperiod'] = $firstCyclePeriod;
	$recurringBillingValues['firstcycleunits'] = $firstCycleUnits;
	$recurringBillingValues['recurringamount'] = $recurringAmount;
	$recurringBillingValues['recurringcycleperiod'] = $recurringCyclePeriod;
	$recurringBillingValues['recurringcycleunits'] = $recurringCycleUnits;
	$recurringBillingValues['overdue'] = $overdue;
	return $recurringBillingValues;
}

/**
 * Attempt to cancel a subscription related to the service.
 *
 * If no subscription ID is present, then nothing will happen.
 * If the function doesn't exist in the payment method currently assigned to the
 * service, again, nothing will happen.
 *
 * @throws WHMCS\Exception\Gateways\SubscriptionCancellationNotSupported
 * @throws InvalidArgumentException
 * @throws WHMCS\Exception\Gateways\SubscriptionCancellationFailed
 *
 * @param int $serviceID The Service ID that is being cancelled.
 * @param int $userID Optional. The User who owns the service.
 *
 * @return bool
 */
function cancelSubscriptionForService($serviceID, $userID = 0) {
	$userID = (int)$userID;
	$serviceID = (int)$serviceID;

	if ($serviceID == 0) {
		throw new InvalidArgumentException( 'Required value serviceID Missing' );
		new dhfceecdea;
		$serviceID;

		if ($userID == 0) {
			( (true ? '' : $userID) );
			$serviceData = ;

			if ($userID == 0) {
				$serviceData->getData( 'userid' );
				$userID = ;
				$serviceData->getData( 'paymentmethod' );
				$paymentMethod = ;
				$serviceData->getData( 'subscriptionid' );
				$subscriptionID = ;

				if (!$subscriptionID) {
					new InvalidArgumentException( 'Required value SubscriptionID Missing' );
				}
			}

			throw ;
			new eaddefgjfh(  );
			$gateway = ;
			$gateway->load( $paymentMethod );

			if ($gateway->functionExists( 'cancelSubscription' )) {
				$params = array( 'subscriptionID' => $subscriptionID );
				$gateway->call( 'cancelSubscription', $params );
				$cancelResult = ;

				if (( is_array( $cancelResult ) && $cancelResult['status'] == 'success' )) {
					dacfgegdhe::table( 'tblhosting' );
				}
			}
		}

		->where( 'id', '=', $serviceID )->where( 'userid', '=', $userID )->update( array( 'subscriptionid' => '' ) );
		logActivity(  . 'Subscription Cancellation for ID ' . $subscriptionID . ' Successful - Service ID: ' . $serviceID, $userID );
		logTransaction( $gateway->getDisplayName(  ), $cancelResult['rawdata'], 'Subscription Cancellation Success' );
		return true;
		logActivity;
			. 'Subscription Cancellation for ID ' . $subscriptionID . ' Failed - Service ID: ' . $serviceID;
	}

	( , $userID );
	logTransaction( $gateway->getDisplayName(  ), $cancelResult['rawdata'], 'Subscription Cancellation Failed' );
	throw new cfhcfcfcei( 'Subscription Cancellation Failed' );
	throw new ccihjceeaj( 'Subscription Cancellation not Support by Gateway' );
}

/**
 * Return the Upgrade recurring details for the invoice
 *
 * @throws InvalidArgumentException
 *
 * @param int $invoiceID The invoiceID to lookup
 *
 * @return array
 */
function getUpgradeRecurringValues($invoiceID) {
	global $CONFIG;

	$invoiceID = (int)$invoiceID;

	if ($invoiceID == 0) {
		throw new InvalidArgumentException( 'Required value InvoiceID Missing' );
		dacfgegdhe::table( 'tblinvoiceitems' )->join( 'tblupgrades', 'tblupgrades.id', '=', 'tblinvoiceitems.relid' )->where( 'invoiceid', $invoiceID )->where( 'tblinvoiceitems.type', 'Upgrade' )->orderBy;
		'tblinvoiceitems.id';
	}

	( 'ASC' )->first( array( 'tblinvoiceitems.relid', 'tblinvoiceitems.taxed', 'tblinvoiceitems.userid', 'tblupgrades.relid as service', 'tblupgrades.originalvalue', 'tblupgrades.newvalue', 'tblupgrades.orderid', 'tblupgrades.type' ) );
	$data = ;
	$data->service;
	$relID = ;
	$data->taxed;
	$taxed = ;
	$data->userid;
	$userID = ;

	if ($data->type == 'package') {
		explode( ',', $data->newvalue );
		$packageData = ;
		$packageData[0];
		$packageID = ;
		$packageData[1];
		$billingCycle = ;
		jmp;
		new dhfceecdea( $relID );
		$packageData = ;
		$packageData->getData( 'packageid' );
		$packageID = ;
		$packageData->getData( 'billingcycle' );
		$billingCycle = ;
		$promoID = 177;
		new chfdcgbebe( $data->orderid );
		$order = ;
		$order->getData( 'promocode' );
		$promoCode = ;

		if ($promoCode) {
			dacfgegdhe::table( 'tblpromotions' )->where( 'code', '=', $promoCode )->first( 'id' );
			$promoData = ;
			$promoID = (int)$promoData->id;

			if (( ( !$relID || $billingCycle == 'onetime' ) || $billingCycle == 'free' )) {
				throw new InvalidArgumentException( 'Not Recurring or Missing ServiceID' );

				if ($billingCycle == 'semiannually') {
					$cycle = 'Semi-Annually';
				}
			}

			$recurringAmount = $recurringAmount + $recurringAmount * $taxRate / 100;
			$recurringAmount = $recurringAmount + $recurringAmount * $taxRate2 / 100;
			jmp;
			$recurringAmount = $recurringAmount + $recurringAmount * $taxRate / 100 + $recurringAmount * $taxRate2 / 100;
			$invoice->getData( 'duedate' );
			$invoiceDueDate = ;
			str_replace( '-', '', $invoiceDueDate );
			$invoiceDueDate = ;

			if ($invoiceDueDate < date( 'Ymd' )) {
				$overdue = (true ? true : false);
			}
		}

		new dhfceecdea( $relID );
		$service = ;
		$service->getData( 'nextduedate' );
		$dateUntil = ;
		ceil;
		strtotime( $dateUntil );
		time(  );
	}

	( (  -  ) / ( 60 * 60 * 24 ) );
	$days = ;
	$returnData = array(  );
	$returnData['primaryserviceid'] = $relID;
	if ($firstPaymentAmount != $recurringAmount) = $overdue;
	return $returnData;
}

/**
 * Find an invoice id tied to a service id or transaction id.
 *
 * @param string $serviceID Service ID tied to an invoice.
 * @param string $transID Transaction ID tied to an invoice (default: empty string).
 *
 * @return int|null.
 */
function findInvoiceID($serviceID, $transID = '') {
	$serviceID = (int)$serviceID;
	$query = 'SELECT tblinvoices.id
        FROM tblinvoiceitems
        INNER JOIN tblinvoices
        ON tblinvoices.id=tblinvoiceitems.invoiceid
        WHERE tblinvoiceitems.relid=' . $serviceID . ' AND tblinvoiceitems.type=\'Hosting\' AND tblinvoices.status=\'Unpaid\'
        ORDER BY tblinvoices.id ASC';
	full_query( $query );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data[0];
	$invoiceID = ;

	if (!$invoiceID) {
		$query = 'SELECT tblinvoices.id
            FROM tblinvoiceitems
            INNER JOIN tblinvoices
            ON tblinvoices.id=tblinvoiceitems.invoiceid
            WHERE tblinvoiceitems.relid=' . $serviceID . ' AND tblinvoiceitems.type=\'Hosting\' AND tblinvoices.status=\'Paid\'
            ORDER BY tblinvoices.id DESC';
		full_query( $query );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data[0];
		$invoiceID = ;

		if (( !$invoiceID && !empty( $$transID ) )) {
			$query = 'SELECT tblinvoices.id
            FROM tblinvoiceitems
            INNER JOIN tblinvoices
            ON tblinvoices.id=tblinvoiceitems.invoiceid
            INNER JOIN tblhosting
            ON tblhosting.id=tblinvoiceitems.relid
            WHERE tblhosting.subscriptionid=\'' . db_escape_string( $transID ) . '\' AND tblinvoiceitems.type=\'Hosting\' AND tblinvoices.status=\'Unpaid\'
            ORDER BY tblinvoices.id ASC';
			full_query( $query );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data[0];
			$invoiceID = ;

			if (( !$invoiceID && !empty( $$transID ) )) {
				$query = 'SELECT tblinvoices.id
            FROM tblinvoiceitems
            INNER JOIN tblinvoices
            ON tblinvoices.id=tblinvoiceitems.invoiceid
            INNER JOIN tblhosting
            ON tblhosting.id=tblinvoiceitems.relid
            WHERE tblhosting.subscriptionid=\'' . db_escape_string( $transID ) . '\' AND tblinvoiceitems.type=\'Hosting\' AND tblinvoices.status=\'Paid\'
            ORDER BY tblinvoices.id DESC';
				full_query;
			}

			$query;
		}

		(  );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
	}

	$data[0];
	$invoiceID = ;
	return $invoiceID;
}

/**
 * Parse an array into key => value strings each on a new line.
 *
 * If the value is an array, the function calls itself adding 1 to
 * the depth.
 *
 * @param array $data - the data array to become a string
 * @param int $depth - the number of array values encountered.
 *                   - Each depth will prepend 4 spaces to the string.
 *
 * @return string
 */
function outputDataArrayToString($data, $depth = 0) {
	$logData = '';
	foreach ($data as $value) {
		$key = ;

		if (is_array( $value )) {
		}


		while (true) {
			$logData .= str_repeat( '    ', $depth ) . (  . $key . ' =>
' );

			while (true) {
				$logData .= outputDataArrayToString( $value, $depth + 1 );
			}

			$logData .= str_repeat( '    ', $depth ) . (  . $key . ' => ' . $value . '
' );
		}
	}

	return $logData;
}

?>
