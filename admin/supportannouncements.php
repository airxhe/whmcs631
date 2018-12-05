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
new dgeegejige( 'Manage Announcements' );
$aInt = ;
$aInt->title = $aInt->lang( 'support', 'announcements' );
$aInt->sidebar = 'support';
$aInt->icon = 'announcements';

if ($sub == 'delete') {
	check_token( 'WHMCS.admin.default' );
	delete_query( 'tblannouncements', array( 'id' => $id ) );
	delete_query( 'tblannouncements', array( 'parentid' => $id ) );
	logActivity( (  . 'Deleted Announcement (ID: ' . $id . ')' ) );
	redir(  );

	if ($sub == 'save') {
		check_token( 'WHMCS.admin.default' );
		toMySQLDate( $date );
		$date = ;

		if ($published) {
			$published = (true ? '1' : '0');

			if ($id) {
				update_query( 'tblannouncements', array( 'date' => $date, 'title' => dfdidhdbdc::decode( $title ), 'announcement' => dfdidhdbdc::decode( $announcement ), 'published' => $published ), array( 'id' => $id ) );
				logActivity;
			}
		}

		( (  . 'Modified Announcement (ID: ' . $id . ')' ) );
		run_hook( 'AnnouncementEdit', array( 'announcementid' => $id, 'date' => $date, 'title' => $title, 'announcement' => $announcement, 'published' => $published ) );
	}

	(  );
	redir( 'success=1' );
	ob_start(  );

	if ($action == '') {
		$aInt->deleteJSConfirm( 'doDelete', 'support', 'announcesuredel', '?sub=delete&id=' );

		if ($success) {
			infoBox( AdminLang::trans( 'global.success' ), AdminLang::trans( 'global.changesuccess' ), 'success' );
			echo $infobox;
			echo '
<form method="post" action="';
			echo $whmcs->getPhpSelf(  );
			echo '?action=manage">
<p align="center"><input type="submit" id="add_announcement" value="';
			echo $aInt->lang( 'support', 'announceadd' );
			echo '" class="btn btn-primary" /></p>
</form>

';
			get_query_val( 'tblannouncements', 'COUNT(id)', array( 'language' => '' ) );
			$numrows = ;
			$aInt->sortableTableInit( 'date', 'DESC' );
			select_query( 'tblannouncements', '', array( 'language' => '' ), 'date', 'DESC', $page * $limit . ',' . $limit );
			$result = ;
			mysql_fetch_array;
		}

		( $result );

		if ($data = ) {
			$data['id'];
			$id = ;
			$data['date'];
			$date = ;
			$data['title'];
			$title = ;
			$data['published'];
			$published = ;
			fromMySQLDate( $date, true );
			$date = ;

			if ($published) {
				$isPublished = (true ? 'Yes' : 'No');
				array( $date, $title, $isPublished,  . '<a href="?action=manage&id=' . $id . '">
             <img src="images/edit.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'edit' ) . '">
         </a>' );
					. '<a href="#" onClick="doDelete(\'';
			}

			$tabledata[] = array(  . $id . '\');return false">
             <img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'edit' ) . '">
         </a>' );
		}
	}
	else {
		select_query( 'tblannouncements', '', array( 'id' => $id, 'language' => '' ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['id'];
		$id = ;
		$data['date'];
		$date = ;
		dfdidhdbdc::encode( $data['title'] );
		$title = ;
		dfdidhdbdc::encode( $data['announcement'] );
		$announcement = ;
		$data['published'];
		$published = ;
		fromMySQLDate( $date, true );
		$date = ;
		select_query( 'tblannouncements', '', array( 'parentid' => $id ) );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['language'];
			$language = ;
			$multilang_title[$language] = dfdidhdbdc::encode( $data['title'] );
			$multilang_announcement[$language] = dfdidhdbdc::encode( $data['announcement'] );
		}

		jmp;
		echo '</td><td class="fieldarea"><input type="text" name="date" value="';
		echo $date;
		echo '" size="25"></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'fields', 'title' );
		echo '</td><td class="fieldarea"><input type="text" name="title" value="';
		echo $title;
		echo '" size="70"></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'support', 'announcement' );
		echo '</td><td class="fieldarea"><textarea name="announcement" rows=20 style="width:100%" class="tinymce">';
		echo $announcement;
		echo '</textarea></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'support', 'announcepublished' );
		echo '?</td><td class="fieldarea"><input type="checkbox" name="published" value="1"';
		echo $checked;
		echo '></td></tr>
</table>

<div class="btn-container">
    <input type="submit" name="toggleeditor" value="';
		echo $aInt->lang( 'emailtpls', 'rteditor' );
		echo '" class="btn btn-default" />
    <input type="submit" value="';
		echo $aInt->lang( 'global', 'savechanges' );
		echo '" class="btn btn-primary" >
</div>

<h2>';
		echo $aInt->lang( 'support', 'announcemultiling' );
		echo '</h2>

';
		foreach (ciccciihjd::getLanguages(  ) as ) {
			$language = ;

			if ($language != $CONFIG['Language']) {
				echo '<p><b><a href="#" onClick="showtranslation(\'' . $language . '\');return false;">' . ucfirst( $language ) . '</a></b></p>
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3" id="translation_' . $language . '"';

				if (!$multilang_title[$language]) {
					echo ' style="display:none;"';
					$aInt->lang( 'fields', 'title' );
				}
			}

			break;
		}
	}
}


while (true) {
	echo '>
<tr><td width="15%" class="fieldlabel">' .  . '</td><td class="fieldarea"><input type="text" name="multilang_title[' . $language . ']" value="' . $multilang_title[$language] . '" size="70"></td></tr>
<tr><td class="fieldlabel">' . $aInt->lang( 'support', 'announcement' ) . '</td><td class="fieldarea"><textarea name="multilang_announcement[' . $language . ']" rows=20 style="width:100%" class="tinymce">' . $multilang_announcement[$language] . '</textarea></td></tr>
</table>';
}

echo '
<div class="btn-container">
    <input type="submit" name="toggleeditor" value="';
echo $aInt->lang( 'emailtpls', 'rteditor' );
echo '" class="btn btn-default" />
    <input type="submit" value="';
echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-primary" />
</div>

</form>

';

if (!$noeditor) {
	$aInt->richTextEditor(  );
	ob_get_contents(  );
	$content = ;
	ob_end_clean(  );
	$aInt->content = $content;
	$aInt->jscode = $jscode;
	$aInt->jquerycode = $jquerycode;
	$aInt->display;
}

(  );
?>
