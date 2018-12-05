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

if (!function_exists( 'curl_init' )) {
	echo '<div style="border: 1px dashed #cc0000;font-family:Tahoma;background-color:#FBEEEB;width:100%;padding:10px;color:#cc0000;"><strong>Critical Error</strong><br>CURL is not installed or is disabled on your server and it is required for WHMCS to run</div>';
	exit(  );
	$adminPasswordResetDisabled = (string)chhgjaeced::getValue( 'DisableAdminPWReset' );
	$whmcs->get_req_var( 'action' );
	$action = ;
	$whmcs->get_req_var( 'sub' );
	$sub = ;
	$whmcs->get_req_var( 'incorrect' );
	$incorrect = ;
	$whmcs->get_req_var( 'redirect' );
	$redirectUri = ;
	$whmcs->get_req_var( 'logout' );
	$logout = ;
	$whmcs->get_req_var( 'email' );
	$email = ;
	$whmcs->get_req_var( 'backupcode' );
	$useBackupCode = ;
	$whmcs->get_req_var( 'conntest' );
	$doConnectionTest = ;
	$whmcs->get_req_var( 'verify' );
	$verificationToken = ;

	if ($doConnectionTest) {
		$whmcsurl = 'https://www.whmcs.com/index.php';
		$postfields = array( 'curltest' => '1' );
		gethostbyname( 'licensing28.whmcs.com' );
		$ip = ;
		echo '<font style="font-size:18px;">Testing Connection to whmcs.com...<br />URL resolves to ' . $ip . '<br /><br />';

		if (( $ip != '184.94.192.3' && $ip != '208.74.120.227' )) {
			echo '<font style="color:#cc0000;">Error: The IP whmcs.com is resolving to the wrong IP. Someone on your server is trying to bypass licensing. You\'ll need your host to investigate and fix.</font><br /><br />';
			http_build_query( $postfields );
			$query_string = ;
			curl_init(  );
			$ch = ;
			curl_setopt( $ch, CURLOPT_URL, $whmcsurl );
			curl_setopt( $ch, CURLOPT_POST, 1 );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $query_string );
			curl_setopt( $ch, CURLOPT_TIMEOUT, 30 );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
			curl_exec( $ch );
			$data = ;

			if (curl_error( $ch )) {
				$data = 'Curl Error: ' . curl_errno( $ch ) . ' - ' . curl_error( $ch );
			}
		}
	}
}

$message .=  .  . ( (  . '/' ) . $adminfolder . '/
Username: ' . $username . '
Password: ' . $randomPassword . '

You can change your password after login from the My Account section of the admin area.' );
$subject = 'Admin Password Reset Completed';
new dbifcahebh( $CONFIG['SystemEmailsFromName'], $CONFIG['SystemEmailsFromEmail'] );
$mail = ;
$mail->Subject = 'Admin Password Reset Completed';
$mail->Body = $message;
$mail->AddAddress( $emailaddr );

if (!$mail->Send(  )) {
	$templatevars['errorMsg'] = 'There was an error sending the email. Please try again.';
}

(  );
$verificationToken = ;
new hdhbcgfba(  );
$tempStore = ;
$tempStore->store( $verificationToken, json_encode( array( 'id' => $adminid, 'email' => $emailaddr ) ), 1800 );

if (chhgjaeced::getValue( 'SystemSSLURL' )) {
	$url = (true ? chhgjaeced::getValue( 'SystemSSLURL' ) : chhgjaeced::getValue( 'SystemURL' ));
	$url .= '/' . $adminfolder . '/login.php?action=reset&verify=' . $verificationToken;
	$message =  . 'Dear ' . $firstname . ',

A request was recently made to reset the password for admin username \'' . $username . '\'.

To confirm the request and complete the reset process, simply visit the url below:
' . $url . '

This link will only be valid for the next 30 minutes so if you didn\'t request this reset, you can simply ignore this email.

' . $CONFIG['SystemURL'] . ( (  . '/' ) . $adminfolder . '/' );
	$subject = 'Admin Password Reset Request';
	new dbifcahebh( 'SystemEmailsFromName' )( , chhgjaeced::getValue( 'SystemEmailsFromEmail' ) );
	$mail = ;
	$mail->Subject = $subject;
	$mail->Body = $message;
	$mail->AddAddress( $email );

	if (!$mail->Send(  )) {
		$templatevars['errorMsg'] = '<strong>Error sending email.</strong> Please try again.';
	}

	$templatevars['errorMsg'] = 'There was an error sending the email. Please try again.';
	logActivity( (  . 'Sending Failed - ' . $e->getMessage(  ) . ' (Subject: ' . $subject . ')' ) );
}

!;
$templatevars['showSSLLink'] = (bool);
$templatevars['showPasswordResetLink'] = (string)!$adminPasswordResetDisabled;
$templatevars['languages'] = dcfcdcbjaj::getLanguages(  );
DI::make( 'asset' );
$assetHelper = ;
$templatevars['WEB_ROOT'] = $assetHelper->getWebRoot(  );
$templatevars['BASE_PATH_CSS'] = $assetHelper->getCssPath(  );
$templatevars['BASE_PATH_JS'] = $assetHelper->getJsPath(  );
$templatevars['BASE_PATH_FONTS'] = $assetHelper->getFontsPath(  );
$templatevars['BASE_PATH_IMG'] = $assetHelper->getImgPath(  );
new cjiehgbicj( true );
$smarty = ;
foreach ($templatevars as ) {
	$value = ;
	$key = ;
	$smarty->assign( $key, $value );
	break;
}

echo $smarty->fetch( 'login.tpl' );
?>
