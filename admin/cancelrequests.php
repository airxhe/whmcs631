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
new dgeegejige( 'View Cancellation Requests' );
$aInt = ;
$aInt->title = $aInt->lang( 'clients', 'cancelrequests' );
$aInt->sidebar = 'clients';
$aInt->icon = 'cancelrequests';
$aInt->helplink = 'Cancellation Requests';
$whmcs->get_req_var( 'completed' );
$completed = ;

if ($action == 'delete') {
	check_token( 'WHMCS.admin.default' );
	delete_query( 'tblcancelrequests', array( 'id' => $id ) );
	redir(  );
	$aInt->deleteJSConfirm( 'doDelete', 'clients', 'cancelrequestsdelete', '?action=delete&id=' );
	ob_start(  );
	echo $aInt->beginAdminTabs( array( $aInt->lang( 'global', 'searchfilter' ) ) );
	echo '
<form action="';
	echo $whmcs->getPhpSelf(  );
	echo '" method="get"><input type="hidden" name="filter" value="true">

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%" class="fieldlabel">';
	echo $aInt->lang( 'fields', 'reason' );
	echo '</td><td class="fieldarea"><input type="text" name="reason" class="form-control input-300" value="';
	echo $reason;
	echo '" /></td><td width="15%" class="fieldlabel">';
	echo $aInt->lang( 'fields', 'client' );
	echo '</td><td class="fieldarea">';
	echo $aInt->clientsDropDown( $userid, false, 'userid', true );
	echo '</td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'domain' );
	echo '</td><td class="fieldarea"><input type="text" name="domain" class="form-control input-300" value="';
	echo $domain;
	echo '" /></td><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'type' );
	echo '</td><td class="fieldarea"><select name="type" class="form-control select-inline"><option value="">';
	echo $aInt->lang( 'global', 'any' );
	echo '</option><option value="Immediate"';

	if ($type == 'Immediate') {
		echo ' selected';
		echo '>';
		echo $aInt->lang( 'clients', 'cancelrequestimmediate' );
		echo '</option><option value="End of Billing Period"';

		if ($type == 'End of Billing Period') {
			echo ' selected';
			echo '>';
			echo $aInt->lang( 'clients', 'cancelrequestendofperiod' );
			echo '</option></select></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'mergefields', 'serviceid' );
			echo '</td><td class="fieldarea"><input type="text" name="serviceid" class="form-control input-100" value="';
			echo $serviceid;
			echo '" /></td><td class="fieldlabel">&nbsp;</td><td class="fieldarea">&nbsp;</td></tr>
</table>

<div class="btn-container">
    <input type="submit" value="Filter" class="btn btn-default" />
</div>

</form>

';
			echo $aInt->endAdminTabs(  );
			echo '
<p>
    <div class="btn-group" role="group">
        <a href="';
			echo $_SERVER['PHP_SELF'];
			echo '" class="btn btn-default';

			if (!$completed) {
				echo ' active';
				echo '">';
				echo $aInt->lang( 'clients', 'cancelrequestsopen' );
				echo '</a>
        <a href="';
				echo $_SERVER['PHP_SELF'];
				echo '?completed=true" class="btn btn-default';

				if ($completed) {
					echo ' active';
					echo '">';
					echo $aInt->lang( 'clients', 'cancelrequestscompleted' );
					echo '</a>
    </div>
</p>

';
					$aInt->sortableTableInit( 'date', 'ASC' );
					$query = 'FROM tblcancelrequests INNER JOIN tblhosting ON tblhosting.id=tblcancelrequests.relid INNER JOIN tblproducts ON tblproducts.id=tblhosting.packageid INNER JOIN tblproductgroups ON tblproductgroups.id=tblproducts.gid INNER JOIN tblclients ON tblhosting.userid=tblclients.id WHERE ';
					$filter = false;
					$criteria = array(  );

					if ($reason) {
						$criteria[] = 'tblcancelrequests.reason LIKE \'%' . db_escape_string( $reason ) . '%\'';
						$filter = true;

						if ($domain) {
							$criteria[] = 'tblhosting.domain LIKE \'%' . db_escape_string( $domain ) . '%\'';
							$filter = true;

							if ($userid) {
								$criteria[] = 'tblhosting.userid=' . (int)$userid;
							}
						}
					}

					$filter = true;

					if ($serviceid) {
						$criteria[] = 'tblcancelrequests.relid=' . (int)$serviceid;
						$filter = true;

						if ($type) {
							$criteria[] = 'tblcancelrequests.type=\'' . db_escape_string( $type ) . '\'';
							$filter = true;
						}
					}
				}
			}
		}
	}


	if (!$filter) {
		if ($completed) {
			$criteria[] = '(tblhosting.domainstatus=\'Cancelled\' OR tblhosting.domainstatus=\'Terminated\') ';
		}
	}


	while (true) {
	}

	$aInt->sortableTable;
}

echo ( array( $aInt->lang( 'fields', 'date' ), $aInt->lang( 'fields', 'product' ), $aInt->lang( 'fields', 'reason' ), $aInt->lang( 'fields', 'type' ), '' ), $tabledata );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
