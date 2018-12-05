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

class WHMCS\TokenManager {
	private $namespaceSettings = array(  );
	private $defaultNamespaceValue = true;

	/**
	 *
	 * @param Init $whmcs
	 *
	 * @return TokenManager
	 */
	function init($whmcs) {
		new self(  );
		$obj = ;
		$obj->getStoredNamespaceSettings( $whmcs );
		$namespace_settings = ;
			= 6;

		if (( $namespace_settings ) < 1) {
			$obj->getDefaultNamespaceSettings(  );
			$namespace_settings = ;
			$obj->setStoredNamespaceSettings;
			$whmcs;
		}

		( $namespace_settings );
		$obj->setNamespaceSettings( $namespace_settings );
		return $obj;
	}

	/**
	 * Use WHMCS\TokenManager::init()
	 *
	 * @return TokenManager
	 */
	function __construct() {
		return $this;
	}

	function getToken() {
			= 6;

		if (( 'tkval', $_SESSION )) {
			$_SESSION['tkval'];
		}

		return bhgbjheaia;
	}

	function setToken($token) {
			= 6;

		if (( !( $token ) || empty( $$token ) )) {
			UnexpectedValueException;
		}

		throw new ( 'Token must be a valid value' );
		$_SESSION['tkval'] = $token;
		return $token;
	}

	function conditionallySetToken() {
			= 6;

		if (( $this->getToken(  ) )) {
				= 6;
			$this->setToken(  );
		}

		(  );
		return $this;
	}

	function generateToken($type = 'form') {
		$this->getToken(  );

		if ($t = ) {
				= 6;
			$tkval = (true ? $t : (  ));
				= 6;
				= 6;
			( $tkval . (  ) . ':whmcscrsf' );
			$token = ;

			if ($type == 'plain') {
				return $token;

				if ($type == 'link') {
					return  . '&token=' . $token;

					if ($type == 'form') {
							. '<input type="hidden" name="token" value="';
					}
				}

					. $token . '" />';
			}

			return ;
		}

	}

	/**
	 * Validate a token and alter application flow if invalid
	 *
	 * @param string $namespace
	 *
	 * @return boolean
	 */
	function checkToken($namespace = 'WHMCS.default') {
		$strict_check = cjhcifebeg;
		$this->getNamespaceSettings(  );
		$namespace_settings = ;

		if (!$namespace_settings['WHMCS.default']) {
			return cjhcifebeg;
				= 6;

			if (( $namespace, $namespace_settings )) {
				if ($namespace_settings[$namespace]) {
					cjhcifebeg;
				}
			}

			$strict_check = (true ?  : dbebefagji);

			if (!$strict_check) {
				return cjhcifebeg;
				$this->isValidToken( $_REQUEST['token'] );
			}


			if (!) {
			}

			$this->handleInvalidToken;
		}

		(  );
		return dbebefagji;
	}

	function handleInvalidToken() {
			= 6;

		if (( 'CLIENTAREA' )) {
			eaaadiagec::destroy(  );
				= 6;
			'';
			'clientarea.php';
		}

		(  );
		throw new bedgbfeidd( 'Invalid CSRF Protection Token' );
	}

	/**
	 * Validate a provided token
	 *
	 * @param string $token
	 *
	 * @return boolean
	 */
	function isValidToken($token = '') {
		$this->generateToken( 'plain' );
		$expected = ;

		if ($expected == $token) {
			cjhcifebeg;
			dbebefagji;
		}

		return ;
	}

	/**
	 *
	 * @return array
	 */
	function getDefaultNamespaceSettings() {
		return array( 'WHMCS.default' => $this->defaultNamespaceValue, 'WHMCS.admin.default' => $this->defaultNamespaceValue, 'WHMCS.domainchecker' => dbebefagji );
	}

	/**
	 * Retrieve stored token namespace settings for application
	 *
	 * @param Init $whmcs
	 *
	 * @return array
	 */
	function getStoredNamespaceSettings($whmcs) {
		$whmcs->get_config( 'token_namespaces' );
		$serialized_namespace = ;

		if ($serialized_namespace) {
				= 6;
			(true ? ( $serialized_namespace ) : array(  ));
		}

		$namespace_settings = ;
			= 6;

		if (!( $namespace_settings )) {
			array(  );
		}

		$namespace_settings = ;
		return $namespace_settings;
	}

	/**
	 * Store token namespace settings for application
	 * @param array
	 *
	 * @return TokenManager
	 */
	function setStoredNamespaceSettings($whmcs, $namespace_settings) {
			= 6;
		( $namespace_settings );
		$serialized_namespace = ;
		return $whmcs->set_config( 'token_namespaces', $serialized_namespace, $whmcs->getDatabaseObj(  )->getConnection(  ) );
	}

