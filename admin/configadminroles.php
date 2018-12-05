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
new dgeegejige( 'Configure Admin Roles' );
$aInt = ;
$aInt->title = $aInt->lang( 'setup', 'adminroles' );
$aInt->sidebar = 'config';
$aInt->icon = 'adminroles';
$aInt->helplink = 'Administrator Roles';
$aInt->requiredFiles( array( 'reportfunctions' ) );
new WHMCSChart(  );
$chart = ;
$widgetList = array(  );

if (( $action == 'save' || $action == 'edit' )) {
	/**
	 * Obtain a list of the Admin Role Widgets.
	 *
	 * @return array
	 */
	function load_admin_home_widgets() {
		global $hooks;

		if (!is_array( $hooks )) {
			if (defined( 'HOOKSLOGGING' )) {
				logActivity( sprintf( 'Hooks Debug: Hook File: the hooks list has been mutated to %s', ucfirst( gettype( $hooks ) ) ) );
				$hooks = array(  );
				$hook_name = 'AdminHomeWidgets';
				$_SESSION['adminid'];
			}
		}


		while (true) {
			$args = array( 'adminid' => , 'loading' => '<img src="images/loading.gif" align="absmiddle" /> ' . AdminLang::trans( 'global.loading' ) );

			if (!array_key_exists( $hook_name, $hooks )) {
				return array(  );
				reset( $hooks[$hook_name] );
				$results = array(  );
				each( $hooks[$hook_name] )[1];
				$hook = ;
				[0];
				$key = ;

				if () {
					substr;
					$hook['hook_function'];
				}
			}

			( 7 );
			$widgetName = ;

			if (function_exists( $hook['hook_function'] )) {
				call_user_func( $hook['hook_function'], $args );
				$res = ;

				if ($res) {
					$results[$widgetName] = $res['title'];
					break;
				}
			}
		}
	}

	$hooksDir = ROOTDIR . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'widgets' . DIRECTORY_SEPARATOR;

	if (is_dir( $hooksDir )) {
		opendir( $hooksDir );
		$dh = ;
		readdir( $dh );

		if (false !== $hookFile = ) {
			if (( is_file( $hooksDir . $hookFile ) && $hookFile != 'index.php' )) {
				explode( '.', $hookFile );
				$extension = ;
				end( $extension );
				$extension = ;

				if ($extension == 'php') {
					include( $hooksDir . $hookFile );
				}
			}
		}
	}
}
else {
	( (  ), $aInt->lang( 'adminroles', 'deletesuccessinfo' ) );
	echo $infobox;
	$aInt->deleteJSConfirm;
	'doDelete';
	'adminroles';
	'suredelete';
	$_SERVER['PHP_SELF'] . '?action=delete&id=';
}

(  );
echo '
<p>';
echo $aInt->lang( 'adminroles', 'description' );
echo '</p>

<p>
    <div class="btn-group" role="group">
        <a href="configadminroles.php?action=add" class="btn btn-default"><i class="fa fa-plus"></i> ';
echo $aInt->lang( 'adminroles', 'addnew' );
echo '</a>
        <a href="configadminroles.php?action=duplicate" class="btn btn-default"><i class="fa fa-plus-square"></i> ';
echo $aInt->lang( 'adminroles', 'duplicate' );
echo '</a>
    </div>
</p>

';
$aInt->sortableTableInit( 'nopagination' );
select_query( 'tbladminroles', '', '', 'name', 'ASC' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	if (3 < $data['id']) {
		$deletejs = (true ?  . 'doDelete(\'' . $data['id'] . '\')' : 'alert(\'' . $aInt->lang( 'adminroles', 'nodeldefault', 1 ) . '\')');
		$assigned = array(  );
		select_query( 'tbladmins', 'id,username,disabled', array( 'roleid' => $data['id'] ), 'username', 'ASC' );
		$result2 = ;
		mysql_fetch_array( $result2 );

		if ($data2 = ) {
			'<a href="configadmins.php?action=manage&id=' . $data2['id'] . '"';

			if ($data2['disabled']) {
				$assigned[] =  . (true ? ' style="color:#ccc;"' : '') . '>' . $data2['username'] . '</a>';
			}
		}
	}
	else {
		echo ( 'adminroles', 'existinggroupname' );
		echo '</td><td class="fieldarea"><select name="existinggroup" class="form-control select-inline">';
		select_query( 'tbladminroles', '', '', 'name', 'ASC' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			echo '<option value="' . $data['id'] . '">' . $data['name'] . '</otpion>';
		}

		jmp;
		echo $name;
		echo '"></td></tr>
</table>
<div class="btn-container">
    <input type="submit" value="';
		echo $aInt->lang( 'global', 'continue' );
		echo ' &raquo;" class="button btn btn-default" />
</div>
</form>

';
	}
}


