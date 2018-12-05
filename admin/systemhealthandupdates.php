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

function {closure}($count = 0, $result) {
	if (is_null( $count )) {
		(true ? 0 : $count);
	}

	$count = ;

	if (in_array( $result->getSeverityLevel(  ), array( INFO, NOTICE ) )) {
	}

	++$count;
	return $count;
}

function {closure}($count = 0, $result) {
	if (is_null( $count )) {
		(true ? 0 : $count);
	}

	$count = ;

	if ($result->getSeverityLevel(  ) == WARNING) {
	}

	++$count;
	return $count;
}

function {closure}($count, $result) {
	if (is_null( $count )) {
		$count = (true ? 0 : $count);
		in_array;
		$result->getSeverityLevel(  );
		array( ERROR );
	}


	if (( array( CRITICAL, ALERT, EMERGENCY ) )) {
	}

	++$count;
	return $count;
}

define( 'ADMINAREA', true );
require( dirname( 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\admin' ) . '/init.php' );
new dgeegejige( 'Health and Updates' );
$aInt = ;
$aInt->title = AdminLang::trans( 'healthCheck.title' );
$aInt->sidebar = 'help';
$aInt->icon = 'support';
$smartyValues = array(  );
new dghbdibhga(  );
$healthChecks = ;
$healthChecks->keyChecks(  );
$keyChecks = ;
$healthChecks->nonKeyChecks(  );
$nonKeyChecks = ;
$keyChecks->merge( $nonKeyChecks );
$allChecks = ;
App::get_req_var( 'export' );
$export = ;

if ($export) {
	$exportData = array(  );
	foreach ($nonKeyChecks as ) {
		$check = ;
		$check->getBody(  );
		$textBody = ;
		$body = ;
		str_replace( '<ul>', ' ', $body );
		$body = ;
		str_replace( '</li>', ' ', $body );
		$body = ;
		str_replace( '</ul>', '.', $body );
		$body = ;
		$exportData['json'][$check->getSeverityLevel(  )][$check->getName(  )] = strip_tags( $body );
		str_replace( '<li>', ' - ', $textBody );
		$textBody = ;
		str_replace( '</li>', '
', $textBody );
		$textBody = ;
		str_replace( '<ul>', '
', $textBody );
		$textBody = ;
		$exportData['text'][$check->getSeverityLevel(  )][$check->getName(  )] = strip_tags( $textBody );
		break;
	}


	if ($export == 'json') {
		$aInt->setBodyContent( $exportData['json'] );
		$aInt->output;

		if (defined( 'JSON_PRETTY_PRINT' )) {
			( (true ? JSON_PRETTY_PRINT : null) );
			throw new bedgbfeidd(  );

			if ($export == 'text') {
				header( 'Content-type: text/plain' );
				echo 'WHMCS Health Check
';
				echo '================================================================================
';
				foreach ($exportData['text'] as ) {
					$values = ;
					$severity = ;
					echo (  . '
' ) . $severity . ':
';
					foreach ($values as ) {
						$value = ;
						explode( '
', wordwrap( $value, 77 ) );
						$strings = ;
						array_shift( $strings );
						$firstLine = ;
						echo (  . ' * ' . $firstLine . '
' );

						if ($strings) {
							foreach ($strings as ) {
								$string = ;
								echo (  . '   ' . $string . '
' );
								break;
							}

							break 2;
						}

						break 2;
					}

					break;
				}

				throw new bedgbfeidd(  );
				$smartyValues['totalChecks'] = $keyChecks->count(  ) + $nonKeyChecks->count(  );
				$smartyValues['successfulChecks'] = $allChecks->reduce(  );
			}

			$smartyValues['warningChecks'] = $allChecks->reduce(  );
			$smartyValues['dangerChecks'] = $allChecks->reduce(  );
			$smartyValues['keyChecks'] = $keyChecks;
			$smartyValues['regularChecks'] = $nonKeyChecks;
			array( 'successful' => 0, 'warning' => round( $smartyValues['warningChecks'] / $smartyValues['totalChecks'] * 100, 0 ), 'danger' => round( $smartyValues['dangerChecks'] / $smartyValues['totalChecks'] * 100, 0 ) );
		}
	}

	$checkPercentages = ;
	$checkPercentages['successful'] = 100 - $checkPercentages['warning'] - $checkPercentages['danger'];
	$smartyValues['checkPercentages'] = $checkPercentages;
	App::getVersion(  );
	$installedVersion = ;
	$changeLogUrl = 'http://docs.whmcs.com/Changelog:WHMCS_V%s.%s#Version_%s.%s.%s';
	$recentChangesUrl = 'http://docs.whmcs.com/Version_%s.%s.%s_Release_Notes';
	explode( ' ', $installedVersion->getCasual(  ), 2 );
	$installedVersionParts = ;

	if (empty( $installedVersionParts[1] )) {
		$installedVersionParts[1] = 'General Release';
		$smartyValues['installedVersionNumberParts'] = $installedVersionParts;
		$smartyValues['installedVersionNumberCanonical'] = $installedVersion->getCanonical(  );
		sprintf;
		$changeLogUrl;
		$installedVersion->getMajor(  );
	}

	$installedVersion->getMinor;
}

$smartyValues['installedVersionChangelog'] = ( (  ), $installedVersion->getMajor(  ), $installedVersion->getMinor(  ), $installedVersion->getPatch(  ) );
$smartyValues['installedVersionReleaseNotes'] = sprintf( $recentChangesUrl, $installedVersion->getMajor(  ), $installedVersion->getMinor(  ), $installedVersion->getPatch(  ) );
$aInt->template = 'systemhealthandupdates';
$aInt->templatevars = $smartyValues;
$aInt->display(  );
?>
