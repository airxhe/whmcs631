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
new dgeegejige( 'View Banned IPs' );
$aInt = ;
$aInt->title = $aInt->lang( 'bans', 'iptitle' );
$aInt->sidebar = 'config';
$aInt->icon = 'configbans';
$aInt->helplink = 'Security/Ban Control';

if ($whmcs->get_req_var( 'ip' )) {
	check_token( 'WHMCS.admin.default' );

	if (defined( 'DEMO_MODE' )) {
		redir( 'demo=1' );
		checkPermission( 'Add Banned IP' );
		$expires = $year . $month . $day . $hour . $minutes . '00';
		insert_query( 'tblbannedips', array( 'ip' => $ip, 'reason' => $reason, 'expires' => $expires ) );
		logAdminActivity( ( ( ( ( (  . 'IP Ban Added: ' . $ip . ' (Expires: ' . $year . '-' ) . $month . '-' ) . $day . ' ' ) . $hour . ':' ) . $minutes . ')' ) );
		redir( 'success=true' );

		if ($whmcs->get_req_var( 'delete' )) {
			check_token( 'WHMCS.admin.default' );

			if (defined( 'DEMO_MODE' )) {
				redir( 'demo=1' );
				checkPermission( 'Unban Banned IP' );
				$id = (int)$whmcs->get_req_var( 'id' );
				dacfgegdhe::table( 'tblbannedips' )->find( $id, array( 'ip' ) );
				$record = ;
				delete_query( 'tblbannedips', array( 'id' => $id ) );
				logAdminActivity(  . 'IP Ban Removed: ' . $record->ip );
				redir( 'deleted=true' );
				ob_start(  );
				$infobox = '';

				if (defined( 'DEMO_MODE' )) {
					infoBox( 'Demo Mode', 'Actions on this page are unavailable while in demo mode. Changes will not be saved.' );

					if ($whmcs->get_req_var( 'success' )) {
						infoBox( $aInt->lang( 'bans', 'ipaddsuccess' ), $aInt->lang( 'bans', 'ipaddsuccessinfo' ) );

						if ($whmcs->get_req_var( 'deleted' )) {
							infoBox( $aInt->lang( 'bans', 'ipdelsuccess' ), $aInt->lang( 'bans', 'ipdelsuccessinfo' ) );
							echo $infobox;
							$aInt->deleteJSConfirm( 'doDelete', 'bans', 'ipdelsure', $_SERVER['PHP_SELF'] . '?delete=true&id=' );
							echo $aInt->beginAdminTabs( array( $aInt->lang( 'global', 'add' ), $aInt->lang( 'global', 'searchfilter' ) ), true );
							echo '
<form method="post" action="';
							echo $whmcs->getPhpSelf(  );
						}
					}
				}

				mktime;
				date( 'H' );
				date( 'i' );
				date( 's' );
				date( 'm' );
				date( 'd' ) + 7;
				date;
				'Y';
			}
		}
	}

	( (  ) );
	$new_ban_time = ;
	echo '">

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'ipaddress' );
	echo '</td><td class="fieldarea"><input type="text" name="ip" size="20"></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'bans', 'banreason' );
	echo '</td><td class="fieldarea"><input type="text" name="reason" size="90"></td></tr>
<tr><td class="fieldlabel">';
	$aInt->lang( 'bans', 'banexpires' );
}


while (true) {
	echo ;
	echo '</td><td class="fieldarea"><input type="text" name="day" size="3" maxlength="2" value="';
	echo date( 'd', $new_ban_time );
	echo '">/<input type="text" name="month" size="3" maxlength="2" value="';
	echo date( 'm', $new_ban_time );
	echo '">/<input type="text" name="year" size="6" maxlength="4" value="';
	echo date( 'Y', $new_ban_time );
	echo '"> <input type="text" name="hour" size="3" maxlength="2" value="';
	echo date( 'H', $new_ban_time );
	echo '">:<input type="text" name="minutes" size="3" maxlength="2" value="';
	echo date( 'i', $new_ban_time );
	echo '"> (';
	echo $aInt->lang( 'bans', 'format' );
	echo ')</td></tr>
</table>

<div class="btn-container">
    <input type="submit" value="';
	echo $aInt->lang( 'bans', 'addbannedip' );
	echo '" name="postreply" class="btn btn-primary">
</div>

</form>

';
	echo $aInt->nextAdminTab(  );
	echo '
<div class="text-center">
    <form method="post" action="';
	echo $whmcs->getPhpSelf(  );
	echo '" class="form-inline">
        Filter for
        <select name="filterfor" class="form-control select-inline">
            <option';

	if ($filterfor == 'IP Address') {
		echo ' selected';
		echo '>';
		echo $aInt->lang( 'fields', 'ipaddress' );
		echo '</option>
            <option';

		if ($filterfor == 'Ban Reason') {
			echo ' selected';
			echo '>';
			echo $aInt->lang( 'bans', 'banreason' );
			echo '</option>
        </select>
        matching
        <input type="text" name="filtertext" value="';
			echo $filtertext;
			echo '" class="form-control" />
        <input type="submit" value="';
			echo $aInt->lang( 'global', 'search' );
			echo '" name="postreply" class="btn btn-default" />
    </div>
</form>

';
			echo $aInt->endAdminTabs(  );
			echo '
<br>

';
		}
	}

	$aInt->sortableTableInit( 'nopagination' );
	$where = array(  );
	$whmcs->get_req_var( 'filterfor' );

	if ($filterfor = ) {
		$whmcs->get_req_var( 'filtertext' );
		$filtertext = ;

		if ($filterfor == 'IP Address') {
			$where = array( 'ip' => $filtertext );
		}

		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$id = ;
			$data['ip'];
			$ip = ;
			$data['reason'];
		}

		$reason = ;
		$data['expires'];
		$expires = ;
		fromMySQLDate( $expires, 'time' );
		$expires = ;
		array(  . '<a href="http://www.geoiptool.com/en/?IP=' . $ip . '" target="_blank">' . $ip . '</a>', $reason, $expires );
			. '<a href="#" onClick="doDelete(\'' . $id;
	}

	$tabledata[] = array(  . '\');return false"><img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'delete' ) . '"></a>' );
}

echo $aInt->sortableTable( array( $aInt->lang( 'fields', 'ipaddress' ), $aInt->lang( 'bans', 'banreason' ), $aInt->lang( 'bans', 'banexpires' ), '' ), $tabledata );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->display(  );
?>
