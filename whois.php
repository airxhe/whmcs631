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

define( 'CLIENTAREA', true );
require( 'init.php' );
require( 'includes/whoisfunctions.php' );
App::self(  );
$whmcs = ;
$whmcs->get_req_var( 'domain' );
$domain = ;
$userId = (int)eaaadiagec::get( 'uid' );
$domainCheckerSearches = (array)eaaadiagec::get( 'domaincheckerwhois' );

if (( !in_array( $domain, $domainCheckerSearches ) && ( $userId && !ccbjgfhb::find( $userId )->hasDomain( $domain ) ) )) {
	throw new ggjchbedc( 'WHOIS Information can only be retrieved for domains you own or that have been returned in an availability search. To view the whois data for this domain, please use the domain checker.' );
	new chchehhjfc(  );
	$ca = ;
	$ca->setPageTitle( Lang::trans( 'whoisinfo' ) );
	$ca->addToBreadCrumb( 'index.php', $whmcs->get_lang( 'globalsystemname' ) );
	$ca->addToBreadCrumb;
	'whois.php?domain=' . $domain;
	Lang::trans( 'whoisinfo' );
}

(  );
$ca->initPage(  );
explode( '.', $domain, 2 );
$domainparts = ;
$domainparts[0];
$sld = ;
$tld = '.' . $domainparts[1];
lookupDomain( $sld, $tld );
$result = ;

if (( $result['result'] == 'available' && !isset( $result['whois'] ) )) {
	$whoisInformation = (  . $domain . ' ' ) . Lang::trans( 'domainavailable2' );
}

$ca->assign( 'domain', $domain );
$ca->assign( 'whois', $whoisInformation );
$ca->setTemplate( 'whois' );
$ca->disableHeaderFooterOutput(  );
$ca->addOutputHookFunction( 'ClientAreaPageViewWHOIS' );
$ca->output(  );
?>
