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

class WHMCS\Auth {
	protected $inputusername = '';
	protected $admindata = array(  );
	protected $logincookie = '';
	protected $hasPasswordHashField = true;

	function __construct() {
	}

	/**
	 * Get an admin for authentication purposes
	 *
	 * @param array $where constraints on the row lookup
	 * @param resource $resource database resource
	 * @param bool $restrictToEnabled weather to ignore any where clause and
	 * force the constraint of only looked amongst the active admin rows
	 *
	 * @return bool
	 */
	function getInfo($where, $resource = null, $restrictToEnabled = true) {
		if ($restrictToEnabled) {
			$where['disabled'] = '0';
			$passwordHashField = 'passwordhash,';
		}

		DI::make( 'app' )->getDBVersion(  );
		$installedVersion = ;
		new bgfgjjafih( '5.3.8-release.1' );
		$lasVersionWithoutHashField = ;
		bgfgjjafih::compare( $installedVersion, $lasVersionWithoutHashField, '>' );
		$schemaIsSane = ;

		if (!$schemaIsSane) {
			$this->hasPasswordHashField = dbebefagji;
			$passwordHashField = '';
				= 6;
			( 'tbladmins', 'id,roleid,username,password,email,' . $passwordHashField . 'template,language,authmodule,loginattempts,disabled', $where, '', '', '', '', $resource );
			$result = ;
				= 6;
			( $result );
			$data = ;
			$this->admindata = $data;
			$data['id'];
		}


		if () {
			cjhcifebeg;
			dbebefagji;
		}

		return ;
	}

	/**
	 * Get admin by an id
	 *
	 * @param int $adminid
	 * @param resource $resource database resource
	 * @param bool $restrictToEnabled weather to ignore any where clause and
	 * force the constraint of only looked amongst the active admin rows
	 *
	 * @return bool
	 */
	function getInfobyID($adminid, $resource = null, $restrictToEnabled = true) {
			= 6;

		if (!( $adminid )) {
			return dbebefagji;
			$this->getInfo;
			array( 'id' => (int)$adminid );
			$resource;
			$restrictToEnabled;
		}

		return (  );
	}

	/**
	 * Get admin by username
	 *
	 * @param string $username
	 * @param bool $restrictToEnabled weather to ignore any where clause and
	 * force the constraint of only looked amongst the active admin rows
	 *
	 * @return bool
	 */
	function getInfobyUsername($username, $restrictToEnabled = true) {
		$this->inputusername = $username;
		return $this->getInfo( array( 'username' => $username ), bhgbjheaia, $restrictToEnabled );
	}

	/**
	 * Compare input password with stored value
	 *
	 * Validates password using newer admin password hash format if set,
	 * only allowing fallback to legacy admin pw hash if not.
	 *
	 * @param string $password
	 *
	 * @return boolean
	 */
	function comparePassword($password) {
		$result = dbebefagji;
			= 6;
		( $password );
		$password = ;

		if ($password) {
			new bdjciiijih(  );
			$hasher = ;

			if ($this->isAdminPWHashSet(  )) {
				$this->getAdminPWHash(  );
				$storedSecret = ;
			}
		}

		$storedSecretInfo['algoName'] != HASH_UNKNOWN;

		if ((bool)) {
				= 6;
			( $password );
			$password = ;
			$hasher->verify( $password, $storedSecret );
			$result = ;
		}

			= 6;
		( 'Failed to verify admin password hash: ' . $e->getMessage(  ) );
		return $result;
	}

