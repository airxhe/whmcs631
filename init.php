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
 * Include core required file or gracefully handle file not existing
 *
 * @param string $path
 */
function gracefulCoreRequiredFileInclude($path) {
	$fullpath = ROOTDIR . $path;

	if (file_exists( $fullpath )) {
		include_once( $fullpath );
		return null;
		cgjfihaefi::applicationError( 'Down for Maintenance', 'One or more required files are missing. ' . 'If an install or upgrade is not currently in progress, ' . 'please contact the system administrator.' );
	}

	echo ;
	exit(  );
}

function htmlspecialchars_array($arr) {
	return App::self(  )->sanitize_input_vars( $arr );
}

ini_set( 'eaccelerator.enable', 0 );
ini_set( 'eaccelerator.optimizer', 0 );

if (!defined( 'ROOTDIR' )) {
	define( 'ROOTDIR', realpath( dirname( __FILE__ ) ) );

	if (file_exists( ROOTDIR . DIRECTORY_SEPARATOR . 'c3.php' )) {
		include( ROOTDIR . DIRECTORY_SEPARATOR . 'c3.php' );

		if (!defined( 'WHMCS' )) {
			define( 'WHMCS', true );
			gracefulCoreRequiredFileInclude( '/vendor/autoload.php' );
			gracefulCoreRequiredFileInclude( '/includes/dbfunctions.php' );
			gracefulCoreRequiredFileInclude( '/includes/functions.php' );

			if (defined( 'CLIENTAREA' )) {
				gracefulCoreRequiredFileInclude( '/includes/clientareafunctions.php' );

				if (( defined( 'ADMINAREA' ) || defined( 'MOBILEEDITION' ) )) {
					gracefulCoreRequiredFileInclude( '/includes/adminfunctions.php' );
					ddabehjbjd::boot(  );
					App::self(  );
					$whmcs = ;
					ddabehjbjd::verifyInstallerIsAbsent(  );
					ddabehjbjd::persistSession(  );
					DI::make( 'lang' );

					if (defined( 'CLIENTAREA' )) {
						ciccciihjd::getLanguages(  );
					}

					( (  ), array( 'trace' => $e->getTrace(  ) ) );

					if (( $e instanceof cdjddcaige || $e instanceof deejfehdfb )) {
						cgjfihaefi::applicationError;
						'Welcome to WHMCS!';
						'Before you can begin using WHMCS you need to perform the installation procedure. ' . '<a href="';

						if (file_exists( 'install/install.php' )) {
							echo (  . (true ? '' : '../') . 'install/install.php" style="color:#000;">Click here to begin...</a>' );
							exit(  );
							jmp;

							if ($e instanceof didijfcgca) {
								if (file_exists( '../install/install.php' )) {
									header( 'Location: ../install/install.php' );
									exit(  );
									echo cgjfihaefi::applicationError( 'Down for Maintenance (Err 2)', 'An upgrade is currently in progress... Please come back soon...' );
									exit(  );
								}
							}

							echo ;
							exit(  );
							$whmcs->getApplicationConfig(  );
							$whmcsAppConfig = ;
							$whmcsAppConfig['templates_compiledir'];
							$templates_compiledir = ;
							$whmcsAppConfig['downloads_dir'];
							$downloads_dir = ;
							$whmcsAppConfig['attachments_dir'];
							$attachments_dir = ;
							$whmcsAppConfig['customadminpath'];
							$customadminpath = ;

							if (function_exists( 'mb_internal_encoding' )) {
								if ($whmcs->get_config( 'Charset' ) == '') {
									$characterSet = (true ? 'UTF-8' : $whmcs->get_config( 'Charset' ));
									mb_internal_encoding( $characterSet );

									if (( defined( 'ADMINAREA' ) && !defined( 'MOBILEEDITION' ) )) {
										dirname( $whmcs->getPhpSelf(  ) );
										$currentDirectoryPath = ;
										explode;
										'/';
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

( $currentDirectoryPath );
$currentDirectoryPathParts = ;
array_pop( $currentDirectoryPathParts );
$currentDir = ;
$whmcs->getApplicationConfig(  );
$appConfig = ;
$appConfig['customadminpath'];
$configuredAdminDir = ;
$adminDirErrorMsg = '';

if (( $configuredAdminDir == 'admin' && $currentDir != $configuredAdminDir )) {
	$adminDirErrorMsg = 'You are attempting to access the admin area via a directory' . ' that is not configured. Please either revert to the default admin' . ' directory name, or see our documentation for' . ' <a href="http://docs.whmcs.com/Customising_the_Admin_Directory" target="_blank">Customising the Admin Directory</a>.';
}

(  );

if (( ( $twofa->isForced(  ) && !$twofa->isEnabled(  ) ) && $twofa->isActiveClients(  ) )) {
	$whmcs->get_filename(  );
	$filename = ;

	if (( ( $filename == 'clientarea' && ( $whmcs->get_req_var( 'action' ) == 'security' || $whmcs->get_req_var( '2fasetup' ) ) ) || $filename == 'logout' )) {
	}
}

$_SESSION['currency'] = ['id'];

if (( !isset( $_SESSION['uid'] ) && isset( $_REQUEST['currency'] ) )) {
	select_query( 'tblcurrencies', 'id', array( 'id' => (int)$_REQUEST['currency'] ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;

	if ($data['id']) {
		$_SESSION['currency'] = $data['id'];

		if (!( ( ( defined( 'CLIENTAREA' ) && $whmcs->isSSLAvailable(  ) ) && !( eaaadiagec::get( 'FORCESSL' ) && $whmcs->getCurrentFilename(  ) == 'index' ) ))) {
			define;
			'FORCESSL';
		}
	}
}

( true );
$_REQUEST;
$reqvars = ;

if (array_key_exists( 'token', $reqvars )) {
	unset( $reqvars[token] );

	if (( $whmcs->shouldSSLBeForcedForCurrentPage(  ) || defined( 'FORCESSL' ) )) {
		if (!$whmcs->in_ssl(  )) {
			$whmcs->redirectSystemSSLURL;
			$whmcs->getCurrentFilename( false );
			$reqvars;
		}

		(  );
	}
}


if () {
	$whmcs->redirectSystemURL;
	$whmcs->getCurrentFilename( false );
	$reqvars;
}

(  );
load_hooks(  );
?>
