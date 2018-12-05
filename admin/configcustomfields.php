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
new dgeegejige( 'Configure Custom Client Fields' );
$aInt = ;
$aInt->title = $aInt->lang( 'customfields', 'clienttitle' );
$aInt->sidebar = 'config';
$aInt->icon = 'customfields';
$aInt->helplink = 'Custom Fields';
$whmcs->get_req_var( 'action' );
$action = ;

if ($action == 'save') {
	check_token( 'WHMCS.admin.default' );
	$whmcs->get_req_var( 'addfieldname' );
	$addfieldname = ;
	$whmcs->get_req_var( 'fieldname' );
	$fieldname = ;

	if ($fieldname) {
		$fieldtype = (array)$whmcs->get_req_var( 'fieldtype' );
		$description = (array)$whmcs->get_req_var( 'description' );
		$fieldoptions = (array)$whmcs->get_req_var( 'fieldoptions' );
		$regexpr = (array)$whmcs->get_req_var( 'regexpr' );
		$adminonly = (array)$whmcs->get_req_var( 'adminonly' );
		$required = (array)$whmcs->get_req_var( 'required' );
		$showorder = (array)$whmcs->get_req_var( 'showorder' );
		$showinvoice = (array)$whmcs->get_req_var( 'showinvoice' );
		$sortorder = (array)$whmcs->get_req_var( 'sortorder' );
		foreach ($fieldname as ) {
			$value = ;
			$fid = ;
			update_query( 'tblcustomfields', array( 'fieldname' => $value, 'fieldtype' => $fieldtype[$fid], 'description' => $description[$fid], 'fieldoptions' => $fieldoptions[$fid], 'regexpr' => dfdidhdbdc::decode( $regexpr[$fid] ), 'adminonly' => $adminonly[$fid], 'required' => $required[$fid], 'showorder' => $showorder[$fid], 'showinvoice' => $showinvoice[$fid], 'sortorder' => $sortorder[$fid] ), array( 'id' => $fid ) );
			logAdminActivity(  . 'Client Custom Field Updated: \'' . $value . '\' - Custom Field ID: ' . $fid );
			break;
		}


		if ($addfieldname) {
			$whmcs->get_req_var( 'addfieldtype' );
			$addfieldtype = ;
			$whmcs->get_req_var( 'adddescription' );
			$adddescription = ;
			$whmcs->get_req_var( 'addfieldoptions' );
			$addfieldoptions = ;
			$whmcs->get_req_var( 'addregexpr' );
			$addregexpr = ;
			$whmcs->get_req_var( 'addadminonly' );
			$addadminonly = ;
			$whmcs->get_req_var( 'addrequired' );
			$addrequired = ;
			$whmcs->get_req_var( 'addshoworder' );
			$addshoworder = ;
			$whmcs->get_req_var( 'addshowinvoice' );
			$addshowinvoice = ;
			$whmcs->get_req_var( 'addsortorder' );
			$addsortorder = ;
			insert_query( 'tblcustomfields', array( 'type' => 'client', 'fieldname' => $addfieldname, 'fieldtype' => $addfieldtype, 'description' => $adddescription, 'fieldoptions' => $addfieldoptions, 'regexpr' => dfdidhdbdc::decode( $addregexpr ), 'adminonly' => $addadminonly, 'required' => $addrequired, 'showorder' => $addshoworder, 'showinvoice' => $addshowinvoice, 'sortorder' => $addsortorder ) );
			$id = ;

			if (chhgjaeced::getValue( 'EnableTranslations' )) {
				deihjiedfh::saveNewTranslations( $id, array( 'custom_field.{id}.name', 'custom_field.{id}.description' ) );
				logAdminActivity(  . 'Client Custom Field Created: \'' . $addfieldname . '\' - Custom Field ID: ' . $id );
				redir( 'success=true' );
			}
		}


		if (chhgjaeced::getValue( 'EnableTranslations' )) {
			deihjiedfh::whereIn( 'related_type', array( 'custom_field.{id}.name', 'custom_field.{id}.description' ) )->where( 'related_id', '=', 0 )->delete(  );
			$aInt->deleteJSConfirm;
			'doDelete';
			'customfields';
			'delsure';
			$_SERVER;
		}

		( ['PHP_SELF'] . '?action=delete&id=' );
		ob_start(  );

		if ($whmcs->get_req_var( 'success' )) {
			infoBox( $aInt->lang( 'global', 'changesuccess' ), $aInt->lang( 'global', 'changesuccessdesc' ) );
			echo $infobox;
			echo '
<p>';
			echo $aInt->lang( 'customfields', 'clientinfo' );
			echo '</p>
<form method="post" action="';
			echo $_SERVER['PHP_SELF'];
			echo '?action=save">
';
			select_query( 'tblcustomfields', '', array( 'type' => 'client' ), 'sortorder` ASC,`id', 'ASC' );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				$data['id'];
				$fid = ;
				$data['fieldname'];
				$fieldname = ;
				$data['fieldtype'];
				$fieldtype = ;
				$data['description'];
				$description = ;
				$data['fieldoptions'];
				$fieldoptions = ;
				$data['regexpr'];
				$regexpr = ;
				$data['adminonly'];
				$adminonly = ;
				$data['required'];
				$required = ;
				$data['showorder'];
				$showorder = ;
				$data['showinvoice'];
				$showinvoice = ;
				$data['sortorder'];
				$sortorder = ;
				echo '<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr>
    <td class="fieldlabel">
        ';
				echo $aInt->lang( 'customfields', 'fieldname' );
				echo '    </td>
    <td class="fieldarea">
        <input type="text" name="fieldname[';
				echo $fid;
				echo ']" value="';
				echo $fieldname;
				echo '" class="form-control input-inline input-400" />
        ';
				echo $aInt->getTranslationLink( 'custom_field.name', $fid, 'client' );
				echo '        <div class="pull-right">
            ';
				echo $aInt->lang( 'customfields', 'order' );
				echo '            <input type="text" name="sortorder[';
				echo $fid;
				echo ']" value="';
				echo $sortorder;
				echo '" class="form-control input-inline input-100 text-center">
        </div>
    </td>
</tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'customfields', 'fieldtype' );
				echo '</td><td class="fieldarea"><select name="fieldtype[';
				echo $fid;
				echo ']" class="form-control select-inline">
<option value="text"';

				if ($fieldtype == 'text') {
					echo ' selected';
					echo '>';
					echo $aInt->lang( 'customfields', 'typetextbox' );
					echo '</option>
<option value="link"';

					if ($fieldtype == 'link') {
						echo ' selected';
						echo '>';
						echo $aInt->lang( 'customfields', 'typelink' );
						echo '</option>
<option value="password"';

						if ($fieldtype == 'password') {
							echo ' selected';
							echo '>';
							echo $aInt->lang( 'customfields', 'typepassword' );
							echo '</option>
<option value="dropdown"';

							if ($fieldtype == 'dropdown') {
								echo ' selected';
							}
						}
					}
				}
			}
		}

		echo '>';
		echo $aInt->lang( 'customfields', 'typedropdown' );
		echo '</option>
