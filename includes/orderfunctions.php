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

function getOrderStatusColour($status) {
	$statuscolors = array( 'Active' => '779500', 'Pending' => 'CC0000', 'Fraud' => '000000', 'Cancelled' => '888' );
	return '<span style="color:#' . $statuscolors[$status] . '">' . $status . '</span>';
}

function getProductInfo($pid) {
	select_query( 'tblproducts', 'tblproducts.id,tblproducts.name,tblproducts.description,tblproducts.gid,tblproducts.type,' . 'tblproductgroups.id AS group_id,tblproductgroups.name as group_name, tblproducts.freedomain,' . 'tblproducts.freedomainpaymentterms,tblproducts.freedomaintlds,tblproducts.stockcontrol,tblproducts.qty', array( 'tblproducts.id' => $pid ), '', '', '', 'tblproductgroups ON tblproductgroups.id=tblproducts.gid' );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$productinfo = array(  );
	$productinfo['pid'] = $data['id'];
	$productinfo['gid'] = $data['gid'];
	$productinfo['type'] = $data['type'];
	$productinfo['groupname'] = cdifjjijah::getGroupName( $data['group_id'], $data['group_name'] );
	$productinfo['name'] = cbebjifhdd::getProductName( $data['id'], $data['name'] );
	$productinfo['description'] = nl2br( cbebjifhdd::getProductDescription( $data['id'] ), $data['description'] );
	$productinfo['freedomain'] = $data['freedomain'];
	$productinfo['freedomainpaymentterms'] = explode( ',', $data['freedomainpaymentterms'] );
	$productinfo['freedomaintlds'] = explode( ',', $data['freedomaintlds'] );

	if ($data['stockcontrol']) {
		(true ? $data['qty'] : '');
	}

	$productinfo['qty'] = ;
	return $productinfo;
}