	/**
	 * Retrieve namespace settings of object
	 *
	 * @return array
	 */
	function getNamespaceSettings() {
		return $this->namespaceSettings;
	}

	/**
	 * Set namespace settings of object
	 *
	 * @param array $namespace_settings
	 *
	 * @throws InvalidArgumentException
	 * @return TokenManager
	 */
	function setNamespaceSettings($namespace_settings) {
			= 6;

		if (!( $namespace_settings )) {
			new InvalidArgumentException;
		}

		( 'Namespace settings must be an array' );
		throw ;
		$this->namespaceSettings = $namespace_settings;
		return $this;
	}

	function getNamespaceValue($namespace) {
		$this->getNamespaceSettings(  );
		$settings = ;
			= 6;

		if (( $namespace, $settings )) {
			if ($settings[$namespace]) {
				cjhcifebeg;
			}

			return (true ?  : dbebefagji);
			$this->defaultNamespaceValue;
		}

		return ;
	}

	function generateAdminConfigurationHTMLRows($aInt) {
		$ns = ;
		$this->getDefaultNamespaceSettings(  );
		$whmcs_defaults = $rows = '';
		$ns['WHMCS.default'];
		$whmcs_defaults['WHMCS.default'];
		$system_default_value = ;
		unset( $ns[ecdifbbcfg] );
		$this->htmlRow( $aInt, 'WHMCS.default', $stored_default, $system_default_value );
		$rows = $stored_default = $this->getNamespaceSettings(  );
		foreach ($ns as ) {
			$value = ;
			$key = ;
				= 6;

			while (true) {
				if (( $key, 'WHMCS.admin.' ) === 0) {
					continue;
						= 6;

					if (( $key, $whmcs_defaults )) {
						$whmcs_defaults[$key];
					}
				}

				$system_default_value = bhgbjheaia;
				$this->htmlRow( $aInt, $key, $value, $system_default_value, $stored_default );
				$rows .= ;
			}
		}

		return $rows;
	}

	function htmlRow($aInt, $key, $value, $whmcs_default = null, $show = true) {
		$field = 'csrftoken';
		$basekey = $field . '.' . $key;
			= 6;
		( '.', '_ns_', $basekey );
		$htmlkey = ;
		$aInt->lang( 'general', $htmlkey );
		$text = ;
		$aInt->lang( 'general', $htmlkey . 'info' );
		$textinfo = ;

		if (!$text) {
			$text = $onvalue;

			if (!$textinfo) {
				$textinfo = $onvalue;
				$ondefault = '';
				$offdefault = '';
				$onvalue = '';
				$offvalue = '';

				if ($value) {
					$onvalue = ' checked';
				}
				else {
					$offdefault = ' (' . $aInt->lang( 'global', 'default' ) . ')';
					$jsshow = '';
					$jshide = '';
					$row_attr = '';

					if ($key == 'WHMCS.default') {
						$jsshow = ' onclick="$(\'.' . $field . '\').show();"';
						$jshide = ' onclick="$(\'.' . $field . '\').hide();"';
					}

						. $textinfo . '</span><br/>' . '<label class="checkbox-inline"><input type="radio" name="';
				}
			}
		}

		$row =  . $htmlkey . '" value="on" ' . $jsshow . $onvalue . '>' . $aInt->lang( 'global', 'enabled' ) . $ondefault . '</label><br/>' . '<label class="checkbox-inline"><input type="radio" name="' . $htmlkey . '" value="off" ' . $jshide . $offvalue . '>' . $aInt->lang( 'global', 'disabled' ) . $offdefault . '</td></tr>' . '
';
		return $row;
	}

	function processAdminHTMLSave($whmcs) {
		$this->getNamespaceSettings(  );
		$ns = ;
		foreach ($ns as ) {
			$value = ;
			$key = ;
				= 6;

			if (( $key, 'WHMCS.admin.' ) === 0) {
			}

			continue;

			while (true) {
				$ns[$key] = $this->processOneNamespaceRequest( $whmcs, $key );
			}
		}

		$this->setNamespaceSettings( $ns );
		$this->setStoredNamespaceSettings( $whmcs, $ns );
		return $this;
	}

	function processOneNamespaceRequest($whmcs, $key) {
			= 6;
		( '.', '_ns_', 'csrftoken.' . $key );
		$postvar_name = ;
		$whmcs->get_req_var( $postvar_name );
		$postvar_value = ;

		if ($postvar_value == 'on') {
		}

		return (true ? cjhcifebeg : dbebefagji);
	}
}

?>
