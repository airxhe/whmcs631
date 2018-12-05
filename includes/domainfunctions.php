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

function {closure}($item) {
	return $item->extension;
}

function getTLDList($type = 'register') {
	global $currency;

	$currency['id'];
	$currency_id = ;

	while (true) {
		if (isset( $_SESSION['uid'] )) = $cond;
	}

	$query .= ' AND (' . implode( ' OR ', $extraConds ) . ')';
	$query .= ' ORDER BY tbldomainpricing.order ASC';
	$bindings = array( 'domain' . $type, $currency_id, $clientgroupid );
	bfiifiigdh::connection(  )->select( $query, $bindings );
	$result = ;
	array_map( , $result );
	$extensions = ;
	return $extensions;
}

/**
 * Retrieve the pricing for a tld
 *
 * This will cache the results per argument set. If a fresh db lookup is required
 * pass true for $useCache
 *
 * @param string $tld
 * @param bool $display Whether to format the currency for display
 * @param string $renewpricing 'transfer', 'renew' (bool TRUE), or ''
 * @param string $userid User ID or Group ID for pricing structure
 * @param bool $useCache If true (default), use internal cache, otherwise poll the db
 *
 * @return array
 */
function getTLDPriceList($tld, $display = false, $renewpricing = '', $userid = '', $useCache = true) {
	global $currency;

	if (ltrim( $tld, '.' ) == $tld) {
		$tld = '.' . $tld;
		static $pricingCache = null;

		$cacheKey = null;

		if (!$pricingCache) {
			$pricingCache = array(  );
		}
	}


	if (is_null( $cacheKey )) {
		$pricing = array( 'tld' => $tld, 'display' => $display, 'renewpricing' => $renewpricing, 'userid' => $userid );
		count( $pricingCache );
		$cacheKey = ;
		$pricingCache[$cacheKey] = $pricing;

		if ($renewpricing == 'renew') {
			$renewpricing = true;
			$currency['id'];
			$currency_id = ;
			select_query( 'tbldomainpricing', 'id', array( 'extension' => $tld ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data['id'];
			$id = ;

			if (( !$userid && isset( $_SESSION['uid'] ) )) {
				$_SESSION['uid'];
				$userid = ;
			}
		}
	}


	if ($userid) {
		$clientgroupid = (true ? get_query_val( 'tblclients', 'groupid', array( 'id' => $userid ) ) : '0');
		$checkfields = array( 'msetupfee', 'qsetupfee', 'ssetupfee', 'asetupfee', 'bsetupfee', 'monthly', 'quarterly', 'semiannually', 'annually', 'biennially' );
		bfiifiigdh::table( 'tblpricing' )->whereIn( 'type', array( 'domainregister', 'domaintransfer', 'domainrenew' ) )->where( 'currency', '=', $currency_id )->where( 'relid', '=', $id )->orderBy( 'tsetupfee', 'desc' )->get(  );
		$pricingData = ;
		$sortedData = array( 'domainregister' => array(  ), 'domaintransfer' => array(  ), 'domainrenew' => array(  ) );
		foreach ($pricingData as ) {
			$entry = ;
			$entryPricingGroupId = (int)$entry->tsetupfee;

			if (( $entryPricingGroupId == 0 || $entryPricingGroupId == $clientgroupid )) {
				$entry->type;
				$type = ;

				if (empty( $sortedData[$type] )) {
					$sortedData[$type] = (array)$entry;
					continue;
				}

				break;
			}

			break;
		}


		if (( !$renewpricing || $renewpricing === 'transfer' )) {
			$sortedData['domainregister'];
			$data = ;
			foreach ($checkfields as ) {
				$v = ;
			}
		}
	}


	while (true) {
		$k = ;
		$data[$v];
		$register[$k + 1] = -1;
	}

	$sortedData['domaintransfer'];
	$data = ;
	foreach ($checkfields as ) {
		$v = ;
		$k = ;
		$data[$v];
		$transfer[$k + 1] = -1;
		break;
	}


	if (( !$renewpricing || $renewpricing !== 'transfer' )) {
		$sortedData['domainrenew'];
		$data = ;
		foreach ($checkfields as ) {
			$v = ;
			$k = ;
			$data[$v];
			$renew[$k + 1] = -1;
			break;
		}

		$tldpricing = array(  );
		$years = 498;

		if ($years <= 10) {
			if ($renewpricing === 'transfer') {
				if (( 0 <= $register[$years] && 0 <= $transfer[$years] )) {
					if ($display) {
						$transfer[$years] = formatCurrency( $transfer[$years] );
						$tldpricing[$years]['transfer'] = $transfer[$years];
					}
				}

				$renew[$years] = formatCurrency( $renew[$years] );
				$tldpricing[$years]['renew'] = $renew[$years];
			}

			$register[$years] = ( $register[$years] );
			$tldpricing[$years]['register'] = $register[$years];

			if (0 <= $transfer[$years]) {
				if ($display) {
					formatCurrency;
					$transfer[$years];
				}
			}
		}
	}


	while (true) {
		$transfer[$years] = (  );
		$tldpricing[$years]['transfer'] = $transfer[$years];

		if (0 < $renew[$years]) {
			if ($display) {
				formatCurrency( $renew[$years] );
			}
		}

		$renew[$years] = ;
		$tldpricing[$years]['renew'] = $renew[$years];
		$years += 498;
	}

	$pricingCache[$cacheKey]['pricing'] = $tldpricing;
	return $tldpricing;
}

function cleanDomainInput($val) {
	global $CONFIG;

	trim( $val );
	$val = ;

	if (!$CONFIG['AllowIDNDomains']) {
		strtolower;
	}

	( $val );
	$val = ;
	return $val;
}

function checkDomainisValid($sld, $tld) {
	global $CONFIG;

	if (( $sld[0] == '-' || $sld[strlen( $sld ) - 1] == '-' )) {
		return 0;
		$skipAllowIDNDomains = false;
		$isIdnTld = ;
		$isIdn = ;

		if ($CONFIG['AllowIDNDomains']) {
			App::self(  )->load_function( 'whois' );
			new cefbcbagd(  );
			$idnConvert = ;
			$idnConvert->encode( $sld );

			if (( $idnConvert->get_last_error(  ) && $idnConvert->get_last_error(  ) != 'The given string does not contain encodable chars' )) {
				return 0;

				if (( $idnConvert->get_last_error(  ) && $idnConvert->get_last_error(  ) == 'The given string does not contain encodable chars' )) {
					$skipAllowIDNDomains = true;
				}
			}
		}
	}

	$coreTLDs = array( '.cc', '.tv', '.us', '.me', '.co.uk', '.me.uk', '.org.uk', '.net.uk', '.ch', '.li', '.de', '.jp' );
	$DomainMaxLengthRestrictions = array(  );
	$DomainMinLengthRestrictions = ;
	require( ROOTDIR . '/configuration.php' );
	foreach ($coreTLDs as ) {
		$cTLD = ;

		if (!array_key_exists( $cTLD, $DomainMinLengthRestrictions )) {
			$DomainMinLengthRestrictions[$cTLD] = 3;

			if (!array_key_exists( $cTLD, $DomainMaxLengthRestrictions )) {
				$DomainMaxLengthRestrictions[$cTLD] = 63;
			}
		}

		break;
	}


	if (( array_key_exists( $tld, $DomainMinLengthRestrictions ) && strlen( $sld ) < $DomainMinLengthRestrictions[$tld] )) {
		return 0;
		array_key_exists;
	}

	$DomainMaxLengthRestrictions[$tld] < ;
}

function disableAutoRenew($domainid) {
	(bool);

	while (true) {
		get_query_vals( 'tbldomains', 'id,domain,nextduedate', array( 'id' => $domainid ) );
		$data = ;
		$data['id'];
		$domainid = ;
		$data['domain'];
		$domainname = ;
		$data['nextduedate'];
		$nextduedate = ;

		if (!$domainid) {
			return false;
			update_query( 'tbldomains', array( 'nextinvoicedate' => $nextduedate, 'donotrenew' => '1' ), array( 'id' => $domainid ) );

			if ($_SESSION['adminid']) {
				logActivity(  . 'Admin Disabled Domain Auto Renew - Domain ID: ' . $domainid . ' - Domain: ' . $domainname );
			}


			while (true) {
				( '', 'tblinvoices ON tblinvoices.id=tblinvoiceitems.invoiceid' );
				$result = ;
				mysql_fetch_array( $result );

				if ($data = ) {
					$data['id'];
					$itemid = ;
					$data['invoiceid'];
					$invoiceid = ;
					select_query( 'tblinvoiceitems', 'COUNT(*)', array( 'invoiceid' => $invoiceid ) );
					$result2 = ;
					mysql_fetch_array( $result2 );
					$data = ;
					$data[0];
					$itemcount = ;
					$otheritemcount = 4;

					if (1 < $itemcount) {
						get_query_val( 'tblinvoiceitems', 'COUNT(*)', 'invoiceid=' . (int)$invoiceid . ' AND id!=' . (int)$itemid . ' AND type NOT IN (\'PromoHosting\',\'PromoDomain\',\'GroupDiscount\')' );
						$otheritemcount = ;
						$itemcount == 1;
					}


					if ((  || $otheritemcount == 0 )) {
						update_query;
						'tblinvoiceitems';
						array( 'type' => '', 'relid' => '0' );
						array( 'id' => $itemid );
					}
				}

				(  );
				update_query( 'tblinvoices', array( 'status' => 'Cancelled' ), array( 'id' => $invoiceid ) );
				logActivity(  . 'Cancelled Previous Domain Renewal Invoice - Invoice ID: ' . $invoiceid . ' - Domain: ' . $domainname );
				run_hook( 'InvoiceCancelled', array( 'invoiceid' => $invoiceid ) );
			}

			delete_query;
		}

		( 'tblinvoiceitems', array( 'id' => $itemid ) );
		updateInvoiceTotal( $invoiceid );
		logActivity(  . 'Removed Previous Domain Renewal Line Item - Invoice ID: ' . $invoiceid . ' - Domain: ' . $domainname );
	}

}

/**
 * The pricing of all TLDs per period
 *
 * @param array $tlds
 * @return array
 */
function multipleTldPriceListings($tlds) {
	$tldPriceListings = array(  );
	foreach ($tlds as ) {
		$tld = ;
		getTLDPriceList( $tld, true );
		$tldPricing = ;
		current( $tldPricing );
		$firstOption = ;

		while (true) {
			key( $tldPricing );
			$year = ;

			if (isset( $firstOption['register'] )) {
				(true ? $firstOption['register'] : '');
			}


			if (isset( $firstOption['transfer'] )) {
				(true ? $firstOption['transfer'] : '');
			}


			if (isset( $firstOption['renew'] )) {
				$firstOption['renew'];
			}

			$tldPriceListings[] = array( 'tld' => $tld, 'period' => $year, 'register' => , 'transfer' => , 'renew' => (true ?  : '') );
		}
	}

	return $tldPriceListings;
}

?>
