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

while (true) {
	while (true) {
		while (true) {
			while (true) {
				if (!defined( 'WHMCS' )) {
					exit( 'This file cannot be accessed directly' );

					if (!function_exists( 'RegGetContactDetails' )) {
						require( ROOTDIR . '/includes/registrarfunctions.php' );
						select_query( 'tbldomains', 'id,domain,registrar,registrationperiod', array( 'id' => $domainid ) );
						$result = ;
						mysql_fetch_array( $result );
						$data = ;
						$data[0];
						$domainid = ;

						if (!$domainid) {
							$apiresults = array( 'result' => 'error', 'message' => 'Domain ID Not Found' );
							return false;
							$data['domain'];
							$domain = ;
							$data['registrar'];
							$registrar = ;
							$data['registrationperiod'];
							$regperiod = ;
							explode( '.', $domain, 2 );
							$domainparts = ;
							$params = array(  );
							$params['domainid'] = $domainid;
							$params['sld'] = $domainparts[0];
						}

						$params['tld'] = $domainparts[1];
						$params['regperiod'] = $regperiod;
						$params['registrar'] = $registrar;
						RegGetContactDetails( $params );
						$values = ;

						if ($values['error']) {
							$apiresults = array( 'result' => 'error', 'message' => 'Registrar Error Message', 'error' => $values['error'] );
							return false;
							foreach ($values as ) {
								$value = ;
								$type = ;

								if (is_array( $value )) {
									foreach ($value as ) {
										$value2 = ;
										$type2 = ;

										if (is_array( $value2 )) {
											foreach ($value2 as ) {
												$value3 = ;
												$type3 = ;
												str_replace;
												' ';
												'_';
											}
										}
									}
								}
							}
						}
					}
				}


				while (true) {
					$passback[( $type )][str_replace( ' ', '_', $type2 )][str_replace( ' ', '_', $type3 )] = $value3;
				}
			}

			$passback[str_replace( ' ', '_', $type )][str_replace( ' ', '_', $type2 )] = $value2;
		}
	}

	$passback[str_replace( ' ', '_', $type )] = $value;
}

$responsetype = 'xml';
array_merge( array( 'result' => 'success' ), $passback );
$apiresults = ;
?>
