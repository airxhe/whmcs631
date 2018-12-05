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

/** @type \Illuminate\Database\Eloquent\Collection|\WHMCS\Domain\TopLevel\Category[] $tldCategories */
function {closure}($query) {
	$tldsList;
	$tldsList = ;
	$query->whereIn( 'tld', $tldsList );
}

function {closure}($a, $b) {
	$tldsList;
	$tldsList = ;
	array_search( $a->tld, $tldsList );
	$aKey = ;
	array_search( $b->tld, $tldsList );
	$bKey = ;

	if (( ( $aKey === false || $bKey === false ) || $aKey == $bKey )) {
		return 0;

		if ($bKey < $aKey) {
		}
	}

	return (true ? 1 : -1);
}

define( 'CLIENTAREA', true );
require( 'init.php' );
require( ROOTDIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'domainfunctions.php' );
require( ROOTDIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'whoisfunctions.php' );
require( ROOTDIR . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'cartfunctions.php' );
clientAreaInitCaptcha(  );
$captcha = ;
$_LANG['domaintitle'];
$pagetitle = ;
$breadcrumbnav = '<a href="index.php">' . $_LANG['globalsystemname'] . '</a> > <a href="domainchecker.php">' . $_LANG['domaintitle'] . '</a>';
$templatefile = 'domainchecker';
$pageicon = 'images/domains_big.gif';
Lang::trans( 'domaintitle' );
$displayTitle = ;
Lang::trans( 'domaincheckertagline' );
$tagline = ;
initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );
App::self(  );
$whmcs = ;
$whmcs->get_req_var( 'search' );
$searchType = ;
trim( $whmcs->get_req_var( 'domain' ) );
$domainSearchTerm = ;
$whmcs->get_req_var( 'bulkdomains' );
$bulkdomains = ;
trim( $whmcs->get_req_var( 'tld' ) );
$userProvidedTld = ;
$whmcs->get_req_var( 'tlds' );
$userProvidedTlds = ;
trim( $whmcs->get_req_var( 'ext' ) );
$ext = ;
$whmcs->get_req_var( 'direct' );
$direct = ;
$sld = '';
$invalidtld = '';
$availabilityresults = array(  );
$bulkCheckResults = array(  );
$tldsList = array(  );

