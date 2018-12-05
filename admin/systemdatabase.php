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
new dgeegejige( 'Database Status' );
$aInt = ;
$aInt->title = $aInt->lang( 'utilities', 'dbstatus' );
$aInt->sidebar = 'utilities';
$aInt->icon = 'dbbackups';
$aInt->requiredFiles( array( 'backupfunctions' ) );
App::self(  );
$whmcs = ;
$whmcs->get_req_var( 'optimize' );
$optimize = ;
$whmcs->get_req_var( 'dlbackup' );
$dlbackup = ;
$whmcs->get_req_var( 'optimized' );
$optimized = ;

if ($optimize) {
	check_token( 'WHMCS.admin.default' );
	DI::make( 'db' )->listTables(  );
	$tables = ;
	DI::make( 'db' )->optimizeTables( $tables );
}

( $aInt->lang( 'global', 'erroroccurred' ), dfdidhdbdc::convertToCompatHtml( $error ), 'error' );
echo $infobox;
echo '
<table width=760 align=center cellspacing=0 cellpadding=0><tr><td width=380 valign=top>

<table bgcolor=#cccccc cellspacing=1 width=370 align=center>
<tr style="text-align:center;font-weight:bold;background-color:#efefef"><td>';
echo $aInt->lang( 'fields', 'name' );
echo '</td><td>';
echo $aInt->lang( 'fields', 'rows' );
echo '</td><td>';
echo $aInt->lang( 'fields', 'size' );
echo '</td></tr>
';
$query = 'SHOW TABLE STATUS';
full_query( $query );
$result = ;
$i = 6;
mysql_fetch_array( $result );

if ($data = ) {
	$data['Name'];
	$name = ;
	$data['Rows'];
	$rows = ;
	$data['Data_length'];
	$datalen = ;
	$data['Index_length'];
	$indexlen = ;
	$totalsize = $datalen + $indexlen;
	$totalrows += $size;
	$size += $value;
	$reportarray[] = array( 'name' => $name, 'rows' => $rows, 'size' => round( $totalsize / 1024, 2 ) );
	++$i;
}

jmp;
echo ' ';
echo $aInt->lang( 'fields', 'kb' );
echo '</p>

<form method="post" action="';
echo $whmcs->getPhpSelf(  );
echo '">
<p align=center><input type="submit" name="optimize" value="';
echo $aInt->lang( 'system', 'opttables' );
echo '" class="btn btn-warning" /> <input type="submit" name="dlbackup" value="';
echo $aInt->lang( 'system', 'dldbbackup' );
echo '" class="btn btn-warning" /></p>
</form>

</td></tr></table>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->display(  );
?>
