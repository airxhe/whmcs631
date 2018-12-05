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

function createInvoices($func_userid = '', $noemails = '', $nocredit = '', $specificitems = '') {
	global $whmcs;
	global $cron;
	global $CONFIG;
	global $_LANG;
	global $invoicecount;
	global $invoiceid;
	global $continuous_invoicing_active_only;

	$whmcs->get_config( 'ContinuousInvoiceGeneration' );
	$continvoicegen = ;
	date( 'Ymd', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) + $CONFIG['CreateInvoiceDaysBefore'], date( 'Y' ) ) );
	$invoicedate = ;

	if ($CONFIG['CreateInvoiceDaysBeforeMonthly']) {
		$invoicedatemonthly = (true ? date( 'Ymd', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) + $CONFIG['CreateInvoiceDaysBeforeMonthly'], date( 'Y' ) ) ) : $invoicedate);

		if ($CONFIG['CreateInvoiceDaysBeforeQuarterly']) {
			$invoicedatequarterly = (true ? date( 'Ymd', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) + $CONFIG['CreateInvoiceDaysBeforeQuarterly'], date( 'Y' ) ) ) : $invoicedate);

			if ($CONFIG['CreateInvoiceDaysBeforeSemiAnnually']) {
				$invoicedatesemiannually = (true ? date( 'Ymd', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) + $CONFIG['CreateInvoiceDaysBeforeSemiAnnually'], date( 'Y' ) ) ) : $invoicedate);

				if ($CONFIG['CreateInvoiceDaysBeforeAnnually']) {
					$invoicedateannually = (true ? date( 'Ymd', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) + $CONFIG['CreateInvoiceDaysBeforeAnnually'], date( 'Y' ) ) ) : $invoicedate);

					if ($CONFIG['CreateInvoiceDaysBeforeBiennially']) {
						$invoicedatebiennially = (true ? date( 'Ymd', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) + $CONFIG['CreateInvoiceDaysBeforeBiennially'], date( 'Y' ) ) ) : $invoicedate);

						if ($CONFIG['CreateInvoiceDaysBeforeTriennially']) {
							$invoicedatetriennially = (true ? date( 'Ymd', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) + $CONFIG['CreateInvoiceDaysBeforeTriennially'], date( 'Y' ) ) ) : $invoicedate);

							if (0 < $whmcs->get_config( 'CreateDomainInvoiceDaysBefore' )) {
								$domaininvoicedate = (true ? date( 'Ymd', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) + $CONFIG['CreateDomainInvoiceDaysBefore'], date( 'Y' ) ) ) : $invoicedate);

								if ($continvoicegen) {
									$matchfield = (true ? 'nextinvoicedate' : 'nextduedate');
									run_hook( 'PreInvoicingGenerateInvoiceItems', array(  ) );
									$statusfilter = '\'Pending\',\'Active\'';

									if (!$continuous_invoicing_active_only) {
										$statusfilter .= ',\'Suspended\'';
										$hostingquery =  . 'domainstatus IN (' . $statusfilter . ') AND billingcycle!=\'Free\' AND billingcycle!=\'Free Account\' AND nextduedate!=\'00000000\' AND nextinvoicedate!=\'00000000\' AND ((billingcycle=\'Monthly\' AND ' . $matchfield . '<=\'' . $invoicedatemonthly . (  . '\') OR (billingcycle=\'Quarterly\' AND ' . $matchfield . '<=\'' ) . $invoicedatequarterly . (  . '\') OR (billingcycle=\'Semi-Annually\' AND ' . $matchfield . '<=\'' ) . $invoicedatesemiannually . (  . '\') OR (billingcycle=\'Annually\' AND ' . $matchfield . '<=\'' ) . $invoicedateannually . (  . '\') OR (billingcycle=\'Biennially\' AND ' . $matchfield . '<=\'' ) . $invoicedatebiennially . (  . '\') OR (billingcycle=\'Triennially\' AND ' . $matchfield . '<=\'' ) . $invoicedatetriennially . '\') OR (billingcycle=\'One Time\'))';
										$domainquery =  . '(donotrenew=\'\' OR `status`=\'Pending\') AND `status` IN (' . $statusfilter . ') AND ' . $matchfield . '<=\'' . $domaininvoicedate . '\'';
											. 'tblhostingaddons.billingcycle!=\'Free\' AND tblhostingaddons.billingcycle!=\'Free Account\' AND tblhostingaddons.status IN (' . $statusfilter . ') AND tblhostingaddons.nextduedate!=\'00000000\' AND tblhostingaddons.nextinvoicedate!=\'00000000\' AND ((tblhostingaddons.billingcycle=\'Monthly\' AND tblhostingaddons.' . $matchfield . '<=\'' . $invoicedatemonthly;
											. '\') OR (tblhostingaddons.billingcycle=\'Quarterly\' AND tblhostingaddons.' . $matchfield;
									}
								}
							}
						}
					}
				}
			}
		}
	}


	while (true) {
		$hostingaddonsquery =  . (  . '<=\'' ) . $invoicedatequarterly . (  . '\') OR (tblhostingaddons.billingcycle=\'Semi-Annually\' AND tblhostingaddons.' . $matchfield . '<=\'' ) . $invoicedatesemiannually . (  . '\') OR (tblhostingaddons.billingcycle=\'Annually\' AND tblhostingaddons.' . $matchfield . '<=\'' ) . $invoicedateannually . (  . '\') OR (tblhostingaddons.billingcycle=\'Biennially\' AND tblhostingaddons.' . $matchfield . '<=\'' ) . $invoicedatebiennially . (  . '\') OR (tblhostingaddons.billingcycle=\'Triennially\' AND tblhostingaddons.' . $matchfield . '<=\'' ) . $invoicedatetriennially . '\') OR (tblhostingaddons.billingcycle=\'One Time\'))';
		$i = 11;
		$billableitemqry = '';

		if ($func_userid != '') {
			$hostingquery .= ' AND userid=' . (int)$func_userid;
			$domainquery .= ' AND userid=' . (int)$func_userid;
			$hostingaddonsquery .= ' AND tblhosting.userid=' . (int)$func_userid;
			$billableitemqry = ' AND userid=' . (int)$func_userid;

			if (is_array( $specificitems )) {
				$hostingaddonsquery = '';
				$domainquery = ;
				$hostingquery = ;

				if ($specificitems['products']) {
					$hostingquery .= '(id IN (' . db_build_in_array( $specificitems['products'] ) . ') AND billingcycle!=\'Free\' AND billingcycle!=\'Free Account\')';

					if ($specificitems['addons']) {
						$hostingaddonsquery .= 'tblhostingaddons.id IN (' . db_build_in_array( $specificitems['addons'] ) . ') AND tblhostingaddons.billingcycle!=\'Free\' AND tblhostingaddons.billingcycle!=\'Free Account\'';

						if ($specificitems['domains']) {
							$domainquery .= 'id IN (' . db_build_in_array( $specificitems['domains'] ) . ')';
							$AddonSpecificIDs = array(  );
							$AddonsArray = ;
							new ddhjgidcb(  );
							$gateways = ;

							if ($hostingquery) {
								$servicecount = 11;
								$cancellationreqids = array(  );
								select_query( 'tblcancelrequests', 'DISTINCT relid', '' );
								$result = ;
								mysql_fetch_array( $result );

								if ($data = ) {
									$cancellationreqids[] = $data[0];
									break;
								}
							}
							else {
								$tax = ;
								$productdetails['recurringcycles'];
								$recurringcycles = ;
								$recurringfinished = false;

								if ($recurringcycles) {
									get_query_val( 'tblinvoiceitems', 'COUNT(id)', array( 'userid' => $userid, 'type' => 'Hosting', 'relid' => $id ) );
									$num_rows3 = ;

									if ($recurringcycles <= $num_rows3) {
										update_query( 'tblhosting', array( 'domainstatus' => 'Terminated' ), array( 'id' => $id ) );
										run_hook( 'ServiceRecurringCompleted', array( 'serviceid' => $id, 'recurringinvoices' => $num_rows3 ) );
										$recurringfinished = true;

										if (!$recurringfinished) {
											getInvoiceProductPromo( $amount, $promoid, $userid, $id );
											$promovals = ;

											if (isset( $promovals['description'] )) {
												$promovals['amount'];
												$amount -= ;
												insert_query( 'tblinvoiceitems', array( 'userid' => $userid, 'type' => 'Hosting', 'relid' => $id, 'description' => $description, 'amount' => $amount, 'taxed' => $tax, 'duedate' => $nextduedate, 'paymentmethod' => $paymentmethod ) );

												if (isset( $promovals['description'] )) {
													insert_query( 'tblinvoiceitems', array( 'userid' => $userid, 'type' => 'PromoHosting', 'relid' => $id, 'description' => $promovals['description'], 'amount' => $promovals['amount'], 'taxed' => $tax, 'duedate' => $nextduedate, 'paymentmethod' => $paymentmethod ) );
												}
											}
										}
									}
								}

								$nextduedate = ;
								$data['status'];
								$status = ;
								get_query_val( 'tblinvoiceitems', 'COUNT(id)', array( 'userid' => $userid, 'type' => 'Addon', 'relid' => $id, 'duedate' => $nextduedate ) );
								$num_rows = ;
								$contblock = false;

								if (( ( !$num_rows && $continvoicegen ) && $status == 'Pending' )) {
									get_query_val( 'tblinvoiceitems', 'COUNT(id)', array( 'userid' => $userid, 'type' => 'Addon', 'relid' => $id ) );
									$num_rows = ;
									$contblock = true;

									if ($num_rows == 0) {
										$data['hostingid'];
										$serviceid = ;
										$hostingid = ;
										$data['addonid'];
										$addonid = ;
										$data['domain'];
										$domain = ;
										$data['addonregdate'];
										$regdate = ;
										$data['name'];
										$name = ;
										$data['setupfee'];
										$setupfee = ;
										$data['recurring'];
										$amount = ;
										$data['paymentmethod'];
										$paymentmethod = ;
										$data['billingcycle'];
										$billingcycle = ;
										$data['tax'];
										$tax = ;

										if (!$name) {
											if (isset( $AddonsArray[$addonid] )) {
												$AddonsArray[$addonid];
												$name = ;
											}
										}
									}

									break;
								}

								$data['firstpaymentamount'];
								$amount = ;

								if ($type == 'Transfer') {
									$_LANG['domaintransfer'];
									$domaindesc = ;
								}

								$type = 'Register';
							}
						}
					}
				}
			}
		}

		$domaindesc .= ' (' . ( $expirydate ) . ' - ' . fromMySQLDate( getInvoicePayUntilDate( $expirydate, $registrationperiod ) ) . ')';

		if ($dnsmanagement) {
			$domaindesc .= '
 + ' . $_LANG['domaindnsmanagement'];

			if ($emailforwarding) {
				$domaindesc .= '
 + ' . $_LANG['domainemailforwarding'];

				if ($idprotection) {
					$domaindesc .= '
 + ' . $_LANG['domainidprotection'];
					$promo_amount = 11;
					$promo_description = ;

					if ($promoid) {
						get_query_vals( 'tblpromotions', '', array( 'id' => $promoid ) );
						$data = ;
						$data['id'];
						$promo_id = ;

						if ($promo_id) {
							$data['code'];
							$promo_code = ;
							$data['type'];
							$promo_type = ;
							$data['recurring'];
							$promo_recurring = ;
							$data['value'];
							$promo_value = ;

							if (( $promo_recurring || ( !$promo_recurring && $regdate == $nextduedate ) )) {
								if ($promo_type == 'Percentage') {
									$promo_amount = round( $amount / ( 1 - $promo_value / 100 ), 2 ) - $amount;
									$promo_value .= '%';
									break;
								}
							}
						}
					}

					$promo_description = ;
					$promo_amount *= 10;
					insert_query( 'tblinvoiceitems', array( 'userid' => $userid, 'type' => 'Domain' . $type, 'relid' => $id, 'description' => $domaindesc, 'amount' => $amount, 'taxed' => $tax, 'duedate' => $nextduedate, 'paymentmethod' => $paymentmethod ) );

					if ($promo_description) {
						insert_query( 'tblinvoiceitems', array( 'userid' => $userid, 'type' => 'PromoDomain', 'relid' => $id, 'description' => $promo_description, 'amount' => $promo_amount, 'taxed' => $tax, 'duedate' => $nextduedate, 'paymentmethod' => $paymentmethod ) );
					}

					(  );
					$day = ;
					mktime( 0, 0, 0, $month, $day, $year + $registrationperiod );
					$new_time = ;
					date( 'Ymd', $new_time );
					$nextinvoicedate = ;
					update_query( 'tbldomains', array( 'nextinvoicedate' => $nextinvoicedate ), array( 'id' => $id ) );
					getUsersLang( 0 );
					++$domaincount;

					if (is_object( $cron )) {
						$cron->logActivityDebug(  . 'Invoicing Loop Domain ID ' . $id . ' - ' . $domaincount . ' of ' . $totaldomainrows );
					}
				}

				break;
			}
		}

		(  );
	}

	run_hook( 'AfterInvoicingGenerateInvoiceItems', array(  ) );
	$invoiceid = 11;
	$invoicecount = ;
	$where = array(  );
	$where[] = 'invoiceid=0';

	if ($func_userid) {
		$where[] = 'userid=' . (int)$func_userid;

		if (!is_array( $specificitems )) {
			$where[] = 'tblclients.separateinvoices=\'0\'';
			$where[] = '(tblclientgroups.separateinvoices=\'0\' OR tblclientgroups.separateinvoices = \'\' OR tblclientgroups.separateinvoices is null)';
			select_query( 'tblinvoiceitems', 'DISTINCT tblinvoiceitems.userid,tblinvoiceitems.duedate,tblinvoiceitems.paymentmethod', implode( ' AND ', $where ), 'duedate', 'ASC', '', 'tblclients ON tblclients.id=tblinvoiceitems.userid LEFT JOIN tblclientgroups ON tblclientgroups.id=tblclients.groupid' );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				createInvoicesProcess( $data, $noemails, $nocredit );
			}
		}

		(  );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			createInvoicesProcess;
			$data;
		}

		( $noemails, $nocredit );
	}

	jmp;
	( $invoicecount . ' Invoices Created' );

	if ($func_userid) {
	}

	return $invoiceid;
}

