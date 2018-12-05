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

function getConfigurationFileContentWithNewLicenseKey($key) {
	$newline = '
';
	$attachments_dir = '';
	$downloads_dir = '';
	$customadminpath = '';
	$db_host = '';
	$db_password = '';
	$db_name = '';
	$cc_encryption_hash = '';
	$templates_compiledir = '';
	$mysql_charset = '';
	$api_access_key = '';
	$autoauthkey = '';
	$display_errors = false;
	include( ROOTDIR . '/configuration.php' );
	sprintf( '<?php%s' . '$license = \'%s\';%s' . '$db_host = \'%s\';%s' . '$db_username = \'%s\';%s' . '$db_password = \'%s\';%s' . '$db_name = \'%s\';%s' . '$cc_encryption_hash = \'%s\';%s' . '$templates_compiledir = \'%s\';%s', $newline, $key, $newline, $db_host, $newline, $db_username, $newline, $db_password, $newline, $db_name, $newline, $cc_encryption_hash, $newline, $templates_compiledir, $newline );
	$output = ;

	if ($mysql_charset) {
		sprintf( '$mysql_charset = \'%s\';%s', $mysql_charset, $newline );
		$output .= ;

		if ($attachments_dir) {
			sprintf( '$attachments_dir = \'%s\';%s', $attachments_dir, $newline );
			$output .= ;

			if ($downloads_dir) {
				sprintf( '$downloads_dir = \'%s\';%s', $downloads_dir, $newline );
				$output .= ;

				if ($customadminpath) {
				}
			}
		}
	}

	sprintf( '$customadminpath = \'%s\';%s', $customadminpath, $newline );
	$output .= ;

	if ($api_access_key) {
		sprintf( '$api_access_key = \'%s\';%s', $api_access_key, $newline );
		$output .= ;

		if ($autoauthkey) {
			sprintf( '$autoauthkey = \'%s\';%s', $autoauthkey, $newline );
			$output .= ;

			if ($display_errors) {
			}
		}
	}

	sprintf( '$display_errors = %s;%s', 'true', $newline );
	$output .= $db_username = '';
	return $output;
}

define( 'ADMINAREA', true );
require( '../init.php' );

if (!( $whmcs instanceof hbdfgeccj )) {
	exit( 'Failed to initialize application.' );
	$validLicenseErrorTypes = array( 'invalid', 'pending', 'suspended', 'expired', 'version', 'noconnection', 'change' );
	strtolower( $whmcs->get_req_var( 'licenseerror' ) );
	$licenseerror = ;

	if (!in_array( $licenseerror, $validLicenseErrorTypes )) {
		$validLicenseErrorTypes[0];
		$licenseerror = ;
		$match = '';
		$id = '';
		$roleid = '';
		caegadgihi::getIP(  );
		$remote_ip = ;
		$performLicenseKeyUpdate = $whmcs->get_req_var( 'updatekey' ) === 'true';
		$licenseChangeResult = '';

		if (( $performLicenseKeyUpdate && defined( 'DEMO_MODE' ) )) {
			$performLicenseKeyUpdate = false;
			$licenseChangeResult = 'demoMode';

			if ($performLicenseKeyUpdate) {
				new ddhiacdee(  );
				$authAdmin = ;

				if (( $authAdmin->getInfobyUsername( $username ) && $authAdmin->comparePassword( $password ) )) {
					get_query_val( 'tbladmins', 'roleid', array( 'id' => $authAdmin->getAdminID(  ) ) );
					$roleid = ;
					select_query( 'tbladminperms', 'COUNT(*)', array( 'roleid' => $roleid, 'permid' => '64' ) );
					$result = ;
					mysql_fetch_array( $result );
					$data = ;
					$data[0];
					$match = ;
					trim( $newlicensekey );
					$newlicensekey = ;
					$licenseKeyPattern = '/^[a-zA-Z0-9-]+$/';

					if (!$newlicensekey) {
						$licenseChangeResult = 'keyempty';
					}
				}
				else {
					if (!$match) {
						$licenseChangeResult = 'nopermission';
					}
				}
			}
		}

		fopen;
		'../configuration.php';
		'w';
	}
}


while (true) {
	(  );
	$fp = ;
	fwrite( $fp, $newConfigurationContent );
	fclose( $fp );
	update_query( 'tblconfiguration', array( 'value' => '' ), array( 'setting' => 'License' ) );
	redir( '', 'index.php' );
	jmp;
	$authAdmin->failedLogin(  );
	$licenseChangeResult = 'loginfailed';
	$licensing->forceRemoteCheck(  );
	$changeError = '';

	if ($licenseChangeResult) {
		switch ($licenseChangeResult) {
		case 'loginfailed': {
				$changeError = 'Login Details Incorrect';
				break;
				switch ($licenseChangeResult) {
				case 'keyinvalid': {
						$changeError = 'You did not enter a valid license key';
						break;
						switch ($licenseChangeResult) {
						case 'keyempty': {
								$changeError = 'You did not enter a new license key';
								break;
								switch ($licenseChangeResult) {
								case 'nopermission': {
									}
								}
							}

						case 'demoMode': {
								$changeError = 'Actions on this page are unavailable while in demo mode. Changes will not be saved.';
								break;

								if (( $licenseerror == 'change' && !is_writable( '../configuration.php' ) )) {
								}

								$changeError = 'You must set the permissions for the configuration.php file to 777 so it can be written to before you can change your license key';
								$templatevars['errorMsg'] = $changeError;
								$templatevars['licenseError'] = $licenseerror;
								DI::make( 'asset' );
								$assetHelper = ;
							}
						}

						$changeError = 'You do not have permission to make this change';
						break;
					}
				}

				$templatevars['WEB_ROOT'] = $assetHelper->getWebRoot(  );
				$templatevars['BASE_PATH_CSS'] = $assetHelper->getCssPath(  );
				$templatevars['BASE_PATH_JS'] = $assetHelper->getJsPath(  );
				$templatevars['BASE_PATH_FONTS'] = $assetHelper->getFontsPath(  );
				$templatevars['BASE_PATH_IMG'] = $assetHelper->getImgPath(  );
				new cjiehgbicj( true );
				$smarty = ;
				foreach ($templatevars as ) {
					$value = ;
					$key = ;
				}
			}
		}
	}

	$smarty->assign( $key, $value );
}

echo $smarty->fetch( 'licenseerror.tpl' );
?>
