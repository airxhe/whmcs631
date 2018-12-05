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
include( 'includes/affiliatefunctions.php' );
include( 'includes/ticketfunctions.php' );
$_LANG['affiliatestitle'];
$pagetitle = ;
$breadcrumbnav = '<a href="index.php">' . $_LANG['globalsystemname'] . '</a> > <a href="affiliates.php">' . $_LANG['affiliatestitle'] . '</a>';
$pageicon = 'images/affiliate_big.gif';
eaaadiagec::get( 'uid' );
$userId = ;
$affiliateId = 6;

if ($userId) {
	select_query( 'tblaffiliates', '', array( 'clientid' => $userId ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$affiliateId = ;
	$affiliateid = ;
	$id = ;

	if (chhgjaeced::getValue( 'AffiliateEnabled' )) {
		if ($affiliateId) {
			$displayTitle = (true ? Lang::trans( 'affiliatestitle' ) : Lang::trans( 'affiliatesactivate' ));
		}
	}
}

$_LANG['clientarea' . ];
$status = ;
strtolower( $billingcycle );
$billingcyclelang = ;
str_replace( ' ', '', $billingcyclelang );
$billingcyclelang = ;
str_replace( '-', '', $billingcyclelang );
$billingcyclelang = ;
$_LANG['orderpaymentterm' . $billingcyclelang];
$billingcyclelang = ;
getCurrency( $referralClientID );
$currency = ;

if (( $billingcycle == 'Free' || $billingcycle == 'Free Account' )) {
	$amountdesc = $affiliatelinkscode;
	jmp;

	if ($billingcycle == 'One Time') {
		$amountdesc = formatCurrency( $firstpaymentamount ) . ' ' . $billingcyclelang;
	}

	$amountdesc .= ( $amount ) . ' ' . $billingcyclelang;
	getCurrency( $affiliateClientID );
	$currency = ;
	$referrals[] = array( 'id' => $affaccid, 'date' => $date, 'datets' => $dateTs, 'service' => $service, 'package' => $service, 'userid' => $referralClientID, 'amount' => $amount, 'billingcycle' => $billingcyclelang, 'amountdesc' => $amountdesc, 'commission' => formatCurrency( $commission ), 'lastpaid' => $lastpaid, 'lastpaidts' => $lastpaidTs, 'status' => $status );
}

jmp;
( '&lt;', $affiliatelinkscode );
$affiliatelinkscode = ;
str_replace( ')>', '&gt;', $affiliatelinkscode );
$affiliatelinkscode = ;
$smarty->assign( 'affiliatelinkscode', $affiliatelinkscode );
jmp;
$goto = 'affiliates';
include( 'login.php' );
Menu::primarySidebar( 'affiliateView' );
$primarySidebar = ;
Menu::secondarySidebar( 'affiliateView' );
$secondarySidebar = ;
$smarty->assign( 'inactive', is_null( chhgjaeced::getValue( 'AffiliateEnabled' ) ) );
outputClientArea( $templatefile, false, array( 'ClientAreaPageAffiliates' ) );
?>