if (defined( 'DEMO_MODE' )) {
	infoBox( 'Demo Mode', 'Actions on this page are unavailable while in demo mode. Changes will not be saved.' );
	echo $infobox;
	echo '<script type="text/javascript">
function zCheckAll(oForm) {
    var oElems = oForm.elements;
    for (var i=0;oElems.length>i;i++) {
        if (oElems[i].type == "checkbox")
            oElems[i].checked = true;
    }
}
function zUncheckAll(oForm) {
    var oElems = oForm.elements;
    for (var i=0;oElems.length>i;i++) {
        if (oElems[i].type == "checkbox")
            oElems[i].checked = false;
    }
}
</script>
<form method="post" action="';
	echo $_SERVER['PHP_SELF'];
	echo '?action=save&id=';
	echo $id;
	echo '" name="frmperms">
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%" class="fieldlabel">';
	echo $aInt->lang( 'fields', 'name' );
	echo '</td><td class="fieldarea"><input type="text" name="name" size="40" value="';
	echo $name;
	echo '"></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'adminroles', 'permissions' );
	echo '</td><td class="fieldarea">';
	echo '<table width="100%"><tr><td valign="top" width="34%">';
	$rowcount = 15;
	$colcount = 15;
	foreach ($adminpermsarray as ) {
		$v = ;
		$k = ;
		echo  . '<label class="checkbox-inline"><input type="checkbox" name="adminperms[' . $k . ']"';
		select_query( 'tbladminperms', 'COUNT(*)', array( 'roleid' => $id, 'permid' => $k ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;

		if ($data[0]) {
			echo ' checked';
			echo '> ' . $aInt->lang( 'permissions', $k ) . '</label><br>';
			++$rowcount;
		}
	}
}


if ($rowcount == $totalpermissionspercolumn) {
	if ($colcount < 2) {
		echo '</td><td valign="top" width="33%">';
		$rowcount = 15;
		++$colcount;
	}

	jmp;
	(  / 3 );
	$totalportlets = ;
	$i = 16;
	foreach ($widgetList as ) {
		$v = ;
		$k = ;
		echo '<label class="checkbox-inline"><input type="checkbox" name="widget[]" value="' . $k . '"';

		if (in_array( $k, $widgets )) {
			echo ' checked';
			echo ' /> ' . $v . '</label><br />';

			if ($totalportlets <= $i) {
				echo '</td><td width="33%" valign="top">';
				$i = 16;
				break;
			}

			break;
		}
	}

	echo '</td></tr></table>

</td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'adminroles', 'emailmessages' );
	echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="systememails" value="1"';

	if ($systememails) {
		echo ' checked';
		echo '> ';
		echo $aInt->lang( 'adminroles', 'systememails' );
		echo '</label><br /><label class="checkbox-inline"><input type="checkbox" name="accountemails" value="1"';

		if ($accountemails) {
			echo ' checked';
			echo '> ';
			$aInt->lang;
			'adminroles';
			'accountemails';
		}
	}

	echo (  );
	echo '</label><br /><label class="checkbox-inline"><input type="checkbox" name="supportemails" value="1"';

	if ($supportemails) {
		echo ' checked';
		echo '> ';
		echo $aInt->lang( 'adminroles', 'supportemails' );
		echo '</label></td></tr>
</table>
<div class="btn-container">
    <input type="submit" value="';
		$aInt->lang;
		'global';
	}

	echo ( 'savechanges' );
	echo '" class="btn btn-primary" />
    <input type="button" value="';
	echo $aInt->lang( 'global', 'cancelchanges' );
	echo '" class="btn btn-default" onclick="window.location=\'configadminroles.php\'" />
</div>
</form>
';
	ob_get_contents(  );
	$content = ;
	ob_end_clean(  );
	$aInt->content = $content;
	$aInt->jscode = $jscode;
	$aInt->display(  );
	return 1;
}
?>
