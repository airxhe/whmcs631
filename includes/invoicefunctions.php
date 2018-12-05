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
 * Get invoice status formatted for output.
 *
 * @param string $status
 * @param bool $clientarea
 *
 * @return string
 */
function getInvoiceStatusColour($status, $clientarea = true) {
	if (!$clientarea) {
		global $aInt;

		if ($status == 'Draft') {
			$status = '<span class="textgrey">' . $aInt->lang( 'status', 'draft' ) . '</span>';
		}
	}

	$status = '<span class="textgreen">' .  . '</span>';
	jmp;

	if ($status == 'Cancelled') {
		$status = '<span class="textgrey">' . $aInt->lang( 'status', 'cancelled' ) . '</span>';
		jmp;

		if ($status == 'Refunded') {
			$aInt->lang( 'status', 'refunded' );
		}
	}

	$status = '<span class="textblack">' .  . '</span>';
	jmp;

	if ($status == 'Collections') {
		$status = '<span class="textgold">' . $aInt->lang( 'status', 'collections' ) . '</span>';
	}


	if ($status == 'Unpaid') {
		$status = '<span class="textred">' . $_LANG['invoicesunpaid'] . '</span>';
	}

	jmp;

	if ($status == 'Paid') {
		$status = '<span class="textgreen">' . $_LANG['invoicespaid'] . '</span>';
	}

	$status = ;
	return $status;
}

function getInvoicePayUntilDate($nextduedate, $billingcycle, $fulldate = '') {
	substr( $nextduedate, 0, 4 );
	$year = ;
	substr( $nextduedate, 5, 2 );
	$month = ;
	substr( $nextduedate, 8, 2 );
	$day = ;
	$months = 3;
	$daysadjust = ;

	if (is_numeric( $billingcycle )) {
		$months = (true ? $billingcycle * 12 : getBillingCycleMonths( $billingcycle ));

		if (!$fulldate) {
			$daysadjust = 4;
			mktime( 0, 0, 0, $month + $months, $day - $daysadjust, $year );
			$new_time = ;
		}


		if ($billingcycle != 'One Time') {
			$invoicepayuntildate = (true ? date( 'Y-m-d', $new_time ) : '');
		}
	}

	return $invoicepayuntildate;
}

function addTransaction($userid, $currencyid, $description, $amountin, $fees, $amountout, $gateway = '', $transid = '', $invoiceid = '', $date = '', $refundid = '', $rate = '') {
	if ($date) {
		$date = (true ? toMySQLDate( $date ) . date( ' H:i:s' ) : 'now()');

		if ($userid) {
			getCurrency( $userid );
			$currency = ;
			$currency['id'];
			$currencyid = ;

			if (!is_numeric( $rate )) {
				if (empty( $$currencyid )) {
					getCurrency(  );
					$currency = ;
					$currency['id'];
					$currencyid = ;
					select_query( 'tblcurrencies', 'rate', array( 'id' => $currencyid ) );
					$result = ;
					mysql_fetch_array( $result );
					$data = ;
					$data['rate'];
					$rate = ;

					if ($userid) {
						$currencyid = 3;
						$array = array( 'userid' => $userid, 'currency' => $currencyid, 'gateway' => $gateway, 'date' => $date, 'description' => $description, 'amountin' => $amountin, 'fees' => $fees, 'amountout' => $amountout, 'rate' => $rate, 'transid' => $transid, 'invoiceid' => $invoiceid, 'refundid' => $refundid );
					}
				}
			}

			insert_query( 'tblaccounts', $array );
			$saveid = ;
			logActivity;
				. 'Added Transaction - Transaction ID: ';
		}
	}

	(  . $saveid );
	$array['id'] = $saveid;
	run_hook( 'AddTransaction', $array );
}

