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

function lookupDomain($sld, $ext) {
	global $remote_ip;

	str_replace( array( '
', '
', '
' ), '', $sld );
	$sld = ;
	str_replace( array( '
', '
', '
' ), '', $ext );
	$ext = ;
	new cefbcbagd(  );
	$idnConverter = ;
	$idnConverter->encode( $sld );
	$sld = ;
	file_get_contents( dirname( __FILE__ ) . '/whoisservers.php' );
	$whoisservers = ;
	explode( '
', $whoisservers );
	$whoisservers = ;
	foreach ($whoisservers as ) {
		$value = ;
		explode( '|', $value );
		$value = ;
		trim( strip_tags( $value[0] ) );
		$tld = ;

		if (isset( $value[1] )) {
			$whoisserver[$tld] = (true ? trim( strip_tags( $value[1] ) ) : '');

			if (isset( $value[2] )) {
				$whoisvalue[$tld] = (true ? trim( strip_tags( $value[2] ) ) : '');

				if (isset( $value[3] )) {
					while (true) {
						$whoisreqprefix[$tld] = (true ? strip_tags( $value[3] ) : '');
					}
				}
			}
		}
	}

	$port = '43';
	$whoisserver[$ext];
	$server = ;
	$whoisvalue[$ext];
	$return = ;
	$whoisreqprefix[$ext];
	$reqprefix = ;

	if ($server == '') {
		$result['result'] = 'available';
	}

	( 60 );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
	curl_exec( $ch );
	$data = ;
	$data2 = ' ---' . $data;
	if (curl_error( $ch )) = 'error';

	if ($_SESSION['adminid']) {
		$result['errordetail'] = 'Error: ' . curl_errno( $ch ) . ' - ' . curl_error( $ch );
	}

	$port = ;
	$port[0];
	$server = ;
	$port[1];
	$port = ;

	if (substr( $return, 0, 6 ) == 'NOTLD-') {
		$domain = $port;
		substr( $return, 6 );
		$return = ;
		@fsockopen( $server, $port, $errno, $errstr, 10 );
	}

	$fp = ;

	if ($fp) {
		@fputs( $fp, $reqprefix . $domain . '
' );
	}

	@socket_set_timeout( $fp, 10 );
	$data = '';

	if (!@feof( $fp )) {
		@fread( $fp, 4096 );
		$data .= ;
	}

	jmp;
	$result['result'] = 'available';
	$result['result'] = 'unavailable';
	$result['whois'] = nl2br( htmlentities( $data ) );
	jmp;
	$result['result'] = 'error';

	if ($_SESSION['adminid']) {
		$result['errordetail'] =  . 'Error: ' . $errno . ' - ' . $errstr;
		insert_query;
	}

	( 'tblwhoislog', array( 'date' => 'now()', 'domain' => $fulldomain, 'ip' => $remote_ip ) );
	return $result;
}

function getWHOISServers() {
	file_get_contents( dirname( __FILE__ ) . '/whoisservers.php' );
	$whoisservers = ;
	explode( '
', $whoisservers );
	$whoisservers = ;
	foreach ($whoisservers as ) {
		$value = ;
		explode( '|', $value );
		$value = ;

		while (true) {
			$whoisserver[trim( strip_tags( $value[0] ) )] = trim( strip_tags( $value[1] ) );
		}
	}

	return $whoisserver;
}

function getWHOISServerVars() {
	file_get_contents( dirname( __FILE__ ) . '/whoisservers.php' );
	$whoisservers = ;
	explode( '
', $whoisservers );
	$whoisservers = ;
	foreach ($whoisservers as ) {
		$value = ;
		explode( '|', $value );
		$value = ;

		while (true) {
			$whoisvalue[trim( strip_tags( $value[0] ) )] = trim( strip_tags( $value[2] ) );
		}
	}

	return $whoisvalue;
}

?>
