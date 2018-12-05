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
new dgeegejige( 'Configure Banned Emails' );
$aInt = ;
$aInt->title = $aInt->lang( 'bans', 'emailtitle' );
$aInt->sidebar = 'config';
$aInt->icon = 'configbans';
$aInt->helplink = 'Security/Ban Control';

if ($email) {
	check_token( 'WHMCS.admin.default' );
	insert_query( 'tblbannedemails', array( 'domain' => $email ) );
	logAdminActivity( (  . 'Banned Email Domain Added: \'' . $email . '\'' ) );
	redir( 'success=true' );

	if ($action == 'delete') {
		check_token( 'WHMCS.admin.default' );
		$id = (int)$whmcs->get_req_var( 'id' );
		dacfgegdhe::table( 'tblbannedemails' )->find( $id, array( 'domain' ) );
		$record = ;
		delete_query( 'tblbannedemails', array( 'id' => $id ) );
		logAdminActivity( (  . 'Banned Email Domain Removed: \'' . $record->domain . '\'' ) );
		redir( 'delete=true' );
		ob_start(  );

		if ($success) {
			infoBox( $aInt->lang( 'bans', 'emailaddsuccess' ), $aInt->lang( 'bans', 'emailaddsuccessinfo' ) );

			if ($delete) {
				infoBox;
			}
		}
	}

	( $aInt->lang( 'bans', 'emaildelsuccess' ), $aInt->lang( 'bans', 'emaildelsuccessinfo' ) );
	echo $infobox;
	$aInt->deleteJSConfirm( 'doDelete', 'bans', 'emaildelsure', '?action=delete&id=' );
	echo $aInt->beginAdminTabs( array( $aInt->lang( 'global', 'add' ) ), true );
	echo '
<form method="post" action="';
	echo $whmcs->getPhpSelf(  );
	echo '">

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%" class="fieldlabel">';
	echo $aInt->lang( 'fields', 'email' );
	echo '</td><td class="fieldarea"><input type="text" name="email" size="50"> (';
	echo $aInt->lang( 'bans', 'onlydomain' );
	echo ')</td></tr>
</table>

<div class="btn-container">
    <input type="submit" value="';
	echo $aInt->lang( 'bans', 'addbannedemail' );
	echo '" class="btn btn-primary" />
</div>

</form>

';
	echo $aInt->endAdminTabs(  );
	echo '
<br>

';
	$aInt->sortableTableInit( 'nopagination' );
	select_query( 'tblbannedemails', '', '', 'domain', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$id = ;
		$data['domain'];
		$domain = ;
		$data['count'];
		$count = ;
		array( $domain, $count );
	}

		. '<a href="#" onClick="doDelete(\'';
}


while (true) {
	$tabledata[] = array(  . $id . '\');return false"><img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'delete' ) . '"></a>' );
}

echo $aInt->sortableTable( array( $aInt->lang( 'bans', 'emaildomain' ), $aInt->lang( 'bans', 'usagecount' ), '' ), $tabledata );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
