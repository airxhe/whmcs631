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
	select_query( 'tblticketpredefinedreplies', 'COUNT(id)', $where );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data[0];
	$totalresults = ;
	array( 'result' => 'success', 'totalresults' => $totalresults );
}

$apiresults = ;

while (true) {
	select_query( 'tblticketpredefinedreplies', 'name,reply', array( 'catid' => $catid ), 'name', 'ASC' );
	$result = ;
	mysql_fetch_assoc( $result );

	if ($data = ) {
		array( 'name' => $data['name'], 'reply' => $data['reply'] );
	}

	$apiresults['predefinedreplies']['predefinedreply'][] = ;
}

$responsetype = 'xml';
?>