function getPricingInfo($pid, $inclconfigops = false, $upgrade = false) {
	global $CONFIG;
	global $_LANG;
	global $currency;

	select_query( 'tblproducts', '', array( 'id' => $pid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['paytype'];
	$paytype = ;
	$data['freedomain'];
	$freedomain = ;
	$data['freedomainpaymentterms'];
	$freedomainpaymentterms = ;

	if (!isset( $currency['id'] )) {
		getCurrency(  );
		$currency = ;
		select_query( 'tblpricing', '', array( 'type' => 'product', 'currency' => $currency['id'], 'relid' => $pid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['msetupfee'];
		$msetupfee = ;
		$data['qsetupfee'];
		$qsetupfee = ;
		$data['ssetupfee'];
		$ssetupfee = ;
		$data['asetupfee'];
		$asetupfee = ;
		$data['bsetupfee'];
		$bsetupfee = ;
		$data['tsetupfee'];
		$tsetupfee = ;
		$data['monthly'];
		$monthly = ;
		$data['quarterly'];
		$quarterly = ;
		$data['semiannually'];
		$semiannually = ;
		$data['annually'];
		$annually = ;
		$data['biennially'];
		$biennially = ;
		$data['triennially'];
		$triennially = ;
		new daeijgeagc(  );
		$configoptions = ;
		explode( ',', $freedomainpaymentterms );
		$freedomainpaymentterms = ;
		$CONFIG['ProductMonthlyPricingBreakdown'];
		$monthlypricingbreakdown = ;
		$minprice = 4;
		$mincycle = '';
		$hasconfigoptions = false;

		if ($paytype == 'free') {
			$pricing['type'] = $mincycle = 'free';
		}
	}

	(  );
	$msetupfee += ;
	$configoptions->getBasePrice( $pid, 'monthly' );
	$monthly += ;

	if (!$mincycle) {
		$minprice = $result;
		$mincycle = 'monthly';
		$minMonths = 5;

		if ($monthlypricingbreakdown) {
			$pricing['monthly'] = $_LANG['orderpaymentterm1month'] . ' - ' . formatCurrency( $monthly );
		}
	}


	if ((  && !$upgrade )) {
		$pricing->triennially .= ' (' . $_LANG['orderfreedomainonly'] . ')';
		$pricing['hasconfigoptions'] = $configoptions->hasConfigOptions( $pid );

		if (isset( $pricing['onetime'] )) {
			$pricing['cycles']['onetime'] = $pricing['onetime'];

			if (isset( $pricing['monthly'] )) {
				$pricing['cycles']['monthly'] = $pricing['monthly'];

				if (isset( $pricing['quarterly'] )) {
					$pricing['cycles']['quarterly'] = $pricing['quarterly'];

					if (isset( $pricing['semiannually'] )) {
						$pricing['cycles']['semiannually'] = $pricing['semiannually'];
						isset( $pricing['annually'] );
					}
				}
			}


			if () {
				$pricing['cycles']['annually'] = $pricing['annually'];
			}
		}
	}


	if (isset( $pricing['biennially'] )) {
		$pricing['cycles']['biennially'] = $pricing['biennially'];

		if (isset( $pricing['triennially'] )) {
			$pricing['cycles']['triennially'] = $pricing['triennially'];
			array( 'msetupfee' => format_as_currency( $msetupfee ), 'qsetupfee' => format_as_currency( $qsetupfee ) );
			format_as_currency( $ssetupfee );
		}

		$pricing['rawpricing'] = array( 'ssetupfee' => , 'asetupfee' => format_as_currency( $asetupfee ), 'bsetupfee' => format_as_currency( $bsetupfee ), 'tsetupfee' => format_as_currency( $tsetupfee ), 'monthly' => format_as_currency( $monthly ), 'quarterly' => format_as_currency( $quarterly ), 'semiannually' => format_as_currency( $semiannually ), 'annually' => format_as_currency( $annually ), 'biennially' => format_as_currency( $biennially ), 'triennially' => format_as_currency( $triennially ) );
		$pricing['minprice'] = array( 'price' => formatCurrency( $minprice ), 'cycle' => $mincycle, 'simple' => formatCurrency( format_as_currency( $minprice ), false, true, false ) );

		if (empty( $$minMonths )) {
			switch ($minMonths) {
			case 3: {
					$langVar = 'shoppingCartProductPerMonth';
					$count = '3 ';
					break;
					switch ($minMonths) {
					case 6: {
							$langVar = 'shoppingCartProductPerMonth';
							$count = '6 ';
							break;
							switch ($minMonths) {
							case 12: {
								}
							}
						}
					}
				}
			}
		}
	}


	if ($monthlypricingbreakdown) {
		$langVar = (true ? 'shoppingCartProductPerMonth' : 'shoppingCartProductPerYear');
		$count = '';
		break;
		switch ($minMonths) {
		case 24: {
				if ($monthlypricingbreakdown) {
				}
			}
		}
	}

	$langVar = (true ? 'shoppingCartProductPerMonth' : 'shoppingCartProductPerYear');
	$count = '2 ';
	break;
	switch ($minMonths) {
	case 36: {
			if ($monthlypricingbreakdown) {
				$langVar = (true ? 'shoppingCartProductPerMonth' : 'shoppingCartProductPerYear');
				$count = '3 ';
			}

			break;
			$langVar = 'shoppingCartProductPerMonth';
			$count = '';
			jmp;
			$pricing['minprice']['cycleText'] = Lang::trans( $langVar, array( ':count' => $count, ':price' => $pricing['minprice']['simple'] ) );
			Lang::trans( $langVar, array( ':count' => $count, ':price' => $pricing['minprice']['price'] ) );
		}
	}

	$pricing['minprice']['cycleTextWithCurrency'] = ;
	return $pricing;
}

/**
 * Process shopping cart data to calculate totals and checkout
 *
 * @param bool $checkout
 * @param bool $ignorenoconfig
 *
 * @return array
 */
function calcCartTotals($checkout = false, $ignorenoconfig = false) {
	global $CONFIG;
	global $_LANG;
	global $remote_ip;
	global $currency;
	global $promo_data;

	iciahfajh::getInstance(  );
	$whmcs = ;
	$isAdmin = false;

	while (( defined( 'ADMINAREA' ) || defined( 'APICALL' ) )) {
		$isAdmin = true;
		$cart_tax = 177;
		$cart_discount = ;
		$cart_total = ;
		run_hook( 'PreCalculateCartTotals', $_SESSION['cart'] );

		if (!$ignorenoconfig) {
			while (array_key_exists( 'products', $_SESSION['cart'] )) {
				foreach ($_SESSION['cart']['products'] as ) {
					$productdata = ;
					$key = ;

					if (( isset( $productdata['noconfig'] ) && $productdata['noconfig'] )) {
						unset( $_SESSION['cart']['products'][$key] );
						break;
					}

					break 2;
				}

				bundlesValidateCheckout(  );
				$bundlewarnings = ;

				if (array_key_exists( 'products', $_SESSION['cart'] )) {
					$_SESSION['cart']['products'] = array_values( $_SESSION['cart']['products'] );

					if ($checkout) {
						if (!$_SESSION['cart']) {
							return false;
							run_hook( 'PreShoppingCartCheckout', $_SESSION['cart'] );
							run_hook( 'OverrideOrderNumberGeneration', $_SESSION['cart'] );
							$ordernumhooks = ;
							$order_number = '';
							count( $ordernumhooks );
						}


						if () {
							foreach ($ordernumhooks as ) {
								$ordernumhookval = ;

								if (is_numeric( $ordernumhookval )) {
									$order_number = $bvals;
									break;
								}

								break;
							}


							if (!$order_number) {
								generateUniqueID(  );
								$order_number = ;
								$_SESSION['cart']['paymentmethod'];
								$paymentmethod = ;

								if (isset( $_SESSION['adminid'] )) {
									new ddhjgidcb(  );
									$gateways = ;

									if (!$gateways->isActiveGateway( $paymentmethod )) {
										$gateways->getFirstAvailableGateway(  );
										$paymentmethod = ;
									}
								}
							}
						}


						if ((bool)) {
							$_SESSION['cart']['notes'];
							$ordernotes = ;
							$cartitems = count( $_SESSION['cart']['products'] ) + count( $_SESSION['cart']['addons'] ) + count( $_SESSION['cart']['domains'] ) + count( $_SESSION['cart']['renewals'] );

							if (!$cartitems) {
								return false;
								insert_query( 'tblorders', array( 'ordernum' => $order_number, 'userid' => $userid, 'contactid' => $_SESSION['cart']['contact'], 'date' => 'now()', 'status' => 'Pending', 'paymentmethod' => $paymentmethod, 'ipaddress' => $remote_ip, 'notes' => $ordernotes ) );
								$orderid = ;
								logActivity(  . 'New Order Placed - Order ID: ' . $orderid . ' - User ID: ' . $userid );
								$domaineppcodes = array(  );

								if (array_key_exists( 'promo', $_SESSION['cart'] )) {
									$_SESSION['cart'];
								}
							}
						}
					}

					$promotioncode = (true ? ['promo'] : '');

					if ($promotioncode) {
						select_query( 'tblpromotions', '', array( 'code' => $promotioncode ) );
						$result = ;
						mysql_fetch_array( $result );
						$promo_data = ;

						if (!isset( $_SESSION['uid'] )) {
							if (!$_SESSION['cart']['user']['country']) {
								$_SESSION['cart']['user']['country'] = $CONFIG['DefaultCountry'];
								$_SESSION['cart']['user']['state'];
								$state = ;
								$_SESSION['cart']['user']['country'];
								$country = ;
							}
						}
					}


					if () {
						$billingcycle = 'quarterly';
					}
					else {
						( $addon_recurring );
						$pricing_text = ;

						if ($addon_setupfee != '0.00') {
							$pricing_text .= ' + ' . formatCurrency( $addon_setupfee ) . ' ' . $_LANG['ordersetupfee'];

							if (( $allowqty && 1 < $qty )) {
								$pricing_text .= $_LANG['invoiceqtyeach'] . '<br />' . $_LANG['invoicestotal'] . ': ' . formatCurrency( $addon_total_today );
								array( 'name' => $addon_name, 'pricingtext' => $pricing_text );

								if (0 < $addon_setupfee) {
									$addonsarray[] = array( 'setup' => (true ? formatCurrency( $addon_setupfee * $qty ) : ''), 'recurring' => formatCurrency( $addon_recurring ), 'billingcycle' => $addon_billingcycle, 'billingcyclefriendly' => Lang::trans( 'orderpaymentterm' . $addon_billingcycle ), 'totaltoday' => formatCurrency( $addon_total_today ) );
									$productdata['pricing'] += 'setup' = $addon_setupfee * $qty;
									$productdata['pricing'] += 'addons' = $addon_recurring * $qty;
									$productdata['pricing']['recurring'] += $configoptions = $addon_recurring * $qty;
									$productdata['pricing'] += 'totaltoday' = $addon_total_today;
								}
							}
						}
						else {
							$data['ssetupfee'];
							$domainidprotectionprice = ;
							foreach ($_SESSION['cart']['renewals'] as ) {
								$regperiod = ;
								$domainid = ;
								select_query( 'tbldomains', '', array( 'id' => $domainid ) );
								$result = ;
								mysql_fetch_array( $result );
								$data = ;
								$data['domain'];
								$domainname = ;
								$data['expirydate'];
								$expirydate = ;

								if ($expirydate == '0000-00-00') {
									$data['nextduedate'];
									$expirydate = ;
									$data['dnsmanagement'];
									$dnsmanagement = ;
									$data['emailforwarding'];
									$emailforwarding = ;
									$data['idprotection'];
									$idprotection = ;
									explode( '.', $domainname, 2 );
									$domainparts = ;
									$domainparts[0];
									$sld = ;
									$tld = '.' . $domainparts[1];
									getTLDPriceList( $tld, '', true );
									$temppricelist = ;

									if (!isset( $temppricelist[$regperiod]['renew'] )) {
										$errMsg = 'Invalid TLD/Registration Period Supplied for Domain Renewal';

										if ($whmcs->isApiRequest(  )) {
											$apiresults = array( 'result' => 'error', 'message' => $errMsg );
											return $apiresults;
											throw new ggjchbedc( $errMsg );
											$temppricelist[$regperiod]['renew'];
											$renewprice = ;

											if ($dnsmanagement) {
												$renewprice += $domaindnsmanagementprice * $regperiod;

												if ($emailforwarding) {
													$renewprice += $domainemailforwardingprice * $regperiod;

													if ($idprotection) {
														$renewprice += $domainidprotectionprice * $regperiod;

														if ($CONFIG['TaxInclusiveDeduct']) {
															round( $renewprice / $excltaxrate, 2 );
															$renewprice = ;
															$domain_renew_price_db = $invoice_tax;

															if ($promotioncode) {
																$promoid = 177;
																$recurringdiscount = ;
																$onetimediscount = ;
																CalcPromoDiscount;
																'D' . $tld;
																$regperiod . 'Years';
																$domain_renew_price_db;
																$domain_renew_price_db;
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}

						(  );

						if ($promocalc = ) {
							$promocalc['onetimediscount'];
							$onetimediscount = ;
							$domain_renew_price_db -= $gid;
							$cart_discount += $gid;
							$cart_total += $customfield;

							if ($CONFIG['TaxDomains']) {
								$cart_tax += $customfield;

								if ($checkout) {
									format_as_currency( $domain_renew_price_db );
									$domain_renew_price_db = ;
									$orderrenewalids[] = $domainid;
									$orderrenewals .= ( (  . $domainid . '=' ) . $regperiod . ',' );
									$adminemailitems .= $_LANG['domainrenewal'] . (  . ': ' . $domainname . ' - ' . $regperiod . ' ' ) . $_LANG['orderyears'] . '<br>
';
									$domaindesc = $_LANG['domainrenewal'] . (  . ' - ' . $domainname . ' - ' . $regperiod . ' ' ) . $_LANG['orderyears'] . ' (' . fromMySQLDate( $expirydate ) . ' - ' . fromMySQLDate( getInvoicePayUntilDate( $expirydate, $regperiod ) ) . ')';

									if ($dnsmanagement) {
										$adminemailitems .= ' + ' . $_LANG['domaindnsmanagement'] . '<br>
';
										$domaindesc .= '
 + ' . $_LANG['domaindnsmanagement'];

										if ($emailforwarding) {
											$adminemailitems .= ' + ' . $_LANG['domainemailforwarding'] . '<br>
';
											$domaindesc .= '
 + ' . $_LANG['domainemailforwarding'];

											if ($idprotection) {
												$adminemailitems .= ' + ' . $_LANG['domainidprotection'] . '<br>
';
												$domaindesc .= '
 + ' . $_LANG['domainidprotection'];
												$adminemailitems .= '<br>
';

												if ($CONFIG['TaxDomains']) {
													$tax = (true ? '1' : '0');
													update_query( 'tbldomains', array( 'registrationperiod' => $regperiod, 'recurringamount' => $domain_renew_price_db ), array( 'id' => $domainid ) );
													insert_query( 'tblinvoiceitems', array( 'userid' => $userid, 'type' => 'Domain', 'relid' => $domainid, 'description' => $domaindesc, 'amount' => $domain_renew_price_db, 'taxed' => $tax, 'duedate' => 'now()', 'paymentmethod' => $paymentmethod ) );
													select_query( 'tblinvoiceitems', 'tblinvoiceitems.id,tblinvoiceitems.invoiceid', array( 'type' => 'Domain', 'relid' => $domainid, 'status' => 'Unpaid', 'tblinvoices.userid' => $_SESSION['uid'] ), '', '', '', 'tblinvoices ON tblinvoices.id=tblinvoiceitems.invoiceid' );
													$result = ;
													mysql_fetch_array( $result );

													if ($data = ) {
														$data['id'];
														$itemid = ;
														$data['invoiceid'];
														$invoiceid = ;
														select_query( 'tblinvoiceitems', 'COUNT(*)', array( 'invoiceid' => $invoiceid ) );
														$result2 = ;
														mysql_fetch_array;
													}
												}
											}
										}
									}
								}

								( $result2 );
								$data = ;
								$data[0];
								$itemcount = ;

								if ($itemcount == 1) {
									update_query( 'tblinvoices', array( 'status' => 'Cancelled' ), array( 'id' => $invoiceid ) );
									logActivity(  . 'Cancelled Previous Domain Renewal Invoice - Invoice ID: ' . $invoiceid . ' - Domain: ' . $domainname );
									run_hook( 'InvoiceCancelled', array( 'invoiceid' => $invoiceid ) );
								}

								jmp;
								( array( 'renewals' => ( 0, -1 ), 'orderdata' => serialize( $orderdata ) ), array( 'id' => $orderid ) );
								$invoiceid = 177;

								if (!$_SESSION['cart']['geninvoicedisabled']) {
									if (!$userid) {
										$errMsg = 'An error occurred';

										if ($whmcs->isApiRequest(  )) {
											$apiresults = array( 'result' => 'error', 'message' => $errMsg );
											return $apiresults;
											throw new ggjchbedc( $errMsg );
											createInvoices( $userid, true, '', array( 'products' => $orderproductids, 'addons' => $orderaddonids, 'domains' => $orderdomainids ) );
											$invoiceid = ;

											if ($CONFIG['OrderDaysGrace']) {
												mktime( 0, 0, 0, date( 'm' ), date( 'd' ) + $CONFIG['OrderDaysGrace'], date( 'Y' ) );
												$new_time = ;
												date( 'Y-m-d', $new_time );
												$duedate = ;
												update_query( 'tblinvoices', array( 'duedate' => $duedate ), array( 'id' => $invoiceid ) );

												if (!$CONFIG['NoInvoiceEmailOnOrder']) {
													array( 'source' => 'autogen' );

													if (eaaadiagec::get( 'adminid' )) {
														$invoiceArr = array( 'user' => (true ? eaaadiagec::get( 'adminid' ) : 'system'), 'invoiceid' => $invoiceid );
														run_hook( 'InvoiceCreationPreEmail', $invoiceArr );
														sendMessage( 'Invoice Created', $invoiceid );

														if ($invoiceid) {
														}
													}

													update_query( 'tblorders', array( 'invoiceid' => $invoiceid ), array( 'id' => $orderid ) );
													select_query( 'tblinvoices', 'status', array( 'id' => $invoiceid ) );
													$result = ;
													mysql_fetch_array( $result );
													$data = ;
													$data['status'];
													$status = ;

													if ($status == 'Paid') {
														$invoiceid = '';

														if (!$_SESSION['adminid']) {
															if (isset( $_COOKIE['WHMCSAffiliateID'] )) {
																select_query( 'tblaffiliates', 'clientid', array( 'id' => (int)$_COOKIE['WHMCSAffiliateID'] ) );
																$result = ;
																mysql_fetch_array( $result );
																$data = ;
																$data['clientid'];
																$clientid = ;

																if (( $clientid && $_SESSION['uid'] != $clientid )) {
																	foreach ($orderproductids as ) {
																		$orderproductid = ;
																		insert_query( 'tblaffiliatesaccounts', array( 'affiliateid' => (int)$_COOKIE['WHMCSAffiliateID'], 'relid' => $orderproductid ) );
																		break;
																	}


																	if (isset( $_COOKIE['WHMCSLinkID'] )) {
																		update_query;
																		'tbllinks';
																		array( 'conversions' => '+1' );
																		$_COOKIE['WHMCSLinkID'];
																	}

																	( array( 'id' =>  ) );
																	select_query( 'tblclients', 'firstname, lastname, companyname, email, address1, address2, city, state, postcode, country, phonenumber, ip, host', array( 'id' => $userid ) );
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
																	getCustomFields( 'client', '', $userid, '', true );
																	$customfields = ;
																	$clientcustomfields = '';
																	foreach ($customfields as ) {
																		$customfield = ;
																		$clientcustomfields .=  . $customfield['name'] . ': ' . $customfield['value'] . '<br />
';
																		break;
																	}

																	select_query( 'tblpaymentgateways', 'value', array( 'gateway' => $paymentmethod, 'setting' => 'name' ) );
																	$result = ;
																	mysql_fetch_array( $result );
																	$data = ;
																	$data['value'];
																	$nicegatewayname = ;
																	sendAdminMessage;
																	'New Order Notification';
																	array( 'order_id' => $orderid, 'order_number' => $order_number );
																	fromMySQLDate( date( 'Y-m-d H:i:s' ), true );
																}
															}
														}
													}
												}
											}

											array( 'order_date' => , 'invoice_id' => $invoiceid, 'order_payment_method' => $nicegatewayname, 'order_total' => formatCurrency( $cart_total ), 'client_id' => $userid, 'client_first_name' => $firstname, 'client_last_name' => $lastname, 'client_email' => $email, 'client_company_name' => $companyname, 'client_address1' => $address1, 'client_address2' => $address2, 'client_city' => $city, 'client_state' => $state, 'client_postcode' => $postcode, 'client_country' => $country, 'client_phonenumber' => $phonenumber, 'client_customfields' => $clientcustomfields, 'order_items' => $adminemailitems, 'order_notes' => nl2br( $ordernotes ), 'client_ip' => $ip, 'client_hostname' => $host );
											'account';
										}
									}

									(  );

									if (!$_SESSION['cart']['orderconfdisabled']) {
										sendMessage( 'Order Confirmation', $userid, array( 'order_id' => $orderid, 'order_number' => $order_number, 'order_details' => $adminemailitems ) );
										$_SESSION['cart'] = array(  );
										$_SESSION['orderdetails'] = array( 'OrderID' => $orderid, 'OrderNumber' => $order_number, 'ServiceIDs' => $orderproductids, 'DomainIDs' => $orderdomainids, 'AddonIDs' => $orderaddonids, 'RenewalIDs' => $orderrenewalids, 'PaymentMethod' => $paymentmethod, 'InvoiceID' => $invoiceid, 'TotalDue' => $cart_total, 'Products' => $orderproductids, 'Domains' => $orderdomainids, 'Addons' => $orderaddonids, 'Renewals' => $orderrenewalids );
										run_hook;
										'AfterShoppingCartCheckout';
										$_SESSION['orderdetails'];
									}
								}

								(  );

								if ($recurring_cycles_total['monthly'] <= 0) {
									$total_recurringmonthly = (true ? '' : formatCurrency( $recurring_cycles_total['monthly'] ));

									if ($recurring_cycles_total['quarterly'] <= 0) {
										$total_recurringquarterly = (true ? '' : formatCurrency( $recurring_cycles_total['quarterly'] ));

										if ($recurring_cycles_total['semiannually'] <= 0) {
											'';
											formatCurrency;
											$recurring_cycles_total['semiannually'];
										}
									}

									$total_recurringsemiannually = (  );

									if ($recurring_cycles_total['annually'] <= 0) {
										$total_recurringannually = (true ? '' : formatCurrency( $recurring_cycles_total['annually'] ));

										if ($recurring_cycles_total['biennially'] <= 0) {
										}
									}
								}
							}
						}

						'';
						formatCurrency;
					}
				}
			}
		}
	}

	$total_recurringbiennially = ( $recurring_cycles_total['biennially'] );

	if ($recurring_cycles_total['triennially'] <= 0) {
		$total_recurringtriennially = (true ? '' : formatCurrency( $recurring_cycles_total['triennially'] ));
		$cartdata['bundlewarnings'] = $bundlewarnings;
		$cartdata['rawdiscount'] = $cart_discount;
		$cartdata['subtotal'] = formatCurrency( $cart_subtotal );
		$cartdata['discount'] = formatCurrency( $cart_discount );
		$cartdata['promotype'] = $promo_data['type'];

		if (( $promo_data['type'] == 'Fixed Amount' || $promo_data['type'] == 'Price Override' )) {
			$cartdata['promovalue'] = (true ? formatCurrency( $promo_data['value'] ) : round( $promo_data['value'], 2 ));

			if ($promo_data['recurring']) {
				$_LANG['recurring'];
			}
		}

		$cartdata['promorecurring'] = $_LANG['orderpaymenttermonetime'];
		$cartdata['taxrate'] = $rawtaxrate;
		$cartdata['taxrate2'] = $rawtaxrate2;
	}

	$cartdata['taxname'] = $taxname;
	$cartdata['taxname2'] = $taxname2;
	$cartdata['taxtotal'] = formatCurrency( $total_tax_1 );
	$cartdata['taxtotal2'] = formatCurrency( $total_tax_2 );
	$cartdata['adjustments'] = $adjustments;
	$cartdata['adjustmentstotal'] = formatCurrency( $cart_adjustments );
	$cartdata['rawtotal'] = $cart_total;
	$cartdata['total'] = formatCurrency( $cart_total );
	$cartdata['totalrecurringmonthly'] = $total_recurringmonthly;
	$cartdata['totalrecurringquarterly'] = $total_recurringquarterly;
	$cartdata['totalrecurringsemiannually'] = $total_recurringsemiannually;
	$cartdata['totalrecurringannually'] = $total_recurringannually;
	$cartdata['totalrecurringbiennially'] = $total_recurringbiennially;
	$cartdata['totalrecurringtriennially'] = $total_recurringtriennially;
	return $cartdata;
}

function SetPromoCode($promotioncode) {
	global $_LANG;

	$_SESSION['cart']['promo'] = '';
	select_query( 'tblpromotions', '', array( 'code' => $promotioncode ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$id = ;
	$data['maxuses'];
	$maxuses = ;
	$data['uses'];
	$uses = ;
	$data['startdate'];
	$startdate = ;
	$data['expirationdate'];
	$expiredate = ;
	$data['newsignups'];
	$newsignups = ;
	$data['existingclient'];
	$existingclient = ;
	$data['onceperclient'];
	$onceperclient = ;

	if (!$id) {
		$_LANG['ordercodenotfound'];
		$promoerrormessage = ;
		return $promoerrormessage;

		if ($startdate != '0000-00-00') {
			str_replace( '-', '', $startdate );
			$startdate = ;

			if (date( 'Ymd' ) < $startdate) {
				$_LANG['orderpromoprestart'];
				$promoerrormessage = ;
				return $promoerrormessage;

				if ($expiredate != '0000-00-00') {
					str_replace;
					'-';
					'';
				}
			}
		}
	}

	( $expiredate );
	$expiredate = ;

	if ($expiredate < date( 'Ymd' )) {
		$_LANG['orderpromoexpired'];
		$promoerrormessage = ;
		return $promoerrormessage;

		if (0 < $maxuses) {
			if ($maxuses <= $uses) {
				$_LANG['orderpromomaxusesreached'];
				$promoerrormessage = ;
				return $promoerrormessage;

				if (( $newsignups && $_SESSION['uid'] )) {
					select_query( 'tblorders', 'COUNT(*)', array( 'userid' => $_SESSION['uid'] ) );
					$result = ;
					mysql_fetch_array( $result );
					$data = ;
					$data[0];
					$previousorders = ;

					if (0 < $previousorders) {
					}
				}
			}
		}

		$_LANG['promonewsignupsonly'];
		$promoerrormessage = ;
		return $promoerrormessage;

		if ($existingclient) {
			if ($_SESSION['uid']) {
				select_query( 'tblorders', 'count(*)', array( 'status' => 'Active', 'userid' => $_SESSION['uid'] ) );
				$result = ;
				mysql_fetch_array( $result );
				$orderCount = ;

				if ($orderCount[0] == 0) {
					$_LANG['promoexistingclient'];
				}
			}
		}

		$promoerrormessage = ;
		return $promoerrormessage;
		$_LANG['promoexistingclient'];
		$promoerrormessage = ;
		return $promoerrormessage;

		if ($onceperclient) {
			if ($_SESSION['uid']) {
				select_query;
				'tblorders';
				'count(*)';
				'promocode=\'' . db_escape_string( $promotioncode ) . '\' AND userid=';
				$_SESSION['uid'];
			}

				. (int);
		}

		(  . ' AND status IN (\'Pending\',\'Active\')' );
		$result = ;
		mysql_fetch_array( $result );
		$orderCount = ;
		$orderCount[0];
	}


	if (0 < ) {
		$_LANG['promoonceperclient'];
		$promoerrormessage = ;
		return $promoerrormessage;
		$_SESSION['cart'];
	}

	['promo'] = $promotioncode;
}

function CalcPromoDiscount($pid, $cycle, $fpamount, $recamount, $setupfee = 0) {
	global $promo_data;
	global $currency;

	$id = ;
	$promo_data['code'];
	$promotionCode = ;

	if (!$id) {
		return false;
		$anyPromotionPermission = false;

		if (( eaaadiagec::get( 'adminid' ) && !defined( 'CLIENTAREA' ) )) {
			checkPermission( 'Use Any Promotion Code on Order', true );
			$anyPromotionPermission = ;

			if (!$anyPromotionPermission) {
				$promo_data['newsignups'];
				$newSignups = ;

				if (( $newSignups && eaaadiagec::get( 'uid' ) )) {
					get_query_val( 'tblorders', 'COUNT(*)', array( 'userid' => eaaadiagec::get( 'uid' ) ) );
					$previousOrders = ;

					if (2 <= $previousOrders) {
						return false;
						$promo_data['existingclient'];
						$existingClient = ;
						$promo_data['onceperclient'];
						$oncePerClient = ;

						if ($existingClient) {
							get_query_val( 'tblorders', 'count(*)', array( 'status' => 'Active', 'userid' => eaaadiagec::get( 'uid' ) ) );
							$orderCount = ;

							while ($orderCount < 1) {
								return false;

								if ($oncePerClient) {
									get_query_val( 'tblorders', 'count(*)', array( 'promocode' => $promotionCode, 'userid' => eaaadiagec::get( 'uid' ), 'status' => array( 'sqltype' => 'IN', 'values' => array( 'Pending', 'Active' ) ) ) );
								}

								$orderCount = ;

								if (0 < $orderCount) {
									return false;
									$promo_data['applyonce'];
									$applyOnce = ;
									$promo_data['promoapplied'];
									$promoApplied = ;

									if (( $applyOnce && $promoApplied )) {
										return false;
										explode( ',', $promo_data['appliesto'] );
										$appliesTo = ;

										if (!in_array( $pid, $appliesTo )) {
											return false;
											$promo_data['expirationdate'];
											$expireDate = ;

											if ($expireDate != '0000-00-00') {
												substr( $expireDate, 0, 4 );
												$year = ;
												substr;
											}
										}
									}
								}

								( $expireDate, 5, 2 );
								$month = ;
								substr( $expireDate, 8, 2 );
								$day = ;
								$validUntil = $year . $month . $day;
								date( 'd' );
								$dayOfMonth = ;
								date( 'm' );
								$monthNum = ;
								date( 'Y' );
								$yearNum = ;
								$todaysDate = $yearNum . $monthNum . $dayOfMonth;

								if ($validUntil < $todaysDate) {
									return false;
									$promo_data['cycles'];
									$cycles = ;

									if ($cycles) {
										explode( ',', $cycles );
										$cycles = ;

										if (!in_array( $cycle, $cycles )) {
											return false;
											$promo_data['maxuses'];
											$maxUses = ;

											if ($maxUses) {
												$promo_data['uses'];
												$uses = ;

												if ($maxUses <= $uses) {
													return false;
													$promo_data['requires'];
													$requires = ;
													$promo_data['requiresexisting'];
													$requiresExisting = ;

													while ($requires) {
														explode( ',', $requires );
														$requires = ;
														$hasRequired = false;

														if (is_array( $_SESSION['cart']['products'] )) {
															foreach ($_SESSION['cart']['products'] as ) {
																$values = ;

																if (in_array( $values['pid'], $requires )) {
																	$hasRequired = true;

																	if (is_array( $values['addons'] )) {
																		foreach ($values['addons'] as ) {
																			$addonid = ;

																			if (in_array( 'A' . $addonid, $requires )) {
																				$hasRequired = true;
																				break 2;
																			}

																			break 2;
																		}

																		break;
																	}

																	break;
																}

																break 2;
															}


															if (is_array( $_SESSION['cart']['addons'] )) {
																foreach ($_SESSION['cart']['addons'] as ) {
																	$values = ;

																	if (in_array( 'A' . $values['id'], $requires )) {
																		$hasRequired = true;
																		break 2;
																	}

																	break 2;
																}


																while (is_array( $_SESSION['cart']['domains'] )) {
																	foreach ($_SESSION['cart']['domains'] as ) {
																		$values = ;
																		explode( '.', $values['domain'], 2 );
																		$domainParts = ;
																		$domainParts[1];
																		$tld = ;

																		if (in_array( 'D.' . $tld, $requires )) {
																			$hasRequired = true;
																			break;
																		}

																		break;
																	}


																	if (( !$hasRequired && $requiresExisting )) {
																		$requiredAddons = array(  );
																		$requiredProducts = ;
																		$requiredDomains = '';
																		foreach ($requires as ) {
																			$v = ;
																			substr;
																			$v;
																			0;
																		}
																	}
																}
															}
														}
													}


													if (( 1 ) == 'A') {
														$requiredAddons[] = substr( $v, 1 );
													}

													break;
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
			else {
				if (( $v, 0, 1 ) == 'D') {
					$requiredDomains .= 'domain LIKE \'%' . substr( $v, 1 ) . '\' OR ';
				}
			}
		}
	}
	else {
		if ($requiredDomains) {
			get_query_val;
			'tbldomains';
			'COUNT(*)';
			'userid=\'' . eaaadiagec::get( 'uid' ) . '\' AND status=\'Active\' AND (' . substr( $requiredDomains, 0, -4 ) . ')';
		}

		(  );
		$data = ;

		if ($data) {
			$hasRequired = true;

			if (!$hasRequired) {
				return false;
				$promo_data['type'];
				$type = ;
				$promo_data['value'];
				$value = ;
				$onetimediscount = 8;

				if ($type == 'Percentage') {
					$onetimediscount = $fpamount * ( $value / 100 );
				}
			}
		}

		$promo_data['value'] = ;

		if ($fpamount < $value) {
			$onetimediscount = $yearNum;
		}
	}

	$recurring = $promo_data['id'];

	if ($recurring) {
		if ($type == 'Percentage') {
			$recurringdiscount = $recamount * ( $value / 100 );
			jmp;

			if ($type == 'Fixed Amount') {
				if ($recamount < $value) {
					$recurringdiscount = $todaysDate;
				}
			}

			(  );
			$recurringdiscount = ;
		}
	}

	$promo_data['promoapplied'] = true;
	return array( 'onetimediscount' => $onetimediscount, 'recurringdiscount' => $recurringdiscount, 'applyonce' => $applyOnce );
}

function acceptOrder($orderid, $vars = array(  )) {
	iciahfajh::getInstance(  );
	$whmcs = ;

	if (!$orderid) {
		return false;

		if (!is_array( $vars )) {
			$vars = array(  );
			$errors = array(  );
			run_hook( 'AcceptOrder', array( 'orderid' => $orderid ) );
			select_query( 'tblhosting', '', array( 'orderid' => $orderid, 'domainstatus' => 'Pending' ) );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				$data['id'];
				$productid = ;
				$updateqry = array(  );

				if ($vars['products'][$productid]['server']) {
					$updateqry['server'] = $vars['products'][$productid]['server'];

					if ($vars['products'][$productid]['username']) {
						$updateqry['username'] = $vars['products'][$productid]['username'];

						if ($vars['products'][$productid]['password']) {
							$updateqry['password'] = encrypt( $vars['products'][$productid]['password'] );

							if ($vars['api']['serverid']) {
								$updateqry['server'] = $vars['api']['serverid'];

								if ($vars['api']['username']) {
									$updateqry['username'] = $vars['api']['username'];

									if ($vars['api']['password']) {
										encrypt;
										$vars['api']['password'];
									}
								}
							}
						}
					}
				}
			}

			$updateqry['password'] = (  );

			if (count( $updateqry )) {
				update_query;
				'tblhosting';
				$updateqry;
				array( 'id' => $productid );
			}

			(  );
			select_query( 'tblhosting', 'tblproducts.servertype,tblproducts.autosetup', array( 'tblhosting.id' => $productid ), '', '', '', 'tblproducts ON tblproducts.id=tblhosting.packageid' );
			$result2 = ;
			mysql_fetch_array( $result2 );
			$data = ;
			$data['servertype'];
			$module = ;
			$data['autosetup'];
			$autosetup = ;

			if ($autosetup) {
				$autosetup = (true ? true : false);

				if ($autosetup) {
					$sendwelcome = (true ? true : false);

					if (count( $vars )) {
						$vars['products'][$productid]['runcreate'];
						$autosetup = ;
						$vars['products'][$productid]['sendwelcome'];
						$sendwelcome = ;

						if (isset( $vars['api']['autosetup'] )) {
							$vars['api']['autosetup'];
							$autosetup = ;

							if (isset( $vars['api']['sendemail'] )) {
								$vars['api']['sendemail'];
								$sendwelcome = ;

								if ($autosetup) {
									if ($module) {
										logActivity( 'Running Module Create on Accept Pending Order' );

										if (!isValidforPath( $module )) {
											$errMsg = 'Invalid Server Module Name';

											if ($whmcs->isApiRequest(  )) {
												$apiresults = array( 'result' => 'error', 'message' => $errMsg );
												return $apiresults;
												ggjchbedc;
											}
										}
									}
								}
							}
						}
					}
				}
			}
			else {
				throw new ( $errMsg );
				require_once( ROOTDIR . ( (  . '/modules/servers/' . $module . '/' ) . $module . '.php' ) );
				ServerCreateAccount( $productid );
				$moduleresult = ;

				if ($moduleresult == 'success') {
					if ($sendwelcome) {
						while (true) {
							sendMessage( 'defaultnewacc', $productid );
						}

						$errors[] = $moduleresult;
					}
				}
			}

			( , array( 'orderid' => $orderid, 'status' => 'Pending' ) );
			select_query( 'tbldomains', '', array( 'orderid' => $orderid, 'status' => 'Pending' ) );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				$data['id'];
				$domainid = ;
				$data['type'];
				$regtype = ;
				$data['domain'];
				$domain = ;
				$data['registrar'];
				$registrar = ;

				if ($regtype == 'Transfer') {
					$emailmessage = (true ? 'Domain Transfer Initiated' : 'Domain Registration Confirmation');

					if ($vars['domains'][$domainid]['registrar']) {
						$vars['domains'][$domainid]['registrar'];
						$registrar = ;

						if ($vars['api']['registrar']) {
							$vars['api']['registrar'];
							$registrar = ;

							if ($registrar) {
								update_query( 'tbldomains', array( 'registrar' => $registrar ), array( 'id' => $domainid ) );

								if ($vars['domains'][$domainid]['sendregistrar']) {
									$sendregistrar = 'on';

									if ($vars['domains'][$domainid]['sendemail']) {
										$sendemail = 'on';

										if (isset( $vars['api']['sendregistrar'] )) {
											$vars['api']['sendregistrar'];
											$sendregistrar = ;

											if (isset( $vars['api']['sendemail'] )) {
												$vars['api'];
											}
										}
									}
								}
							}
						}
					}
				}

				['sendemail'];
			}
		}
	}

	$sendemail = ;

	if (( $sendregistrar && $registrar )) {
		$params = array(  );
		$params['domainid'] = $domainid;

		if ($regtype == 'Transfer') {
			$moduleresult = (true ? RegTransferDomain( $params ) : RegRegisterDomain( $params ));

			while (true) {
				if (!$moduleresult['error']) {
					if ($sendemail) {
						sendMessage( $emailmessage, $domainid );
						break;
					}

					break;
				}

				jmp;
				( array( 'id' => $domainid, 'status' => 'Pending' ) );

				if ($sendemail) {
					sendMessage( $emailmessage, $domainid );
					break;
				}
			}


			if (is_array( $vars['renewals'] )) {
				foreach ($vars['renewals'] as ) {
					$options = ;
					$domainid = ;

					if ($vars['renewals'][$domainid]['sendregistrar']) {
						$sendregistrar = 'on';

						if ($vars['renewals'][$domainid]['sendemail']) {
						}
					}

					$sendemail = 'on';

					if ($sendregistrar) {
						$params = array(  );
						$params['domainid'] = $domainid;
						RegRenewDomain( $params );
						$moduleresult = ;

						if ($moduleresult['error']) {
							$errors[] = $moduleresult['error'];
						}

						break;
					}
				}

				select_query( 'tblorders', 'userid,promovalue', array( 'id' => $orderid ) );
				$result = ;
				mysql_fetch_array;
			}
		}
	}

	( $result );
	$data = ;
	$data['userid'];
	$userid = ;
	$data['promovalue'];
	$promovalue = ;

	if (substr( $promovalue, 0, 2 ) == 'DR') {
		if ($vars['domains'][$domainid]['sendregistrar']) {
			$sendregistrar = 'on';

			if (isset( $vars['api']['autosetup'] )) {
				$vars['api']['autosetup'];
				$sendregistrar = ;

				if ($sendregistrar) {
					$params = array(  );
					$params['domainid'] = $domainid;
					RegRenewDomain;
				}
			}
		}

		( $params );
		$moduleresult = ;

		if ($moduleresult['error']) {
			$errors[] = $moduleresult['error'];
			jmp;

			if ($sendemail) {
				sendMessage( 'Domain Renewal Confirmation', $domainid );

				if ($sendemail) {
				}

				sendMessage( 'Domain Renewal Confirmation', $domainid );
				update_query;
				'tblupgrades';
			}
		}

		( array( 'status' => 'Completed' ), array( 'orderid' => $orderid ) );
		!count( $errors );
	}


	if () {
		update_query;
		'tblorders';
		array( 'status' => 'Active' );
	}

	( , array( 'id' => $orderid ) );
	logActivity(  . 'Order Accepted - Order ID: ' . $orderid, $userid );
	return $errors;
}

function changeOrderStatus($orderid, $status, $cancelSubscription = false) {
	iciahfajh::getInstance(  );
	$whmcs = ;

	if (!$orderid) {
		return false;
		$orderid = (int)$orderid;

		if ($status == 'Cancelled') {
			run_hook( 'CancelOrder', array( 'orderid' => $orderid ) );
		}

		jmp;

		if ($status == 'Fraud') {
			run_hook( 'FraudOrder', array( 'orderid' => $orderid ) );
		}

		( 'status' );
		$orderStatus = ;
		update_query( 'tblorders', array( 'status' => $status ), array( 'id' => $orderid ) );

		if (( $status == 'Cancelled' || $status == 'Fraud' )) {
			while (true) {
				select_query( 'tblhosting', 'tblhosting.id,tblhosting.userid,tblhosting.domainstatus,tblproducts.servertype,tblhosting.packageid,tblhosting.paymentmethod,tblproducts.stockcontrol,tblproducts.qty', array( 'orderid' => $orderid ), '', '', '', 'tblproducts ON tblproducts.id=tblhosting.packageid' );
				$result = ;
				mysql_fetch_array( $result );

				if ($data = ) {
					if ($cancelSubscription) {
						cancelSubscriptionForService( $data['id'], $data['userid'] );
						break;
					}
				}
				else {
					$module = ;
					$data['packageid'];
					$packageid = ;
					$data['stockcontrol'];
					$stockcontrol = ;
					$data['qty'];
					$qty = ;

					if (( $module && ( $prodstatus == 'Active' || $prodstatus == 'Suspended' ) )) {
						logActivity( 'Running Module Terminate on Order Cancel' );

						if (!isValidforPath( $module )) {
							$errMsg = 'Invalid Server Module Name';

							if ($whmcs->isApiRequest(  )) {
								$apiresults = array( 'result' => 'error', 'message' => $errMsg );
								return $apiresults;
								throw new ggjchbedc( $errMsg );
								require_once( ROOTDIR . ( (  . '/modules/servers/' . $module . '/' ) . $module . '.php' ) );
								ServerTerminateAccount( $productid );
								$moduleresult = ;

								if ($moduleresult == 'success') {
									update_query( 'tblhosting', array( 'domainstatus' => $status ), array( 'id' => $productid ) );

									if ($stockcontrol) {
										update_query( 'tblproducts', array( 'qty' => '+1' ), array( 'id' => $packageid ) );
									}
								}

								break;
							}
						}
						else {
							select_query( 'tbldomains', 'id,type', array( 'orderid' => $orderid ) );
						}
					}

					$result = ;
					mysql_fetch_assoc( $result );

					if ($data = ) {
						if ($data['type'] == 'Transfer') {
							$status = 'Pending Transfer';
							break;
						}
					}
				}

				( 'tbldomains', array( 'status' => $status ), array( 'id' => $data['id'] ) );
			}

			update_query( 'tbldomains', array( 'status' => $status ), array( 'orderid' => $orderid ) );
			select_query( 'tblorders', 'userid,invoiceid', array( 'id' => $orderid ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data['userid'];
			$userid = ;
			$data['invoiceid'];
			$invoiceid = ;

			if ($status == 'Pending') {
				update_query( 'tblinvoices', array( 'status' => 'Unpaid' ), array( 'id' => $invoiceid, 'status' => 'Cancelled' ) );
			}

			(  );
			run_hook;
			'InvoiceCancelled';
			array( 'invoiceid' => $invoiceid );
		}

		;
	}

	(  );
	logActivity(  . 'Order Status set to ' . $status . ' - Order ID: ' . $orderid, $userid );
}

function cancelRefundOrder($orderid) {
	$orderid = (int)$orderid;
	select_query( 'tblorders', 'invoiceid', array( 'id' => $orderid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['invoiceid'];
	$invoiceid = ;

	if ($invoiceid) {
		select_query( 'tblinvoices', 'status', array( 'id' => $invoiceid ) );
		mysql_fetch_array( $result );
		$data['status'];
		$invoicestatus = ;

		if ($invoicestatus == 'Paid') {
			select_query( 'tblaccounts', 'id', array( 'invoiceid' => $invoiceid ) );
			$result = ;
			mysql_fetch_array;
		}

		( $result );
		$data = ;
		$data['id'];
		$transid = $result = ;
		refundInvoicePayment( $transid, '', true );
		$gatewayresult = $data = ;

		if ($gatewayresult == 'manual') {
			return 'manual';
			$gatewayresult != 'success';
		}


		if () {
			return 'refundfailed';

			if ($invoicestatus == 'Refunded') {
			}

			return 'alreadyrefunded';
		}
	}
	else {
		return 'notpaid';
		return 'noinvoice';
		$orderid;
	}

	changeOrderStatus( 'Cancelled' );
}

function deleteOrder($orderid) {
	if (!$orderid) {
		return false;
		$orderid = (int)$orderid;
		run_hook( 'DeleteOrder', array( 'orderid' => $orderid ) );
		select_query( 'tblorders', 'userid,invoiceid', array( 'id' => $orderid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;

		if (!canOrderBeDeleted( $orderid )) {
			return false;
			$data['userid'];
			$userid = ;
			$data['invoiceid'];
			$invoiceid = ;
			delete_query( 'tblhostingconfigoptions', (  . 'relid IN (SELECT id FROM tblhosting WHERE orderid=' . $orderid . ')' ) );
			delete_query( 'tblaffiliatesaccounts', (  . 'relid IN (SELECT id FROM tblhosting WHERE orderid=' . $orderid . ')' ) );
			$select = 'tblhosting.id AS relid, tblcustomfields.id AS fieldid';
			$where = array( 'tblhosting.orderid' => $orderid, 'tblcustomfields.type' => 'product' );
			$join = 'tblcustomfields ON tblcustomfields.relid=tblhosting.packageid';
			select_query( 'tblhosting', $select, $where, '', '', '', $join );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				$data['relid'];
				$hostingid = ;
				$data['fieldid'];
				$customfieldid = ;
				$deleteWhere = array( 'relid' => $hostingid, 'fieldid' => $customfieldid );
				delete_query( 'tblcustomfieldsvalues', $deleteWhere );
			}

			jmp;
			(  );
			delete_query( 'tblupgrades', array( 'orderid' => $orderid ) );
			delete_query;
		}
	}

	( 'tblorders', array( 'id' => $orderid ) );
	delete_query( 'tblinvoices', array( 'id' => $invoiceid ) );
	delete_query( 'tblinvoiceitems', array( 'invoiceid' => $invoiceid ) );
	logActivity(  . 'Deleted Order - Order ID: ' . $orderid, $userid );
}

function getAddons($pid, $addons = array(  )) {
	global $currency;
	global $_LANG;

	if (!$addons) {
		$addons = array(  );
		$addonsarray = array(  );
		select_query( 'tbladdons', '', array( 'showorder' => 'on' ), 'weight` ASC,`name', 'ASC' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$addon_id = ;
			$data['packages'];
			$addon_packages = ;
			$data['name'];
			$addon_name = ;
			$data['description'];
			$addon_description = ;
			$data['billingcycle'];
			$addon_billingcycle = ;
			select_query( 'tblpricing', '', array( 'type' => 'addon', 'currency' => $currency['id'], 'relid' => $addon_id ) );
			$result2 = ;
			mysql_fetch_array( $result2 );
			$data = ;
			$data['msetupfee'];
			$addon_setupfee = ;
			$data['monthly'];
			$addon_recurring = ;
			explode;
			',';
			$addon_packages;
		}
	}


	while (true) {
		(  );
		$addon_packages = ;

		if (in_array( $pid, $addon_packages )) {
			if (in_array( $addon_id, $addons )) {
				$addon_status = (true ? true : false);
				$addon_checkbox =  . '<input type="checkbox" name="addons[' . $addon_id . ']" id="a' . $addon_id . '"';

				if (in_array( $addon_id, $addons )) {
				}

				$addon_checkbox .= ' checked';
				$addon_checkbox .= ' />';

				if ($addon_billingcycle == 'Free') {
					$_LANG['orderfree'];
					$addon_pricingdetails = ;
					jmp;
					$addon_pricingdetails = formatCurrency( $addon_recurring ) . ' ';
					str_replace( array( ' ', '-' ), '', strtolower( $addon_billingcycle ) );
					$addon_billingcycle = ;
					$_LANG['orderpaymentterm' . $addon_billingcycle];
					$addon_pricingdetails .= ;

					if (0 < $addon_setupfee) {
						' + ' . formatCurrency( $addon_setupfee ) . ' ';
						$_LANG['ordersetupfee'];
					}
				}
			}

			$addon_pricingdetails .=  . ;
			$addonsarray[] = array( 'id' => $addon_id, 'checkbox' => $addon_checkbox, 'name' => $addon_name, 'description' => $addon_description, 'pricing' => $addon_pricingdetails, 'status' => $addon_status );
			break;
		}
	}

	return $addonsarray;
}

/**
 * Obtain a list of available payment gateways for the products currently in the cart.
 *
 * @throws WHMCS\Exception\Fatal
 *
 * @return array
 */
function getAvailableOrderPaymentGateways() {
	App::self(  );
	$whmcs = ;
	$disabledGateways = array(  );
	eaaadiagec::get( 'cart' );
	$cartSession = ;

	if (isset( $cartSession['products'] )) {
		foreach ($cartSession['products'] as ) {
			$values = ;

			while (true) {
				dacfgegdhe::table( 'tblproductgroups' )->join( 'tblproducts', 'tblproducts.gid', '=', 'tblproductgroups.id' )->where( 'tblproducts.id', '=', $values['pid'] )->first( array( 'disabledgateways' ) );
				$groupDisabled = ;
				array_merge( explode( ',', $groupDisabled->disabledgateways ), $disabledGateways );
				$disabledGateways = ;
			}
		}


		if (!function_exists( 'showPaymentGatewaysList' )) {
			require( ROOTDIR . '/includes/gatewayfunctions.php' );
			showPaymentGatewaysList( array_unique( $disabledGateways ) );
			$gatewaysList = ;
			foreach ($gatewaysList as ) {
				$values = ;
				$module = ;

				if (( $values['type'] == 'CC' || $values['type'] == 'OfflineCC' )) {
					if (!isValidforPath( $module )) {
						$errorMessage = 'Invalid Gateway Module Name';

						if ($whmcs->isApiRequest(  )) {
							$apiResults = array( 'result' => 'error', 'message' => $errorMessage );
							return $apiResults;
							throw new ggjchbedc( $errorMessage );
							ROOTDIR;
						}
					}

					$gatewayPath =  . (  . '/modules/gateways/' . $module . '.php' );

					if (file_exists( $gatewayPath )) {
						function_exists( $module . '_config' );
					}
				}

				break;
			}
		}
	}
	else {
		!(  );
	}

	/**
	 * Stop order deletion if order is not Fraud or in a cancelled status.
	 *
	 * @param int $orderID The ID of the order to be checked
	 * @return bool true/false as appropriate
	 */
	function canOrderBeDeleted($orderID) {
		(bool);

		if (!$orderID) {
			return false;
			$orderID = (int)$orderID;
			get_query_val( 'tblorders', 'status', array( 'id' => $orderID ) );
			$orderStatus = ;
			get_query_val( 'tblorderstatuses', 'showcancelled', array( 'title' => $orderStatus ) );
			$isCancelled = ;
		}

		(bool);
		return 1;
	}
}
?>
