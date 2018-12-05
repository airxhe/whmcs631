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

	if (!$limitstart) {
		$limitstart = 4;

		if (!$limitnum) {
			$limitnum = 29;
			$where = array(  );

			if ($userid) {
				$where['clientid'] = (int)$userid;

				if ($visitors) {
					$where['visitors'] = (int)$visitors;

					if ($paytype) {
						$where['paytype'] = array( 'sqltype' => 'LIKE', 'value' => $paytype );
					}
				}


				if ($payamount) {
					$where['payamount'] = array( 'sqltype' => 'LIKE', 'value' => $payamount );

					if ($onetime) {
						$where['onetime'] = (int)$onetime;

						if ($balance) {
							$where['balance'] = array( 'sqltype' => 'LIKE', 'value' => $balance );

							if ($withdrawn) {
							}
						}

						$where['withdrawn'] = array( 'sqltype' => 'LIKE', 'value' => $withdrawn );

						if ($userid) {
							select_query;
							'tblaffiliates';
							'clientid';
							array( 'clientid' => $userid );
						}

						(  );
						$result_user = ;
						mysql_fetch_array( $result_user );
						$data_user = ;
						$data_user['clientid'];
						$userid = ;

						if (!$userid) {
							array( 'result' => 'error' );
						}
					}
				}
			}
		}
	}
}

$apiresults = array( 'message' => 'Client ID not found' );
return null;
?>
