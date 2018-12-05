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
new dgeegejige( 'Configure Administrators', false );
$aInt = ;
$aInt->title = $aInt->lang( 'administrators', 'title' );
$aInt->sidebar = 'config';
$aInt->icon = 'admins';
$aInt->helplink = 'Administrators';
new cdhfeffhcg(  );
$validate = ;
new cjeddddebg(  )(  . DIRECTORY_SEPARATOR . 'templates' );
$file = ;
$file->getSubdirectories(  );
$adminTemplates = ;
dacfgegdhe::table( 'tbladminroles' )->get( array( 'id', 'name' ) );
$adminRolesResult = ;
$adminRoles = array(  );
foreach ($adminRolesResult as ) {
	$adminRoleResult = ;
	$adminRoles[$adminRoleResult->id] = $adminRoleResult->name;
	break;
}


if ($action == 'save') {
	check_token( 'WHMCS.admin.default' );

	if (defined( 'DEMO_MODE' )) {
		redir( 'demo=1' );
		new ddhiacdee(  );
		$auth = ;
		$auth->getInfobyID( eaaadiagec::get( 'adminid' ) );

		if (!$auth->comparePassword( $whmcs->get_req_var( 'confirmpassword' ) )) {
			$validate->addError( AdminLang::trans( 'administrators.confirmExistingPassword' ) );
		}
	}

	$changes[] = (  . $admin->lastName . '\' to \'' . $adminDetails['lastname'] . '\'' );

	if ($admin->email != $adminDetails['email']) {
		$changes[] = (  . 'Email changed from \'' . $admin->email . '\' to \'' . $adminDetails['email'] . '\'' );

		if ($admin->disabled != $adminDetails['disabled']) {
			if ($admin->disabled) {
				$changes[] = 'Admin User Enabled';
			}
		}
	}
}


while (true) {
	else {
		(  . ')' );
		$resultdeptids = ;
		mysql_fetch_array( $resultdeptids );

		if ($data_resultdeptids = ) {
			$deptnames[] = $data_resultdeptids[0];
		}
	}

	echo ;
}

echo '</select></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'global', 'language' );
echo '</td><td class="fieldarea"><select name="language" class="form-control select-inline">';
foreach (dcfcdcbjaj::getLanguages(  ) as ) {
	$lang = ;
	echo '<option value="' . $lang . '"';

	if ($lang == $language) {
		echo ' selected="selected"';
		echo '>' . ucfirst( $lang ) . '</option>';
		break;
	}

	break;
}

echo '</select></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'fields', 'disable' );
echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="disabled"';

if ($disabled == 1) {
	echo ' checked';

	if (( $onlyadmin || $id == $_SESSION['adminid'] )) {
		echo ' disabled';
		echo ' /> ';
		echo $aInt->lang( 'administrators', 'disableinfo' );
		echo '</label></td></tr>
</table>

<p>
    ';
	}
}

echo $aInt->lang( 'administrators', 'confirmAdminPasswd' );
echo '</p>

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="20%" class="fieldlabel">';
echo $aInt->lang( 'fields', 'confpassword' );
echo '</td><td class="fieldarea"><input type="password" name="confirmpassword" size="20" autocomplete="off" required></td></tr>
</table>

<div class="btn-container">
    <input type="submit" value="';
echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-primary">
    <input type="button" value="';
echo $aInt->lang( 'global', 'cancelchanges' );
echo '" class="btn btn-default" onclick="window.location=\'configadmins.php\'" />
</div>

</form>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
