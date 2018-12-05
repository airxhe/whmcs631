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
new dgeegejige( 'Add New Client', false );
$aInt = ;
$aInt->title = $aInt->lang( 'clients', 'addnew' );
$aInt->sidebar = 'clients';
$aInt->icon = 'clientsadd';
$aInt->requiredFiles( array( 'clientfunctions', 'customfieldfunctions', 'gatewayfunctions' ) );

if ($whmcs->isInRequest( 'token' )) {
	$allowSingleSignOn = (true ? (int)$whmcs->getFromRequest( 'allowsinglesignon' ) : 1);

	if ($action == 'add') {
		check_token( 'WHMCS.admin.default' );
		select_query( 'tblclients', 'COUNT(*)', array( 'email' => $email ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;

		if ($data[0]) {
			infoBox;
			$aInt->lang( 'clients', 'duplicateemail' );
			$aInt->lang;
		}
	}

	( ( 'clients', 'duplicateemailexp' ), 'error' );
	jmp;

	if (( !trim( $email ) && !$cccheck )) {
		infoBox( $aInt->lang( 'global', 'validationerror' ), $aInt->lang( 'clients', 'invalidemail' ), 'error' );
		jmp;

		if (( !$cccheck && trim( $email ) )) {
			explode( '@', $email, 2 );
			$emaildomain = ;
			$emaildomain[1];
			$emaildomain = ;
			new cdhfeffhcg(  );
			$validate = ;

			if (!$validate->validate( 'email', 'email', 'clientareaerroremailinvalid' )) {
				$validate->getHTMLErrorOutput;
			}
		}

		(  );
		$errormessage .= ;
		infoBox( $aInt->lang( 'global', 'validationerror' ), $aInt->lang( 'clients', 'invalidemail' ), 'error' );
		jmp;
		$query = 'subaccount=1 AND email=\'' . mysql_real_escape_string( $email ) . '\'';
		select_query( 'tblcontacts', 'COUNT(*)', $query );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;

		if ($data[0]) {
			infoBox( $aInt->lang( 'clients', 'duplicateemail' ), $aInt->lang( 'clients', 'duplicateemailexp' ), 'error' );

			if (!$infobox) {
				$_SESSION['currency'] = $currency;
				addClient( $firstname, $lastname, $companyname, $email, $address1, $address2, $city, $state, $postcode, $country, $phonenumber, $password, $securityqid, $securityqans, $sendemail, array( 'notes' => $notes, 'status' => $status, 'taxexempt' => $taxexempt, 'latefeeoveride' => $latefeeoveride, 'overideduenotices' => $overideduenotices, 'language' => $language, 'billingcid' => $billingcid, 'lastlogin' => '00000000000000', 'groupid' => $groupid, 'separateinvoices' => $separateinvoices, 'disableautocc' => $disableautocc, 'defaultgateway' => $paymentmethod, 'emailoptout' => (int)$whmcs->get_req_var( 'emailoptout' ), 'overrideautoclose' => (int)$whmcs->get_req_var( 'overrideautoclose' ), 'allow_sso' => $allowSingleSignOn, 'credit' => (double)$whmcs->get_req_var( 'credit' ) ) );
				$userid = ;
				unset( $_SESSION[uid] );
				unset( $_SESSION[upw] );
				redir;
					. 'userid=' . $userid;
				'clientssummary.php';
			}
		}

		(  );
		eaaadiagec::release(  );
		ob_start(  );
		getSecurityQuestions( '' );
		$questions = ;
		echo $infobox;
		echo '
<form id="frmAddUser" method="post" action="';
		echo $whmcs->getPhpSelf(  );
		echo '?action=add">

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="17%" class="fieldlabel">';
		echo $aInt->lang( 'fields', 'firstname' );
		echo '</td><td class="fieldarea"><input type="text" class="form-control input-250" name="firstname" value="';
		echo $firstname;
		echo '" tabindex="1"></td><td class="fieldlabel" width="15%">';
		echo $aInt->lang( 'fields', 'address1' );
		echo '</td><td class="fieldarea"><input type="text" class="form-control input-250" name="address1" value="';
		echo $address1;
		echo '" tabindex="8"></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'fields', 'lastname' );
		echo '</td><td class="fieldarea"><input type="text" class="form-control input-250" name="lastname" value="';
		echo $lastname;
		echo '" tabindex="2"></td><td class="fieldlabel">';
		echo $aInt->lang( 'fields', 'address2' );
		echo '</td><td class="fieldarea"><input type="text" class="form-control input-250 input-inline" name="address2" value="';
		echo $address2;
		echo '" tabindex="9"> <font color=#cccccc><small>(';
		echo $aInt->lang( 'global', 'optional' );
		echo ')</small></font></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'fields', 'companyname' );
		echo '</td><td class="fieldarea"><input type="text" class="form-control input-250 input-inline" name="companyname" value="';
		echo $companyname;
		echo '" tabindex="3"> <font color=#cccccc><small>(';
		echo $aInt->lang( 'global', 'optional' );
		echo ')</small></font></td><td class="fieldlabel">';
		echo $aInt->lang( 'fields', 'city' );
		echo '</td><td class="fieldarea"><input type="text" class="form-control input-250" name="city" value="';
		echo $city;
		echo '" tabindex="10"></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'fields', 'email' );
		echo '</td><td class="fieldarea"><input type="text" class="form-control input-300" name="email" value="';
		echo $email;
		echo '" tabindex="4"></td><td class="fieldlabel">';
		echo $aInt->lang( 'fields', 'state' );
		echo '</td><td class="fieldarea"><input type="text" class="form-control input-250" name="state" data-selectinlinedropdown="1" value="';
		echo $state;
		echo '" tabindex="11"></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'fields', 'password' );
		echo '</td><td class="fieldarea"><input type="text" class="form-control input-150" name="password" value="';
		echo $password;
		echo '" tabindex="5" /></td><td class="fieldlabel">';
		echo $aInt->lang( 'fields', 'postcode' );
		echo '</td><td class="fieldarea"><input type="text" class="form-control input-150" name="postcode" value="';
		echo $postcode;
		echo '" tabindex="12"></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'fields', 'securityquestion' );
		echo '</td><td class="fieldarea"><select name="securityqid" class="form-control select-inline" tabindex="6"><option value="" selected>';
		echo $aInt->lang( 'global', 'none' );
		echo '</option>';
		foreach ($questions as ) {
			$ions = ;
			$quest = ;
			echo '<option value=' . $ions['id'] . '';

			if ($ions['id'] == $securityqid) {
				while (true) {
					echo ' selected';
					echo '>' . $ions['question'] . '</option>';
				}
			}
		}

		echo '</select></td><td class="fieldlabel">';
		echo $aInt->lang( 'fields', 'country' );
		echo '</td><td class="fieldarea">';
		include( '../includes/countries.php' );

		while (true) {
			echo getCountriesDropDown( $country, '', 13 );
			echo '</td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'fields', 'securityanswer' );
			echo '</td><td class="fieldarea"><input type="text" name="securityqans" class="form-control input-250" value="';
			echo $securityqans;
			echo '" tabindex="7"></td><td class="fieldlabel">';
			echo $aInt->lang( 'fields', 'phonenumber' );
			echo '</td><td class="fieldarea"><input type="text" class="form-control input-150" name="phonenumber" value="';
			echo $phonenumber;
			echo '" tabindex="14"></td></tr>
<tr><td class="fieldlabel"><br /></td><td class="fieldarea"></td><td class="fieldlabel"></td><td class="fieldarea"></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'clients', 'latefees' );
			echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="latefeeoveride"';

			if (( $latefeeoveride == 'on' || $latefeeoveride == 1 )) {
				echo ' checked';
				echo ' tabindex="15"> ';
				echo $aInt->lang( 'clients', 'latefeesdesc' );
				echo '</label></td><td class="fieldlabel">';
				echo $aInt->lang( 'fields', 'paymentmethod' );
				echo '</td><td class="fieldarea">';
				echo paymentMethodsSelection( $aInt->lang( 'clients', 'changedefault' ), 23 );
				echo '</td></tr>
<tr><td class="fieldlabel">';
				echo $aInt->lang( 'clients', 'overduenotices' );
				echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="overideduenotices"';

				if (( $overideduenotices == 'on' || $overideduenotices == 1 )) {
					echo ' checked';
					echo ' tabindex="16"> ';
					echo $aInt->lang( 'clients', 'overduenoticesdesc' );
					echo '</label></td><td class="fieldlabel">';
					echo $aInt->lang( 'clients', 'billingcontact' );
					echo '</td><td class="fieldarea"><select name="billingcid" class="form-control select-inline" tabindex="24"><option value="">';
					echo $aInt->lang( 'global', 'default' );
					echo '</option>';
					select_query( 'tblcontacts', '', array( 'userid' => $userid ), 'firstname` ASC,`lastname', 'ASC' );
					$result = ;
					mysql_fetch_array( $result );

					if ($data = ) {
						echo '<option value="' . $data['id'] . '"';

						if ($data['id'] == $billingcid) {
							echo ' selected';
							echo '>' . $data['firstname'] . ' ' . $data['lastname'] . '</option>';
						}

						break;
					}
				}
			}

				= ;
			$lang = ;
			echo '<option value="' . $lang . '">' . ucfirst( $lang ) . '</option>';
		}

		echo '</select></td></tr>
<tr><td class="fieldlabel">';
		echo $aInt->lang( 'clients', 'separateinvoices' );
		echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="separateinvoices"';

		if (( $separateinvoices == 'on' || $separateinvoices == 1 )) {
			echo ' checked';
			echo ' tabindex="18">';
			echo $aInt->lang( 'clients', 'separateinvoicesdesc' );
			echo '</label></td><td class="fieldlabel">';
			echo $aInt->lang( 'fields', 'status' );
			echo '</td><td class="fieldarea"><select name="status" class="form-control select-inline" tabindex="26">
<option value="Active"';

			if ($status == 'Active') {
				echo ' selected';
				echo '>';
				echo $aInt->lang( 'status', 'active' );
				echo '</option>
<option value="Inactive"';

				if ($status == 'Inactive') {
					echo ' selected';
					echo '>';
					echo $aInt->lang( 'status', 'inactive' );
					echo '</option>
<option value="Closed"';

					if ($status == 'Closed') {
						echo ' selected';
						echo '>';
						echo $aInt->lang( 'status', 'closed' );
						echo '</option>
</select></td></tr>
<tr><td class="fieldlabel">';
					}
				}
			}

			echo $aInt->lang( 'clients', 'disableccprocessing' );
			echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="disableautocc"';

			if (( $disableautocc == 'on' || $disableautocc == 1 )) {
				echo ' checked';
				echo ' tabindex="19">';
				echo $aInt->lang( 'clients', 'disableccprocessingdesc' );
				echo '</label></td><td class="fieldlabel">';
				echo $aInt->lang( 'currencies', 'currency' );
				echo '</td><td class="fieldarea"><select name="currency" class="form-control select-inline" tabindex="27">';
				select_query( 'tblcurrencies', 'id,code,`default`', '', 'code', 'ASC' );
				$result = ;
				mysql_fetch_array( $result );

				if ($data = ) {
					echo '<option value="' . $data['id'] . '"';

					if (( ( $currency && $data['id'] == $currency ) || ( !$currency && $data['default'] ) )) {
						echo ' selected';
						echo '>' . $data['code'] . '</option>';
					}

					jmp;
					echo ' value="1" tabindex="20"> ';
					echo $aInt->lang( 'clients', 'disablemarketingemails' );
					echo '</label></td><td class="fieldlabel">';
					$aInt->lang;
					'fields';
				}
			}
		}
	}
}

echo ( 'clientgroup' );
echo '</td><td class="fieldarea"><select name="groupid" class="form-control select-inline" tabindex="28"><option value="0">';
echo $aInt->lang( 'global', 'none' );
echo '</option>
';
select_query( 'tblclientgroups', '', '', 'groupname', 'ASC' );
$result = ;
mysql_fetch_assoc( $result );

if ($data = ) {
	$data['id'];
	$group_id = ;
	$data['groupname'];
	$group_name = ;
	$data['groupcolour'];
	$group_colour = ;
	echo '<option style="background-color:' . $group_colour . '" value=' . $group_id . '';

	if ($group_id == $groupid) {
		echo ' selected';
		echo '>' . $group_name . '</option>';
	}

	jmp;
	echo '>
            ';
	echo AdminLang::trans( 'clients.allowSSODescription' );
	echo '        </label>
    </td>
    <td class="fieldlabel"></td>
    <td class="fieldarea"></td>
</tr>
<tr>';
	$taxindex = 38;
	getCustomFields( 'client', '', $userid, 'on', '' );
	$customfields = ;
	$x = 9;
	foreach ($customfields as ) {
		$customfield = ;
		++$x;
		'<td class="fieldlabel">' . $customfield['name'] . '</td><td class="fieldarea">';
		str_replace;
		array( '<input', '<select', '<textarea' );
		'<input tabindex="' . $taxindex;
	}
}

echo  . ( array(  . '"', '<select tabindex="' . $taxindex . '"', '<textarea tabindex="' . $taxindex . '"' ), $customfield['input'] ) . '</td>';

if (( $x % 2 == 0 || $x == count( $customfields ) )) {
	echo '</tr><tr>';
	++$taxindex;
}

jmp;
echo ( 'addclient' );
echo '" tabindex="';
echo $taxindex++;
echo '" class="btn btn-primary" />
</div>

</form>

';
$jsCode = 'var stateNotRequired = true;
';
echo cffcebchbh::jsInclude( 'StatesDropdown.js' );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jscode = $jsCode;
$aInt->display(  );
?>
