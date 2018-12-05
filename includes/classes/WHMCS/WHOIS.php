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

class WHMCS\WHOIS {
	private $whoisServerDefinitions = '';
	private $whoisTlds = array(  );
	private $whoisServers = array(  );
	private $whoisValues = array(  );
	private $whoisRequestPrefixes = array(  );
	private $definitionsPath = '';

	function __construct($definitionsPath = '') {
		if (!empty( $$definitionsPath )) {
			$this->definitionsPath = $definitionsPath;
			return null;
			$this->definitionsPath = bhjhchcdec . '/includes/whoisservers.php';
		}

	}

	function init() {
		if ($this->loadWHOISDefinitions(  )) {
			$this->processWHOISDefinitions;
		}

		(  );
	}

	function getWHOISDefinitionsPath() {
		return $this->definitionsPath;
	}

	function loadWHOISDefinitions() {
		$this->getWHOISDefinitionsPath(  );
		$path = ;
			= 6;

		if (( $path )) {
		}

			= 6;
		$this->whoisServerDefinitions = ( $path );
		return cjhcifebeg;
	}

	function processWHOISDefinitions() {
		$this->whoisServerDefinitions;
		$whoisDefinitions = ;
			= 6;
		( '
', $whoisDefinitions );
		$whoisDefinitions = ;
		foreach ($whoisDefinitions as ) {
			$line = ;
				= 6;
			( $line );
			$line = ;

			if (!$line) {
				continue;
					= 6;
				( '|', $line );
				$values = ;
					= 6;

				if (( $values ) < 3) {
				}
			}

			continue;
				= 6;
				= 6;
			( ( $values[0] ) );
			$tld = ;
			$this->whoisTlds[] = $tld;
				= 6;
				= 6;
			$this->whoisServers[$tld] = ( ( $values[1] ) );
				= 6;
				= 6;
			$this->whoisValues[$tld] = ( ( $values[2] ) );

			if (isset( $values[3] )) {
					= 6;

				while (true) {
					$this->whoisRequestPrefixes[$tld] = (true ? ( $values[3] ) : '');
				}
			}
		}

	}

	function getTLDs() {
		return $this->whoisTlds;
	}

	function canLookupTLD($tld) {
			= 6;
		return ( $tld, $this->getTLDs(  ) );
	}

	function getServer($tld) {
			= 6;

		if (( $tld, $this->whoisServers )) {
			return $this->whoisServers[$tld];
			new becajhcbcg;
				. 'Request for ' . $tld . '\'s Whois server fails because it\'s not configured.';
		}

		(  );
		throw ;
	}

	function getAvailableMatchString($tld) {
			= 6;

		if (( $tld, $this->whoisValues )) {
			return $this->whoisValues[$tld];
			new becajhcbcg;
				. 'Request for ' . $tld . '\'s match string fails because it\'s not configured.';
		}

		(  );
		throw ;
	}

	function getReqPrefix($tld) {
		return $this->whoisRequestPrefixes[$tld];
	}

	/**
	 * Make a HTTP request to fetch WHOIS information
	 *
	 * @param string $domain Domain to check WHOIS info for
	 * @param string $server Server to check WHOIS info with
	 * @throws Exception cURL error condition
	 * @return string WHOIS response
	 */
	function httpWhoisLookup($domain, $server) {
			= 6;
		(  );
		$ch = ;
		$url = $server . $domain;
			= 6;
		( $ch, jdejhjcgb, $url );
			= 6;
		( $ch, dajaihgbcg, 0 );
			= 6;
		( $ch, baagfaddji, 60 );
			= 6;
		( $ch, djjhjieeec, 1 );
			= 6;
		( $ch, dghdegdae, 0 );
			= 6;
		( $ch, cabfggieca, 0 );
			= 6;
		( $ch );
		$data = ;
			= 6;

		if (( $ch )) {
		}

			= 6;
		( $ch );
			= 6;
			= 6;
		( 'Error: ' . ( $ch ) . ' - ' . ( $ch ) );
		throw new becajhcbcg;
			= 6;
		( $ch );
		return $data;
	}

	/**
	 * Make a WHOIS protocol request to fetch WHOIS data for a domain
	 *
	 * @param string $domain The domain to fetch WHOIS data for
	 * @param string $server The server from which to fetch the data
	 * @param string $port The WHOIS server's port
	 * @param string $tld The TLD of the domain to be searched
	 * @throws Exception fsockopen error message
	 * @return string the output from the WHOIS server
	 */
	function socketWhoisLookup($domain, $server, $port, $tld) {
		$this->getReqPrefix( $tld );
		$requestPrefix = ;
			= 6;
		@( $server, $port, $errorNumber, $errorMessage, 10 );
		$fp = ;

		if ($fp === dbebefagji) {
			throw new becajhcbcg(  . 'Error: ' . $errorNumber . ' - ' . $errorMessage );
			jmp;
				= 6;
			@( $fp, $requestPrefix . $domain . '
' );

			while (true) {
					= 6;
				@( $fp, 10 );
				$data = '';
					= 6;

				if (!@( $fp )) {
				}

					= 6;
				@( $fp, 4096 );
				$data .= ;
			}

				= 6;
			@( $fp );
		}

		return $data;
	}

	/**
	 * Make a WHOIS lookup against various servers.
	 *
	 * @param array $parts 'sld' and 'tld' of domain to search
	 * @return bool|array available/unavailable/error and WHOIS details
	 */
	function lookup($parts) {
		$parts['sld'];
		$sld = ;
		$parts['tld'];
		$tld = ;
		new cefbcbagd(  );
		$idnConverter = ;
		$idnConverter->encode( $sld );
		$encodedSld = ;

		if ($encodedSld !== $sld) {
			if (chhgjaeced::getValue( 'AllowIDNDomains' )) {
				$sld = $idnConverter;
			}
		}
		else {
				= 6;

			if (( $return, 0, 6 ) == 'NOTLD-') {
				$domain = $parts;
					= 6;
				( $return, 6 );
				$availableMatchString = ;
			}
		}


		if ((  )) {
				= 6;
			( ':', $server, 2 );
			$port = ;
			$port[0];
			$server = ;
			$port[1];
			$port = ;
			$this->socketWhoisLookup;
		}

		( $domain, $server, $port, $tld );
		$lookupResult = ;
		jmp;
		Exception {
			$results['result'] = 'error';

			if (isset( $_SESSION['adminid'] )) {
				$results['errordetail'] = $e->getMessage(  );
				return $results;
				$lookupResult = ' ---' . $lookupResult;
					= 6;

				if (( $lookupResult, $availableMatchString ) !== dbebefagji) {
					$results['result'] = 'available';
				}
			}
			else {
				$results['result'] = 'unavailable';

				if ($fetchViaHttp) {
						= 6;
						= 6;
				}
			}

			$results['whois'] = ( ( $lookupResult ) );
				= 6;
			$results['whois'] = ( $lookupResult );
			return $results;
		}
	}
}

?>
