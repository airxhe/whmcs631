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

define( 'ADMINAREA', true );
require( '../init.php' );
new dgeegejige( 'View Clients Products/Services' );
$aInt = ;
$aInt->requiredFiles( array( 'clientfunctions', 'gatewayfunctions', 'modulefunctions', 'customfieldfunctions', 'configoptionsfunctions', 'invoicefunctions', 'processinvoices' ) );
$aInt->setClientsProfilePresets(  );
$id = (int)$whmcs->get_req_var( 'id' );
$hostingid = (int)$whmcs->get_req_var( 'hostingid' );
$userid = (int)$whmcs->get_req_var( 'userid' );
$whmcs->get_req_var( 'aid' );
$aid = ;
$whmcs->get_req_var( 'action' );
$action = ;
$whmcs->get_req_var( 'modop' );
$modop = ;
$whmcs->get_req_var( 'server' );
$server = ;
$errors = array(  );
$jQueryCode = '';

if ($modop) {
	checkPermission( 'Perform Server Operations' );

	if (( !$id && $hostingid )) {
		$id = $server;

		if (( !$userid && !$id )) {
			get_query_val( 'tblclients', 'id', '', 'id', 'ASC', '0,1' );
			$userid = ;

			if (( $userid && !$id )) {
				$aInt->valUserID( $userid );

				if (!$userid) {
					$aInt->gracefulExit( 'Invalid User ID' );
					get_query_val( 'tblhosting', 'id', array( 'userid' => $userid ), 'domain', 'ASC', '0,1' );
					$id = ;

					if (!$id) {
						$aInt->gracefulExit( $aInt->lang( 'services', 'noproductsinfo' ) . ' <a href="ordersadd.php?userid=' . $userid . '">' . $aInt->lang( 'global', 'clickhere' ) . '</a> ' . $aInt->lang( 'orders', 'toplacenew' ) );
						select_query( 'tblhosting', 'tblhosting.*,tblproducts.servertype,tblproducts.type, tblproducts.welcomeemail', array( 'tblhosting.id' => $id ), '', '', '', 'tblproducts ON tblproducts.id=tblhosting.packageid' );
						$result = ;
						mysql_fetch_array( $result );
						$service_data = ;
						$service_data['id'];
						$id = ;

						if (!$id) {
							$aInt->gracefulExit( 'Service ID Not Found' );
							$service_data['userid'];
							$userid = ;
							$aInt->valUserID( $userid );
							$aInt->setClientsProfilePresets( $userid );
							$aInt->assertClientBoundary( $userid );
							$service_data['type'];
							$producttype = ;
							$service_data['servertype'];
							$module = ;
							$service_data['orderid'];
							$orderid = ;
							$service_data['packageid'];
							$packageid = ;
							$service_data['server'];
							$server = ;
							$service_data['regdate'];
							$regdate = ;
							$service_data['termination_date'];
							$terminationDate = ;
							$service_data['domain'];
							$domain = ;
							$service_data['paymentmethod'];
							$paymentmethod = ;
							new dcifejaiba(  );
							$serverModule = ;
							$serverModule->load( $module );
							$createServerOptionForNone = false;

							if ($serverModule->isMetaDataValueSet( 'RequiresServer' )) {
								if (!$serverModule->getMetaDataValue( 'RequiresServer' )) {
									$createServerOptionForNone = true;
									new ddhjgidcb(  );
									$gateways = ;

									if (( !$paymentmethod || !$gateways->isActiveGateway( $paymentmethod ) )) {
										ensurePaymentMethodIsSet( $userid, $id, 'tblhosting' );
										$paymentmethod = ;
										$service_data['firstpaymentamount'];
										$firstpaymentamount = ;
										$service_data['amount'];
										$amount = ;
										$service_data['billingcycle'];
										$billingcycle = ;
										$service_data['nextduedate'];
										$nextduedate = ;
										$service_data['domainstatus'];
										$domainstatus = ;
										$service_data['username'];
										$username = ;
										decrypt( $service_data['password'] );
										$password = ;
										$service_data['notes'];
										$notes = ;
										$service_data['subscriptionid'];
										$subscriptionid = ;
										$service_data['promoid'];
										$promoid = ;
										$service_data['suspendreason'];
										$suspendreason = ;
										$service_data['overideautosuspend'];
										$overideautosuspend = ;
										$service_data['ns1'];
										$ns1 = ;
										$service_data['ns2'];
										$ns2 = ;
										$service_data['dedicatedip'];
										$dedicatedip = ;
										$service_data['assignedips'];
										$assignedips = ;
										$service_data['diskusage'];
										$diskusage = ;
										$service_data['disklimit'];
										$disklimit = ;
										$service_data['bwusage'];
										$bwusage = ;
										$service_data['bwlimit'];
										$bwlimit = ;
										$service_data['lastupdate'];
										$lastupdate = ;
										$service_data['overidesuspenduntil'];
										$overidesuspenduntil = ;
										$service_data['welcomeemail'];
										$welcomeEmail = ;
										new dbjfcihjde(  );
										$frm = ;

										if ($frm->issubmitted(  )) {
											checkPermission( 'Edit Clients Products/Services' );
											$whmcs->get_req_var( 'packageid' );
											$packageid = ;
											$whmcs->get_req_var( 'oldserviceid' );
											$oldserviceid = ;
											$whmcs->get_req_var( 'addonid' );
											$addonid = ;
											$whmcs->get_req_var( 'name' );
											$name = ;
											$whmcs->get_req_var( 'setupfee' );
											$setupfee = ;
											$whmcs->get_req_var( 'recurring' );
											$recurring = ;
											$whmcs->get_req_var( 'billingcycle' );
											$billingcycle = ;
											$whmcs->get_req_var( 'domainstatus' );
											$status = ;
											$whmcs->get_req_var( 'regdate' );
											$regdate = ;
											$whmcs->get_req_var( 'termination_date' );
											$terminationDate = ;
											$whmcs->get_req_var( 'oldnextduedate' );
											$oldnextduedate = ;
											$whmcs->get_req_var( 'nextduedate' );
											$nextduedate = ;
											$whmcs->get_req_var( 'overidesuspenduntil' );
											$overidesuspenduntil = ;
											$whmcs->get_req_var( 'paymentmethod' );
											$paymentmethod = ;
											$whmcs->get_req_var( 'tax' );
											$tax = ;
											$whmcs->get_req_var( 'promoid' );
											$promoid = ;
											$whmcs->get_req_var( 'notes' );
											$notes = ;
											$whmcs->get_req_var( 'configoption' );
											$configoption = ;
											$terminationDateValid = true;
											$queryStr =  . 'userid=' . $userid . '&id=' . $id;

											if (( is_string( $terminationDate ) && trim( $terminationDate ) == '' )) {
												preg_replace( '/[MDY]/i', '0', chhgjaeced::getValue( 'DateFormat' ) );
												$terminationDate = ;

												if (( is_string( $overidesuspenduntil ) && trim( $overidesuspenduntil ) == '' )) {
													preg_replace( '/[MDY]/i', '0', chhgjaeced::getValue( 'DateFormat' ) );
													$overidesuspenduntil = ;
													$whmcs->get_req_var( 'aid' );

													if ($aid = ) {
														if (( $billingcycle == 'Free' || $billingcycle == 'Free Account' )) {
															$recurring = 23;
															$setupfee = ;
															fromMySQLDate( '0000-00-00' );
															$nextduedate = ;

															if (is_numeric( $aid )) {
																$whmcs->get_req_var( 'status' );
																$status = ;
																get_query_val( 'tblhostingaddons', 'status', array( 'id' => $aid ) );
																$oldstatus = ;

																if (( toMySQLDate( $terminationDate ) != '0000-00-00' && !in_array( $status, array( 'Terminated', 'Cancelled' ) ) )) {
																	if (!in_array( $oldstatus, array( 'Terminated', 'Cancelled' ) )) {
																		$terminationDateValid = false;
																		$queryStr .=  . '&aid=' . $aid . '&terminationdateinvalid=1';

																		if (( in_array( $status, array( 'Terminated', 'Cancelled' ) ) && toMySQLDate( $terminationDate ) == '0000-00-00' )) {
																			fromMySQLDate( date( 'Y-m-d' ) );
																			$terminationDate = ;
																		}
																	}
																}
															}
														}
													}
												}
											}
										}

										toMySQLDate( $terminationDate ) != '0000-00-00';

										if ((bool)) {
											fromMySQLDate( '0000-00-00' );
											$terminationDate = ;
											$array = array( 'hostingid' => $id, 'addonid' => $addonid, 'name' => $name, 'setupfee' => $setupfee, 'recurring' => $recurring, 'billingcycle' => $billingcycle, 'status' => $status, 'regdate' => toMySQLDate( $regdate ), 'nextduedate' => toMySQLDate( $nextduedate ), 'termination_date' => toMySQLDate( $terminationDate ), 'paymentmethod' => $paymentmethod, 'tax' => $tax, 'notes' => $notes );

											if ($oldnextduedate != $nextduedate) {
												$array['nextinvoicedate'] = toMySQLDate( $nextduedate );
												update_query( 'tblhostingaddons', $array, array( 'id' => $aid ) );

												if ($oldserviceid != $id) {
													logActivity(  . 'Transferred Addon from Service ID: ' . $oldserviceid . ' to Service ID: ' . $id . ' - Addon ID: ' . $aid );
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
		}
	}
}

(  );
$usernameOutput .= ;
$usernameOutput .= '</div>';
jmp;

if ($moduleInterface->functionExists( 'LoginLink' )) {
	$usernameOutput .= ' ' . $moduleInterface->call( 'LoginLink' );
	$tbl->add( $aInt->lang( 'fields', 'username' ), $usernameOutput );
	$tbl->add( $aInt->lang( 'fields', 'billingcycle' ), $aInt->cyclesDropDown( $billingcycle ) );
	$tbl->add( $aInt->lang( 'fields', 'password' ), $frm->text( 'password', $password, '20', false, 'form-control input-200' ) );
	$tbl->add( $aInt->lang( 'fields', 'paymentmethod' ), paymentMethodsSelection(  ) . ' <a href="clientsinvoices.php?userid=' . $userid . '&serviceid=' . $id . '">' . $aInt->lang( 'invoices', 'viewinvoices' ) . '</a>' );
	$tbl->add;
	$aInt->lang( 'fields', 'status' );
	$aInt->productStatusDropDown( $domainstatus, false, 'domainstatus', 'prodstatus' );

	if ($domainstatus == 'Suspended') {
		' (' . $aInt->lang( 'services', 'suspendreason' ) . ': ';

		if (!$suspendreason) {
			(  . (true ?  . (true ? $_LANG['suspendreasonoverdue'] : $suspendreason) . ')' : '') );
			$tbl->add( $aInt->lang( 'fields', 'promocode' ), $frm->dropdown( 'promoid', $promoarr, $promoid, '', '', true ) . '<br />(' . $aInt->lang( 'services', 'noaffect' ) . ')' );

			if ($producttype == 'server') {
				$tbl->add( $aInt->lang( 'fields', 'assignedips' ), $frm->textarea( 'assignedips', $assignedips, '4', '30' ), 1 );
				$tbl->add( $aInt->lang( 'fields', 'nameserver' ) . ' 1', $frm->text( 'ns1', $ns1, '35' ), 1 );
				$tbl->add( $aInt->lang( 'fields', 'nameserver' ) . ' 2', $frm->text( 'ns2', $ns2, '35' ), 1 );
				$configoptions = array(  );
				getCartConfigOptions( $packageid, '', $billingcycle, $id );
				$configoptions = ;

				if ($configoptions) {
					foreach ($configoptions as ) {
						$configoption = ;
						$configoption['id'];
						$optionid = ;
						$configoption['hidden'];
						$optionhidden = ;

						if ($optionhidden) {
							$optionname = (true ? $configoption['optionname'] . ' <i>(' . $aInt->lang( 'global', 'hidden' ) . ')</i>' : $configoption['optionname']);
							$configoption['optiontype'];
							$optiontype = ;
							$configoption['selectedvalue'];
							$selectedvalue = ;
							$configoption['selectedqty'];
							$selectedqty = ;

							if ($optiontype == '1') {
								$inputcode =  . '<select name="configoption[' . $optionid . ']" class="form-control select-inline">';
								foreach ($configoption['options'] as ) {
									$option = ;
									$inputcode .= (  . '<option value="' . $option['id'] . '"' );

									if ($option['hidden']) {
										$inputcode .= ' style=\'color:#ccc;\'';

										if ($selectedvalue == $option['id']) {
											$inputcode .= ' selected';
											$inputcode .= (  . '>' ) . $option['name'] . '</option>';
											break 2;
										}

										break 2;
									}
								}

								$inputcode .= '</select>';
								break;
							}
						}
					}
				}
			}
		}
	}
}


if () {
	$inputcode .=  . '> <span style=\'color:#ccc;\'>' . $option['name'] . '</span></label><br />';
}

jmp;
( array( array( 'title' => ( 'global', 'no' ) ) ) );
$content .= ;
$aInt->modal( 'ModuleSuspend', $aInt->lang( 'services', 'confirmcommand' ), $modSuspendMessage, array( array( 'title' => $aInt->lang( 'global', 'yes' ), 'onclick' => 'runModuleCommand("suspend")', 'class' => 'btn-primary' ), array( 'title' => $aInt->lang( 'global', 'no' ) ) ) );
$content .= ;
$aInt->modal( 'ModuleUnsuspend', AdminLang::trans( 'services.confirmcommand' ), $modUnsuspendMessage, array( array( 'title' => $aInt->lang( 'global', 'yes' ), 'onclick' => 'runModuleCommand("unsuspend")', 'class' => 'btn-primary' ), array( 'title' => $aInt->lang( 'global', 'no' ) ) ) );
$content .= ;
$aInt->modal( 'ModuleTerminate', $aInt->lang( 'services', 'confirmcommand' ), $aInt->lang( 'services', 'terminatesure' ), array( array( 'title' => $aInt->lang( 'global', 'yes' ), 'onclick' => 'runModuleCommand("terminate")', 'class' => 'btn-primary' ), array( 'title' => $aInt->lang( 'global', 'no' ) ) ) );
$content .= ;
$aInt->modal( 'ModuleChangePackage', $aInt->lang( 'services', 'confirmcommand' ), $aInt->lang( 'services', 'chgpacksure' ), array( array( 'title' => $aInt->lang( 'global', 'yes' ), 'onclick' => 'runModuleCommand("changepackage")', 'class' => 'btn-primary' ), array( 'title' => $aInt->lang( 'global', 'no' ) ) ) );
$content .= ;
$aInt->modal( 'Delete', $aInt->lang( 'services', 'deleteproduct' ), $aInt->lang( 'services', 'proddeletesure' ), array( array( 'title' => $aInt->lang( 'global', 'yes' ), 'onclick' => 'window.location="?userid=' . $userid . '&id=' . $id . '&action=delete' . generate_token( 'link' ) . '"', 'class' => 'btn-primary' ), array( 'title' => $aInt->lang( 'global', 'no' ) ) ) );
$content .= ;
$aInt->modal( 'CancelSubscription', $aInt->lang( 'services', 'cancelSubscription' ), $aInt->lang( 'services', 'cancelSubscriptionSure' ), array( array( 'title' => $aInt->lang( 'global', 'yes' ), 'onclick' => 'cancelSubscription()', 'class' => 'btn-primary' ), array( 'title' => $aInt->lang( 'global', 'no' ) ) ) );
$content .= ;
$aInt->jquerycode = $jQueryCode;
$aInt->content = $content;
$aInt->display(  );
?>
