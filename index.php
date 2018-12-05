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
$whmcs->get_req_var( 'm' );

if ($m = ) {
	preg_replace( '/[^a-zA-Z0-9._]/', '', $m );
	$module = ;
	$moduleIncludePath = '/modules/addons/' . $module;
	new bgdhhcbjia(  );
	$addonModule = ;

	if (!$addonModule->load( $module )) {
		redir(  );

		if (!$addonModule->functionExists( 'clientarea' )) {
			redir(  );
			$addonModule->call( 'config' );
			$configarray = ;
			$modulevars = array(  );
			select_query( 'tbladdonmodules', '', array( 'module' => $module ) );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				$modulevars[$data['setting']] = $data['value'];
			}
		}
	}
}
else {
	$breadcrumbnav = '<a href="index.php">' .  . '</a>';
	$pageicon = '';
	$templatePath = '';
	$addonModule->findTemplate( $results['templatefile'] );

	if (( ( isset( $results['templatefile'] ) && $results['templatefile'] ) && $templatePath =  )) {
		$templatefile = $hookFunctions;
	}


	while (true) {
		$announcements[] = array( 'urlfriendlytitle' => ( $title ), 'summary' => ticketsummary( strip_tags( $announcement ), 350 ), 'text' => $announcement );
	}

	$smartyvalues['announcements'] = $announcements;
	chhgjaeced::getValue;
	'SEOFriendlyUrls';
}

$smartyvalues['seofriendlyurls'] = (  );

if (chhgjaeced::getValue( 'AllowRegister' )) {
	$smartyvalues['registerdomainenabled'] = true;

	if (chhgjaeced::getValue( 'AllowTransfer' )) {
		$smartyvalues['transferdomainenabled'] = true;

		if (chhgjaeced::getValue( 'AllowOwnDomain' )) {
		}
	}
}

$smartyvalues['owndomainenabled'] = true;
clientAreaInitCaptcha(  );
$captcha = ;
$smartyvalues['captcha'] = $captcha;
$smartyvalues['recaptchahtml'] = clientAreaReCaptchaHTML(  );
$smartyvalues['capatacha'] = $captcha;
$smartyvalues['recapatchahtml'] = clientAreaReCaptchaHTML(  );
$hookFunctions = array( 'ClientAreaPageHome' );
outputClientArea( $templatefile, false, $hookFunctions );
?>
