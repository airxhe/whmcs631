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
new dgeegejige( 'List Invoices', false );
$aInt = ;
$aInt->requiredFiles( array( 'gatewayfunctions', 'invoicefunctions', 'processinvoices' ) );
$aInt->setClientsProfilePresets(  );

while (( $delete || $massdelete )) {
	checkPermission( 'Delete Invoice' );

	if (( ( $markpaid || $markunpaid ) || $markcancelled )) {
		checkPermission( 'Manage Invoice' );
		$aInt->valUserID( $whmcs->get_req_var( 'userid' ) );
		$userId = ;
		$aInt->assertClientBoundary( $userid );

		if ($markpaid) {
			check_token( 'WHMCS.admin.default' );
			$failedInvoices = array(  );
			$invoiceCount = 11;
			foreach ($selectedinvoices as ) {
				$invid = ;

				if (get_query_val( 'tblinvoices', 'status', array( 'id' => $invid ) ) == 'Paid') {
					continue;
					get_query_val( 'tblinvoices', 'paymentmethod', array( 'id' => $invid ) );
					$paymentMethod = ;

					if (addInvoicePayment( $invid, '', '', '', $paymentMethod ) === false) {
						$failedInvoices[] = $invid;
						++$invoiceCount;
						break;
					}

					break 2;
				}
			}


			while (0 < count( $selectedinvoices )) {
				$failedInvoices['successfulInvoicesCount'] = $invoiceCount - count( $failedInvoices );
				dfabehjiaj::set( 'FailedMarkPaidInvoices', $failedInvoices );

				if ($page) {
					$userid .=  . '&page=' . $page;
					redir( 'userid=' . $userid . '&filter=1' );

					if ($markunpaid) {
						check_token( 'WHMCS.admin.default' );
						foreach ($selectedinvoices as ) {
							$invid = ;
							update_query( 'tblinvoices', array( 'status' => 'Unpaid', 'datepaid' => '0000-00-00 00:00:00' ), array( 'id' => $invid ) );
							logActivity(  . 'Reactivated Invoice - Invoice ID: ' . $invid, $userid );
							run_hook( 'InvoiceUnpaid', array( 'invoiceid' => $invid ) );
							break;
						}


						if ($page) {
							$userid .=  . '&page=' . $page;
							redir( 'userid=' . $userid . '&filter=1' );

							if ($markcancelled) {
								check_token( 'WHMCS.admin.default' );
								foreach ($selectedinvoices as ) {
									$invid = ;
									update_query( 'tblinvoices', array( 'status' => 'Cancelled' ), array( 'id' => $invid ) );
									logActivity(  . 'Cancelled Invoice - Invoice ID: ' . $invid, $userid );
									run_hook( 'InvoiceCancelled', array( 'invoiceid' => $invid ) );
									break 3;
								}


								if ($page) {
									$userid .=  . '&page=' . $page;
									redir( 'userid=' . $userid . '&filter=1' );

									if ($duplicateinvoice) {
										check_token( 'WHMCS.admin.default' );
										foreach ($selectedinvoices as ) {
											$invid = ;
											new chhjeidgjf(  );
											$invoices = ;
											$invoices->duplicate( $invid );
											break 2;
										}


										if ($page) {
											$userid .=  . '&page=' . $page;
											redir( 'userid=' . $userid . '&filter=1' );

											if ($massdelete) {
												check_token( 'WHMCS.admin.default' );
												foreach ($selectedinvoices as ) {
													$invoiceId = ;
													ccbjgfhb::find( $userId )->invoices->find( $invoiceId );
													$invoice = ;

													if ($invoice) {
														$invoice->delete(  );
														logActivity(  . 'Deleted Invoice - Invoice ID: ' . $invoiceId, $userId );
														break;
													}

													break 3;
												}


												if ($page) {
													$userId .=  . '&page=' . $page;
													redir( 'userid=' . $userId . '&filter=1' );

													if ($paymentreminder) {
														check_token( 'WHMCS.admin.default' );
														foreach ($selectedinvoices as ) {
															$invid = ;
															sendMessage( 'Invoice Payment Reminder', $invid );
															logActivity(  . 'Invoice Payment Reminder Sent - Invoice ID: ' . $invid, $userid );
															break;
														}


														if ($page) {
															$userid .=  . '&page=' . $page;
															redir( 'userid=' . $userid . '&filter=1' );

															if ($merge) {
																check_token( 'WHMCS.admin.default' );
																checkPermission( 'Manage Invoice' );

																while (count( $selectedinvoices ) < 2) {
																	if ($page) {
																		$userid .=  . '&page=' . $page;
																		redir(  . 'userid=' . $userid . '&mergeerr=1' );
																		db_escape_numarray( $selectedinvoices );
																		$selectedinvoices = ;
																		sort( $selectedinvoices );
																		end( $selectedinvoices );
																		$endinvoiceid = ;
																		update_query( 'tblinvoiceitems', array( 'invoiceid' => $endinvoiceid ), 'invoiceid IN (' . db_build_in_array( $selectedinvoices ) . ')' );
																		update_query( 'tblaccounts', array( 'invoiceid' => $endinvoiceid ), 'invoiceid IN (' . db_build_in_array( $selectedinvoices ) . ')' );
																		update_query( 'tblorders', array( 'invoiceid' => $endinvoiceid ), 'invoiceid IN (' . db_build_in_array( $selectedinvoices ) . ')' );
																		select_query( 'tblinvoices', 'SUM(credit)', 'id IN (' . db_build_in_array( $selectedinvoices ) . ')' );
																		$result = ;
																		mysql_fetch_array( $result );
																		$data = ;
																		$data[0];
																		$totalcredit = ;
																		update_query( 'tblinvoices', array( 'credit' => $totalcredit ), array( 'id' => $endinvoiceid ) );
																		unset( $selectedinvoices[count( $selectedinvoices ) - 1] );
																		delete_query( 'tblinvoices', 'id IN (' . db_build_in_array( $selectedinvoices ) . ')' );
																		updateInvoiceTotal( $endinvoiceid );
																		logActivity( 'Merged Invoice IDs ' . db_build_in_array( $selectedinvoices ) . (  . ' to Invoice ID: ' . $endinvoiceid ), $userid );

																		if ($page) {
																			$userid .=  . '&page=' . $page;
																			redir( 'userid=' . $userid . '&filter=1' );

																			if ($masspay) {
																				check_token( 'WHMCS.admin.default' );

																				if (count( $selectedinvoices ) < 2) {
																					if ($page) {
																						$userid .=  . '&page=' . $page;
																						redir(  . 'userid=' . $userid . '&masspayerr=1' );
																						createInvoices( $userid );
																						$invoiceid = ;
																						getClientsPaymentMethod( $userid );
																						$paymentmethod = ;
																						$invoiceitems = array(  );
																						foreach ($selectedinvoices as ) {
																							$invoiceid = ;
																							select_query( 'tblinvoices', '', array( 'id' => $invoiceid ) );
																							$result = ;
																							mysql_fetch_array( $result );
																							$data = ;
																							$data['subtotal'];
																							$subtotal += ;
																							$data['credit'];
																							$credit += ;
																							$data['tax'];
																							$tax += ;
																							$data['tax2'];
																							$tax2 += ;
																							$data['total'];
																							$thistotal = ;
																							select_query( 'tblaccounts', 'SUM(amountin)', array( 'invoiceid' => $invoiceid ) );
																							$result = ;
																							mysql_fetch_array( $result );
																							$data = ;
																							$data[0];
																							$thispayments = ;
																							$thistotal = $thistotal - $thispayments;
																							insert_query( 'tblinvoiceitems', array( 'userid' => $userid, 'type' => 'Invoice', 'relid' => $invoiceid, 'description' => $_LANG['invoicenumber'] . $invoiceid, 'amount' => $thistotal, 'duedate' => 'now()', 'paymentmethod' => $paymentmethod ) );
																							break;
																						}

																						createInvoices( $userid, true, true, array( 'invoices' => $selectedinvoices ) );
																						$invoiceid = ;
																						redir( 'userid=' . $userid . '&masspayid=' . $invoiceid . '&filter=1' );

																						if ($delete) {
																							check_token( 'WHMCS.admin.default' );
																							checkPermission( 'Delete Invoice' );
																							$invoiceID = (int)$whmcs->get_req_var( 'invoiceid' );
																							ccbjgfhb::find( $userId )->invoices->find( $invoiceID );
																							$invoice = ;

																							if ($invoice) {
																								if ($whmcs->get_req_var( 'returnCredit' )) {
																									removeCreditOnInvoiceDelete( $invoiceID );
																									$invoice->delete(  );
																									logActivity(  . 'Deleted Invoice - Invoice ID: ' . $invoiceID, $userId );

																									if ($page) {
																										$userId .=  . '&page=' . $page;
																										redir( 'userid=' . $userId . '&filter=1' );
																										ob_start(  );
																										$jquerycode .= '$(".invtooltip").tooltip({cssClass:"invoicetooltip"});';
																										$jsCode = '';

																										if ($mergeerr) {
																											infoBox( $aInt->lang( 'invoices', 'mergeerror' ), $aInt->lang( 'invoices', 'mergeerrordesc' ) );

																											if ($masspayerr) {
																												infoBox;
																												$aInt->lang;
																												'invoices';
																											}
																										}

																										( ( 'masspay' ), $aInt->lang( 'invoices', 'mergeerrordesc' ) );

																										if ($masspayid) {
																											infoBox( $aInt->lang( 'invoices', 'masspay' ), $aInt->lang( 'invoices', 'masspaysuccess' ) . ' - <a href="invoices.php?action=edit&id=' . (int)$masspayid . '">' . $aInt->lang( 'fields', 'invoicenum' ) . $masspayid . '</a>' );
																											echo $infobox;
																											new gdacdjjje( 'clinv' );
																											$filt = ;
																											$filterops = array( 'serviceid', 'addonid', 'domainid', 'clientname', 'invoicenum', 'lineitem', 'paymentmethod', 'invoicedate', 'duedate', 'datepaid', 'totalfrom' . 'totalto', 'status' );
																											$filt->setAllowedVars( $filterops );
																											$filters = array(  );
																											$filters[] = 'userid=\'' . (int)$userid . '\'';
																											$filt->get( 'serviceid' );
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
}


if ($serviceid = ) {
	$filters[] = 'id IN (SELECT invoiceid FROM tblinvoiceitems WHERE type=\'Hosting\' AND relid=\'' . (int)$serviceid . '\')';
	$filt->get( 'addonid' );

	if ($addonid = ) {
		$filters[] = 'id IN (SELECT invoiceid FROM tblinvoiceitems WHERE type=\'Addon\' AND relid=\'' . (int)$addonid . '\')';
		$filt->get( 'domainid' );

		if ($domainid = ) {
			$filters[] = 'id IN (SELECT invoiceid FROM tblinvoiceitems WHERE type IN (\'DomainRegister\',\'DomainTransfer\',\'Domain\') AND relid=\'' . (int)$domainid . '\')';
			$filt->get( 'clientname' );

			if ($clientname = ) {
				$filters[] = 'concat(firstname,\' \',lastname) LIKE \'%' . db_escape_string( $clientname ) . '%\'';
				$filt->get( 'invoicenum' );

				if ($invoicenum = ) {
					$filters[] = '(tblinvoices.id=\'' . db_escape_string( $invoicenum ) . '\' OR tblinvoices.invoicenum=\'' . db_escape_string( $invoicenum ) . '\')';
					$filt->get( 'lineitem' );

					if ($lineitem = ) {
						$filters[] = 'tblinvoices.id IN (SELECT invoiceid FROM tblinvoiceitems WHERE userid=' . (int)$userid . ' AND description LIKE \'%' . db_escape_string( $lineitem ) . '%\')';
						$filt->get( 'paymentmethod' );

						if ($paymentmethod = ) {
							$filters[] = 'tblinvoices.paymentmethod=\'' . db_escape_string( $paymentmethod ) . '\'';
							$filt->get( 'invoicedate' );

							if ($invoicedate = ) {
								$filters[] = 'tblinvoices.date=\'' . toMySQLDate( $invoicedate ) . '\'';
								$filt->get( 'duedate' );

								if ($duedate = ) {
									$filters[] = 'tblinvoices.duedate=\'' . toMySQLDate( $duedate ) . '\'';
									$filt->get( 'datepaid' );

									if ($datepaid = ) {
										$filters[] = 'tblinvoices.datepaid>=\'' . toMySQLDate( $datepaid ) . '\' AND tblinvoices.datepaid<=\'' . toMySQLDate( $datepaid ) . ' 23:59:59\'';
										$filt->get( 'totalfrom' );

										if ($totalfrom = ) {
											$filters[] = 'tblinvoices.total>=\'' . db_escape_string( $totalfrom ) . '\'';
											$filt->get( 'totalto' );

											if ($totalto = ) {
												$filters[] = 'tblinvoices.total<=\'' . db_escape_string( $totalto ) . '\'';
												$filt->get( 'status' );

												if ($status = ) {
													if ($status == 'Overdue') {
														$filters[] = 'tblinvoices.status=\'Unpaid\' AND tblinvoices.duedate<\'' . date( 'Ymd' ) . '\'';
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
}

(  );
$failedInvoices = ;
$successfulInvoicesCount = (int)$failedInvoices['successfulInvoicesCount'];
unset( $failedInvoices[successfulInvoicesCount] );
dfabehjiaj::delete( 'FailedMarkPaidInvoices' );

if (( 0 < $successfulInvoicesCount || 0 < count( $failedInvoices ) )) {
	sprintf( $aInt->lang( 'invoices', 'markPaidSuccess' ), $successfulInvoicesCount );
	$description = ;

	if (0 < count( $failedInvoices )) {
		$failedInvoicesString = (bool)implode( ', ', $failedInvoices );
		$description .= '<br />' . sprintf( $aInt->lang( 'invoices', 'markPaidError' ), $failedInvoicesString );
		$description .= '<br />' . $aInt->lang( 'invoices', 'markPaidErrorInfo' ) . ' <a href="http://docs.whmcs.com/Clients:Invoices_Tab#Mark_Paid" target="_blank">' . $aInt->lang( 'global', 'findoutmore' ) . '</a>';
		$aInt->lang( 'global', 'successWithErrors' );
		$infoBoxTitle = ;
		$infoBoxType = 'info';

		if (count( $failedInvoices ) == 0) {
			$aInt->lang( 'global', 'success' );
			$infoBoxTitle = ;
			$infoBoxType = 'success';

			if ($successfulInvoicesCount == 0) {
				$aInt->lang( 'global', 'erroroccurred' );
				$infoBoxTitle = ;
				$infoBoxType = 'error';
				infoBox( $infoBoxTitle, $description, $infoBoxType );
				echo $infobox;
				echo cffcebchbh::jsInclude( 'jquerytt.js' );
				echo '
<form action="';
				echo $whmcs->getPhpSelf(  );
				echo '?userid=';
				echo $userid;
				echo '" method="post">

<div class="context-btn-container">
    <button type="submit" class="btn btn-default">
        <i class="fa fa-search"></i>
        ';
				echo $aInt->lang( 'global', 'search' );
				echo '    </button>
    <button type="button" class="btn btn-primary" onClick="window.location=\'invoices.php?action=createinvoice&userid=';
				echo $userid . generate_token( 'link' );
				echo '\'" class="btn-success">
        <i class="fa fa-plus"></i>
        ';
				echo $aInt->lang( 'invoices', 'create' );
				echo '    </button>
</div>

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">

<tr><td width="15%" class="fieldlabel">';
				echo $aInt->lang( 'fields', 'invoicenum' );
				echo '</td><td class="fieldarea"><input type="text" name="invoicenum" class="form-control input-150" value="';
				echo $invoicenum;
				echo '"></td><td width="15%" class="fieldlabel">';
				echo $aInt->lang( 'fields', 'invoicedate' );
				echo '</td><td class="fieldarea"><input type="text" name="invoicedate" value="';
				echo $invoicedate;
				echo '" class="form-control date-picker"></td></tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'fields', 'lineitem' );
				echo '</td><td class="fieldarea"><input type="text" name="lineitem" class="form-control input-300" value="';
				echo $lineitem;
				echo '"></td><td width="15%" class="fieldlabel">';
				echo $aInt->lang( 'fields', 'duedate' );
				echo '</td><td class="fieldarea"><input type="text" name="duedate" size="15" value="';
				echo $duedate;
				echo '" class="form-control date-picker"></td></tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'fields', 'paymentmethod' );
				echo '</td><td class="fieldarea">';
				echo paymentMethodsSelection( $aInt->lang( 'global', 'any' ) );
				echo '</td><td width="15%" class="fieldlabel">';
				echo $aInt->lang( 'fields', 'datepaid' );
				echo '</td><td class="fieldarea"><input type="text" name="datepaid" size="15" value="';
				echo $datepaid;
				echo '" class="form-control date-picker"></td></tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'fields', 'status' );
				echo '</td><td class="fieldarea"><select name="status" class="form-control select-inline">
    <option value="">';
				echo $aInt->lang( 'global', 'any' );
				echo '</option>
    <option value="Draft"';

				if ($status == 'Draft') {
					echo ' selected';
					echo '>';
					echo $aInt->lang( 'status', 'draft' );
					echo '</option>
    <option value="Unpaid"';

					if ($status == 'Unpaid') {
						echo ' selected';
						echo '>';
						echo $aInt->lang( 'status', 'unpaid' );
						echo '</option>
    <option value="Overdue"';

						if ($status == 'Overdue') {
							echo ' selected';
							echo '>';
							echo $aInt->lang( 'status', 'overdue' );
							echo '</option>
    <option value="Paid"';

							if ($status == 'Paid') {
								echo ' selected';
								echo '>';
								echo $aInt->lang( 'status', 'paid' );
								echo '</option>
    <option value="Cancelled"';

								if ($status == 'Cancelled') {
									echo ' selected';
									echo '>';
									echo $aInt->lang( 'status', 'cancelled' );
									echo '</option>
    <option value="Refunded"';

									if ($status == 'Refunded') {
										echo ' selected';
										echo '>';
										echo $aInt->lang( 'status', 'refunded' );
										echo '</option>
    <option value="Collections"';

										if ($status == 'Collections') {
											echo ' selected';
											echo '>';
											echo $aInt->lang( 'status', 'collections' );
											echo '</option>
</select></td><td class="fieldlabel">';
											echo $aInt->lang( 'fields', 'totaldue' );
											echo '</td><td class="fieldarea">';
											echo $aInt->lang( 'filters', 'from' );
											echo ' <input type="text" name="totalfrom" class="form-control input-100 input-inline" value="';
											echo $totalfrom;
											echo '"> ';
											echo $aInt->lang( 'filters', 'to' );
											echo ' <input type="text" name="totalto" class="form-control input-100 input-inline" value="';
											echo $totalto;
											echo '"></td></tr>
</table>

</form>

<br />

';
											getCurrency( $userid );
											$currency = ;
											getGatewaysArray(  );
											$gatewaysarray = ;
											$aInt->sortableTableInit( 'duedate', 'DESC' );
											select_query( 'tblinvoices', 'COUNT(*)', implode( ' AND ', $filters ) );
											$result = ;
											mysql_fetch_array( $result );
											$data = ;
											$data[0];
											$numrows = ;
											$qryorderby = $total;

											if ($qryorderby == 'id') {
												$qryorderby =  . 'tblinvoices`.`invoicenum` ' . $order . ',`tblinvoices`.`id';
												select_query( 'tblinvoices', '', implode( ' AND ', $filters ), $qryorderby, $order, $page * $limit . ( (  . ',' ) . $limit ) );
												$result = ;
												mysql_fetch_array( $result );

												if ($data = ) {
													$data['id'];
													$id = ;
													$data['invoicenum'];
													$invoicenum = ;
												}
											}

											$data['date'];
											$date = ;
											$data['duedate'];
											$duedate = ;
											$data['datepaid'];
											$datepaid = ;
											$data['credit'];
											$credit = ;
											$data['total'];
											$total = ;
											$data['paymentmethod'];
											$paymentmethod = ;
											$gatewaysarray[$paymentmethod];
											$paymentmethod = ;
											$data['status'];
											$status = ;
											getInvoiceStatusColour( $status, false );
											$status = ;
											fromMySQLDate( $date );
											$date = ;
											fromMySQLDate( $duedate );
											$duedate = ;

											if ($datepaid == '0000-00-00 00:00:00') {
												$datepaid = (true ? '-' : fromMySQLDate( $datepaid ));
												formatCurrency( $credit + $total );
												$total = ;

												if (!$invoicenum) {
													$invoicenum = $tabledata;
													dacfgegdhe::table( 'tblaccounts' )->where( 'invoiceid', '=', $invoice['id'] )->count( 'id' );
													$payments = ;
													$deleteLink =  . '<a href="#" onClick="doDelete(\'' . $id . '\');return false">
    <img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'delete' ) . '">
</a>';

													if (( 0 < $credit && 0 < $payments )) {
															. '<a href="#" onclick="openModal(\'ExistingCreditAndPayments\', ' . $id . ')">
    <img src="images/delete.gif" width="16" height="16" border="0" alt="';
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

				$deleteLink =  . $aInt->lang( 'global', 'delete' ) . '">
</a>';
				jmp;

				if (( 0 < $credit && $payments == 0 )) {
					$deleteLink =  . '<a href="#" onclick="openModal(\'ExistingCredit\', ' . $id . ')">
    <img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'delete' ) . '">
</a>';
				}
				else {
					'<input type="submit" value="' . $aInt->lang( 'invoices', 'markpaid' ) . '" class="btn btn-success" name="markpaid" onclick="return confirm(\'' . $aInt->lang( 'invoices', 'markpaidconfirm', '1' ) . '\')" /> <input type="submit" value="' . $aInt->lang( 'invoices', 'markunpaid' ) . '" class="btn btn-default" name="markunpaid" onclick="return confirm(\'' . $aInt->lang( 'invoices', 'markunpaidconfirm', '1' ) . '\')" /> <input type="submit" value="' . $aInt->lang( 'invoices', 'markcancelled' ) . '" class="btn btn-default" name="markcancelled" onclick="return confirm(\'' . $aInt->lang( 'invoices', 'markcancelledconfirm', '1' ) . '\')" /> <input type="submit" value="' . $aInt->lang( 'invoices', 'duplicateinvoice' ) . '" class="btn btn-default" name="duplicateinvoice" onclick="return confirm(\'' . $aInt->lang( 'invoices', 'duplicateinvoiceconfirm', '1' ) . '\')" />   <input type="submit" value="' . $aInt->lang( 'invoices', 'sendreminder' ) . '" class="btn btn-default" name="paymentreminder" onclick="return confirm(\'' . $aInt->lang( 'invoices', 'sendreminderconfirm', '1' ) . '\')" /> <input type="submit" value="' . $aInt->lang( 'invoices', 'merge' ) . '" class="btn btn-default" name="merge" onclick="return confirm(\'' . $aInt->lang( 'invoices', 'mergeconfirm', '1' ) . '\')" /> <input type="submit" value="' . $aInt->lang( 'invoices', 'masspay' ) . '" class="btn btn-default" name="masspay" onclick="return confirm(\'' . $aInt->lang( 'invoices', 'masspayconfirm', '1' ) . '\')" /> <input type="submit" value="';
					$aInt->lang( 'global', 'delete' );
				}

				$tableformbuttons =  .  . '" class="btn btn-danger" name="massdelete" onclick="return confirm(\'' . $aInt->lang( 'invoices', 'massdeleteconfirm', '1' ) . '\')" />';
				$aInt->sortableTable;
				array( 'checkall', array( 'id', $aInt->lang( 'fields', 'invoicenum' ) ), array( 'date', $aInt->lang( 'fields', 'invoicedate' ) ), array( 'duedate', $aInt->lang( 'fields', 'duedate' ) ), array( 'datepaid', $aInt->lang( 'fields', 'datepaid' ) ), array( 'total', $aInt->lang( 'fields', 'total' ) ) );
				array( 'paymentmethod' );
				$aInt->lang;
			}
		}
	}

	( 'fields', 'paymentmethod' );
}

echo ( array( array(  ), array( 'status', $aInt->lang( 'fields', 'status' ) ), '', '' ), $tabledata, $tableformurl, $tableformbuttons );
echo $aInt->modal( 'ExistingCreditAndPayments', $aInt->lang( 'invoices', 'existingCreditTitle' ), $aInt->lang( 'invoices', 'existingCredit' ), array( array( 'title' => $aInt->lang( 'invoices', 'existingCreditReturn' ), 'onclick' => '$("#existingPaymentsReturnCredit").modal("show")' ), array( 'title' => $aInt->lang( 'invoices', 'existingCreditDiscard' ), 'onclick' => '$("#existingPaymentsDiscardCredit").modal("show");' ), array( 'title' => $aInt->lang( 'global', 'cancel' ) ) ) );
echo $aInt->modal( 'ExistingPaymentsReturnCredit', $aInt->lang( 'invoices', 'existingPaymentsTitle' ), $aInt->lang( 'invoices', 'existingPayments' ), array( array( 'title' => $aInt->lang( 'invoices', 'existingPaymentsOrphan' ), 'onclick' => 'doDeleteCall("returnCredit");' ), array( 'title' => $aInt->lang( 'global', 'no' ) ) ) );
echo $aInt->modal( 'ExistingPaymentsDiscardCredit', $aInt->lang( 'invoices', 'existingPaymentsTitle' ), $aInt->lang( 'invoices', 'existingPayments' ), array( array( 'title' => $aInt->lang( 'invoices', 'existingPaymentsOrphan' ), 'onclick' => 'doDeleteCall()' ), array( 'title' => $aInt->lang( 'global', 'no' ) ) ) );
echo $aInt->modal( 'ExistingCredit', $aInt->lang( 'invoices', 'existingCreditTitle' ), $aInt->lang( 'invoices', 'existingCredit' ), array( array( 'title' => $aInt->lang( 'invoices', 'existingCreditReturn' ), 'onclick' => 'doDeleteCall("returnCredit")' ), array( 'title' => $aInt->lang( 'invoices', 'existingCreditDiscard' ), 'onclick' => 'doDeleteCall()' ), array( 'title' => $aInt->lang( 'global', 'cancel' ) ) ) );
echo $aInt->modal( 'ExistingPayments', $aInt->lang( 'invoices', 'existingPaymentsTitle' ), $aInt->lang( 'invoices', 'existingPayments' ), array( array( 'title' => $aInt->lang( 'invoices', 'existingPaymentsOrphan' ), 'onclick' => 'doDeleteCall()' ), array( 'title' => $aInt->lang( 'global', 'no' ) ) ) );
$jsCode = 'var invoice = 0;
function openModal(displayModal, invoiceID) {
    /**
     * Store the invoiceID in the global JS variable
     */
    invoice = invoiceID;
    $(\'#modal\' + displayModal).modal(\'show\');
}

function doDeleteCall(credit) {
    if (credit == \'returnCredit\') {
        doDeleteReturnCredit(invoice);
    } else {
        doDelete(invoice);
    }
}';
echo $aInt->modalWithConfirmation( 'doDelete', $aInt->lang( 'invoices', 'delete' ), $whmcs->getPhpSelf(  ) . '?userid=' . $userid . '&delete=true&invoiceid=' );
echo $aInt->modalWithConfirmation( 'doDeleteReturnCredit', $aInt->lang( 'invoices', 'delete' ), $whmcs->getPhpSelf(  ) . '?userid=' . $userid . '&delete=true&returnCredit=true&invoiceid=' );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jsCode;
$aInt->display(  );
?>
