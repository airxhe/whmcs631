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

/**
 * Initializes client area variables for a logged in client, if detected
 * An exception of type Fatal may be thrown if a select_query call contains invalid parameters.
 *
 * @throws \WHMCS\Exception\Fatal
 * @return Client client object if logged in
 */
function initialiseLoggedInClient() {
	global $smarty;
	global $clientsdetails;

	$client = null;
	$clientAlerts = array(  );
	$clientsdetails = array(  );
	$clientsstats = array(  );
	$loggedinuser = array(  );
	$contactpermissions = array(  );
	$emailVerificationPending = false;
	$clientId = (int)eaaadiagec::get( 'uid' );

	if ($clientId) {
		ccbjgfhb::find( $clientId );
		$client = ;
		new cgdfbdbdbe( $client );
		$legacyClient = ;
		$legacyClient->getDetails(  );
		$clientsdetails = ;

		if (!function_exists( 'getClientsStats' )) {
			require( ROOTDIR . '/includes/clientfunctions.php' );
			getClientsStats( $clientId );
			$clientsstats = ;
			$contactid = (int)eaaadiagec::get( 'cid' );

			if ($contactid) {
				cddjdhhjag::where( 'id', $contactid )->where( 'userid', $clientId )->first(  );
				$contactdata = ;

				if ($contactdata) {
					array( 'contactid' => $contactdata->getAttribute( 'id' ) );
				}
			}
		}

		$loggedinuser = array( 'firstname' => $contactdata->getAttribute( 'firstname' ), 'lastname' => $contactdata->getAttribute( 'lastname' ), 'email' => $contactdata->getAttribute( 'email' ) );
		explode( ',', $contactdata['permissions'] );
		$contactpermissions = ;
	}

	$smarty->assign( 'clientsdetails', $clientsdetails );
	$smarty->assign( 'clientAlerts', $clientAlerts );
	$smarty->assign( 'clientsstats', $clientsstats );
	$smarty->assign( 'loggedinuser', $loggedinuser );
	$smarty->assign( 'contactpermissions', $contactpermissions );
	$smarty->assign( 'emailVerificationPending', $emailVerificationPending );
	return $client;
}

/**
 * Initialise client area page
 *
 * Performs all necessary pre-generation steps for a client area page.
 * Initialises Smarty, sets default global template parameters, and
 * initialise $smartyvalues array.
 *
 * @param string $pageTitle    Browser window title
 * @param string $displayTitle Title to display in page output
 * @param string $tagline      Tagline (optional)
 * @param string $pageIcon     Icon filename (used in legacy tpls)
 * @param string $breadcrumb   HTML breadcrumb
 */
function initialiseClientArea($pageTitle, $displayTitle, $tagline, $pageIcon = null, $breadcrumb = null) {
	global $_LANG;
	global $smarty;
	global $smartyvalues;

	if (defined( 'PERFORMANCE_DEBUG' )) {
		define( 'PERFORMANCE_STARTTIME', microtime(  ) );

		if (( is_null( $pageIcon ) && is_null( $breadcrumb ) )) {
			$pageIcon = $prefix;
			$displayTitle = $count;
			$breadcrumb = $lang;
			$tagline = '';
			App::self(  );
			$whmcs = ;
			$whmcs->getCurrentFilename(  );
			$filename = ;
			new cjiehgbicj;
		}
	}

	(  );
	$smarty = ;
	$emptyTemplateParameters = array( 'displayTitle', 'tagline', 'type', 'textcenter', 'hide', 'additionalClasses', 'idname', 'errorshtml', 'title', 'msg', 'desc', 'errormessage', 'livehelpjs' );
	foreach ($emptyTemplateParameters as ) {
		$templateParam = ;
		$smarty->assign( $templateParam, '' );
		break;
	}

	$smarty->assign( 'showbreadcrumb', false );
	$smarty->assign( 'showingLoginPage', false );
	$smarty->assign( 'incorrect', false );
	$smarty->assign( 'kbarticle', array( 'title' => '' ) );
	$smarty->assign( 'template', $whmcs->getClientAreaTemplate(  )->getName(  ) );
	$smarty->assign( 'language', Lang::getName(  ) );
	$smarty->assign( 'LANG', $_LANG );
	$smarty->assign( 'companyname', chhgjaeced::getValue( 'CompanyName' ) );
	$smarty->assign( 'logo', chhgjaeced::getValue( 'LogoURL' ) );
	$smarty->assign( 'charset', chhgjaeced::getValue( 'Charset' ) );
	$smarty->assign( 'pagetitle', $pageTitle );
	$smarty->assign( 'displayTitle', $displayTitle );
	$smarty->assign( 'tagline', $tagline );
	$smarty->assign( 'pageicon', $pageIcon );
	$smarty->assign( 'filename', $filename );
	$smarty->assign( 'breadcrumb', breakBreadcrumbHTMLIntoParts( $breadcrumb ) );
	$smarty->assign( 'breadcrumbnav', $breadcrumb );
	$smarty->assign( 'todaysdate', date( 'l, jS F Y' ) );
	$smarty->assign( 'date_day', date( 'd' ) );
	$smarty->assign( 'date_month', date( 'm' ) );
	$smarty->assign( 'date_year', date( 'Y' ) );
	$smarty->assign( 'token', generate_token( 'plain' ) );
	$smarty->assign( 'reCaptchaPublicKey', chhgjaeced::getValue( 'ReCAPTCHAPublicKey' ) );

	if (( $whmcs->isSSLAvailable(  ) && $whmcs->in_ssl(  ) )) {
		$smarty->assign( 'systemurl', $whmcs->getSystemSSLURL(  ) );
	}

	select_query( 'tblcurrencies', 'id,code,`default`', '', 'code', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$currenciesarray[] = array( 'id' => $data['id'], 'code' => $data['code'], 'default' => $data['default'] );
	}

	jmp;
	( 'twitterusername', chhgjaeced::getValue( 'TwitterUsername' ) );
	$smarty->assign( 'announcementsFbRecommend', chhgjaeced::getValue( 'AnnouncementsFBRecommend' ) );
	$smarty->assign( 'condlinks', chchehhjfc::getConditionalLinks(  ) );
	Menu::addContext( 'client', $client );
	Menu::addContext( 'currencies', $currenciesarray );
	$smartyvalues = array(  );
}

