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

/**
 * Get a valid path to the root directory.  This value that can be overridden in
 * the config.php file.
 *
 * @throws \Exception if init.php cannot be loaded
 *
 * @return string
 */
function getWhmcsInitPath() {
	$whmcspath = dirname( 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\crons' ) . DIRECTORY_SEPARATOR;

	if (file_exists( 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\crons' . DIRECTORY_SEPARATOR . 'config.php' )) {
		require( 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\crons' . DIRECTORY_SEPARATOR . 'config.php' );
		realpath( $whmcspath . DIRECTORY_SEPARATOR . 'init.php' );
		$path = ;

		if (!$path) {
			new Exception;
			'Unable to determine WHMCS init.php path.';
		}
	}

	(  );
	throw ;
	return $path;
}

/**
 * Generic error message when crons/config.php does not properly define the
 * root directory of the WHMCS installation.
 *
 * @return string
 */
function getInitPathErrorMessage() {
	return 'Unable to communicate with the WHMCS installation.<br />
Please verify the path configured within the crons directory config.php file.<br />
For more information, please see <a href="http://docs.whmcs.com/Custom_Crons_Directory">http://docs.whmcs.com/Custom_Crons_Directory</a>
';
}

/**
 * Parse the text to be output depending on if CLI or not
 *
 * @param string $output the text to format
 *
 * @return string the formatted text
 */
function cronsFormatOutput($output) {
	if (cronsIsCli(  )) {
	}

	$output = strip_tags( str_replace( array( '<br>', '<br />', '<br/>', '<hr>' ), array( '
', '
', '
', '
---
' ), $output ) );
	return $output;
}

/**
 * Attempt to check if the application is running in CLI.
 *
 * @return bool
 */
function cronsIsCli() {
	switch (php_sapi_name(  )) {
	case 'cli': {
			break;
		}
	}

	return true;
}

?>
