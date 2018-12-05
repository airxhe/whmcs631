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
require( 'includes/customfieldfunctions.php' );

if (isset( $_SESSION['uid'] )) {
	redir( '', 'clientarea.php' );
	clientAreaInitCaptcha(  );
	$captcha = ;
	getSecurityQuestions(  );
	$securityquestions = ;
	$whmcs->get_req_var( 'firstname' );
	$firstname = ;
	$whmcs->get_req_var( 'lastname' );
	$lastname = ;
	$whmcs->get_req_var( 'companyname' );
	$companyname = ;
	$whmcs->get_req_var( 'email' );
	$email = ;
	$whmcs->get_req_var( 'address1' );
	$address1 = ;
	$whmcs->get_req_var( 'address2' );
	$address2 = ;
	$whmcs->get_req_var( 'city' );
	$city = ;
	$whmcs->get_req_var( 'state' );
	$state = ;
	$whmcs->get_req_var( 'postcode' );
	$postcode = ;
	$whmcs->get_req_var( 'country' );
	$country = ;
	$whmcs->get_req_var( 'phonenumber' );
	$phonenumber = ;
	$whmcs->get_req_var( 'password' );
	$password = ;
	$whmcs->get_req_var( 'securityqid' );
	$securityqid = ;
	$whmcs->get_req_var( 'securityqans' );
	$securityqans = ;
	$whmcs->get_req_var( 'customfield' );
	$customfield = ;
	$errormessage = '';

	if ($whmcs->get_req_var( 'register' )) {
		check_token(  );
		checkDetailsareValid( '', true );
		$errormessage = ;

		if (!$errormessage) {
			addClient( $firstname, $lastname, $companyname, $email, $address1, $address2, $city, $state, $postcode, $country, $phonenumber, $password, $securityqid, $securityqans );
			$userid = ;
			run_hook( 'ClientAreaRegister', array( 'userid' => $userid ) );
			redir( '', 'clientarea.php' );
			Lang::trans( 'clientregistertitle' );
			$pagetitle = ;
			$breadcrumbnav = '<a href="index.php">' . Lang::trans( 'globalsystemname' ) . '</a> > <a href="register.php">' . Lang::trans( 'clientregistertitle' ) . '</a>';
			$pageicon = 'images/order_big.gif';
			Lang::trans( 'clientregistertitle' );
			$displayTitle = ;
			Lang::trans( 'registerintro' );
			$tagline = ;
			initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );
			$templatefile = 'clientregister';
			$smarty->assign( 'registrationDisabled', (string)!chhgjaeced::getValue( 'AllowClientRegister' ) );
			$smarty->assign;
			'noregistration';

			if (!chhgjaeced::getValue( 'AllowClientRegister' )) {
				( (true ? true : false) );
				include( 'includes/countries.php' );
				getCountriesDropDown( $country );
				$countriesdropdown = ;
				$smarty->assign( 'defaultCountry', chhgjaeced::getValue( 'DefaultCountry' ) );
				$smarty->assign( 'errormessage', $errormessage );
				$smarty->assign( 'clientfirstname', $firstname );
				$smarty->assign( 'clientlastname', $lastname );
				$smarty->assign( 'clientcompanyname', $companyname );
				$smarty->assign( 'clientemail', $email );
				$smarty->assign( 'clientaddress1', $address1 );
				$smarty->assign( 'clientaddress2', $address2 );
				$smarty->assign( 'clientcity', $city );
				$smarty->assign( 'clientstate', $state );
				$smarty->assign( 'clientpostcode', $postcode );
				$smarty->assign( 'clientcountry', $country );
				$smarty->assign( 'clientcountriesdropdown', $countriesdropdown );
				$smarty->assign( 'clientcountries', $countries );
				$smarty->assign( 'clientphonenumber', $phonenumber );
				$smarty->assign( 'securityquestions', $securityquestions );
				getCustomFields( 'client', '', '', '', 'on', $customfield );
				$customfields = ;
				$smarty->assign( 'customfields', $customfields );
				$smarty->assign( 'captcha', $captcha );
				$smarty->assign;
			}
		}
	}

	( 'recaptchahtml', clientAreaReCaptchaHTML(  ) );
	$smarty->assign( 'capatacha', $captcha );
	$smarty->assign( 'recapatchahtml', clientAreaReCaptchaHTML(  ) );
	$smarty->assign( 'accepttos', chhgjaeced::getValue( 'EnableTOSAccept' ) );
	$smarty->assign( 'tosurl', chhgjaeced::getValue( 'TermsOfService' ) );
	$smarty->assign( 'uneditablefields', explode( ',', chhgjaeced::getValue( 'ClientsProfileUneditableFields' ) ) );
	$whmcs->get_config( 'ClientsProfileOptionalFields' );
	$optionalFields = ;
	$smarty->assign( 'optionalFields', explode( ',', $optionalFields ) );
	Menu::addContext( 'securityQuestions', ecdcfahijd::all(  ) );
	Menu::primarySidebar( 'clientRegistration' );
	Menu::secondarySidebar( 'clientRegistration' );
	outputClientArea;
	$templatefile;
	false;
	array( 'ClientAreaPageRegister' );
}

(  );
?>
