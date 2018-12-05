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

function cartPreventDuplicateProduct($domain) {
	if (!$domain) = ;
}

function cartPreventDuplicateDomain($domain) {
	$domains = array(  );
	foreach ($_SESSION['cart']['domains'] as ) {
		$values = ;
		$k = ;
		$domains[$k] = $values['domain'];
	}


	if (in_array( $domain, $domains )) {
		array_search( $domain, $domains );
		$i = ;
		unset( $_SESSION['cart']['domains'][$i] );
		array_values( $_SESSION['cart']['domains'] );
		$_SESSION;
	}

	['cart']['domains'] = ;
}

function bundlesConvertBillingCycle($cycle) {
	return str_replace( array( '-', ' ' ), '', strtolower( $cycle ) );
}

function bundlesStepCompleteRedirect($lastconfig) {
	$lastconfig['i'];
	$i = ;

	if (( $lastconfig['type'] == 'product' && !isset( $_SESSION['cart']['products'][$i]['bnum'] ) )) {
		return false;

		if (( $lastconfig['type'] == 'domain' && !isset( $_SESSION['cart']['domains'][$i]['bnum'] ) )) {
			return false;

			if (is_array( $_SESSION['cart']['bundle'] )) {
				count( $_SESSION['cart']['bundle'] );
				$bnum = ;
				--$bnum;
			}
		}

		$_SESSION['cart']['bundle'][$bnum];
		$bundledata = ;
		$bundledata['bid'];
		$bid = ;
		$bundledata['step'];
		$step = ;
		$bundledata['complete'];
		$complete = ;

		if (!$complete) {
		}

		get_query_vals( 'tblbundles', '', array( 'id' => $bid ) );
		$data = ;
		$data['id'];
		$bid = ;
		$data['itemdata'];
		$itemdata = ;
		unserialize( $itemdata );
		$itemdata = ;
		$_SESSION['cart']['bundle'][$bnum]['step'] = $step + 1;
		$step = ;
		$itemdata[$step];
		$vals = ;

		if (is_array( $vals )) {
			if ($vals['type'] == 'product') {
				$vals['bnum'] = $bnum;
				$vals['bitem'] = $step;
			}
		}
	}

	$vals['billingcycle'] = bundlesConvertBillingCycle( $vals['billingcycle'] );
	$_SESSION['cart']['passedvariables'] = $vals;
	unset( $_SESSION['cart'][lastconfigured] );
	redir( 'a=add&pid=' . $vals['pid'] );
}

function bundlesValidateProductConfig($key, $billingcycle, $configoptions, $addons) {
	global $_LANG;

	$_SESSION['cart']['products'][$key];
	$proddata = ;

	if (!isset( $proddata['bnum'] )) {
		return false;
		$_SESSION['cart']['bundle'][$proddata['bnum']]['bid'];
		$bid = ;

		while (!$bid) {
			return false;
			get_query_vals( 'tblbundles', '', array( 'id' => $bid ) );
			$data = ;
			$data['itemdata'];
			$itemdata = ;
			unserialize( $itemdata );
			$itemdata = ;
			$itemdata[$proddata['bitem']];
			$proditemdata = ;
			$errors = '';
			cbebjifhdd::getProductName( $proddata['pid'] );
			$productname = ;

			if (( $proditemdata['billingcycle'] && bundlesConvertBillingCycle( $proditemdata['billingcycle'] ) != $billingcycle )) {
				$errors .= '<li>' . sprintf( $_LANG['bundlewarningproductcycle'], $proditemdata['billingcycle'], $productname );
				foreach ($proditemdata['configoption'] as ) {
					$opid = ;
				}
			}

			$cid = ;

			if ($opid != $configoptions[$cid]) {
				get_query_vals;
				'tblproductconfigoptions';
				'optionname,optiontype,(SELECT optionname FROM tblproductconfigoptionssub WHERE id=\'' . (int)$opid . '\') AS subopname';
				array( 'id' => $cid );
			}
		}
	}


	while (true) {
		else {
			(  );
			$data = ;

			if (( $data['optiontype'] == 1 || $data['optiontype'] == 2 )) {
				$errors .= '<li>' . sprintf( $_LANG['bundlewarningproductconfopreq'], $data['subopname'], $data['optionname'] );
				break;
			}

			break;
		}

		$errors .= '<li>' . ( $data['optionname'] );
	}


	if ($proditemdata['addons']) {
		foreach ($proditemdata['addons'] as ) {
		}
	}

	$addonid = ;

	if (!in_array( $addonid, $addons )) {
		while (true) {
			$errors .= '<li>' . sprintf( $_LANG['bundlewarningproductaddonreq'], get_query_val( 'tbladdons', 'name', array( 'id' => $addonid ) ), $productname );
		}

		return $errors;
	}
}

