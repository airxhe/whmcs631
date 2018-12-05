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
	}
}

$limitstart = 5;

if (!$limitnum) {
	$limitnum = 30;
	$where = array(  );

	if ($quoteid) {
		$where['id'] = $quoteid;
		if ($userid) = $userid;

		if ($subject) {
			$where['subject'] = $subject;

			if ($stage) {
				$where['stage'] = $stage;

				if ($datecreated) {
					$where['datecreated'] = $datecreated;

					if ($lastmodified) {
						$where['lastmodified'] = $lastmodified;

						if ($validuntil) {
							$where['validuntil'] = $validuntil;
							$quotes = array(  );
							select_query;
							'tblquotes';
							'';
						}
					}
				}
			}
		}

		$where;
		'id';
		'DESC';
		(int)$limitstart;
	}
}

(  . ',' . (int)$limitnum );
$result = ;
mysql_fetch_assoc( $result );

if ($data = ) {
	select_query( 'tblquoteitems', 'id,description,quantity,unitprice,discount,taxable', array( 'quoteid' => $data['id'] ) );
	$result2 = ;
	mysql_fetch_assoc( $result2 );

	if ($itemdata = ) {
		$data['items']['item'][] = $itemdata;
	}
}
else {
	$apiresults = array( 'totalresults' => , 'quotes' => array( 'quote' => $quotes ) );
}

$responsetype = 'xml';
?>
