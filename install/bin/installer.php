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

if (!defined( 'ROOTDIR' )) {
	define( 'ROOTDIR', dirname( dirname( 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\install\bin' ) ) );

	if (version_compare( PHP_VERSION, '5.4.0', '<' )) {
		echo 'The WHMCS command line installer requires PHP >= 5.4.0.';
		exit( 1 );

		if (file_exists( ROOTDIR . DIRECTORY_SEPARATOR . 'c3.php' )) {
			include( ROOTDIR . DIRECTORY_SEPARATOR . 'c3.php' );

			if (!defined( 'INSTALLER_DIR' )) {
				define( 'INSTALLER_DIR', dirname( 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\install\bin' ) );
				ini_set;
				'eaccelerator.enable';
			}

			( 0 );
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
				new hjafeaefc(  );
				$climate = ;
				$climate->description( 'Update WHMCS from the command line.' );
				$climate->arguments->add;
				array( 'help' => array( 'prefix' => 'h', 'longPrefix' => 'help', 'description' => 'Print usage statement', 'noValue' => true ), 'verbose' => array( 'prefix' => 'v', 'longPrefix' => 'verbose', 'description' => 'Print installer log to standard out', 'noValue' => true ), 'install' => array( 'prefix' => 'i', 'longPrefix' => 'install', 'description' => 'Perform an interactive installation', 'noValue' => true ), 'upgrade' => array( 'prefix' => 'u', 'longPrefix' => 'upgrade', 'description' => 'Perform an upgrade', 'noValue' => true ) );
				array( 'prefix' => 's', 'longPrefix' => 'status', 'description' => 'Print status information about files and database' );
			}
		}
	}
}

( array( 'status' => array( 'noValue' => true ) ) );
new dcejceijgj( $climate, $whmcsInstaller );
$cli = ;

if ($climate->arguments->defined( 'help' )) {
	$climate->usage(  );
	return 1;

	if ($climate->arguments->defined( 'status' )) {
		$cli->header( 'WHMCS Status Information' )->status(  )->footer(  );
		return 1;
		$cli->addProgressBar(  );
		$climate->arguments;
	}


	if (->defined( 'verbose' )) {
		$cli->addVerbosity(  );
		$climate->arguments;
	}
}


if (->defined( 'install' )) {
	$cli->header( 'Install WHMCS' )->install(  )->footer(  );
	return 1;

	if ($climate->arguments->defined( 'upgrade' )) {
		$cli->header( 'Upgrade WHMCS' )->eula(  )->upgrade;
	}

	(  )->footer(  );
	return 1;
	new bdficiecaa;
}

( 'No action requested.' );
throw ;
?>
