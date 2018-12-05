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

function SumUpPackageUpgradeOrder($id, $newproductid, $newproductbillingcycle, $promocode, $paymentmethod = '', $checkout = '') {
	global $CONFIG;
	global $_LANG;
	global $currency;
	global $upgradeslist;
	global $orderamount;
	global $orderdescription;
	global $applytax;

	$_SESSION['upgradeids'] = '';
	App::self(  );
	$whmcs = ;
	$configoptionsamount = 5;
	select_query( 'tblhosting', 'tblproducts.id,tblproducts.name,tblhosting.nextduedate,tblhosting.billingcycle,tblhosting.amount,' . 'tblhosting.firstpaymentamount,tblhosting.domain', array( 'userid' => $_SESSION['uid'], 'tblhosting.id' => $id ), '', '', '', 'tblproducts ON tblproducts.id=tblhosting.packageid' );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$oldproductid = ;
	cbebjifhdd::getProductName( $oldproductid, $data['name'] );
	$oldproductname = ;
	$data['domain'];
	$domain = ;
	$data['nextduedate'];
	$nextduedate = ;
	$data['billingcycle'];
	$billingcycle = ;
	$data['amount'];
	$oldamount = ;

	if ($billingcycle == 'One Time') {
		$data['firstpaymentamount'];
		$oldamount = ;
		new cghjgaich(  );
		$cycle = ;

		if (!( $cycle->isValidSystemBillingCycle( $newproductbillingcycle ) || $cycle->isValidPublicBillingCycle( $newproductbillingcycle ) )) {
			exit( 'Invalid New Billing Cycle' );
			cbebjifhdd::findOrFail( $newproductid );
			$product = ;
			$product->id;
			$newproductid = ;
			$product->name;
			$newproductname = ;
			$product->applyTax;
			$applytax = ;
			$product->paymentType;
			$paytype = ;
			$product->stockControlEnabled;
			$stockControlEnabled = ;
			$product->quantityInStock;
			$quantityInStock = ;
		}
	}
	else {
		$totalDue +=  + ;

		if ($checkout) {
			$_LANG['upgradedowngradepackage'];
				. ': ';
		}

			. (  . $oldproductname . ' => ' . $newproductname . '<br>
' ) . $_LANG['orderbillingcycle'] . ': ' . $_LANG['orderpaymentterm' . str_replace( array( '-', ' ' ), '', strtolower( $newproductbillingcycle ) )] . '<br>
' . $_LANG['ordertotalduetoday'] . ': ';
		formatCurrency;
	}

	$orderdescription =  . ( $totalDue );
	$amountwithdiscount = $amountdue - $discount;
	insert_query( 'tblupgrades', array( 'type' => 'package', 'date' => 'now()', 'relid' => $id, 'originalvalue' => $oldproductid, 'newvalue' => (  . $newproductid . ',' ) . $newproductbillingcycleraw, 'amount' => $amountwithdiscount, 'recurringchange' => $difference ) );
	$upgradeid = ;
	$upgradeslist .= $upgradeid . ',';
	$_SESSION['upgradeids'][] = $upgradeid;

	if (0 < $amountdue) {
		if ($domain) {
			$domain =  . ' - ' . $domain;
			insert_query;
		}
	}

	( 'tblinvoiceitems', array( 'userid' => $_SESSION['uid'], 'type' => 'Upgrade', 'relid' => $upgradeid, 'description' => $_LANG['upgradedowngradepackage'] . ( (  . ': ' . $oldproductname . $domain . '
' ) . $oldproductname . ' => ' . $newproductname . ' (' ) . getTodaysDate(  ) . ' - ' . fromMySQLDate( $nextduedate ) . ')', 'amount' => $amountdue, 'taxed' => $applytax, 'duedate' => 'now()', 'paymentmethod' => $paymentmethod ) );

	if (0 < $discount) {
		insert_query( 'tblinvoiceitems', array( 'userid' => $_SESSION['uid'], 'description' => $_LANG['orderpromotioncode'] . ': ' . $promocode . ' - ' . $promodesc, 'amount' => $discount * -1, 'taxed' => $applytax, 'duedate' => 'now()', 'paymentmethod' => $paymentmethod ) );
		$orderamount += $result;
		jmp;

		if ($CONFIG['CreditOnDowngrade']) {
		}

		$creditamount = $amountdue * -1;
		insert_query( 'tblcredit', array( 'clientid' => $_SESSION['uid'], 'date' => 'now()', 'description' => 'Upgrade/Downgrade Credit', 'amount' => $creditamount ) );
		update_query( 'tblclients', array( 'credit' => '+=' . $creditamount ), array( 'id' => (int)$_SESSION['uid'] ) );
	}

	update_query( 'tblupgrades', array( 'paid' => 'Y' ), array( 'id' => $upgradeid ) );
	doUpgrade( $upgradeid );
	return $upgradearray;
}

function SumUpConfigOptionsOrder($id, $configoptions, $promocode, $paymentmethod = '', $checkout = '') {
	global $CONFIG;
	global $_LANG;
	global $upgradeslist;
	global $orderamount;

	while (true) {
		global $orderdescription;
		global $applytax;

		$_SESSION['upgradeids'] = array(  );
		select_query( 'tblhosting', 'packageid,domain,nextduedate,billingcycle', array( 'userid' => $_SESSION['uid'], 'id' => $id ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['packageid'];
		$packageid = ;
		$data['domain'];
		$domain = ;
		$data['nextduedate'];
		$nextduedate = ;
		$data['billingcycle'];
		$billingcycle = ;
		bfiifiigdh::table( 'tblproducts' )->find( $packageid, array( 'tax', 'name' ) );
		$productInfo = ;
		$productInfo->tax;
		$applytax = ;
		cbebjifhdd::getProductName( $packageid, $productInfo->name );
		$productname = ;

		if ($domain) {
			$productname .=  . ' - ' . $domain;
			substr( $nextduedate, 0, 4 );
			$year = ;
			substr( $nextduedate, 5, 2 );
			$month = ;
			substr( $nextduedate, 8, 2 );
			$day = ;
			getBillingCycleMonths( $billingcycle );
			$cyclemonths = ;
			date( 'Y-m-d', mktime( 0, 0, 0, $month - $cyclemonths, $day, $year ) );
			$prevduedate = ;
			round( ( strtotime( $nextduedate ) - strtotime( $prevduedate ) ) / 86400 );
			$totaldays = ;
			date( 'Ymd' );
			$todaysdate = ;
			strtotime( $todaysdate );
			$todaysdate = ;
			strtotime( $nextduedate );
			$nextduedatetime = ;
			round( ( $nextduedatetime - $todaysdate ) / 86400 );
			$days = ;

			if ($days < 0) {
				$days = $subtotal;
				$percentage = $days / $totaldays;
				$discount = 4;
				$promoqualifies = true;

				if ($promocode) {
					validateUpgradePromo( $promocode );
					$promodata = ;

					if (is_array( $promodata )) {
						$promodata['appliesto'];
						$appliesto = ;
						$promodata['cycles'];
						$cycles = ;
						$promodata['type'];
						$promotype = ;
						$promodata['value'];
						$promovalue = ;
						$promodata['discounttype'];
						$discounttype = ;
						$promodata['configoptions'];
						$upgradeconfigoptions = ;
						$promodata['desc'];
						$promodesc = ;

						if ($promotype != 'configoptions') {
							$promoqualifies = false;

							if (( ( count( $appliesto ) && $appliesto[0] ) && !in_array( $packageid, $appliesto ) )) {
								$promoqualifies = false;

								if (( ( count( $cycles ) && $cycles[0] ) && !in_array( $billingcycle, $cycles ) )) {
									$promoqualifies = false;

									if ($discounttype == 'Percentage') {
										$promovalue = $promovalue / 100;

										if ($promovalue == 0) {
											get_query_vals;
											'tblpromotions';
											'upgrades, upgradeconfig, type,value';
											array( 'lifetimepromo' => 1, 'recurring' => 1, 'code' => $promocode );
										}
									}
								}
							}
						}
					}
				}
			}

			(  );
			$promodata = ;

			if (is_array( $promodata )) {
				if ($promodata['upgrades'] == 1) {
					unserialize( $promodata['upgradeconfig'] );
					$upgradeconfig = ;

					if ($upgradeconfig['type'] != 'configoptions') {
						$promoqualifies = false;
						$upgradeconfig['value'];
						$promovalue = ;
						$upgradeconfig['discounttype'];
					}

					$discounttype = ;

					if ($discounttype == 'Percentage') {
						$promovalue = $promovalue / 100;
						$promoqualifies = true;
					}

					$new_selectedqty = ;
					$configoption['selectedname'];
					$new_selectedname = ;
					$configoption['selectedsetup'];
					$new_selectedsetup = ;
					$configoption['selectedrecurring'];
					$new_selectedrecurring = ;
					$oldconfigoptions[$key]['selectedvalue'];
					$old_selectedvalue = ;
					$oldconfigoptions[$key]['selectedqty'];
					$old_selectedqty = ;
					$oldconfigoptions[$key]['selectedname'];
					$old_selectedname = ;
					$oldconfigoptions[$key]['selectedsetup'];
					$old_selectedsetup = ;
					$oldconfigoptions[$key]['selectedrecurring'];
					$old_selectedrecurring = ;

					if (( ( ( $optiontype == 1 || $optiontype == 2 ) && $new_selectedvalue != $old_selectedvalue ) || ( ( $optiontype == 3 || $optiontype == 4 ) && $new_selectedqty != $old_selectedqty ) )) {
						$difference = $new_selectedrecurring - $old_selectedrecurring;
						$amountdue = $difference * $percentage;
						format_as_currency( $amountdue );
						$amountdue = ;

						if (( !$CONFIG['CreditOnDowngrade'] && $amountdue < 0 )) {
							format_as_currency( 0 );
							$amountdue = ;

							if (( $optiontype == 1 || $optiontype == 2 )) {
								$db_orig_value = $id;
								$db_new_value = $upgradearray;
								$originalvalue = $promocode;
								$newvalue = $amountwithdiscount;
								break;
							}
						}
					}
				}

				break;
			}
		}

		$amountwithdiscount = ;
		insert_query( 'tblupgrades', array( 'type' => 'configoptions', 'date' => 'now()', 'relid' => $id, 'originalvalue' =>  . $configid . '=>' . $db_orig_value, 'newvalue' => $db_new_value, 'amount' => $amountwithdiscount, 'recurringchange' => $difference, 'status' => 'Pending', 'paid' => $paid ) );
		$upgradeid = ;
		$_SESSION['upgradeids'][] = $upgradeid;

		if (0 < $amountdue) {
			insert_query( 'tblinvoiceitems', array( 'userid' => $_SESSION['uid'], 'type' => 'Upgrade', 'relid' => $upgradeid, 'description' => $_LANG['upgradedowngradeconfigoptions'] . ( (  . ': ' . $productname . '
' ) . $configname . ': ' . $originalvalue . ' => ' . $newvalue . ' (' ) . getTodaysDate(  ) . ' - ' . fromMySQLDate( $nextduedate ) . ')', 'amount' => $amountdue, 'taxed' => $applytax, 'duedate' => 'now()', 'paymentmethod' => $paymentmethod ) );

			if (0 < $itemdiscount) {
				insert_query( 'tblinvoiceitems', array( 'userid' => $_SESSION['uid'], 'description' => $_LANG['orderpromotioncode'] . ': ' . $promocode . ' - ' . $promodesc, 'amount' => $itemdiscount * -1, 'taxed' => $applytax, 'duedate' => 'now()', 'paymentmethod' => $paymentmethod ) );
				$orderamount += $domain;
			}

			break;
		}

		$creditamount = ;
		insert_query( 'tblcredit', array( 'clientid' => $_SESSION['uid'], 'date' => 'now()', 'description' => 'Upgrade/Downgrade Credit', 'amount' => $creditamount ) );
		update_query( 'tblclients', array( 'credit' => '+=' . $creditamount ), array( 'id' => (int)$_SESSION['uid'] ) );
		doUpgrade( $upgradeid );
	}

	( 'upgrade.php' );
}

function createUpgradeOrder($id, $ordernotes, $promocode, $paymentmethod) {
	global $CONFIG;
	global $remote_ip;
	global $orderdescription;
	global $orderamount;

	App::self(  );
	$whmcs = ;

	if (( $promocode && !$GLOBALS['qualifies'] )) {
		$promocode = '';

		if ($promocode) {
			select_query( 'tblpromotions', 'upgradeconfig', array( 'code' => $promocode ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data['upgradeconfig'];
			$upgradeconfig = ;
			unserialize( $upgradeconfig );
			$upgradeconfig = ;
			$upgradeconfig['discounttype'];
			$promo_type = ;
			$upgradeconfig['value'];
			$promo_value = ;
			update_query( 'tblpromotions', array( 'uses' => '+1' ), array( 'code' => $promocode ) );
			generateUniqueID(  );
			$order_number = ;
			insert_query( 'tblorders', array( 'ordernum' => $order_number, 'userid' => $_SESSION['uid'], 'date' => 'now()', status => 'Pending', 'promocode' => $promocode, 'promotype' => $promo_type, 'promovalue' => $promo_value, 'paymentmethod' => $paymentmethod, 'ipaddress' => $remote_ip, 'amount' => $orderamount, 'notes' => $ordernotes ) );
			$orderid = ;
			foreach ($_SESSION['upgradeids'] as ) {
				$upgradeid = ;
				update_query( 'tblupgrades', array( 'orderid' => $orderid ), array( 'id' => $upgradeid ) );
				break;
			}

			sendMessage( 'Order Confirmation', $_SESSION['uid'], array( 'order_id' => $orderid, 'order_number' => $order_number, 'order_details' => $orderdescription ) );
			logActivity(  . 'Upgrade Order Placed - Order ID: ' . $orderid );

			if (!function_exists( 'createInvoices' )) {
				include( ROOTDIR . '/includes/processinvoices.php' );
				$invoiceid = 5;
				createInvoices( $_SESSION['uid'], true );
				$invoiceid = ;

				if ($invoiceid) {
					select_query( 'tblinvoiceitems', 'invoiceid', 'type=\'Upgrade\' AND relid IN (' . db_build_in_array( $_SESSION['upgradeids'] ) . ')', 'invoiceid', 'DESC' );
					$result = ;
					mysql_fetch_array( $result );
					$data = ;
					$data['invoiceid'];
					$invoiceid = ;

					if ($CONFIG['OrderDaysGrace']) {
						mktime( 0, 0, 0, date( 'm' ), date( 'd' ) + $CONFIG['OrderDaysGrace'], date( 'Y' ) );
						$new_time = ;
						date( 'Y-m-d', $new_time );
						$duedate = ;
						update_query( 'tblinvoices', array( 'duedate' => $duedate ), array( 'id' => $invoiceid ) );

						if (!$CONFIG['NoInvoiceEmailOnOrder']) {
							if ($whmcs->isClientAreaRequest(  )) {
								$source = 'clientarea';
							}
						}
					}
				}
			}

			$invoiceArr = array( 'user' => (true ?  : 'system'), 'invoiceid' => $invoiceid );
			run_hook( 'InvoiceCreationPreEmail', $invoiceArr );
			sendMessage( 'Invoice Created', $invoiceid );
			update_query( 'tblorders', array( 'invoiceid' => $invoiceid ), array( 'id' => $orderid ) );
			select_query( 'tblclients', 'firstname, lastname, companyname, email, address1, address2, city, state, postcode, country, phonenumber, ip, host', array( 'id' => $_SESSION['uid'] ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data[12];
			$host = ;
			$data[11];
			$ip = ;
			$data[10];
			$phonenumber = ;
			$data[9];
			$country = ;
			$data[8];
			$postcode = ;
			$data[7];
			$state = ;
			$data[6];
			$city = ;
			$data[5];
			$address2 = ;
			$data[4];
			$address1 = ;
			$data[3];
			$email = ;
			$data[2];
			$companyname = ;
			$data[1];
			$lastname = ;
			$data[0];
			$firstname = ;
			get_query_val( 'tblpaymentgateways', 'value', array( 'gateway' => $paymentmethod, 'setting' => 'Name' ) );
			$nicegatewayname = ;
			get_query_val( 'tblinvoices', 'total', array( 'id' => $invoiceid ) );
			$ordertotal = ;
			$adminemailitems = '';

			if ($invoiceid) {
				select_query;
				'tblinvoiceitems';
				'description';
				'type=\'Upgrade\' AND relid IN (' . db_build_in_array( $_SESSION['upgradeids'] ) . ')';
				'invoiceid';
			}
		}
	}

	( 'DESC' );
	$result = ;
	mysql_fetch_assoc( $result );

	if ($invoicedata = ) {
		$adminemailitems .= $invoicedata['description'] . '<br />';
	}

	jmp;
	( array( 'order_notes' => '', 'client_ip' => $ip, 'client_hostname' => $host ), 'account' );

	if (chhgjaeced::getValue( 'AutoCancelSubscriptions' )) {
		if (!function_exists( 'cancelSubscriptionForService' )) {
			require( ROOTDIR . '/includes/gatewayfunctions.php' );
			get_query_val( 'tblupgrades', 'relid', array( 'orderid' => $id ) );
			$serviceID = ;
			cancelSubscriptionForService;
		}
	}

	( $serviceID, eaaadiagec::get( 'uid' ) );
	Exception {
		return array( 'id' => $id, 'orderid' => $orderid, 'order_number' => $order_number, 'invoiceid' => $invoiceid );
	}
}

function processUpgradePayment($upgradeid, $paidamount, $fees, $invoice = '', $gateway = '', $transid = '') {
	update_query( 'tblupgrades', array( 'paid' => 'Y' ), array( 'id' => $upgradeid ) );
	doUpgrade( $upgradeid );
}

function doUpgrade($upgradeid) {
	$optiontype = '';
	$configid = ;
	$billingcycle = ;
	$newbillingcycle = ;
	$newpackageid = ;
	$tempvalue = array(  );
	select_query( 'tblupgrades', '', array( 'id' => $upgradeid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['orderid'];
	$orderid = ;
	$data['type'];
	$type = ;
	$data['relid'];
	$relid = ;
	$data['originalvalue'];
	$originalvalue = ;
	$data['newvalue'];
	$newvalue = ;
	$data['amount'];
	$upgradeamount = ;
	$data['recurringchange'];
	$recurringchange = ;
	select_query( 'tblorders', 'promocode', array( 'id' => $orderid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['promocode'];
	$promocode = ;

	if ($type == 'package') {
		explode( ',', $newvalue );
		$newvalue = ;
		$newvalue[0];
		$newpackageid = ;
		$newvalue[1];
		$newbillingcycle = ;
		$changevalue = 'amount';

		if ($newbillingcycle == 'free') {
			$newbillingcycle = 'Free Account';
		}

		jmp;

		if ($recurringamount < $promovalue) {
			$recurringamount = (true ? '0' : $recurringamount - $promovalue);
			update_query( 'tblhosting', array( 'amount' => $recurringamount, 'promoid' => $promoid ), array( 'id' => $relid ) );
		}


		if (!( 'getModuleType' )) {
			require( dirname( __FILE__ ) . '/modulefunctions.php' );
			ServerChangePackage;
			$relid;
		}

		(  );
		$result = ;

		if ($result != 'success') {
			if ($result == 'Function Not Supported by Module') {
				$manualUpgradeRequired = true;
				jmp;
				logActivity(  . 'Automatic Product/Service Upgrade Failed - Service ID: ' . $relid, $userid );
			}
		}
	}

	( array( 'status' => 'Pending', 'duedate' => date( 'Y-m-d' ) ) );
	update_query( 'tblupgrades', array( 'status' => 'Completed' ), array( 'id' => $upgradeid ) );
}

function validateUpgradePromo($promocode) {
	global $_LANG;

	select_query( 'tblpromotions', '', array( 'code' => $promocode ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$id = ;
	$data['type'];
	$recurringtype = ;
	$data['value'];
	$recurringvalue = ;
	$data['recurring'];
	$recurring = ;
	$data['cycles'];
	$cycles = ;
	$data['appliesto'];
	$appliesto = ;
	$data['requires'];
	$requires = ;
	$data['maxuses'];
	$maxuses = ;
	$data['uses'];
	$uses = ;
	$data['startdate'];
	$startdate = ;
	$data['expirationdate'];
	$expiredate = ;
	$data['existingclient'];
	$existingclient = ;
	$data['onceperclient'];
	$onceperclient = ;
	$data['upgrades'];
	$upgrades = ;
	$data['upgradeconfig'];
	$upgradeconfig = ;
	unserialize( $upgradeconfig );
	$upgradeconfig = ;
	$upgradeconfig['discounttype'];
	$type = ;
	$upgradeconfig['value'];
	$value = ;
	$upgradeconfig['configoptions'];
	$configoptions = ;

	if (!$id) {
		return $_LANG['ordercodenotfound'];

		if (!$upgrades) {
			return $_LANG['promoappliedbutnodiscount'];

			if ($startdate != '0000-00-00') {
				str_replace( '-', '', $startdate );
				$startdate = ;

				if (date( 'Ymd' ) < $startdate) {
					$_LANG['orderpromoprestart'];
				}
			}
		}

		return ;

		if ($expiredate != '0000-00-00') {
			str_replace( '-', '', $expiredate );
			$expiredate = ;

			if ($expiredate < date( 'Ymd' )) {
				return $_LANG['orderpromoexpired'];
				0 < $maxuses;
			}
		}


		if ((  && $maxuses <= $uses )) {
			return $_LANG['orderpromomaxusesreached'];

			if ($onceperclient) {
				select_query( 'tblorders', 'count(*)', array( 'status' => 'Active', 'userid' => $_SESSION['uid'], 'promocode' => $promocode ) );
				$result = ;
				mysql_fetch_array( $result );
				$orderCount = ;

				if (0 < $orderCount[0]) {
				}
			}
		}

		return $_LANG['promoonceperclient'];

		if ($type == 'Percentage') {
			$value . '%';
		}

		$promodesc = formatCurrency( $value );
		$promodesc .= ' ' . $_LANG['orderdiscount'];

		if (!$recurring) {
			$recurringvalue = 3;
			$recurringtype = '';

			if (( $recurring && 0 < $recurringvalue )) {
				if ($recurringtype == 'Percentage') {
					$recurringpromodesc = (true ? $recurringpromodesc = (true ? $recurringvalue . '%' : formatCurrency( $recurringvalue )) : '');
					explode;
					',';
					$cycles;
				}
			}

			(  );
			$cycles = ;
			explode;
			',';
		}

		( $appliesto );
		$appliesto = ;
		explode( ',', $requires );
		$requires = ;
		array( 'id' => $id, 'cycles' => $cycles, 'appliesto' => $appliesto, 'requires' => $requires, 'type' => $upgradeconfig['type'], 'value' => $upgradeconfig['value'], 'discounttype' => $upgradeconfig['discounttype'], 'configoptions' => $upgradeconfig['configoptions'], 'desc' => $promodesc );
	}

	return array( 'recurringvalue' => $recurringvalue, 'recurringtype' => $recurringtype, 'recurringdesc' => $recurringpromodesc );
}

/**
 * Check to see if an upgrade of an order is already in progress.
 *
 * Prior to upgrading a product, we should check to see if an upgrade
 * is already in progress, in order to avoid the glitch listed in
 * FogBugz Case 4731.
 *
 * This function checks to see if there is an unpaid invoice belonging
 * to the order which belongs to any upgrades currently listed for
 * the "tblhosting" item being upgraded.
 *
 * @param $hostingId int ID of order to check upgrade status on
 * @return bool
 * @link https://fogbugz.whmcs.com/default.asp?4731
 */
function upgradeAlreadyInProgress($hostingId) {
	$hostingSQL = 'SELECT tblinvoices.status
                     FROM tblorders, tblupgrades, tblinvoices
                    WHERE tblupgrades.relid = \'%d\'
                      AND tblorders.id = tblupgrades.orderid
                      AND tblorders.invoiceid = tblinvoices.id
                      AND tblinvoices.status = \'Unpaid\'';
	full_query( sprintf( $hostingSQL, $hostingId ) );
	$result = $hostingId = (int)$hostingId;
	mysql_fetch_array( $result );
	$data = ;

	if ($data[0]) {
	}

	return true;
}

?>