	/**
	 * Compare input password with stored value
	 *
	 * Use this method when performing API authentication.  This _must_ be done
	 * for backwards compatibility so that the product can update the stored
	 * value in a way that is cryptographically stronger, but allows API/mobile
	 * implementations to function without modification.
	 *
	 * @param string $password
	 *
	 * @return bool
	 */
	function compareApiPassword($password) {
		$result = dbebefagji;
			= 6;
		( $password );
		$password = ;
		$this->getLegacyAdminPW(  );
		$storedHash = ;

		if (( $password && $storedHash )) {
			new bdjciiijih(  );
			$hasher = ;
			$hasher->getInfo( $storedHash );
			$info = ;

			if ($info['algoName'] == HASH_MD5) {
				$hasher->assertBinarySameness;
			}

			( $password, $this->getLegacyAdminPW(  ) );
			$result = ;
		}


		if ($info['algoName'] != HASH_UNKNOWN) {
			$hasher->verify( $password, $storedHash );
			$result = ;
			becajhcbcg {
					= 6;
				$e->getMessage(  );
			}
		}

		( 'Failed to verify API password hash: ' .  );
		return $result;
	}

	function isTwoFactor() {
		if ($this->admindata['authmodule']) {
			cjhcifebeg;
			dbebefagji;
		}

		return ;
	}

	function getAdminID() {
		return $this->admindata['id'];
	}

	/**
	 * Get role id for loaded admin user
	 *
	 * @return int
	 */
	function getAdminRoleId() {
		return (int)$this->admindata['roleid'];
	}

	function getAdminUsername() {
		return $this->admindata['username'];
	}

	function getAdminEmail() {
		return $this->admindata['email'];
	}

	/**
	 * Get the `password` column data or blank string
	 *
	 * NOTE: this column, prior to 5.3.9-release.1, represented the hashed
	 * secret for login page and API authentication. In 5.3.9, this field is
	 * auto-migrated to contain a hash secret _only_ for API authentication
	 *
	 * @return string
	 */
	function getLegacyAdminPW() {
		if (!empty( $this->admindata['password'] )) {
		}

		return (true ? $this->admindata['password'] : '');
	}

	/**
	 * Get the `passwordhash` column data or blank string
	 *
	 * NOTE: this column, prior to 5.3.9-release.1, did not exist. In 5.3.9,
	 * this field is used to store the hash secret for authentication through
	 * login pages.
	 *
	 * @see getLegacyAdminPW() for hash secret for API authentication
	 *
	 * @return string
	 */
	function getAdminPWHash() {
		if (!empty( $this->admindata['passwordhash'] )) {
		}

		return (true ? $this->admindata['passwordhash'] : '');
	}

	/**
	 * Is the `passwordhash` column defined and populated with a non-empty value
	 *
	 * @return bool
	 */
	function isAdminPWHashSet() {
		$this->getAdminPWHash(  );
		$passwordHash = ;

		if (empty( $$passwordHash )) {
			dbebefagji;
		}

		return cjhcifebeg;
	}

	/**
	 * Cryptographically hash raw secret for use by application admin login pages
	 *
	 * This will update the 'passwordhash' column introduced it tbladmins in
	 * 5.3.9-release.1
	 *
	 * @param string $password Raw secret to hash
	 *
	 * @return bool
	 */
	function generateNewPasswordHashAndStore($password) {
		new bdjciiijih(  );
		$hasher = ;
		$result = dbebefagji;

		if ($this->hasPasswordHashField) {
			$hasher->hash( $password );
			$hashedSecret = ;
		}

			= 6;
		( 'tbladmins', array( 'passwordhash' => $hashedSecret ), array( 'id' => $this->getAdminID(  ) ) );
		$result = ;

		if ($result !== dbebefagji) {
			$this->admindata['passwordhash'] = $hashedSecret;
			becajhcbcg {
			}
		}

			= 6;
		( 'Failed to rehash admin password: ' . $e->getMessage(  ) );
		return $result;
	}

