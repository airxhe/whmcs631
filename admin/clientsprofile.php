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
new dgeegejige( 'Edit Clients Details', false );
$aInt = ;
$aInt->requiredFiles( array( 'clientfunctions', 'customfieldfunctions', 'gatewayfunctions' ) );
$aInt->setClientsProfilePresets(  );
$whmcs->get_req_var( 'userid' );
$userid = ;
$aInt->valUserID( $userid );
$aInt->assertClientBoundary( $userid );
ccbjgfhb::find( $userid );
$client = ;

if ($action == 'resendVerificationEmail') {
	check_token( 'WHMCS.admin.default' );

	if (!is_null( $client )) {
		$client->sendEmailAddressVerification(  );
		Terminus::getInstance(  )->doExit(  );

		if ($whmcs->get_req_var( 'save' )) {
			check_token( 'WHMCS.admin.default' );
			trim( $email );
			$email = ;
			trim( $password );
			$password = ;
			dfdidhdbdc::decode( $password );
			$password = ;
			select_query( 'tblclients', 'COUNT(*)', 'email=\'' . db_escape_string( $email ) . '\' AND id!=\'' . db_escape_string( $userid ) . '\'' );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;

			if ($data[0]) {
				redir(  . 'userid=' . $userid . '&emailexists=1' );
			}
		}

		$customfields = ;
		foreach ($customfields as ) {
			$v = ;
			$v['id'];
			$k = ;
			$customfieldsarray[$k] = $_POST['customfield'][$k];
			break;
		}

		$updatefieldsarray = array( 'firstname' => 'First Name', 'lastname' => 'Last Name', 'companyname' => 'Company Name', 'email' => 'Email Address', 'address1' => 'Address 1', 'address2' => 'Address 2', 'city' => 'City', 'state' => 'State', 'postcode' => 'Postcode', 'country' => 'Country', 'phonenumber' => 'Phone Number', 'securityqid' => 'Security Question', 'billingcid' => 'Billing Contact', 'groupid' => 'Client Group', 'language' => 'Language', 'currency' => 'Currency', 'status' => 'Status' );
		$updatedtickboxarray = array( 'latefeeoveride' => 'Late Fees Override', 'overideduenotices' => 'Overdue Notices', 'taxexempt' => 'Tax Exempt', 'separateinvoices' => 'Separate Invoices', 'disableautocc' => 'Disable CC Processing', 'emailoptout' => 'Marketing Emails Opt-out', 'overrideautoclose' => 'Auto Close' );
		$changelist = array(  );
		foreach ($updatefieldsarray as ) {
			$displayname = ;
			$field = ;

			if ($array[$field] != $oldclientsdetails[$field]) {
				$oldclientsdetails[$field];
				$oldvalue = ;
				$array[$field];
				$newvalue = ;
				$log = true;

				if ($field == 'groupid') {
					get_query_val( 'tblclientgroups', 'groupname', array( 'id' => $oldvalue ) );
					$oldvalue = ;
					get_query_val( 'tblclientgroups', 'groupname', array( 'id' => $newvalue ) );
					$newvalue = ;
					break;
				}
			}
		}

		foreach ($updatedtickboxarray as ) {
			$displayname = ;
			$field = ;

			if ($field == 'overideduenotices') {
				if ($oldclientsdetails[$field]) {
					$oldfield = (true ? 'Disabled' : 'Enabled');

					if ($array[$field]) {
						$newfield = (true ? 'Disabled' : 'Enabled');
						break;
					}
				}
			}
		}

		clientChangeDefaultGateway( $userid, $paymentmethod );

		if ($oldclientsdetails['defaultgateway'] != $paymentmethod) {
			$changelist[] = 'Default Payment Method: \'' . $oldclientsdetails['defaultgateway'] . '\' to \'' . $paymentmethod . '\'';

			if ($changedpw) {
				$changelist[] = 'Password Changed';

				if (( !$twofaenabled && $oldclientsdetails['twofaenabled'] == true )) {
					$changelist[] = 'Disabled Two-Factor Authentication';
					foreach ($customfields as ) {
						$customfield = ;
						$customfield['id'];
						$fieldid = ;

						if ($customfield['rawvalue'] != $customfieldsarray[$fieldid]) {
							$changelist[] = 'Custom Field ' . $customfield['name'] . ': \'' . $customfield['rawvalue'] . '\' to \'' . $customfieldsarray[$fieldid] . '\'';
							break;
						}

						break;
					}

					saveCustomFields( $userid, $customfieldsarray, 'client', true );

					if (!count( $changelist )) {
						$changelist[] = 'No Changes';
						logActivity( 'Client Profile Modified - ' . implode( ', ', $changelist ) . (  . ' - User ID: ' . $userid ), $userid );
						run_hook( 'AdminClientProfileTabFieldsSave', $_REQUEST );
						run_hook( 'ClientEdit', array_merge( array( 'userid' => $userid, 'olddata' => $oldclientsdetails ), $array ) );
						$queryString .= 'success=true';
						redir( $queryString );

						if ($whmcs->get_req_var( 'resetpw' )) {
							check_token( 'WHMCS.admin.default' );
							sendMessage( 'Automated Password Reset', $userid );
							redir(  . 'userid=' . $userid . '&pwreset=1' );
							ob_start(  );

							if ($whmcs->get_req_var( 'emailexists' )) {
								infoBox( $aInt->lang( 'clients', 'duplicateemail' ), $aInt->lang( 'clients', 'duplicateemailexp' ), 'error' );
							}
						}
					}
				}
			}
		}

		( '', array( 'userid' => $userid ), 'firstname` ASC,`lastname', 'ASC' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			echo '<option value="' . $data['id'] . '"';

			if ($data['id'] == $billingcid) {
				echo ' selected';
				echo '>' . $data['firstname'] . ' ' . $data['lastname'] . '</option>';
			}
		}
	}
}
else {
	echo $aInt->lang( 'clients', 'disableccprocessingdesc' );
	echo '</label></td><td class="fieldlabel">';
	echo $aInt->lang( 'currencies', 'currency' );
	echo '</td><td class="fieldarea"><select name="currency" class="form-control select-inline" tabindex="26">';
	select_query( 'tblcurrencies', 'id,code', '', 'code', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		echo '<option value="' . $data['id'] . '"';

		if ($data['id'] == $currency) {
			echo ' selected';
			echo '>' . $data['code'] . '</option>';
		}
	}
	else {
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
		}
	}

	echo '</td>
    <td class="fieldarea">
        <label class="checkbox-inline">
            <input type="checkbox" name="allowsinglesignon" value="1" tabindex="21"';

	if ($allowSingleSignOn) {
		echo ' checked';
		echo '>
            ';
		echo AdminLang::trans( 'clients.allowSSODescription' );
		echo '        </label>
    </td>
    <td class="fieldlabel"></td>
    <td class="fieldarea"></td>
</tr>
<tr>';
		$taxindex = 44;
		getCustomFields( 'client', '', $userid, 'on', '' );
		$customfields = ;
		$x = 15;
		foreach ($customfields as ) {
			$customfield = ;
			++$x;
			'<td class="fieldlabel">' . $customfield['name'] . '</td><td class="fieldarea">';
			str_replace;
			array( '<input', '<select', '<textarea' );
			'<input tabindex="' . $taxindex . '"';
		}
	}
}

echo  . ( array( , '<select tabindex="' . $taxindex . '"', '<textarea tabindex="' . $taxindex . '"' ), $customfield['input'] ) . '</td>';

if (( $x % 2 == 0 || $x == count( $customfields ) )) {
	echo '</tr><tr>';
	++$taxindex;
}

jmp;
$jqueryCode =  . (  ) . (  . '\',
            \'action\': \'resendVerificationEmail\',
            \'userid\': \'' . $userid . '\'
        }).done(function(data) {
            jQuery(\'#hrefEmailVerificationSendNew\').text(\'' ) . $aInt->lang( 'global', 'emailSent' ) . '\');
        });
    });
';
$jsCode = 'var stateNotRequired = true;
';
echo cffcebchbh::jsInclude( 'StatesDropdown.js' );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jqueryCode;
$aInt->jscode = $jsCode;
$aInt->display(  );
?>
