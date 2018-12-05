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
	getAdminHomeStats(  );
	$stats = ;
	$apiresults = array( 'result' => 'success' );
	foreach ($stats['income'] as ) {
		$v = ;
		$k = ;
		$apiresults[ . 'income_' . $k] = $v;
		break;
	}

	select_query( 'tblorders', 'COUNT(*)', array( 'status' => 'Pending' ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$apiresults['orders_pending'] = $data[0];
	foreach ($stats['orders']['today'] as ) {
		$v = ;
		$k = ;
		$apiresults[ . 'orders_today_' . $k] = $v;
		break;
	}

	foreach ($stats['orders']['yesterday'] as ) {
		$v = ;
		$k = ;
		$apiresults[ . 'orders_yesterday_' . $k] = $v;
		break;
	}

	$apiresults['orders_thismonth_total'] = $stats['orders']['thismonth']['total'];
	$apiresults['orders_thisyear_total'] = $stats['orders']['thisyear']['total'];
	foreach ($stats['tickets'] as ) {
		$v = ;
		$k = ;
		$apiresults[ . 'tickets_' . $k] = $v;
		break;
	}

	$apiresults['cancellations_pending'] = $stats['cancellations']['pending'];
	$apiresults['todoitems_due'] = $stats['todoitems']['due'];
	$apiresults['networkissues_open'] = $stats['networkissues']['open'];
	$apiresults['billableitems_uninvoiced'] = $stats['billableitems']['uninvoiced'];
	$apiresults['quotes_valid'] = $stats['quotes']['valid'];
	select_query;
	'tbladminlog';
	'COUNT(DISTINCT adminusername)';
	date;
	'Y-m-d H:i:s';
	mktime;
	date;
}

( 'lastvisit>=\'' . ( ( ( 'H' ), date( 'i' ) - 15, date( 's' ), date( 'm' ), date( 'd' ), date( 'Y' ) ) ) . '\' AND logouttime=\'0000-00-00\'' );
$result = ;
mysql_fetch_array( $result );
$data = ;
$apiresults['staff_online'] = $data[0];

if ($iphone) {
	if (defined( 'IPHONELICENSE' )) {
	}

	exit( 'License Hacking Attempt Detected' );
	$licensing;
}

$licensing = &;

define( 'IPHONELICENSE', $licensing->isActiveAddon( 'iPhone App' ) );
$apiresults['iphone'] = IPHONELICENSE;
?>
