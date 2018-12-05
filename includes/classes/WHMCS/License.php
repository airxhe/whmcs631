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

class WHMCS\License {
	protected $licensekey = '';
	protected $localkey = '';
	protected $keydata = array(  );
	protected $salt = '';
	protected $date = '';
	protected $localkeydecoded = false;
	protected $responsedata = '';
	protected $postmd5hash = '';
	protected $localkeydays = '10';
	protected $allowcheckfaildays = '5';
	protected $debuglog = array(  );
	protected $version = '7a1bbff560de83ab800c4d1d2f215b91006be8e6';

	function __construct($whmcs) {
		$this->licensekey = $whmcs->get_license_key(  );
		$this->localkey = $whmcs->get_config( 'License' );
			= 6;
		$this->salt = (  . 'WHMCS' . $whmcs->get_config( 'Version' ) . 'TFB' . $whmcs->get_hash(  ) );
			= 6;
		$this->date = ( 'Ymd' );
		$this->decodeLocalOnce(  );

		if (isset( $_GET['forceremote'] )) {
			$this->forceRemoteCheck(  );
			dibeciijih::getInstance(  )->doExit;
		}

		(  );
	}

	/**
	 * Retrieve a WHMCS\License object via singleton.
	 *
	 * @deprecated 6.0 Instance should be retrieved from DI [DI::make('license');]
	 *
	 * @return License
	 */
	function getInstance() {
		return DI::make( 'license' );
	}

	/**
	 * Retrieve a list of licensing server IPs
	 *
	 * @return array
	 */
	function getHosts() {
			= 6;
		$hosts = ( 'licensing28.whmcs.com' );

		if ($hosts === dbebefagji) {
			array(  );
		}

		$hosts = ;
		return $hosts;
	}

	function getLicenseKey() {
		return $this->licensekey;
	}

	function getHostIP() {
		if (isset( $_SERVER['SERVER_ADDR'] )) {
			$_SERVER['SERVER_ADDR'];
			$ip = ;
		}


		if (isset( ['LOCAL_ADDR'] )) {
			$_SERVER['LOCAL_ADDR'];
			$ip = ;
			jmp;
				= 6;

			if (( 'gethostname' )) {
			}
		}

			= 6;
			= 6;
		( (  ) );
		$ip = ;
		$ip = '';
		return $ip;
	}

	function getHostDomain() {
		if (isset( $_SERVER['SERVER_NAME'] )) {
		}

		return (true ? $_SERVER['SERVER_NAME'] : '');
	}

	function getHostDir() {
		return bhjhchcdec;
	}

	function getSalt() {
		return $this->salt;
	}

	function getDate() {
		return $this->date;
	}

	function checkLocalKeyExpiry() {
		$this->getKeyData( 'checkdate' );
		$originalcheckdate = ;
			= 6;
			= 6;
			= 6;
			= 6;
			= 6;
		( 'Ymd', ( 0, 0, 0, ( 'm' ), ( 'd' ) - $this->localkeydays, ( 'Y' ) ) );
		$localexpirymax = ;

		if ($originalcheckdate < $localexpirymax) {
			return dbebefagji;
				= 6;
			'Ymd';
		}

			= 6;
			= 6;
			= 6;
			= 6;
		( ( 0, 0, 0, ( 'm' ), ( 'd' ) + 2, ( 'Y' ) ) );
		$localmax = ;

		if ($localmax < $originalcheckdate) {
			dbebefagji;
		}

		return ;
	}