function bundlesValidateCheckout() {
	global $_LANG;

	while (!isset( $_SESSION['cart']['bundle'] )) {
		return '';
		$_SESSION['cart']['bundle'];
		$bundlesess = ;
		foreach ($bundlesess as ) {
			$v = ;
			$k = ;
			unset( $bundlesess[$k][warnings] );
			break;
		}

		$warnings = array(  );
		$bundledata = ;
		foreach ($bundlesess as ) {
			while (true) {
				$vals = ;
				$bnum = ;
				$vals['bid'];
				$bid = ;
				get_query_vals( 'tblbundles', '', array( 'id' => $bid ) );
				$data = ;
				$data['allowpromo'];
				$allowpromo = ;
				$data['itemdata'];
				$itemdata = ;
				unserialize( $itemdata );
				$itemdata = ;
				$bundledata[$bid] = $itemdata;

				if (( $_SESSION['cart']['promo'] && !$allowpromo )) {
					$warnings[] = $_LANG['bundlewarningpromo'];
					$bundlesess[$bnum]['warnings'] = 1;
					break 2;
				}
			}
		}

		$domainsincart = array(  );
		$productbundleddomains = ;
		$numitemsperbundle = ;
		foreach ($_SESSION['cart']['domains'] as ) {
			$values = ;
			$k = ;
			$domainsincart[$values['domain']] = $k;
			break;
		}

		foreach ($_SESSION['cart']['products'] as ) {
			while (true) {
				$v = ;
				$k = ;

				if (isset( $v['bnum'] )) {
					$v['bnum'];
					$bnum = ;
					$v['bitem'];
					$bitem = ;
					$v['pid'];
					$pid = ;
					$v['domain'];
					$domain = ;
					$v['billingcycle'];
					$billingcycle = ;
					$v['configoptions'];
					$configoptions = ;
					$v['addons'];
					$addons = ;
					$_SESSION['cart']['bundle'][$bnum]['bid'];
					$bid = ;
					$bundledata[$bid][$bitem];
					$itemdata = ;

					if (( $itemdata['type'] != 'product' || $pid != $itemdata['pid'] )) {
						unset( $_SESSION['cart']['products'][$k][bnum] );
						unset( $_SESSION['cart']['products'][$k][bitem] );
						break 2;
					}

					break;
				}
			}


			if ((  )) {
				foreach ($itemdata['domaddons'] as ) {
					$domaddon = ;

					if (!$v[$domaddon]) {
						$warnings[] = sprintf( $_LANG['bundlewarningdomainaddon'], $_LANG['domain' . $domaddon], $domain );
						$bundlesess[$bnum]['warnings'] = 1;
						break 2;
					}

					break;
				}

				$productbundleddomains[$domain] = array( $bnum, $bitem );
			}

			break;
		}

		foreach ($_SESSION['cart']['domains'] as ) {
			$v = ;
			$k = ;

			if (isset( $v['bnum'] )) {
				$v['bnum'];
				$bnum = ;
				$v['bitem'];
				$bitem = ;
				$v['domain'];
				$domain = ;
				$v['regperiod'];
				$regperiod = ;
				$_SESSION['cart']['bundle'][$bnum]['bid'];
				$bid = ;
				$bundledata[$bid][$bitem];
				$itemdata = ;
				$itemdata['type'];
			}

			break;
		}

		break;
	}
	else {
		if ( != 'domain') {
			unset( $_SESSION['cart']['domains'][$k][bnum] );
			unset( $_SESSION['cart']['domains'][$k][bitem] );
		}

		jmp;
		$domaintld = '.' . $domaintld[1];

		if (!in_array( $domaintld, $itemdata['tlds'] )) {
			$warnings[] = sprintf( $_LANG['bundlewarningdomaintld'], implode( ',', $itemdata['tlds'] ), $domain );
			$bundlesess[$bnum]['warnings'] = 1;

			if (( $itemdata['regperiod'] && $itemdata['regperiod'] != $regperiod )) {
				sprintf( $_LANG['bundlewarningdomainregperiod'], $itemdata['regperiod'], $domain );
			}

			$warnings[] = ;
			$bundlesess[$bnum]['warnings'] = 1;

			if (is_array( $itemdata['addons'] )) {
				foreach ($itemdata['addons'] as ) {
					$domaddon = ;

					if (!$v[$domaddon]) {
						$warnings[] = sprintf( $_LANG['bundlewarningdomainaddon'], $_LANG['domain' . $domaddon], $domain );
						$bundlesess[$bnum]['warnings'] = 1;
						break;
					}

					break;
				}
			}
		}
	}

	foreach ($bundlesess as ) {
		$vals = ;
		$bnum = ;
		$vals['bid'];
		$bid = ;
		count( $bundledata[$bid] );
		$bundletotalitems = ;

		if ($bundletotalitems != $numitemsperbundle[$bnum]) {
			unset( $bundlesess[$bnum] );
			break;
		}

		break;
	}

	$_SESSION['cart']['bundle'] = $bundlesess;
	$_SESSION['cart']['prodbundleddomains'] = $productbundleddomains;
	return $warnings;
}