function createInvoicesProcess($data, $noemails = '', $nocredit = '') {
	global $whmcs;
	global $cron;
	global $CONFIG;
	global $_LANG;
	global $invoicecount;
	global $invoiceid;

	$data['id'];
	$itemid = ;
	$data['userid'];
	$userid = ;
	$data['type'];
	$type = ;
	$data['relid'];
	$relid = ;
	$data['duedate'];
	$duedate = ;
	$data['paymentmethod'];
	$invpaymentmethod = ;
	$paymentmethod = ;
	new ddhjgidcb(  );
	$gateways = ;

	if (( !$invpaymentmethod || !$gateways->isActiveGateway( $invpaymentmethod ) )) {
		ensurePaymentMethodIsSet( $userid, $itemid, 'tblinvoiceitems' );
		$invpaymentmethod = ;
		$where = array( 'userid' => $userid, 'duedate' => $duedate, 'paymentmethod' => $paymentmethod, 'invoiceid' => '0' );

		if (!empty( $$itemid )) {
			$where['id'] = $itemid;

			if (is_null( get_query_val( 'tblinvoiceitems', 'id', $where ) )) {
				return false;
				unset( $$where );
				$taxrate2 = 5;
				$taxrate = ;

				if ($CONFIG['TaxEnabled']) {
					get_query_vals( 'tblclients', 'taxexempt,state,country,separateinvoices', array( 'id' => $userid ) );
					$data = ;
					$data['taxexempt'];
					$taxexempt = ;
					$data['state'];
					$taxstate = ;
					$data['country'];
					$taxcountry = ;

					if (!$taxexempt) {
						getTaxRate( 1, $taxstate, $taxcountry );
						$taxrate = ;
						getTaxRate( 2, $taxstate, $taxcountry );
						$taxrate2 = ;
						$taxrate['rate'];
						$taxrate = ;
						$taxrate2['rate'];
						$taxrate2 = ;
						insert_query( 'tblinvoices', array( 'date' => 'now()', 'duedate' => $duedate, 'userid' => $userid, 'status' => 'Unpaid', 'taxrate' => $taxrate, 'taxrate2' => $taxrate2, 'paymentmethod' => $invpaymentmethod, 'notes' => $invoicenotes ) );
						$invoiceid = ;

						if ($paymentmethod != $invpaymentmethod) {
							if (is_object( $cron )) {
								$cron->logActivity( sprintf( 'Invalid payment method updated on invoice generation from \'%s\' to \'%s\' for Invoice ID: %d', $paymentmethod, $invpaymentmethod, $invoiceid ) );
							}
						}
					}
				}
			}
		}
	}

	$discountAmount =  * -1;
	insert_query( 'tblinvoiceitems', array( 'invoiceid' => $invoiceid, 'userid' => $userid, 'type' => 'GroupDiscount', 'description' => $_LANG['clientgroupdiscount'], 'amount' => $discountAmount, 'taxed' => '1' ) );
	updateInvoiceTotal( $invoiceid );
	get_query_vals( 'tblclients', 'credit,groupid', array( 'id' => $userid ) );
	$data2 = ;
	$data2['credit'];
	$credit = ;
	$data2['groupid'];
	$groupid = ;
	get_query_vals( 'tblinvoices', 'subtotal,total', array( 'id' => $invoiceid ) );
	$data2 = ;
	$data2['subtotal'];
	$subtotal = ;
	$data2['total'];
	$total = ;

	if ($whmcs->get_config( 'ContinuousInvoiceGeneration' )) {
		select_query( 'tblinvoiceitems', '', array( 'invoiceid' => $invoiceid ) );
		$result2 = ;
		mysql_fetch_array( $result2 );

		if ($data = ) {
			$data['type'];
			$type = ;
			$data['relid'];
			$relid = ;
			$data['duedate'];
			$nextinvoicedate = ;
			substr( $nextinvoicedate, 0, 4 );
			$year = ;
			substr( $nextinvoicedate, 5, 2 );
			$month = ;
			substr( $nextinvoicedate, 8, 2 );
			$day = ;
			$proratabilling = false;

			if ($type == 'Hosting') {
				get_query_vals( 'tblhosting', 'billingcycle,packageid,regdate,nextduedate', array( 'id' => $relid ) );
				$data = ;
				$data['billingcycle'];
				$billingcycle = ;
				$data['packageid'];
				$packageid = ;
				$data['regdate'];
				$regdate = ;
				$data['nextduedate'];
				$nextduedate = ;
				get_query_vals( 'tblproducts', 'proratabilling,proratadate,proratachargenextmonth', array( 'id' => $packageid ) );
				$data = ;
				$data['proratabilling'];
				$proratabilling = ;
				$data['proratadate'];
				$proratadate = ;
				$data['proratachargenextmonth'];
				$proratachargenextmonth = ;
				getBillingCycleMonths( $billingcycle );
				$proratamonths = ;
				date( 'Ymd', mktime( 0, 0, 0, $month + $proratamonths, $day, $year ) );
				$nextinvoicedate = ;
			}

			(  );
			$ordermonth = ;
			substr( $regdate, 8, 2 );
			$orderday = ;

			if ($orderday < $proratadate) {
				$proratamonth = $CONFIG;
			}
		}
	}

	( 'Y-m-d', mktime( 0, 0, 0, $proratamonth, $proratadate, $orderyear ) );
	$nextinvoicedate = ;

	if (( $proratachargenextmonth <= $orderday && $days < 31 )) {
		date( 'Y-m-d', mktime( 0, 0, 0, $proratamonth + $proratamonths, $proratadate, $orderyear ) );
		$nextinvoicedate = ;

		if ($type == 'Hosting') {
			update_query;
			'tblhosting';
			array( 'nextinvoicedate' => $nextinvoicedate );
			array( 'id' => $relid );
		}

		(  );
	}

	jmp;
	(  . ' - Amount: ' . $credit, $userid );
	insert_query( 'tblcredit', array( 'clientid' => $userid, 'date' => 'now()', 'description' =>  . 'Credit Applied to Invoice #' . $invoiceid, 'amount' => $credit * -1 ) );
	update_query( 'tblclients', array( 'credit' => $creditleft ), array( 'id' => $userid ) );
	update_query( 'tblinvoices', array( 'credit' => $credit ), array( 'id' => $invoiceid ) );
	updateInvoiceTotal( $invoiceid );
	array( 'source' => 'autogen' );

	if (eaaadiagec::get( 'adminid' )) {
		$invoiceArr = array( 'user' => (true ? eaaadiagec::get( 'adminid' ) : 'system'), 'invoiceid' => $invoiceid, 'status' => 'Unpaid' );
		run_hook( 'InvoiceCreation', $invoiceArr );
		select_query( 'tblpaymentgateways', 'value', array( 'gateway' => $invpaymentmethod, 'setting' => 'type' ) );
		$result2 = ;
		mysql_fetch_array( $result2 );
		$data2 = ;
		$data2['value'];
		$paymenttype = ;

		if ($noemails != 'true') {
			run_hook( 'InvoiceCreationPreEmail', $invoiceArr );

			if (( $paymenttype == 'CC' || $paymenttype == 'OfflineCC' )) {
				( (true ? 'Credit Card ' : '') . 'Invoice Created', $invoiceid );
				cjceffhecg::saveClientSnapshotData;
				$invoiceid;
			}

			sendMessage(  );
			run_hook( 'InvoiceCreated', $invoiceArr );
			select_query( 'tblinvoices', 'total', array( 'id' => $invoiceid, 'status' => 'Unpaid' ) );
			$result2 = ;
			mysql_fetch_array;
			$result2;
		}

		(  );
		$data2 = ;
		$data2['total'];
		$total = ;

		if ($total == '0.00') {
			$doprocesspaid = true;
			eaaadiagec::set;
		}

		( 'InOrderButNeedProcessPaidInvoiceAction', false );

		if ($doprocesspaid) {
			defined;
		}


		if (( 'INORDERFORM' )) {
			eaaadiagec::set( 'InOrderButNeedProcessPaidInvoiceAction', true );
		}

		( $invoiceid );
	}

	$invoicetotal = 5;
	++$invoicecount;
	chhjeidgjf::adjustIncrementForNextInvoice( $invoiceid );
}