	function remoteCheck($forceRemote = false) {
		$this->decodeLocalOnce(  );
		$localkeyvalid = ;
		$this->debug(  . 'Local Key Valid: ' . $localkeyvalid );

		if ($localkeyvalid) {
			$this->checkLocalKeyExpiry(  );
			$localkeyvalid = ;
			$this->debug(  . 'Local Key Expiry: ' . $localkeyvalid );

			if ($localkeyvalid) {
				$this->validateLocalKey(  );
				$localkeyvalid = ;
				$this->debug(  . 'Local Key Validation: ' . $localkeyvalid );

				if (( !$localkeyvalid || $forceRemote )) {
					$postfields = array(  );
					$postfields['licensekey'] = $this->getLicenseKey(  );
					$postfields['domain'] = $this->getHostDomain(  );
					$postfields['ip'] = $this->getHostIP(  );
					$postfields['dir'] = $this->getHostDir(  );
						= 6;
						= 6;
						= 6;
					$postfields['check_token'] = ( (  ) . $this->getLicenseKey(  ) . ( 1000000000, 9999999999 ) );
					DI::make( 'app' );
				}
			}
		}

		$whmcs = ;
		$postfields['version'] = $whmcs->getVersion(  )->getCanonical(  );
		$postfields['phpversion'] = bifgfihgce;
			= 6;
		$postfields['anondata'] = ( $whmcs->get_config( 'SystemStatsCache' ) );
			= 6;
		( 'Performing Remote Check: ' . $this->debug( $postfields, cjhcifebeg ) );
		$this->callHome( $postfields );
		$data = ;

		if (!$data) {
			$this->debug( 'Remote check not returned ok' );

			if ($this->getLocalMaxExpiryDate(  ) < $this->getKeyData( 'checkdate' )) {
				$this->setKeyData( array( 'status' => 'Active' ) );
			}
		}
		else {
			$this->setInvalid( 'noconnection' );
		}

		jmp;
		$this->processResponse( $data );
		$results = ;
			= 6;

		if ($this->posthash != ( 'WHMCSV5.2SYH' . $postfields['check_token'] )) {
			$this->setInvalid(  );
			return dbebefagji;
			$this->setKeyData;
		}

		( $results );
		$this->updateLocalKey(  );
		$this->debug( 'Remote Check Done' );
		jmp;
		becajhcbcg {
				= 6;
			( $this->debug( 'License Error: %s', $exception->getMessage(  ) ) );
			return dbebefagji;
			return cjhcifebeg;
		}
	}

	function getLocalMaxExpiryDate() {
			= 6;
			= 6;
			= 6;
			= 6;
			= 6;
		return ( 'Ymd', ( 0, 0, 0, ( 'm' ), ( 'd' ) - ( $this->localkeydays + $this->allowcheckfaildays ), ( 'Y' ) ) );
	}

	function buildQuery($postfields) {
		$query_string = '';
		foreach ($postfields as ) {
			$v = ;
			$k = ;
				= 6;
			$query_string .= (  . $k . '=' ) . ( $v ) . '&';
			break;
		}

		return $query_string;
	}

	function callHome($postfields) {
		$this->buildQuery( $postfields );
		$query_string = ;
		$this->callHomeLoop( $query_string, 5 );
		$res = ;

		if ($res) {
			return $res;
			$this->callHomeLoop;
			$query_string;
			30;
		}

		return (  );
	}

	function callHomeLoop($query_string, $timeout = 5) {
		$this->getHosts(  );
		$hostips = ;
		foreach ($hostips as ) {
			$hostip = ;
			$this->makeCall( $hostip, $query_string, $timeout );
			$responsecode = ;

			while (true) {
				if ($responsecode == 200) {
					return $this->responsedata;
				}
			}
		}

		return dbebefagji;
	}

