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
	if (!defined( 'WHMCS' )) {
		exit( 'This file cannot be accessed directly' );
		bfiifiigdh::table( 'tblhostingaddons' )->distinct(  )->join( 'tblhosting', 'tblhosting.id', '=', 'tblhostingaddons.hostingid' )->join( 'tbladdons', 'tbladdons.id', '=', 'tblhostingaddons.addonid', 'LEFT' );
		$query = ;

		if ($serviceid) {
			if (is_numeric( $serviceid )) {
				$query->where( 'tblhostingaddons.hostingid', '=', $serviceid );
				$query = ;
				break;
			}
		}
	}

	( $clientid );
	$query = ;

	if ($addonid) {
		$query->where( 'tblhostingaddons.addonid', '=', $addonid );
		$query = ;
		$query->orderBy( 'tblhostingaddons.id', 'ASC' );
		$query = ;
		$query->get( array( 'tblhostingaddons.*', 'tblhosting.userid', 'tbladdons.name AS addon_name' ) );
		$result = ;
		$apiresults = array( 'result' => 'success', 'serviceid' => $serviceid, 'clientid' => $clientid, 'totalresults' => count( $result ) );
		foreach ($result as ) {
			$data = ;
			$data->name;
			array( 'id' => $data->id, 'userid' => $data->userid, 'orderid' => $data->orderid, 'serviceid' => $data->hostingid, 'addonid' => $data->addonid, 'name' => $data->addon_name, 'setupfee' => $data->setupfee, 'recurring' => $data->recurring );
		}
	}

	$addonarray = array( 'billingcycle' => $data->billingcycle, 'tax' => $data->tax, 'status' => $data->status, 'regdate' => $data->regdate, 'nextduedate' => $data->nextduedate, 'nextinvoicedate' => $data->nextinvoicedate, 'paymentmethod' => $data->paymentmethod, 'notes' => $data->notes );
	$apiresults['addons']['addon'][] = $addonarray;
}

$responsetype = 'xml';
?>