function getInvoiceProductDetails($id, $pid, $regdate, $nextduedate, $billingcycle, $domain, $userid) {
	global $CONFIG;
	global $_LANG;
	global $currency;

	while (true) {
		$data = ;
		$data['type'];
		$type = ;
		ccbjgfhb::find( $userid, array( 'language' ) )->language;
		$clientLanguage = null;
		cbebjifhdd::getProductName( $pid, $data['name'], $clientLanguage );
		$package = ;
		$data['tax'];
		$tax = ;
		$data['proratabilling'];
		$proratabilling = ;
		$data['proratadate'];
		$proratadate = ;
		$data['proratachargenextmonth'];
		$proratachargenextmonth = ;
		$data['recurringcycles'];
		$recurringcycles = ;
		get_query_val( 'tblhosting', 'userid', array( 'id' => $id ) );
		$userid = ;
		getCurrency( $userid );
		$currency = ;

		if (( $tax && $CONFIG['TaxEnabled'] )) {
			$tax = '1';
		}

		$optionname = (  . $optionname . ' ' );
		get_query_val( 'tblpricing', $configbillingcycle, array( 'type' => 'configoptions', 'currency' => $currency['id'], 'relid' => $optionid ) );
		$qtyprice = ;
		formatCurrency( $qtyprice );
		$optionname .= ;

		while (true) {
			$description .= (  . '
' ) . $confoption . ': ' . $optionname;
		}

		select_query( 'tblcustomfields', 'tblcustomfields.id,tblcustomfields.fieldname,(SELECT value FROM tblcustomfieldsvalues WHERE tblcustomfieldsvalues.fieldid=tblcustomfields.id AND tblcustomfieldsvalues.relid=' . (int)$id . ' LIMIT 1) AS value', array( 'type' => 'product', 'relid' => $pid, 'showinvoice' => 'on' ) );
		$result = ;
		mysql_fetch_assoc( $result );

		if (!( ( $data = get_query_vals( 'tblproducts', 'name,type,tax,proratabilling,proratadate,proratachargenextmonth,recurringcycles', array( 'id' => $pid ) ) && !$data['value'] ))) {
			$data['fieldname'] = bdjjciefbe::getFieldName( $data['id'], $data['fieldname'], $clientLanguage );
			$description .= '
' . $data['fieldname'] . ': ' . $data['value'];
		}
	}

	return array( 'description' => $description, 'tax' => $tax, 'recurringcycles' => $recurringcycles );
}

function InvoicesAddLateFee() {
	global $CONFIG;
	global $_LANG;
	global $cron;

	if ($CONFIG['TaxLateFee']) {
		$taxlatefee = '1';
		$invoiceids = array(  );

		if ($CONFIG['InvoiceLateFeeAmount'] != '0.00') {
			if ($CONFIG['AddLateFeeDays'] == '') {
				$CONFIG['AddLateFeeDays'] = '0';
				date;
				'Ymd';
				mktime;
				0;
				0;
				0;
				date( 'm' );
				date( 'd' ) - $CONFIG['AddLateFeeDays'];
			}

			( ( , date( 'Y' ) ) );
			$adddate = ;
			$query = 'SELECT tblinvoices.* FROM tblinvoices ' . 'INNER JOIN tblclients ON tblclients.id=tblinvoices.userid ' . 'WHERE duedate<=\'' . $adddate . '\' AND tblinvoices.status=\'Unpaid\' AND duedate!=date AND latefeeoveride=\'0\'';
			full_query( $query );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				$data['userid'];
				$userid = ;
				$data['id'];
				$invoiceid = ;
				$data['duedate'];
				$duedate = ;
				$data['paymentmethod'];
				$paymentmethod = ;
				$data['total'];
				$total = ;

				if (!get_query_val( 'tblinvoiceitems', 'COUNT(id)', array( 'type' => 'LateFee', 'invoiceid' => $invoiceid ) )) {
					if ($CONFIG['LateFeeType'] == 'Percentage') {
						get_query_val( 'tblaccounts', 'SUM(amountin)-SUM(amountout)', array( 'invoiceid' => $invoiceid ) );
						$amountpaid = ;
						round( $total - $amountpaid, 2 );
						$balance = ;
						format_as_currency( $balance * ( $CONFIG['InvoiceLateFeeAmount'] / 100 ) );
						$latefeeamount = ;
					}

					$latefeeamount < $CONFIG['LateFeeMinimum'];

					if ((bool)) {
						$CONFIG['LateFeeMinimum'];
						$latefeeamount = ;
						getUsersLang( $userid );
						insert_query( 'tblinvoiceitems', array( 'userid' => $userid, 'type' => 'LateFee', 'invoiceid' => $invoiceid, 'description' => $_LANG['latefee'] . ' (' . $_LANG['latefeeadded'] . ' ' . fromMySQLDate( date( 'Y-m-d' ) ) . ')', 'amount' => $latefeeamount, 'duedate' => $duedate, 'paymentmethod' => $paymentmethod, 'taxed' => $taxlatefee ) );

						if (!function_exists( 'updateInvoiceTotal' )) {
							require( dirname( __FILE__ ) . '/invoicefunctions.php' );
							updateInvoiceTotal( $invoiceid );
							run_hook( 'AddInvoiceLateFee', array( 'invoiceid' => $invoiceid ) );
							$invoiceids[] = $invoiceid;
						}

						is_object( $cron );
					}
				}
			}
		}
		else {
			if () {
				$cron->logActivity;

				if (count( $invoiceids )) {
					' (Invoice Numbers: ' . implode( ',', $invoiceids );
				}

				'Late Invoice Fees added to ' . count( $invoiceids ) . ' Invoices' . (true ?  . ')' : '');
			}
		}

		( , true );
		$cron->emailLog;
	}


	if (count( $invoiceids )) {
		' to Invoice Numbers ' . implode( ',', $invoiceids );
	}

	( count( $invoiceids ) . ' Late Fees Added' . '' );
}

