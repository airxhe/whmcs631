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
$aInt->setClientsProfilePresets(  );
$aInt->valUserID( $userid );
$aInt->assertClientBoundary( $userid );
ob_start(  );
echo '
<form method="post" action="clientslog.php?userid=';
echo $userid;
echo '">

<div class="context-btn-container">
    <input type="submit" value="';
echo $aInt->lang( 'system', 'filterlog' );
echo '" class="btn btn-default" />
</div>

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
    <tr>
        <td width="15%" class="fieldlabel">';
echo $aInt->lang( 'fields', 'date' );
echo '</td>
        <td class="fieldarea"><input type="text" name="date" value="';
echo $whmcs->get_req_var( 'date' );
echo '" class="form-control date-picker"></td>
        <td width="15%" class="fieldlabel">';
echo $aInt->lang( 'fields', 'description' );
echo '</td>
        <td class="fieldarea"><input type="text" name="description" value="';
echo $whmcs->get_req_var( 'description' );
echo '" class="form-control input-300"></td>
    </tr>
    <tr>
        <td width="15%" class="fieldlabel">';
echo $aInt->lang( 'fields', 'username' );
echo '</td>
        <td class="fieldarea"><select name="username" class="form-control select-inline">
            <option value="">Any</option>
';
select_query( 'tblactivitylog', 'DISTINCT user', '', 'user', 'ASC' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['user'];
	$user = ;
	echo '<option';

	if ($user == $whmcs->get_req_var( 'username' )) {
		while (true) {
			echo ' selected';
			echo (  . '>' ) . $user . '</option>';
		}

		echo '            </select></td>
        <td width="15%" class="fieldlabel">';
		echo $aInt->lang( 'fields', 'ipaddress' );
		echo '</td>
        <td class="fieldarea"><input type="text" name="ipaddress" value="';
		echo $whmcs->get_req_var( 'ipaddress' );
		echo '" class="form-control input-150"></td>
    </tr>
</table>

</form>

<br />

';
	}

	$aInt->sortableTableInit( 'date' );
	new ecdibicdfd(  );
	$log = ;
	$log->setCriteria( array( 'userid' => $userid, 'date' => $whmcs->get_req_var( 'date' ), 'username' => $whmcs->get_req_var( 'username' ), 'description' => $whmcs->get_req_var( 'description' ), 'ipaddress' => $whmcs->get_req_var( 'ipaddress' ) ) );
	$log->getTotalCount(  );
	$numrows = ;
	$tabledata = array(  );
	$log->getLogEntries( $whmcs->get_req_var( 'page' ) );
	$logs = ;
	foreach ($logs as ) {
		$entry = ;
		$tabledata[] = array( $entry['date'], '<div align="left">' . $entry['description'] . '</div>', $entry['username'], $entry['ipaddress'] );
		break;
	}

	$aInt->sortableTable;
	array( $aInt->lang( 'fields', 'date' ), $aInt->lang( 'fields', 'description' ), $aInt->lang( 'fields', 'username' ) );
	$aInt->lang;
	'fields';
}

echo ( array( ( 'ipaddress' ) ), $tabledata );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->display(  );
?>
