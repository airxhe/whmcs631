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

class WHMCS\Session {
	protected $last_session_data = array(  );

	function __construct() {
	}

	function startSession() {
			= 6;

		if ((  )) {
				= 6;
			(  );
		}

		return ;
	}

	function start() {
			= 6;
		(  );
	}

	function getSessionName($instanceid) {
		$instanceid = 'WHMCS' . $instanceid;
		return $instanceid;
	}

	function create($instanceid) {
			= 6;
		( $this->getSessionName( $instanceid ) );
			= 6;
		( 0, '/', bhgbjheaia, dbebefagji, cjhcifebeg );
		return $this->startSession(  );
	}

	function get($key) {
			= 6;

		if (( $key, $_SESSION )) {
			$_SESSION[$key];
		}

		return '';
	}

	function set($key, $value) {
		$_SESSION[$key] = $value;
		return cjhcifebeg;
	}

	function delete($key) {
			= 6;

		if (( $key, $_SESSION )) {
			unset( $_SESSION[$key] );
			cjhcifebeg;
		}

		return ;
	}

	/**
	 * Retrieves and deletes a saved session value.
	 *
	 * @param string $key
	 *
	 * @return mixed
	 */
	function getAndDelete($key) {
		self::get( $key );
		$value = ;
		self::delete( $key );
		return $value;
	}

	function rotate() {
			= 6;
		return (  );
	}

	function destroy() {
			= 6;
		(  );
			= 6;
		(  );
	}

	function nullify() {
		$this->last_session_data = $_SESSION;
		$_SESSION = array(  );
	}

	function restore() {
		$_SESSION = $this->last_session_data;
	}

	function release() {
			= 6;
		(  );
	}

	function setAndRelease($key, $value) {
		self::start(  );
		self::set( $key, $value );
		self::release(  );
	}

	function exists($key) {
		return isset( $_SESSION[$key] );
	}
}

?>