function SendOverdueInvoiceReminders() {
	global $whmcs;
	global $CONFIG;
	global $cron;

	$count = 5;
	$types = array( 'First', 'Second', 'Third' );
	foreach ($types as ) {
		$type = ;

		while (true) {
			if ($CONFIG['Send' . $type . 'OverdueInvoiceReminder'] != '0') {
				date( 'Ymd', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) - $CONFIG['Send' . $type . 'OverdueInvoiceReminder'], date( 'Y' ) ) );
				$adddate = ;
				select_query( 'tblinvoices,tblclients', 'tblinvoices.id,tblinvoices.userid,tblclients.firstname,tblclients.lastname', array( 'tblinvoices.duedate' => $adddate, 'tblinvoices.status' => 'Unpaid', 'tblclients.overideduenotices' => '0', 'tblclients.id' => array( 'sqltype' => 'TABLEJOIN', 'value' => 'tblinvoices.userid' ) ) );
				$result = ;
				mysql_fetch_array( $result );

				while (true) {
					if ($data = ) {
						$data['id'];
						$invoiceid = ;
						$data['userid'];
						$userid = ;
						$data['firstname'];
						$firstname = ;
						$data['lastname'];
						$lastname = ;
						full_query( 'SELECT COUNT(tblinvoiceitems.id) FROM tblinvoiceitems INNER JOIN tblhosting ON tblhosting.id=tblinvoiceitems.relid WHERE tblinvoiceitems.type = \'Hosting\' AND tblhosting.overideautosuspend = \'1\' AND tblhosting.overidesuspenduntil>\'' . date( 'Y-m-d' ) . '\' AND tblhosting.overidesuspenduntil!=\'0000-00-00\' AND tblinvoiceitems.invoiceid = ' . (int)$invoiceid );
						$result2 = ;
						mysql_fetch_array( $result2 );
						$data2 = ;
						$data2[0];
						$numoverideautosuspend = ;

						if ($numoverideautosuspend == '0') {
							sendMessage( $type . ' Invoice Overdue Notice', $invoiceid );
							run_hook( 'InvoicePaymentReminder', array( 'invoiceid' => $invoiceid, 'type' => strtolower( $type ) . 'overdue' ) );

							if (is_object( $cron )) {
								$cron->emailLogSub( 'Sent ' . $type . ' Notice to User ' . $firstname . ' ' . $lastname );
								++$count;
								break 3;
							}

							break 3;
						}

						break;
					}
				}
			}
		}
	}


	if (is_object( $cron )) {
		$cron->logActivity;
		'Sent ' . $count;
	}

	(  . ' Reminders', true );
	$cron->emailLog( $count . ' Overdue Invoice Reminders Sent' );
}