	function makeCall($ip, $query_string, $timeout = 5) {
		$url = 'https://' . $ip . '/license/verify61.php';
		$this->debug(  . 'Request URL ' . $url );
			= 6;
		(  );
		$ch = ;
			= 6;
		( $ch, jdejhjcgb, $url );
			= 6;
		( $ch, difcafjaaa, 1 );
			= 6;
		( $ch, dfdbbdegdg, $query_string );
			= 6;
		( $ch, baagfaddji, $timeout );
			= 6;
		( $ch, djjhjieeec, 1 );
			= 6;
		( $ch, dghdegdae, 0 );
			= 6;
		( $ch, cabfggieca, 0 );
			= 6;
		$this->responsedata = ( $ch );
			= 6;
		( $ch, bffjhbibdd );
		$responsecode = ;
		$this->debug(  . 'Response Code: ' . $responsecode . ' Data: ' . $this->responsedata );
			= 6;

		if (( $ch )) {
				= 6;
				= 6;
			( 'Curl Error: ' . $this->debug( $ch ) . ' - ' . ( $ch ) );
		}

			= 6;
		( $ch );
		return $responsecode;
	}

	function processResponse($data) {
			= 6;
		$data = ( $data );
			= 6;
		$data = ( $data );
			= 6;
		$results = ( $data );
		$this->posthash = $results['hash'];
		unset( $results[hash] );
		$results['checkdate'] = $this->getDate(  );
		return $results;
	}