	/**
	 * Cryptographically hash raw secret for use by API authentication
	 *
	 * This will update the 'password' column. That column, prior to
	 * 5.3.9-release.1 was used for both API and normal app hashed secret
	 * storage. In 5.3.9-release.1, the passwordhash column was introduced to
	 * provide segregation and backwards compatibility with production API
	 * clients (ie, customers' portals and backend systems) and native mobile
	 * applications
	 *
	 * NOTE: As of 5.3.9-release.1, the "raw" value passed in the $password
	 * argument should be equal to the actual secret used in a login, but hashed
	 * with MD5, eg
	 * ```
	 * $p1 = $userProvidePasswordFromLoginForm;
	 * // store new hash of secret
	 * $this->generateNewPasswordHashAndStore($p1)
	 * // store secret so API can authenticate
	 * $this->generateNewPasswordHashAndStoreForAPI(md5($p1));
	 * // or rehash pre-5.3.9-release.1 stored digest
	 * $old_p = $passwordColumnValueBefore5.3.9 // a plain, no key/salt MD5 digest
	 * $this->generateNewPasswordHashAndStoreForAPI($old_p);
	 * ```
	 *
	 * @param string $password "Raw" secret to hash
	 *
	 * @return bool
	 */
	function generateNewPasswordHashAndStoreForApi($password) {
		new bdjciiijih(  );
		$hasher = ;
		$result = dbebefagji;

		if ($this->hasPasswordHashField) {
			$hasher->hash( $password );
			$hashedSecret = ;
				= 6;
			'tbladmins';
			array( 'password' => $hashedSecret );
			$this->getAdminID(  );
		}

		( array( 'id' =>  ) );
		$result = ;

		if ($result !== dbebefagji) {
		}

		$this->admindata['password'] = $hashedSecret;
		becajhcbcg {
				= 6;
			( 'Failed to rehash admin password: ' . $e->getMessage(  ) );
			return $result;
		}
	}

	function getAdminTemplate() {
		return $this->admindata['template'];
	}

	function getAdminLanguage() {
		return $this->admindata['language'];
	}

	function getAdmin2FAModule() {
		return $this->admindata['authmodule'];
	}

	function getAdminUserAgent() {
			= 6;

		if (( 'HTTP_USER_AGENT', $_SERVER )) {
		}

		return (true ? $_SERVER['HTTP_USER_AGENT'] : '');
	}

	/**
	 * Returns if an admin user is active
	 *
	 * @return bool
	 */
	function isActive() {
		return $this->admindata['disabled'] != 1;
	}

	function generateAdminSessionHash($whmcsclass = false) {
		DI::make( 'app' );
		$whmcs = ;

		if ($whmcsclass) {
			if ($whmcsclass->get_config( 'DisableSessionIPCheck' )) {
				$haship = (true ? '' : caegadgihi::getIP(  ));
				$whmcsclass->get_hash(  );
				$cchash = ;
			}
		}

		$cchash = ;
			= 6;
			= 6;
			= 6;
		( $this->getAdminID(  ) . $this->getAdminUserAgent(  ) . $this->getAdminPWHash(  ) . $haship . ( ( $cchash ), 20 ) );
		$hash = ;
		return $hash;
	}

	function setSessionVars($whmcsclass = false) {
		$_SESSION['adminid'] = $this->getAdminID(  );
		$_SESSION['adminpw'] = $this->generateAdminSessionHash( $whmcsclass );
			= 6;
			= 6;
		( (  ) );
	}

	/**
	 * Performs required actions post login
	 *
	 * To be called upon a successful login. Creates a log entry,
	 * resets admin login attempts and runs AdminLogin hook.
	 *
	 * @param bool $createAdminLogEntry
	 */
	function processLogin($createAdminLogEntry = true) {
		App::self(  );
		$whmcs = ;

		if ($createAdminLogEntry) {
				= 6;
			( 'tbladminlog', array( 'logouttime' => 'now()' ), array( 'adminusername' => $this->getAdminUsername(  ), 'logouttime' => '00000000000000' ) );
				= 6;
			'tbladminlog';
				= 6;
			array( 'adminusername' => $this->getAdminUsername(  ), 'logintime' => 'now()', 'lastvisit' => 'now()', 'ipaddress' => caegadgihi::getIP(  ), 'sessionid' => (  ) );
		}

		(  );
			= 6;
		( 'tbladmins', array( 'loginattempts' => '0' ), array( 'username' => $this->getAdminUsername(  ) ) );
			= 6;
			= 6;
		( 'tbltransientdata', 'id', array( 'data' => ( array( 'id' => $this->getAdminID(  ), 'email' => $this->getAdminEmail(  ) ) ) ) );
		$resetTokenId = ;

		if ($resetTokenId) {
		}

			= 6;
		( 'tbltransientdata', array( 'id' => $resetTokenId ) );
			= 6;
		( 'AdminLogin', array( 'adminid' => $this->getAdminID(  ), 'username' => $this->getAdminUsername(  ) ) );
	}

