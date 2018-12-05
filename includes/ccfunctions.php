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

function updateCCDetails($userid, $cardtype, $cardnum, $cardcvv, $cardexp, $cardstart, $cardissue, $noremotestore = '', $fullclear = '') {
	global $CONFIG;
	global $_LANG;
	global $cc_encryption_hash;

	get_query_val( 'tblclients', 'gatewayid', array( 'id' => $userid ) );
	$gatewayid = ;

	if ($fullclear) {
		update_query( 'tblclients', array( 'cardtype' => '', 'cardlastfour' => '', 'cardnum' => '', 'expdate' => '', 'startdate' => '', 'issuenumber' => '', 'gatewayid' => '' ), array( 'id' => $userid ) );
		ccFormatNumbers( $cardnum );
		$cardnum = ;
		ccFormatNumbers( $cardexp );
		$cardexp = ;
		ccFormatNumbers( $cardstart );
		$cardstart = ;
		ccFormatNumbers( $cardissue );
		$cardissue = ;
		ccFormatDate( $cardexp );
		$cardexp = ;
		ccFormatDate( $cardstart );
		$cardstart = ;
		ccFormatNumbers( $cardcvv );
		$cardcvv = ;

		if ($cardtype) {
			checkCreditCard( $cardnum, $cardtype );
		}
	}

	$errormessage = ;

	if (( !$cardexp || strlen( $cardexp ) != 4 )) {
		$errormessage .= '<li>' . $_LANG['creditcardenterexpirydate'];
	}
	else {
		$debugdata = ;

		if ($captureresult['status'] == 'success') {
			if (isset( $captureresult['gatewayid'] )) {
				update_query( 'tblclients', array( 'gatewayid' => $captureresult['gatewayid'] ), array( 'id' => $userid ) );

				if ($action == 'delete') {
					update_query( 'tblclients', array( 'cardtype' => '', 'cardlastfour' => '', 'cardnum' => '', 'expdate' => '', 'startdate' => '', 'issuenumber' => '', 'gatewayid' => '' ), array( 'id' => $userid ) );
					logTransaction( $gatewayname, $debugdata, 'Success' );
				}

				jmp;
				( array( 'startdate' => array( 'hashkey' => $cchash ), 'issuenumber' => array( 'type' => 'AES_ENCRYPT', 'text' => $cardissue, 'hashkey' => $cchash ) ), array( 'id' => $userid ) );
			}

			logActivity(  . 'Updated Stored Credit Card Details - User ID: ' . $userid, $userid );
			run_hook;
			'CCUpdate';
			array( 'userid' => $userid );
		}

		array( 'cardtype' => $cardtype, 'cardnum' => $cardnum, 'cardcvv' => $cardcvv, 'expdate' => $cardexp, 'cardstart' => $cardstart, 'issuenumber' => $cardissue );
	}

	(  );
}

function ccFormatNumbers($val) {
	return preg_replace( '/[^0-9]/', '', $val );
}

function ccFormatDate($date) {
	if (strlen( $date ) == 3) {
		$date = '0' . $date;

		if (strlen( $date ) == 5) {
			$date = '0' . $date;
			strlen;
			$date;
		}
	}


	if ((  ) == 6) {
		substr( $date, 0, 2 );
		substr;
		$date;
			-2;
	}

	$date =  . (  );
	return $date;
}

