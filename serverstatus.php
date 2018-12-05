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

function getPortStatus(&$params, $smarty) {
	global $servers;

	$params['num'];
	$num = ;
	@fsockopen( $servers[$num]['ipaddress'], $params['port'], $errno, $errstr, 5 );
	$res = ;
	'<img src="' . DI::make( 'asset' )->getImgPath(  ) . '/status';

	if ($res) {
			. (true ? 'ok' : 'failed') . '.gif" alt="';

		if ($res) {
			(true ? 'on' : 'off');
		}

		'serverstatus' .  . 'line';
	}

	$status =  . $_LANG[] . '" width="16" height="16" />';
	return $status;
}

define( 'CLIENTAREA', true );
require( 'init.php' );
$_LANG['serverstatustitle'];
$pagetitle = ;
$breadcrumbnav = '<a href="index.php">' . $_LANG['globalsystemname'] . '</a> > <a href="serverstatus.php">' . $_LANG['serverstatustitle'] . '</a>';
$templatefile = 'serverstatus';
$pageicon = 'images/status_big.gif';
Lang::trans( 'networkstatustitle' );
$displayTitle = ;
Lang::trans( 'networkstatussubtitle' );
$tagline = ;
initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );

if (( $CONFIG['NetworkIssuesRequireLogin'] && !isset( $_SESSION['uid'] ) )) {
	$goto = 'serverstatus';
	require( 'login.php' );
	eaaadiagec::release(  );
	$servers = array(  );
	select_query( 'tblservers', '', 'disabled=0 AND statusaddress!=\'\'', 'name', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['name'];
		$name = ;
		$data['ipaddress'];
		$ipaddress = ;
		$data['statusaddress'];
		$statusaddress = ;
		substr;
		$statusaddress;
	}
}


if (( -1, 1 ) != '/') {
	$statusaddress .= '/';

	if (substr( $statusaddress, -9, 9 ) != 'index.php') {
		$statusaddress .= 'index.php';
		$servers[] = array( 'name' => $name, 'ipaddress' => $ipaddress, 'statusaddr' => $statusaddress, 'phpinfourl' => $statusaddress . '?action=phpinfo', 'serverload' => $serverload, 'uptime' => $uptime, 'phpver' => $phpver, 'mysqlver' => $mysqlver, 'zendver' => $zendver );
	}
}
else {
	$phpver[1];
	$phpver = ;
	$mysqlver[1];
	$mysqlver = ;
	$zendver[1];
	$zendver = ;

	if (!$serverload) {
		$_LANG['serverstatusnotavailable'];
		$serverload = ;

		if (!$uptime) {
			$_LANG['serverstatusnotavailable'];
			$uptime = ;
			json_encode;
			array( 'load' => dfdidhdbdc::encode( $serverload ), 'uptime' => dfdidhdbdc::encode( $uptime ) );
			dfdidhdbdc::encode;
		}
	}
}

echo ( array( 'phpver' => ( $phpver ), 'mysqlver' => dfdidhdbdc::encode( $mysqlver ), 'zendver' => dfdidhdbdc::encode( $zendver ) ) );
exit(  );
?>
