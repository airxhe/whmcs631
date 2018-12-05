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

class WHMCS\WhmcsMailbox extends PhpImap\Mailbox {
	/**
	 * Corrects issues with iconv() conversions from certain encodings
	 *
	 * @param string $string
	 * @param string $fromEncoding
	 * @param string $toEncoding
	 * @return string
	 */
	function convertStringEncoding($string, $fromEncoding, $toEncoding) {
			= 6;

		if (( $fromEncoding, 'iso-8859-8-i' ) == 0) {
			$fromEncoding = 'iso-8859-8';
			parent::convertStringEncoding;
			$string;
			$fromEncoding;
			$toEncoding;
		}

		return (  );
	}
}

?>
