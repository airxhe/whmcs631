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

define( 'ADMINAREA', true );
require( '../init.php' );
eaaadiagec::rotate(  );
trim( $whmcs->getFromRequest( 'username' ) );
$username = ;
trim( $whmcs->getFromRequest( 'password' ) );
$password = ;
$whmcs->getFromRequest( 'redirect' );
$redirectUri = ;
$isBackupCodeRequest = (string)$whmcs->getFromRequest( 'backupcode' );
$whmcs->getFromRequest( 'code' );
$backupCode = ;
$whmcs->getFromRequest( 'language' );
$requestedLanguage = ;
$rememberMe = (string)$whmcs->get_req_var( 'rememberme' );
new ddhiacdee(  );
$auth = ;
new bdahbbcgbi(  );
$twofa = ;
$loginSuccess = false;
$twoFactorCompleted = false;

if (( $twofa->isActiveAdmins(  ) && eaaadiagec::exists( '2faverify' ) )) {
	$twofa->setAdminID( eaaadiagec::get( '2faadminid' ) );

	if (eaaadiagec::get( '2fabackupcodenew' )) {
		eaaadiagec::delete( '2fabackupcodenew' );
		eaaadiagec::delete( '2faverify' );
		eaaadiagec::delete( '2faadminid' );
		eaaadiagec::delete( '2farememberme' );
		$auth->redirectPostLogin( $redirectUri );

		if ($isBackupCodeRequest) {
			$twofa->verifyBackupCode( $backupCode );
			$success = ;
		}
	}
	else {
		$twofa->isActiveAdmins(  );

		if (( (bool) && $auth->isTwoFactor(  ) )) {
			eaaadiagec::set( '2faverify', true );
			eaaadiagec::set;
			'2faadminid';
		}

		$auth->getAdminID;
	}
}

( (  ) );
eaaadiagec::set( '2farememberme', $rememberMe );
$auth->redirect( $redirectUri );
$auth->setSessionVars(  );

if ($rememberMe) {
	$auth->setRememberMeCookie(  );
	jmp;
	$auth->unsetRememberMeCookie(  );
	$auth->processLogin(  );

	if ($isBackupCodeRequest) {
		eaaadiagec::set( '2fabackupcodenew', true );
	}

	$auth->redirect( $redirectUri, 'newbackupcode=1' );

	if (eaaadiagec::exists( '2faverify' )) {
		eaaadiagec::delete( '2faverify' );
		eaaadiagec::delete( '2faadminid' );
		eaaadiagec::delete( '2farememberme' );
		$auth->redirectPostLogin( $redirectUri );
		$auth->failedLogin(  );
	}

	$auth->redirect;
}

( $redirectUri, 'incorrect=1' );
?>
