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

define( 'ADMINAREA', true );
require( '../init.php' );
new dgeegejige( 'View Clients Products/Services' );
$aInt = ;

if (( $userid && $hostingid )) {
	redir(  . 'userid=' . $userid . '&id=' . $hostingid, 'clientsservices.php' );

	if (( $userid && $id )) {
	}
}

redir(  . 'userid=' . $userid . '&id=' . $id, 'clientsservices.php' );

if ($id) {
	redir(  . 'id=' . $id, 'clientsservices.php' );

	if ($userid) {
		redir(  . 'userid=' . $userid, 'clientsservices.php' );
	}
}

redir( '', 'clientsservices.php' );
?>
