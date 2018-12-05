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
new dgeegejige( 'Configure Spam Control' );
$aInt = ;
$aInt->title = $aInt->lang( 'stspamcontrol', 'stspamcontroltitle' );
$aInt->sidebar = 'config';
$aInt->icon = 'spamcontrol';
$aInt->helplink = 'Email Piping Spam Control';
$whmcs->get_req_var( 'action' );
$action = ;

if ($action == 'add') {
	check_token( 'WHMCS.admin.default' );
	$whmcs->get_req_var( 'type' );
	$type = ;
	$whmcs->get_req_var( 'spamvalue' );
	$spamvalue = ;
	logAdminActivity( 'Spam Control Record Created: Type: \'' . ucfirst( $type ) . (  . '\' - Content: \'' . $spamvalue . '\'' ) );
	insert_query( 'tblticketspamfilters', array( 'type' => $type, 'content' => $spamvalue ) );
	redir( 'added=1' );

	if ($action == 'delete') {
		check_token( 'WHMCS.admin.default' );
		$id = (int)$whmcs->get_req_var( 'id' );
		dacfgegdhe::table( 'tblticketspamfilters' )->find( $id );
		$spamFilter = ;
		logAdminActivity( 'Spam Control Record Deleted: Type: \'' . ucfirst( $spamFilter->type ) . (  . '\' - Content: \'' . $spamFilter->content . '\'' ) );
		delete_query( 'tblticketspamfilters', array( 'id' => $id ) );
		redir( 'deleted=1' );
		ob_start(  );
		$jscode = 'function doDelete(id,num) {
if (confirm("' . $aInt->lang( 'stspamcontrol', 'delsurespamcontrol', 1 ) . '")) {
window.location=\'' . $_SERVER['PHP_SELF'] . '?action=delete&id=\'+id+\'&tabnum=\'+num+\'' . generate_token( 'link' ) . '\';
}}';

		if ($added) {
			infoBox( $aInt->lang( 'stspamcontrol', 'spamcontrolupdatedtitle' ), $aInt->lang( 'stspamcontrol', 'spamcontrolupdatedadded' ) );

			if ($deleted) {
				infoBox( $aInt->lang( 'stspamcontrol', 'spamcontrolupdatedtitle' ), $aInt->lang( 'stspamcontrol', 'spamcontrolupdateddel' ) );
				echo $infobox;
				echo '
<form method="post" action="';
				echo $whmcs->getPhpSelf(  );
				echo '?action=add">
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="20%" class="fieldlabel"><b>';
				$aInt->lang;
				'global';
				'add';
			}
		}
	}

	echo (  );
	echo ':</b> ';
	echo $aInt->lang( 'stspamcontrol', 'typeval' );
	echo '</td><td class="fieldarea"><div class="col-sm-3"><select name="type" class="form-control"><option value="sender">';
	echo $aInt->lang( 'stspamcontrol', 'sender' );
	echo '</option><option value="subject">';
	echo $aInt->lang( 'stspamcontrol', 'subject' );
	echo '</option><option value="phrase">';
	echo $aInt->lang( 'stspamcontrol', 'phrase' );
	echo '</option></select></div><div class="col-sm-5"><input type="text" name="spamvalue" size="50" class="form-control" /></div><div class="col-sm-2"><input type="submit" value="';
	echo $aInt->lang( 'stspamcontrol', 'addnewsc' );
	echo '" class="btn btn-primary" /></div></td></tr>
</table>
</form>

<br>

';
	echo $aInt->beginAdminTabs( array( $aInt->lang( 'stspamcontrol', 'tab1' ), $aInt->lang( 'stspamcontrol', 'tab2' ), $aInt->lang( 'stspamcontrol', 'tab3' ) ), true );
	$nums = array( '0', '1', '2' );
	foreach ($nums as ) {
		$num = ;

		if ($num == 0) {
			$filtertype = 'sender';
		}

		$data[0];
		$numrows = ;
		$aInt->sortableTableInit( 'id', 'ASC' );
		$tabledata = '';
		select_query( 'tblticketspamfilters', '', array( 'type' => $filtertype ), 'content', 'ASC', $page * $limit . ( (  . ',' ) . $limit ) );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$id = ;
			$data['content'];
			$content = ;
			$tabledata[] = array( $content,  . '<a href="#" onClick="doDelete(\'' . $id . '\',\'' . $num . '\');return false"><img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'delete' ) . '"></a>' );
		}

		break;
	}

	echo $aInt->endAdminTabs(  );
}

ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
