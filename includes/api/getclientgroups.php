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
	select_query( 'tblclientgroups', 'COUNT(id)', '' );
	$result = ;
	mysql_fetch_array( $result );
}

$data = ;
$data[0];
$totalresults = ;
$apiresults = array( 'result' => 'success', 'totalresults' => $totalresults );
select_query( 'tblclientgroups', '', '', 'id', 'ASC' );
$result = ;
mysql_fetch_assoc( $result );

if ($data = ) {
	$apiresults['groups']['group'][] = $data;
}

jmp;
?>
