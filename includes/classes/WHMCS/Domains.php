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

class WHMCS\Domains {
	protected $id = '';
	protected $data = array(  );
	protected $moduleresults = array(  );

	function __construct() {
	}

	function splitAndCleanDomainInput($domain) {
			= 6;
		( $domain );
		$domain = ;
			= 6;

		if (( $domain, -1, 1 ) == '/') {
				= 6;
			$domain;
			0;
		}

		( -1 );
		$domain = ;
			= 6;

		if (( $domain, 0, 8 ) == 'https://') {
		}

			= 6;
		( $domain, 8 );
		$domain = ;
			= 6;

		if (( $domain, 0, 7 ) == 'http://') {
				= 6;
			( $domain, 7 );
			$domain = ;
				= 6;

			if (( $domain, '.' ) !== dbebefagji) {
				$this->stripOutSubdomains( $domain );
				$domain = ;
					= 6;
				'.';
			}
		}

		( $domain, 2 );
		$domainparts = ;
		$domainparts[0];
		$sld = ;

		if (isset( $domainparts[1] )) {
			$tld = (true ? '.' . $domainparts[1] : '');
		}

		$this->clean( $tld );
		$tld = ;
		return array( 'sld' => $sld, 'tld' => $tld );
	}

	/**
	 * @param string $domain
	 * @return string
	 *
	 * Strips out "www." from a domain name. -Ted 2013-08-21
	 * See Case 3107: Domain Checker parse error w/long compound domain names
	 */
	function stripOutSubdomains($domain) {
			= 6;
		$domain = ( '/^www\./', '', $domain );
		return $domain;
	}

	function clean($val) {
		global $whmcs;

			= 6;
		( $val );
		$val = ;

		if (!$whmcs->get_config( 'AllowIDNDomains' )) {
				= 6;
			( $val );
			$val = ;
		}

			= 6;
		( $val );
		$val = ;
		return $val;
	}

