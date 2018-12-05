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
	new cjjbfgbijj(  );
	$domains = ;
	$domains->splitAndCleanDomainInput( $domain );
	$domainparts = ;
	$domains->checkDomainisValid( $domainparts );
	$isValid = ;

	if ($isValid) {
		new hbahgijbd(  );
		$whois = ;
		$whois->init(  );

		if ($whois->canLookupTLD( $domainparts['tld'] )) {
		}

		$whois->lookup( $domainparts );
		$result = ;

		if (( $responsetype == 'xml' || $responsetype == 'json' )) {
			$whois = (true ? $result['whois'] : urlencode( $result['whois'] ));
			if (( function_exists( 'mb_convert_encoding' ) && $responsetype == 'json' )) = $whois;
			array( 'result' => 'success' );
		}
	}
}

$apiresults = array( 'status' => $result['result'], 'whois' => $result['whois'] );
?>
