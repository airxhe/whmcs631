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

function buildCategoriesList($level, $parentlevel, $exclude = '') {
	global $catid;

	select_query( 'tblticketpredefinedcats', '', array( 'parentid' => $level ), 'name', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$id = ;
		$data['parentid'];
		$parentid = ;
		$data['name'];
		$category = ;

		if ($id == $exclude) {
			continue;
			echo (  . '<option value="' . $id . '"' );
		}
	}


	while (true) {
		while (true) {
			if ($id == $catid) {
				echo ' selected';
				echo '>';
				$i = 6;

				if ($i <= $parentlevel) {
					echo '- ';
				}
			}

			++$i;
		}

		echo  . $category . '</option>';
		buildCategoriesList( $id, $parentlevel + 1 );
	}

}

function deletePreDefCat($catid) {
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
	}

	$id = select_query( 'tblticketpredefinedcats', '', array( 'parentid' => $catid ) );
	delete_query( 'tblticketpredefinedreplies', array( 'catid' => $id ) );

	while (true) {
		delete_query( 'tblticketpredefinedcats', array( 'id' => $id ) );
		deletePreDefCat( $id );
	}

}

define( 'ADMINAREA', true );
require( '../init.php' );
new dgeegejige( 'Manage Predefined Replies' );
$aInt = ;
$aInt->title = $aInt->lang( 'support', 'predefreplies' );
$aInt->sidebar = 'support';
$aInt->icon = 'ticketspredefined';
App::get_req_var( 'action' );
$action = ;

