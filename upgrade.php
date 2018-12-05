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

define( 'CLIENTAREA', true );
require( 'init.php' );
require( 'includes/configoptionsfunctions.php' );
require( 'includes/gatewayfunctions.php' );
require( 'includes/invoicefunctions.php' );
require( 'includes/clientfunctions.php' );
require( 'includes/upgradefunctions.php' );
require( 'includes/orderfunctions.php' );
$_LANG['upgradedowngradepackage'];
$pagetitle = ;
$pageicon = 'images/clientarea_big.gif';
$breadcrumbnav = '<a href="index.php">' . $_LANG['globalsystemname'] . '</a> > <a href="clientarea.php">' . $_LANG['clientareatitle'] . '</a> > <a href="upgrade.php">' . $_LANG['upgradedowngradepackage'] . '</a>';
Lang::trans( 'upgradedowngradepackage' );
$displayTitle = ;
$tagline = '';
initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );

if (!isset( $_SESSION['uid'] )) {
	$goto = 'clientarea';
	include( 'login.php' );
	outputClientArea( $templatefile );
	exit(  );
	checkContactPermission( 'orders' );
	getCurrency( $_SESSION['uid'] );
	$currency = ;
	$templatefile = 'upgrade';
	$whmcs->get_req_var( 'step' );
	$step = ;

	if ($step == '4') {
		foreach ($_SESSION['upgradeorder'] as ) {
			$v = ;
			$k = ;
			$$k = $productname;
			break;
		}

		select_query( 'tblhosting', 'tblhosting.id,tblhosting.domain,tblhosting.nextduedate,tblhosting.billingcycle,tblhosting.packageid,' . 'tblproducts.name as product_name, tblproductgroups.id AS group_id,tblproductgroups.name as group_name', array( 'userid' => $_SESSION['uid'], 'tblhosting.id' => $id, 'tblhosting.domainstatus' => 'Active' ), '', '', '', 'tblproducts ON tblproducts.id=tblhosting.packageid INNER JOIN tblproductgroups ON tblproductgroups.id=tblproducts.gid' );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['id'];
		$id = ;

		if (!$id) {
			redir;
		}
	}

	( '', 'clientarea.php' );
	$data['domain'];
	$domain = ;
	cbebjifhdd::getProductName( $data['packageid'], $data['product_name'] );
	$productname = ;
	cdifjjijah::getGroupName( $data['group_id'], $data['group_name'] );
	$groupname = ;
	$data['packageid'];
	$packageid = ;
	$data['nextduedate'];
	$nextduedate = ;
	$data['billingcycle'];
	$billingcycle = ;
	$smarty->assign( 'id', $id );
	$smarty->assign( 'type', $type );
	$smarty->assign( 'groupname', $groupname );
	$smarty->assign( 'productname', $productname );
	$smarty->assign( 'domain', $domain );
	$smartyvalues['overdueinvoice'] = false;
	$smartyvalues['existingupgradeinvoice'] = false;
	$smartyvalues['upgradenotavailable'] = false;
	$smartyvalues['overdueinvoice'] = false;
	$smartyvalues['existingupgradeinvoice'] = false;
	select_query( 'tblinvoiceitems', 'invoiceid', array( 'type' => 'Hosting', 'relid' => $id, 'status' => 'Unpaid', 'tblinvoices.userid' => $_SESSION['uid'] ), '', '', '', 'tblinvoices ON tblinvoices.id=tblinvoiceitems.invoiceid' );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;

	if ($data[0]) {
		Menu::addContext( 'service', bdjfafbgha::find( $id ) );
		Menu::primarySidebar( 'serviceUpgrade' );
		Menu::secondarySidebar( 'serviceUpgrade' );
		$smartyvalues['overdueinvoice'] = true;
		outputClientArea( $templatefile );
		exit(  );
		$errormessage = '';

		if (( $step == '2' && $type == 'configoptions' )) {
			validateAndSanitizeQuantityConfigOptions( $whmcs->get_req_var( 'configoption' ) );
			$configOpsReturn = ;

			if ($configOpsReturn['errorMessage']) {
				$configOpsReturn['errorMessage'];
				$errormessage = ;
				$step = '';
				upgradeAlreadyInProgress( $id );
				$checkUpgradeAlreadyInProgress = ;
				Menu::addContext( 'service', bdjfafbgha::find( $id ) );
				Menu::primarySidebar( 'serviceUpgrade' );
				Menu::secondarySidebar( 'serviceUpgrade' );

				if (!$step) {
					if (upgradeAlreadyInProgress( $id )) {
						$smartyvalues['existingupgradeinvoice'] = true;
						outputClientArea( $templatefile );
						exit(  );
						new dhfceecdea( $id, eaaadiagec::get( 'uid' ) );
						$service = ;

						if (( ( $type == 'package' && !$service->getAllowProductUpgrades(  ) ) || ( $type == 'configoptions' && !$service->getAllowConfigOptionsUpgrade(  ) ) )) {
							$smartyvalues['upgradenotavailable'] = true;
							outputClientArea( $templatefile );
							exit(  );

							if ($type == 'package') {
								cbebjifhdd::find( $packageid )->getUpgradeProductIds(  );
								$upgradepackages = ;
								select_query( 'tblproducts', 'id, stockcontrol, qty', 'id IN (' . db_build_in_array( $upgradepackages ) . ')', 'order` ASC, `name', 'ASC' );
								$result = ;
								mysql_fetch_array( $result );

								if ($data = ) {
									$data['id'];
									$upgradepackageid = ;
									$data['stockcontrol'];
									$stockControlEnabled = ;
									$data['qty'];
									$stockQty = ;

									if (( !$stockControlEnabled || 0 < $stockQty )) {
										$upgradepackagesarray[$upgradepackageid] = getProductInfo( $upgradepackageid );
										$upgradepackagesarray[$upgradepackageid]['pricing'] = getPricingInfo( $upgradepackageid, '', true );
									}
								}
							}
						}
					}
				}
			}
		}
	}
	else {
		$applytax = false;
		$_REQUEST['id'];
		$serviceid = ;
		$whmcs->get_req_var( 'configoption' );
		$configoption = ;
		$whmcs->get_req_var( 'promocode' );
		$promocode = ;
		$smartyvalues['promoerror'] = '';
		$smartyvalues['promorecurring'] = '';
		$smartyvalues['promodesc'] = '';
		$smartyvalues['promocode'] = '';

		if (( $promocode && empty( $_REQUEST['removepromo'] ) )) {
			validateUpgradePromo( $promocode );
			$promodata = ;

			if (!is_array( $promodata )) {
				$promocode = '';
				$smartyvalues['promoerror'] = $promodata;
			}
		}

		$orderdescription = '';
		$_POST['id'];
		$serviceid = ;
		$_POST['paymentmethod'];
		$paymentmethod = ;

		if ($type == 'package') {
			$_POST['pid'];
			$newproductid = ;
			$_POST['billingcycle'];
			$newproductbillingcycle = ;
			SumUpPackageUpgradeOrder( $serviceid, $newproductid, $newproductbillingcycle, $promocode, $paymentmethod, true );
			$upgrades = ;
		}
	}

	['configoption'];
	$configoptions = ;
	SumUpConfigOptionsOrder( $serviceid, $configoptions, $promocode, $paymentmethod, true );
	$upgrades = ;
	$ordernotes = '';

	if (( $notes && $notes != $_LANG['ordernotesdescription'] )) {
		$ordernotes = $params;
		$_SESSION['upgradeorder'] = createUpgradeOrder( $serviceid, $ordernotes, $promocode, $paymentmethod );
		redir( 'step=4' );
	}

	new dgccjfbgea(  );
	$orderfrm = ;
	$invoiceid = (int)$invoiceid;

	if ($invoiceid) {
		select_query( 'tblinvoices', 'id,total,paymentmethod', array( 'userid' => $_SESSION['uid'], 'id' => $invoiceid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['id'];
		$invoiceid = ;
		$data['total'];
		$total = ;
		$data['paymentmethod'];
		$paymentmethod = ;

		if (( $invoiceid && 0 < $total )) {
			ddhjgidcb::makeSafeName( $paymentmethod );
			$paymentmethod = ;

			if (!$paymentmethod) {
				exit( 'Unexpected payment method value. Exiting.' );
				select_query;
			}
		}

		( 'tblpaymentgateways', 'value', array( 'gateway' => $paymentmethod, 'setting' => 'type' ) );
		$result = ;
		mysql_fetch_array( $result );
	}

	$data = ;
	$data['value'];
	$gatewaytype = ;

	if (( ( $gatewaytype == 'CC' || $gatewaytype == 'OfflineCC' ) && ( $CONFIG['AutoRedirectoInvoice'] == 'on' || $CONFIG['AutoRedirectoInvoice'] == 'gateway' ) )) {
		if (!isValidforPath( $paymentmethod )) {
			exit( 'Invalid Payment Gateway Name' );
			$gatewaypath = ROOTDIR . '/modules/gateways/' . $paymentmethod . '.php';

			if (file_exists( $gatewaypath )) {
				require_once( $gatewaypath );
				function_exists;
			}
		}


		if (!( $paymentmethod . '_link' )) {
			$whmcs->redirect( 'creditcard.php', 'invoiceid=' . (int)$invoiceid );

			if ($CONFIG['AutoRedirectoInvoice'] == 'on') {
				$whmcs->redirect( 'viewinvoice.php', 'id=' . (int)$invoiceid );

				if ($CONFIG['AutoRedirectoInvoice'] == 'gateway') {
					getClientsDetails( $_SESSION['uid'] );
					$clientsdetails = ;
					getGatewayVariables( $paymentmethod, $invoiceid, $total );
					$params = ;
					call_user_func( $paymentmethod . '_link', $params );
					$paymentbutton = ;
					$templatefile = 'forwardpage';
					$smarty->assign;
					'message';
					$_LANG['forwardingtogateway'];
				}
			}
		}
	}

	(  );
	$smarty->assign( 'code', $paymentbutton );
	$smarty->assign( 'invoiceid', $invoiceid );
	outputClientArea( $templatefile );
	exit(  );
	jmp;
	$smarty->assign( 'ispaid', true );
	$templatefile = 'complete';
	$smarty->assign( 'orderid', (int)$orderid );
	$smarty->assign( 'ordernumber', $order_number );
	$smarty->assign( 'invoiceid', $invoiceid );
	$smarty->assign;
	'carttpl';
	ecahhhdii::factory;
	$templatefile . '.tpl';
}

( (  )->getName(  ) );
$orderform = 'true';
outputClientArea( $templatefile, false, array( 'ClientAreaPageUpgrade' ) );
?>