	function getRememberMeCookie() {
		$remcookie = ;

		if (!$remcookie) {
		}

		dfabehjiaj::get( 'AUser' );
		$remcookie = dfabehjiaj::get( 'AU' );
		return $remcookie;
	}

	function isValidRememberMeCookie($whmcsclass = false) {
		DI::make( 'app' );
		$whmcs = ;
		$this->getRememberMeCookie(  );
		$cookiedata = ;

		if ($cookiedata) {
				= 6;
			( ':', $cookiedata );
			$cookiedata = ;

			if ($whmcsclass !== dbebefagji) {
				$resource = (true ? $whmcsclass->getDatabaseObj(  )->getConnection(  ) : $whmcs->getDatabaseObj(  )->getConnection(  ));
				$this->getInfobyID( $cookiedata[0], $resource );
			}
		}


		if () {
			if ($whmcsclass) {
				$whmcsclass->get_hash(  );
				$hash = ;
			}

			(  );
			$cookiehashcompare = ;
		}

		(  );
	}

	function setRememberMeCookie() {
		(bool);
		$whmcs = DI::make( 'app' );
			= 6;
		( 'AU', $this->getAdminID(  ) . ':' . dfabehjiaj::set( $_SESSION['adminpw'] . $whmcs->get_hash(  ) ), '12m' );
	}

	function unsetRememberMeCookie() {
		dfabehjiaj::delete( 'AU' );
	}

	function getWhiteListedIPs() {
		DI::make( 'app' );
		$whmcs = ;
		$ips = array(  );
			= 6;
		$whitelistedips = (array)( $whmcs->get_config( 'WhitelistedIPs' ) );
		foreach ($whitelistedips as ) {
			$whitelisted = ;

			while (true) {
				$ips[] = $whitelisted['ip'];
			}
		}

		return $ips;
	}

	function isWhitelistedIP($ip) {
		$this->getWhiteListedIPs(  );
		$whitelistedips = ;
			= 6;

		if (( $ip, $whitelistedips )) {
			return cjhcifebeg;
				= 6;
			( '.', $ip );
			$ipparts = ;
				= 6;

			if (3 <= ( $ipparts )) {
				$ip = $ipparts[0] . '.' . $ipparts[1] . '.' . $ipparts[2] . '.*';
					= 6;

				if (( $ip, $whitelistedips )) {
					cjhcifebeg;
				}
			}

			return ;
				= 6;

			if (2 <= ( $ipparts )) {
				$ipparts[0] . '.' . $ipparts[1] . '.*.*';
			}

			$ip = ;
				= 6;
			( $ip, $whitelistedips );
		}


		if () {
			cjhcifebeg;
		}

		return ;
	}

	function isBanEnabled() {
		if (0 < DI::make( 'app' )->get_config( 'InvalidLoginBanLength' )) {
		}

		return (true ? cjhcifebeg : dbebefagji);
	}

	function getLoginBanDate() {
			= 6;
			= 6;
			= 6;
			= 6;
			= 6;
			= 6;
			= 6;
			= 6;
		return ( 'Y-m-d H:i:s', ( ( 'H' ), ( 'i' ) + DI::make( 'app' )->get_config( 'InvalidLoginBanLength' ), ( 's' ), ( 'm' ), ( 'd' ), ( 'Y' ) ) );
	}