<option value="tickbox"';

		if ($fieldtype == 'tickbox') {
			echo ' selected';
			echo '>';
			echo $aInt->lang( 'customfields', 'typetickbox' );
			echo '</option>
<option value="textarea"';

			if ($fieldtype == 'textarea') {
				echo ' selected';
				echo '>';
				echo $aInt->lang( 'customfields', 'typetextarea' );
				echo '</option>
</select></td></tr>
<tr>
    <td class="fieldlabel">
        ';
				echo $aInt->lang( 'fields', 'description' );
				echo '    </td>
    <td class="fieldarea">
        <input type="text" name="description[';
				echo $fid;
				echo ']" value="';
				echo $description;
				echo '" class="form-control input-inline input-500" />
        ';
				echo $aInt->getTranslationLink( 'custom_field.description', $fid, 'client' );
				echo '        ';
				echo $aInt->lang( 'customfields', 'descriptioninfo' );
				echo '    </td>
</tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'customfields', 'validation' );
				echo '</td><td class="fieldarea"><input type="text" name="regexpr[';
				echo $fid;
				echo ']" value="';
				echo dfdidhdbdc::encode( $regexpr );
				echo '" class="form-control input-inline input-500"> ';
				echo $aInt->lang( 'customfields', 'validationinfo' );
				echo '</td></tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'customfields', 'selectoptions' );
				echo '</td><td class="fieldarea"><input type="text" name="fieldoptions[';
				echo $fid;
				echo ']" value="';
				echo $fieldoptions;
				echo '" class="form-control input-inline input-500"> ';
				echo $aInt->lang( 'customfields', 'selectoptionsinfo' );
				echo '</td></tr>
    <tr>
        <td class="fieldlabel"></td>
        <td class="fieldarea">
            <label class="checkbox-inline">
                <input type="checkbox" name="adminonly[';
				echo $fid;
				echo ']"';

				if ($adminonly == 'on') {
					echo ' checked';
					echo '>
                ';
					$aInt->lang;
					'customfields';
				}
			}
		}


		while (true) {
			echo ( 'adminonly' );
			echo '            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="required[';
			echo $fid;
			echo ']"';

			if ($required == 'on') {
				echo ' checked';
				echo '>
                ';
				echo $aInt->lang( 'customfields', 'requiredfield' );
				echo '            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="showorder[';
				echo $fid;
				echo ']"';

				if ($showorder == 'on') {
					echo ' checked';
					echo '>
                ';
					echo $aInt->lang( 'customfields', 'orderform' );
					echo '            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="showinvoice[';
					echo $fid;
					echo ']"';

					if ($showinvoice) {
						echo ' checked';
						echo '>
                ';
						echo $aInt->lang( 'customfields', 'showinvoice' );
						echo '            </label>
            <div class="pull-right">
                <a href="#" onclick="doDelete(\'';
						echo $fid;
						echo '\');return false" class="btn btn-danger btn-xs">';
					}
				}
			}

			echo $aInt->lang( 'customfields', 'deletefield' );
			echo '</a>
            </div>
        </td>
    </tr>
</table>
<br>
';
		}

		echo '<b>';
		echo $aInt->lang( 'customfields', 'addfield' );
		echo '</b><br><br>
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr>
    <td width=100 class="fieldlabel">
        ';
		echo $aInt->lang( 'customfields', 'fieldname' );
		echo '    </td>
    <td class="fieldarea">
        <input type="text" name="addfieldname" class="form-control input-inline input-400" />
        ';
		echo $aInt->getTranslationLink( 'custom_field.name', 0, 'client' );
		echo '        <div class="pull-right">
            ';
		echo $aInt->lang( 'customfields', 'order' );
		echo '            <input type="text" name="addsortorder" value="0" class="form-control input-inline input-100 text-center" />
        </div>
    </td>
</tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'customfields', 'fieldtype' );
		echo '</td><td class="fieldarea"><select name="addfieldtype" class="form-control select-inline">
<option value="text">';
		echo $aInt->lang( 'customfields', 'typetextbox' );
		echo '</option>
<option value="link">';
		echo $aInt->lang( 'customfields', 'typelink' );
	}

	echo '</option>
<option value="password">';
	echo $aInt->lang( 'customfields', 'typepassword' );
	echo '</option>
<option value="dropdown">';
	echo $aInt->lang( 'customfields', 'typedropdown' );
	echo '</option>
<option value="tickbox">';
	echo $aInt->lang( 'customfields', 'typetickbox' );
	echo '</option>
<option value="textarea">';
	echo $aInt->lang( 'customfields', 'typetextarea' );
	echo '</option>
</select></td></tr>
<tr>
    <td class="fieldlabel">
        ';
	echo $aInt->lang( 'fields', 'description' );
	echo '    </td>
    <td class="fieldarea">
        <input type="text" name="adddescription" class="form-control input-inline input-500" />
        ';
	echo $aInt->getTranslationLink( 'custom_field.description', 0, 'client' );
	echo '        ';
	echo $aInt->lang( 'customfields', 'descriptioninfo' );
	echo '    </td>
</tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'customfields', 'validation' );
	echo '</td><td class="fieldarea"><input type="text" name="addregexpr" class="form-control input-inline input-500"> ';
	$aInt->lang;
	'customfields';
	'validationinfo';
}

echo (  );
echo '</td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'customfields', 'selectoptions' );
echo '</td><td class="fieldarea"><input type="text" name="addfieldoptions" class="form-control input-inline input-500"> ';
echo $aInt->lang( 'customfields', 'selectoptionsinfo' );
echo '</td></tr>
    <tr>
        <td class="fieldlabel"></td>
        <td class="fieldarea">
            <label class="checkbox-inline">
                <input type="checkbox" name="addadminonly">
                ';
echo $aInt->lang( 'customfields', 'adminonly' );
echo '            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="addrequired">
                ';
echo $aInt->lang( 'customfields', 'requiredfield' );
echo '            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="addshoworder">
                ';
echo $aInt->lang( 'customfields', 'orderform' );
echo '            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="addshowinvoice">
                ';
echo $aInt->lang( 'customfields', 'showinvoice' );
echo '            </label>
        </td>
    </tr>
</table>

<div class="btn-container">
    <input type="submit" value="';
echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-primary" />
    <input type="reset" value="';
echo $aInt->lang( 'global', 'cancelchanges' );
echo '" class="btn btn-default" />
</div>
</form>

';
echo cffcebchbh::jsInclude( 'AjaxModal.js' );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->display(  );
?>
