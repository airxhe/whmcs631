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

class WHMCS\Cookie {
	function __construct() {
	}

	function get($name, $treatAsArray = false) {
			= 6;

		if (( 'WHMCS' . $name, $_COOKIE )) {
			$val = (true ? $_COOKIE['WHMCS' . $name] : '');

			if ($treatAsArray) {
					= 6;
					= 6;
			}

			( ( $val ), cjhcifebeg );
		}

		$val = ;
			= 6;

		if (( $val )) {
				= 6;
			( $val );
			array(  );
		}

		$val = ;
		return $val;
	}

	function set($name, $value, $expires = 0, $secure = false) {
			= 6;

		if (( $value )) {
				= 6;
				= 6;
			( ( $value ) );
			$value = ;
				= 6;

			if (!( $expires )) {
					= 6;

				if (( $expires, -1 ) == 'm') {
						= 6;
					(  );
						= 6;
					( $expires, 0, -1 );
				}
			}
		}

		$expires =  +  * 30 * 24 * 60 * 60;
		jmp;
		$expires = 4;
			= 6;
		return ( 'WHMCS' . $name, $value, $expires, '/', bhgbjheaia, $secure, cjhcifebeg );
	}

	function delete($name) {
		unset( $_COOKIE['WHMCS' . $name] );
		return self::set( $name, bhgbjheaia, -86400 );
	}
}

?>