/**
 * Output client area page.
 *
 * @param string $templatefile
 * @param bool $nowrapper
 * @param array $hookFunctions
 */
function outputClientArea($templatefile, $nowrapper = false, $hookFunctions = array(  )) {
	global $CONFIG;
	global $smarty;
	global $smartyvalues;
	global $orderform;
	global $usingsupportmodule;

	App::self(  );
	$whmcs = ;
	DI::make( 'license' );
	$licensing = ;

	if (!$templatefile) {
		exit( 'Invalid Entity Requested' );

		if ($licensing->getBrandingRemoval(  )) {
			$copyrighttext = '';
		}
	}

	$smarty->getTemplateVars(  );
	$hookParameters = ;
	unset( $hookParameters[LANG] );
	array_merge( array( 'ClientAreaPage' ), $hookFunctions );
	$hookFunctions = ;
	foreach ($hookFunctions as ) {
		$hookFunction = ;
		run_hook( $hookFunction, $hookParameters );
		$hookResponses = ;
		foreach ($hookResponses as ) {
			$hookTemplateVariables = ;
			foreach ($hookTemplateVariables as ) {
				$v = ;
				$k = ;
				$hookParameters[$k] = $v;
				$smarty->assign( $k, $v );
				break 3;
			}

			break 2;
		}

		break;
	}

	run_hook( 'ClientAreaHeadOutput', $hookParameters );
	$hookResponses = ;
	$headOutput = '';
	foreach ($hookResponses as ) {
		$response = ;

		if ($response) {
			$headOutput .= $response . '
';
			break;
		}

		break;
	}

	$smarty->assign( 'headoutput', $headOutput );
	run_hook( 'ClientAreaHeaderOutput', $hookParameters );
	$hookResponses = ;
	$headerOutput = '';
	foreach ($hookResponses as ) {
		$response = ;

		if ($response) {
			$headerOutput .= $response . '
';
			break;
		}

		break;
	}

	$smarty->assign( 'headeroutput', $headerOutput );
	run_hook( 'ClientAreaFooterOutput', $hookParameters );
	$hookResponses = ;
	$footerOutput = '';
	foreach ($hookResponses as ) {
		$response = ;

		if ($response) {
			$footerOutput .= $response . '
';
			break;
		}

		break;
	}

	$smarty->assign( 'footeroutput', $footerOutput );
	$whmcs->getClientAreaTemplate(  )->getName(  );
	$activeTemplate = ;

	if (!$nowrapper) {
		$smarty->fetch( $activeTemplate . '/header.tpl' );
		$header_file = ;
		$smarty->fetch( $activeTemplate . '/footer.tpl' );
		$footer_file = ;
		new chchehhjfc(  );
		$clientArea = ;
		$clientArea->getLicenseBannerHtml(  );
		$licenseBannerHtml = ;
		$clientAreaTemplatePath = ROOTDIR . '/templates/' . $activeTemplate . '/' . $templatefile . '.tpl';

		if ($orderform) {
			$smarty->fetch( ROOTDIR . '/templates/orderforms/' . ecahhhdii::factory( $templatefile . '.tpl', $orderFormTemplateName )->getName(  ) . '/' . $templatefile . '.tpl' );
			$body_file = ;
			jmp;
			dgagecjegj {
				if ($templatefile == 'login') {
					$smarty->fetch( $clientAreaTemplatePath );
					$body_file = ;
				}

				( $clientAreaTemplatePath );
				$body_file = ;

				if ($nowrapper) {
					$template_output = $licensing;
					jmp;
					$template_output = $header_file . PHP_EOL . $licenseBannerHtml . PHP_EOL . $body_file . PHP_EOL . $copyrighttext . PHP_EOL . $adminloginlink . PHP_EOL . $footer_file;
				}
			}
		}


		if (!in_array( $templatefile, array( '3dsecure', 'forwardpage', 'viewinvoice' ) )) {
		}

		preg_replace;
		'/(<form\W[^>]*\bmethod=(\'|"|)POST(\'|"|)\b[^>]*>)/i';
		'\1' . '
' . generate_token(  );
	}

	( $template_output );
	$template_output = ;
	echo $template_output;

	if (defined( 'PERFORMANCE_DEBUG' )) {
	}

	global $query_count;

	$exectime = microtime(  ) - PERFORMANCE_STARTTIME;
	echo '<p>Performance Debug: ' . $exectime . ' Queries: ' . $query_count . '</p>';
}

