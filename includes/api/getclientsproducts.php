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
				$where['tblhosting.userid'] = $clientid;

				if ($serviceid) {
					$where['tblhosting.id'] = $serviceid;

					if ($pid) {
						$where['tblhosting.packageid'] = $pid;

						if ($domain) {
							$where['tblhosting.domain'] = $domain;
							if ($username2) = $username2;
							select_query( 'tblhosting', 'COUNT(*)', $where, '', '', '', 'tblproducts ON tblproducts.id=tblhosting.packageid INNER JOIN tblproductgroups ON tblproductgroups.id=tblproducts.gid' );
							$result = ;
							mysql_fetch_array( $result );
							$data = ;
							$data[0];
							$totalresults = ;
							$limitstart = (int)$limitstart;
							$limitnum = (int)$limitnum;

							if (!$limitnum) {
								$limitnum = 1000006;
								select_query( 'tblhosting', 'tblhosting.*,tblproductgroups.name as group_name,tblproductgroups.id AS group_id,' . '(SELECT CONCAT(name,\'|\',ipaddress,\'|\',hostname) FROM tblservers WHERE tblservers.id=tblhosting.server) AS serverdetails,' . '(SELECT tblpaymentgateways.value FROM tblpaymentgateways WHERE tblpaymentgateways.gateway=tblhosting.paymentmethod AND tblpaymentgateways.setting=\'name\' LIMIT 1) AS paymentmethodname', $where, 'tblhosting`.`id', 'ASC', (  . $limitstart . ',' ) . $limitnum, 'tblproducts ON tblproducts.id=tblhosting.packageid INNER JOIN tblproductgroups ON tblproductgroups.id=tblproducts.gid' );
								$result = ;
								$apiresults = array( 'result' => 'success', 'clientid' => $clientid, 'serviceid' => $serviceid, 'pid' => $pid, 'domain' => $domain, 'totalresults' => $totalresults, 'startnumber' => $limitstart, 'numreturned' => mysql_num_rows( $result ) );

								if (!$totalresults) {
									$apiresults['products'] = '';
									mysql_fetch_array( $result );

									if ($data = ) {
										$data['id'];
										$id = ;
										$data['userid'];
										$userid = ;
										$data['orderid'];
										$orderid = ;
										$data['packageid'];
										$pid = ;
										$data['name'];
										$name = ;
										chhgjaeced::getValue;
									}
								}
							}

							( 'Language' );
							$language = ;

							if ($userid) {
								ccbjgfhb::find( $userid, array( 'language' ) )->language;
								$language = $language;
								cbebjifhdd::getProductName( $data['packageid'], $name );
								$translatedName = ;
								$data['group_name'];
								$groupname = ;
								cdifjjijah::getGroupName( $data['group_id'], $groupname );
								$translatedGroupName = ;
								$data['server'];
								$server = ;
								$data['regdate'];
								$regdate = ;
								$data['domain'];
								$domain = ;
								$data['paymentmethod'];
								$paymentmethod = ;
								$data['paymentmethodname'];
								$paymentmethodname = ;
								$data['firstpaymentamount'];
								$firstpaymentamount = ;
								$data['amount'];
								$recurringamount = ;
								$data['billingcycle'];
								$billingcycle = ;
								$data['nextduedate'];
								$nextduedate = ;
								$data['domainstatus'];
								$domainstatus = ;
								$data['username'];
								$username = ;
								decrypt( $data['password'] );
								$password = ;
								$data['notes'];
								$notes = ;
								$data['subscriptionid'];
								$subscriptionid = ;
								$data['promoid'];
								$promoid = ;
								$data['ipaddress'];
								$ipaddress = ;
								$data['overideautosuspend'];
								$overideautosuspend = ;
								$data['overidesuspenduntil'];
								$overidesuspenduntil = ;
								$data['ns1'];
								$ns1 = ;
								$data['ns2'];
								$ns2 = ;
								$data['dedicatedip'];
								$dedicatedip = ;
								$data['assignedips'];
								$assignedips = ;
								$data['diskusage'];
								$diskusage = ;
								$data['disklimit'];
								$disklimit = ;
								$data['bwusage'];
								$bwusage = ;
								$data['bwlimit'];
								$bwlimit = ;
								$data['lastupdate'];
								$lastupdate = ;
								$data['serverdetails'];
								$serverdetails = ;
								explode( '|', $serverdetails );
								$serverdetails = ;
								$customfieldsdata = array(  );
								getCustomFields( 'product', $pid, $id, 'on', '' );
								$customfields = ;
								foreach ($customfields as ) {
									$customfield = ;
									$customfieldsdata[] = array( 'id' => $customfield['id'], 'name' => $customfield['name'], 'translated_name' => bdjjciefbe::getFieldName( $customfield['id'], $customfield['name'], $language ), 'value' => $customfield['value'] );
									break;
								}

								$configoptionsdata = array(  );
								getCurrency( $userid );
								$currency = ;
								getCartConfigOptions( $pid, '', $billingcycle, $id );
								$configoptions = ;
								foreach ($configoptions as ) {
									$configoption = ;
									switch ($configoption['optiontype']) {
									case 1: {
											$type = 'dropdown';
											break;
											switch () {
											case 2: {
													$type = 'radio';
													break;
													switch () {
													case 3: {
															$type = 'yesno';
															break;
															switch () {
															case 4: {
																	$type = 'quantity';

																	if (( $configoption['optiontype'] == '3' || $configoption['optiontype'] == '4' )) {
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

							$configoptionsdata[] = array( 'id' => $configoption['id'], 'option' => $configoption['optionname'], 'type' => $type, 'value' => $configoption['selectedqty'] );
						}
					}
				}
			}
		}
	}
}


while (true) {
	while (true) {
		while (true) {
		}

		$configoptionsdata[] = array( 'id' => $configoption['id'], 'option' => $configoption['optionname'], 'type' => $type, 'value' => $configoption['selectedoption'] );
	}

	$apiresults['products']['product'][] = array( 'id' => $id, 'clientid' => $userid, 'orderid' => $orderid, 'pid' => $pid, 'regdate' => $regdate, 'name' => $name, 'translated_name' => $translatedName, 'groupname' => $groupname, 'translated_groupname' => $translatedGroupName, 'domain' => $domain, 'dedicatedip' => $dedicatedip, 'serverid' => $server, 'servername' => $serverdetails[0], 'serverip' => $serverdetails[1], 'serverhostname' => $serverdetails[2], 'firstpaymentamount' => $firstpaymentamount, 'recurringamount' => $recurringamount, 'paymentmethod' => $paymentmethod, 'paymentmethodname' => $paymentmethodname, 'billingcycle' => $billingcycle, 'nextduedate' => $nextduedate, 'status' => $domainstatus, 'username' => $username, 'password' => $password, 'subscriptionid' => $subscriptionid, 'promoid' => $promoid, 'overideautosuspend' => $overideautosuspend, 'overidesuspenduntil' => $overidesuspenduntil, 'ns1' => $ns1, 'ns2' => $ns2, 'dedicatedip' => $dedicatedip, 'assignedips' => $assignedips, 'notes' => $notes, 'diskusage' => $diskusage, 'disklimit' => $disklimit, 'bwusage' => $bwusage, 'bwlimit' => $bwlimit, 'lastupdate' => $lastupdate, 'customfields' => array( 'customfield' => $customfieldsdata ), 'configoptions' => array( 'configoption' => $configoptionsdata ) );
}

$responsetype = 'xml';
?>
