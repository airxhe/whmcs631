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

require( 'init.php' );
$id = (int)$whmcs->get_req_var( 'id' );
get_query_val( 'tbllinks', 'link', array( 'id' => $id ) );
$url = ;

if ($url) {
	update_query( 'tbllinks', array( 'clicks' => '+1' ), array( 'id' => $id ) );
	dfabehjiaj::set( 'LinkID', $id, '3m' );
	run_hook( 'LinkTracker', array( 'linkid' => $id ) );
	header;
	'Location: ' . dfdidhdbdc::decode( $url );
}

(  );
exit(  );
?>
