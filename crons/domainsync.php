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

if (!function_exists( 'getRegistrarConfigOptions' )) {
	require_once( ROOTDIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'registrarfunctions.php' );
	ecbedecifh::init(  );
	$cron = ;
	$cron->raiseLimits(  );
	eaaadiagec::release(  );
	$cronreport = 'Domain Synchronisation Cron Report for ' . date( 'd-m-Y H:i:s' ) . '<br />
<br />
';

	if (!$CONFIG['DomainSyncEnabled']) {
		logActivity( 'Domain Sync Cron: Disabled. Run Aborted.' );
		exit(  );
		$registrarconfigops = array(  );
		logActivity( 'Domain Sync Cron: Starting' );
		$transfersreport = '';
		select_query( 'tbldomains', 'id,domain,registrar,registrationperiod,status,dnsmanagement,emailforwarding,idprotection', 'registrar!=\'\' AND status=\'Pending Transfer\'', 'id', 'ASC' );
		$result = ;
		$curlerrorregistrars = array(  );

		while (true) {
			mysql_fetch_array( $result );
			if ($data = ) = ;
			loadRegistrarModule( $registrar );

			if (( function_exists( $registrar . '_TransferSync' ) && !in_array( $registrar, $curlerrorregistrars ) )) {
				$transfersreport .= ' - ' . $domain . ': ';
				$updateqry = array(  );
				call_user_func( $registrar . '_TransferSync', $params );
				$response = ;

				if (!$response['error']) {
					if (( $response['active'] || $response['completed'] )) {
						$transfersreport .= 'Transfer Completed';
						$updateqry['status'] = 'Active';
						if (( ( !$response['expirydate'] && function_exists( $registrar . '_Sync' ) ) && !in_array( $registrar, $curlerrorregistrars ) )) = ;
						break;
					}

					$updateqry['status'] = 'Cancelled';
					$response['reason'];
					$failurereason = ;

					if (!$failurereason) {
						$_LANG['domaintrffailreasonunavailable'];
						$failurereason = ;
						sendMessage( 'Domain Transfer Failed', $domainid, array( 'domain_transfer_failure_reason' => $failurereason ) );
						break;
					}
				}


				if ( == 'Active') {
					sendMessage( 'Domain Transfer Completed', $domainid );
					break;
				}
			}
		}
	}
}


while (true) {
	else {
		$data['domain'];
		$domain = ;
		$data['registrar'];
		$registrar = ;
		$data['expirydate'];
		$expirydate = ;
		$data['nextduedate'];
		$nextduedate = ;
		$data['status'];
		$status = ;
		explode( '.', $domain, 2 );
		$domainparts = ;

		if (is_array( $registrarconfigops[$registrar] )) {
			$registrarconfigops[$registrar] = getRegistrarConfigOptions( $registrar );
			$params = (true ? $registrarconfigops[$registrar] : );
			$params['domainid'] = $domainid;
			$params['domain'] = $domain;
			$params['sld'] = $domainparts[0];
			$params['tld'] = $domainparts[1];
			$params['registrar'] = $registrar;
			$params['status'] = $status;
			loadRegistrarModule( $registrar );
			$updateqry = array(  );
			$updateqry['synced'] = '1';
			$synceditems = array(  );
			$response = ;

			if (( function_exists( $registrar . '_Sync' ) && !in_array( $registrar, $curlerrorregistrars ) )) {
				call_user_func( $registrar . '_Sync', $params );
				$response = ;

				if (!$response['error']) {
					if (( $response['active'] && $status != 'Active' )) {
						$updateqry['status'] = 'Active';
						$synceditems[] = 'Status Changed to Active';

						if (( $response['expired'] && $status != 'Expired' )) {
							$updateqry['status'] = 'Expired';
							$synceditems[] = 'Status Changed to Expired';

							if (( $response['cancelled'] && $status == 'Active' )) {
								$updateqry['status'] = 'Cancelled';
								$synceditems[] = 'Status Changed to Cancelled';
								(  && $response['expirydate'] );
							}
						}
					}
				}

				$expirydate != $response['expirydate'];

				if ((bool)) {
					$updateqry['expirydate'] = $response['expirydate'];
					$synceditems[] = 'Expiry Date updated to ' . fromMySQLDate( $response['expirydate'] );

					if (( $CONFIG['DomainSyncNextDueDate'] && $response['expirydate'] )) {
						$response['expirydate'];
						$newexpirydate = ;

						if ($CONFIG['DomainSyncNextDueDateDays']) {
							explode( '-', $newexpirydate );
							$newexpirydate = ;
							date( 'Y-m-d', mktime( 0, 0, 0, $newexpirydate[1], $newexpirydate[2] - $CONFIG['DomainSyncNextDueDateDays'], $newexpirydate[0] ) );
							$newexpirydate = ;

							if ($newexpirydate != $nextduedate) {
								$updateqry['nextinvoicedate'] = $newexpirydate;
								$updateqry['nextduedate'] = ;
								$synceditems[] = 'Next Due Date updated to ' . fromMySQLDate( $newexpirydate );

								if ($CONFIG['DomainSyncNotifyOnly']) {
									$updateqry = array( 'synced' => '1' );
									update_query( 'tbldomains', $updateqry, array( 'id' => $domainid ) );
									$cronreport .= ' - ' . $domain . ': ';

									if (!count( $response )) {
										in_array;
										$registrar;
									}
								}
							}
						}
					}
				}
			}
		}


		if (( $curlerrorregistrars )) {
			$cronreport .= 'Sync Skipped Due to cURL Error';
		}

		( ( $response['error'], 0, 4 ) ) == 'curl';

		if ((bool)) {
			if (!in_array( $registrar, $curlerrorregistrars )) {
				$curlerrorregistrars[] = $registrar;
				$cronreport .= 'Error: ' . $response['error'];
			}
		}

		$response['active'];

		if ((bool)) {
			sendMessage;
			'Domain Transfer Completed';
			$domainid;
		}
	}

	(  );

	if (count( $synceditems )) {
		if ($CONFIG['DomainSyncNotifyOnly']) {
			(true ? 'Out of Sync ' : 'Updated ');
		}

		implode( ', ', $synceditems );
	}

	$cronreport .= (true ?  .  : 'In Sync');
	$cronreport .= '<br />
';
}

logActivity( 'Domain Sync Cron: Completed' );
sendAdminNotification( 'system', 'WHMCS Domain Synchronisation Cron Report', $cronreport );
?>
