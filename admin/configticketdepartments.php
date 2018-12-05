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
new dgeegejige( 'Configure Support Departments' );
$aInt = ;
$aInt->title = $aInt->lang( 'supportticketdepts', 'supportticketdeptstitle' );
$aInt->sidebar = 'config';
$aInt->icon = 'logs';
$aInt->helplink = 'Support Departments';
$whmcs->get_req_var( 'sub' );
$sub = ;
$id = (int)$whmcs->get_req_var( 'id' );
$whmcs->get_req_var( 'email' );
$email = ;
$whmcs->get_req_var( 'name' );
$name = ;
$whmcs->get_req_var( 'description' );
$description = ;
$whmcs->get_req_var( 'clientsonly' );
$clientsonly = ;
$whmcs->get_req_var( 'piperepliesonly' );
$piperepliesonly = ;
$whmcs->get_req_var( 'noautoresponder' );
$noautoresponder = ;
$whmcs->get_req_var( 'hidden' );
$hidden = ;
$whmcs->get_req_var( 'host' );
$host = ;
$port = (int)$whmcs->get_req_var( 'port' );
$whmcs->get_req_var( 'login' );
$login = ;
$whmcs->get_req_var( 'password' );
$password = ;
$whmcs->get_req_var( 'admins' );
$admins = array(  );

if ($sub == 'add') {
	check_token( 'WHMCS.admin.default' );

	if ($email == '') {
		infoBox( $aInt->lang( 'global', 'validationerror' ), $aInt->lang( 'supportticketdepts', 'emailreqdfordept' ) );
		$action = 'add';

		if ($name == '') {
			infoBox( $aInt->lang( 'global', 'validationerror' ), $aInt->lang( 'supportticketdepts', 'namereqdfordept' ) );
			$action = 'add';

			if (!$infobox) {
				select_query( 'tblticketdepartments', '', '', 'order', 'DESC' );
				$result = ;
				mysql_fetch_array( $result );
				$data = ;
				$data['order'];
				$order = ;
				++$order;
				insert_query( 'tblticketdepartments', array( 'name' => $name, 'description' => dfdidhdbdc::decode( $description ), 'email' => trim( $email ), 'clientsonly' => $clientsonly, 'piperepliesonly' => $piperepliesonly, 'noautoresponder' => $noautoresponder, 'hidden' => $hidden, 'order' => $order, 'host' => trim( $host ), 'port' => trim( $port ), 'login' => trim( $login ), 'password' => encrypt( trim( dfdidhdbdc::decode( $password ) ) ) ) );
				$id = ;
				select_query( 'tbladmins', 'id,supportdepts', array( 'disabled' => '0' ) );
				$result = ;
				mysql_fetch_array( $result );

				if ($data = ) {
					$data[0];
					$deptadminid = ;
					$data[1];
					$supportdepts = ;
					explode( ',', $supportdepts );
					$supportdepts = ;

					if (in_array( $deptadminid, $admins )) {
						if (!in_array( $id, $supportdepts )) {
							$supportdepts[] = $id;
						}
					}
				}
			}
		}
	}
	else {
		$data['name'];
		$name = ;
		$data['description'];
		$description = ;
		$data['email'];
		$email = ;
		$data['hidden'];
		$hidden = ;
		$data['order'];
		$order = ;

		if ($hidden == 'on') {
			$aInt->lang( 'global', 'yes' );
			$hidden = ;
		}
	}
}
else {
	$description = ;
	$data['email'];
	$email = ;
	$data['clientsonly'];
	$clientsonly = ;
	$data['piperepliesonly'];
	$piperepliesonly = ;
	$data['noautoresponder'];
	$noautoresponder = ;
	$data['hidden'];
	$hidden = ;
	$data['host'];
	$host = ;
	$data['port'];
	$port = ;
	$data['login'];
	$login = ;
	decrypt( $data['password'] );
	$password = ;
	$aInt->deleteJSConfirm( 'deleteField', 'supportticketdepts', 'delsurefielddata', '?sub=deletecustomfield&id=' );
	echo '
<h2>';
	echo $aInt->lang( 'supportticketdepts', 'editdept' );
	echo '</h2>

<form method="post" action="';
	echo $whmcs->getPhpSelf(  );
	echo '?sub=save">
<input type="hidden" name="id" value="';
	echo $id;
	echo '">

';
	echo $aInt->beginAdminTabs( array( 'Details', 'Custom Fields' ), true );
	echo '
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="20%" class="fieldlabel">';
	echo $aInt->lang( 'supportticketdepts', 'deptname' );
	echo '</td><td class="fieldarea"><input type="text" name="name" size="25" value="';
	echo $name;
	echo '"></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'description' );
	echo '</td><td class="fieldarea"><input type="text" name="description" size="50" value="';
	echo dfdidhdbdc::encode( $description );
	echo '"></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'supportticketdepts', 'deptemail' );
	echo '</td><td class="fieldarea"><input type="text" name="email" size="40" value="';
	echo $email;
	echo '"></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'supportticketdepts', 'assignedadmins' );
	echo '</td><td class="fieldarea">
';
	select_query( 'tbladmins', '', '', 'username', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['supportdepts'];
		$supportdepts = ;
		explode( ',', $supportdepts );
		$supportdepts = ;
		echo '<label class="checkbox-inline"><input type="checkbox" name="admins[]" value="' . $data['id'] . '"';

		if (in_array( $id, $supportdepts )) {
			echo ' checked';
			echo ' /> ';

			if ($data['disabled'] == 1) {
				echo '<span class="disabledtext">';
				echo $data['username'] . ' (' . trim( $data['firstname'] . ' ' . $data['lastname'] ) . ')';

				if ($data['disabled'] == 1) {
					echo ' - ' . $aInt->lang( 'global', 'disabled' ) . '</span>';
					echo '</label><br />';
				}
			}
		}
	}
}

