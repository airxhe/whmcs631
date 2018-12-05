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

	if (!function_exists( 'addClient' )) {
		require( ROOTDIR . '/includes/clientfunctions.php' );

		if (!function_exists( 'getCartConfigOptions' )) {
			require( ROOTDIR . '/includes/configoptionsfunctions.php' );

			if (!function_exists( 'getTLDPriceList' )) {
				require( ROOTDIR . '/includes/domainfunctions.php' );

				if (!function_exists( 'updateInvoiceTotal' )) {
					require( ROOTDIR . '/includes/invoicefunctions.php' );

					if (!function_exists( 'createInvoices' )) {
						require( ROOTDIR . '/includes/processinvoices.php' );

						if (!function_exists( 'calcCartTotals' )) {
							require( ROOTDIR . '/includes/orderfunctions.php' );

							if (!function_exists( 'ModuleBuildParams' )) {
								require( ROOTDIR . '/includes/modulefunctions.php' );

								if (!function_exists( 'cartPreventDuplicateProduct' )) {
									require( ROOTDIR . '/includes/cartfunctions.php' );

									if (( $promocode && !$promooverride )) {
										define( 'CLIENTAREA', true );
										iciahfajh::getInstance(  );
										$whmcs = ;
										ccbjgfhb::findOrFail( $whmcs->get_req_var( 'clientid' ) );
										$client = ;
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
	$apiresults = ;
	return null;
	$gatewaysarray = array(  );
	select_query( 'tblpaymentgateways', 'gateway', array( 'setting' => 'name' ) );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$gatewaysarray[] = $data['gateway'];
	}
}

[] = $productarray;

if (is_array( $domaintype )) {
	foreach ($domaintype as ) {
		$type = ;
		$i = ;

		if ($type) {
			if ($domainfields[$i]) {
				$domainfields[$i] = base64_decode( $domainfields[$i] );
				$domainfieldsarray[$i] = safe_unserialize( $domainfields[$i] );
				$_SESSION['cart']['domains'][] = array( 'type' => $type, 'domain' => $domain[$i], 'regperiod' => $regperiod[$i], 'dnsmanagement' => $dnsmanagement[$i], 'emailforwarding' => $emailforwarding[$i], 'idprotection' => $idprotection[$i], 'eppcode' => $eppcode[$i], 'fields' => $domainfieldsarray[$i] );
				break;
			}

			break;
		}

		break;
	}

	jmp;

	if ($domaintype) {
		if ($domainfields) {
			base64_decode( $domainfields );
			$domainfields = ;
			safe_unserialize( $domainfields );
			$domainfieldsarray = ;
			$_SESSION['cart']['domains'][] = array( 'type' => $domaintype, 'domain' => $domain, 'regperiod' => $regperiod, 'dnsmanagement' => $dnsmanagement, 'emailforwarding' => $emailforwarding, 'idprotection' => $idprotection, 'eppcode' => $eppcode, 'fields' => $domainfieldsarray );

			if ($addonid) {
				get_query_val( 'tbladdons', 'id', array( 'id' => $addonid ) );
				$addonid = ;

				if (!$addonid) {
					$apiresults = array( 'result' => 'error', 'message' => 'Addon ID invalid' );
					return null;
					get_query_val( 'tblhosting', 'id', array( 'userid' => $userid, 'id' => $serviceid ) );
					$serviceid = ;

					if (!$serviceid) {
						$apiresults = array( 'result' => 'error', 'message' => 'Service ID not owned by Client ID provided' );
						return null;
						$_SESSION['cart']['addons'][] = array( 'id' => $addonid, 'productid' => $serviceid );

						if ($addonids) {
							foreach ($addonids as ) {
								$addonid = ;
								$i = ;
								get_query_val( 'tbladdons', 'id', array( 'id' => $addonid ) );
								$addonid = ;

								if (!$addonid) {
									$apiresults = array( 'result' => 'error', 'message' => 'Addon ID invalid' );
									return null;
									get_query_val( 'tblhosting', 'id', array( 'userid' => $userid, 'id' => $serviceids[$i] ) );
									$serviceid = ;

									if (!$serviceid) {
										array( 'result' => 'error' );
										sprintf;
										'Service ID %s not owned by Client ID provided';
										(int)$serviceids[$i];
									}
								}
							}
						}
					}
				}
			}
		}

		$apiresults = array( 'message' => (  ) );
		return null;
		array( 'id' => $addonid, 'productid' => $serviceid );
		$_SESSION['cart'];
	}

	['addons'][] = ;
}

jmp;
( ['Addons'] );
$addonids = ;

if (is_array( $_SESSION['orderdetails']['Domains'] )) {
	implode;
	',';
}

( $_SESSION['orderdetails']['Domains'] );
$domainids = ;
$apiresults = array( 'result' => 'success', 'orderid' => $_SESSION['orderdetails']['OrderID'], 'productids' => $productids, 'addonids' => $addonids, 'domainids' => $domainids );

if (!$noinvoice) {
	if ($_SESSION['orderdetails']['InvoiceID']) {
		$_SESSION['orderdetails']['InvoiceID'];
	}
}

$apiresults['invoiceid'] = get_query_val( 'tblorders', 'invoiceid', array( 'id' => $_SESSION['orderdetails']['OrderID'] ) );
?>
