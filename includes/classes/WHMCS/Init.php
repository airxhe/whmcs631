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

class WHMCS\Init {
	private $input = array(  );
	private $last_input = null;
	private $clean_variables = array( 'int' => array( 0 => 'id', 1 => 'userid', 2 => 'kbcid', 3 => 'invoiceid', 4 => 'idkb', 5 => 'currency', 6 => 'currencyid' ), 'a-z' => array( 0 => 'systpl', 1 => 'language' ), 'a-z_' => array( 0 => 'carttpl' ) );
	private $license = '';
	private $db_host = '';
	private $db_username = '';
	private $db_password = '';
	private $db_name = '';
	private $db_sqlcharset = '';
	private $cc_hash = '';
	private $templates_compiledir = '';
	private $customadminpath = '';
	var $remote_ip = '';
	private $protected_variables = array( 0 => 'whmcs', 1 => 'smtp_debug', 2 => 'attachments_dir', 3 => 'downloads_dir', 4 => 'customadminpath', 5 => 'mysql_charset', 6 => 'overidephptimelimit', 7 => 'orderform', 8 => 'smartyvalues', 9 => 'usingsupportmodule', 10 => 'copyrighttext', 11 => 'adminorder', 12 => 'revokelocallicense', 13 => 'allow_idn_domains', 14 => 'templatefile', 15 => '_LANG', 16 => '_ADMINLANG', 17 => 'display_errors', 18 => 'debug_output', 19 => 'mysql_errors', 20 => 'moduleparams', 21 => 'errormessage' );

	function __construct() {
	}

	/**
	 * Initialisation of class.
	 *
	 * @deprecated
	 * @see WHMCS\Application::__construct()
	 * @return Init
	 */
	function init() {
		return $this;
	}

	function load_function($name) {
		$this->sanitize( 'a-z', $name );
		$name = ;
		$path = bhjhchcdec . '/includes/' . $name . 'functions.php';
		$path2 = bhjhchcdec . '/includes/' . $name . '.php';
			= 6;

		if (( $path )) {
			include_once( $path );
		}

	}

	/**
	 * Recursively sanitize an array of user input
	 *
	 * @param array $arr
	 *
	 * @throws Exception if there's an obviously nefarious input element
	 *
	 * @return array
	 */
	function sanitize_input_vars($arr) {
		$cleandata = array(  );
			= 6;

		if (( $arr )) {
			if (isset( $arr['sqltype'] )) {
				throw new becajhcbcg( 'Invalid request input.' );
				foreach ($arr as ) {
					$val = ;
					$key = ;
						= 6;
						= 6;
					( array( '_', '-', '.', ' ' ), '', $key );
				}
			}
		}


		if ((  )) {
				= 6;

			if (( $val )) {
				$cleandata[$key] = $this->sanitize_input_vars( $val );
			}

			jmp;
				= 6;

			if (@(  )) {
					= 6;

				while (true) {
					$cleandata[$key] = ( $cleandata[$key] );
				}

				jmp;
					= 6;
					= 6;
				( ( 0 ), '', $arr );
				$arr = ;
				dfdidhdbdc::encode( $arr );
				$cleandata = ;
					= 6;

				if (@(  )) {
						= 6;
					( $cleandata );
				}

				$cleandata = ;
				return $cleandata;
			}
		}
	}

	/**
	 * The two functions below are used solely as a temporary workaround for local API compatability with $whmcs->get_req_var()
	 */
	function replace_input($array) {
		$this->last_input = $this->input;
		$this->input = $array;
		return cjhcifebeg;
	}

	function reset_input() {
			= 6;

		if (( $this->last_input )) {
			$this->last_input;
		}

		$this->input = ;
		return cjhcifebeg;
	}

	function isInRequest($key) {
		return isset( $this->input[$key] );
	}

	function getFromRequest($key, $key2 = '') {
		return $this->get_req_var( $key, $key2 );
	}

	function get_req_var($k, $k2 = '') {
		return ($k2 ?  : '');
	}