function getInvoiceProductPromo($amount, $promoid, $userid = '', $serviceid = '', $orderamt = '') {
	global $_LANG;
	global $currency;

	if (!$promoid) {
		return array(  );
		get_query_vals( 'tblpromotions', '', array( 'id' => $promoid ) );
		$data = ;
		$data['id'];
		$promo_id = ;

		if (!$promo_id) {
			return array(  );
			$data['code'];
			$promo_code = ;
		}

		$data['type'];
		$promo_type = ;
		$data['recurring'];
		$promo_recurring = ;
		$data['value'];
		$promo_value = ;
		$data['recurfor'];
		$promo_recurfor = ;

		if ($userid) {
			getCurrency( $userid );
			$currency = ;

			if ($serviceid) {
				get_query_vals( 'tblhosting', 'packageid,regdate,nextduedate,firstpaymentamount,billingcycle', array( 'id' => $serviceid ) );
				$data = ;
				$data['packageid'];
				$pid = ;
				$data['regdate'];
				$regdate = ;
				$data['nextduedate'];
				$nextduedate = ;
				$data['firstpaymentamount'];
				$firstpaymentamount = ;
				$data['billingcycle'];
				$billingcycle = ;
				str_replace( '-', '', strtolower( $billingcycle ) );
				$billingcycle = ;

				if ($billingcycle == 'one time') {
					$billingcycle = 'monthly';

					if (( ( $serviceid && $promo_recurring ) && 0 < $promo_recurfor )) {
						get_query_val;
						'tblinvoiceitems';
						'COUNT(id)';
						array( 'userid' => $userid, 'type' => 'Hosting' );
					}
				}
			}
		}

		( array( 'relid' => $serviceid ) );
		$promo_recurringcount = ;

		if ($promo_recurfor - 1 <= $promo_recurringcount) {
			getInvoiceProductDefaultPrice( $pid, $billingcycle, $regdate, $nextduedate );
			$fullAmount = ;

			if (!function_exists( 'getCartConfigOptions' )) {
				require( ROOTDIR . '/includes/configoptionsfunctions.php' );
				getCartConfigOptions( $pid, '', $billingcycle, $serviceid );
				$configoptions = ;
				foreach ($configoptions as ) {
					$configoption = ;
					$configoption['selectedrecurring'];
					$fullAmount += ;
					break;
				}

				update_query;
				'tblhosting';
				array( 'amount' => $fullAmount, 'promoid' => '0' );
			}
		}

		( array( 'id' => $serviceid ) );

		if (!$promo_id) {
			return array(  );

			if (( !$serviceid || ( $promo_recurring || ( !$promo_recurring && $regdate == $nextduedate ) ) )) {
				if ($promo_type == 'Percentage') {
					$promo_amount = round( $amount / ( 1 - $promo_value / 100 ), 2 ) - $amount;

					if ($orderamt) {
						$promoAmountCheck = $promo_amount + $amount;

						if ($promoAmountCheck < $orderamt) {
							$promo_amount = $promo_amount + ( $orderamt - $promoAmountCheck );

							if (( 0 < $promo_value && $promo_amount <= 0 )) {
							}
						}


						if ($orderamt) {
							$promo_amount = (true ? $orderamt : getInvoiceProductDefaultPrice( $pid, $billingcycle, $regdate, $nextduedate ));
							$promo_value .= '%';
						}
					}
				}
			}

			( $serviceid, $userid );
			$default_price = ;

			if ($default_price < $promo_value) {
				$promo_value = $regdate;
				$default_price = '';
				$promo_amount = $userid;
				formatCurrency( $promo_value );
				$promo_value = ;
			}

			( 1, $currency['id'] );
			$promo_value = ;

			if ($orderamt) {
				$orderamt;
				getInvoiceProductDefaultPrice;
				$pid;
				$billingcycle;
				$regdate;
				$nextduedate;
			}

			$promo_amount = (  );
			$promo_amount -= $userid;
			$promo_value = formatCurrency( $promo_value ) . ' ' . $_LANG['orderpromopriceoverride'];
		}
	}

	$promo_amount = ;
	$promo_amount -= $data;
	$_LANG['orderpromofreesetup'];
	$promo_value = ;
	getUsersLang( $userid );

	if ($promo_recurring) {
		$promo_recurring = (true ? $_LANG['recurring'] : $_LANG['orderpaymenttermonetime']);
		$_LANG['orderpromotioncode'] . ( (  . ': ' . $promo_code . ' - ' . $promo_value . ' ' ) . $promo_recurring . ' ' ) . $_LANG['orderdiscount'];
	}

	$promo_description = ;
	getUsersLang( 0 );
	return array( 'description' => $promo_description, 'amount' => $promo_amount * -1 );
}

