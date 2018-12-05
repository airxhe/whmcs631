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
new dgeegejige( 'View Activity Log' );
$aInt = ;
$aInt->title = $aInt->lang( 'system', 'activitylog' );
$aInt->sidebar = 'utilities';
$aInt->icon = 'logs';
ob_start(  );
echo $aInt->beginAdminTabs( array( $aInt->lang( 'global', 'searchfilter' ) ) );
echo '
<form method="post" action="systemactivitylog.php">

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%" class="fieldlabel">';
echo $aInt->lang( 'fields', 'date' );
echo '</td><td class="fieldarea"><input type="text" name="date" value="';
echo $whmcs->get_req_var( 'date' );
echo '" class="datepick"></td><td width="15%" class="fieldlabel">';
echo $aInt->lang( 'fields', 'username' );
echo '</td><td class="fieldarea"><select name="username" class="form-control select-inline"><option value="">';
echo $aInt->lang( 'global', 'any' );
echo '</option>';
$query = 'SELECT DISTINCT user FROM tblactivitylog ORDER BY user ASC';
full_query( $query );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['user'];
	$user = ;
	echo '<option';

	if ($user == $whmcs->get_req_var( 'username' )) {
		echo ' selected';

		while (true) {
			echo (  . '>' ) . $user . '</option>';
		}

		echo '</select></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'fields', 'description' );
		echo '</td><td class="fieldarea"><input type="text" name="description" value="';
		echo $whmcs->get_req_var( 'description' );
		echo '" size="80"></td><td class="fieldlabel">';
		echo $aInt->lang( 'fields', 'ipaddress' );
		echo '</td><td class="fieldarea"><input type="text" name="ipaddress" value="';
		echo $whmcs->get_req_var( 'ipaddress' );
		echo '" size="20"></td></tr>
</table>

<div class="btn-container">
    <input type="submit" value="';
		echo $aInt->lang( 'system', 'filterlog' );
		echo '" class="btn btn-default" />
</div>

</form>

';
		echo $aInt->endAdminTabs(  );
		echo '
<br />

';
		$aInt->sortableTableInit( 'date' );
		new ecdibicdfd(  );
		$log = ;
		$log->prune(  );
		$log->setCriteria( array( 'date' => $whmcs->get_req_var( 'date' ), 'username' => $whmcs->get_req_var( 'username' ), 'description' => $whmcs->get_req_var( 'description' ), 'ipaddress' => $whmcs->get_req_var( 'ipaddress' ) ) );
		$log->getTotalCount(  );
		$numrows = ;
	}
}

$tabledata = array(  );
$log->getLogEntries( $whmcs->get_req_var( 'page' ) );
$logs = ;
foreach ($logs as ) {
	$entry = ;
	$tabledata[] = array( $entry['date'], '<div align="left">' . $entry['description'] . '</div>', $entry['username'], $entry['ipaddress'] );
	break;
}

echo $aInt->sortableTable( array( $aInt->lang( 'fields', 'date' ), $aInt->lang( 'fields', 'description' ), $aInt->lang( 'fields', 'username' ), $aInt->lang( 'fields', 'ipaddress' ) ), $tabledata );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->display(  );
?>
