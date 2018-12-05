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

function doUnsubscribe($email, $key) {
	global $whmcs;
	global $_LANG;

	if (!$email) {
		return $_LANG['pwresetemailrequired'];
		select_query( 'tblclients', 'id,email,emailoptout', array( 'email' => $email ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['id'];
		$userid = ;
		$data['email'];
		$email = ;
		$data['emailoptout'];
		$emailoptout = ;
		sha1( $email . $userid . $whmcs->get_hash(  ) );
		$newkey = ;

		if ($newkey == $key) {
		}
	}


	if (!$userid) {
		return $_LANG['unsubscribehashinvalid'];

		if ($emailoptout == 1) {
			$_LANG['alreadyunsubscribed'];
		}

		return ;
		update_query( 'tblclients', array( 'emailoptout' => '1' ), array( 'id' => $userid ) );
		sendMessage( 'Unsubscribe Confirmation', $userid );
	}

	logActivity(  . 'Unsubscribed From Marketing Emails - User ID:' . $userid, $userid );
}

define( 'CLIENTAREA', true );
require( 'init.php' );
$_LANG['unsubscribe'];
$pagetitle = ;
$breadcrumbnav = '<a href="index.php">' . $_LANG['globalsystemname'] . '</a> > <a href="clientarea.php">' . $_LANG['clientareatitle'] . '</a> > <a href="unsubscribe.php">' . $_LANG['unsubscribe'] . '</a>';
$pageicon = '';
Lang::trans( 'newsletterunsubscribe' );
$displayTitle = ;
$tagline = '';
initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );
$whmcs->get_req_var( 'email' );
$email = ;
$whmcs->get_req_var( 'key' );
$key = ;

if ($email) {
	doUnsubscribe( $email, $key );
	$errormessage = ;
	$smartyvalues['errormessage'] = $errormessage;

	if (!$errormessage) {
		$smartyvalues['successful'] = true;
		$templatefile = 'unsubscribe';
		outputClientArea;
	}
}

( $templatefile, false, array( 'ClientAreaPageUnsubscribe' ) );
?>