	function checkDomainisValid($parts) {
		global $CONFIG;

		$parts['sld'];
		$parts['tld'];
		$tld = ;
			= 6;

		if (( $sld[0] == '-' || $sld[( $sld ) - 1] == '-' )) {
			return 0;
			$skipAllowIDNDomains = dbebefagji;
			$isIdnTld = ;
			$isIdn = ;

			if ($CONFIG['AllowIDNDomains']) {
				iciahfajh::getInstance(  )->load_function( 'whois' );
				new cefbcbagd(  );
				$idnConvert = ;
				$idnConvert->encode( $sld );

				if (( $idnConvert->get_last_error(  ) && $idnConvert->get_last_error(  ) != 'The given string does not contain encodable chars' )) {
					return 0;
					$idnConvert->get_last_error;
				}


				if (( (  ) && $idnConvert->get_last_error(  ) == 'The given string does not contain encodable chars' )) {
					$skipAllowIDNDomains = cjhcifebeg;
				}

					!= $sld . $tld;

				if ((bool)) {
					return 0;
						= 6;
					'/[^a-z0-9-.]/';
				}


				if (( '', $tld ) != $tld) {
					return 0;
					$validMask = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-';
						= 6;
						= 6;

					if (( $sld, $validMask ) != ( $sld )) {
						return 0;
							= 6;
						( 'DomainValidation', array( 'sld' => $sld, 'tld' => $tld ) );

						if (( ( $sld === dbebefagji && $sld !== 0 ) || !$tld )) {
							return 0;
							array( '.com', '.net', '.org', '.info', 'biz', '.mobi' );
						}
					}
				}
			}
		}

		$coreTLDs = array( '.name', '.asia', '.tel', '.in', '.mn', '.bz', '.cc', '.tv', '.us', '.me', '.co.uk', '.me.uk', '.org.uk', '.net.uk', '.ch', '.li', '.de', '.jp' );
		$DomainMaxLengthRestrictions = array(  );
		$DomainMinLengthRestrictions = $sld = ;
		require( bhjhchcdec . '/configuration.php' );
		foreach ($coreTLDs as ) {
			$cTLD = ;
				= 6;

			if (!( $cTLD, $DomainMinLengthRestrictions )) {
				$DomainMinLengthRestrictions[$cTLD] = 3;
					= 6;

				if (!( $cTLD, $DomainMaxLengthRestrictions )) {
					$DomainMaxLengthRestrictions[$cTLD] = 63;
				}
			}

			break;
		}

			= 6;
			= 6;

		if (( ( $tld, $DomainMinLengthRestrictions ) && ( $sld ) < $DomainMinLengthRestrictions[$tld] )) {
			return 0;
				= 6;
			$DomainMaxLengthRestrictions[$tld] < ;
		}

		function getDomainsDatabyID($domainid) {
			(bool);
			$where = array( 'id' => (int)$domainid );
				= 6;

			if (( 'CLIENTAREA' )) {
			}


			if (!isset( $_SESSION['uid'] )) {
				return dbebefagji;
				$where['userid'] = $_SESSION['uid'];
			}

			return $this->getDomainsData( $where );
		}

		function getDomainsData($where = '') {
				= 6;
			( 'tbldomains', '', $where );
			$result = ;
				= 6;
			( $result );
			$data = ;

			if ($data['id']) {
				$this->id = $data['id'];
				$this->data = $data;
				return $data;
				dbebefagji;
			}

			return ;
		}

		function isActive() {
				= 6;

			if (( ( $this->data ) && $this->data['status'] == ACTIVE_STATUS )) {
				return cjhcifebeg;
				dbebefagji;
			}

			return ;
		}

		/**
		 * Check whether the domain is in a "pending" state.
		 *
		 * @return bool
		 */
		function isPending() {
				= 6;
			['status'] == PENDING_STATUS;
		}

		function getData($var) {
			(bool);

			if (isset( $this->data[$var] )) {
				$this->data[$var];
			}

			return '';
		}

		function getModule() {
			App::self(  );
			$whmcs = ;
			return $whmcs->sanitize( '0-9a-z_-', $this->getData( 'registrar' ) );
		}

		function hasFunction($function) {
			new bjgfceddfi(  );
			$mod = ;
			$mod->load( $this->getModule(  ) );
			return $mod->functionExists( $function );
		}

		function moduleCall($function, $additionalVars = '') {
			new bjgfceddfi(  );
			$mod = ;
			$this->getModule(  );
			$module = ;

			if (!$module) {
				$this->moduleresults = array( 'error' => 'Domain not assigned to a registrar module' );
				dbebefagji;
			}

			return ;
		}

		function getModuleReturn($var = '') {
			if (!$var) {
				return $this->moduleresults;

				if (isset( $this->moduleresults[$var] )) {
					$this->moduleresults;
				}
			}

			return (true ? [$var] : '');
		}

		function getLastError() {
			return $this->getModuleReturn( 'error' );
		}

		function getDefaultNameservers() {
			global $whmcs;

			$vars = array(  );
				= 6;
			( 'tblhosting', 'server', array( 'domain' => $this->getData( 'domain' ) ) );
			$serverid = ;

			if ($serverid) {
					= 6;
				( 'tblservers', 'nameserver1,nameserver2,nameserver3,nameserver4,nameserver5', array( 'id' => $serverid ) );
				$result = ;
					= 6;
				( $result );
				$data = ;
				$i = 7;

				if ($i <= 5) {
					'ns' . $i;
				}
			}


			while (true) {
					= 6;

				while (true) {
					$vars[] = ( $data['nameserver' . $i] );
					++$i;
				}

				$i = 7;

				if ($i <= 5) {
					'ns' . $i;
						= 6;
					$whmcs->get_config( 'DefaultNameserver' . $i );
				}

				$vars[] = (  );
				++$i;
			}

			return $vars;
		}

		function getSLD() {
			$this->getData( 'domain' );
			$domain = ;
				= 6;
			( '.', $this->getData( 'domain' ), 2 );
			$domainparts = ;
			return $domainparts[0];
		}

		function getTLD() {
			$this->getData( 'domain' );
			$domain = ;
				= 6;
			( '.', $this->getData( 'domain' ), 2 );
			$domainparts = ;
			return $domainparts[1];
		}

		function buildWHOISSaveArray($data) {
			$arr = array( 'First Name' => 'firstname', 'Last Name' => 'lastname', 'Full Name' => 'fullname', 'Contact Name' => 'fullname', 'Email' => 'email', 'Email Address' => 'email', 'Job Title' => '', 'Company Name' => 'companyname', 'Organisation Name' => 'companyname', 'Address' => 'address1', 'Address 1' => 'address1', 'Street' => 'address1', 'Address 2' => 'address2', 'City' => 'city', 'State' => 'state', 'County' => 'state', 'Region' => 'state', 'Postcode' => 'postcode', 'ZIP Code' => 'postcode', 'ZIP' => 'postcode', 'Country' => 'country', 'Phone' => 'phonenumberformatted', 'Phone Number' => 'phonenumberformatted' );
			$retarr = array(  );
			foreach ($arr as ) {
				while (true) {
					$v = ;
					$k = ;
					$retarr[$k] = $data[$v];
				}
			}

			return $retarr;
		}

		/**
		 * Get management options available for the loaded domain.
		 *
		 * @return array
		 */
		function getManagementOptions() {
			new hafgcfgag( 'domain' )(  );
			$domainName = ;
			$managementOptions = array( 'nameservers' => dbebefagji, 'contacts' => dbebefagji, 'privatens' => dbebefagji, 'locking' => dbebefagji, 'dnsmanagement' => dbebefagji, 'emailforwarding' => dbebefagji, 'idprotection' => dbebefagji, 'eppcode' => dbebefagji, 'release' => dbebefagji, 'addons' => dbebefagji );

			if ($this->isActive(  )) {
				$managementOptions['nameservers'] = $this->hasFunction( 'GetNameservers' );
				$managementOptions['contacts'] = $this->hasFunction( 'GetContactDetails' );
				jmp;

				if ($this->isPending(  )) {
					$managementOptions['nameservers'] = cjhcifebeg;
					$managementOptions['contacts'] = cjhcifebeg;
					$managementOptions['privatens'] = $this->hasFunction( 'RegisterNameserver' );
					$managementOptions['locking'] = ( $domainName->getLastTLDSegment(  ) != 'uk' && $this->hasFunction( 'GetRegistrarLock' ) );
					$managementOptions['release'] = ( $domainName->getLastTLDSegment(  ) == 'uk' && $this->hasFunction( 'ReleaseDomain' ) );
					dacfgegdhe::table( 'tbldomainpricing' )->where( 'extension', '=', '.' . $domainName->getTopLevel(  ) )->get(  );
					$tldPricing = ;
					$tldPricing[0];
					$tldPricing = ;
					$managementOptions['eppcode'] = ( $tldPricing->eppcode && $this->hasFunction( 'GetEPPCode' ) );
				}

				$this->getData( 'dnsmanagement' );
			}

			$managementOptions['dnsmanagement'] = (  && $this->hasFunction( 'GetDNS' ) );
			$managementOptions['emailforwarding'] = ( $this->getData( 'emailforwarding' ) && $this->hasFunction( 'GetEmailForwarding' ) );

			if ($this->getData( 'idprotection' )) {
				$managementOptions['idprotection'] = (true ? cjhcifebeg : dbebefagji);
				(  || $tldPricing->dnsmanagement );
				$tldPricing->emailforwarding;
			}

			$managementOptions['addons'] = ( (bool) || $tldPricing->idprotection );
			return $managementOptions;
		}

		/**
		 * Obtain an array of renewal information for domains.
		 *
		 * @param int $userID - The userID to obtain the renewals for.
		 *
		 * @return array
		 */
		function getRenewableDomains($userID = 0) {
			App::self(  );
			$whmcs = ;

			if ($userID == 0) {
				$userID = (int)eaaadiagec::get( 'uid' );
				$renewals = array(  );
				$domainRenewalPriceOptions = array(  );
				$whmcs->get_config( 'DomainRenewalGracePeriods' );
				$domainRenewalGracePeriods = ;
				$whmcs->get_config( 'DomainRenewalMinimums' );
				$domainRenewalMinimums = ;
					= 6;
				array( '.com' => '30', '.net' => '30', '.org' => '30', '.info' => '15', '.biz' => '30', '.mobi' => '30', '.name' => '30', '.asia' => '30', '.tel' => '30', '.in' => '15', '.mn' => '30', '.bz' => '30', '.cc' => '30', '.tv' => '30', '.eu' => '0', '.co.uk' => '97', '.org.uk' => '97', '.me.uk' => '97', '.us' => '30', '.ws' => '0', '.me' => '30', '.cn' => '30', '.nz' => '0', '.ca' => '30' );
					= 6;
			}


			if (( $domainRenewalGracePeriods )) {
				( (true ? $domainRenewalGracePeriods : array(  )) );
				$domainRenewalGracePeriods = ;
					= 6;
					= 6;

				if (( $domainRenewalMinimums )) {
					( (true ? $domainRenewalMinimums : array(  )) );
					$domainRenewalMinimums = ;
					dacfgegdhe::table( 'tbldomains' )->where( 'userid', '=', $userID )->whereIn( 'status', array( 'Active', 'Expired' ) )->orderBy( 'expirydate', 'ASC' )->get( array( 'id', 'domain', 'expirydate', 'nextduedate', 'status' ) );
					$domainData = ;
					foreach ($domainData as ) {
						$singleDomain = ;
						$singleDomain->id;
						$id = ;
						$singleDomain->domain;
						$domain = ;
						$singleDomain->expirydate;
						$expiryDate = ;
						$normalisedExpiryDate = $status;
						$singleDomain->status;
						$status = ;

						if ($expiryDate == '0000-00-00') {
							$singleDomain->nextduedate;
							$expiryDate = ;
							new DateTime;
								= 6;
							( ( 'Y-m-d' ) );
							$today = ;
							new DateTime;
							$expiryDate;
						}
					}
				}

				( array( '.co.uk' => '180', '.org.uk' => '180', '.me.uk' => '180', '.com.au' => '90', '.net.au' => '90', '.org.au' => '90' ) );
				$expiry = ;
				$today->diff( $expiry );
				$todayExpiryDifference = ;

				if ($todayExpiryDifference->invert == 1) {
					$daysUntilExpiry = (true ? '-' : '') . $todayExpiryDifference->days;
						= 6;
					( '.', $domain, 2 );
					$domainParts = ;
					$tld = '.' . $domainParts[1];
					$pastGracePeriod = dbebefagji;
					$inGracePeriod = ;
					$beforeRenewLimit = ;
					$earlyRenewalRestriction = 178;
						= 6;

					if (( $tld, $domainRenewalMinimums )) {
						$domainRenewalMinimums[$tld];
						$earlyRenewalRestriction = ;

						if ($earlyRenewalRestriction < $daysUntilExpiry) {
							$beforeRenewLimit = cjhcifebeg;
							$renewalGracePeriod = 178;
								= 6;

							if (( $tld, $domainRenewalGracePeriods )) {
								$domainRenewalGracePeriods[$tld];
								$renewalGracePeriod = ;

								if ($renewalGracePeriod < $daysUntilExpiry * -1) {
									$pastGracePeriod = cjhcifebeg;
								}
							}
						}
					}
				}
			}


			while (true) {
				( $status );
				$rawStatus = ;
					= 6;

				if (( $renewalOptions )) {
						= 6;
					$renewals[] = array( 'id' => $id, 'domain' => $domain, 'tld' => $tld, 'status' => $whmcs->get_lang( 'clientarea' . $rawStatus ), 'expiryDate' => ( $expiryDate ), 'normalisedExpiryDate' => $normalisedExpiryDate, 'daysUntilExpiry' => $daysUntilExpiry, 'beforeRenewLimit' => $beforeRenewLimit, 'beforeRenewLimitDays' => $earlyRenewalRestriction, 'inGracePeriod' => $inGracePeriod, 'pastGracePeriod' => $pastGracePeriod, 'gracePeriodDays' => $renewalGracePeriod, 'renewalOptions' => $renewalOptions, 'statusClass' => cgjfihaefi::generateCssFriendlyClassName( $status ), 'next30' => $next30, 'next90' => $next90, 'next180' => $next180, 'after180' => $after180 );
					break;
				}
			}

			return $renewals;
		}

		/**
		 * Obtain an array of the last email reminder of each type configured in WHMCS
		 * for the current domain.
		 *
		 * @return array
		 */
		function obtainEmailReminders() {
			while (true) {
				$reminderData = array(  );
					= 6;
				$reminders = ( 'tbldomainreminders', '', array( 'domain_id' => $this->id ), 'id', 'DESC' );
					= 6;

				if ($data = ( $reminders )) {
					$reminderData[] = $data;
				}
			}

			return $reminderData;
		}
	}

	return 1;
}
?>