/**
 * Obtain the full price for the product before any promotional discount is applied.
 *
 * @throws WHMCS\Exception An exception if the billingcycle is not set
 *
 * @param int $pid
 * @param string $billingCycle
 * @param string $regDate
 * @param string $nextDueDate
 * @param int $serviceID
 * @param int $userID
 *
 * @todo Replace use of Capsule with pricing model when available.
 *
 * @return float
 */
function getInvoiceProductDefaultPrice($pid, $billingCycle, $regDate, $nextDueDate, $serviceID = 0, $userID = 0) {
	global $currency;

	bfiifiigdh::table( 'tblpricing' )->where( 'type', '=', 'product' )->where( 'currency', '=', $currency['id'] )->where( 'relid', '=', $pid )->first(  );
	$data = ;
	$amount = 416;
	switch ($billingCycle) {
	case 'one time': {
		}

	case 'semiannually': {
			$setupFieldName = 'ssetupfee';
			$data->semiannually;
			$amount = ;
			break;
			switch ($billingCycle) {
			case 'annually': {
					$setupFieldName = 'asetupfee';
					$data->annually;
					$amount = ;
					break;
					switch ($billingCycle) {
					case 'biennially': {
							$setupFieldName = 'bsetupfee';
							$data->biennially;
							$amount = ;
							break;
							switch ($billingCycle) {
							case 'triennially': {
									$setupFieldName = 'tsetupfee';
								}
							}

							$data->triennally;
							$amount = ;
						}
					}

					break;
					throw new becajhcbcg( 'Unable to obtain pricing for billing cycle' );
					break 2;
				}
			}
		}
	}

	empty( $$setupFieldName );

	if ((bool)) {
		$data->$setupFieldName;
		$amount += ;

		if ($serviceID) {
			if (!function_exists( 'recalcRecurringProductPrice' )) {
				ROOTDIR;
			}

			require(  . '/includes/clientfunctions.php' );

			if ($billingCycle == 'semiannually') {
				$billingCycle = 'Semi-Annually';
			}
		}
	}

	( $billingCycle );
	$billingCycle = ;
	$includeSetup = false;

	if ($regDate == $nextDueDate) {
		$includeSetup = true;
		recalcRecurringProductPrice;
		$serviceID;
	}

	( $userID, $pid, $billingCycle, 'empty', 0, $includeSetup );
	$amount = ;
	return $amount;
}

?>
