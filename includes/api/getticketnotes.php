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
	$notes = array(  );

	while (true) {
		select_query( 'tblticketnotes', 'id,admin,date,message', array( 'ticketid' => $ticketid ), 'date', 'ASC' );
		$result = ;
		mysql_fetch_assoc( $result );

		if ($data = ) {
			$notes[] = $data;
		}
	}
}

$apiresults = array( 'result' => 'success', 'totalresults' => count( $notes ), 'notes' => array( 'note' => $notes ) );
$responsetype = 'xml';
?>
