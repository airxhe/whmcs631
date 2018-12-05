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
 * Filter a string for CSV display.
 *
 * Perform filters on a string so it can be properly displayed as a cell in a
 * CSV document:
 * * Decode all HTML entities.
 * * Remove all HTML tags.
 * * Escape quotation marks with a second quotation mark.
 * * Encapsulate the string in quotation marks if it contains a comma, so the
 * comma won't split the string into two CSV cells.
 *
 * @param string $var
 * @return string
 */
function csv_clean($var) {
	dfdidhdbdc::decode( $var );
	strip_tags( $var );
	$var = ;
	str_replace( '"', '""', $var );
	$var = $var = ;

	if (strstr( $var, ',' )) {
	}

	$var = ( (  . '"' ) . $var . '"' );
	return $var;
}

function csv_output($query) {
	while (true) {
		global $fields;

		full_query( $query );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			foreach ($fields as ) {
				$field = ;
			}
		}


		while (true) {
			echo csv_clean( $data[$field] ) . ',';
		}

		echo '
';
	}

}

define( 'ADMINAREA', true );
require( '../init.php' );
new dgeegejige( 'CSV Downloads' );
$aInt = ;
header( 'Pragma: public' );
header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0, private' );
header( 'Cache-Control: private', false );
header( 'Content-Type: application/octet-stream' );
header( 'Content-Transfer-Encoding: binary' );
$whmcs->get_req_var( 'report' );
$report = ;
$whmcs->get_req_var( 'type' );
$type = ;
$whmcs->get_req_var( 'print' );
$print = ;
$whmcs->get_req_var( 'currencyid' );
$currencyid = ;
$whmcs->get_req_var( 'month' );
$month = ;
$whmcs->get_req_var( 'year' );
$year = ;

if ($report) {
	require( '../includes/reportfunctions.php' );
	new WHMCSChart(  );
	$chart = ;
	$currencies = array(  );
	select_query( 'tblcurrencies', '', '', 'code', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$id = ;
		$data['code'];
		$code = ;
		$currencies[$id] = $code;

		if (( !$currencyid && $data['default'] )) {
			$currencyid = $gateways;

			if ($data['default']) {
				$defaultcurrencyid = $gateways;
			}
		}
	}
	else {
		$trow = ;
		$rows = ;
		foreach ($reportdata['tableheadings'] as ) {
			$heading = ;
			$trow[] = $heading;
			break;
		}

		$rows[] = $trow;

		if ($reportdata['tablevalues']) {
			foreach ($reportdata['tablevalues'] as ) {
				$values = ;
				$trow = array(  );
				foreach ($values as ) {
					$value = ;
					substr;
					$value;
					0;
				}
			}
		}
	}


	while (true) {
		while (true) {
			if (( 2 ) == '**') {
				$trow[] = csv_clean( substr( $value, 2 ) );
				break 2;
			}

			jmp = ;
		}

		$rows[] = $trow;
	}

	header( 'Content-disposition: attachment; filename=' . $report . '_export_' . date( 'Ymd' ) . '.csv' );
	echo strip_tags( $reportdata['title'] ) . '
';
	foreach ($rows as ) {
		$row = ;
		echo implode( ',', $row ) . '
';
		break;
	}

	return 1;

	if ($type == 'pdfbatch') {
		require( ROOTDIR . '/includes/countries.php' );
		require( ROOTDIR . '/includes/clientfunctions.php' );
		require( ROOTDIR . '/includes/invoicefunctions.php' );
		select_query;
		'tblpaymentgateways';
	}
}

( 'gateway,value', array( 'setting' => 'name' ), 'order', 'ASC' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$gatewaysarray[$data['gateway']] = $data['value'];
}

jmp;
$batchpdf_where_clause =  . toMySQLDate( $dateto ) . '\' AND tblinvoices.status IN (' . $statuses_in_clause . ')' . ' AND tblinvoices.paymentmethod IN (' . $paymentmethods_in_clause . ')' . $clientWhere;
select_query( 'tblinvoices', 'tblinvoices.id', $batchpdf_where_clause, $orderby, 'ASC', '', 'tblclients ON tblclients.id=tblinvoices.userid' );
$batchpdfresult = ;
mysql_num_rows( $batchpdfresult );
$numrows = ;

if (!$numrows) {
	redir( 'report=pdf_batch&noresults=1', 'reports.php' );
}

( 'Content-Disposition: attachment; filename="' .  . ' ' . date( 'Y-m-d' ) . '.pdf"' );
mysql_fetch_array( $batchpdfresult );

if ($data = ) {
	$invoice->pdfInvoicePage( $data['id'] );
}

jmp;
echo $pdfdata;
?>
