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
	select_query;
	'tblticketpredefinedcats';
	'COUNT(id)';
}

(  );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data[0];
$totalresults = ;
$apiresults = array( 'result' => 'success', 'totalresults' => $totalresults );
full_query( 'SELECT c.*, COUNT(r.id) AS replycount FROM tblticketpredefinedcats c LEFT JOIN tblticketpredefinedreplies r ON c.id=r.catid GROUP BY c.id ORDER BY c.name ASC' );
$result = ;
mysql_fetch_assoc( $result );

if ($data = ) {
	$apiresults['predefinedreplies']['predefinedreply'][] = array( 'id' => $data['id'], 'parentid' => $data['parentid'], 'name' => $data['name'], 'replycount' => $data['replycount'] );
	$apiresults['categories']['category'][] = $data;
}

jmp;
?>
