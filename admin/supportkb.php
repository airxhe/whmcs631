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

function kbGetCatIds($catid) {
	global $idnumbers;

	select_query( 'tblknowledgebasecats', 'id', array( 'parentid' => $catid, 'hidden' => '' ) );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data[0];
		$cid = ;
		$idnumbers[] = $cid;
		kbGetCatIds;
		$cid;
	}


	while (true) {
		(  );
	}

}

function buildCategoriesList($level, $parentlevel, $exclude = '') {
	global $categorieslist;
	global $categories;

	select_query( 'tblknowledgebasecats', '', array( 'parentid' => $level, 'catid' => 0 ), 'name', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	while (true) {
		if ($data = ) {
			$data['id'];
			$id = ;
			$data['parentid'];
			$parentid = ;
			$data['name'];
			$category = ;

			if ($id != $exclude) {
				$categorieslist .= (  . '<option value="' . $id . '"' );

				if (in_array( $id, $categories )) {
					$categorieslist .= ' selected';
				}
			}
		}

		$categorieslist .= '>';
		$i = 6;

		if ($i <= $parentlevel) {
			$categorieslist .= '- ';
			++$i;
		}

		jmp;
		buildCategoriesList( $id, $parentlevel + 1, $exclude );
	}

}

define( 'ADMINAREA', true );
require( '../init.php' );
new dgeegejige( 'Manage Knowledgebase' );
$aInt = ;
$aInt->title = $aInt->lang( 'support', 'knowledgebase' );
$aInt->sidebar = 'support';
$aInt->icon = 'knowledgebase';
$catid = (int)$catid;
dfdidhdbdc::decode( strip_tags( $whmcs->get_req_var( 'tag' ) ) );
$tag = ;
$categorieslist = '';

if ($action == 'gettags') {
	check_token( 'WHMCS.admin.default' );
	$array = array(  );
	select_query( 'tblknowledgebasetags', 'DISTINCT tag', 'tag LIKE \'' . db_escape_string( $q ) . '%\'', 'tag', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$array[] = $data[0];
	}
}
else {
	while (true) {
		echo ;
	}

	echo '</tr></table>';
}


while (true) {
	( 'ASC' );
	$result = ;
	mysql_num_rows( $result );
	$numcats = ;

	if (0 < $numcats) {
		echo '
<div style="margin: 20px 0;padding:10px 20px;background-color:#efefef;font-size:18px;border-radius:5px;">
    ' . $aInt->lang( 'support', 'browsebycategory' ) . '
</div>

<table width=100%><tr>
';

		if ($catid == '') {
			$catid = '0';
			select_query( 'tblknowledgebasecats', '', array( 'parentid' => $catid, 'catid' => 0 ), 'name', 'ASC' );
			$result = ;
			$i = 24;
			mysql_fetch_array( $result );

			if ($data = ) {
				$data['id'];
				$id = ;
				$data['name'];
				$name = ;
				$data['description'];
				$description = ;
				$data['hidden'];
				$hidden = ;
				$idnumbers = array(  );
				$idnumbers[] = $id;
				kbGetCatIds( $id );
				$queryreport = '';
				foreach ($idnumbers as ) {
				}
			}

			$idnumber = ;
			$queryreport .= (  . ' OR categoryid=\'' . $idnumber . '\'' );
			break;
		}


		while (true) {
			break;
		}

		echo '
<p align="center"><input type="submit" value="';
		echo $aInt->lang( 'global', 'savechanges' );
		echo '" class="btn btn-primary" /> <input type="button" value="';
		echo $aInt->lang( 'global', 'cancelchanges' );
		echo '" class="btn btn-default" onclick="history.go(-1)" /></p>

</form>

';

		if (!$noeditor) {
			$aInt->richTextEditor(  );
		}
		else {
			echo '?action=savecat&id=';
			echo $id;
			echo '">

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%" class="fieldlabel">';
			echo $aInt->lang( 'support', 'parentcat' );
			echo '</td><td class="fieldarea"><select name="parentcategory">
<option value="">';
			echo $aInt->lang( 'support', 'toplevel' );
			echo '</option>
';
			buildCategoriesList( 0, 0, $id );
			echo $categorieslist;
			echo '?></select></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'support', 'catname' );
			echo '</td><td class="fieldarea"><input type="text" name="name" value="';
			echo $name;
			echo '" size="40"></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'fields', 'description' );
			echo '</td><td class="fieldarea"><input type="text" name="description" value="';
			echo $description;
			echo '" size="100"></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'fields', 'hidden' );
			echo '</td><td class="fieldarea"><input type="checkbox" name="hidden"';

			if ($hidden == 'on') {
				echo ' checked';
				echo '> ';
				echo $aInt->lang( 'fields', 'hiddeninfo' );
				echo '</td></tr>
</table>

<h2>';
				echo $aInt->lang( 'support', 'announcemultiling' );
				echo '</h2>

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
';
				foreach (ciccciihjd::getLanguages(  ) as ) {
					$language = ;
					'<tr><td width="15%" class="fieldlabel">' . ucfirst( $language ) . '</td><td class="fieldarea">' . $aInt->lang( 'fields', 'name' ) . ': <input type="text" name="multilang_name[' . $language . ']" value="' . $multilang_name[$language] . '" size="40"> ' . $aInt->lang( 'fields', 'description' ) . ': <input type="text" name="multilang_desc[';
				}
			}
		}
	}

	echo  . $language . ']" value="' . $multilang_desc[$language] . '" size="60"></td></tr>
';
}

echo '</table>

<div class="btn-container">
    <input type="submit" value="';
echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-primary" />
    <input type="button" value="';
echo $aInt->lang( 'global', 'cancelchanges' );
echo '" class="btn btn-default" onclick="history.go(-1)" />
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