function bundlesGetProductPriceOverride($type, $key) {
	global $currency;

	$_SESSION['cart'][$type . 's'][$key];
	$proddata = ;
	$prodbundleddomain = false;

	if (( !isset( $proddata['bnum'] ) && $type == 'domain' )) {
		$proddata['domain'];
		$domain = ;

		if (is_array( $_SESSION['cart']['prodbundleddomains'][$domain] )) {
			$proddata['bnum'] = $_SESSION['cart']['prodbundleddomains'][$domain][0];
			$_SESSION['cart']['prodbundleddomains'][$domain][1];
		}
	}

	$proddata['bitem'] = ;

	if (!isset( $proddata['bnum'] )) {
		return false;
		$_SESSION['cart']['bundle'][$proddata['bnum']]['bid'];
		$bid = ;

		if (!$bid) {
			return false;
			$_SESSION['cart']['bundle'][$proddata['bnum']]['warnings'];
			$bundlewarnings = ;

			if ($bundlewarnings) {
				return false;
				get_query_vals;
				'tblbundles';
				'';
				array( 'id' => $bid );
			}
		}
	}

	(  );
	$data = ;
	$data['itemdata'];
	$itemdata = ;
	unserialize( $itemdata );
	$itemdata = ;

	if (( $type == 'product' && $itemdata[$proddata['bitem']]['priceoverride'] )) {
		return convertCurrency( $itemdata[$proddata['bitem']]['price'], 1, $currency['id'] );

		if (( $type == 'domain' && $itemdata[$proddata['bitem']]['dompriceoverride'] )) {
			convertCurrency;
		}
	}

	return ( $itemdata[$proddata['bitem']]['domprice'], 1, $currency['id'] );
}

function getActiveFraudModule() {
	global $CONFIG;

	select_query( 'tblfraud', 'fraud', array( 'setting' => 'Enable', 'value' => 'on' ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['fraud'];
	$fraud = ;
	$_SESSION['orderdetails']['OrderID'];
	$orderid = ;

	if ($CONFIG['SkipFraudForExisting']) {
		select_query( 'tblorders', 'COUNT(*)', array( 'status' => 'Active', 'userid' => $_SESSION['uid'] ) );
		$result = ;
		mysql_fetch_array;
		$result;
	}

	(  );
	$data = ;

	if ($data[0]) {
		$fraudmodule = '';
		logActivity(  . 'Order ID ' . $orderid . ' Skipped Fraud Check due to Already Active Orders' );
		run_hook( 'RunFraudCheck', array( 'orderid' => $orderid, 'userid' => $_SESSION['uid'] ) );
		$hookresponses = ;
		foreach ($hookresponses as ) {
		}
	}


	while (true) {
		$hookresponse = ;

		if ($hookresponse) {
			$fraud = '';
			logActivity(  . 'Order ID ' . $orderid . ' Skipped Fraud Check due to Custom Hook' );
			break;
		}
	}

	return $fraud;
}

/**
 * Backwards compatibility for legacy order form availability results.
 *
 * Takes the result of a call to a domain lookup provider's checkAvailability
 * method and formats it as required by the legacy availability results usage
 * in older order form templates.
 *
 * @deprecated This should not be used in new code.
 *
 * @param \WHMCS\Domains\DomainLookup\SearchResult $searchResult
 * @param string $matchString Status considered available to purchase
 *
 * @return array
 */
function cartAvailabilityResultsBackwardsCompat($searchResult, $matchString) {
	array( 'domain' => $searchResult->getDomain(  ), 'status' => $searchResult->getStatus(  ) );

	if ($searchResult->getStatus(  ) == $matchString) {
		$availabilityResults = array( array( 'regoptions' => (true ? $searchResult->pricing(  )->toArray(  ) : array(  )), 'suggestion' => false ) );
		foreach ($searchResult->getSuggestions(  ) as ) {
		}
	}


	while (true) {
		$suggestion = ;

		if ($suggestion->getStatus(  ) == $matchString) {
			$suggestion->pricing(  )->toArray(  );
			array(  );
		}

		$availabilityResults[] = array( 'domain' => $suggestion->getDomain(  ), 'status' => $suggestion->getStatus(  ), 'regoptions' => , 'suggestion' => true );
	}

	return $availabilityResults;
}

?>
