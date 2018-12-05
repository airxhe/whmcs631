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
new dgeegejige( 'My Account', false );
$aInt = ;
$aInt->title = $aInt->lang( 'global', 'myaccount' );
$aInt->sidebar = 'config';
$aInt->icon = 'home';
$aInt->helplink = 'My Account';
$aInt->requiredFiles( array( 'ticketfunctions' ) );
$whmcs->get_req_var( 'action' );
$action = ;
$errormessage = '';
new bdahbbcgbi(  );
$twofa = ;
$twofa->setAdminID( $_SESSION['adminid'] );

if ($whmcs->get_req_var( '2fasetup' )) {
	$output = '';

	if ($twofa->isActiveAdmins(  )) {
		if ($twofa->isEnabled(  )) {
			$incorrect = false;
			$disabled = ;
			$whmcs->get_req_var( 'pwverify' );

			if ($password = ) {
				new ddhiacdee(  );
				$auth = ;
				$auth->getInfobyID( $_SESSION['adminid'] );

				if ($auth->comparePassword( $password )) {
					$twofa->disableUser(  );
					$disabled = true;
				}
			}

			$output .= ;
			$output .= '<h2>' . $aInt->lang( 'twofa', 'backupcodeis' ) . ':</h2><div style="margin:20px auto;padding:10px;width:280px;background-color:#F2D4CE;border:1px dashed #AE432E;text-align:center;font-size:20px;">' . $backupcode . '</div><p>' . $aInt->lang( 'twofa', 'backupcodeexpl' ) . '</p>';
		}

		(  );
		$output = ;

		if (!$output) {
			$aInt->lang( 'twofa', 'generalerror' );
			$output .= ;
		}
	}

	( 'currentPasswd' );
	$currentPasswd = ;
}

$auth->getInfobyID( $_SESSION['adminid'] );

if ($auth->comparePassword( $currentPasswd )) {
	if ($newPassword != $passwordRetype) {
		$aInt->lang( 'administrators', 'pwmatcherror' );
		$errormessage = ;
		$action = 'edit';
	}

	echo ;
	echo '</td><td class="fieldarea">
';

	if (!$supportEmailsEnabled) {
		echo '<div class="alert alert-warning top-margin-10 bottom-margin-10"><i class="fa fa-warning"></i> &nbsp; ' . $aInt->lang( 'administrators', 'ticketNotificationsUnavailable' ) . '</div>';
		echo '<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="row">';
		$nodepartments = true;
		getAdminDepartmentAssignments(  );
		$supportdepts = ;
		foreach ($supportdepts as ) {
			$deptid = ;
			get_query_val( 'tblticketdepartments', 'name', array( 'id' => $deptid ) );
			$deptname = ;

			if ($deptname) {
				'<div class="col-sm-6">
            <label class="checkbox-inline">
                <input type="checkbox" name="ticketnotify[]" value="' . $deptid . '"';

				if (in_array( $deptid, $ticketnotify )) {
						. (true ? ' checked' : '');

					if ($supportEmailsEnabled) {
						echo  . (true ? '' : ' disabled') . ' />
                ' . $deptname . '
            </label>
        </div>';
						$nodepartments = false;
						break;
					}

					break;
				}
			}

			break;
		}


		if ($nodepartments) {
			echo '<div class="col-xs-12">' . $aInt->lang( 'administrators', 'nosupportdeptsassigned' ) . '</div>';
			echo '</div>
    </div>
</div>';
		}
	}
}

echo '</div>
</td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'administrators', 'supportsig' );
echo '</td><td class="fieldarea"><textarea name="signature" rows="4" class="form-control">';
echo $signature;
echo '</textarea></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'global', 'mynotes' );
echo '</td><td class="fieldarea"><textarea name="notes" rows="4" class="form-control">';
echo $notes;
echo '</textarea></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'fields', 'template' );
echo '</td><td class="fieldarea"><select name="template" class="form-control select-inline">';
foreach ($adminTemplates as ) {
	$temp = ;
	echo (  . '<option value="' . $temp . '"' );

	if ($temp == $template) {
		echo ' selected';
		echo '>' . ucfirst( $temp ) . '</option>';
		break;
	}

	break;
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
		'>' . ucfirst( $lang ) . '</option>';
	}

	echo ;
	break;
}

echo '</select></td></tr>
';

if ($twofa->isActiveAdmins(  )) {
	'<tr>
    <td class="fieldlabel">' . $aInt->lang( 'twofa', 'title' ) . '</td>
    <td class="fieldarea">
        <input type="checkbox"';

	if ($twofa->isEnabled(  )) {
		echo  . (true ? ' checked' : '') . ' class="twofa-toggle-switch" /> &nbsp;';

		if ($twofa->isEnabled(  )) {
			echo '<a href="myaccount.php?2fasetup=1" class="open-modal twofa-config-link" data-modal-title="' . $aInt->lang( 'twofa', 'disable', 1 ) . '">' . $aInt->lang( 'twofa', 'disableclickhere' ) . '</a>';
		}

		echo $aInt->lang( 'fields', 'confpassword' );
		echo '</td><td class="fieldarea"><input type="password" name="password2" class="form-control input-250" autocomplete="off"></td></tr>
</table>

<p>
    ';
		echo $aInt->lang( 'administrators', 'confirmAdminPasswd' );
		echo '</p>

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
    <tr>
        <td width="20%" class="fieldlabel">';
		echo $aInt->lang( 'fields', 'confpassword' );
		echo '</td>
        <td class="fieldarea">
            <input type="password" name="currentPasswd" class="form-control input-250" autocomplete="off" required>
        </td>
    </tr>
</table>

<div class="btn-container">
    <input type="submit" value="';
		echo $aInt->lang( 'global', 'savechanges' );
		echo '" class="btn btn-primary">
    <input type="reset" value="';
		echo $aInt->lang( 'global', 'cancelchanges' );
		echo '" class="btn btn-default" />
</div>

</form>

';
		cffcebchbh::jsInclude( 'AjaxModal.js' );
	}

	echo ;
	$aInt->jquerycode = '
jQuery(".twofa-toggle-switch").bootstrapSwitch(
    {
        "size": "mini",
        "onColor": "success",
        "onSwitchChange": function(event, state)
        {
            $(".twofa-config-link").click();
        }
    }
);';

	if ($whmcs->get_req_var( '2faenforce' )) {
		$aInt->jquerycode .= '$(".twofa-config-link").click();';
	}

	ob_get_contents(  );
	$content = ;
	ob_end_clean(  );
	$aInt->content = $content;
}

$aInt->display(  );
?>