if (!is_array( $userProvidedTlds )) {
	$userProvidedTlds = array(  );

	if (isset( $_SESSION['uid'] )) {
		$userid = (true ? $_SESSION['uid'] : '');

		if (isset( $_SESSION['currency'] )) {
			$currencyid = (true ? $_SESSION['currency'] : '');
			getCurrency( $userid, $currencyid );
			$currency = ;
			$smartyvalues['currency'] = $currency;
			$whmcs->get_req_var( 'responseType' );
			$responseType = ;
			$whmcs->get_req_var( 'addtocart' );
			$addtocart = ;
			$whmcs->get_req_var( 'check' );
			$check = ;
			$whmcs->get_req_var( 'domain' );
			$domain = ;
			$whmcs->get_req_var( 'orderType' );
			$orderType = ;

			if ($addtocart) {
				check_token( 'WHMCS.domainchecker' );
				$resultCode = 12;
				$validOrderTypes = array( 'transfer', 'register' );

				if (!in_array( $orderType, $validOrderTypes )) {
					$orderType = 'register';

					if (( $check && $check != 'false' )) {
						new cjjbfgbijj(  );
						$domains = ;
						$domains->splitAndCleanDomainInput( $domain );
						$domainparts = ;
						$domainparts['sld'];
						$sld = ;
						ltrim( $domainparts['tld'], '.' );
						$tld = ;
						cfhfdfeahc::factory(  );
						$lookupProvider = ;
						$lookupProvider->checkAvailability( $sld, $tld, false );
						$searchResult = ;
						$searchResult->toArray(  );
						$search = ;

						if ($search['isRegistered']) {
							$resultCode = 14;

							if ($resultCode == 0) {
								$domainsInCart = array(  );
								new dgccjfbgea(  );
								$orderFrm = ;
								$orderFrm->getCartDataByKey( 'domains', array(  ) );
								$domainsSession = ;
								$whmcs->get_req_var( 'reg_period' );
								$regPeriod = 1;
								foreach ($domainsSession as ) {
									$sessdata = ;
									$domainsInCart[] = $sessdata['domain'];
									break;
								}


								if (!in_array( $domain, $domainsInCart )) {
									$domainOrder = array( 'type' => $orderType, 'domain' => $domain, 'regperiod' => $regPeriod );

									if ($orderType == 'transfer') {
										$domainOrder['eppcode'] = null;
										$_SESSION['cart']['domains'][] = $domainOrder;
										$resultCode = 13;
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


while (true) {
	$search_tlds = $tldList;

	if (( $userRequestedInvalidTld && empty( $$invalidtld ) )) {
		current( $search_tlds );
		$tld = ;
		break;
	}

	$value = ;
	$key = ;
	$smartyvalues[$key] = $value;
}

$checkedExtensions = array(  );
foreach ($searchResults['suggestions'] as ) {
	$domainSuggestion = ;

	if (in_array( $domainSuggestion['tld'], $search_tlds )) {
		$checkedExtensions[] = $domainSuggestion['tld'];
		$availabilityresults[] = array( 'domain' => $domainSuggestion['domainName'], 'status' => $domainSuggestion['legacyStatus'], 'regoptions' => $domainSuggestion['pricing'] );
		break;
	}

	break;
}

foreach ($search_tlds as ) {
	$searchTld = ;

	if (( !in_array( $searchTld, $checkedExtensions ) && $searchTld != $tmpDomain->getTopLevel(  ) )) {
		$availabilityresults[] = array( 'domain' => $tmpDomain->getSecondLevel(  ) . '.' . $searchTld, 'status' => 'unavailable', 'regoptions' => array(  ) );
		break;
	}

	break;
}

$smartyvalues['domain'] = $tmpDomain->getDomain(  );
$smartyvalues['sld'] = $tmpDomain->getSecondLevel(  );

if (0 < count( $search_tlds )) {
	$tmpDomain->getDotTopLevel;
}

$smartyvalues['tld'] = (true ? (  ) : '');
$smartyvalues['ext'] = ;
$smartyvalues['tlds'] = $search_tlds;
$smartyvalues['tldslist'] = $tldsList;
$smartyvalues['invalidtld'] = $invalidtld;
foreach ($availabilityresults as ) {
	$domainAllowedForWhoisDetails = ;
	$domainsToAllowForWhois[] = $domainAllowedForWhoisDetails['domain'];
	break;
}

eaaadiagec::set( 'domaincheckerwhois', $domainsToAllowForWhois );

if (0 < count( $bulkCheckResults )) {
	$smartyvalues['availabilityresults'] = $bulkCheckResults;
}

->orderBy( 'display_order' )->orderBy( 'category' )->get(  );
$tldCategories = ;
jmp;
Exception {
	$tldCategories = array(  );
	foreach ($tldCategories as ) {
		$tldCategory = ;
		$tldCategory->topLevelDomains->sort(  );
		break;
	}

	$smartyvalues['tldcategories'] = $tldCategories;

	if ($responseType == 'json') {
		$templatefile = '/templates/' . $whmcs->getClientAreaTemplate(  )->getName(  ) . '/domainchecker-results.tpl';
	}


	if (file_exists( ROOTDIR . $templatefile )) {
		$checkResponse['output'] = processSingleTemplate( $templatefile, array(  ) );
		jmp;
		echo 'domainchecker-results.tpl template file not found';
		header( 'Content-Type: application/json' );
		echo json_encode( $checkResponse );
		return 1;
		outputClientArea( $templatefile, false, array( 'ClientAreaPageDomainChecker' ) );
	}

	return 1;
}
?>
