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
new dgeegejige( 'System Cleanup Operations' );
$aInt = ;
$aInt->title = $aInt->lang( 'system', 'cleanupoperations' );
$aInt->sidebar = 'utilities';
$aInt->icon = 'cleanup';
$aInt->helplink = 'System Utilities#System Cleanup';
ob_start(  );

if (( $action == 'pruneclientactivity' && $date )) {
	check_token( 'WHMCS.admin.default' );
	toMySQLDate( $date );
	$sqldate = ;
	$query = 'DELETE FROM tblactivitylog WHERE userid>0 AND date<\'' . db_escape_string( $sqldate ) . '\'';
	full_query( $query );
	$result = ;
	infoBox( $aInt->lang( 'system', 'cleanupsuccess' ), $aInt->lang( 'system', 'deleteactivityinfo' ) . ( (  . ' ' ) . $date . ' (' ) . mysql_affected_rows(  ) . ')' );
	logActivity(  . 'Cleanup Operation: Pruned Client Activity Logs from before ' . $date );

	if (( $action == 'deletemessages' && $date )) {
		check_token( 'WHMCS.admin.default' );
		toMySQLDate( $date );
		$sqldate = ;
		$query = 'DELETE FROM tblemails WHERE date<\'' . db_escape_string( $sqldate ) . '\'';
		full_query( $query );
		$result = ;
		infoBox( $aInt->lang( 'system', 'cleanupsuccess' ), $aInt->lang( 'system', 'deletemessagesinfo' ) . ( (  . ' ' ) . $date . ' (' ) . mysql_affected_rows(  ) . ')' );
		logActivity(  . 'Cleanup Operation: Pruned Messages Sent before ' . $date );

		if ($action == 'cleargatewaylog') {
			check_token( 'WHMCS.admin.default' );
			$query = 'TRUNCATE tblgatewaylog';
			full_query( $query );
			$result = ;
			infoBox( $aInt->lang( 'system', 'cleanupsuccess' ), $aInt->lang( 'system', 'deletegatewaylog' ) );
			logActivity( 'Cleanup Operation: Gateway Log Emptied' );

			if ($action == 'clearmailimportlog') {
				check_token( 'WHMCS.admin.default' );
				$query = 'TRUNCATE tblticketmaillog';
				full_query( $query );
				$result = ;
				infoBox( $aInt->lang( 'system', 'cleanupsuccess' ), $aInt->lang( 'system', 'deleteticketlog' ) );
				logActivity( 'Cleanup Operation: Ticket Mail Import Log Emptied' );

				if ($action == 'clearwhoislog') {
					check_token;
				}
			}
		}
	}
}

( 'WHMCS.admin.default' );
$query = 'TRUNCATE tblwhoislog';
full_query( $query );
$result = ;
infoBox( $aInt->lang( 'system', 'cleanupsuccess' ), $aInt->lang( 'system', 'deletewhoislog' ) );
logActivity( 'Cleanup Operation: WHOIS Lookup Log Emptied' );

if ($action == 'emptytemplatecache') {
	check_token( 'WHMCS.admin.default' );
	new cjiehgbicj(  );
	$smarty = ;
	$smarty->clearAllCaches(  );
	infoBox( $aInt->lang( 'system', 'cleanupsuccess' ), $aInt->lang( 'system', 'deletecacheinfo' ) );
	logActivity( 'Cleanup Operation: Template Cache Emptied' );

	if (( $action == 'deleteattachments' && $date )) {
		check_token( 'WHMCS.admin.default' );
		toMySQLDate;
	}
}

( $date );
$sqldate = ;
select_query( 'tbltickets', '', 'date<=\'' . db_escape_string( $sqldate ) . '\' AND attachment!=\'\'' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['attachment'];
	$attachments = ;
	explode( '|', $attachments );
	$attachments = ;
	foreach ($attachments as ) {
		$filename = ;
		new bgbhbgchif(  )(  . DIRECTORY_SEPARATOR . $filename );
		$file = ;
		$file->delete(  );
		break;
	}

	jmp;
}

jmp;
echo ( 'system', 'emptywllog' );
echo '</b> <input id="system-empty-whois-lookup-log"  type="submit" value=" ';
echo $aInt->lang( 'global', 'go' );
echo ' &raquo; " class="button btn btn-default" />
</form>
</div>

<br>

<div class="contentbox">
<form method="post" action="';
echo $whmcs->getPhpSelf(  );
echo '"><input type="hidden" name="action" value="emptytemplatecache" />
<b>';
echo $aInt->lang( 'system', 'emptytc' );
echo '</b> <input id="system-empty-template-cache"  type="submit" value=" ';
echo $aInt->lang( 'global', 'go' );
echo ' &raquo; " class="button btn btn-default" />
</form>
</div>

</td></tr></table>

<br>

<div class="contentbox">
<form method="post" action="';
echo $whmcs->getPhpSelf(  );
echo '?action=pruneclientactivity">
<b>';
echo $aInt->lang( 'system', 'prunecal' );
echo '</b><br>
';
select_query( 'tblactivitylog', 'COUNT(*)', 'userid>0' );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data[0];
$num_rows = ;
echo $aInt->lang( 'system', 'totallogentries' ) . ': <b>' . $num_rows . '</b>';
echo '<br>
';
echo $aInt->lang( 'system', 'deleteentriesbefore' );
echo ': <input id="system-empty-activity-log-date"  type="text" name="date" class="datepick"> <input id="system-empty-activity-log-delete"  type="submit" value="';
echo $aInt->lang( 'global', 'delete' );
echo '" class="button btn btn-default"></form>
</div>

<br>

<div class="contentbox">
<form method="post" action="';
echo $whmcs->getPhpSelf(  );
echo '?action=deletemessages">
<b>';
echo $aInt->lang( 'system', 'prunese' );
echo '</b><br>
';
select_query( 'tblemails', 'COUNT(*)', '' );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data[0];
$num_rows = ;
echo $aInt->lang( 'system', 'totalsavedemails' ) . ': <b>' . $num_rows . '</b>';
echo '<br>
';
echo $aInt->lang( 'system', 'deletemailsbefore' );
echo ': <input id="system-empty-saved-emails-date" type="text" name="date" class="datepick"> <input id="system-empty-saved-emails-delete" type="submit" value="';
echo $aInt->lang( 'global', 'delete' );
echo '" class="button btn btn-default"></form>
</div>

<br>

<div class="contentbox">
<form method="post" action="';
echo $whmcs->getPhpSelf(  );
echo '?action=deleteattachments">
<b>';
echo $aInt->lang( 'system', 'pruneoa' );
echo '</b><br>
';
echo $aInt->lang( 'system', 'nosavedattachments' ) . ': <b>' . $attachmentscount . '</b><br>' . $aInt->lang( 'system', 'filesizesavedatt' ) . ': <b>' . $attachmentssize . ' ' . $aInt->lang( 'fields', 'mb' ) . '</b>';
echo '<br>
';
echo $aInt->lang( 'system', 'deleteattachbefore' );
echo ': <input id="system-empty-atachements-date" type="text" name="date" class="datepick"> <input id="system-empty-atachments-delete" type="submit" value="';
echo $aInt->lang( 'global', 'delete' );
echo '" class="button btn btn-default"></form>
</div>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->display(  );
?>
