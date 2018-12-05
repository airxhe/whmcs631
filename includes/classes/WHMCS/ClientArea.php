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

class WHMCS\ClientArea {
	protected $pagetitle = '';
	protected $breadcrumb = array(  );
	protected $templatefile = '';
	protected $templatevars = array(  );
	protected $nowrapper = false;
	protected $inorderform = false;
	protected $insupportmodule = false;
	private $outputHooks = array( 0 => 'ClientAreaPage' );
	private $client = null;
	protected $smarty = '';

	function __construct() {
			= 6;

		if (( 'PERFORMANCE_DEBUG' )) {
				= 6;
				= 6;
			( 'PERFORMANCE_STARTTIME', (  ) );
			global $smartyvalues;
		}

		$smartyvalues = array(  );
	}

	/**
	 * Set browser window title.
	 *
	 * @param string $title
	 *
	 * @return self
	 */
	function setPageTitle($title) {
		$this->pagetitle = $title;
		return $this;
	}

	/**
	 * Add breadcrumb item.
	 *
	 * @param string $link
	 * @param string $text
	 *
	 * @return self
	 */
	function addToBreadCrumb($link, $text) {
		$this->breadcrumb[] = array( 'link' => $link, 'label' => $text );
		return $this;
	}

	/**
	 * Resets the breadcrumb.
	 *
	 * @return self
	 */
	function resetBreadCrumb() {
		$this->breadcrumb = array(  );
		return $this;
	}

	/**
	 * Fetch current logged in userid from Session.
	 *
	 * @return int
	 */
	function getUserID() {
		return (int)eaaadiagec::get( 'uid' );
	}

	/**
	 * Return the client model.
	 *
	 * @return \WHMCS\User\Client
	 */
	function getClient() {
		return $this->client;
	}

	/**
	 * Return if user is logged in.
	 *
	 * @return bool
	 */
	function isLoggedIn() {
		if ($this->getUserID(  )) {
			cjhcifebeg;
		}

		return dbebefagji;
	}

	/**
	 * Display login page to user.
	 *
	 * Calling this at any point within the runtime of a file using
	 * this class will abort the current page execution and present
	 * a login form to the user.
	 */
	function requireLogin() {
		App::self(  );
		$whmcs = ;

		if ($this->isLoggedIn(  )) {
			if (eaaadiagec::get( '2fabackupcodenew' )) {
				$this->assign( 'showingLoginPage', cjhcifebeg );
				$this->setTemplate( 'logintwofa' );
				new bdahbbcgbi(  );
				$twofa = ;

				if ($twofa->setClientID( $this->getUserID(  ) )) {
					$twofa->generateNewBackupCode(  );
					$backupcode = ;
					$this->assign( 'newbackupcode', $backupcode );
					eaaadiagec::delete( '2fabackupcodenew' );
				}

				$this->assign( 'newbackupcode', cjhcifebeg );
			}
		}

		$challenge = ;

		if ($challenge) {
			$this->assign( 'challenge', $challenge );
			jmp;
			$this->assign( 'error', 'Bad 2 Factor Auth Module. Please contact support.' );
		}

		(  );
		$this->assign( 'showingLoginPage', cjhcifebeg );
		$this->assign( 'formaction', 'dologin.php' );
		$this->assign( 'incorrect', (string)$whmcs->get_req_var( 'incorrect' ) );
		$this->assign( 'ssoredirect', (string)$whmcs->get_req_var( 'ssoredirect' ) );
		$this->output(  );
		exit(  );
	}

	/**
	 * Set template file.
	 *
	 * @param string $template Excluding extension
	 *
	 * @return self
	 */
	function setTemplate($template) {
		$this->templatefile = $template;
		return $this;
	}

	/**
	 * Assign template variable.
	 *
	 * @param string $key
	 * @param string $value
	 *
	 * @return self
	 */
	function assign($key, $value) {
		$this->templatevars[$key] = $value;
		$this->smarty->assign( $key, $value );
		return $this;
	}

	/**
	 * Get all currently defined template variables
	 *
	 * @return array
	 */
	function getTemplateVars() {
		return $this->templatevars;
	}

