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

if (!defined( 'WHMCS' )) {
	exit( 'This file cannot be accessed directly' );

	if (!function_exists( 'getCustomFields' )) {
		require( ROOTDIR . '/includes/customfieldfunctions.php' );

		if (!function_exists( 'getCartConfigOptions' )) {
			require( ROOTDIR . '/includes/configoptionsfunctions.php' );
			$where = array(  );

			if ($clientid) {
				$where['tbldomains.userid'] = $clientid;

				if ($domainid) {
					$where['tbldomains.id'] = $domainid;

					if ($domain) {
						$where['tbldomains.domain'] = $domain;
						select_query( 'tbldomains', 'COUNT(*)', $where );
						$result = ;
						mysql_fetch_array( $result );
						$data = ;
						$data[0];
						$totalresults = ;
						$limitstart = (int)$limitstart;
						$limitnum = (int)$limitnum;

						if (!$limitnum) {
							$limitnum = 29;
							select_query( 'tbldomains', 'tbldomains.*,(SELECT tblpaymentgateways.value FROM tblpaymentgateways WHERE tblpaymentgateways.gateway=tbldomains.paymentmethod AND tblpaymentgateways.setting=\'name\' LIMIT 1) AS paymentmethodname', $where, 'tbldomains`.`id', 'ASC', (  . $limitstart . ',' ) . $limitnum );
							$result = ;
							$apiresults = array( 'result' => 'success', 'clientid' => $clientid, 'domainid' => $domainid, 'totalresults' => $totalresults, 'startnumber' => $limitstart, 'numreturned' => mysql_num_rows( $result ) );

							if (!$totalresults) {
								$apiresults['domains'] = '';
								mysql_fetch_array( $result );

								if ($data = ) {
									$data['id'];
									$id = ;
									$data['userid'];
									$userid = ;
									$data['orderid'];
									$orderid = ;
									$data['type'];
									$type = ;
								}
							}
						}
					}
				}
			}
		}
	}
}

$data['registrationdate'];
$registrationdate = ;
$data['domain'];
$domain = ;
$data['firstpaymentamount'];
$firstpaymentamount = ;
$data['recurringamount'];
$recurringamount = ;
$data['registrar'];
$registrar = ;
$data['registrationperiod'];
$registrationperiod = ;
$data['expirydate'];
$expirydate = ;
$data['nextduedate'];
$nextduedate = ;
$data['status'];
$status = ;
$data['subscriptionid'];
$subscriptionid = ;
$data['promoid'];
$promoid = ;
$data['additionalnotes'];
$additionalnotes = ;
$data['paymentmethod'];
$paymentmethod = ;
$data['paymentmethodname'];
$paymentmethodname = ;
$data['dnsmanagement'];
$dnsmanagement = ;
$data['emailforwarding'];
$emailforwarding = ;
$data['idprotection'];
$idprotection = ;
$data['donotrenew'];
$donotrenew = ;
$nameservers = array(  );
if ($getnameservers) = $registrationperiod;

while (true) {
	$params['registrar'] = $registrar;
	RegGetNameservers( $params );
	$nameservers = ;
	$nameservers['nameservers'] = true;
	$apiresults['domains']['domain'][] = array_merge( array( 'id' => $id, 'userid' => $userid, 'orderid' => $orderid, 'regtype' => $type, 'domainname' => $domain, 'registrar' => $registrar, 'regperiod' => $registrationperiod, 'firstpaymentamount' => $firstpaymentamount, 'recurringamount' => $recurringamount, 'paymentmethod' => $paymentmethod, 'paymentmethodname' => $paymentmethodname, 'regdate' => $registrationdate, 'expirydate' => $expirydate, 'nextduedate' => $nextduedate, 'status' => $status, 'subscriptionid' => $subscriptionid, 'promoid' => $promoid, 'dnsmanagement' => $dnsmanagement, 'emailforwarding' => $emailforwarding, 'idprotection' => $idprotection, 'donotrenew' => $donotrenew, 'notes' => $additionalnotes ), $nameservers );
}

$responsetype = 'xml';
?>
