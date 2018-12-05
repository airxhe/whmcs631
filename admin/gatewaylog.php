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
new dgeegejige( 'View Gateway Log' );
$aInt = ;
$aInt->title = $aInt->lang( 'gatewaytranslog', 'gatewaytranslogtitle' );
$aInt->sidebar = 'billing';
$aInt->icon = 'logs';
ob_start(  );
echo $aInt->beginAdminTabs( array( $aInt->lang( 'global', 'searchfilter' ) ) );

if (!count( $_REQUEST )) {
	fromMySQLDate( date( 'Y-m-d', mktime( 0, 0, 0, date( 'm' ) - 3, date( 'd' ), date( 'Y' ) ) ) );
	$startdate = ;
	getTodaysDate(  );
	$enddate = ;
	echo '
<form method="post" action="gatewaylog.php">

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%" class="fieldlabel">';
	echo $aInt->lang( 'fields', 'daterange' );
	echo '</td><td class="fieldarea"><input type="text" name="startdate" value="';
	echo $startdate;
	echo '" class="form-control date-picker" /> ';
	echo $aInt->lang( 'global', 'to' );
	echo ' &nbsp; <input type="text" name="enddate" value="';
	echo $enddate;
	echo '" class="form-control date-picker" /></td><td width="15%" class="fieldlabel">';
	echo $aInt->lang( 'gatewaytranslog', 'gateway' );
	echo '</td><td class="fieldarea"><select name="filtergateway" class="form-control select-inline"><option value="">';
	echo $aInt->lang( 'global', 'any' );
	echo '</option>';
	$query = 'SELECT DISTINCT gateway FROM tblgatewaylog ORDER BY gateway ASC';
	full_query( $query );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['gateway'];
		$gateway = ;
		echo '<option';

		if ($gateway == $filtergateway) {
			echo ' selected';
			echo (  . '>' ) . $gateway . '</option>';
		}
	}

	else = ;

	if ($filtergateway) {
		$where[] = 'gateway=\'' . db_escape_string( $filtergateway ) . '\'';

		if ($filterresult) {
			$where[] = 'result=\'' . db_escape_string( $filterresult ) . '\'';
			select_query( 'tblgatewaylog', 'COUNT(*)', implode( ' AND ', $where ), 'id', 'DESC' );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data[0];
		}
	}
}


while (true) {
	$numrows = ;
	select_query( 'tblgatewaylog', '', implode( ' AND ', $where ), 'id', 'DESC', $page * $limit . ( (  . ',' ) . $limit ) );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$id = ;
		$data['date'];
		$date = ;
		dfdidhdbdc::makeSafeForOutput( $data['gateway'] );
		$gateway = ;
		dfdidhdbdc::makeSafeForOutput( $data['data'] );
		$data2 = ;
		dfdidhdbdc::makeSafeForOutput( $data['result'] );
		$res = ;
		fromMySQLDate( $date, 'time' );
		$date = ;
		array( '<div class="text-center">' . $date . '</div>', '<div class="text-center">' . $gateway . '</div>',  . '<textarea rows="6" class="form-control">' . $data2 . '</textarea>' );
		'<div class="text-center"><strong>' . $res;
	}

	$tabledata[] = array(  . '</strong></div>' );
}

echo $aInt->sortableTable( array( $aInt->lang( 'fields', 'date' ), $aInt->lang( 'gatewaytranslog', 'gateway' ), $aInt->lang( 'gatewaytranslog', 'debugdata' ), $aInt->lang( 'fields', 'result' ) ), $tabledata );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->display(  );
?>