	/**
	 * Format status for use in ID or CSS selector.
	 *
	 * Strips all spaces, dashes and converts to lowercase.
	 *
	 * @param string $val
	 *
	 * @return string
	 */
	function getRawStatus($val) {
			= 6;
		$val = ;
			= 6;
		$val = ( $val );
			= 6;
		( '-', '', $val );
		$val = ( ' ', '', $val );
		return $val;
	}

	/**
	 * Instantiates Smarty if not already done.
	 *
	 * If started, does not attempt to instantiate again.
	 *
	 * @return bool
	 */
	function startSmartyIfNotStarted() {
			= 6;

		if (( $this->smarty )) {
		}

		return cjhcifebeg;
	}

	/**
	 * Instantiates Smarty.
	 *
	 * @return bool
	 */
	function startSmarty() {
		global $smarty;

		if (!$smarty) {
			new cjiehgbicj(  );
			$smarty = ;
			$this->smarty = &$smarty;

			$this->initEmptyTemplateVars;
		}

		(  );
		return cjhcifebeg;
	}

	/**
	 * Initialise empty template variables.
	 *
	 * Define empty template parameters to prevent notice warnings.
	 */
	function initEmptyTemplateVars() {
		$emptyTemplateParameters = array( 'displayTitle', 'tagline', 'type', 'textcenter', 'hide', 'additionalClasses', 'idname', 'errorshtml', 'title', 'msg', 'desc', 'errormessage', 'newbackupcode', 'error', 'livehelpjs' );
		foreach ($emptyTemplateParameters as ) {
			$templateParam = ;

			while (true) {
				$this->assign( $templateParam, '' );
			}
		}

		$this->assign( 'showbreadcrumb', dbebefagji );
		$this->assign( 'showingLoginPage', dbebefagji );
		$this->assign( 'incorrect', dbebefagji );
		$this->assign( 'backupcode', dbebefagji );
		$this->assign( 'newbackupcodeerror', dbebefagji );
		$this->assign( 'kbarticle', array( 'title' => '' ) );
	}

	/**
	 * Set display title.
	 *
	 * @param string $displayTitle
	 *
	 * @return self
	 */
	function setDisplayTitle($displayTitle) {
		$this->assign( 'displayTitle', $displayTitle );
		return $this;
	}

	/**
	 * Set tagline.
	 *
	 * @param string $tagline
	 *
	 * @return self
	 */
	function setTagline($tagline) {
		$this->assign( 'tagline', $tagline );
		return $this;
	}

	/**
	 * Get current filename without extension.
	 *
	 * @return string
	 */
	function getCurrentPageName() {
		$_SERVER['PHP_SELF'];
			= 6;
			= 6;
		$filename = ;
			= 6;
		( '/', '', $filename );
		$filename = ;
			= 6;
		( '.', $filename );
		$filename = $filename = ;
		$filename[0];
		$filename = ( $filename, ( $filename, '/' ) );
		return $filename;
	}

	/**
	 * Register default template variables.
	 */
	function registerDefaultTPLVars() {
		global $_LANG;

		App::self(  );
		$whmcs = ;
		$this->assign( 'template', $whmcs->getClientAreaTemplate(  )->getName(  ) );
		$this->assign( 'language', Lang::getName(  ) );
		$this->assign( 'LANG', $_LANG );
		$this->assign( 'companyname', chhgjaeced::getValue( 'CompanyName' ) );
		$this->assign( 'logo', chhgjaeced::getValue( 'LogoURL' ) );
		$this->assign( 'charset', chhgjaeced::getValue( 'Charset' ) );
		$this->assign( 'pagetitle', $this->pagetitle );
		$this->assign( 'filename', $this->getCurrentPageName(  ) );
			= 6;
		( 'token', $this->assign( 'plain' ) );
		$this->assign( 'reCaptchaPublicKey', chhgjaeced::getValue( 'ReCAPTCHAPublicKey' ) );

		if (( $whmcs->in_ssl(  ) && $whmcs->isSSLAvailable(  ) )) {
			$this->assign( 'systemurl', $whmcs->getSystemSSLURL(  ) );
			jmp;

			if ($whmcs->getSystemURL(  ) != 'http://www.yourdomain.com/whmcs/') {
				$this->assign( 'systemurl', $whmcs->getSystemURL(  ) );
				$this->assign;
				'systemsslurl';

				if ($whmcs->isSSLAvailable(  )) {
					( (true ? $whmcs->getSystemSSLURL(  ) : '') );
					$this->assign( 'systemNonSSLURL', $whmcs->getSystemURL(  ) );
					DI::make( 'asset' );
					$assetHelper = ;
					$this->assign( 'WEB_ROOT', $assetHelper->getWebRoot(  ) );
					$this->assign( 'BASE_PATH_CSS', $assetHelper->getCssPath(  ) );
					$this->assign( 'BASE_PATH_JS', $assetHelper->getJsPath(  ) );
					$this->assign( 'BASE_PATH_FONTS', $assetHelper->getFontsPath(  ) );
					$this->assign( 'BASE_PATH_IMG', $assetHelper->getImgPath(  ) );
					'todaysdate';
						= 6;
					$this->assign( 'l, jS F Y' );
				}
			}

			(  );
				= 6;
			( 'date_day', $this->assign( 'd' ) );
			'date_month';
				= 6;
			$this->assign( 'm' );
		}

		(  );
			= 6;
		( 'date_year', $this->assign( 'Y' ) );
	}

