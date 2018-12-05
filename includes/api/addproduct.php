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

	if (!$name) {
		$apiresults = array( 'result' => 'error', 'message' => 'You must supply a name for the product' );
		return false;

		if (!$type) {
		}
	}

	$type = 'other';

	if (( $stockcontrol || $qty )) {
		$stockcontrol = '1';
	}

	$product->showDomainOptions = $showdomainoptions;
	$product->welcomeEmailTemplateId = $welcomeemail;
	$product->stockControlEnabled = $stockcontrol;
	$product->quantityInStock = $qty;
	$product->proRataBilling = $proratabilling;
	$product->proRataChargeDayOfCurrentMonth = $proratadate;
	$product->proRataChargeNextMonthAfterDay = $proratachargenextmonth;
	$product->paymentType = $paytype;
	$product->freeSubDomains = explode( ',', $subdomain );
	$product->autoSetup = $autosetup;
	$product->module = $module;
	$product->serverGroupId = $servergroupid;
	$product->moduleConfigOption1 = $configoption1;
	$product->moduleConfigOption2 = $configoption2;
	$product->moduleConfigOption3 = $configoption3;
	$product->moduleConfigOption4 = $configoption4;
	$product->moduleConfigOption5 = $configoption5;
	$product->moduleConfigOption6 = $configoption6;
	$product->applyTax = $tax;
	$product->displayOrder = $order;
	$product->isFeatured = $isFeatured;
	$product->save(  );
	$product->id;
	$pid = ;
	foreach ($pricing as ) {
		$values = ;
		$currency = ;
		insert_query( 'tblpricing', array( 'type' => 'product', 'currency' => $currency, 'relid' => $pid, 'msetupfee' => $values['msetupfee'], 'qsetupfee' => $values['qsetupfee'], 'ssetupfee' => $values['ssetupfee'], 'asetupfee' => $values['asetupfee'], 'bsetupfee' => $values['bsetupfee'], 'tsetupfee' => $values['tsetupfee'], 'monthly' => $values['monthly'], 'quarterly' => $values['quarterly'], 'semiannually' => $values['semiannually'], 'annually' => $values['annually'], 'biennially' => $values['biennially'], 'triennially' => $values['triennially'] ) );
	}
}


while (true) {
}

$apiresults = array( 'result' => 'success', 'pid' => $pid );
?>