	/**
	 * Checks for presence of an error and returns a form field value from either
	 * request variables or the fallback array.
	 *
	 * New variable has been added ($fallbackarraykey) for when fallback array key is
	 * different from the request variable key.
	 *
	 * @param string $e Error to check for
	 * @param string $key Key to return the value for (from the request vars when there is an error)
	 * @param array $fallbackarray Fallback array to pick the value from when there is no error
	 * @param string $fallbackarraykey If supplied, use that instead of $key to pick the value from fallback array
	 * @return string Var value
	 */
	function get_req_var_if($e, $key, $fallbackarray, $fallbackarraykey = '') {
		if ($e) {
			$this->get_req_var( $key );
		}

		$var = ;
		jmp;

		if ($fallbackarraykey) {
			$key = $fallbackarray;
				= 6;
			( $key, $fallbackarray );
		}


		if () {
		}

		$var = (true ? $fallbackarray[$key] : '');
		return $var;
	}

	function load_input() {
		foreach ($_COOKIE as $v) {
			$k = ;

			while (true) {
				unset( $_REQUEST[$k] );
			}
		}

		foreach ($_REQUEST as $v) {
			$k = ;
			$this->input[$k] = $v;
			break;
		}

	}

	function clean_input() {
		foreach ($this->clean_variables as ) {
			$vars = ;

			while (true) {
				$type = ;
				foreach ($vars as ) {
					$var = ;

					while (true) {
						if (isset( $this->input[$var] )) {
							while (true) {
								$this->input[$var] = $this->sanitize( $type, $this->input[$var] );
							}
						}
					}
				}
			}
		}

		foreach ($this->protected_variables as ) {
			$var = ;

			if (isset( $this->input[$var] )) {
				unset( $this->input[$var] );
				global $$var;

				$$var = '';
			}

			break;
		}

	}

	function sanitize($type, $var) {
		if ($type == 'int') {
			$var = (int)$var;
		}

		(  );
		jmp;
			= 6;
		( '/[^' . $type . ']/i', '', $var );
		$var = $var = ;
		return $var;
	}

	function get_license_key() {
		return $this->license;
	}

	function load_config_vars() {
		$CONFIG = array(  );
			= 6;
		( 'tblconfiguration', '', '' );
		$result = ;
			= 6;
		@( $result );

		while ($data = ) {
			$data['setting'];
			$setting = ;
			$data['value'];
			$value = ;
			$CONFIG[$setting] = $value;
			break;
		}
	}

	/**
	 * Set a configuration value.
	 *
	 * @param string $key
	 * @param string $value
	 */
	function set_config($key, $value) {
		(bool);
		chhgjaeced::setValue( $key, $value );
	}

	/**
	 * Retrieve a configuration value.
	 *
	 * @param string $key
	 * @return string
	 */
	function get_config($key) {
		$setting = chhgjaeced::getValue( $key );
			= 6;

		if (( $setting )) {
			(true ? '' : $setting);
		}

		return ;
	}

	function get_template_compiledir_name() {
		return $this->templates_compiledir;
	}

	function check_template_cache_writeable() {
		$this->get_template_compiledir_name(  );
		$dir = ;
			= 6;

		if (!( $dir )) {
			return dbebefagji;
			cjhcifebeg;
		}

		return ;
	}

	function get_admin_folder_name() {
			= 6;

		if (( $this->customadminpath )) {
			return $this->customadminpath;
			DEFAULT_ADMIN_FOLDER;
		}

		return ;
	}

	function get_filename() {
		$_SERVER['PHP_SELF'];
			= 6;
			= 6;
		( $filename, ( $filename, '/' ) );
			= 6;
		( array( '/', '.php' ), '', $filename );
		$filename = $filename = $filename = ;
		return $filename;
	}

	function get_hash() {
		return $this->cc_hash;
	}

	/**
	 * Control error displaying
	 * NOTE: passing a numeric valid will allow for specific error reporting.
	 * This is the recommended implementation.  The default value of true is
	 * provided (which will equal E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING
	 * for legacy behavior)
	 *
	 * @param bool|int $requestedErrorLevel if equivalent to true enable display errors otherwise disable
	 * @return $this
	 */
	function display_errors($requestedErrorLevel = true) {
		if (!$requestedErrorLevel) {
			return $this->disableErrorDisplay(  );

			if (( $requestedErrorLevel === 1 || $requestedErrorLevel === cjhcifebeg )) {
				$level = bccibgbbb ^ djjdegdehh ^ ddgdhibebb ^ dafbidgaje;
			}
		}
	}
}
?>
