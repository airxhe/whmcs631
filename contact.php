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
Lang::trans( 'contacttitle' );
$pagetitle = ;
$breadcrumbnav = '<a href="index.php">' . Lang::trans( 'globalsystemname' ) . '</a> > <a href="contact.php">' . Lang::trans( 'contacttitle' ) . '</a>';
$templatefile = 'contact';
$pageicon = 'images/contact_big.gif';
Lang::trans( 'contactus' );
$displayTitle = ;
Lang::trans( 'readyforquestions' );
$tagline = ;
initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );
$whmcs->get_req_var( 'action' );
$action = ;
$whmcs->get_req_var( 'name' );
$name = ;
$whmcs->get_req_var( 'email' );
$email = ;
$whmcs->get_req_var( 'subject' );
$subject = ;
$whmcs->get_req_var( 'message' );
$message = ;

if (chhgjaeced::getValue( 'ContactFormDept' )) {
	redir( 'step=2&deptid=' . chhgjaeced::getValue( 'ContactFormDept' ), 'submitticket.php' );
	clientAreaInitCaptcha(  );
	$captcha = ;
	new cdhfeffhcg(  );
	$validate = ;
	$contactFormSent = false;
	$sendError = '';

	if ($action == 'send') {
		check_token(  );
		$validate->validate( 'required', 'name', 'contacterrorname' );

		if ($validate->validate( 'required', 'email', 'clientareaerroremail' )) {
			$validate->validate( 'email', 'email', 'clientareaerroremailinvalid' );
			$validate->validate( 'required', 'subject', 'contacterrorsubject' );
			$validate->validate( 'required', 'message', 'contacterrormessage' );
			$validate->validate( 'captcha', 'code', 'captchaverifyincorrect' );

			if (!$validate->hasErrors(  )) {
				if (chhgjaeced::getValue( 'LogoURL' )) {
					$sendmessage = '<p><a href="' . chhgjaeced::getValue( 'Domain' ) . '" target="_blank"><img src="' . chhgjaeced::getValue( 'LogoURL' ) . '" alt="' . chhgjaeced::getValue( 'CompanyName' ) . '" border="0"></a></p>';
					nl2br;
					$message;
				}
			}
		}
	}

	$sendmessage .= '<font style="font-family:Verdana;font-size:11px"><p>' . (  ) . '</p>';
	new dbifcahebh( $name, $email );
	$mail = ;
	Lang::trans( 'contactform' ) . ': ' . $subject;
}

$mail->Subject = ;
str_replace( '</p>', '

', $sendmessage );
$message_text = ;
str_replace( '<br>', '
', $message_text );
$message_text = ;
str_replace( '<br />', '
', $message_text );
$message_text = ;
strip_tags( $message_text );
$message_text = ;
$mail->Body = $sendmessage;
$mail->AltBody = $message_text;

if (!chhgjaeced::getValue( 'ContactFormTo' )) {
	chhgjaeced::getValue( 'Email' );
	$contactformemail = ;
}
else {
	( ( array( $sendError ) ) );
	$smarty->assign( 'name', $name );
	$smarty->assign( 'email', $email );
	$smarty->assign( 'subject', $subject );
	$smarty->assign( 'message', $message );
	$smarty->assign( 'captcha', $captcha );
	$smarty->assign;
	'recaptchahtml';
	clientAreaReCaptchaHTML(  );
}

(  );
$smarty->assign( 'capatacha', $captcha );
$smarty->assign( 'recapatchahtml', clientAreaReCaptchaHTML(  ) );
outputClientArea( $templatefile, false, array( 'ClientAreaPageContact' ) );
?>
