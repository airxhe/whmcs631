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
	get_query_val( 'tbladmins', 'username', array( 'id' => $_SESSION['adminid'] ) );
	$currusername = ;
	full_query( 'SELECT DISTINCT adminusername FROM tbladminlog WHERE lastvisit>=\'' . date( 'Y-m-d H:i:s', mktime( date( 'H' ), date( 'i' ) - 15, date( 's' ), date( 'm' ), date( 'd' ), date( 'Y' ) ) ) . '\' AND adminusername!=\'' . db_escape_string( $currusername ) . '\' AND logouttime=\'0000-00-00\' ORDER BY lastvisit ASC' );
	$result = ;
	$apiresults = array( 'result' => 'success', 'totalresults' => mysql_num_rows( $result ) + 1 );

	while (true) {
		$apiresults['staffonline']['staff'][] = array( 'adminusername' => $currusername, 'logintime' => date( 'Y-m-d H:i:s' ), 'ipaddress' => $remote_ip, 'lastvisit' => date( 'Y-m-d H:i:s' ) );
		mysql_fetch_assoc( $result );

		if ($data = ) {
			$data['adminusername'];
			$username = ;
			select_query( 'tbladminlog', 'adminusername,logintime,ipaddress,lastvisit', 'lastvisit>=\'' . date( 'Y-m-d H:i:s', mktime( date( 'H' ), date( 'i' ) - 15, date( 's' ), date( 'm' ), date( 'd' ), date( 'Y' ) ) ) . '\' AND adminusername=\'' . db_escape_string( $username ) . '\'', 'lastvisit', 'ASC', '0,1' );
			$result2 = ;
			mysql_fetch_assoc( $result2 );
		}

		$apiresults['staffonline']['staff'][] = ;
	}
}

$responsetype = 'xml';
?>
