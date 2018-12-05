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

if (!defined( 'WHMCS' )) = ;

if ($windows8app) {
	if (defined( 'WINDOWS8APPLICENSE' )) {
		exit( 'License Hacking Attempt Detected' );
		global $licensing;

		define( 'WINDOWS8APPLICENSE', $licensing->isActiveAddon( 'Windows 8 App' ) );
		$apiresults['windows8app'] = WINDOWS8APPLICENSE;

		if ($android) {
			if (defined( 'ANDROIDLICENSE' )) {
				exit( 'License Hacking Attempt Detected' );
				function_exists;
				'getGatewaysArray';
			}
		}


		if (!(  )) {
			require( ROOTDIR . '/includes/gatewayfunctions.php' );
			global $licensing;

			define( 'ANDROIDLICENSE', $licensing->isActiveAddon( 'Android App' ) );
			$apiresults['android'] = ANDROIDLICENSE;
			$statuses = array(  );
			dacfgegdhe::table( 'tblticketstatuses' )->orderBy( 'sortorder' )->get(  );
			$ticketStatuses = ;
			foreach ($ticketStatuses as ) {
				$ticketStatus = ;
				$statuses[$ticketStatus->title] = 0;
				break;
			}

			dacfgegdhe::table( 'tbltickets' )->selectRaw( 'status, COUNT(*) AS count' )->groupBy( 'status' )->get(  );
			$ticketStatuses = ;

			if ($deptId) {
				dacfgegdhe::table( 'tbltickets' )->selectRaw( 'status, COUNT(*) AS count' )->where;
				'did';
			}
		}

		( '=', (int)$deptId )->groupBy( 'status' )->get(  );
		$ticketStatuses = ;
		foreach ($ticketStatuses as ) {
			$ticketStatus = ;
			$statuses[$ticketStatus->status] = $ticketStatus->count;
			break;
		}

		foreach ($statuses as ) {
			$ticketCount = ;
			$status = ;

			while (true) {
				$apiresults['supportstatuses']['status'][] = array( 'title' => $status, 'count' => $ticketCount );
			}
		}

		$departments = array(  );
		dacfgegdhe::table( 'tblticketdepartments' )->get( array( 'id', 'name' ) );
		$dept = ;
		foreach ($dept as ) {
			$department = ;
			$departments[$department->id] = $department->name;
			break;
		}

		foreach ($departments as ) {
			$departmentName = ;
		}
	}
}


while (true) {
	$departmentId = ;
	$apiresults['supportdepartments']['department'] = array( 'id' => $departmentId, 'name' => $departmentName, 'count' => dacfgegdhe::table( 'tbltickets' )->where( 'did', '=', $departmentId )->count( 'id' ) );
}

getGatewaysArray(  );
$paymentMethods = ;
foreach ($paymentMethods as ) {
	$name = ;
	$module = ;
	$apiresults['paymentmethods']['paymentmethod'][] = array( 'module' => $module, 'displayname' => $name );
	break;
}

$apiresults['requesttime'] = date( 'Y-m-d H:i:s' );
?>