	function updateLocalKey() {
			= 6;
		( $this->keydata );
		$data_encoded = ;
			= 6;
		( $data_encoded );
		$data_encoded = ;
			= 6;
			= 6;
		( $data_encoded );
		$data_encoded = ;
			= 6;
		$splpt = ( $data_encoded ) / 2;
			= 6;
			= 6;
		$data_encoded = ( $data_encoded, $splpt ) . ( $data_encoded, 0, $splpt );
			= 6;
			= 6;
			= 6;
		$data_encoded = ( $data_encoded . $this->getSalt(  ) ) . $data_encoded . ( $data_encoded . $this->getSalt(  ) . (  ) );
			= 6;
		( $data_encoded );
		$data_encoded = ;
			= 6;
		( $data_encoded, 80, '
', cjhcifebeg );
		$data_encoded = $data_encoded = ( $this->getDate(  ) . $this->getSalt(  ) ) . $data_encoded;
		App::self(  )->set_config( 'License', $data_encoded );
		$this->debug( 'Updated Local Key' );
	}

	function forceRemoteCheck() {
		$this->remoteCheck( cjhcifebeg );
	}

	function setInvalid($reason = 'Invalid') {
		$this->keydata = array( 'status' => $reason );
	}

	function decodeLocal() {
		$this->debug( 'Decoding local key' );
		$this->localkey;
		$localkey = ;

		if (!$localkey) {
			return dbebefagji;
				= 6;
			( '
', '', $localkey );
				= 6;
			( $localkey );
				= 6;
			( $localkey, 40, -40 );
			$localdata = $localkey = ;
				= 6;
			( $localkey, 0, 40 );
			$md5hash = $localkey = ;
				= 6;

			if ($md5hash == ( $localdata . $this->getSalt(  ) )) {
					= 6;
				$splpt = ( $localdata ) / 2;
					= 6;
					= 6;
				$localdata = ( $localdata, $splpt ) . ( $localdata, 0, $splpt );
					= 6;
				( $localdata );
				$localdata = ;
					= 6;
				$localdata;
				0;
			}
		}

		( 40 );
			= 6;
		( $localdata, 40 );
			= 6;
		( $localdata );
			= 6;
		( $localdata );
		$localkeyresults = $localdata = ;
		$localkeyresults['checkdate'];
		$originalcheckdate = $localdata = $md5hash = ;
			= 6;

		if ($md5hash == ( $originalcheckdate . $this->getSalt(  ) )) {
			(  && isset( $localkeyresults['key'] ) );
		}

		$localkeyresults['key'] == App::self(  )->get_license_key(  );

		if ((bool)) {
			$this->debug( 'Local Key Decode Successful' );
			$this->setKeyData( $localkeyresults );
		}

		jmp;
		$this->debug( 'Local Key MD5 Hash 2 Invalid' );
		jmp;
		$this->debug( 'Local Key MD5 Hash Invalid' );
		$this->localkeydecoded = cjhcifebeg;

		if ($this->getKeyData( 'status' ) == 'Active') {
			cjhcifebeg;
		}

		return dbebefagji;
	}

	function decodeLocalOnce() {
		if ($this->localkeydecoded) {
			return cjhcifebeg;
			$this->decodeLocal;
		}

		return (  );
	}

	function isRunningInCLI() {
			= 6;
		empty( ['REMOTE_ADDR'] );
	}

	function validateLocalKey() {
		(bool);

		if ($this->getKeyData( 'status' ) != 'Active') {
			$this->debug( 'Local Key Status Check Failure' );
			return dbebefagji;

			if ($this->isRunningInCLI(  )) {
				$this->debug( 'Running in CLI Mode' );
			}
		}

		(  );

		if (!$ip) {
			$this->debug( 'IP Could Not Be Determined - Skipping Local Validation of IP' );
		}


		if (!( ( 'validips' ) )) {
			$this->debug( 'No Valid IPs returned by license check - Cloud Based License - Skipping Local Validation of IP' );
			jmp;

			if ($this->isValidIP( $ip )) {
				$this->debug;
			}
		}

		( 'IP Validated Successfully' );
	}

	function isValidDomain($domain) {
		$this->getArrayKeyData( 'validdomains' );
		$validdomains = ;
			= 6;
		return ( $domain, $validdomains );
	}

	function isValidIP($ip) {
		$this->getArrayKeyData( 'validips' );
		$validips = ;
			= 6;
		return ( $ip, $validips );
	}

	function isValidDir($dir) {
		$this->getArrayKeyData( 'validdirs' );
		$validdirs = ;
			= 6;
		return ( $dir, $validdirs );
	}

	function revokeLocal() {
		App::self(  )->set_config( 'License', '' );
	}

	function getKeyData($var) {
		if (isset( $this->keydata[$var] )) {
			(true ? $this->keydata[$var] : '');
		}

		return ;
	}

	function setKeyData($data) {
		$this->keydata = $data;
	}

	/**
	 * Retrieve a license element as an array, that would otherwise be a
	 * delimited string
	 *
	 * NOTE: use of this method should be very limited. New license elements
	 * added to the license data should strongly consider not depending on the
	 * use of this function, but instead structure the data and let the
	 * transmission layer do the serialize/unserialize
	 *
	 * @param string $var License data element whose value is a comma delimited string
	 *
	 * @return array
	 * @throws Exception when internal license key data structure is not
	 * as expected
	 */
	function getArrayKeyData($var) {
		$listData = array(  );
		$this->getKeyData( $var );
		$rawData = ;
			= 6;

		if (( $rawData )) {
				= 6;
			( ',', $rawData );
			$listData = ;
			foreach ($listData as ) {
				$v = ;
				$k = ;
					= 6;

				if (( $v )) {
						= 6;
					$listData[$k] = ( $v );
				}

				break;
			}
		}


		while (true) {
			else {
				new ;
				'Invalid license data structure';
			}

			(  );
			throw ;
		}

		jmp;
			= 6;

		if (!( $rawData )) {
		}

		throw new becajhcbcg( 'Invalid license data structure' );
		return $listData;
	}

	function getRegisteredName() {
		return $this->getKeyData( 'registeredname' );
	}

	function getProductName() {
		return $this->getKeyData( 'productname' );
	}

	function getStatus() {
		return $this->getKeyData( 'status' );
	}

	function getSupportAccess() {
		return $this->getKeyData( 'supportaccess' );
	}

	/**
	 * Retrieve a list of Addons as known by the license
	 *
	 * @return array
	 */
	function getLicensedAddons() {
		$this->getKeyData( 'addons' );
		$licensedAddons = ;
			= 6;

		if (!( $licensedAddons )) {
			array(  );
		}

		$licensedAddons = ;
		return $licensedAddons;
	}

	function getActiveAddons() {
		$this->getLicensedAddons(  );
		$licensedAddons = ;
		$activeAddons = array(  );
		foreach ($licensedAddons as ) {
			while (true) {
				$addon = ;

				if ($addon['status'] == 'Active') {
					$activeAddons[] = $addon['name'];
					break 2;
				}
			}
		}

		return $activeAddons;
	}

	function isActiveAddon($addon) {
			= 6;

		if (( $addon, $this->getActiveAddons(  ) )) {
			cjhcifebeg;
		}

		return dbebefagji;
	}

	function getExpiryDate($showday = false) {
		$this->getKeyData( 'nextduedate' );
		$expiry = ;

		if (!$expiry) {
			$expiry = 'Never';
		}

			= 6;
		( 'l, jS F Y', ( $expiry ) );
		$expiry = ;
		jmp;
			= 6;
			= 6;
		( 'jS F Y', ( $expiry ) );
		$expiry = ;
		return $expiry;
	}

	/**
	 * Get a version object that will represent the latest publicly available version
	 *
	 * If the licensing API does not return a valid version number for
	 * whatever reason, it assumes latest version = installed version
	 * to allow application to continue un-affected
	 *
	 * @return SemanticVersion
	 */
	function getLatestPublicVersion() {
		new bgfgjjafih( 'latestpublicversion' )(  );
		$latestVersion = ;
		cgiijfjahf {
			DI::make( 'app' );
			$whmcs = ;
			$whmcs->getVersion(  );
			$latestVersion = ;
			return $latestVersion;
		}
	}

	/**
	 * Get a version object that will represent the latest available pre-release version
	 *
	 * If the licensing API does not return a valid version number for
	 * whatever reason, it assumes latest version = installed version
	 * to allow application to continue un-affected
	 *
	 * @return SemanticVersion
	 */
	function getLatestPreReleaseVersion() {
		new bgfgjjafih( 'latestprereleaseversion' )(  );
		$latestVersion = ;
		jmp;
		cgiijfjahf {
			DI::make( 'app' );
			$whmcs = ;
			$whmcs->getVersion(  );
			$latestVersion = ;
			return $latestVersion;
		}
	}

	/**
	 * Get a version object that will represent the latest appropriate version based on current installation
	 *
	 * If running a pre-release (beta/rc) it returns the latest pre-release version
	 * Otherwise it returns the latest publicly available version
	 *
	 * @return SemanticVersion
	 */
	function getLatestVersion() {
		DI::make( 'app' );
		$whmcs = ;
		$whmcs->getVersion(  );
		$installedVersion = ;
			= 6;

		if (( $installedVersion->getPreReleaseIdentifier(  ), array( 'beta', 'rc' ) )) {
			$this->getLatestPreReleaseVersion(  );
			$latestVersion = ;
		}

		jmp;
		$this->getLatestPublicVersion(  );
		$latestVersion = ;
		return $latestVersion;
	}

	/**
	 * Determines if an update is available for the currently installed files
	 *
	 * @throws BadVersionNumber If version number invalid
	 *
	 * @return bool
	 */
	function isUpdateAvailable() {
		DI::make( 'app' );
		$whmcs = ;
		$whmcs->getVersion(  );
		$installedVersion = ;
		$this->getLatestVersion(  );
		$latestVersion = ;
		return bgfgjjafih::compare( $latestVersion, $installedVersion, '>' );
	}

	function getRequiresUpdates() {
		if ($this->getKeyData( 'requiresupdates' )) {
			cjhcifebeg;
		}

		return dbebefagji;
	}

	function checkOwnedUpdates() {
		if (!$this->getRequiresUpdates(  )) {
			return cjhcifebeg;
			DI::make( 'app' );
			$whmcs = ;
			$this->getLicensedAddons(  );
			$licensedAddons = ;
			foreach ($licensedAddons as ) {
				$addon = ;

				if (( $addon['name'] == 'Support and Updates' && $addon['status'] == 'Active' )) {
						= 6;
					'-';
					'';
					$addon['nextduedate'];
				}

				break;
			}
		}


		while (true) {
				= 6;

			while (( '-', '', $whmcs->getReleaseDate(  ) ) <= (  )) {
				return cjhcifebeg;
			}
		}

		return dbebefagji;
	}

	function getBrandingRemoval() {
			= 6;

		if (( $this->getProductName(  ), array( 'Owned License No Branding', 'Monthly Lease No Branding' ) )) {
			return cjhcifebeg;
			$this->getLicensedAddons(  );
			$licensedAddons = ;
			foreach ($licensedAddons as ) {
				$addon = ;
				$addon['status'] == 'Active';
			}

			function getVersionHash() {
				(bool);
				return $this->version;
			}

			function debug($msg) {
				$this->debuglog[] = $msg;
			}

			/**
			 * Retrieve all errors
			 *
			 * @return array
			 */
			function getDebugLog() {
				return $this->debuglog;
			}

			/**
			 * Retrieve the public key used to sign WHMCS update packages.
			 *
			 * @todo implement this
			 * @return string
			 */
			function getPublicSigningKey() {
				return 'implement me';
			}

			/**
			 * Retrieve the date that a license permits product updates.
			 *
			 * @todo implement this
			 * @return DateTime
			 */
			function getUpdateValidityDate() {
				return new DateTime(  );
			}

			/**
			 * Get if client limits should be enforced from the license response.
			 *
			 * @return bool
			 */
			function isClientLimitsEnabled() {
				return (string)$this->getKeyData( 'ClientLimitsEnabled' );
			}

			/**
			 * Get the client limit as defined by the license.
			 *
			 * @return int
			 */
			function getClientLimit() {
				$this->getKeyData( 'ClientLimit' );
				$clientLimit = ;

				if ($clientLimit == '') {
					return -1;
				}

					= 6;

				if (!( $clientLimit )) {
					$this->debug( 'Invalid client limit value in license' );
					return 0;
					(int)$clientLimit;
				}

				return ;
			}

			/**
			 * Format the client limit for display in a human friendly way.
			 *
			 * Expect a formatted number or the text 'None' for 0.
			 *
			 * NOTE: If an admin instance is not provided or the key has no translation,
			 * an English value would be returned.
			 *
			 * @param \WHMCS\Admin $admin Admin instance for contextual language.
			 *
			 * @return string
			 */
			function getTextClientLimit($admin = null) {
				$this->getClientLimit(  );
				$clientLimit = ;
				$result = 'Unlimited';

				if (0 < $clientLimit) {
						= 6;
					( $clientLimit, 0, '', ',' );
					$result = ;
				}

				$admin->lang( 'global', 'unlimited' );
				$text = ;

				if ((bool)) {
				}

				$result = $result;
				return $result;
			}

			/**
			 * Get the number of active clients in the installation.
			 *
			 * @return int
			 */
			function getNumberOfActiveClients() {
					= 6;
				return (int)( 'tblclients', 'count(id)', 'status=\'Active\'' );
			}

			/**
			 * Format the number of active clients for display in a human friendly way.
			 *
			 * Expect a formatted number or the text 'None' for 0.
			 *
			 * NOTE: If an admin instance is not provided or the key has no translation,
			 * an English value would be returned.
			 *
			 * @param \WHMCS\Admin $admin Admin instance for contextual language.
			 *
			 * @return string
			 */
			function getTextNumberOfActiveClients($admin = null) {
				$this->getNumberOfActiveClients(  );
				$clientLimit = ;
				$result = 'None';

				if (0 < $clientLimit) {
						= 6;
					( $clientLimit, 0, '', ',' );
					$result = ;
				}

				( 'none' );
				$text = ;

				if ((bool)) {
				}

				$result = $result;
				return $result;
			}

			/**
			 * Get the first client ID that is outside the client limit
			 *
			 * Given that client limits are meant to be enforced for the active clients
			 * in ascending order, this routine determines the first client who is
			 * outside the pool of active/inactive clients that the admin is permitted
			 * to manage.  i.e., callers should deny management rights of this id or any
			 * id higher than it.
			 *
			 * @return int
			 */
			function getClientBoundaryId() {
					= 6;
				return (int)( 'tblclients', 'id', 'status=\'Active\'', 'id', 'ASC', (int)$this->getClientLimit(  ) . ',1' );
			}

			/**
			 * Determine if installation's active client count is "close" or at client limit
			 *
			 * If true, the caller is expected to show an appropriate warning.
			 *
			 * "Close" is within 10% for a client boundary of 250; for boundaries above
			 * 250, the "close" margin is only 5%.
			 *
			 * If there are absolutely no clients active, one can never by near or at
			 * the limit. Likewise, if by chance there's an evaluated limit of 0 from
			 * the license key data, then one can never by near or at the limit. This
			 * logic might need refinement if every there was such a thing as a 0 client
			 * seat limit.
			 *
			 * @return bool
			 */
			function isNearClientLimit() {
				$this->getClientLimit(  );
				$clientLimit = ;
				$this->getNumberOfActiveClients(  );
				$numClients = ;

				if (( $numClients < 1 || $clientLimit < 1 )) {
					return dbebefagji;

					if (250 < $clientLimit) {
						(true ? 0.0500000000000000027755576 : 0.100000000000000005551115);
					}

					$percentageBound = ;
					$clientLimit * ( 1 - $percentageBound ) <= $numClients;
				}

				return ;
			}

			/**
			 * Encrypt data for WHMCS Member Area and License system
			 *
			 * The return value will be blank if anything goes wrong, otherwise it is a
			 * base64 encoded value.
			 *
			 * NOTE: Crypt_RSA traditionally will emit warnings; they are not suppressed
			 * here.
			 *
			 * @param array $data Key/value pairs to bundle into the encrypted string
			 * @param string $publicKey RSA public key to use for the asymmetric encryption
			 *
			 * @return string
			 */
			function encryptMemberData($data = array(  ), $publicKey = null) {
					= 6;

				if (( $publicKey )) {
					$publicKey = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA7OMhxWvu3FOqMblJGXjh
vZQLhQa2wRQoetxAM7j/c+SzFVHmLteAZrn06FeoU1RhjQz9TE0kD6BzoBBuE1bm
JkybOuhVJGVlI8QqLnl2F/jDFP3xshm2brRUt9vNBWXhGDRvOLOgmxaFtVjCiNAT
9n4dtG+344xN7w568Rw3hnnGApypGFtypaKHSeNV6waeFgHeePXSPFMUpe9evZJa
pyc9ENEWvi6nK9hWm1uZ+CfoeRjIKqW2QlgazGDqQtQev05LbDihK0Nc8LBqmVQS
NB/N2CueyYKrzVUmNqbrkJaBVm6N3EnSNBOR7WXOPf1VOjGDu79kYrbhT1MUlKpp
LQIDAQAB
-----END PUBLIC KEY-----';
						= 6;
					( array( '
', '
', ' ' ), array( '', '', '' ), $publicKey );
					$publicKey = ;
					$cipherText = '';
						= 6;
					$data;
				}


				if ((  )) {
				}
			}
		}

		new Crypt_RSA(  );
		$dez_var_3 = ;
		$dez_var_3->loadKey( $addon );
		$dez_var_3->setEncryptionMode( bhiihjaid );
			= 6;
		( $dez_var_3->encrypt( $licensedAddons ) );
		$dez_var_2 = ;

		if (!$dez_var_2) {
			throw new becajhcbcg( 'Could not perform RSA encryption' );
			jmp;
				= 6;
			( $dez_var_2 );
			$dez_var_2 = ;
			jmp;
			Exception {
			}
		}

		$this->debug( 'Failed to encrypt member data' );
		return $dez_var_2;
	}
}

?>