echo ( 'noautoresponder' );
echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="noautoresponder"';

if ($noautoresponder == 'on') {
	echo ' checked';
	echo '> ';
	echo $aInt->lang( 'supportticketdepts', 'noautoresponderdesc' );
	echo '</label></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'global', 'hidden' );
	echo '?</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="hidden"';

	if ($hidden == 'on') {
		echo ' checked';
		echo '> ';
		echo $aInt->lang( 'supportticketdepts', 'hiddendesc' );
		echo '</label></td></tr>
</table>
<p style="text-align:left;"><b>';
		echo $aInt->lang( 'supportticketdepts', 'pop3importconfigtitle' );
		echo '</b> ';
		echo $aInt->lang( 'supportticketdepts', 'pop3importconfigdesc' );
		echo '</p>
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="20%" class="fieldlabel">';
		echo $aInt->lang( 'fields', 'hostname' );
		echo '</td><td class="fieldarea"><input type="text" name="host" size="40" value="';
		echo $host;
		echo '"></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'supportticketdepts', 'pop3port' );
		echo '</td><td class="fieldarea"><input type="text" name="port" size="10" value="';
		echo $port;
		echo '"></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'supportticketdepts', 'pop3user' );
		echo '</td><td class="fieldarea"><input type="text" name="login" size="40" value="';
		echo $login;
		echo '"></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'supportticketdepts', 'pop3pass' );
		echo '</td><td class="fieldarea"><input type="password" name="password" size="20" value="';
		echo replacePasswordWithMasks( $password );
		echo '" autocomplete="off"></td></tr>
</table>

';
		echo $aInt->nextAdminTab(  );
		echo '
';
		select_query( 'tblcustomfields', '', array( 'type' => 'support', 'relid' => $id ), 'id', 'ASC' );
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
			$data['sortorder'];
			$sortorder = ;
			echo '<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr>
    <td width=100 class="fieldlabel">
        ';
			echo $aInt->lang( 'customfields', 'fieldname' );
			echo '    </td>
    <td class="fieldarea">
        <table width="98%" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <input type="text" name="customfieldname[';
			echo $fid;
			echo ']" value="';
			echo $fieldname;
			echo '" size="30">
                    ';
			echo $aInt->getTranslationLink( 'custom_field.name', $fid, 'support' );
			echo '                </td>
                <td align="right">
                    ';
			echo $aInt->lang( 'customfields', 'order' );
			echo '                    <input type="text" name="customsortorder[';
			echo $fid;
			echo ']" value="';
			echo $sortorder;
			echo '" size="5">
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'customfields', 'fieldtype' );
			echo '</td><td class="fieldarea"><select name="customfieldtype[';
			echo $fid;
			echo ']">
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
							echo '>';
							$aInt->lang;
							'customfields';
						}
					}
				}

				echo ( 'typedropdown' );
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
        <input type="text" name="customfielddesc[';
						echo $fid;
						echo ']" value="';
						echo $description;
						echo '" size="60">
        ';
						echo $aInt->getTranslationLink( 'custom_field.description', $fid, 'support' );
						echo '        ';
						echo $aInt->lang( 'customfields', 'descriptioninfo' );
						echo '    </td>
</tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'customfields', 'validation' );
						echo '</td><td class="fieldarea"><input type="text" name="customfieldregexpr[';
						echo $fid;
						echo ']" value="';
						echo dfdidhdbdc::encode( $regexpr );
						echo '" size="60"> ';
						echo $aInt->lang( 'customfields', 'validationinfo' );
						echo '</td></tr>
<tr><td class="fieldlabel">';
						echo $aInt->lang( 'customfields', 'selectoptions' );
						echo '</td><td class="fieldarea"><input type="text" name="customfieldoptions[';
						echo $fid;
						echo ']" value="';
						echo $fieldoptions;
						echo '" size="60"> ';
						echo $aInt->lang( 'customfields', 'selectoptionsinfo' );
						echo '</td></tr>
<tr><td class="fieldlabel"></td><td class="fieldarea"><table width="98%" cellspacing="0" cellpadding="0"><tr><td><label class="checkbox-inline"><input type="checkbox" name="customadminonly[';
						echo $fid;
						echo ']"';

						if ($adminonly == 'on') {
							echo ' checked';
							echo '> ';
							echo $aInt->lang( 'customfields', 'adminonly' );
							echo '</label> <label class="checkbox-inline"><input type="checkbox" name="customrequired[';
							echo $fid;
							echo ']"';

							if ($required == 'on') {
								echo ' checked';
								echo '> ';
								echo $aInt->lang( 'customfields', 'requiredfield' );
								echo '</label></td><td align="right"><a href="#" onClick="deleteField(\'';
								echo $fid;
								echo '\');return false">';
								echo $aInt->lang( 'customfields', 'deletefield' );
								echo '</a></td></tr></table></td></tr>
</table><br>
';
							}
						}
					}
				}

				echo ( 'validationinfo' );
				echo '</td></tr>
<tr><td class="fieldlabel">Select Options</td><td class="fieldarea"><input type="text" name="addfieldoptions" size="60"> ';
				echo $aInt->lang( 'customfields', 'selectoptionsinfo' );
				echo '</td></tr>
<tr><td class="fieldlabel"></td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="addadminonly"> ';
				echo $aInt->lang( 'customfields', 'adminonly' );
				echo '</label> <label class="checkbox-inline"><input type="checkbox" name="addrequired"> ';
				echo $aInt->lang( 'customfields', 'requiredfield' );
				echo '</label></td></tr>
</table>

';
				echo $aInt->endAdminTabs(  );
				echo '
<div class="btn-container">
    <input type="submit" value="';
			}
		}
	}
}

echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-primary">
    <input type="button" value="';
