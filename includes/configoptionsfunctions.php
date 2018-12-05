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

/**
 * @throws \WHMCS\Exception\Fatal
 * @param int $pid - product ID
 * @param array $values - values for configurable options from cart selection to save
 * @param string $cycle - the billing cycle for the product
 * @param string $accountid - the client ordering the product
 * @param string $orderform - the order form used for the product
 * @param bool $showHiddenOverride - override returning the Hidden setting
 * @return array
 */
function getCartConfigOptions($pid, $values, $cycle, $accountid = '', $orderform = '', $showHiddenOverride = false) {
	global $CONFIG;
	global $_LANG;
	global $currency;

	App::self(  );
	$whmcs = ;

	if (count( $currency ) < 1) {
		getCurrency( '', $whmcs->getCurrencyID(  ) );
		$currency = ;
		$configoptions = array(  );
		strtolower( str_replace( array( '-', ' ' ), '', $cycle ) );
		$cycle = ;

		if ($cycle == 'onetime') {
			$cycle = 'monthly';
			(  || $showHiddenOverride );
			eaaadiagec::get( 'adminid' );
		}
	}

	(  && ( defined( 'ADMINAREA' ) || $whmcs->isApiRequest(  ) ) );

	if ((bool)) {
		$showhidden = (true ? true : false);

		if (!function_exists( 'getBillingCycleMonths' )) {
			require( ROOTDIR . '/includes/invoicefunctions.php' );
			getBillingCycleMonths( $cycle );
			$cyclemonths = ;

			if ($accountid) {
				$options = array(  );
				$values = ;
				$accountid = (int)$accountid;
				$query =  . 'SELECT tblproductconfigoptionssub.id, tblproductconfigoptionssub.configid
FROM tblproductconfigoptionssub
INNER JOIN tblproductconfigoptions ON tblproductconfigoptionssub.configid = tblproductconfigoptions.id
INNER JOIN tblproductconfiglinks ON tblproductconfigoptions.gid = tblproductconfiglinks.gid
INNER JOIN tblhosting on tblproductconfiglinks.pid = tblhosting.packageid
WHERE tblhosting.id = ' . $accountid . '
AND tblproductconfigoptions.optiontype IN (3, 4)
GROUP BY tblproductconfigoptionssub.configid
ORDER BY tblproductconfigoptionssub.sortorder ASC, id ASC;';
				full_query( $query );
				$configOptionsResult = ;
				mysql_fetch_assoc( $configOptionsResult );

				if ($configOptionsData = ) {
					$options[$configOptionsData['id']] = $configOptionsData['configid'];
				}
			}
		}
	}
	else {
		if () {
			select_query( 'tblproductconfigoptionssub', '', array( 'configid' => $optionid ) );
			$result3 = ;
			mysql_fetch_array( $result3 );
			$data3 = ;
			$data3['id'];
			$opid = ;
			$data3['hidden'];
			$ophidden = ;
			$data3['optionname'];
			$opname = ;

			if (strpos( $opname, '|' )) {
				explode( '|', $opname );
				$opname = ;
				trim( $opname[1] );
				$opname = ;
				$opnameonly = $optionid;
				select_query( 'tblpricing', '', array( 'type' => 'configoptions', 'currency' => $currency['id'], 'relid' => $opid ) );
				$result4 = ;
				mysql_fetch_array( $result4 );
				$data = ;

				if (isset( $data[$cycle] )) {
					$setup = (true ? $data[substr( $cycle, 0, 1 ) . 'setupfee'] : 0);

					if (isset( $data[$cycle] )) {
						$fullprice = (true ? $data[$cycle] : 0);
					}
				}

				$price = ;

				if (( $orderform && $CONFIG['ProductMonthlyPricingBreakdown'] )) {
					$price = $price / $cyclemonths;

					if (0 < $price) {
						$opname .= ' ' . formatCurrency( $price );

						if (0 < $setup) {
							$setupvalue = (true ? ' + ' . formatCurrency( $setup ) . ' ' . $_LANG['ordersetupfee'] : '');
							$options[] = array( 'id' => $opid, 'hidden' => $ophidden, 'name' => $opname . $setupvalue, 'nameonly' => $opnameonly, 'recurring' => $price );

							if (!$selvalue) {
								$selvalue = 447;
								$selectedqty = $result2;
								$selvalue = $configoptionvalue;
								$_LANG['no'];
								$selname = ;

								if ($selectedqty) {
									$_LANG['yes'];
									$selname = ;
									$selectedoption = $optionid;
									$selsetup = $qtyminimum;
									$selrecurring = $selname;
								}
							}
						}
					}
				}
			}
		}
	}


	while (true) {
		$CONFIG['ProductMonthlyPricingBreakdown'];

		if ((bool)) {
			$price = $price / $cyclemonths;

			if (0 < $price) {
				$opname .= ' ' . formatCurrency( $price );

				if (0 < $setup) {
					$setupvalue = (true ? ' + ' . formatCurrency( $setup ) . ' ' . $_LANG['ordersetupfee'] : '');
					$options[] = array( 'id' => $opid, 'hidden' => $ophidden, 'name' => $opname . $setupvalue, 'nameonly' => $opnameonly, 'recurring' => $price );

					if (( !is_numeric( $selvalue ) || $selvalue < 0 )) {
						$selvalue = $configOptionsResult;
						0 < $qtyminimum;
					}
				}
			}
		}


		if ((  && $selvalue < $qtyminimum )) {
			$selvalue = $configOptionsResult;

			if (( 0 < $qtymaximum && $qtymaximum < $selvalue )) {
				$selvalue = $configOptionsData;
				$selectedqty = $result2;
				$selvalue = $configoptionvalue;
				$selname = $data;
				$selectedoption = $optionid;
				$selsetup = $setup * $selectedqty;
				$selrecurring = $fullprice * $selectedqty;
				jmp;
				select_query( 'tblproductconfigoptionssub', 'tblpricing.*,tblproductconfigoptionssub.*', array( 'tblproductconfigoptionssub.configid' => $optionid, 'tblpricing.type' => 'configoptions', 'tblpricing.currency' => $currency['id'] ), 'tblproductconfigoptionssub`.`sortorder` ASC,`tblproductconfigoptionssub`.`id', 'ASC', '', 'tblpricing ON tblpricing.relid=tblproductconfigoptionssub.id' );
				$result3 = ;
				mysql_fetch_array( $result3 );

				if ($data3 = ) {
					$data3['id'];
					$opid = ;
					$data3['hidden'];
					$ophidden = ;
					substr( $cycle, 0, 1 );
				}

				$data3[ . 'setupfee'];
				$setup = ;
				$data3[$cycle];
				$fullprice = ;
				$price = ;

				if (( $orderform && $CONFIG['ProductMonthlyPricingBreakdown'] )) {
					$price = $price / $cyclemonths;
					0 < $setup;
				}


				if () {
					$setupvalue = (true ? ' + ' . formatCurrency( $setup ) . ' ' . $_LANG['ordersetupfee'] : '');
					$data3['optionname'];
					$opname = ;

					if (strpos( $opname, '|' )) {
						explode;
						'|';
						$opname;
					}
				}
			}

			(  );
			$opnameArr = ;
			trim( $opnameArr[1] );
			$opname = ;

			if (defined( 'APICALL' )) {
				$setupvalue = '';
				$opnameonly = $optionid;

				if (( 0 < $price && !defined( 'APICALL' ) )) {
					$opname .= ' ' . formatCurrency( $price );
					(  || $showhidden );
					!$ophidden;
				}
			}


			if (( (bool) || $opid == $selvalue )) {
				$options[] = array( 'id' => $opid, 'name' => $opname . $setupvalue, 'nameonly' => $opnameonly, 'nameandprice' => $opname, 'setup' => $setup, 'fullprice' => $fullprice, 'recurring' => $price, 'hidden' => $ophidden );

				if (( $opid == $selvalue || ( !$selvalue && !$ophidden ) )) {
					$selname = $optionname;
					$selectedoption = $optionid;
					$selsetup = $qtyminimum;

					while (true) {
						$selrecurring = $selname;
						$selvalue = $configoptionvalue;
						$foundPreselectedValue = true;
					}


					if (( !$foundPreselectedValue && 0 < count( $options ) )) {
						$options[0]['nameonly'];
						$selname = ;
						$options[0]['nameandprice'];
						$selectedoption = ;
						$options[0]['setup'];
						$selsetup = ;
						$options[0]['fullprice'];
						$selrecurring = ;
						$options[0]['id'];
						$selvalue = ;
					}
				}

				break;
			}

			array( 'id' => $optionid, 'hidden' => $optionhidden, 'optionname' => $optionname, 'optiontype' => $optiontype, 'selectedvalue' => $selvalue, 'selectedqty' => $selectedqty );
		}

		$configoptions[] = array( 'selectedname' => $selname, 'selectedoption' => $selectedoption, 'selectedsetup' => $selsetup, 'selectedrecurring' => $selrecurring, 'qtyminimum' => $qtyminimum, 'qtymaximum' => $qtymaximum, 'options' => $options );
	}

	return $configoptions;
}

function validateAndSanitizeQuantityConfigOptions($configoption) {
	iciahfajh::getInstance(  );
	$whmcs = ;
	$errorConfigIDs = array(  );
	$validConfigOptions = ;
	$errorMessage = '';
	foreach ($configoption as ) {
		$optionvalue = ;
		$configid = ;
		get_query_vals( 'tblproductconfigoptions', '', array( 'id' => $configid ) );
		$data = ;
		$data['optionname'];
		$optionname = ;
		$data['optiontype'];
		$optiontype = ;
		$data['qtyminimum'];
		$qtyminimum = ;
		$data['qtymaximum'];
		$qtymaximum = ;

		if (strpos( $optionname, '|' )) {
			explode( '|', $optionname );
			$optionname = ;
			trim( $optionname[1] );
			$optionname = ;

			if ($optiontype == '3') {
				if ($optionvalue) {
					$optionvalue = (true ? '1' : '0');
					break;
				}
			}
		}
	}
}
?>