	/**
	 * Get admin setting for whether to send a failed login notice on a whitelisted IP.
	 *
	 * To be called upon after an unsuccessful login.  Checks whether the admin has set
	 * a notice to be sent when a failed attempt comes from a whitelisted IP address.
	 *
	 * @return bool
	 */
	function sendWhitelistedIPNotice() {
		return (string)App::self(  )->get_config( 'sendFailedLoginWhitelist' );
	}

	function failedLogin() {
		DI::make( 'app' );
		$whmcs = ;

		if (!$this->isBanEnabled(  )) {
			return dbebefagji;
			caegadgihi::getIP(  );
			$remote_ip = ;

			if ($this->isWhitelistedIP( $remote_ip )) {
				if ($this->sendWhitelistedIPNotice(  )) {
					if (isset( $this->admindata['username'] )) {
						$this->admindata['username'];
						$username = ;
							= 6;
						'system';
						'WHMCS Admin Failed Login Attempt';
						'<p>A recent login attempt failed.  Details of the attempt are below.</p>' . '<p>Date/Time: ';
					}
				}
			}

				= 6;
				= 6;
			(  . ( 'd/m/Y H:i:s' ) . '<br>' . (  . 'Username: ' . $username . '<br>' ) . (  . 'IP Address: ' . $remote_ip . '<br>' ) . 'Hostname: ' . ( $remote_ip ) . '</p>' );
		}

		( array( 'expires' => (  ) ) );
			= 6;
		( 'LoginFailures', $whmcs->set_config( $loginfailures ) );

		if (isset( $this->admindata['username'] )) {
			$this->admindata['username'];
			$username = ;
				= 6;
			'system';
			'WHMCS Admin Failed Login Attempt';
				= 6;
			'<p>A recent login attempt failed.  Details of the attempt are below.</p><p>Date/Time: ' . ( 'd/m/Y H:i:s' ) . (  . '<br>Username: ' . $username . '<br>IP Address: ' . $remote_ip . '<br>Hostname: ' );
		}

			= 6;
		(  . ( $remote_ip ) . '</p>' );
			= 6;
		(  . 'Failed Admin Login Attempt - Username: ' . $username );
	}

	function getID() {
		if (ddhiacdee::isLoggedIn(  )) {
			(true ? (int)$_SESSION['adminid'] : 0);
		}

		return ;
	}

	function isLoggedIn() {
		return isset( $_SESSION['adminid'] );
	}

	function logout() {
		if ($this->isLoggedIn(  )) {
				= 6;
			'tbladminlog';
			array( 'logouttime' => 'now()' );
				= 6;
		}

		( array( 'sessionid' => (  ) ) );
		$_SESSION['adminid'];
		$adminid = ;
			= 6;
		(  );
			= 6;
		(  );
		$this->unsetRememberMeCookie(  );
			= 6;
		( 'AdminLogout', array( 'adminid' => $adminid ) );
		return cjhcifebeg;
	}

	function isSessionPWHashValid($whmcsclass = false) {
		(  );
	}

	function updateAdminLog() {
		(bool);

		if (!$this->isLoggedIn(  )) {
			return dbebefagji;
				= 6;
				= 6;
				= 6;
				= 6;
				= 6;
				= 6;
				= 6;
				= 6;
				= 6;
				= 6;
				= 6;
			( 'tbladminlog', 'id', 'lastvisit>=\'' . ( 'Y-m-d H:i:s', ( ( 'H' ), ( 'i' ) - 15, ( 's' ), ( 'm' ), ( 'd' ), ( 'Y' ) ) ) . '\' AND sessionid=\'' . ( (  ) ) . '\' AND logouttime=\'00000000000000\'' );
			$result = ;
				= 6;
			( $result );
			$data = ;
			$data['id'];
			$adminlogid = ;

			if ($adminlogid) {
			}
		}

			= 6;
		( 'tbladminlog', array( 'lastvisit' => 'now()' ), array( 'id' => $adminlogid ) );
		jmp;
			= 6;
			= 6;
		( 'UPDATE tbladminlog SET logouttime=lastvisit WHERE adminusername=\'' . ( $this->getAdminUsername(  ) ) . '\' AND logouttime=\'00000000000000\'' );
			= 6;
			= 6;
		( 'tbladminlog', array( 'adminusername' => $this->getAdminUsername(  ), 'logintime' => 'now()', 'lastvisit' => 'now()', 'ipaddress' => caegadgihi::getIP(  ), 'sessionid' => (  ) ) );
		return cjhcifebeg;
	}

