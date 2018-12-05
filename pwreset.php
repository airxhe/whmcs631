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
require( 'includes/clientfunctions.php' );
$_LANG['pwreset'];
$pagetitle = ;
$pageicon = '';
$breadcrumbnav = '<a href="index.php">' . $_LANG['globalsystemname'] . '</a> > <a href="clientarea.php">' . $_LANG['clientareatitle'] . '</a> > <a href="pwreset.php">' . $_LANG['pwreset'] . '</a>';
Lang::trans( 'pwreset' );
$displayTitle = ;
$tagline = '';
initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );
$securityquestion = '';
$whmcs->get_req_var( 'action' );
$action = ;
$whmcs->get_req_var( 'email' );
$email = ;
$whmcs->get_req_var( 'answer' );
$answer = ;
$whmcs->get_req_var( 'key' );
$key = ;
$whmcs->get_req_var( 'success' );
$success = ;
$smartyvalues['action'] = $action;
$smartyvalues['email'] = $email;
$smartyvalues['key'] = $key;
$smartyvalues['answer'] = $answer;
$smartyvalues['success'] = false;
$smartyvalues['securityquestion'] = '';
$smartyvalues['showingLoginPage'] = true;

if ($action == 'reset') {
	check_token(  );
	$templatefile = 'pwreset';
	doResetPWEmail( $email, $answer );
	$errormessage = ;

	if ($securityquestion) {
		$smartyvalues['securityquestion'] = $securityquestion;

		if ($errormessage) {
			$smartyvalues['errormessage'] = $errormessage;
		}
	}
}

( $securityquestion && $answer );
if ((bool)) = true;
$templatefile = 'pwresetvalidation';
jmp;
$templatefile = 'pwreset';
outputClientArea( $templatefile, false, array( 'ClientAreaPagePasswordReset' ) );
?>
