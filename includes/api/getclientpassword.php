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

	if ($_POST['userid']) {
		select_query;
		'tblclients';
		'';
		array( 'id' => $_POST['userid'] );
	}
}

(  );
$result = ;
jmp;
select_query( 'tblclients', '', array( 'email' => $_POST['email'] ) );
$result = ;
mysql_fetch_array( $result );
$data = ;

if ($data['id']) {
	$data['password'];
	$password = ;
	$apiresults = array( 'result' => 'success', 'password' => $password );
	return 1;
	array( 'result' => 'error' );
}

$apiresults = array( 'message' => 'Client ID Not Found' );
?>
