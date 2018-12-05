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

function affiliateActivate($userid) {
	global $CONFIG;

	select_query( 'tblclients', 'currency', array( 'id' => $userid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['currency'];
	$clientcurrency = ;
	convertCurrency( $CONFIG['AffiliateBonusDeposit'], 1, $clientcurrency );
	$bonusdeposit = ;
	select_query( 'tblaffiliates', 'id', array( 'clientid' => $userid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$affiliateid = ;

	if (!$affiliateid) {
		insert_query;
		'tblaffiliates';
	}

	( array( 'date' => 'now()', 'clientid' => $userid, 'balance' => $bonusdeposit ) );
	$affiliateid = ;
	logActivity(  . 'Activated Affiliate Account - Affiliate ID: ' . $affiliateid . ' - User ID: ' . $userid, $userid );
	run_hook( 'AffiliateActivation', array( 'affid' => $affiliateid, 'userid' => $userid ) );
}

?>
