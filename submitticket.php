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
require( 'includes/ticketfunctions.php' );
require( 'includes/customfieldfunctions.php' );
require( 'includes/clientfunctions.php' );
Lang::trans( 'supportticketssubmitticket' );
$pagetitle = ;
$breadcrumbnav = '<a href="index.php">' . Lang::trans( 'globalsystemname' ) . '</a> > <a href="clientarea.php">' . Lang::trans( 'clientareatitle' ) . '</a> > <a href="supporttickets.php">' . Lang::trans( 'supportticketspagetitle' ) . '</a> > <a href="submitticket.php">' . Lang::trans( 'supportticketssubmitticket' ) . '</a>';
$pageicon = 'images/submitticket_big.gif';
Lang::trans( 'navopenticket' );
$displayTitle = ;
$tagline = '';
initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );
$whmcs->get_req_var( 'action' );
$action = ;
$deptid = (int)$whmcs->get_req_var( 'deptid' );
$whmcs->get_req_var( 'step' );
$step = ;
$whmcs->get_req_var( 'name' );
$name = ;
$whmcs->get_req_var( 'email' );
$email = ;
$whmcs->get_req_var( 'urgency' );
$urgency = ;
$whmcs->get_req_var( 'subject' );
$subject = ;
$whmcs->get_req_var( 'message' );
$message = ;
$whmcs->get_req_var( 'attachments' );
$attachments = ;
$whmcs->get_req_var( 'relatedservice' );
$relatedservice = ;
$whmcs->get_req_var( 'customfield' );
$customfield = ;
$whmcs->get_req_var( 'file_too_large' );
$file_too_large = ;

if ($action == 'getkbarticles') {
	getKBAutoSuggestions( $text );
	$kbarticles = ;

	if (count( $kbarticles )) {
		$smarty->assign( 'kbarticles', $kbarticles );
		echo $smarty->fetch( $whmcs->getClientAreaTemplate(  )->getName(  ) . '/supportticketsubmit-kbsuggestions.tpl' );
		exit(  );
	}
}

( 'ASC' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['id'];
	$dept_id = ;
	$data['name'];
	$dept_name = ;
	$data['description'];
	$dept_desc = ;
	$departments[] = array( 'id' => $dept_id, 'name' => $dept_name, 'description' => $dept_desc );
}

jmp;
(  );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$relatedservices[] = array( 'id' => 'D' . $data['id'], 'name' => Lang::trans( 'clientareahostingdomain' ) . ' - ' . $data['domain'], 'status' => Lang::trans( 'clientarea' . strtolower( str_replace( '-', '', $data['status'] ) ) ) );
}

jmp;
$smarty->assign( 'errormessage', $validate->getHTMLErrorOutput(  ) );
$smarty->assign( 'urgency', $urgency );
$smarty->assign( 'subject', $subject );
$smarty->assign( 'message', $message );
$smarty->assign( 'captcha', $captcha );
$smarty->assign( 'recaptchahtml', clientAreaReCaptchaHTML(  ) );
$smarty->assign( 'capatacha', $captcha );
$smarty->assign( 'recapatchahtml', clientAreaReCaptchaHTML(  ) );

if (chhgjaeced::getValue( 'SupportTicketKBSuggestions' )) {
	$smarty->assign( 'kbsuggestions', true );
	preg_replace( '/[^a-zA-Z0-9_\-]*/', '', Lang::getLanguageLocale(  ) );
	$locale = ;

	if ($locale == 'locale') {
		$locale = (true ? 'en_GB' : $locale);

		if (( $locale != 'en_GB' && file_exists( ROOTDIR . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'bootstrap-markdown' . DIRECTORY_SEPARATOR . 'locale' . DIRECTORY_SEPARATOR . 'bootstrap-markdown.' . $locale . '.js' ) )) {
			$smarty->assign;
			'mdeLocale';
			cffcebchbh::jsInclude;
		}
	}

	( ( 'bootstrap-markdown' . DIRECTORY_SEPARATOR . 'locale' . DIRECTORY_SEPARATOR . 'bootstrap-markdown.' . $locale . '.js' ) );
	$smarty->assign( 'loadMarkdownEditor', true );
}

( $deptid, $subject, $message, $urgency, $attachments, $from, $relatedservice, $cc, false, false, true );
$ticketdetails = ;
saveCustomFields( $ticketdetails['ID'], $customfield );
$_SESSION['tempticketdata'] = $ticketdetails;
redir( 'step=4', 'submitticket.php' );
jmp;

if ($step == '4') {
	$_SESSION['tempticketdata'];
	$ticketdetails = ;
	$templatefile = 'supportticketsubmit-confirm';
	$smarty->assign;
	'tid';
	$ticketdetails['TID'];
}

(  );
$smarty->assign( 'c', $ticketdetails['C'] );
$smarty->assign( 'subject', $ticketdetails['Subject'] );
Menu::addContext( 'departmentId', $deptid );
Menu::primarySidebar( 'ticketSubmit' );
Menu::secondarySidebar( 'ticketSubmit' );
outputClientArea( $templatefile, false, array( 'ClientAreaPageSubmitTicket' ) );
?>
