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

while (true) {
	if (!defined( 'ROOTDIR' )) {
		define( 'ROOTDIR', dirname( 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\install' ) );

		if (file_exists( ROOTDIR . DIRECTORY_SEPARATOR . 'c3.php' )) {
			include( ROOTDIR . DIRECTORY_SEPARATOR . 'c3.php' );

			if (!defined( 'INSTALLER_DIR' )) {
				define( 'INSTALLER_DIR', 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\install' );
				ini_set( 'eaccelerator.enable', 0 );
				ini_set( 'eaccelerator.optimizer', 0 );
				require_once( ROOTDIR . '/vendor/autoload.php' );
				require_once( ROOTDIR . '/includes/functions.php' );
				require_once( ROOTDIR . '/includes/dbfunctions.php' );
				require_once( INSTALLER_DIR . '/functions.php' );

				if (basename( INSTALLER_DIR ) == 'install2') {
					$errorLevel = (true ? 30719 : 0);
					new dibeciijih(  );
					$terminus = ;
					$terminus->setErrorReportingLevel( $errorLevel );
					set_time_limit( 0 );
					dadiheigag::boot(  );
					Log::debug( 'Installer bootstrapped' );
					new cafdfjfeae( new bgfgjjafih( DEFAULT_VERSION ), new bgfgjjafih( FILES_VERSION ) );
					$whmcsInstaller = ;
					$whmcsInstaller->setInstallerDirectory( INSTALLER_DIR );

					if (isset( $_REQUEST['step'] )) {
						$step = (true ? trim( $_REQUEST['step'] ) : '');

						if (isset( $_REQUEST['type'] )) {
							$type = (true ? trim( $_REQUEST['type'] ) : '');

							if (isset( $_REQUEST['licenseKey'] )) {
								$licenseKey = (true ? trim( $_REQUEST['licenseKey'] ) : '');

								if (isset( $_REQUEST['databaseHost'] )) {
									$databaseHost = (true ? trim( $_REQUEST['databaseHost'] ) : '');

									if (isset( $_REQUEST['databasePort'] )) {
										$databasePort = (true ? trim( $_REQUEST['databasePort'] ) : '');

										if (isset( $_REQUEST['databaseUsername'] )) {
											$databaseUsername = (true ? trim( $_REQUEST['databaseUsername'] ) : '');

											if (isset( $_REQUEST['databasePassword'] )) {
												$databasePassword = (true ? trim( $_REQUEST['databasePassword'] ) : '');

												if (isset( $_REQUEST['databaseName'] )) {
													$databaseName = (true ? trim( $_REQUEST['databaseName'] ) : '');

													if (isset( $_REQUEST['firstName'] )) {
														$firstName = (true ? dfdidhdbdc::encode( trim( $_REQUEST['firstName'] ) ) : '');

														if (isset( $_REQUEST['lastName'] )) {
															$lastName = (true ? dfdidhdbdc::encode( trim( $_REQUEST['lastName'] ) ) : '');

															if (isset( $_REQUEST['email'] )) {
																$email = (true ? dfdidhdbdc::encode( trim( $_REQUEST['email'] ) ) : '');

																if (isset( $_REQUEST['username'] )) {
																	$username = (true ? dfdidhdbdc::encode( trim( $_REQUEST['username'] ) ) : '');

																	if (isset( $_REQUEST['password'] )) {
																		$password = (true ? dfdidhdbdc::encode( trim( $_REQUEST['password'] ) ) : '');

																		if (isset( $_REQUEST['confirmPassword'] )) {
																			$confirmPassword = (true ? dfdidhdbdc::encode( trim( $_REQUEST['confirmPassword'] ) ) : '');
																			$validationError = '';
																			$dbErrorMessage = '';

																			if ($whmcsInstaller->isInstalled(  )) {
																				DI::make( 'db' )->getSqlVersion(  );
																				break;
																			}

																			break;
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
								}
							}
						}
					}
				}
			}
		}
	}

	$systemRequirements = array( '10' => array( 'Requirement' => 'PHP Version', 'CurrentValue' => PHP_VERSION, 'RequiredValue' => '5.3.7', 'PassingStatus' => version_compare( PHP_VERSION, '5.3.7', '>=' ), 'Help' => 'WHMCS requires a certain version of PHP. We always recommend running the latest available stable version.' ), '50' => array( 'Requirement' => 'CURL with SSL Support', 'RequiredValue' => 'Available', 'FailureValue' => 'Unavailable', 'PassingStatus' => ( ( extension_loaded( 'curl' ) && dgjfdhfcee::functionEnabled( 'curl_init' ) ) && dgjfdhfcee::functionEnabled( 'curl_exec' ) ), 'Help' => 'CURL is required for external communication. Currently, it appears the CURL extension is either missing or disabled.' ), '60' => array( 'Requirement' => 'JSON', 'RequiredValue' => 'Available', 'FailureValue' => 'Unavailable', 'PassingStatus' => ( extension_loaded( 'json' ) && dgjfdhfcee::functionEnabled( 'json_encode' ) ), 'Help' => 'JSON is required. Currently, it appears the JSON extension is either missing or disabled. As of PHP 5.2.0, the JSON extension is bundled and compiled into PHP by default.' ), '70' => array( 'Requirement' => 'PDO', 'RequiredValue' => 'Available', 'FailureValue' => 'Unavailable', 'PassingStatus' => extension_loaded( 'pdo' ), 'Help' => 'PDO is required for WHMCS database connectivity. Please load the PDO extension.' ), '80' => array( 'Requirement' => 'PDO-MySQL', 'RequiredValue' => 'Available', 'FailureValue' => 'Unavailable', 'PassingStatus' => extension_loaded( 'pdo_mysql' ), 'Help' => 'The PDO MySQL driver is required for WHMCS database connectivity. Please load the PDO_MYSQL extension.' ), '90' => array( 'Requirement' => 'GD', 'RequiredValue' => 'Available', 'FailureValue' => 'Unavailable', 'PassingStatus' => ( extension_loaded( 'gd' ) && dgjfdhfcee::functionEnabled( 'imagecreate' ) ), 'Help' => 'GD Libraries for PHP are required for image processing within WHMCS. Proceeding without GD Libraries may not allow WHMCS to function properly.' ) );

	if ($whmcsInstaller->isInstalled(  )) {
		$systemRequirements['15'] = array( 'Requirement' => 'MySQL Connection', 'RequiredValue' => 'Available', 'FailureValue' => 'Unavailable', 'PassingStatus' => $dbErrorMessage == '', 'Help' => 'There was an error while connecting to MySQL database: ' . $dbErrorMessage . '. Please correct the error before proceeding.' );
		array( 'Requirement' => 'Configuration File', 'Path' => '/configuration.php', 'PassingStatus' => is_writable( ROOTDIR . '/configuration.php' ) );

		if (is_file( ROOTDIR . '/configuration.php' )) {
			array( '10' => array( 'Help' => (true ? 'Write access required for installation' : 'File could not be found. For new installs, please rename /configuration.php.new to /configuration.php') ) );
			array( 'Requirement' => 'Attachments Directory', 'Path' => '/attachments/', 'PassingStatus' => is_writable( ROOTDIR . '/attachments/' ) );

			if (is_dir( ROOTDIR . '/attachments/' )) {
				array( '20' => array( 'Help' => (true ? 'The attachments directory is not writeable.' : 'Could not find attachments directory. Please create it and try again.') ) );
				array( 'Requirement' => 'Downloads Directory', 'Path' => '/downloads/', 'PassingStatus' => is_writable( ROOTDIR . '/downloads/' ) );

				if (is_dir( ROOTDIR . '/downloads/' )) {
					array( '30' => array( 'Help' => (true ? 'The downloads directory is not writeable.' : 'Could not find downloads directory. Please create it and try again.') ) );
					array( 'Requirement' => 'Templates Compile Directory', 'Path' => '/templates_c/', 'PassingStatus' => is_writable( ROOTDIR . '/templates_c/' ) );

					if (is_dir( ROOTDIR . '/templates_c/' )) {
						$fileWritePermissions = array( '40' => array( 'Help' => (true ? 'The templates_c directory is not writeable.' : 'Could not find templates_c directory. Please create it and try again.') ) );
						echo '<!DOCTYPE html>
<html>
    <head>
        <title>WHMCS Install/Upgrade Process</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="install.css" rel="stylesheet">
        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>

        <script>
            function hideLoading() {
                jQuery("#submitButton").removeAttr("disabled");
                jQuery(".loading").fadeOut();
            }
            function showLoading() {
                jQuery("#submitButton").attr("disabled","disabled");
                jQuery(".loading").fadeIn();
            }
            function setUpgradeInProgress() {
                jQuery("#btnConfirmBackup").attr("disabled", "disabled");
                jQuery("#btnCloseUpgradeBackupModal").attr("disabled", "disabled");
                jQuery("#btnConfirmBackup").html(\'<i class="fa fa-spinner fa-spin"></i> Upgrade In Progress... Please be patient...\');
                jQuery("#upgradeDurationMsg").hide().removeClass(\'hidden\').slideDown();
            }
        </script>

    </head>

    <body onunload="">
        <div class="wrapper">
            <div class="version">V';
						echo $whmcsInstaller->getLatestMajorMinorVersion(  );
						echo '</div>
            <div style="margin:30px;">
                <a href="http://www.whmcs.com/" target="_blank"><img src="http://www.whmcs.com/images/logo.png" alt="WHMCS - The Complete Client Management, Billing & Support Solution" border="0" /></a>
            </div>
            ';

						if ($step == '4') {
							if (!$licenseKey) {
								$validationError = 'A License Key is required. If you don\'t yet have one, please visit <a href="http://www.whmcs.com/order">www.whmcs.com</a> to purchase one.';
							}
						}
					}
				}
			}
		}
	}

	jmp;
	Exception {
		$validationError = 'Could not connect to database server: ' . $e->getMessage(  );

		if ($validationError) {
			$step = '3';

			if ($step == '5') {
				if (!$firstName) {
					$validationError = 'First name is required';
					break;
				}
			}
		}

		(  . ( $tempPassword ) . '\', \'' . mysql_real_escape_string( $_REQUEST['firstName'] ) . '\', \'' . mysql_real_escape_string( $_REQUEST['lastName'] ) . '\', \'' . mysql_real_escape_string( $_REQUEST['email'] ) . '\', \'3\', \'\', \'Welcome to WHMCS!  Please ensure you have setup the cron job to automate tasks\', \',\')' );
		echo '<h1>New Installation</h1>';
		Log::info( 'Applying incremental updates to base install schema' );
		$errorMsg = '';
		$whmcsInstaller->runUpgrades(  );
		new bdjciiijih(  );
		$hasher = ;
		$hasher->hash( $password );
		$passwordHash = ;
		$hasher->hash;
		md5;
	}
}

( ( $password ) );
$apiPasswordHash = ;
mysql_query( sprintf( 'UPDATE `tbladmins` set `password`=\'%s\', `passwordhash`=\'%s\' where `username`=\'%s\'', $apiPasswordHash, $passwordHash, $_REQUEST['username'] ) );
$result = ;
mysql_query( 'UPDATE `tblconfiguration` SET `value`=\'six\' WHERE `setting`=\'Template\'' );
$result2 = ;
mysql_query( 'UPDATE `tblconfiguration` SET `value`=\'standard_cart\' WHERE `setting`=\'OrderFormTemplate\'' );
$result3 = ;
$table = 'tblannouncements';
$published = '1';
$title = 'Thank you for choosing WHMCS!';
$announcement = '<p>Welcome to <a title="WHMCS" href="http://whmcs.com" target="_blank">WHMCS</a>! You have made a great choice and we want to help you get up and running as quickly as possible.</p>
<p>This is a sample announcement. Announcements are a great way to keep your customers informed about news and special offers. You can edit or delete this announcement by logging into the admin area and navigating to <em>Support &gt; Announcements</em>.</p>
<p>If at any point you get stuck, our support team is available 24x7 to assist you. Simply visit <a title="www.whmcs.com/support" href="http://www.whmcs.com/support" target="_blank">www.whmcs.com/support</a> to request assistance.</p>';
$sql = 'INSERT INTO `%s`
                        (date, title, announcement, published)
                        VALUES(NOW(), \'%s\', \'%s\', \'%s\')';
mysql_query( sprintf( $sql, $table, $title, $announcement, $published ) );
$announcementResult = ;
$table = 'tbltransientdata';
$name = 'cronComplete';
$data = '1';
strtotime( '+1 day', time(  ) );
$expires = ;
$sql = 'INSERT INTO `%s`
                        (name, data, expires)
                        VALUES(\'%s\', \'%s\', \'%s\')';
mysql_query( sprintf( $sql, $table, $name, $data, $expires ) );
$cronResult = ;
jmp;
Exception {
	$e->getMessage(  );
	$errorMsg = ;

	if ($errorMsg) {
		Log::error( 'Installation process terminated due to error.' );
		echo '
                    <div class="alert alert-danger text-center" role="alert">
                        <strong>
                            <i class="fa fa-warning"></i>
                            Installation Failed
                        </strong>
                    </div>

                    <p>A problem was encountered during the installation process.</p>

                    <p>The error message returned by the installer was as follows:</p>

                    <div class="well">
                        ';
		echo $errorMsg;
		echo '                    </div>

                    <h2>How do I get help?</h2>

                    <p>We want to make sure you can start using our product as soon as possible.</p>
                    <p>Please <a href="http://www.whmcs.com/support/" target="_blank">open a ticket with our support team</a> including a copy of your installation log file from <em>/install/log/</em>. This will help them diagnose what caused the failure, and what needs to be done before attempting the installation process again.</p>

                    ';
	}

	(  );
	echo '
                        <div class="alert alert-danger text-center" role="alert">
                            <strong>
                                <i class="fa fa-warning"></i>
                                Upgrade Failed
                            </strong>
                        </div>

                        <p>A problem was encountered while attempting to apply the database schema updates.</p>

                        <p>The error message returned by the update process was as follows:</p>

                        <div class="well">
                            ';
	echo $errorMsg;
	echo '                        </div>

                        <h2>How do I get help?</h2>

                        <p>First, we recommend you restore the backup you took before you began the upgrade process to get your installation back online as quickly as possible.</p>
                        <p>Then <a href="http://www.whmcs.com/support/" target="_blank">open a ticket with our support team</a> including a copy of your upgrade log file from <em>/install/log/</em>. This will help them diagnose what caused the failure, and what needs to be done before attempting the upgrade process again.</p>

                        ';
	jmp;
	Log::info( 'Upgrade process completed.' );
	echo '
                        <div class="alert alert-success text-center" role="alert">
                            <strong>
                                <i class="fa fa-check-circle"></i>
                                Upgrade Completed Successfully!
                            </strong>
                        </div>

                        <p>You are now running WHMCS Version ';
	echo $whmcsInstaller->getLatestVersion(  )->getCasual(  );
	echo '.</p>
                        <p>We strongly recommend reading the <a href="http://docs.whmcs.com/Release_Notes" target="_blank">Release Notes</a> for this version in full to ensure you are aware of any changes requiring your attention.</p>
                        <p>You should now delete the <em>/install/</em> folder from your web server.</p>

                        <p align="center">
                            <a href="../';
	echo $whmcsInstaller->getAdminPath(  );
	echo '/" id="btnGoToAdminArea" class="btn btn-default">Go to the Admin Area Now &raquo;</a>
                        </p>

                        <br />

                        <h2>Thank you for choosing WHMCS!</h2>

                        ';
	echo '
            <br>
            <br>

            <div align="center"><small>Copyright &copy; WHMCS 2005-';
	echo date( 'Y' );
	echo '<br>
                <a href="http://www.whmcs.com/" target="_blank">www.whmcs.com</a></small>
            </div>
        </div>
    </body>
</html>
';
	return 1;
}
?>
