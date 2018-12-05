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
new dgeegejige( 'Configure Client Groups' );
$aInt = ;
$aInt->title = $aInt->lang( 'clientgroups', 'title' );
$aInt->sidebar = 'config';
$aInt->icon = 'clients';
$aInt->helplink = 'Client Groups';

if ($action == 'savegroup') {
	check_token( 'WHMCS.admin.default' );
	insert_query( 'tblclientgroups', array( 'groupname' => $groupname, 'groupcolour' => $groupcolour, 'discountpercent' => $discountpercent, 'susptermexempt' => $susptermexempt, 'separateinvoices' => $separateinvoices ) );
	$id = ;
	logAdminActivity(  . 'Client Group Created: ' . $groupname . ' - Client Group ID: ' . $id );
	redir( 'added=true' );

	if ($action == 'updategroup') {
		check_token( 'WHMCS.admin.default' );
		$changes = array(  );
		dacfgegdhe::table( 'tblclientgroups' )->find( $groupid );
		$group = ;
		update_query( 'tblclientgroups', array( 'groupname' => $groupname, 'groupcolour' => $groupcolour, 'discountpercent' => $discountpercent, 'susptermexempt' => $susptermexempt, 'separateinvoices' => $separateinvoices ), array( 'id' => $groupid ) );

		if ($discountpercent != $group->discountpercent) {
			$changes[] = (  . 'Discount Percentage Changed from \'' . $group->discountpercent . '\' to \'' . $discountpercent . '\'' );

			if ($susptermexempt != $group->susptermexempt) {
				if ($susptermexempt) {
					$changes[] = 'Suspend/Termination Exemption Enabled';
				}
			}
		}
	}
}

$jscode =  . '\';
}}';
echo '
<p>';
echo $aInt->lang( 'clientgroups', 'info' );
echo '</p>

';
$aInt->sortableTableInit( 'nopagination' );
select_query( 'tblclientgroups', '', '' );
$result = ;
mysql_fetch_assoc( $result );

if ($data = ) {
	if ($data['susptermexempt'] == 'on') {
		$suspterm = (true ? $aInt->lang( 'global', 'yes' ) : $aInt->lang( 'global', 'no' ));

		if ($data['separateinvoices'] == 'on') {
			$separateinv = (true ? $aInt->lang( 'global', 'yes' ) : $aInt->lang( 'global', 'no' ));

			if ($data['groupcolour']) {
				$data['groupcolour'];
			}
		}

		$groupcol = (true ? '<div style="width:75px;background-color:' .  . '">' . $aInt->lang( 'clientgroups', 'sample' ) . '</div>' : '');
		$tabledata[] = array( $data['groupname'], $groupcol, $data['discountpercent'], $suspterm, $separateinv, '<a href="' . $_SERVER['PHP_SELF'] . '?action=edit&id=' . $data['id'] . '"><img src="images/edit.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'edit' ) . '"></a>', '<a href="#" onClick="doDelete(\'' . $data['id'] . '\');return false"><img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'delete' ) . '"></a>' );
	}

	jmp;
	echo ( 'clientgroups', 'clientgroup' );
	echo '</h2>

<form method="post" action="';
	echo $whmcs->getPhpSelf(  );
	echo '?action=';
	echo $setaction;
	echo '">
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="25%" class="fieldlabel">';
	echo $aInt->lang( 'clientgroups', 'groupname' );
	echo '</td><td class="fieldarea"><input type="text" name="groupname" size="40" value="';
	echo $groupname;
	echo '" /></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'clientgroups', 'groupcolour' );
	echo '</td><td class="fieldarea"><input type="text" name="groupcolour" size="10" value="';
	echo $groupcolour;
	echo '" class="colorpicker" /></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'clientgroups', 'grpdispercent' );
	echo '</td><td class="fieldarea"><input type="text" name="discountpercent" size="10" value="';
	echo $discountpercent;
	echo '" /></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'clientgroups', 'exemptsusterm' );
	echo '</td><td class="fieldarea"><input type="checkbox" name="susptermexempt"';

	if ($susptermexempt) {
		echo 'checked';
		echo ' /></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'clients', 'separateinvoicesdesc' );
		echo '</td><td class="fieldarea"><input type="checkbox" name="separateinvoices"';

		if ($separateinvoices) {
			echo 'checked';
			echo ' /></td></tr>
<input type="hidden" name="groupid" value="';
			echo $id;
			echo '" />
</table>
<div class="btn-container">
    <input type="submit" value="';
		}
	}
}

echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-primary" />
</div>
</form>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