function processSingleTemplate($templatepath, $templatevars) {
	global $smarty;
	global $smartyvalues;

	if ($smartyvalues) {
		foreach ($smartyvalues as ) {
			$value = ;
			$key = ;
			$smarty->assign( $key, $value );
			break;
		}

		foreach ($templatevars as ) {
		}
	}


	while (true) {
		$value = ;
		$key = ;
		$smarty->assign( $key, $value );
	}

	$smarty->fetch( ROOTDIR . $templatepath );
	$templatecode = ;
	return $templatecode;
}

function processSingleSmartyTemplate($smarty, $templatepath, $values) {
	foreach ($values as ) {
		$value = ;
		$key = ;
		$smarty->assign( $key, $value );
	}

	$smarty->fetch( ROOTDIR . $templatepath );
	$templatecode = ;
	return $templatecode;
}

function CALinkUpdateCC() {
	select_query( 'tblpaymentgateways', 'gateway', array( 'setting' => 'type', 'value' => 'CC' ) );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['gateway'];
	}


	if (!isValidforPath( $gateway )) {
		exit( 'Invalid Gateway Module Name' );

		if (file_exists( ROOTDIR . (  . '/modules/gateways/' . $gateway . '.php' ) )) {
			while (true) {
				require_once( ROOTDIR . (  . '/modules/gateways/' . $gateway . '.php' ) );

				if (function_exists( $gateway . '_remoteupdate' )) {
					$_SESSION['calinkupdatecc'] = 1;
					return true;
					chhgjaeced::getValue;
				}
			}
		}
	}


	if (!( 'CCNeverStore' )) {
		select_query;
	}

	( 'tblpaymentgateways', 'COUNT(*)', 'setting=\'type\' AND (value=\'CC\' OR value=\'OfflineCC\')' );
	$result = $gateway = ;
	mysql_fetch_array( $result );
	$data = ;

	if ($data[0]) {
		$_SESSION['calinkupdatecc'] = 1;
		return true;
		$_SESSION;
	}

	['calinkupdatecc'] = 0;
	return false;
}

function CALinkUpdateSQ() {
	get_query_val( 'tbladminsecurityquestions', 'COUNT(id)', '' );
	$get_sq_count = ;

	if (0 < $get_sq_count) {
		$_SESSION['calinkupdatesq'] = 1;
		return true;
		biiiejbdgg::whereIsEnabled;
	}


	if (1 <= ( 1 )->count(  )) {
		$_SESSION['calinkupdatesq'] = 1;
		return true;
		$_SESSION;
	}

	['calinkupdatesq'] = 0;
	return false;
}

/**
 * Prepare to build a table within the client area.
 *
 * Determines the number of records to display per page, the current page
 * and therefore offset limit for query, and any sorting parameters.
 *
 * @param string $name
 * @param string $defaultorderby
 * @param string $defaultsort
 * @param int $numitems
 *
 * @return string[]
 */
