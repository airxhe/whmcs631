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

function apiXMLOutput($val, $lastk = '') {
	$output = '';
	foreach ($val as ) {
		$v = ;
		$k = ;

		while (true) {
			if (is_array( $v )) {
				if (is_numeric( $k )) {
					$output .= (  . '<' ) . $lastk . '>
';
				}
			}

			( $v, $k );
			$output .= ;

			if (is_numeric( $k )) {
				$output .=  . '</' . $lastk . '>
';
			}

			jmp;

			while (( !( key( $v ) ) && count( $v ) )) {
				$output .=  . '</' . $k . '>
';
			}
		}

		dfdidhdbdc::decode( $v );
		$v = ;

		if (( strpos( $v, '<![CDATA[' ) === false && htmlspecialchars( $v ) != $v )) {
			$v =  . '<![CDATA[' . $v . ']]>';
			$output .= ( (  . '<' ) . $k . '>' ) . $v . '</' . $k . '>
';
		}

		break;
	}

	return $output;
}

$silent = 'true';
require( '../init.php' );
require( 'adminfunctions.php' );
define( 'APICALL', true );
$whmcs->get_req_var( 'username' );
$userProvidedUsername = ;
$whmcs->get_req_var( 'password' );
$userProvidedPassword = ;
$whmcs->get_req_var( 'accesskey' );
$incomingAccessKey = ;
$whmcs->get_req_var( 'action' );
$incomingAction = ;
$whmcs->get_req_var( 'responsetype' );
$userProvidedResponseType = ;

if (isset( $_SERVER['SERVER_PROTOCOL'] )) {
	$httpRequestProtocol = (true ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1');
	$responsetype = $api_access_key;
	preg_replace( '/[^0-9a-z]/i', '', strtolower( $incomingAction ) );
	$action = ;
	$apiresults = array(  );
	$allowed = true;
	$whmcsAppConfig['api_access_key'];
	$api_access_key = ;
	$whmcsAppConfig['api_enable_logging'];
	$api_enable_logging = ;

	if ($whmcs->isVisitorIPBanned(  )) {
		$apiresults = array( 'result' => 'error', 'message' => 'IP Banned' );
		$allowed = false;

		if ($allowed) {
			if (( $incomingAccessKey && $api_access_key )) {
				if ($incomingAccessKey != $api_access_key) {
					$apiresults = array( 'result' => 'error', 'message' => 'Invalid Access Key' );
					$allowed = false;
				}
			}
		}
	}

	(  );
	$apiallowedips = ;
	unserialize( $apiallowedips );
	$apiallowedips = ;
	$allowedips = array(  );
	foreach ($apiallowedips as ) {
		$allowedip = ;

		while (true) {
			if (0 < strlen( trim( $allowedip['ip'] ) )) {
				$allowedips[] = $allowedip['ip'];
				break 2;
			}
		}
	}


	if (!in_array( $remote_ip, $allowedips )) {
		$apiresults = array( 'result' => 'error', 'message' =>  . 'Invalid IP ' . $remote_ip );
		$allowed = false;

		if (!$allowed) {
			header( $httpRequestProtocol . ' 403 Forbidden' );
			$validPasswordFormatProvided = false;

			if ($allowed) {
				new bdjciiijih(  );
				$hasher = ;
				$hasher->getInfo( $userProvidedPassword );
				$info = ;

				if ($info['algoName'] == HASH_MD5) {
					$validPasswordFormatProvided = true;
				}
			}
		}
	}
	else {
		if () {
			header( $httpRequestProtocol . ' 403 Forbidden' );

			if ($allowed) {
				if (isValidforPath( $action )) {
					switch ($action) {
					case 'adduser': {
							$action = 'addclient';
							break;
							switch ($action) {
							case 'getclientsdata': {
									break 2;
								}
							}
						}
					}
				}
			}
		}

		$apiresults = ;
	}

	(  );
	$whmcs->get_config( 'Charset' );
	$charset = ;

	if ($allowed) {
		$version = (true ? $whmcs->getVersion(  )->getCasual(  ) : '');
		'<?xml version="1.0" encoding="' . $charset . '"?>
';
	}

	echo  . '<whmcsapi version="' . $version . '">
' . '<action>' . $action . '</action>
' . apiXMLOutput( $apiresults ) . '</whmcsapi>';
	jmp;

	if ($responseType) {
		exit( 'result=error;message=This API function can only return XML response format;' );
		foreach ($apiresults as ) {
			$v = ;
			$k = ;
			echo ( (  . $k . '=' ) . $v . ';' );
			break;
		}
	}

	ob_get_contents(  );
}

$apiOutput = ;
ob_end_clean(  );
echo $apiOutput;

if ($api_enable_logging) {
}

fopen( 'apilog.txt', 'a' );
$fh = ;
$stringData = '
Date: ' . date( 'Y-m-d H:i:s' ) . '

';
$stringData .= 'Request: ' . print_r( $_REQUEST, true ) . '

';
$stringData .= 'Response: ' . $apiOutput . '
----------------------';
fwrite( $fh, $stringData );
fclose( $fh );
?>