function getCCDetails($userid) {
	global $cc_encryption_hash;
	global $_LANG;

	md5( $cc_encryption_hash . $userid );
	$cchash = ;
	select_query( 'tblclients',  . 'cardtype,cardlastfour,AES_DECRYPT(cardnum,\'' . $cchash . '\') as cardnum,AES_DECRYPT(expdate,\'' . $cchash . '\') as expdate,AES_DECRYPT(issuenumber,\'' . $cchash . '\') as issuenumber,AES_DECRYPT(startdate,\'' . $cchash . '\') as startdate,gatewayid', array( 'id' => $userid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$carddata = array(  );
	$carddata['cardtype'] = $data['cardtype'];
	$carddata['cardlastfour'] = $data['cardlastfour'];

	if ($data['cardlastfour']) {
		$carddata['cardnum'] = (true ? '************' . $data['cardlastfour'] : $_LANG['nocarddetails']);
		$data['cardnum'];
	}

	$carddata['fullcardnum'] = ;
	if ($data['expdate']) = ;

	if ($data['startdate']) {
		$carddata['startdate'] = (true ? substr( $data['startdate'], 0, 2 ) . '/' . substr( $data['startdate'], 2, 2 ) : '');
		$carddata['issuenumber'] = $data['issuenumber'];
		$carddata['gatewayid'] = $data['gatewayid'];
	}

	return $carddata;
}

function getCCVariables($invoiceid) {
	global $whmcs;

	new cjceffhecg( $invoiceid );
	$invoice = ;
	$invoice->loadData(  );
	$invoiceexists = ;

	if (!$invoiceexists) {
		return false;
		$whmcs->get_hash(  );
		$cc_encryption_hash = ;
		$invoice->getData( 'userid' );
		$userid = ;
		md5( $cc_encryption_hash . $userid );
		$cchash = ;
		select_query( 'tblclients',  . 'cardtype,cardlastfour,AES_DECRYPT(cardnum,\'' . $cchash . '\') as cardnum,AES_DECRYPT(expdate,\'' . $cchash . '\') as expdate,AES_DECRYPT(issuenumber,\'' . $cchash . '\') as issuenumber,AES_DECRYPT(startdate,\'' . $cchash . '\') as startdate,gatewayid', array( 'id' => $userid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['cardtype'];
		$cardtype = ;
		$data['cardnum'];
		$cardnum = ;
		$data['expdate'];
		$cardexp = ;
		$data['startdate'];
		$startdate = ;
		$data['issuenumber'];
		$issuenumber = ;
		$data['gatewayid'];
		$gatewayid = ;
		select_query( 'tblclients',  . 'bankname,banktype,AES_DECRYPT(bankcode,\'' . $cchash . '\') as bankcode,AES_DECRYPT(bankacct,\'' . $cchash . '\') as bankacct', array( 'id' => $userid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['bankname'];
		$bankname = ;
		$data['banktype'];
		$banktype = ;
		$data['bankcode'];
		$bankcode = ;
		$data['bankacct'];
		$bankacct = ;
		$invoice->initialiseGatewayAndParams(  );
		$params = ;
	}

	$params['banktype'] = $banktype;
	$params['bankcode'] = $bankcode;
	$params['bankacct'] = $bankacct;
	$params['disableautocc'] = $params['clientdetails']['disableautocc'];
	$params['gatewayid'] = $gatewayid;
	return $params;
}

function captureCCPayment($invoiceid, $cccvv = '', $passedparams = false) {
	global $params;

	if (!$passedparams) {
		getCCVariables( $invoiceid );
		$params = ;

		if ($cccvv) {
			$params['cccvv'] = $cccvv;

			if ($params['paymentmethod'] == 'offlinecc') {
				return false;

				if ($params['amount'] <= 0) {
					get_query_val( 'tblpaymentgateways', 'value', array( 'gateway' => $params['paymentmethod'], 'setting' => 'name' ) );
					$gatewayname = ;
					logTransaction( $gatewayname, '', 'No Amount Due' );
					return false;
					(  && ( !$params['cardnum'] && !$params['gatewayid'] ) );
					$params['cccvv'];
				}
			}
		}
	}

	!;

	if ((bool)) {
		sendMessage( 'Credit Card Payment Due', $invoiceid );
	}

	$gatewayname = ;
	logTransaction( $gatewayname, $captureresult['rawdata'], ucfirst( $captureresult['status'] ) );

	if ($captureresult['status'] == 'success') {
		addInvoicePayment;
		$params['invoiceid'];
	}

	( , $captureresult['transid'], $params['originalamount'], $captureresult['fee'], $params['paymentmethod'], 'on' );
	sendMessage( 'Credit Card Payment Confirmation', $params['invoiceid'] );
	return true;
}

function ccProcessing() {
	global $whmcs;
	global $cron;

	date( 'Ymd', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) + $whmcs->get_config( 'CCProcessDaysBefore' ), date( 'Y' ) ) );
	$chargedate = ;
	$chargedates = array(  );

	if (!$whmcs->get_config( 'CCAttemptOnlyOnce' )) {
		$i = 7;

		if ($i <= $whmcs->get_config( 'CCRetryEveryWeekFor' )) {
			while (true) {
				$chargedates[] = 'tblinvoices.duedate=\'' . date( 'Ymd', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) - $i * 7 + $whmcs->get_config( 'CCProcessDaysBefore' ), date( 'Y' ) ) ) . '\'';
				++$i;
			}

			$qrygateways = array(  );
			select_query( 'tblpaymentgateways', 'gateway', array( 'setting' => 'type', 'value' => 'CC' ) );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				$qrygateways[] = 'tblinvoices.paymentmethod=\'' . db_escape_string( $data['gateway'] ) . '\'';
			}

			jmp;
			( 'Processing Capture for Invoice #' . $data['id'] );

			if (captureCCPayment( $data['id'] )) {
				++$z;

				if (is_object( $cron )) {
					$cron->logActivityDebug( 'Capture Successful' );
				}
			}
		}
	}
	else {
		if ((  )) {
			$cron->logActivityDebug( 'Capture Failed' );
		}
	}

	(  . $z . ' Captured, ' . $y . ' Failed)' );
	return  . $z . ' Captured, ' . $y . ' Failed';
}

function checkCreditCard($cardnumber, $cardname) {
	global $_LANG;

	$cards = array( array( 'name' => 'Visa', 'length' => '13,16', 'prefixes' => '4', 'checkdigit' => true ), array( 'name' => 'MasterCard', 'length' => '16', 'prefixes' => '51,52,53,54,55', 'checkdigit' => true ), array( 'name' => 'Diners Club', 'length' => '14', 'prefixes' => '300,301,302,303,304,305,36,38', 'checkdigit' => true ), array( 'name' => 'Carte Blanche', 'length' => '14', 'prefixes' => '300,301,302,303,304,305,36,38', 'checkdigit' => true ), array( 'name' => 'American Express', 'length' => '15', 'prefixes' => '34,37', 'checkdigit' => true ), array( 'name' => 'Discover', 'length' => '16', 'prefixes' => '6011', 'checkdigit' => true ), array( 'name' => 'JCB', 'length' => '15,16', 'prefixes' => '3,1800,2131', 'checkdigit' => true ), array( 'name' => 'Discover', 'length' => '16', 'prefixes' => '6011', 'checkdigit' => true ), array( 'name' => 'Enroute', 'length' => '15', 'prefixes' => '2014,2149', 'checkdigit' => true ) );
	$ccErrorNo = 7;
	$cardType = 6;
	$i = 7;

	if ($i < sizeof( $cards )) {
		if (strtolower( $cardname ) == strtolower( $cards[$i]['name'] )) {
			$cardType = $ccErrorNo;
			break;
			++$i;
		}
	}
	else {
		return '<li>' . $_LANG['creditcardnumberinvalid'];
		explode( ',', $cards[$cardType]['prefixes'] );
		$prefixes = ;
		$PrefixValid = false;
		foreach ($prefixes as ) {
			$prefix = ;

			if (substr( $cardNo, 0, strlen( $prefix ) ) == $prefix) {
				$PrefixValid = true;
				break;
			}

			break;
		}


		if (!$PrefixValid) {
		}

		return '<li>' . $_LANG['creditcardnumberinvalid'];
		$LengthValid = false;
		explode( ',', $cards[$cardType]['length'] );
		$lengths = ;
		foreach ($lengths as ) {
			$length = ;
			strlen( $cardNo );
		}
	}


	if ( == $length) {
		$LengthValid = true;
		break;

		if (!$LengthValid) {
			'<li>' . $_LANG['creditcardnumberinvalid'];
		}

		return ;
		return null;
	}
}

/**
 * Attempt to determine the card type using the card number.
 *
 * @param string $cardNumber
 *
 * @return string
 */
function getCardTypeByCardNumber($cardNumber) {
	switch (true) {
	case ( substr( $cardNumber, 0, 3 ) == '300' && strlen( $cardNumber ) == 14 ): {
		}

	case (  == '36' && strlen( $cardNumber ) == 14 ): {
		}

	case ( ( 2 ) == '51' && strlen( $cardNumber ) == 16 ): {
		}

	case : {
			return 'MasterCard';
			switch (true) {
			case ( substr( $cardNumber, 0, 1 ) == '3' && strlen( $cardNumber ) == 15 ): {
					break;
				}
			}
		}

	case ( ( 0, 1 ) == '3' && strlen( $cardNumber ) == 16 ): {
		}

	case (  == '1800' && strlen( $cardNumber ) == 15 ): {
			jmp;
			switch (true) {
			case ( substr( $cardNumber, 0, 4 ) == '1800' && strlen( $cardNumber ) == 16 ): {
				}

			case ( ( $cardNumber, 0, 4 ) == '2131' && strlen( $cardNumber ) == 15 ): {
				}
			}

			break;
		}

	case (bool): {
		}
	}

	return 'JCB';
}

?>
