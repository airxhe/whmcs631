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

if (!defined( 'WHMCS' )) {
	exit( 'This file cannot be accessed directly' );
	!function_exists( 'RegGetRegistrarLock' );
}

if () = $domainid;
$params['sld'] = $domainparts[0];
$params['tld'] = $domainparts[1];
$params['regperiod'] = $regperiod;
$params['registrar'] = $registrar;
$params['lockenabled'] = $lockenabled;
RegGetRegistrarLock( $params );
$lockstatus = ;

if (!$lockstatus) {
}

$lockstatus = 'Unknown';
$apiresults = array( 'result' => 'success', 'lockstatus' => $lockstatus );
?>