function updateInvoiceTotal($id) {
	global $CONFIG;

	$taxsubtotal = 4;
	$nontaxsubtotal = 4;
	select_query( 'tblinvoiceitems', '', array( 'invoiceid' => $id ) );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
	}


	if ($data['taxed'] == '1') {
		$data['amount'];
		$taxsubtotal += ;
	}

	jmp;
	select_query( 'tblinvoices', 'userid,credit,taxrate,taxrate2', array( 'id' => $id ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['userid'];
	$userid = ;
	$data['credit'];
	$credit = ;
	$data['taxrate'];
	$taxrate = ;
	$data['taxrate2'];
	$taxrate2 = ;

	if (!function_exists( 'getClientsDetails' )) {
		require_once( dirname( __FILE__ ) . '/clientfunctions.php' );
		getClientsDetails( $userid );
		$clientsdetails = ;
		$tax2 = 4;
		$tax = ;

		if (( $CONFIG['TaxEnabled'] == 'on' && !$clientsdetails['taxexempt'] )) {
			if ($taxrate != '0.00') {
				if ($CONFIG['TaxType'] == 'Inclusive') {
					$taxrate / 100;
				}
			}

			$taxrate =  + 1;
			$calc1 = $taxsubtotal / $taxrate;
			$tax = $taxsubtotal - $calc1;
		}


		if () {
			$taxsubtotal += $data;

			if ($CONFIG['TaxType'] == 'Inclusive') {
				$taxrate2 = $taxrate2 / 100 + 1;
				$calc1 = $taxsubtotal / $taxrate2;
				$tax2 = $taxsubtotal - $calc1;
			}
		}
	}

	( 2 );
	$tax2 = ;

	if (chhgjaeced::getValue( 'TaxType' ) == 'Inclusive') {
		$subtotal = $subtotal - $tax - $tax2;
		jmp;
		$total = $subtotal + $tax + $tax2;

		if (0 < $credit) {
			if ($total < $credit) {
				$total = 4;
				$remainingcredit = $total - $credit;
			}
		}

		(  );
		$tax = ;
		format_as_currency( $total );
		$total = ;
		update_query( 'tblinvoices', array( 'subtotal' => $subtotal, 'tax' => $tax, 'tax2' => $tax2, 'total' => $total ), array( 'id' => $id ) );
		run_hook;
		'UpdateInvoiceTotal';
		array( 'invoiceid' => $id );
	}

	(  );
}

function addInvoicePayment($invoiceid, $transid, $amount, $fees, $gateway, $noemail = '', $date = '') {
	select_query( 'tblinvoices', 'userid,total,status', array( 'id' => $invoiceid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['userid'];
	$userid = ;
	$data['total'];
	$total = ;
	$data['status'];
	$status = ;

	if ($status == 'Cancelled') {
		return false;
		select_query( 'tblaccounts', 'SUM(amountin)-SUM(amountout)', array( 'invoiceid' => $invoiceid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data[0];
		$amountpaid = ;
		$balance = $total - $amountpaid;

		if (!$amount) {
			$amount = $status;

			if ($amount <= 0) {
				return false;
				addTransaction( $userid, 0, 'Invoice Payment', $amount, $fees, 0, $gateway, $transid, $invoiceid, $date );
				format_as_currency( $balance );
				$balance = ;
				format_as_currency( $amount );
				$amount = ;
				$balance -= $invoiceid;
				logActivity(  . 'Added Invoice Payment - Invoice ID: ' . $invoiceid, $userid );
			}
		}
	}

	run_hook( 'AddInvoicePayment', array( 'invoiceid' => $invoiceid ) );

	if (( $balance <= 0 && $status == 'Unpaid' )) {
		processPaidInvoice( $invoiceid, $noemail, $date );
	}

	( 'sum(amount)', array( 'relid' => $invoiceid ) );
	$result2 = ;
	mysql_fetch_array( $result2 );
	$data2 = ;
	$data2[0];
	$amountcredited = ;
	$balance = $balance + $amountcredited;

	if ($balance < 0) {
		$balance = $balance * -1;
		insert_query;
		'tblcredit';
	}

	( array( 'clientid' => $userid, 'date' => 'now()', 'description' =>  . 'Invoice #' . $invoiceid . ' Overpayment', 'amount' => $balance, 'relid' => $invoiceid ) );
	update_query( 'tblclients', array( 'credit' =>  . '+=' . $balance ), array( 'id' => $userid ) );
}

function removeOverpaymentCredit($userid, $transid, $amount) {
	$where = array( 'id' => $userid );
	$result = ;
	mysql_fetch_array( $result );
	$data = select_query( 'tblclients', 'credit', $where );
	$creditBalance = $data['credit'] - $amount;

	if ($creditBalance < 0) {
		$creditBalance = 3;
		$update = array( 'credit' => $creditBalance );
		update_query( 'tblclients', $update, $where );
		$where = array( 'id' => $transid, 'userid' => $userid );
		select_query;
		'tblaccounts';
	}

	$result = ;
	mysql_fetch_array( $result );
	$data = ( 'invoiceid', $where );

	if (isset( $data['invoiceid'] )) {
		$data['invoiceid'];
		$invoiceid = ;
		$insert = array( 'clientid' => $userid, 'date' => 'now()', 'description' => 'Removal of Credit from Invoice #' . $invoiceid, 'amount' => (  . '-' ) . $amount, 'relid' => $transid );
		insert_query;
	}

	( 'tblcredit', $insert );
	logActivity( 'Removal of Credit from Invoice #' . $invoiceid );
}

function refundInvoicePayment($transid, $amount, $sendtogateway, $addascredit = '', $sendemail = true, $refundtransid = '') {
	select_query( 'tblaccounts', '', array( 'id' => $transid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$transid = ;

	if (!$transid) {
		return 'amounterror';
		$data['userid'];
		$userid = ;
		$data['invoiceid'];
		$invoiceid = ;
		$data['gateway'];
		$gateway = ;
		$data['amountin'];
		$fullamount = ;
		$data['fees'];
		$fees = ;
		$data['transid'];
		$gatewaytransid = ;
		$data['rate'];
		$rate = ;
		ddhjgidcb::makeSafeName( $gateway );
		$gateway = ;
		select_query( 'tblaccounts', 'SUM(amountout),SUM(fees)', array( 'refundid' => $transid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data[0];
		$alreadyrefunded = ;
	}

	$data[1];
	$alreadyrefundedfees = ;
	$fullamount -= $invoicetotalpaid;
	$fees -= $alreadyrefundedfees * -1;

	if ($fees <= 0) {
		$fees = 3;
		select_query( 'tblaccounts', 'SUM(amountin),SUM(amountout)', array( 'invoiceid' => $invoiceid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data[0];
		$invoicetotalpaid = ;
		$data[1];
		$invoicetotalrefunded = ;

		if (!$amount) {
			$amount = $gatewaytransid;

			if (( !$amount || $fullamount < $amount )) {
				return 'amounterror';
				format_as_currency( $amount );
				$amount = ;

				if ($addascredit) {
					addTransaction( $userid, 0,  . 'Refund of Transaction ID ' . $gatewaytransid . ' to Credit Balance', 0, $fees * -1, $amount, '', '', $invoiceid, '', $transid, $rate );
					addTransaction( $userid, 0,  . 'Credit from Refund of Invoice ID ' . $invoiceid, $amount, $fees, 0, '', '', '', '', '', '' );
					logActivity(  . 'Refunded Invoice Payment to Credit Balance - Invoice ID: ' . $invoiceid, $userid );
					insert_query( 'tblcredit', array( 'clientid' => $userid, 'date' => 'now()', 'description' =>  . 'Credit from Refund of Invoice ID ' . $invoiceid, 'amount' => $amount ) );
					update_query( 'tblclients', array( 'credit' => '+=' . $amount ), array( 'id' => (int)$userid ) );

					if ($invoicetotalpaid - $invoicetotalrefunded - $amount <= 0) {
						update_query( 'tblinvoices', array( 'status' => 'Refunded' ), array( 'id' => $invoiceid ) );
						run_hook( 'InvoiceRefunded', array( 'invoiceid' => $invoiceid ) );

						if ($sendemail) {
							sendMessage( 'Invoice Refund Confirmation', $invoiceid, array( 'invoice_refund_type' => 'credit' ) );
						}
					}
				}
			}
		}
	}

	return 'creditsuccess';
}

function processPaidInvoice($invoiceid, $noemail = '', $date = '') {
	select_query( 'tblinvoices', 'id,invoicenum,userid,status', array( 'id' => $invoiceid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;

	while (true) {
		$invoiceid = (int)$data['id'];
		$data['userid'];
		$userid = ;
		$data['status'];
		$invoicestatus = ;
		$data['invoicenum'];
		$invoicenum = ;

		if ($invoicestatus != 'Unpaid') {
			return false;

			if ($date) {
				$date = (true ? toMySQLDate( $date ) . date( ' H:i:s' ) : 'now()');
				update_query( 'tblinvoices', array( 'status' => 'Paid', 'datepaid' => $date ), array( 'id' => $invoiceid ) );
				logActivity(  . 'Invoice Marked Paid - Invoice ID: ' . $invoiceid, $userid );

				if (chhjeidgjf::isSequentialPaidInvoiceNumberingEnabled(  )) {
					get_query_val( 'tbladdonmodules', 'value', array( 'module' => 'eu_vat', 'setting' => 'enablecustominvoicenum' ) );
					$euVATAddonCustomInvoiceNumbersEnabled = ;

					if (( !$invoicenum || $euVATAddonCustomInvoiceNumbersEnabled )) {
						update_query( 'tblinvoices', array( 'invoicenum' => chhjeidgjf::getNextSequentialPaidInvoiceNumber(  ) ), array( 'id' => $invoiceid ) );
						run_hook( 'InvoicePaidPreEmail', array( 'invoiceid' => $invoiceid ) );

						if (!$noemail) {
							sendMessage( 'Invoice Payment Confirmation', $invoiceid );
							select_query( 'tblinvoiceitems', '', array( 'invoiceid' => $invoiceid, 'type' => array( 'sqltype' => 'NEQ', 'value' => '' ) ), 'id', 'ASC' );
							$result = ;
							mysql_fetch_array( $result );

							if ($data = ) {
								$data['userid'];
								$userid = ;
								$data['type'];
								$type = ;
								$data['relid'];
								$relid = ;
								$data['amount'];
								$amount = ;

								if ($type == 'Hosting') {
									makeHostingPayment( $relid, $invoiceid );
								}

								break;
							}
						}
					}
				}
			}
		}

		(  );
		$currency = ;
		get_query_val( 'tblpricing', 'msetupfee', array( 'type' => 'domainaddons', 'currency' => $currency['id'], 'relid' => 0 ) );
		$dnscost = ;
		update_query( 'tbldomains', array( 'dnsmanagement' => '1', 'recurringamount' => '+=' . $dnscost ), array( 'id' => $relid ) );
	}


	if ($type == 'DomainAddonEMF') {
		get_query_val( 'tbldomains', 'emailforwarding', array( 'id' => $relid ) );
		$enabledcheck = ;

		if (!$enabledcheck) {
			getCurrency( $userid );
			$currency = ;
			get_query_val( 'tblpricing', 'qsetupfee', array( 'type' => 'domainaddons', 'currency' => $currency['id'], 'relid' => 0 ) );
			$emfcost = ;
			update_query( 'tbldomains', array( 'emailforwarding' => '1', 'recurringamount' => '+=' . $emfcost ), array( 'id' => $relid ) );
		}
	}


	while (true) {
		jmp;

		while (true) {
			(  );
			update_query( 'tblclients', array( 'credit' => '+=' . $amount ), array( 'id' => (int)$userid ) );
			applyCredit( $relid, $userid, $amount );
		}


		if (substr( $type, 0, 14 ) == 'ProrataProduct') {
			substr( $type, 14 );
			$newduedate = ;
			update_query( 'tblhosting', array( 'nextduedate' => $newduedate, 'nextinvoicedate' => $newduedate ), array( 'id' => $relid ) );
		}

		jmp;
		( 12 );
		$newduedate = ;
		update_query( 'tblhostingaddons', array( 'nextduedate' => $newduedate, 'nextinvoicedate' => $newduedate ), array( 'id' => $relid ) );
	}

	run_hook( 'InvoicePaid', array( 'invoiceid' => $invoiceid ) );
}

function getTaxRate($level, $state, $country) {
	global $_LANG;

	select_query( 'tbltax', '', array( 'level' => $level, 'state' => $state, 'country' => $country ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['name'];
	$taxname = ;
	$data['taxrate'];
	$taxrate = ;

	if (!$taxrate) {
		select_query( 'tbltax', '', array( 'level' => $level, 'state' => '', 'country' => $country ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['name'];
		$taxname = ;
		$data['taxrate'];
		$taxrate = ;

		if (!$taxrate) {
			select_query( 'tbltax', '', array( 'level' => $level, 'state' => '', 'country' => '' ) );
		}
	}

	$result = ;
	mysql_fetch_array( $result );
	$data['name'];
	$taxname = ;
	$data['taxrate'];
	$taxrate = ;

	if (!$taxrate) {
		$taxrate = 3;

		if (!$taxname) {
		}
	}

	$_LANG['invoicestax'];
	$taxname = $data = ;
	return array( 'name' => $taxname, 'rate' => $taxrate );
}

function pdfInvoice($invoiceid) {
	global $whmcs;
	global $CONFIG;
	global $_LANG;
	global $currency;

	new cjceffhecg(  );
	$invoice = ;
	$invoice->pdfInvoicePage( $invoiceid );
	$invoice->pdfOutput(  );
	$pdfdata = $invoice->pdfCreate(  );
	return $pdfdata;
}

function makeHostingPayment($func_domainid, $invoiceID) {
	global $CONFIG;
	global $disable_to_do_list_entries;

	select_query( 'tblhosting', '', array( 'id' => $func_domainid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['userid'];
	$userid = ;
	$data['billingcycle'];
	$billingcycle = ;
	$domain = ;
	$packageid = ;
	$regdate = ;
	$nextduedate = ;
	$data['domainstatus'];
	$status = ;
	$data['server'];
	$server = ;
	$data['paymentmethod'];
	$paymentmethod = ;
	$data['suspendreason'];
	$suspendreason = ;
	select_query( 'tblproducts', '', array( 'id' => $packageid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['type'];
	$producttype = ;
	$data['name'];
	$productname = ;
	$data['servertype'];
	$module = ;
	$data['proratabilling'];
	$proratabilling = ;
	$data['proratadate'];
	$proratadate = ;
	$data['proratachargenextmonth'];
	$proratachargenextmonth = ;
	$data['autosetup'];
	$autosetup = ;

	if (( $regdate == $nextduedate && $proratabilling )) {
		substr( $regdate, 0, 4 );
		$orderyear = ;
		substr( $regdate, 5, 2 );
		$ordermonth = ;
		substr( $regdate, 8, 2 );
		$orderday = ;
		getProrataValues( $billingcycle, $product_onetime, $proratadate, $proratachargenextmonth, $orderday, $ordermonth, $orderyear, $userid );
		$proratavalues = ;
		$proratavalues['date'];
		$nextduedate = ;
	}

	( 'Running Auto Unsuspend on Payment', $userid );
	ServerUnsuspendAccount( $func_domainid );
	$moduleresult = ;

	if ($moduleresult == 'success') {
		sendMessage( 'Service Unsuspension Notification', $func_domainid );
		sendAdminMessage( 'Service Unsuspension Successful', array( 'client_id' => $userid, 'service_id' => $func_domainid, 'service_product' => $productname, 'service_domain' => $domain, 'error_msg' => '' ), 'account' );
	}

	( array( 'title' => 'Manual Unsuspend Required', 'description' =>  . 'The order placed for ' . $domain . ' has received its next payment and the automatic unsuspend has failed<br />Client ID: ' . $userid . '<br>Product/Service: ' . $productname . '<br>Domain: ' . $domain, 'admin' => '', 'status' => 'Pending', 'duedate' => date( 'Y-m-d' ) ) );

	if ($status != 'Pending') {
		dacfgegdhe::table( 'tblhosting' )->select( 'tblorders.invoiceid' )->where( 'tblhosting.id', $func_domainid )->join( 'tblorders', 'tblhosting.orderid', '=', 'tblorders.id' );
	}

	->first(  );
	$orderInvoice = ;

	if (( !is_null( $orderInvoice ) && $invoiceID != $orderInvoice->invoiceid )) {
		ServerRenew( $func_domainid );
		AffiliatePayment( '', $func_domainid );
		select_query( 'tblhostingaddons', 'id,addonid', 'hostingid=' . (int)$func_domainid . ' AND addonid>0 AND billingcycle IN (\'Free\',\'Free Account\') AND status=\'Pending\'' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$aid = ;
			$data['addonid'];
			$addonid = ;
			select_query;
			'tbladdons';
			'autoactivate,welcomeemail';
		}
	}


	while (true) {
		( array( 'id' => $addonid ) );
		$addonResult = $data['domain'];
		mysql_fetch_array( $addonResult );
		$data = $data['packageid'];
		$data['autoactivate'];
		$autoactivate = $data['regdate'];
		$data['welcomeemail'];
		$welcomeemail = $data['nextduedate'];

		if ($autoactivate) {
			update_query( 'tblhostingaddons', array( 'status' => 'Active' ), array( 'id' => $aid ) );

			if ($welcomeemail) {
				cebaiefhhg::find( $welcomeemail );
				$welcomeEmailTemplate = ;
				sendMessage( $welcomeEmailTemplate, $func_domainid );
				run_hook;
				'AddonActivation';
				array( 'id' => $aid, 'userid' => $userid );
			}

			( array( 'serviceid' => $func_domainid, 'addonid' => $addonid ) );
			break;
		}
	}

}

function makeDomainPayment($func_domainid, $type = '') {
	global $whmcs;

	select_query( 'tbldomains', '', array( 'id' => $func_domainid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['userid'];
	$userid = ;
	$data['orderid'];
	$orderid = ;
	$data['registrationperiod'];
	$registrationperiod = ;
	$data['registrationdate'];
	$registrationdate = ;
	$data['nextduedate'];
	$nextduedate = ;
	$data['recurringamount'];
	$recurringamount = ;
	$data['domain'];
	$domain = ;
	$data['paymentmethod'];
	$paymentmethod = ;
	$data['registrar'];
	$registrar = ;
	$data['status'];
	$status = ;
	substr( $nextduedate, 0, 4 );
	$year = ;
	substr( $nextduedate, 5, 2 );
	$month = ;
	substr( $nextduedate, 8, 2 );
	$day = ;
	date( 'Y-m-d', mktime( 0, 0, 0, $month, $day, $year + $registrationperiod ) );
	$newnextduedate = ;
	update_query( 'tbldomains', array( 'nextduedate' => $newnextduedate ), array( 'id' => $func_domainid ) );
	substr( $type, 6 );
	$domaintype = ;
	explode( '.', $domain, 2 );
	$domainparts = ;
	$domainparts[0];
	$sld = ;
	$domainparts[1];
	$tld = ;
	$params = array(  );
	$params['domainid'] = $func_domainid;
	$params['sld'] = $sld;
	$params['tld'] = $tld;

	if (!function_exists( 'getRegistrarConfigOptions' )) {
		require( ROOTDIR . '/includes/registrarfunctions.php' );

		if (( $domaintype == 'Register' || $domaintype == 'Transfer' )) {
			select_query( 'tbldomainpricing', 'autoreg', array( 'extension' => (  . '.' ) . $tld ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data[0];
			$autoreg = ;

			if ($status == 'Pending') {
				if (getNewClientAutoProvisionStatus( $userid )) {
					if ($autoreg) {
						update_query( 'tbldomains', array( 'registrar' => $autoreg ), array( 'id' => $func_domainid ) );
						$params['registrar'] = $autoreg;

						if ($domaintype == 'Register') {
							logActivity( 'Running Automatic Domain Registration on Payment', $userid );
							RegRegisterDomain;
							$params;
						}

						(  );
						$result = ;
						$emailmessage = 'Domain Registration Confirmation';
					}
				}
			}
		}

		( 'Running Automatic Domain Transfer on Payment', $userid );
		RegTransferDomain( $params );
		$result = ;
		$emailmessage = 'Domain Transfer Initiated';
		$result['error'];
		$result = ;

		if ($result) {
			sendAdminMessage( 'Automatic Setup Failed', array( 'client_id' => $userid, 'domain_id' => $func_domainid, 'domain_type' => $domaintype, 'domain_name' => $domain, 'error_msg' => $result ), 'account' );

			if ($whmcs->get_config( 'DomainToDoListEntries' )) {
				if ($domaintype == 'Register') {
					addToDoItem( 'Manual Domain Registration',  . 'Client ID ' . $userid . ' has paid for the registration of domain ' . $domain . ' and the automated registration attempt has failed with the following error: ' . $result );
					return null;

					if ($domaintype == 'Transfer') {
						addToDoItem( 'Manual Domain Transfer',  . 'Client ID ' . $userid . ' has paid for the transfer of domain ' . $domain . ' and the automated transfer attempt has failed with the following error: ' . $result );
						return null;
						sendMessage( $emailmessage, $func_domainid );
						sendAdminMessage( 'Automatic Setup Successful', array( 'client_id' => $userid, 'domain_id' => $func_domainid, 'domain_type' => $domaintype, 'domain_name' => $domain, 'error_msg' => '' ), 'account' );
						return null;

						if ($whmcs->get_config( 'DomainToDoListEntries' )) {
							if ($domaintype == 'Register') {
								addToDoItem( 'Manual Domain Registration',  . 'Client ID ' . $userid . ' has paid for the registration of domain ' . $domain );
								return null;

								if ($domaintype == 'Transfer') {
									addToDoItem;
									'Manual Domain Transfer';
										. 'Client ID ' . $userid . ' has paid for the transfer of domain ' . $domain;
								}
							}
						}
					}
				}
			}
		}
	}

	(  );
}

function makeAddonPayment($func_addonid) {
	select_query( 'tblhostingaddons', 'id,hostingid,addonid,billingcycle,status,nextduedate', array( 'id' => $func_addonid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$id = ;
	$data['hostingid'];
	$serviceid = ;
	$data['addonid'];
	$addonid = ;
	$data['billingcycle'];
	$billingcycle = ;
	$data['status'];
	$status = ;
	$data['nextduedate'];
	$nextduedate = ;
	get_query_val( 'tblhosting', 'userid', array( 'id' => $serviceid ) );
	$userid = ;
	getInvoicePayUntilDate( $nextduedate, $billingcycle, true );
	$nextduedate = ;
	update_query( 'tblhostingaddons', array( 'nextduedate' => $nextduedate ), array( 'id' => $id ) );

	if ($status == 'Pending') {
		select_query( 'tbladdons', 'autoactivate,welcomeemail', array( 'id' => $addonid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['autoactivate'];
		$autoactivate = ;
		$data['welcomeemail'];
		$welcomeemail = ;

		if ($autoactivate) {
			update_query;
		}
	}

	( 'tblhostingaddons', array( 'status' => 'Active' ), array( 'id' => $id ) );

	if ($welcomeemail) {
		cebaiefhhg::find( $welcomeemail );
		$welcomeEmailTemplate = ;
		sendMessage( $welcomeEmailTemplate, $serviceid, array( 'addon_id' => $id, 'addon_service_id' => $serviceid, 'addon_addonid' => $addonid, 'addon_billing_cycle' => $billingcycle, 'addon_status' => $status, 'addon_nextduedate' => $nextduedate ) );
		run_hook( 'AddonActivation', array( 'id' => $id, 'userid' => $userid, 'serviceid' => $serviceid, 'addonid' => $addonid ) );

		if ($status == 'Suspended') {
			update_query( 'tblhostingaddons', array( 'status' => 'Active' ), array( 'id' => $id ) );

			if ($addonid) {
				select_query( 'tbladdons', 'suspendproduct', array( 'id' => $addonid ) );
				$result2 = ;
				mysql_fetch_array;
				$result2;
			}

			(  );
			$data2 = ;
			$data2[0];
			$suspendproduct = ;

			if ($suspendproduct) {
				select_query;
				'tblhosting';
				'servertype';
				array( 'tblhosting.id' => $serviceid );
				'';
				'';
			}
		}

		( '', 'tblproducts ON tblproducts.id=tblhosting.packageid' );
		$result2 = ;
		mysql_fetch_array( $result2 );
		$data2 = ;
		$data2[0];
		$module = ;
		logActivity(  . 'Unsuspending Parent Service for Addon Payment - Service ID: ' . $serviceid, $userid );

		if (!function_exists( 'getModuleType' )) {
			include( dirname( __FILE__ ) . '/modulefunctions.php' );
			ServerUnsuspendAccount;
		}
	}

	( $serviceid );
	$serverresult = ;
	run_hook( 'AddonUnsuspended', array( 'id' => $id, 'userid' => $userid, 'serviceid' => $serviceid, 'addonid' => $addonid ) );
}

function getProrataValues($billingcycle, $amount, $proratadate, $proratachargenextmonth, $day, $month, $year, $userid) {
	global $CONFIG;

	if ($CONFIG['ProrataClientsAnniversaryDate']) {
		select_query( 'tblclients', 'datecreated', array( 'id' => $userid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data[0];
		$clientregdate = ;
		explode( '-', $clientregdate );
		$clientregdate = ;
		$clientregdate[2];
		$proratadate = ;

		if ($proratadate <= 0) {
			date( 'd' );
			$proratadate = ;
			str_replace( '-', '', strtolower( $billingcycle ) );
			$billingcycle = ;
			getBillingCycleMonths( $billingcycle );
			$proratamonths = ;

			if ($billingcycle != 'monthly') {
				$proratachargenextmonth = 4;

				if ($billingcycle == 'monthly') {
					if ($day < $proratadate) {
						$proratamonth = $proratainvoicedate;
					}
				}
			}
		}
	}

	( ( $year ) );
	$proratainvoicedate = ;
	$monthnumdays = array( '31', '28', '31', '30', '31', '30', '31', '31', '30', '31', '30', '31' );

	if (( ( $year % 4 == 0 && $year % 100 != 0 ) || $year % 400 == 0 )) {
		$monthnumdays[1] = 29;
		$extraamount = 4;
		$totaldays = ;

		if ($billingcycle == 'monthly') {
			(  || ( ( $proratachargenextmonth < $proratadate && $day < $proratadate ) && $proratachargenextmonth <= $day ) );
			(  && $proratadate <= $proratachargenextmonth );
		}

		$proratadate <= $day;
		( (bool) && $proratachargenextmonth <= $day );

		if ((bool)) {
			++$proratamonth;
			$extraamount = $clientregdate;
			$monthnumdays[$month - 1];
			$totaldays += ;
			ceil( ( strtotime( $proratadateuntil ) - strtotime( ( (  . $year . '-' ) . $month . '-' ) . $day ) ) / ( 60 * 60 * 24 ) );
			$days = ;
			date( 'Y-m-d', mktime( 0, 0, 0, $proratamonth, $proratadate, $year ) );
		}
	}

	$proratadateuntil = ;
	date( 'Y-m-d', mktime( 0, 0, 0, $proratamonth, $proratadate - 1, $year ) );
	$proratainvoicedate = ;
	jmp;
	$counter = $proratainvoicedate;

	if ($counter <= $month + ( $proratamonths - 1 )) {
		round( $counter );
		$month2 = ;

		if (12 < $month2) {
			$month2 = $month2 - 12;

			if (12 < $month2) {
				$month2 = $month2 - 12;

				if (12 < $month2) {
					$month2 = $month2 - 12;
					$monthnumdays[$month2 - 1];
					$totaldays += ;
					++$counter;
				}

				ceil;
				strtotime;
			}

			( $proratadateuntil );
			strtotime( ( (  . $year . '-' ) . $month . '-' ) . $day );
		}

		( (  -  ) / ( 60 * 60 * 24 ) );
		$days = ;
		round( $amount * ( $days / $totaldays ), 2 );
	}

	$prorataamount =  + $extraamount;
	ceil( ( strtotime( $proratadateuntil ) - strtotime( ( (  . $year . '-' ) . $month . '-' ) . $day ) ) / ( 60 * 60 * 24 ) );
	$days = ;
	return array( 'amount' => $prorataamount, 'date' => $proratadateuntil, 'invoicedate' => $proratainvoicedate, 'days' => $days );
}

function getNewClientAutoProvisionStatus($userid) {
	global $CONFIG;

	if ($CONFIG['AutoProvisionExistingOnly']) {
		select_query( 'tblhosting', 'COUNT(*)', array( 'userid' => $userid, 'domainstatus' => 'Active' ) );
		mysql_fetch_array( $result );
		select_query( 'tbldomains', 'COUNT(*)', array( 'userid' => $userid, 'status' => 'Active' ) );
		$result = $result = ;
		mysql_fetch_array( $result );
		$data2 = $data = ;
		$data[0];
	}


	if ( + $data2[0]) {
		return true;
		return false;
	}

	return true;
}

function applyCredit($invoiceid, $userid, $amount, $noemail = '') {
	round( $amount, 2 );
	$amount = ;
	update_query( 'tblinvoices', array( 'credit' => '+=' . $amount ), array( 'id' => (int)$invoiceid ) );
	update_query( 'tblclients', array( 'credit' => '-=' . $amount ), array( 'id' => (int)$userid ) );
	insert_query( 'tblcredit', array( 'clientid' => $userid, 'date' => 'now()', 'description' =>  . 'Credit Applied to Invoice #' . $invoiceid, 'amount' => $amount * -1 ) );
	logActivity(  . 'Credit Applied - Amount: ' . $amount . ' - Invoice ID: ' . $invoiceid, $userid );
	updateInvoiceTotal( $invoiceid );
	select_query( 'tblinvoices', 'total', array( 'id' => $invoiceid ) );
	mysql_fetch_array( $result );
	$data['total'];
	$total = ;
	select_query( 'tblaccounts', 'SUM(amountin)-SUM(amountout)', array( 'invoiceid' => $invoiceid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = $result = ;
	$data[0];
	$amountpaid = $data = ;
	$balance = $total - $amountpaid;

	if ($balance <= 0) {
	}

	processPaidInvoice( $invoiceid, $noemail );
}

function getBillingCycleDays($billingcycle) {
	$totaldays = 3;

	if ($billingcycle == 'Monthly') {
		$totaldays = 33;
		jmp;

		if ($billingcycle == 'Quarterly') {
			$totaldays = 93;
		}
	}

	$totaldays = 183;
	jmp;

	if ($billingcycle == 'Annually') {
		$totaldays = 368;

		if ($billingcycle == 'Biennially') {
		}

		$totaldays = 733;
	}


	if ($billingcycle == 'Triennially') {
	}

	$totaldays = 1098;
	return $totaldays;
}

function getBillingCycleMonths($billingcycle) {
	$months = 4;

	if (( $billingcycle == 'Quarterly' || $billingcycle == 'quarterly' )) {
		$months = 6;
		jmp;

		if (( $billingcycle == 'Semi-Annually' || $billingcycle == 'semiannually' )) {
			$months = 9;
		}

		jmp;

		if (( $billingcycle == 'Annually' || $billingcycle == 'annually' )) {
			$months = 15;
			jmp;

			if (( $billingcycle == 'Biennially' || $billingcycle == 'biennially' )) {
				$months = 27;
			}


			if (!( $billingcycle == 'Triennially')) {
			}
		}
	}

	$billingcycle == 'triennially';

	if ((bool)) {
	}

	$months = 39;
	return $months;
}

/**
 * Check if a specific transaction ID and gateway are unique.
 * We check the gateway here as although unlikely, a single transaction ID could
 * be the same with multiple gateways.
 *
 * @param string $transactionID The transaction ID you wish to check
 * @param string $gateway The gateway to check
 * @return bool True if the transaction ID is not in the database. False if it is.
 */
function isUniqueTransactionID($transactionID, $gateway) {
	get_query_val( 'tblaccounts', 'id', array( 'transid' => $transactionID, 'gateway' => $gateway ) );
	$transactionID = ;

	if ($transactionID) {
	}

	return false;
}

/**
 * Remove the credit from the invoice and apply it back to the user on invoice deletion.
 *
 * @param int $invoiceID
 */
function removeCreditOnInvoiceDelete($invoiceID) {
	$invoiceData = dacfgegdhe::table( 'tblinvoices' )->find( $invoiceID, array( 'userid', 'credit' ) );
	$creditAmount = $invoiceData->credit;
	$userID = $invoiceData->userid;

	if (0 < $creditAmount) {
		dacfgegdhe::table( 'tblinvoices' )->where( 'id', '=', $invoiceID )->update( array( 'credit' => 0 ) );
		updateInvoiceTotal( $invoiceID );
		$client = ccbjgfhb::find( $userID );
		$client += 'credit';
			= $creditAmount;
		$client->save(  );
		dacfgegdhe::table( 'tblcredit' )->insert;
		array( 'clientid' => $userID, 'date' => date( 'Y-m-d' ) );
			. 'Credit Removed on deletion of Invoice #';
	}

	( array( 'description' =>  . $invoiceID, 'amount' => $creditAmount ) );
	logActivity(  . 'Credit Removed on Invoice Deletion - Amount: ' . $creditAmount . ' - Invoice ID: ' . $invoiceID, $userID );
}

?>