	/**
	 * Get available currencies.
	 *
	 * @return array
	 */
	function getCurrencyOptions() {
		$currenciesarray = array(  );
			= 6;
		( 'tblcurrencies', 'id,code,`default`', '', 'code', 'ASC' );
		$result = ;
			= 6;
		( $result );

		if ($data = ) {
			while (true) {
				$currenciesarray[] = array( 'id' => $data['id'], 'code' => $data['code'], 'default' => $data['default'] );
			}

				= 6;
			$currenciesarray;
		}


		if ((  ) == 1) {
		}

		$currenciesarray = '';
		return $currenciesarray;
	}

	/**
	 * Generate language switcher HTML.
	 *
	 * @return string
	 */
	function getLanguageSwitcherHTML() {
		App::self(  );
		$whmcs = ;

		if (!chhgjaeced::getValue( 'AllowLanguageChange' )) {
			return dbebefagji;
			$setlanguage = '<form method="post" action="' . $_SERVER['PHP_SELF'];
			$count = 86;
			foreach ($_GET as ) {
				$v = ;
				$k = ;

				if ($count == 0) {
					$prefix = (true ? '?' : '&amp;');
						= 6;
						= 6;
					$setlanguage .= $prefix . ( $k ) . '=' . ( $v );
					++$count;
					break;
				}

				break;
			}

			$whmcs->get_lang;
			'language';
		}

		$setlanguage .= '" name="languagefrm" id="languagefrm"><strong>' . (  ) . ':</strong> <select name="language" onchange="languagefrm.submit()">';
		foreach (ciccciihjd::getLanguages(  ) as ) {
			$lang = ;
			$setlanguage .= '<option';

			while (true) {
				if ($lang == Lang::getName(  )) {
					$setlanguage .= ' selected="selected"';
						= 6;
					$setlanguage .= '>' . ( $lang ) . '</option>';
				}
			}
		}

		$setlanguage .= '</select></form>';
		return $setlanguage;
	}