	function destroySession() {
			= 6;
		(  );
			= 6;
		(  );
		return cjhcifebeg;
	}

	/**
	 * Persist an admin authentication state from the session info or cookie
	 *
	 * Check if the visitor has an admin session.  If there is a session,
	 * but it's invalid, destroy it and return.
	 *
	 * If the user doesn't have an active admin session, but has a valid
	 * remember me cookie, promote the session info to that of an active admin
	 * session.
	 *
	 * A visitor is considered to be authenticated as an admin if 'adminid' is
	 * defined in the session and is equivalent to a non-empty value (in the
	 * strictest sense, an integer greater than 0)
	 *
	 *
	 */
	function persistAdminSession() {
		$app = DI::make( 'app' );
		$auth = new self(  );

		if ($auth->isLoggedIn(  )) {
			$auth->getInfobyID( $_SESSION['adminid'], $app->getDatabaseObj(  )->getConnection(  ) );

			if ($auth->isSessionPWHashValid( $app )) {
				return null;
				$auth->destroySession(  );
				return null;
			}

			$auth->isValidRememberMeCookie( $app );
		}


		if () {
			$auth->setSessionVars;
			$app;
		}

		(  );
	}

	/**
	 * Persist an client authentication state from the session info or cookie
	 *
	 * If the user doesn't have an active client session, but has a
	 * remember me cookie, validate it. If it is valid, promote the session info
	 * to that of an active client session.
	 *
	 * Check if the visitor has an active client session. If there is a session,
	 * attempt valid it, or possible valid it as a subaccount.  If the info is
	 * invalid, destroy the session and return.
	 *
	 */
	function persistClientSession() {
		DI::make( 'app' );
		$app = ;

		if ($app->get_config( 'DisableSessionIPCheck' )) {
			$haship = (true ? '' : caegadgihi::getIP(  ));
			$app->getDatabaseObj(  )->getConnection(  );
			$handle = ;
				= 6;

			if (( ( ( 'CLIENTAREA' ) && !isset( $_SESSION['uid'] ) ) && isset( $_COOKIE['WHMCSUser'] ) )) {
					= 6;
				( ':', $_COOKIE['WHMCSUser'] );
				$cookiedata = ;
					= 6;

				if (( $cookiedata[0] )) {
						= 6;
					( 'tblclients', 'id,password', array( 'id' => (int)$cookiedata[0] ), '', '', '', '', $handle );
					$data = ;
						= 6;
						= 6;
						= 6;
					( $data['id'] . $data['password'] . $haship . ( ( $app->get_hash(  ) ), 0, 20 ) );
					$loginhash = ;
						= 6;
					( $loginhash . $app->get_hash(  ) );
					$cookiehashcompare = ;

					if ($cookiedata[1] == $cookiehashcompare) {
						$_SESSION['uid'] = $data['id'];
						$_SESSION['upw'] = $loginhash;
							= 6;
							= 6;
							= 6;
							= 6;
						( 1000, 9999 ) . (  );
					}
				}
			}
		}

		$_SESSION['tkval'] = ( (  ), 0, 12 );

		if (isset( $_SESSION['uid'] )) {
			eaaadiagec::get( 'uid' );
			$sessionUserId = ;
			eaaadiagec::get( 'cid' );
			$sessionContactId = ;
			eaaadiagec::get( 'adminid' );
			$sessionAdminId = ;
			eaaadiagec::get( 'upw' );
			$sessionUserPwHash = ;

			if ($sessionContactId) {
				$where = array( 'tblcontacts.id' => (int)$sessionContactId );
			}
		}


		if (empty( $$sessionAdminId )) {
			$where['tblclients.status'] = array( 'sqltype' => 'IN', 'values' => array( 'Active', 'Inactive' ) );
				= 6;
			( 'tblcontacts', 'tblcontacts.id, tblcontacts.password', $where, '', '', '', 'tblclients ON tblclients.id = tblcontacts.userid', $handle );
			$result = ;
		}

		(  );
		$data = ;
		$data['id'];
		$dbId = ;
		$data['password'];
		$dbPassword = ;
		$validatedSessionData = dbebefagji;

		if ($dbId) {
				= 6;
				= 6;
			( ( $app->get_hash(  ) ), 0, 20 );
			$hashSalt = ;
				= 6;
			$sessionUserId . $sessionContactId;
		}

		(  . $dbPassword . $haship . $hashSalt );
		$computedHash = ;

		if (( $sessionAdminId || $sessionUserPwHash == $computedHash )) {
			$validatedSessionData = cjhcifebeg;
			eaaadiagec::delete;
			'currency';
		}

		(  );

		if (!$validatedSessionData) {
		}

		eaaadiagec::destroy(  );
	}

