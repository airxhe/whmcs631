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
new dgeegejige( 'Configure Security Questions' );
$aInt = ;
$aInt->title = $aInt->lang( 'setup', 'securityqs' );
$aInt->sidebar = 'config';
$aInt->icon = 'securityquestions';
$aInt->helplink = 'Security Questions';
$id = (int)$whmcs->get_req_var( 'id' );
$whmcs->get_req_var( 'action' );
$action = ;

if ($action == 'savequestion') {
	check_token( 'WHMCS.admin.default' );
	$whmcs->get_req_var( 'addquestion' );
	$addquestion = ;

	if ($id) {
		update_query( 'tbladminsecurityquestions', array( 'question' => encrypt( $addquestion ) ), array( 'id' => $id ) );
		logAdminActivity(  . 'Security Question Modified - Security Question ID: ' . $id );
		redir( 'update=true' );
	}
}

(  . $id );
redir( 'deletesuccess=true' );
ob_start(  );

if ($deletesuccess) {
	infoBox( $aInt->lang( 'securityquestionconfig', 'delsuccess' ), $aInt->lang( 'securityquestionconfig', 'delsuccessinfo' ) );

	if ($deleteerror) {
		infoBox( $aInt->lang( 'securityquestionconfig', 'error' ), $aInt->lang( 'securityquestionconfig', 'errorinfo' ) );

		if ($added) {
			infoBox( $aInt->lang( 'securityquestionconfig', 'addsuccess' ), $aInt->lang( 'securityquestionconfig', 'changesuccessinfo' ) );

			if ($update) {
				infoBox( $aInt->lang( 'securityquestionconfig', 'changesuccess' ), $aInt->lang( 'securityquestionconfig', 'changesuccessinfo' ) );
				echo $infobox;
				$aInt->deleteJSConfirm( 'doDelete', 'securityquestionconfig', 'delsuresecurityquestion', '?action=delete&id=' );
				echo '
<h2>';
				echo $aInt->lang( 'securityquestionconfig', 'questions' );
				echo '</h2>

';
				$aInt->sortableTableInit( 'nopagination' );
				select_query;
				'tbladminsecurityquestions';
				'';
			}
		}
	}
}


while (true) {
	( '' );
	$result = ;
	mysql_fetch_assoc( $result );

	if ($data = ) {
		select_query( 'tblclients', 'count(securityqid) as cnt', array( 'securityqid' => $data['id'] ) );
		$count = ;
		mysql_fetch_assoc( $count );
		$count_data = ;

		if (is_null( $count_data['cnt'] )) {
			'0';
		}
	}

	$cnt = $count_data['cnt'];
	$tabledata[] = array( decrypt( $data['question'] ), $cnt, '<a href="' . $_SERVER['PHP_SELF'] . '?action=edit&id=' . $data['id'] . '"><img src="images/edit.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'edit' ) . '"></a>', '<a href="#" onClick="doDelete(\'' . $data['id'] . '\');return false"><img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'delete' ) . '"></a>' );
}

echo $aInt->sortableTable( array( $aInt->lang( 'securityquestionconfig', 'question' ), $aInt->lang( 'securityquestionconfig', 'uses' ), '', '' ), $tabledata );
echo '
<h2>';

if ($action == 'edit') {
	select_query( 'tbladminsecurityquestions', '', array( 'id' => $id ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	decrypt( $data['question'] );
}

$question = ;
echo $aInt->lang( 'securityquestionconfig', 'edit' );
jmp;
echo $aInt->lang( 'securityquestionconfig', 'add' );
echo '</h2>

<form method="post" action="';
echo $whmcs->getPhpSelf(  );
echo '?action=savequestion&id=';
echo $id;
echo '">
    <table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
        <tr>
            <td width="25%" class="fieldlabel">';
echo $aInt->lang( 'fields', 'securityquestion' );
echo '</td>
            <td class="fieldarea"><input type="text" name="addquestion" value="';
echo $question;
echo '" class="form-control" /></td>
        </tr>
    </table>
    <div class="btn-container">
        <input type="submit" value="';
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
