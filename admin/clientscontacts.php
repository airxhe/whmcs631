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
new dgeegejige( 'Edit Clients Details' );
$aInt = ;
$aInt->requiredFiles( array( 'clientfunctions' ) );
$aInt->setClientsProfilePresets(  );
$aInt->valUserID( $userid );
$aInt->setClientsProfilePresets( $userid );
$aInt->assertClientBoundary( $userid );
App::self(  );
$whmcs = ;
$whmcs->get_req_var( 'emailerr' );
$emailerr = ;
$whmcs->get_req_var( 'email' );
$email = ;

if ($action == 'save') {
	check_token( 'WHMCS.admin.default' );
	checkPermission( 'Edit Clients Details' );

	if ($subaccount) {
		$subaccount = '1';
		select_query( 'tblclients', 'COUNT(*)', array( 'email' => $email ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		select_query( 'tblcontacts', 'COUNT(*)', array( 'email' => $email, 'id' => array( 'sqltype' => 'NEQ', 'value' => $contactid ) ) );
		$result = ;
		mysql_fetch_array( $result );
		$data2 = ;

		if ($data[0] + $data2[0]) {
			$querystring = '';
			foreach ($_REQUEST as ) {
				$v = ;
				$k = ;

				if (( !is_array( $v ) && $k != 'action' )) {
					$querystring .= ( (  . '&' ) . $k . '=' ) . urlencode( $v );
					break;
				}

				break;
			}

			redir( 'error=' . $_LANG['ordererroruserexists'] . $querystring );
		}
	}

	( AdminLang::trans( 'global.changesuccessdesc' ), 'success' );
	echo $infobox;
	echo '
<div class="context-btn-container">
<div class="text-left">
<form action="';
	echo $_SERVER['PHP_SELF'];
	echo '" method="get">
<input type="hidden" name="userid" value="';
	echo $userid;
	echo '">
';
	echo $aInt->lang( 'clientsummary', 'contacts' );
	echo ': <select name="contactid" onChange="submit()" class="form-control select-inline">
';
	select_query( 'tblcontacts', '', array( 'userid' => $userid ), 'firstname` ASC,`lastname', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$contactlistid = ;

		if (!$contactid) {
			$contactid = $taxindex;
			$data['firstname'];
			$contactlistfirstname = ;
			$data['lastname'];
			$contactlistlastname = ;
			$data['email'];
			$contactlistemail = ;
			echo (  . '<option value="' . $contactlistid . '"' );

			if ($contactlistid == $contactid) {
				echo ' selected';
				echo ( (  . '>' ) . $contactlistfirstname . ' ' ) . $contactlistlastname . ' - ' . $contactlistemail . '</option>';
			}
		}
	}
}
else {
	echo ;
	echo ' 1</td><td class="fieldarea"><input type="text" class="form-control input-250" name="address1" tabindex="7" value="';
	echo $address1;
	echo '"></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'lastname' );
	echo '</td><td class="fieldarea"><input type="text" class="form-control input-250" name="lastname" tabindex="2" value="';
	echo $lastname;
	echo '"></td><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'address' );
	echo ' 2</td><td class="fieldarea"><input type="text" class="form-control input-250 input-inline" name="address2" tabindex="8" value="';
	echo $address2;
	echo '"> <font color=#cccccc><small>(';
	echo $aInt->lang( 'global', 'optional' );
	echo ')</small></font></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'companyname' );
	echo '</td><td class="fieldarea"><input type="text" class="form-control input-250 input-inline" name="companyname" tabindex="3" value="';
	echo $companyname;
	echo '"> <font color=#cccccc><small>(';
	echo $aInt->lang( 'global', 'optional' );
	echo ')</small></font></td><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'city' );
	echo '</td><td class="fieldarea"><input type="text" tabindex="9" class="form-control input-250" name="city" value="';
	echo $city;
	echo '"></td></tr>
<tr>
    <td class="fieldlabel">
        ';
	echo $aInt->lang( 'fields', 'email' );
	echo '    </td>
    <td class="fieldarea">
        <input type="text" class="form-control input-300" name="email" tabindex="4" value="';
	echo $email;
	echo '">
    </td>
    <td class="fieldlabel">
        ';
	echo $aInt->lang( 'fields', 'state' );
	echo '    </td>
    <td class="fieldarea">
        <input type="text" class="form-control input-250" name="state" data-selectinlinedropdown="1" tabindex="10" value="';
	echo $state;
	echo '">
    </td>
</tr>

<tr>
    <td class="fieldlabel">
        ';
	echo $aInt->lang( 'clients', 'activatesubaccount' );
	echo '    </td>
    <td class="fieldarea">
        <label class="checkbox-inline">
            <input type="checkbox" tabindex="5" name="subaccount" id="subaccount" ';

	if ($subaccount) {
		echo 'checked';
		echo '> ';
		echo $aInt->lang( 'global', 'ticktoenable' );
		echo '        </label>
    </td>
    <td class="fieldlabel">
        ';
		echo $aInt->lang( 'fields', 'postcode' );
		echo '    </td>
    <td class="fieldarea">
        <input type="text" tabindex="11" class="form-control input-150" name="postcode" value="';
		echo $postcode;
		echo '">
    </td>
</tr>

<tr>
    <td class="fieldlabel">
        ';
		echo $aInt->lang( 'fields', 'password' );
		echo '    </td>
    <td class="fieldarea">
        <input type="text" class="form-control input-150" name="password" tabindex="6" value="';
		echo $password;
		echo '" onfocus="if (this.value == \'';
		echo $aInt->lang( 'fields', 'entertochange' );
		echo '\') { this.value = \'\' }" />
        ';

		if (( $contactid != 'addnew' && $subaccount == 1 )) {
			echo '            <a href="clientscontacts.php?userid=';
			echo $userid;
			echo '&contactid=';
			echo $contactid;
			echo '&resetpw=true';
			echo generate_token( 'link' );
			echo '"><img src="images/icons/resetpw.png" border="0" align="absmiddle" /> ';
			echo $aInt->lang( 'clients', 'resetsendpassword' );
			echo '</a>
        ';
			echo '    </td>
    <td class="fieldlabel">
        ';
			echo $aInt->lang( 'fields', 'country' );
			echo '    </td>
    <td class="fieldarea">';
		}
	}

	include( '../includes/countries.php' );
	echo getCountriesDropDown( $country, '', '12' );
	echo '</td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'emailnotifications' );
	echo '</td><td class="fieldarea">
<label class="checkbox-inline"><input type="checkbox" name="generalemails" tabindex="14" ';

	if ($generalemails) {
		echo 'checked';
		echo '> General</label>
<label class="checkbox-inline"><input type="checkbox" name="invoiceemails" tabindex="15" ';

		if ($invoiceemails) {
			echo 'checked';
			echo '> Invoice</label>
<label class="checkbox-inline"><input type="checkbox" name="supportemails" tabindex="16" ';

			if ($supportemails) {
				echo 'checked';
				echo '> Support</label><br />
<label class="checkbox-inline"><input type="checkbox" name="productemails" tabindex="17" ';

				if ($productemails) {
					echo 'checked';
					echo '> Product</label>
<label class="checkbox-inline"><input type="checkbox" name="domainemails" tabindex="18" ';

					if ($domainemails) {
						echo 'checked';
					}
				}
			}

			echo '> Domain</label>
<label class="checkbox-inline"><input type="checkbox" name="affiliateemails" tabindex="19" ';

			if ($affiliateemails) {
				echo 'checked';
				echo '> Affiliate</label>
</td><td class="fieldlabel">';
				echo $aInt->lang( 'fields', 'phonenumber' );
				echo '</td><td class="fieldarea"><input type="text" class="form-control input-150" name="phonenumber" tabindex="13" value="';
				echo $phonenumber;
				echo '"></td></tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'fields', 'permissions' );
			}
		}
	}
}

echo '</td><td class="fieldarea" colspan="3">
<table width="100%" cellspacing="0" cellpadding="0"><tr><td width="50%" valign="top">
';
$taxindex = 26;
foreach ($allPermissions as ) {
	$perm = ;
	++$taxindex;
	echo '<label class="checkbox-inline"><input type="checkbox" name="permissions[]" tabindex="' . $taxindex . '" value="' . $perm . '"';

	if (in_array( $perm, $permissions )) {
		echo ' checked';
		echo ' /> ' . $aInt->lang( 'contactpermissions', 'perm' . $perm ) . '</label><br />';

		if ($perm == 'managedomains') {
			echo '</td><td width="50%" valign="top">';
			break;
		}

		break;
	}

	break;
}

echo '</td></tr></table>
</td></tr>
</table>

<div class="btn-container">
    ';

if ($contactid != 'addnew') {
	echo '<input type="submit" value="';
	echo $aInt->lang( 'global', 'savechanges' );
	echo '" class="btn btn-primary" tabindex="';
	echo $taxindex++;
	echo '" /> <input type="reset" value="';
	echo $aInt->lang( 'global', 'cancelchanges' );
	echo '" class="button btn btn-default" tabindex="';
	echo $taxindex++;
	echo '" /><br />
    <a href="#" onClick="deleteContact(\'';
	echo $contactid;
	echo '\');return false" style="color:#cc0000"><b>';
	echo $aInt->lang( 'global', 'delete' );
	echo '</b></a>';
	jmp;
	echo '<input type="submit" value="';
	echo $aInt->lang( 'clients', 'addcontact' );
	echo '" class="btn btn-primary" tabindex="';
	echo $taxindex++;
	echo '" /> <input type="reset" value="';
	echo $aInt->lang( 'global', 'cancelchanges' );
	echo '" class="button btn btn-default" tabindex="';
	echo $taxindex++;
	echo '" />';
	echo '</div>

</form>

';
	$jscode .= 'var stateNotRequired = true;';
	echo cffcebchbh::jsInclude( 'StatesDropdown.js' );
	ob_get_contents(  );
	$content = ;
	ob_end_clean(  );
	$aInt->content = $content;
	$aInt->jquerycode = $jquerycode;
	$aInt->jscode = $jscode;
}

$aInt->display(  );
?>
