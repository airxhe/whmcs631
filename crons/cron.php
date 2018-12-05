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

require_once( 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\crons' . DIRECTORY_SEPARATOR . 'bootstrap.php' );
include( ROOTDIR . '/includes/clientfunctions.php' );
include( ROOTDIR . '/includes/modulefunctions.php' );
include( ROOTDIR . '/includes/gatewayfunctions.php' );
include( ROOTDIR . '/includes/ccfunctions.php' );
include( ROOTDIR . '/includes/processinvoices.php' );
include( ROOTDIR . '/includes/invoicefunctions.php' );
include( ROOTDIR . '/includes/backupfunctions.php' );
include( ROOTDIR . '/includes/ticketfunctions.php' );
include( ROOTDIR . '/includes/currencyfunctions.php' );
include( ROOTDIR . '/includes/domainfunctions.php' );
include( ROOTDIR . '/includes/registrarfunctions.php' );
define( 'IN_CRON', true );
ecbedecifh::init(  );
$cron = ;
$cron->raiseLimits(  );
eaaadiagec::release(  );

if (( ( is_array( $_SERVER['argv'] ) && in_array( 'escalations', $_SERVER['argv'] ) ) || isset( $_GET['escalations'] ) )) {
	$escalations = (true ? true : false);

	if ($escalations) {
		include( ROOTDIR . '/includes/adminfunctions.php' );
		new bbbifeeijh(  );
		$markup = ;
		$CONFIG['TicketEscalationLastRun'];
		$lastruntime = ;
		select_query( 'tblticketescalations', '', '' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$id = ;
			$data['name'];
			$name = ;
			$data['departments'];
			$departments = ;
			$data['statuses'];
			$statuses = ;
			$data['priorities'];
			$priorities = ;
			$data['timeelapsed'];
			$timeelapsed = ;
			$data['newdepartment'];
			$newdepartment = ;
			$data['newpriority'];
			$newpriority = ;
			$data['newstatus'];
			$newstatus = ;
			$data['flagto'];
			$flagto = ;
			$data['notify'];
			$notify = ;
			$data['addreply'];
			$addreply = ;
			$ticketsqry = 'SELECT * FROM tbltickets WHERE ';

			if ($departments) {
				explode( ',', $departments );
				$departments = ;
				$ticketsqry .= 'did IN (' . db_build_in_array( $departments ) . ') AND ';

				if ($statuses) {
					explode( ',', $statuses );
					$statuses = ;
					$ticketsqry .= 'status IN (' . db_build_in_array( $statuses ) . ') AND ';

					if ($priorities) {
						explode( ',', $priorities );
						$priorities = ;
						$ticketsqry .= 'urgency IN (' . db_build_in_array( $priorities ) . ') AND ';

						if ($timeelapsed) {
							date( 'Y-m-d H:i:s', mktime( date( 'H' ), date( 'i' ) - $timeelapsed, date( 's' ), date( 'm' ), date( 'd' ), date( 'Y' ) ) );
							$tickettime = ;
							date( 'Y-m-d H:i:s', strtotime(  . $lastruntime . ' - ' . $timeelapsed . ' minutes' ) );
							$ticketlasttime = ;
							$ticketsqry .=  . 'lastreply>\'' . $ticketlasttime . '\' AND lastreply<=\'' . $tickettime . '\' AND ';
							substr( $ticketsqry, 0, -5 );
							$ticketsqry = ;
							full_query( $ticketsqry );
							$result2 = ;
							mysql_fetch_array( $result2 );

							if ($data = ) {
								$data['id'];
								$ticketid = ;
								$data['tid'];
								$tickettid = ;
								$data['title'];
								$ticketsubject = ;
								$data['userid'];
								$ticketuserid = ;
								$data['name'];
								$ticketfromname = ;
								$data['did'];
								$ticketdeptid = ;
								$data['urgency'];
								$ticketpriority = ;
								$data['status'];
								$ticketstatus = ;
								$data['message'];
								$ticketmsg = ;
								$data['flag'];
								$ticketFlag = ;
								$markup->determineMarkupEditor( 'ticket_msg', $data['editor'] );
								$markupFormat = ;
								$markup->transform( $ticketmsg, $markupFormat );
								$ticketmsg = ;
								$updateqry = array(  );
								$changes = array(  );

								if (( $newdepartment && $newdepartment != $ticketdeptid )) {
									$updateqry['did'] = $newdepartment;
									$changes['Department'] = array( 'old' => getDepartmentName( $ticketdeptid ), 'new' => getDepartmentName( $newdepartment ) );

									if (( $newpriority && $newpriority != $ticketpriority )) {
										$updateqry['urgency'] = $newpriority;
										$changes['Priority'] = array( 'old' => $ticketpriority, 'new' => $newpriority );

										if (( $newstatus && $newstatus != $ticketstatus )) {
											$updateqry['status'] = $newstatus;
											$changes['Status'] = array( 'old' => $ticketstatus, 'new' => $newstatus );

											if (( $flagto && $flagto != $ticketFlag )) {
												$updateqry['flag'] = $flagto;

												if ($ticketFlag) {
													array( 'old' => (true ? getAdminName( $ticketFlag ) : 'Unassigned'), 'oldId' => 0 );

													if ($flagto) {
														$changes['Assigned To'] = array( 'new' => (true ? getAdminName( $flagto ) : 'Unassigned'), 'newId' => 0 );

														if (count( $updateqry )) {
															update_query( 'tbltickets', $updateqry, array( 'id' => $ticketid ) );

															if ($changes) {
																$changes['Who'] = 'System';
																bhifjaeide::notifyTicketChanges( $ticketid, $changes );

																if ($notify) {
																	explode( ',', $notify );
																	$notify = ;

																	if (in_array( 'all', $notify )) {
																		sendAdminMessage;
																		'Escalation Rule Notification';
																		array( 'rule_name' => $name, 'ticket_id' => $ticketid, 'ticket_tid' => $tickettid, 'client_id' => $ticketuserid, 'client_name' => get_query_val( 'tblclients', 'CONCAT(firstname,\' \',lastname)', array( 'id' => $ticketuserid ) ) );
																		getDepartmentName;

																		if ($newdepartment) {
																			array( 'ticket_department' => ( (true ? $newdepartment : $ticketdeptid) ), 'ticket_subject' => $ticketsubject );

																			if ($newpriority) {
																				array( 'ticket_priority' => (true ? $newpriority : $ticketpriority), 'ticket_message' => $ticketmsg );
																				'support';

																				if ($newdepartment) {
																					( (true ? $newdepartment : $ticketdeptid) );
																					foreach ($notify as ) {
																						$notifyid = ;

																						if (is_numeric( $notifyid )) {
																							sendAdminMessage;
																							'Escalation Rule Notification';
																							array( 'rule_name' => $name, 'ticket_id' => $ticketid, 'ticket_tid' => $tickettid, 'client_id' => $ticketuserid, 'client_name' => get_query_val( 'tblclients', 'CONCAT(firstname,\' \',lastname)', array( 'id' => $ticketuserid ) ) );
																							getDepartmentName;

																							if ($newdepartment) {
																								array( 'ticket_department' => ( (true ? $newdepartment : $ticketdeptid) ), 'ticket_subject' => $ticketsubject );

																								if ($newpriority) {
																									array( 'ticket_priority' => (true ? $newpriority : $ticketpriority), 'ticket_message' => $ticketmsg, 'ticket_status' => $ticketstatus );
																									'support';
																								}
																							}
																						}


																						if (false);
																					}


																					if (false);
																					jmp;
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


							if (false);
						}


						if (false);
						jmp;
					}
				}
			}
		}
	}
}


while (true) {
	while (true) {
		while (true) {
			while (true) {
				( '', $notifyid );
			}


			if ($addreply) {
				if (!$newstatus) {
					$newstatus = $changes;
					AddReply( $ticketid, '', '', $addreply, 'System', '', '', $newstatus, false, true, false );
					addTicketLog( $ticketid, 'Escalation Rule "' . $name . '" applied' );

					if (false);
				}


				if (false);
				jmp;

				if ((  )) {
					$cron->emailLog( ecbedecifh::getLegacyCronMessage(  ) );

					if (( $whmcs->get_config( 'CurrencyAutoUpdateExchangeRates' ) && $cron->isScheduled( 'updaterates' ) )) {
						currencyUpdateRates(  );
						$cron->logActivity( 'Done', true );

						if (( $whmcs->get_config( 'CurrencyAutoUpdateProductPrices' ) && $cron->isScheduled( 'updatepricing' ) )) {
							currencyUpdatePricing(  );
							$cron->logActivity( 'Done', true );

							if ($cron->isScheduled( 'invoices' )) {
								createInvoices(  );

								if ($cron->isScheduled( 'latefees' )) {
									InvoicesAddLateFee(  );

									if ($cron->isScheduled( 'ccprocessing' )) {
										ccProcessing(  );

										if ($cron->isScheduled( 'invoicereminders' )) {
											if ($CONFIG['SendReminder'] == 'on') {
												$reminders = '';

												if ($CONFIG['SendInvoiceReminderDays']) {
													$invoiceids = array(  );
													date( 'Ymd', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) + $CONFIG['SendInvoiceReminderDays'], date( 'Y' ) ) );
													$invoicedateyear = ;
													$query = 'SELECT * FROM tblinvoices WHERE duedate=\'' . $invoicedateyear . '\' AND `status`=\'Unpaid\'';
													full_query( $query );
													$result = ;
													mysql_fetch_array( $result );

													if ($data = ) {
														$data['id'];
														$id = ;
														sendMessage( 'Invoice Payment Reminder', $id );
														run_hook( 'InvoicePaymentReminder', array( 'invoiceid' => $id, 'type' => 'reminder' ) );
														$invoiceids[] = $id;

														if (false);
													}


													if (false);
													jmp;
													(  );
													$cron->emailLogSub( 'SUCCESS: ' . $loginfo, true );
													++$i;

													if (false);
												}


												if (false);
												jmp;
											}
										}
									}
								}
							}
						}
					}
				}
			}

			(  . $loginfo, true );
		}

		$cron->logActivity( 'Processed ' . $i . ' Cancellations', true );
		$cron->emailLog( $i . ' Cancellation Requests Processed' );

		if (( $CONFIG['AutoSuspension'] && $cron->isScheduled( 'suspensions' ) )) {
			update_query( 'tblhosting', array( 'overideautosuspend' => '' ), 'overideautosuspend=\'1\' AND overidesuspenduntil<\'' . date( 'Y-m-d' ) . '\' AND overidesuspenduntil!=\'0000-00-00\'' );
			$i = 38;
			date( 'Ymd', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) - $CONFIG['AutoSuspensionDays'], date( 'Y' ) ) );
			$suspenddate = ;
			$query3 =  . 'SELECT * FROM tblhosting WHERE domainstatus = \'Active\' AND billingcycle != \'Free Account\' AND billingcycle != \'Free\' AND billingcycle != \'One Time\' AND overideautosuspend != \'1\' AND nextduedate <= \'' . $suspenddate . '\' ORDER BY domain ASC';
			full_query( $query3 );
			$result3 = ;
			mysql_fetch_array( $result3 );

			if ($data = ) {
				$data['id'];
				$id = ;
				$data['userid'];
				$userid = ;
				$data['domain'];
				$domain = ;
				$data['packageid'];
				$packageid = ;
				select_query( 'tblclients', '', array( 'id' => $userid ) );
				$result2 = ;
				mysql_fetch_array( $result2 );
				$data2 = ;
				$data2['firstname'];
				$firstname = ;
				$data2['lastname'];
				$lastname = ;
				$data2['groupid'];
				$groupid = ;
				select_query( 'tblproducts', 'name,servertype', array( 'id' => $packageid ) );
				$result2 = ;
				mysql_fetch_array( $result2 );
				$data2 = ;
				$data2['name'];
				$prodname = ;
				$data2['servertype'];
				$module = ;
				select_query( 'tblclientgroups', 'susptermexempt', array( 'id' => $groupid ) );
				$result2 = ;
				mysql_fetch_array( $result2 );
				$data2 = ;
				$data2['susptermexempt'];
				$susptermexempt = ;

				if (!$susptermexempt) {
					$serverresult = 'No Module';
					logActivity(  . 'Cron Job: Suspending Service - Service ID: ' . $id );

					if ($module) {
						ServerSuspendAccount( $id );
						$serverresult = ;

						if ($domain) {
							$domain = ' - ' . $domain;
							$loginfo = $prodname . $domain . ' - ' . $firstname . ' ' . $lastname . ' (Service ID: ' . $id . ' - User ID: ' . $userid . ')';

							if ($serverresult == 'success') {
								sendMessage( 'Service Suspension Notification', $id );
								$cron->emailLogSub( 'SUCCESS: ' . $loginfo, true );
								++$i;

								if (false);
							}


							if (false);
							jmp;
							( 'ERROR: Manual Terminate Required - ' . $moduleresult . ' - ' . $loginfo, true );

							if (false);
						}


						if (false);
						jmp;
					}
				}


				if (false);
			}

			$bwoveragedesc =  . $bwunits;
			$bwoverageamount = $bwoverage * $overagesbwprice;
			insert_query( 'tblbillableitems', array( 'userid' => $userid, 'description' => $bwoveragedesc, 'amount' => $bwoverageamount, 'recur' => 0, 'recurcycle' => 0, 'recurfor' => 0, 'invoiceaction' => $invoiceaction, 'duedate' => date( 'Y-m-d' ) ) );

			if (false);
		}


		if (false);
		jmp;
		$userid = ;
		full_query( 'SELECT (SELECT COUNT(*) FROM tblhosting WHERE userid=tblclients.id AND domainstatus IN (\'Active\',\'Suspended\'))+(SELECT COUNT(*) FROM tblhostingaddons WHERE hostingid IN (SELECT id FROM tblhosting WHERE userid=tblclients.id) AND status IN (\'Active\',\'Suspended\'))+(SELECT COUNT(*) FROM tbldomains WHERE userid=tblclients.id AND status IN (\'Active\')) AS activeservices FROM tblclients WHERE tblclients.id=' . (int)$userid . ' LIMIT 1' );
		$result2 = ;
		mysql_fetch_array( $result2 );
		$data = ;
		$data[0];
		$totalactivecount = ;

		if ($totalactivecount == 0) {
			update_query( 'tblclients', array( 'status' => 'Inactive' ), array( 'id' => $userid ) );

			if (false);
		}
	}

	full_query( 'SELECT tblhosting.userid FROM tblhosting INNER JOIN tblclients ON tblclients.id=tblhosting.userid WHERE tblclients.status=\'Inactive\' AND tblclients.overrideautoclose=\'0\' AND tblhosting.domainstatus IN (\'Active\',\'Suspended\')' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['userid'];
		$userid = ;
		update_query( 'tblclients', array( 'status' => 'Active' ), array( 'id' => $userid ) );

		if (false);
	}


	if (false);
	jmp;
	( array( 'status' => 'Active' ), array( 'id' => $userid ) );
}

full_query( 'SELECT tbldomains.userid FROM tbldomains INNER JOIN tblclients ON tblclients.id=tbldomains.userid WHERE tblclients.status=\'Inactive\' AND tblclients.overrideautoclose=\'0\' AND tbldomains.status IN (\'Active\',\'Pending-Transfer\')' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['userid'];
	$userid = ;
	update_query( 'tblclients', array( 'status' => 'Active' ), array( 'id' => $userid ) );

	if (false);
}


if (false);
jmp;
$systemStats = array( 'productModules' => $productModules, 'domainModules' => $domainModules, 'invoiceModules' => $invoiceModules, 'addonModules' => $addonModules, 'domainLookupProvider' => $domainLookupProvider, 'appLinks' => $appLinks, 'languages' => $languages );
$whmcs->set_config( 'SystemStatsCache', json_encode( $systemStats ) );

if (( ( $CONFIG['DailyEmailBackup'] || $CONFIG['FTPBackupHostname'] ) && $cron->isScheduled( 'backups' ) )) {
	if (( ( $CONFIG['DailyEmailBackup'] || $CONFIG['FTPBackupHostname'] ) && class_exists( 'ZipArchive' ) )) {
		$db_name = '';
		$whmcs->getApplicationConfig(  );
		$whmcsAppConfig = ;
		$whmcsAppConfig['db_name'];
		$db_name = ;
		tempnam( sys_get_temp_dir(  ), 'zip' );
		$zipFile = ;
		tempnam( sys_get_temp_dir(  ), 'sql' );
		$tempFilename = ;
		$subject = 'WHMCS Database Backup';
		$cron->logActivity( 'Starting Backup Generation' );
		$whmcs->getDatabaseObj(  );
		$databaseConnection = ;
		new cbfjfjbgih( $databaseConnection );
		$database = ;
		$database->dumpTo( $tempFilename );
		new ZipArchive(  );
		$zip = ;
		$zip->open( $zipFile, CREATE );
		$res = ;

		if ($res === true) {
			$filename =  . $db_name . '.sql';

			if ($zip->addFile( $tempFilename, $filename )) {
				$zip->setArchiveComment( 'WHMCS Generated mySQL Backup' );
				$zip->close(  );
				$cron->logActivity;
			}
		}

		( 'Backup Generation Completed' );

		if (( $CONFIG['DailyEmailBackup'] && file_exists( $zipFile ) )) {
			new dbifcahebh( $CONFIG['SystemEmailsFromName'], $CONFIG['SystemEmailsFromEmail'] );
			$mail = ;
			$mail->Subject = $subject;
			$mail->Body = 'Backup File Attached';
			$mail->AddAddress( $CONFIG['DailyEmailBackup'] );
			$mail->AddAttachment( $zipFile, $db_name . '_backup_' . date( 'Ymd_His' ) . '.zip' );

			if ($mail->Send(  )) {
			}
		}

		$cron->logActivity( 'Email Backup - Sent Successfully', true );

		if (false);
		jmp;
		$cron->logActivity( 'Email Backup - Sending Failed - ' . $mail->ErrorInfo, true );
		$mail->clearAllRecipients(  );

		if (( $CONFIG['FTPBackupHostname'] && file_exists( $zipFile ) )) {
			$CONFIG['FTPBackupHostname'];
			$ftp_server = ;
			$CONFIG['FTPBackupPort'];
			$ftp_port = ;
			$CONFIG['FTPBackupUsername'];
			$ftp_user = ;
			decrypt( $CONFIG['FTPBackupPassword'] );
			$ftp_pass = ;
			$CONFIG['FTPBackupDestination'] . $db_name . '_backup_';
		}

		$ftp_filename =  . date( 'Ymd_His' ) . '.zip';

		if (!$ftp_port) {
			$ftp_port = '21';
			str_replace( 'ftp://', '', $ftp_server );
			$ftp_server = ;
		}
	}
}

ftp_connect( $ftp_server, $ftp_port );
( $ftpconnection =  || $error =  . 'Couldn\'t connect to ' . $ftp_server );

if (!ftp_login( $ftpconnection, $ftp_user, $ftp_pass )) {
	$cron->logActivity( 'FTP Backup - Login Failed', true );
	exit(  );

	if ($CONFIG['FTPPassiveMode']) {
		ftp_pasv( $ftpconnection, true );
		ftp_put( $ftpconnection, $ftp_filename, $zipFile, FTP_BINARY );
		$upload = ;

		if (!$upload) {
			$cron->logActivity( 'FTP Backup - Uploading Failed', true );
			exit(  );
			fclose( $tmp );
			ftp_close( $ftpconnection );
			$cron->logActivity( 'FTP Backup - Completed Successfully', true );

			if (false);
			jmp;
			$cron->logActivity( 'An unknown error occurred adding the generated sql to the archive.', true );

			if (false);
			jmp;
			$cron->logActivity;
				. 'Backup Generation Failed. Error Code: ' . $res;
		}
	}

	( true );

	if (false);
	jmp;
	phpmailerException {
		$cron->logActivity( (  . 'Database Backup Sending Failed - PHPMailer Exception - ' . $e->getMessage(  ) . ' (Subject: ' . $subject . ')' ), true );

		if (false);
		jmp;
		Exception {
			$cron->logActivity( 'An error occurred generating the backup archive. The error is: ' . $e->getMessage(  ), true );
			$cron->logActivity( 'Done', true );
			unlink( $tempFilename );
			unlink( $zipFile );

			if (false);
			jmp;

			if (( ( $CONFIG['DailyEmailBackup'] || $CONFIG['FTPBackupHostname'] ) && !class_exists( 'ZipArchive' ) )) {
				$cron->logActivity( 'Database backup unavailable due to missing required zip extension', true );

				if (false);
				jmp;
				(  && !( $CONFIG['DailyEmailBackup'] && $CONFIG['FTPBackupHostname'] ) );
				$cron->isInDoOnlyMode;
			}
		}


		if (false);
	}


	if (false);
}

(  );
(  );
?>