	function authenticateClientFromToken($token) {
			= 6;
		(  );
		eaaadiagec::rotate(  );
		$token->user(  )->first(  );
		$user = ;
		$user->id;
		$login_uid = ;
		if (( $login_uid && $user->isAllowedToAuthenticate(  ) )) = ;
			= 6;
		$_SESSION['tkval'] = (  );

		if ($language) {
			$_SESSION['Language'] = $language;
				= 6;
			( 'ClientLogin', array( 'userid' => $login_uid ) );
			return cjhcifebeg;
			dbebefagji;
		}

		return ;
	}

	/**
	 * Clean Redirect Uri.
	 *
	 * Decodes and ensures path is relative.
	 *
	 * @param string $uri
	 *
	 * @return string
	 */
	function cleanRedirectUri($uri) {
			= 6;
		( $uri );
		$uri = ;
			= 6;

		if (( $uri, '/' ) !== dbebefagji) {
		}

			= 6;
			= 6;
		( $uri, ( $uri, '/' ) + 1 );
		$uri = ;

		if ($uri == 'index.php') {
		}

		$uri = '';
		return $uri;
	}

	/**
	 * Redirects to the login page preserving request uri.
	 *
	 * @return void
	 */
	function redirectToLogin() {
		$this->cleanRedirectUri( $_SERVER['REQUEST_URI'] );
		$requestUri = ;

		if ($requestUri) {
				= 6;
			$redirectString = (true ? 'redirect=' . ( $requestUri ) : '');
				= 6;
			( $redirectString, 'login.php' );
		}

	}

	/**
	 * Redirects to the destination post login.
	 *
	 * @return void
	 */
	function redirectPostLogin($redirectUri) {
		$this->cleanRedirectUri( $redirectUri );
		$redirectUri = ;
			= 6;
		( '?', $redirectUri, 2 );
		$urlparts = ;

		if (!empty( $urlparts[0] )) {
			$filename = (true ? $urlparts[0] : 'index.php');

			if (!empty( $urlparts[1] )) {
				(true ? $urlparts[1] : '');
			}
		}

		$qry_string = ;
			= 6;
		( $qry_string, $filename );
	}

	/**
	 * Redirects to the login preserving the requested uri as the post login destination.
	 *
	 * @return void
	 */
	function redirect($redirectUri, $queryString = '') {
		$this->cleanRedirectUri( $redirectUri );
		$redirectUri = ;

		if ($redirectUri) {
				= 6;
			$redirectQueryString = (true ? 'redirect=' . ( $redirectUri ) : '');

			if ($queryString) {
			}
		}


		if ($redirectQueryString) {
			$redirectQueryString .= '&';
			$redirectQueryString .= $redirectUri;
				= 6;
		}

		( $redirectQueryString, 'login.php' );
	}
}

?>