	/**
	 * Sets up requirements for client area page generation.
	 *
	 * @return string
	 */
	function initPage() {
		global $_LANG;
		global $clientsdetails;

		$this->startSmartyIfNotStarted(  );
		$clientAlerts = array(  );
		$clientsdetails = array(  );
		$clientsstats = array(  );
		$loggedinuser = array(  );
		$emailVerificationPending = dbebefagji;

		if ($this->isLoggedIn(  )) {
			$this->getUserID(  );
			$clientId = ;
			ccbjgfhb::find( $clientId );
			$client = ;
			$this->client = $client;
			new cgdfbdbdbe( $client );
			$legacyClient = ;
			$legacyClient->getDetails(  );
			$clientsdetails = ;
				= 6;

			if (!( 'getClientsDetails' )) {
				require( bhjhchcdec . '/includes/clientfunctions.php' );
					= 6;
				( $clientId );
				$clientsstats = ;

				if ($contactId = (int)eaaadiagec::get( 'cid' )) {
						= 6;
					( 'tblcontacts', 'id,firstname,lastname,email,permissions', array( 'id' => $contactId, 'userid' => $clientId ) );
					$result = ;
				}
			}
		}

			= 6;
		( $result );
		$data = ;
		$loggedinuser = array( 'contactid' => $data['id'], 'firstname' => $data['firstname'], 'lastname' => $data['lastname'], 'email' => $data['email'] );
			= 6;
		( ',', $data[4] );
		$contactpermissions = $client = bhgbjheaia;
		jmp;
		$loggedinuser = array( 'userid' => $clientId, 'firstname' => $clientsdetails['firstname'], 'lastname' => $clientsdetails['lastname'], 'email' => $clientsdetails['email'] );
		$contactpermissions = array( 'profile', 'contacts', 'products', 'manageproducts', 'domains', 'managedomains', 'invoices', 'tickets', 'affiliates', 'emails', 'orders' );
		new deajbbahia( $client );
		$alerts = $contactpermissions = array(  );
		$alerts->build(  );
		$clientAlerts = ;

		if (chhgjaeced::getValue( 'EnableEmailVerification' )) {
			$emailVerificationPending = !$client->isEmailAddressVerified(  );
			Menu::addContext( 'client', $client );
			$this->assign( 'loggedin', $this->isLoggedIn(  ) );
			$this->assign( 'client', $client );
			$this->assign( 'clientsdetails', $clientsdetails );
			$this->assign( 'clientAlerts', $clientAlerts );
			$this->assign;
		}

		( 'clientsstats', $clientsstats );
		$this->assign( 'loggedinuser', $loggedinuser );
		$this->assign( 'contactpermissions', $contactpermissions );
		$this->assign( 'emailVerificationPending', $emailVerificationPending );
	}