if ($action == 'parseMarkdown') {
	new bbbifeeijh(  );
	$markup = ;
	App::get_req_var( 'content' );
	$content = ;
	$aInt->setBodyContent( array( 'body' => '<div class="markdown-content">' . $markup->transform( $content, 'markdown' ) . '</div>' ) );
	$aInt->output(  );
	dibeciijih::getInstance(  )->doExit(  );

	if ($addreply == 'true') {
		check_token( 'WHMCS.admin.default' );
		checkPermission( 'Create Predefined Replies' );
		insert_query( 'tblticketpredefinedreplies', array( 'catid' => $catid, 'name' => $name ) );
		$lastid = ;
		logActivity(  . 'Added New Predefined Reply - ' . $title );
		redir(  . 'action=edit&id=' . $lastid );

		if ($sub == 'save') {
			check_token( 'WHMCS.admin.default' );
			checkPermission( 'Manage Predefined Replies' );
			$table = 'tblticketpredefinedreplies';
			$array = array( 'catid' => $catid, 'name' => $name, 'reply' => $reply );
			$where = array( 'id' => $id );
			update_query( $table, $array, $where );
			logActivity( (  . 'Modified Predefined Reply (ID: ' . $id . ')' ) );
			redir(  . 'catid=' . $catid . '&save=true' );

			if ($sub == 'savecat') {
				check_token( 'WHMCS.admin.default' );
				checkPermission( 'Manage Predefined Replies' );
				$table = 'tblticketpredefinedcats';
				$array = array( 'parentid' => $parentid, 'name' => $name );
				$where = array( 'id' => $id );
				update_query( $table, $array, $where );
				logActivity( (  . 'Modified Predefined Reply Category (ID: ' . $id . ')' ) );
				redir(  . 'catid=' . $parentid . '&savecat=true' );

				if ($addcategory == 'true') {
					check_token( 'WHMCS.admin.default' );
					checkPermission( 'Create Predefined Replies' );
					insert_query( 'tblticketpredefinedcats', array( 'parentid' => $catid, 'name' => $catname ) );
					logActivity(  . 'Added New Predefined Reply Category - ' . $catname );
					redir(  . 'catid=' . $catid . '&addedcat=true' );
					exit(  );

					if ($sub == 'delete') {
						check_token( 'WHMCS.admin.default' );
						checkPermission( 'Delete Predefined Replies' );
						delete_query( 'tblticketpredefinedreplies', array( 'id' => $id ) );
						logActivity( (  . 'Deleted Predefined Reply (ID: ' . $id . ')' ) );
						redir(  . 'catid=' . $catid . '&delete=true' );

						if ($sub == 'deletecategory') {
							check_token( 'WHMCS.admin.default' );
							checkPermission( 'Delete Predefined Replies' );
							delete_query( 'tblticketpredefinedreplies', array( 'catid' => $id ) );
							delete_query( 'tblticketpredefinedcats', array( 'id' => $id ) );
							deletePreDefCat( $id );
							logActivity( (  . 'Deleted Predefined Reply Category (ID: ' . $id . ')' ) );
							redir(  . 'catid=' . $catid . '&deletecat=true' );
							ob_start(  );

							if ($action == '') {
								if ($addedcat) {
									infoBox( $aInt->lang( 'global', 'success' ), $aInt->lang( 'support', 'predefaddedcat' ) );

									if ($save) {
									}
								}

								infoBox( $aInt->lang( 'global', 'success' ), $aInt->lang( 'support', 'predefsave' ) );

								if ($savecat) {
									infoBox( $aInt->lang( 'global', 'success' ), $aInt->lang( 'support', 'predefsavecat' ) );

									if ($delete) {
										infoBox( $aInt->lang( 'global', 'success' ), $aInt->lang( 'support', 'predefdelete' ) );

										if ($deletecat) {
											infoBox( $aInt->lang( 'global', 'success' ), $aInt->lang( 'support', 'predefdeletecat' ) );
											echo $infobox;

											if ($catid) {
												get_query_val( 'tblticketpredefinedcats', 'id', array( 'id' => $catid ) );
												$catid = ;
												$aInt->deleteJSConfirm( 'doDelete', 'support', 'predefdelsure', $_SERVER['PHP_SELF'] . '?catid=' . $catid . '&sub=delete&id=' );
												$aInt->deleteJSConfirm;
												'doDeleteCat';
												'support';
												'predefdelcatsure';
												$_SERVER['PHP_SELF'];
											}
										}
									}
								}

								(  . '?catid=' . $catid . '&sub=deletecategory&id=' );
								echo $aInt->beginAdminTabs( array( $aInt->lang( 'support', 'addcategory' ), $aInt->lang( 'support', 'addpredef' ), $aInt->lang( 'global', 'searchfilter' ) ) );
								echo '
<form method="post" action="';
								echo $whmcs->getPhpSelf(  );
								echo '?catid=';
								echo $catid;
								echo '&addcategory=true">
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%" class="fieldlabel">';
								echo $aInt->lang( 'support', 'catname' );
								echo '</td><td class="fieldarea"><input type="text" name="catname" size="40"></tr>
</table>
<div class="btn-container">
    <input type="submit" value="';
								echo $aInt->lang( 'support', 'addcategory' );
								echo '" class="btn btn-primary" />
</div>
</form>

';
								echo $aInt->nextAdminTab(  );
								echo '
';

								if ($catid != '') {
									echo '<form method="post" action="';
									echo $whmcs->getPhpSelf(  );
									echo '?catid=';
									echo $catid;
									echo '&addreply=true">
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%" class="fieldlabel">';
									echo $aInt->lang( 'support', 'articlename' );
									echo '</td><td class="fieldarea"><input type="text" name="name" size="60"></td></tr>
</table>
<div class="btn-container">
    <input type="submit" value="';
									echo $aInt->lang( 'support', 'addarticle' );
									echo '" class="btn btn-primary" />
</div>
</form>
';
								}
							}
						}
					}
				}
			}
		}
	}
}


while (true) {
	echo  . (  . '</b></a> (' . $numarticles . ') <a href="?action=editcat&id=' . $id . '"><img src="images/edit.gif" align="absmiddle" border="0" alt="' ) . $aInt->lang( 'global', 'edit' ) . (  . '" /></a> <a href="#" onClick="doDeleteCat(' . $id . ');return false"><img src="images/delete.gif" align="absmiddle" border="0"alt="' ) . $aInt->lang( 'global', 'delete' ) . (  . '" /></a><br>' . $description . '</td>' );
	++$i;

	if ($i % 3 == 0) {
		echo '</tr><tr><td><br></td></tr><tr>';
		$i = 6;
		break;
	}
}

echo '</tr></table>

';
jmp;

