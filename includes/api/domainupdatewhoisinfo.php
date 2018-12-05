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

function uwd_xml2array($contents, $get_attributes = 1, $priority = 'tag') {
	xml_parser_create( '' );
	$parser = ;
	xml_parser_set_option( $parser, XML_OPTION_TARGET_ENCODING, 'UTF-8' );

	while (true) {
		xml_parser_set_option( $parser, XML_OPTION_CASE_FOLDING, 0 );
		xml_parser_set_option( $parser, XML_OPTION_SKIP_WHITE, 1 );
		xml_parse_into_struct( $parser, trim( $contents ), $xml_values );
		xml_parser_free( $parser );

		if (!$xml_values) {
			return null;
			$xml_array = array(  );
			$parents = array(  );
			$opened_tags = array(  );
			$arr = array(  );
			$current = &$xml_array;

			$repeated_tag_index = array(  );
			foreach ($xml_values as ) {
				$data = ;
				unset( $$attributes );
				unset( $$value );
				extract( $data );
				$result = array(  );
				$attributes_data = array(  );

				if (empty( $$value )) {
					if ($priority == 'tag') {
						$result = $last_item_index;
						break;
					}
				}
			}
		}


		if () {
			$parent[$level - 1] = &$current;

			if (( !is_array( $current ) || !in_array( $tag, array_keys( $current ) ) )) {
				$current[$tag] = $result;

				if ($attributes_data) {
					$current[$tag . '_attr'] = $attributes_data;
					$repeated_tag_index[$tag . '_' . $level] = 1;
					$current = &$current[$tag];
				}
			}
		}
		else {
			while (true) {
				[] = $attributes_data;
				++$repeated_tag_index[$tag . '_' . $level];
			}

			$current[$tag] = array( $current[$tag], $result );
			$repeated_tag_index[$tag . '_' . $level] = 1;

			if (( $priority == 'tag' && $get_attributes )) {
				if (isset( $current[$tag . '_attr'] )) {
				}

				$current[$tag]['0_attr'] = $current[$tag . '_attr'];
				unset( $current[$tag . '_attr'] );

				if ($attributes_data) {
					$repeated_tag_index[$tag . '_' . $level] . '_attr';
				}
			}
		}

		$current[$tag][] = $attributes_data;
		++$repeated_tag_index[$tag . '_' . $level];
	}


	if ($type == 'close') {
		while (true) {
			$current = &$parent[$level - 1];
		}

		return $xml_array;
	}
}


while (true) {
	while (true) {
		if (!defined( 'WHMCS' )) {
			exit( 'This file cannot be accessed directly' );

			if (!function_exists( 'RegSaveContactDetails' )) {
				require( ROOTDIR . '/includes/registrarfunctions.php' );

				if (!function_exists( 'convertStateToCode' )) {
					require( ROOTDIR . '/includes/clientfunctions.php' );
					select_query( 'tbldomains', 'id,domain,registrar,registrationperiod', array( 'id' => $domainid ) );
					$result = ;
					mysql_fetch_array( $result );
					$data = ;
					$data[0];
					$domainid = ;

					if (!$domainid) {
						$apiresults = array( 'result' => 'error', 'message' => 'Domain ID Not Found' );
						return false;

						if (!$xml) {
							$apiresults = array( 'result' => 'error', 'message' => 'XML Required' );
							return false;
							dfdidhdbdc::decode( $xml );
							$xml = ;
							uwd_xml2array( $xml );
							$xmlarray = ;
						}
					}

					foreach ($xmlarray as ) {
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

										if (is_array( $value3 )) {
											foreach ($value3 as ) {
												$value4 = ;
												$type4 = ;
												str_replace( '_', ' ', $type );
												str_replace;
												'_';
												' ';
												$type2;
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}


		while (true) {
			while (true) {
				while (true) {
					while (true) {
						while (true) {
							$contact[][(  )][str_replace( '_', ' ', $type3 )][str_replace( '_', ' ', $type4 )] = $value4;
						}
					}

					$contact[str_replace( '_', ' ', $type )][str_replace( '_', ' ', $type2 )][str_replace( '_', ' ', $type3 )] = $value3;
				}
			}

			$contact[str_replace( '_', ' ', $type )][str_replace( '_', ' ', $type2 )] = $value2;
		}
	}

	$contact[str_replace( '_', ' ', $type )] = $value;
}

$data['id'];
$id = ;
$data['domain'];
$domain = ;
$data['registrar'];
$registrar = ;
$data['registrationperiod'];
$regperiod = ;
explode( '.', $domain, 2 );
$domainparts = ;
$params = array(  );
$params['domainid'] = $id;
$params['sld'] = $domainparts[0];
$params['tld'] = $domainparts[1];
$params['regperiod'] = $regperiod;
$params['registrar'] = $registrar;
array_merge( $params, $contact );
$params = ;
RegSaveContactDetails( $params );
$values = ;

if ($values['error']) {
	$apiresults = array( 'result' => 'error', 'message' => 'Registrar Error Message', 'error' => $values['error'] );
}

return false;
?>