echo $aInt->lang( 'global', 'cancel' );
echo '" onClick="window.location=\'';
echo $whmcs->getPhpSelf(  );
echo '\'" class="btn btn-default">
</div>

</form>

';

if ($action == 'add') {
	if ($port == '') {
		$port = '110';
		echo '
<h2>';
		echo $aInt->lang( 'supportticketdepts', 'addnewdept' );
		echo '</h2>

<form method="post" action="';
		echo $whmcs->getPhpSelf(  );
		echo '?sub=add" autocomplete="off">

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="20%" class="fieldlabel">';
		echo $aInt->lang( 'supportticketdepts', 'deptname' );
		echo '</td><td class="fieldarea"><input type="text" name="name" size="25" value="';
		echo $name;
		echo '"></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'fields', 'description' );
		echo '</td><td class="fieldarea"><input type="text" name="description" size="50" value="';
		echo $description;
		echo '"></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'supportticketdepts', 'deptemail' );
		echo '</td><td class="fieldarea"><input type="text" name="email" size="40" value="';
		echo $email;
		echo '"></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'supportticketdepts', 'assignedadmins' );
		echo '</td><td class="fieldarea">
';
		select_query( 'tbladmins', '', '', 'username', 'ASC' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			echo '<label class="checkbox-inline"><input type="checkbox" name="admins[]" value="' . $data['id'] . '"';
			echo ' /> ';
			$data['disabled'];
		}
	}
}


if ( == 1) {
	echo '<span class="disabledtext">';
	echo $data['username'] . ' (' . $data['firstname'] . ' ' . $data['lastname'] . ')';

	if ($data['disabled'] == 1) {
		echo ' - ' . $aInt->lang( 'global', 'disabled' ) . '</span>';
		echo '</label><br />';
	}

	jmp;
	echo ( 'ticketsclientareaonlydesc' );
	echo '</label></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'supportticketdepts', 'noautoresponder' );
	echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="noautoresponder"';

	if ($noautoresponder == 'on') {
		echo ' checked';
		echo '> ';
		echo $aInt->lang( 'supportticketdepts', 'noautoresponderdesc' );
		echo '</label></td></tr>
<tr><td class="fieldlabel">';
		$aInt->lang( 'global', 'hidden' );
	}

	echo ;
	echo '?</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="hidden"';

	if ($hidden == 'on') {
		echo ' checked';
		echo '> ';
		echo $aInt->lang( 'supportticketdepts', 'hiddendesc' );
		echo '</label></td></tr>
</table>
<p><b>';
		echo $aInt->lang( 'supportticketdepts', 'pop3importconfigtitle' );
		echo '</b> ';
		echo $aInt->lang( 'supportticketdepts', 'pop3importconfigdesc' );
		echo '</p>
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="20%" class="fieldlabel">';
		$aInt->lang;
		'fields';
		'hostname';
	}
}

echo (  );
echo '</td><td class="fieldarea"><input type="text" name="host" size="40" value="';
echo $host;
echo '"></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'supportticketdepts', 'pop3port' );
echo '</td><td class="fieldarea"><input type="text" name="port" size="10" value="';
echo $port;
echo '"></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'supportticketdepts', 'pop3user' );
echo '</td><td class="fieldarea"><input type="text" name="login" size="40" value="';
echo $login;
echo '"></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'supportticketdepts', 'pop3pass' );
echo '</td><td class="fieldarea"><input type="password" name="password" size="20" value="';
echo $password;
echo '" autocomplete="off"></td></tr>
</table>

<div class="btn-container">
    <input type="submit" value="';
echo $aInt->lang( 'supportticketdepts', 'addnewdept' );
echo '" class="btn btn-primary">
    <input type="button" value="';
echo $aInt->lang( 'global', 'cancel' );
echo '" onClick="window.location=\'';
echo $whmcs->getPhpSelf(  );
echo '\'" class="btn btn-default" />
</div>

</form>

';
echo cffcebchbh::jsInclude( 'AjaxModal.js' );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
