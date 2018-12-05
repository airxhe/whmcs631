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
include( 'includes/clientfunctions.php' );
eaaadiagec::rotate(  );
trim( $whmcs->get_req_var( 'username' ) );
$username = ;
dfdidhdbdc::decode( trim( $whmcs->get_req_var( 'password' ) ) );
$password = ;
$whmcs->get_req_var( 'hash' );
$hash = ;
$whmcs->get_req_var( 'goto' );
$goto = ;
$whmcs->get_req_var( 'rememberme' );
$rememberme = ;
$gotourl = '';

if ($goto) {
	trim( $goto );
	$goto = ;

	if (( substr( $goto, 0, 7 ) == 'http://' || substr( $goto, 0, 8 ) == 'https://' )) {
		$goto = '';
		html_entity_decode( $goto );
		$gotourl = ;

		if (false);
		jmp;

		if (isset( $_SESSION['loginurlredirect'] )) {
			$_SESSION['loginurlredirect'];
			$gotourl = ;

			if (( substr( $gotourl, -15 ) == '&incorrect=true' || substr( $gotourl, -15 ) == '?incorrect=true' )) {
				substr( $gotourl, 0, strlen( $gotourl ) - 15 );
				$gotourl = ;
				( $gotourl, -28 ) == '?backupcode=1&incorrect=true';
			}
		}
	}
}
?>
