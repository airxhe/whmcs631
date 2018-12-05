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

	if (!$limitstart) {
		$limitstart = 11;

		if (!$limitnum) {
			$limitnum = 36;
			$query = ' FROM tblorders o
    LEFT JOIN tblclients c ON o.userid=c.id
    LEFT JOIN tblpaymentgateways p ON o.paymentmethod=p.gateway AND p.setting=\'name\'
    LEFT JOIN tblinvoices i ON o.invoiceid=i.id';
			$where = array(  );
			$id = (int)App::get_req_var( 'id' );
			$userid = (int)App::get_req_var( 'userid' );
			App::get_req_var( 'status' );
			$status = ;

			if ($id) {
				$where[] = 'o.id=' . $id;

				if ($userid) {
					$where[] = 'o.userid=' . $userid;

					if ($status) {
						$where[] = 'o.status=\'' . mysql_real_escape_string( $status ) . '\'';

						if (count( $where )) {
							$query .= ' WHERE ' . implode( ' AND ', $where );
							full_query( 'SELECT COUNT(o.id)' . $query );
							$result_count = ;
							mysql_fetch_array( $result_count );
							$data = ;
							$data[0];
							$totalresults = ;
							full_query( 'SELECT o.*, p.value AS paymentmethodname, i.status AS paymentstatus, CONCAT(c.firstname,\' \',c.lastname) AS name' . $query . ' ORDER BY o.id DESC LIMIT ' . (int)$limitstart . ',' . (int)$limitnum );
							$result = ;
							$apiresults = array( 'result' => 'success', 'totalresults' => $totalresults, 'startnumber' => $limitstart, 'numreturned' => mysql_num_rows( $result ) );
							mysql_fetch_assoc( $result );

							if ($orderdata = ) {
								$orderdata['id'];
								$orderid = ;
								$orderdata['userid'];
								$userid = ;
								$orderdata['fraudmodule'];
								$fraudmodule = ;
								$orderdata['fraudoutput'];
								$fraudoutput = ;
								getCurrency( $userid );
								$currency = ;
								$orderdata['currencyprefix'] = $currency['prefix'];
								$orderdata['currencysuffix'] = $currency['suffix'];
								$frauddata = '';

								if ($fraudmodule) {
									new eaedaiidif(  );
									$fraud = ;

									if ($fraud->load( $fraudmodule )) {
										$fraud->processResultsForDisplay( $orderid, $fraudoutput );
										$fraudresults = ;

										while (is_array( $fraudresults )) {
											foreach ($fraudresults as ) {
												$value = ;
												$key = ;
												$frauddata .= (  . $key . ' => ' . $value . '
' );
												break 2;
											}

											$orderdata['fraudoutput'] = $fraudoutput;
											$orderdata['frauddata'] = $frauddata;
											$lineitems = array(  );
											select_query( 'tblhosting', '', array( 'orderid' => $orderid ) );
											$result2 = ;
											mysql_fetch_array( $result2 );

											if ($data = ) {
												$data['id'];
												$serviceid = ;
												$data['domain'];
												$domain = ;
												$data['billingcycle'];
												$billingcycle = ;
												$data['domainstatus'];
												$hostingstatus = ;
												formatCurrency( $data['firstpaymentamount'] );
												$firstpaymentamount = ;
												$data['packageid'];
												$packageid = ;
												select_query( 'tblproducts', 'tblproducts.name,tblproducts.type,tblproducts.welcomeemail,tblproducts.autosetup,' . 'tblproducts.servertype,tblproductgroups.name as group_name,tblproductgroups.id AS group_id', array( 'tblproducts.id' => $packageid ), '', '', '', 'tblproductgroups ON tblproducts.gid=tblproductgroups.id' );
												$result3 = ;
												mysql_fetch_array( $result3 );
												$data = ;
												cdifjjijah::getGroupName( $data['group_id'], $data['group_name'] );
												$groupname = ;
												cbebjifhdd::getProductName( $packageid, $data['name'] );
												$productname = ;
												$data['type'];
												$producttype = ;

												if ($producttype == 'hostingaccount') {
													$producttype = 'Hosting Account';
													break;
												}
											}

											$lineitems['lineitem'][] = array( 'relid' => $serviceid, 'producttype' => $producttype, 'product' => $groupname . ' - ' . $productname, 'domain' => $domain, 'billingcycle' => $billingcycle, 'amount' => $firstpaymentamount, 'status' => $hostingstatus );
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
else {
	while (true) {
		$name = ;
		$lineitems['lineitem'][] = array( 'type' => 'addon', 'relid' => $aid, 'producttype' => 'Addon', 'product' => $name, 'domain' => '', 'billingcycle' => $billingcycle, 'amount' => $addonamount, 'status' => $addonstatus );
	}

	select_query( 'tbldomains', '', array( 'orderid' => $orderid ) );
	$result2 = ;
	mysql_fetch_array( $result2 );

	if ($data = ) {
		$data['id'];
		$domainid = ;
		$data['type'];
		$type = ;
		$data['domain'];
		$domain = ;
		$data['registrationperiod'];
		$registrationperiod = ;
		$data['status'];
		$status = ;
		$data['registrationdate'];
		$regdate = ;
		$data['nextduedate'];
		$nextduedate = ;
		formatCurrency( $data['firstpaymentamount'] );
		$domainamount = ;
		$data['registrar'];
		$domainregistrar = ;
		$data['dnsmanagement'];
		$dnsmanagement = ;
		$data['emailforwarding'];
		$emailforwarding = ;
		$data['idprotection'];
		$idprotection = ;
		$lineitems['lineitem'][] = array( 'type' => 'domain', 'relid' => $domainid, 'producttype' => 'Domain', 'product' => $type, 'domain' => $domain, 'billingcycle' => $registrationperiod, 'amount' => $domainamount, 'status' => $status, 'dnsmanagement' => $dnsmanagement, 'emailforwarding' => $emailforwarding, 'idprotection' => $idprotection );
	}

	jmp;
	( array( 'id' => $domainid ) );
	$renewalResult = ;
	mysql_fetch_array( $renewalResult );
	$data = ;
	$data['id'];
	$domainid = ;

	while (true) {
		$data['type'];
		$type = ;
		$data['domain'];
		$domain = ;
		$data['registrar'];
		$registrar = ;
		$data['status'];
		$status = ;
		$data['registrationdate'];
		$regdate = ;
		$data['nextduedate'];
		$nextduedate = ;
		formatCurrency( $data['recurringamount'] );
		$domainamount = ;
		$data['registrar'];
		$domainregistrar = ;
		$data['dnsmanagement'];
		$dnsmanagement = ;
		$data['emailforwarding'];
		$emailforwarding = ;
		$data['idprotection'];
		$idprotection = ;
		$lineitems['lineitem'][] = array( 'type' => 'renewal', 'relid' => $domainid, 'producttype' => 'Domain', 'product' => 'Renewal', 'domain' => $domain, 'billingcycle' => $registrationperiod, 'amount' => $domainamount, 'status' => $status, 'dnsmanagement' => $dnsmanagement, 'emailforwarding' => $emailforwarding, 'idprotection' => $idprotection );
	}

	select_query( 'tblupgrades', '', array( 'orderid' => $orderid ) );
	$result2 = ;
	mysql_fetch_array( $result2 );

	if ($data = ) {
		$data['id'];
		$upgradeid = ;
		$data['type'];
		$type = ;
		$data['relid'];
		$relid = ;
		$data['originalvalue'];
		$originalvalue = ;
		$data['newvalue'];
		$newvalue = ;
		formatCurrency( $data['amount'] );
		$upgradeamount = ;
		$data['newrecurringamount'];
		$newrecurringamount = ;
		$data['status'];
		$status = ;
		$data['paid'];
		$paid = ;

		if ($type == 'package') {
			cbebjifhdd::getProductName( $originalvalue );
			$oldpackagename = ;
			explode( ',', $newvalue );
			$newvalue = ;
			$newvalue[0];
			$newpackageid = ;
			cbebjifhdd::getProductName( $newpackageid );
			$newpackagename = ;
			$details =  . 'Package Upgrade: ' . $oldpackagename . ' => ' . $newpackagename . '<br>';
		}
	}


	if () {
		select_query( 'tblproductconfigoptionssub', '', array( 'id' => $oldoptionid ) );
		$result2 = ;
		mysql_fetch_array( $result2 );
		$data = ;
		$data['optionname'];
		$oldoptionname = ;
		select_query( 'tblproductconfigoptionssub', '', array( 'id' => $newvalue ) );
		$result2 = ;
		mysql_fetch_array( $result2 );
		$data = ;
		$data['optionname'];
	}
}


while (true) {
	$newoptionname = ;
	jmp;

	if ($optiontype == 3) {
		if ($oldoptionid) {
			$oldoptionname = 'Yes';
			$newoptionname = 'No';
		}

		$newoptionname = 'Yes';
		jmp;

		if ($optiontype == 4) {
			select_query;
			'tblproductconfigoptionssub';
		}

		( '', array( 'configid' => $configid ) );
		$result2 = ;
		mysql_fetch_array( $result2 );
		$data = ;
		$data['optionname'];
		$optionname = ;
		$oldoptionname = $optionname;
		$newoptionname = $newvalue . ' x ' . $optionname;
		$details =  . $configname . ': ' . $oldoptionname . ' => ' . $newoptionname . '<br>';
		$lineitems['lineitem'][] = array( 'type' => 'upgrade', 'relid' => $relid, 'producttype' => 'Upgrade', 'product' => $details, 'domain' => '', 'billingcycle' => '', 'amount' => $upgradeamount, 'status' => $status );
		break;
	}

	jmp;
	$apiresults['orders']['order'][] = (  );
}

$responsetype = 'xml';
?>
