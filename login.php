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
	header( 'Location: clientarea.php' );
	exit(  );
	$smartyvalues['showingLoginPage'] = true;
	$_SESSION['loginurlredirect'] = html_entity_decode( $_SERVER['REQUEST_URI'] );

	if (eaaadiagec::get( '2faverifyc' )) {
		$templatefile = 'logintwofa';
		eaaadiagec::get( '2fabackupcodenew' );
	}
}


if () {
	$smartyvalues['newbackupcode'] = true;
}

(  );
$twofa = ;

if ($twofa->setClientID( eaaadiagec::get( '2faclientid' ) )) {
	$twofa->isActiveClients;
}


if (( !(  ) || !$twofa->isEnabled(  ) )) {
	eaaadiagec::destroy(  );
	redir(  );

	if ($whmcs->get_req_var( 'backupcode' )) {
		$smartyvalues['backupcode'] = true;
		jmp;
		$twofa->moduleCall( 'challenge' );
		$challenge = ;

		if ($challenge) {
			$smartyvalues['challenge'] = $challenge;
			jmp;
			$smartyvalues['error'] = 'Bad 2 Factor Auth Module. Please contact support.';
		}
	}
}

$smartyvalues['formaction'] = 'dologin.php';
$smartyvalues['incorrect'] = (string)$whmcs->get_req_var( 'incorrect' );
$smartyvalues['ssoredirect'] = (string)$whmcs->get_req_var( 'ssoredirect' );
outputClientArea( $templatefile, false, array( 'ClientAreaPageLogin' ) );
exit(  );
?>