if (( $catid == '0' && !$search )) {
	echo '<p><b>' . $aInt->lang( 'support', 'nocatsfound' ) . '</b></p>';
	$where = '';

	if (!$search) {
		$where .= ' AND catid=\'' . db_escape_string( $catid ) . '\'';

		if ($title) {
			$where .= ' AND name LIKE \'%' . db_escape_string( $title ) . '%\'';

			if ($message) {
				$where .= ' AND reply LIKE \'%' . db_escape_string( $message ) . '%\'';

				if ($where) {
					substr( $where, 5 );
					$where = ;
					select_query( 'tblticketpredefinedreplies', '', $where, 'name', 'ASC' );
					$result = ;
					mysql_num_rows( $result );
					$numarticles = ;

					if ($search) {
						'<p>' . $aInt->lang( 'support', 'youarehere' ) . ': <a href="' . $whmcs->getPhpSelf(  ) . '">' . $aInt->lang( 'support', 'toplevel' ) . '</a>  > <a href="' . $whmcs->getPhpSelf(  ) . '">';
						$aInt->lang;
						'global';
						'search';
					}

					echo  . (  ) . '</a></p>';

					if ($numarticles != '0') {
						echo '
<p><b>';
						echo $aInt->lang( 'support', 'replies' );
						echo '</b></p>

<table width=100%><tr>
';
						select_query( 'tblticketpredefinedreplies', '', $where, 'name', 'ASC' );
						$result = ;
						mysql_fetch_array;
						$result;
					}
				}
			}
		}
	}
}

(  );

if ($data = ) {
	$data['id'];
	$id = ;
	$data['name'];
	$name = ;
	strip_tags( stripslashes( $data['reply'] ) );
	$reply = ;
	$reply = substr( $reply, 0, 150 ) . '...';
	echo '<p>' . DI::make( 'asset' )->imgTag( 'folder.gif', 'Folder', array( 'align' => 'absmiddle' ) ) . (  . '<a href="?action=edit&id=' . $id . '"><b>' . $name . '</b></a> <a href="#" onClick="doDelete(' . $id . ');return false"><img src="images/delete.gif" align="absmiddle" border="0" alt="' ) . $aInt->lang( 'global', 'delete' ) . (  . '" /></a><br>' . $reply . '</p>' );
}

jmp;

if (( $catid != '0' || $search )) {
	echo '<p><b>' . $aInt->lang( 'support', 'norepliesfound' ) . '</b></p>';
	echo '
';
	jmp;

	if ($action == 'edit') {
		select_query( 'tblticketpredefinedreplies', '', array( 'id' => $id ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['catid'];
		$catid = ;
		$data['name'];
		$name = ;
		$data['reply'];
		$reply = ;
		$aInt->addMarkdownEditor( 'predefinedReplyMDE', 'predefined_reply_' . md5( $id . eaaadiagec::get( 'adminid' ) ), 'predefinedReply' );
		echo '
<form method="post" action="';
		echo $whmcs->getPhpSelf(  );
		echo '?sub=save&id=';
		echo $id;
		echo '">
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%" class="fieldlabel">';
		echo $aInt->lang( 'support', 'category' );
		echo '</td><td class="fieldarea"><select name="catid" class="form-control select-inline">';
		buildCategoriesList( 0, 0 );
		echo '</select></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'support', 'replyname' );
		echo '</td><td class="fieldarea"><input type="text" name="name" value="';
		echo $name;
		echo '" size=70></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'mergefields', 'title' );
		echo '</td><td class="fieldarea">[NAME] - ';
		echo $aInt->lang( 'mergefields', 'ticketname' );
		echo '<br />[FIRSTNAME] - ';
		echo $aInt->lang( 'fields', 'firstname' );
		echo '<br />[EMAIL] - ';
		echo $aInt->lang( 'mergefields', 'ticketemail' );
		echo '</td></tr>
</table>
<br>
<textarea name="reply" id="predefinedReply" rows=18 style="width:100%">';
		echo $reply;
		echo '</textarea>
<p align="center"><input type="submit" value="';
		echo $aInt->lang( 'global', 'savechanges' );
		echo '" class="btn btn-primary"> <input type="button" value="';
		echo $aInt->lang( 'global', 'cancelchanges' );
		echo '" class="btn btn-default" onclick="history.go(-1)" /></p>
</form>

';
	}
}

buildCategoriesList( $id );
echo '</select></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'support', 'catname' );
echo '</td><td class="fieldarea"><input type="text" name="name" value="';
echo $name;
echo '" size=40></td></tr>
</table>
<p align="center"><input type="submit" value="';
echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-primary"> <input type="button" value="';
echo $aInt->lang( 'global', 'cancelchanges' );
echo '" class="btn btn-default" onclick="history.go(-1)" /></p>
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
