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
$_LANG['bannedtitle'];
$pagetitle = ;
$breadcrumbnav = '<a href="index.php">' . $_LANG['globalsystemname'] . '</a> > <a href="banned.php">' . $_LANG['bannedtitle'] . '</a>';
$pageicon = '';
Lang::trans( 'accessdenied' );
$displayTitle = ;
$tagline = '';
initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );
caegadgihi::getIP(  );
$remote_ip = ;
explode( '.', $remote_ip );
$ip = ;
db_escape_numarray( $ip );
$ip = ;
$remote_ip1 = $ip[0] . '.' . $ip[1] . '.' . $ip[2] . '.*';
$remote_ip2 = $ip[0] . '.' . $ip[1] . '.*.*';
get_query_vals( 'tblbannedips', '', 'ip=\'' . db_escape_string( $remote_ip ) . '\' OR ip=\'' . db_escape_string( $remote_ip1 ) . '\' OR ip=\'' . db_escape_string( $remote_ip2 ) . '\'', 'id', 'DESC' );
$data = ;
$data['id'];
$id = ;
$data['reason'];
$reason = ;
fromMySQLDate( $data['expires'], true, true );
$expires = ;

if (!$id) {
	redir( '', 'index.php' );
	htmlspecialchars;
}

$smartyvalues['ip'] = ( $remote_ip );
$smartyvalues['reason'] = $reason;
$smartyvalues['expires'] = $expires;
$templatefile = 'banned';
outputClientArea( $templatefile, false, array( 'ClientAreaPageBanned' ) );
?>
