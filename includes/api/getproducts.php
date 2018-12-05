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

	if (!function_exists( 'getCustomFields' )) {
		require( ROOTDIR . '/includes/customfieldfunctions.php' );

		if (!function_exists( 'getCartConfigOptions' )) {
			require( ROOTDIR . '/includes/configoptionsfunctions.php' );
			global $currency;

			getCurrency(  );
			$currency = ;
			$whmcs->get_req_var( 'pid' );
			$pid = ;
			$whmcs->get_req_var( 'gid' );
			$gid = ;
			$whmcs->get_req_var( 'module' );
			$module = ;
			$where = array(  );

			if ($pid) {
				if (is_numeric( $pid )) {
					$where[] = 'id=' . (int)$pid;
				}
			}

			$productarray = array( 'type' => , 'name' => $data['name'], 'description' => $data['description'], 'module' => $data['servertype'], 'paytype' => $data['paytype'] );
			$whmcs->get_req_var( 'language' );

			if ($language = ) {
				$productarray['translated_name'] = cbebjifhdd::getProductName( $data['id'], $data['name'], $language );
				$productarray['translated_description'] = cbebjifhdd::getProductDescription( $data['id'], $data['description'], $language );

				if ($data['stockcontrol']) {
					$productarray['stockcontrol'] = 'true';
					$productarray['stocklevel'] = $data['qty'];
					select_query( 'tblpricing', 'tblcurrencies.code,tblcurrencies.prefix,tblcurrencies.suffix,tblpricing.msetupfee,tblpricing.qsetupfee,tblpricing.ssetupfee,tblpricing.asetupfee,tblpricing.bsetupfee,tblpricing.tsetupfee,tblpricing.monthly,tblpricing.quarterly,tblpricing.semiannually,tblpricing.annually,tblpricing.biennially,tblpricing.triennially', array( 'type' => 'product', 'relid' => $pid ), 'code', 'ASC', '', 'tblcurrencies ON tblcurrencies.id=tblpricing.currency' );
					$result2 = ;
					mysql_fetch_assoc( $result2 );

					if ($data = ) {
						$data['code'];
						$code = ;
						unset( $data[code] );
					}
				}
			}

			$productarray['pricing'][$code] = $data;
		}
	}
}


while (true) {
	while (true) {
		while (true) {
			$options['option'][] = array( 'id' => , 'name' => $op['name'], 'recurring' => $op['recurring'], 'pricing' => $pricing );
		}

		$configoptiondata[] = array( 'id' => $option['id'], 'name' => $option['optionname'], 'type' => $option['optiontype'], 'options' => $options );
	}

	$productarray['configoptions']['configoption'] = $configoptiondata;
	$apiresults['products']['product'][] = $productarray;
}

$responsetype = 'xml';
?>