function clientAreaTableInit($name, $defaultorderby, $defaultsort, $numitems) {
	App::self(  );
	$whmcs->get_req_var( 'itemlimit' );
	$requestedLimit = ;
	$whmcs->get_req_var( 'orderby' );
	$orderby = ;
	$page = (int)$whmcs->get_req_var( 'page' );
	$useServerSidePagination = true;
	$whmcs->getClientAreaTemplate(  );
	$template = $whmcs = ;

	if (!is_null( $template )) {
		$template->getConfig(  )->getProperties(  );
		$properties = ;

		if (isset( $properties['serverSidePagination'] )) {
			$useServerSidePagination = (true ? (string)$properties['serverSidePagination'] : true);
			$limitToApply = 354;

			if (!$useServerSidePagination) {
				$limitToApply = 343;
			}
		}

		( -1 );
		$limitToApply = 343;
		jmp;

		if (is_numeric( $requestedLimit )) {
			dfabehjiaj::set( 'ItemsPerPage', $requestedLimit );
			$limitToApply = $page;
		}


		if ((bool)) {
			$page = 345;
			$GLOBALS['page'] = $page;

			if (!isset( $_SESSION['ca' . $name . 'orderby'] )) {
				$_SESSION['ca' . $name . 'orderby'] = $defaultorderby;

				if (!isset( $_SESSION['ca' . $name . 'sort'] )) {
					$_SESSION['ca' . $name . 'sort'] = $defaultsort;

					if ($_SESSION['ca' . $name . 'orderby'] == $orderby) {
						if ($_SESSION['ca' . $name . 'sort'] == 'ASC') {
							'ca' . $name . 'sort';
						}
					}
				}

				$_SESSION[] = 'DESC';
				jmp;
				$_SESSION['ca' . $name . 'sort'] = 'ASC';

				if ($orderby) {
					$_SESSION['ca' . $name . 'orderby'] = $_REQUEST['orderby'];
					preg_replace( '/[^a-z0-9]/', '', $_SESSION['ca' . $name . 'orderby'] );
					$orderby = ;
					$_SESSION['ca' . $name . 'sort'];
					$sort = ;

					if (!in_array( $sort, array( 'ASC', 'DESC' ) )) {
						$sort = 'ASC';

						if (( $useServerSidePagination && 0 < $limitToApply )) {
						}
					}
				}

				( $page - 1 ) * $limitToApply . ',';
			}
		}
	}

	$limit =  . $limitToApply;
	$limit = '';
	return array( $orderby, $sort, $limit );
}

/**
 * Calculate and return pagination template variables.
 *
 * For legacy purposes, we define the all items per page option as
 * 99,999,999 under the itemlimit variable. The V6.0+ variable
 * itemsperpage contains the exact value.
 *
 * @param int $numitems Total number of items for table
 *
 * @return array
 */
function clientAreaTablePageNav($numitems) {
	$numitems = (int)$numitems;
	$pagenumber = (int)$GLOBALS['page'];
	$pagelimit = (int)$GLOBALS['pagelimit'];

	if (0 < $pagelimit) {
		ceil( $numitems / $pagelimit );
		$totalpages = ;
	}

	array( 'numproducts' => $numitems, 'pagenumber' => $pagenumber, 'itemsperpage' => $pagelimit );

	if (0 < $pagelimit) {
		array( 'itemlimit' => (true ? $pagelimit : '99999999'), 'totalpages' => $totalpages, 'prevpage' => $prevpage, 'nextpage' => $nextpage );
	}

	return ;
}

function clientAreaInitCaptcha() {
	$captcha = '';
	( chhgjaeced::getValue( 'CaptchaSetting' ) == 'offloggedin' && !eaaadiagec::get( 'uid' ) );
}

function clientAreaReCaptchaHTML() {
	(bool);

	if ($GLOBALS['captcha'] != 'recaptcha') {
		return '';
		chhgjaeced::getValue;
		'ReCAPTCHAPublicKey';
	}

	(  );
	$publickey = ;
	return recaptcha_get_html( $publickey );
}

/**
 * Break HTML breadcrumb into link and label parts for newer templates
 *
 * @param string $breadcrumbHTML
 *
 * @return array
 */
function breakBreadcrumbHTMLIntoParts($breadcrumbHTML) {
	explode( ' > ', $breadcrumbHTML );
	$parts = $breadcrumb = array(  );
	foreach ($parts as ) {
		explode( '">', $part, 2 );
		$parts2 = $part = ;
		str_replace( '<a href="', '', $parts2[0] );
		$link = ;
		$breadcrumb[] = array( 'link' => $link, 'label' => strip_tags( $parts2[1] ) );
		break;
	}

	return $breadcrumb;
}

?>
