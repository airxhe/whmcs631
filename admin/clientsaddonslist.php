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

define( 'ADMINAREA', true );
require( '../init.php' );
new dgeegejige( 'List Addons' );
$aInt = ;
$aInt->title = $aInt->lang( 'services', 'listaddons' );
$aInt->sidebar = 'clients';
$aInt->icon = 'productaddons';
$aInt->requiredFiles( array( 'gatewayfunctions' ) );
ob_start(  );
$predefinedaddons = array(  );
select_query( 'tbladdons', '', '' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['id'];
	$addon_id = ;
	$data['name'];
	$addon_name = ;
	$predefinedaddons[$addon_id] = $addon_name;
}

jmp;
$data['companyname'];
$companyname = ;
$data['groupid'];
$groupid = ;
$data['currency'];
$currency = ;

if (!$domain) {
	$domain = '(' . $aInt->lang( 'addons', 'nodomain' ) . ')';
	getCurrency( '', $currency );
	$currency = ;
	formatCurrency( $amount );
	$amount = ;

	if (( ( $billingcycle == 'One Time' || $billingcycle == 'Free Account' ) || $billingcycle == 'Free' )) {
		$nextduedate = '-';
		$aInt->lang( 'billingcycles', str_replace( array( '-', 'account', ' ' ), '', strtolower( $billingcycle ) ) );
		$billingcycle = ;
		$tabledata[] = array(  . '<input type="checkbox" name="selectedclients[]" value="' . $id . '" class="checkall" />',  . '<a href="clientsservices.php?userid=' . $userid . '&id=' . $id . '&aid=' . $aid . '">' . $aid . '</a>', $addonname . ' <span class="label ' . strtolower( $status ) . '">' . $status . '</span>',  . '<a href="clientsservices.php?userid=' . $userid . '&id=' . $id . '">' . $dpackage . '</a>', $aInt->outputClientLink( $userid, $firstname, $lastname, $companyname, $groupid ), $billingcycle, $amount, $nextduedate );
	}

	jmp;
	(  );
	$aInt->content = $content;
}

$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
