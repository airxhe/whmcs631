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

define( 'CLIENTAREA', true );
require( 'init.php' );
eaaadiagec::get( 'uid' );
$userId = ;
eaaadiagec::get( 'adminid' );
$isAdmin = ;

if (!$userId) {
	if (( $isAdmin && $whmcs->get_req_var( 'returntoadmin' ) )) {
		$whmcs->redirect( App::get_admin_folder_name(  ), array(  ) );
		redir( '', 'index.php' );
		run_hook( 'ClientLogout', array( 'userid' => $userId ) );
		eaaadiagec::delete( 'uid' );
		eaaadiagec::delete( 'cid' );
		eaaadiagec::delete( 'upw' );
		dfabehjiaj::delete( 'User' );
		( 'returntoadmin' );
	}
}
?>