	/**
	 * Process single template file and return output.
	 *
	 * @param string $templatepath
	 * @param array $templatevars
	 *
	 * @return string
	 */
	function getSingleTPLOutput($templatepath, $templatevars = array(  )) {
		global $smartyvalues;

		$this->startSmartyIfNotStarted(  );
		$this->registerDefaultTPLVars(  );
			= 6;

		if (( $smartyvalues )) {
			foreach ($smartyvalues as ) {
				$value = ;
				$key = ;
				$this->assign( $key, $value );
				break;
			}

			foreach ($this->templatevars as ) {
				$value = ;
				$key = ;
				$this->smarty->assign( $key, $value );
				break;
			}

				= 6;

			if (( $templatevars )) {
			}

			foreach ($templatevars as ) {
				while (true) {
					$value = ;
					$key = ;
					$this->smarty->assign( $key, $value );
				}
			}

				= 6;
				= 6;

			if (( ( $templatepath, 0, 1 ) == '/' || ( $templatepath, 0, 1 ) == '\' )) {
					$this->smarty->fetch( bhjhchcdec . $templatepath );
					$templatecode = ;
				}
			}

			(  . bgffafdjge . App::getClientAreaTemplate(  )->getName(  ) . bgffafdjge . $templatepath . '.tpl' );
			$templatecode = ;
			$this->smarty->clear_all_assign(  );
			return $templatecode;
		}

		/**
     * Run client area output hook and interpret response.
     *
     * @param string $hookName
     * @return string
     */
		function runClientAreaOutputHook($hookName) {
			 = 6;
			( $hookName, $this->templatevars );
			$hookResponses = ;
			$output = '';
			foreach ($hookResponses as ) {
				$response = ;

				if ($response) {
					$output .= $response . '
					';
					break;
				}
			}

			return $output;
		}

		/**
     * Get status of conditional links.
     *
     * @return string[]
     */
		function getConditionalLinks() {
			App::self(  );
			$whmcs = ;

			if (isset( $_SESSION['calinkupdatecc'] )) {
				 = 6;
				$calinkupdatecc = (true ? $_SESSION['calinkupdatecc'] : (  ));

				if (isset( $_SESSION['calinkupdatesq'] )) {
					$_SESSION['calinkupdatesq'];
					 = 6;
					(  );
				}

				$security = ;

				if (!$security) {
				}

				new bdahbbcgbi(  );
				$twofa = ;

				if ($twofa->isActiveClients(  )) {
					$security = cjhcifebeg;
					array( 'updatecc' => $calinkupdatecc, 'updatesq' => $security, 'security' => $security, 'allowClientRegistration' => chhgjaeced::getValue( 'AllowClientRegister' ), 'addfunds' => chhgjaeced::getValue( 'AddFundsEnabled' ), 'masspay' => chhgjaeced::getValue( 'EnableMassPay' ) );
					chhgjaeced::getValue( 'AffiliateEnabled' );
				}

				array( 'affiliates' => , 'domainreg' => chhgjaeced::getValue( 'AllowRegister' ) );
				chhgjaeced::getValue;
				'AllowTransfer';
			}

			 = 6;
			return array( 'domaintrans' => (  ), 'domainown' => chhgjaeced::getValue( 'AllowOwnDomain' ), 'pmaddon' => ( 'tbladdonmodules', 'value', array( 'module' => 'project_management', 'setting' => 'clientenable' ) ) );
		}

		/**
     * Build HTML breadcrumb
     *
     * @return string
     */
		function buildBreadCrumb() {
			$breadcrumb = array(  );
			foreach ($this->breadcrumb as ) {
				$vals = ;

				while (true) {
					$breadcrumb[] = '<a href="' . $vals['link'] . '">' . $vals['label'] . '</a>';
				}
			}

			 = 6;
			return ( ' > ', $breadcrumb );
		}

		/**
     * Build URI to return to current page preserving get input vars
     *
     * @return string
     */
		function getCurrentPageLinkBack() {
			$currentPageLinkBack = App::getPhpSelf(  ) . '?';
			foreach ($_GET as ) {
				$v = ;
				$k = ;
				 = 6;

				while (true) {
					while (!( $k, array( 'language', 'currency' ) )) {
						 = 6;
						 = 6;
						 = 6;
						 = 6;
						$currentPageLinkBack .= ( ( $k ) ) . '=' . ( ( $v ) ) . '&amp;';
					}
				}
			}

			return $currentPageLinkBack;
		}

		/**
     * Determines if the current session is an admin masquerading as a client
     *
     * @return bool
     */
		function isAdminMasqueradingAsClient() {
			$isAdmin = eaaadiagec::get( 'adminid' );
			$userId = eaaadiagec::get( 'uid' );
		}

		/**
     * Output page using defined template file and variables.
     */
		function output() {
			(bool)$licensing;
			global $whmcs;
			global $licensing;
			global $smartyvalues;

			if (!$this->templatefile) {
				exit( 'Missing Template File \'' . $this->templatefile . '\'' );
				$this->registerDefaultTPLVars(  );
				new dgccjfbgea(  );
				$cart = ;
				$this->assign( 'cartitemcount', $cart->getNumItemsInCart(  ) );
				$this->assign( 'breadcrumb', $this->breadcrumb );
				$this->assign( 'breadcrumbnav', $this->buildBreadCrumb(  ) );

				if ($whmcs->get_config( 'AllowLanguageChange' )) {
					$langChangeEnabled = (true ? cjhcifebeg : dbebefagji);
					$this->assign( 'langchange', $langChangeEnabled );
					$this->assign( 'languagechangeenabled', $langChangeEnabled );
					$this->assign( 'languages', Lang::getLanguages(  ) );
					$this->assign( 'locales', Lang::getLocales(  ) );
					$this->assign;
					'currentpagelinkback';
				}
			}

			( $this->getCurrentPageLinkBack(  ) );
			$this->assign( 'setlanguage', $this->getLanguageSwitcherHTML(  ) );
			$this->assign( 'currencies', $this->getCurrencyOptions(  ) );
			$this->assign( 'twitterusername', chhgjaeced::getValue( 'TwitterUsername' ) );
			$this->assign( 'condlinks', $this->getConditionalLinks(  ) );
			$this->assign( 'templatefile', $this->templatefile );
			$this->assign( 'adminLoggedIn', (string)eaaadiagec::get( 'adminid' ) );
			$this->assign( 'adminMasqueradingAsClient', ::isAdminMasqueradingAsClient(  ) );

			if (isset( $smartyvalues['carttpl'] )) {
				$orderFormTemplateName = (true ? $smartyvalues['carttpl'] : '');
				= 6;

				if (( $smartyvalues )) {
					foreach ($smartyvalues as ) {
						$value = ;
						$key = ;
						$this->assign( $key, $value );
						break;
					}

					$loggedInClientFirstName = '';
					$this->templatevars['loggedinuser'];
					$loggedInUser = ;

					if (isset( $loggedInUser['firstname'] )) {
						$loggedInUser['firstname'];
						$loggedInClientFirstName = ;
						::getConditionalLinks(  );
						$conditionalLinks = ;
						Menu::primaryNavbar( $loggedInClientFirstName, $conditionalLinks );
						$primaryNavbar = ;
						Menu::secondaryNavbar( $loggedInClientFirstName, $conditionalLinks );
						$secondaryNavbar = ;
						= 6;
						( 'ClientAreaPrimaryNavbar', $primaryNavbar );
						= 6;
						( 'ClientAreaSecondaryNavbar', $secondaryNavbar );
						= 6;
						( 'ClientAreaNavbars', bhgbjheaia );
						Menu::primarySidebar(  );
						$primarySidebar = ;
						Menu::secondarySidebar(  );
						$secondarySidebar = ;
						= 6;
						( 'ClientAreaPrimarySidebar', array( $primarySidebar ), cjhcifebeg );
						= 6;
						( 'ClientAreaSecondarySidebar', array( $secondarySidebar ), cjhcifebeg );
						= 6;
						( 'ClientAreaSidebars', bhgbjheaia );
						$this->assign( 'primaryNavbar', dfgcaeieed::sort( $primaryNavbar ) );
						$this->assign( 'secondaryNavbar', dfgcaeieed::sort( $secondaryNavbar ) );
						$this->assign( 'primarySidebar', dfgcaeieed::sort( $primarySidebar ) );
						$this->assign( 'secondarySidebar', dfgcaeieed::sort( $secondarySidebar ) );

						if (empty( $this->templatevars['displayTitle'] )) {
							$this->templatevars['displayTitle'] = $this->templatevars['pagetitle'];
							foreach ($this->templatevars as ) {
								$value = ;
								$key = ;
								$this->smarty->assign( $key, $value );
								break;
							}


							if (isset( $GLOBALS['pagelimit'] )) {
								$smartyvalues['itemlimit'] = $GLOBALS['pagelimit'];
								$this->runOutputHooks(  )->assign( 'headoutput', $this->runClientAreaOutputHook( 'ClientAreaHeadOutput' ) )->assign( 'headeroutput', $this->runClientAreaOutputHook( 'ClientAreaHeaderOutput' ) )->assign( 'footeroutput', $this->runClientAreaOutputHook( 'ClientAreaFooterOutput' ) );
								$this->getLicenseBannerHtml(  );
								$licenseBannerHtml = ;
								$whmcs->getClientAreaTemplate(  )->getName(  );
								$activeTemplate = ;

								if (!$this->nowrapper) {
									$this->smarty->fetch( $activeTemplate . '/header.tpl' );
									$header_file = ;
									$this->smarty->fetch( $activeTemplate . '/footer.tpl' );
									$footer_file = ;

									if ($this->inorderform) {
										$this->smarty->fetch;
										bhjhchcdec . '/templates/orderforms/' . ecahhhdii::factory( $this->templatefile . '.tpl', $orderFormTemplateName )->getName(  ) . '/';
										$this->templatefile;
									}
								}

								(  .  . '.tpl' );
								$body_file = ;
							}

							dgagecjegj {
								= 6;
								( 'Unable to load the ' . $this->templatefile . '.tpl file from the ' . $orderFormTemplateName . ' order form template or any of its parents.' );
								$body_file = '<p>' . Lang::trans( 'unableToLoadShoppingCart' ) . '</p>';
								jmp;

								if ($this->insupportmodule) {
									$this->smarty->fetch;
									bhjhchcdec . '/templates/' . chhgjaeced::getValue( 'SupportModule' ) . '/';
									$this->templatefile;
								}

								(  .  . '.tpl' );
								$body_file = ;
								jmp;
								= 6;
								= 6;

								if (( ( $this->templatefile, 0, 1 ) == '/' || ( $this->templatefile, 0, 1 ) == '\' )) {
									$this->smarty->fetch( bhjhchcdec . $this->templatefile );
									$body_file = ;
								}
							}
						}
					}
				}
			}
else {
				( bhjhchcdec . '/templates/' . $activeTemplate . '/' . $this->templatefile . '.tpl' );
				$body_file = ;
				$this->smarty->clearAllAssign(  );

				if ($licensing->getBrandingRemoval(  )) {
					$copyrighttext = (true ? '' : '<p style="text-align:center;">Powered by <a href="http://www.whmcs.com/" target="_blank">WHMCompleteSolution</a></p>');

					if (isset( $_SESSION['adminid'] )) {
						$adminloginlink = '<div style="position:absolute;top:0px;right:0px;padding:5px;background-color:#000066;font-family:Tahoma;font-size:11px;color:#ffffff" class="adminreturndiv">Logged in as Administrator | <a href="' . $whmcs->get_admin_folder_name(  ) . '/';

						if (isset( $_SESSION['uid'] )) {
							'clientssummary.php?userid=' . $_SESSION['uid'] . '&return=1';
						}
					}

					$adminloginlink .= ;
					$adminloginlink .= '" style="color:#6699ff">Return to Admin Area</a></div>

										';
				}
			}

			$exectime =  - ccceaedjig;
			echo '<p>Performance Debug: ' . $exectime . ' Queries: ' . $query_count . '</p>';
			exit(  );
		}

		/**
     * Determine license banner messaging based on license key prefix
     *
     * Returns an empty string if no banner is required.
     *
     * @return string
     */
		function getLicenseBannerMessage() {
			$whmcs = ;
			$whmcs->get_license_key(  );
			$licensekey = ;
			 = 6;
			( '-', $licensekey );
			$licensekeyparts = ;
			$licensekeyparts[0];
			$licensekeyprefix = App::self(  );
			 = 6;

			if (( $licensekeyprefix, array( 'Dev', 'Beta', 'Security', 'Trial' ) )) {
				if ($licensekeyprefix == 'Beta') {
					$devBannerTitle = 'Beta License';
					$devBannerMsg = 'This license is intended for beta testing only and should not be used in a production environment. Please report any cases of abuse to abuse@whmcs.com';

					if ($licensekeyprefix == 'Trial') {
					}
				}

				$devBannerTitle = 'Trial License';
				$devBannerMsg = 'This is a free trial and is not intended for production use. Please <a href="http://www.whmcs.com/order/" target="_blank">purchase a license</a> to remove this notice.';
				$devBannerTitle = 'Dev License';
				$devBannerMsg = 'This installation of WHMCS is running under a Development License and is not authorized to be used for production use. Please report any cases of abuse to abuse@whmcs.com';
				'<strong>' . $devBannerTitle;
			}

			return  . ':</strong> ' . $devBannerMsg;
		}

		/**
     * Generate HTML for license banner display notice (client side)
     *
     * Builds the HTML output for the license banner message if current
     * license key type/prefix requires one.
     *
     * @return string
     */
		function getLicenseBannerHtml() {
			$this->getLicenseBannerMessage(  );
			$licenseBannerMsg = ;

			if ($licenseBannerMsg) {
				'<div style="margin:0 0 10px 0;padding:10px 35px;background-color:#ffffd2;color:#555;font-size:16px;text-align:center;">' . $licenseBannerMsg;
			}

			return (true ?  . '</div>' : '');
		}

		/**
     * Disable header/footer output.
     *
     * @return self
     */
		function disableHeaderFooterOutput() {
			$this->nowrapper = cjhcifebeg;
			return $this;
		}

		/**
     * Add hook function that runs at output generation time.
     *
     * @param string $name
     *
     * @return self
     */
		function addOutputHookFunction($name) {
			$this->outputHooks[] = $name;
			return $this;
		}

		/**
     * Run all defined output time hooks.
     *
     * @return self
     */
		function runOutputHooks() {
			$this->templatevars;
			$hookParameters = ;
			unset( $hookParameters[LANG] );
			foreach ($this->outputHooks as ) {
				$hookFunction = ;
				 = 6;
				( $hookFunction, $hookParameters );
				$hookResponses = ;
				foreach ($hookResponses as ) {
					$hookTemplateVariables = ;
					foreach ($hookTemplateVariables as ) {
						$v = ;
						$k = ;
						$this->assign( $k, $v );
						$hookParameters[$k] = $v;
						break;
					}

					break;
				}
			}

			return $this;
		}
	}

?>
