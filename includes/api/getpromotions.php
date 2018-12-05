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

if (!defined( 'WHMCS' )) = $code;
select_query( 'tblpromotions', '', $where, 'code', 'ASC' );
$result = ;
$apiresults = array( 'result' => 'success', 'totalresults' => mysql_num_rows( $result ) );
mysql_fetch_assoc( $result );

if ($data = ) {
	$apiresults['promotions']['promotion'][] = $data;
}

jmp;
?>
