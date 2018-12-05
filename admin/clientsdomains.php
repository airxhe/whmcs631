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
new dgeegejige( 'View Clients Domains', false );
$aInt = ;
$aInt->requiredFiles( array( 'clientfunctions', 'domainfunctions', 'gatewayfunctions', 'registrarfunctions' ) );
$aInt->setClientsProfilePresets(  );

if (( !$id && $domainid )) {
	$id = $action;

	if (( !$userid && !$id )) {
		get_query_val( 'tblclients', 'id', '', 'id', 'ASC', '0,1' );
		$userid = ;

		if (( $userid && !$id )) {
			$aInt->valUserID( $userid );

			if (!$userid) {
				$aInt->gracefulExit( 'Invalid User ID' );
				get_query_val( 'tbldomains', 'id', array( 'userid' => $userid ), 'domain', 'ASC', '0,1' );
				$id = ;

				if (!$id) {
					$aInt->gracefulExit( $aInt->lang( 'domains', 'nodomainsinfo' ) . ' <a href="ordersadd.php?userid=' . $userid . '">' . $aInt->lang( 'global', 'clickhere' ) . '</a> ' . $aInt->lang( 'orders', 'toplacenew' ) );
					new cjjbfgbijj(  );
					$domains = ;
					$domains->getDomainsDatabyID( $id );
					$domain_data = ;
					$domain_data['id'];
					$domainid = ;
					$did = ;
					$id = ;
					$domain_data['userid'];
					$userid = ;
					$aInt->valUserID( $userid );
					$aInt->setClientsProfilePresets( $userid );
					$aInt->assertClientBoundary( $userid );

					if (!$id) {
						$aInt->gracefulExit( 'Domain ID Not Found' );

						if ($action == 'delete') {
							check_token( 'WHMCS.admin.default' );
							checkPermission( 'Delete Clients Domains' );
							run_hook( 'DomainDelete', array( 'userid' => $userid, 'domainid' => $id ) );
							delete_query( 'tbldomains', array( 'id' => $id ) );
							logActivity(  . 'Deleted Domain - User ID: ' . $userid . ' - Domain ID: ' . $id );
							redir(  . 'userid=' . $userid );

							if (( $action == 'savedomain' && $domain )) {
								check_token( 'WHMCS.admin.default' );
								checkPermission( 'Edit Clients Domains' );
								$conf = 'success';
								getCurrency( $userid );
								$currency = ;
								select_query( 'tblpricing', 'msetupfee,qsetupfee,ssetupfee', array( 'type' => 'domainaddons', 'currency' => $currency['id'], 'relid' => 0 ) );
								$result = ;
								mysql_fetch_array( $result );
								$data = ;
								$domaindnsmanagementprice = $data['msetupfee'] * $regperiod;
								$domainemailforwardingprice = $data['qsetupfee'] * $regperiod;
								$domainidprotectionprice = $data['ssetupfee'] * $regperiod;
								select_query;
								'tbldomains';
							}
						}
					}
				}
			}
		}
	}
}

( 'dnsmanagement,emailforwarding,idprotection,donotrenew', array( 'id' => $id ) );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data['dnsmanagement'];
$olddnsmanagement = ;
$data['emailforwarding'];
$oldemailforwarding = ;
$data['idprotection'];
$oldidprotection = ;
$data['donotrenew'];
$olddonotrenew = ;
$dnsmanagement = (int)(string)$dnsmanagement;
$emailforwarding = (int)(string)$emailforwarding;
$idprotection = (int)(string)$idprotection;
$donotrenew = (int)(string)$donotrenew;

if ($olddnsmanagement) {
	if (!$dnsmanagement) {
		$recurringamount -= $oldemailforwarding;
		$conf = 'removeddns';
	}
}

( array( array( 'onclick' =>  . '&id=' . $id . '&regaction=idtoggle' . generate_token( 'link' ) . '"', 'class' => 'btn-primary' ), array( 'title' => $aInt->lang( 'global', 'no' ) ) ) );
$modalHtml .= ;
eaaadiagec::get( 'domainsavetemp' );
$domainsavetemp = ;
eaaadiagec::delete( 'domainsavetemp' );

if (( $conf && $domainsavetemp )) {
	$domainsavetemp['ns1'];
	$ns1 = ;
	$domainsavetemp['ns2'];
	$ns2 = ;
	$domainsavetemp['ns3'];
	$ns3 = ;
	$domainsavetemp['ns4'];
	$ns4 = ;
	$domainsavetemp['ns5'];
	$ns5 = ;
	$domainsavetemp['oldns1'];
	$oldns1 = ;
	$domainsavetemp['oldns2'];
	$oldns2 = ;
	$domainsavetemp['oldns3'];
	$oldns3 = ;
	$domainsavetemp['oldns4'];
	$oldns4 = ;
	$domainsavetemp['oldns5'];
	$oldns5 = ;
	$domainsavetemp['defaultns'];
	$defaultns = ;
	$domainsavetemp['newlockstatus'];
	$newlockstatus = ;
	$domainsavetemp['oldlockstatus'];
	$oldlockstatus = ;
	$domainsavetemp['oldidprotection'];
	$oldidprotect = ;
	$domainsavetemp['idprotection'];
	$idprotect = ;
}

( ( 'global', 'changesuccess' ), $aInt->lang( 'domains', 'emailforwardingremoved' ), 'success' );
break;
switch ($conf) {
case 'removedidprotect': {
		infoBox( $aInt->lang( 'global', 'changesuccess' ), $aInt->lang( 'domains', 'idprotectionremoved' ), 'success' );
		break;

		if (( checkPermission( 'Perform Registrar Operations', true ) && $domains->getModule(  ) )) {
			$domainregistraractions = (true ? true : false);

			if ($domainregistraractions) {
				explode( '.', $domain, 2 );
				$domainparts = ;
				$params = array(  );
				$params['domainid'] = $id;
				$params['sld'] = $domainparts[0];
				$params['tld'] = $domainparts[1];
				$params['regperiod'] = $registrationperiod;
				$params['registrar'] = $registrar;
				$params['regtype'] = $regtype;
				$adminbuttonarray = '';
				loadRegistrarModule( $registrar );

				if (function_exists( $registrar . '_AdminCustomButtonArray' )) {
					call_user_func( $registrar . '_AdminCustomButtonArray', $params );
					$adminbuttonarray = ;

					if (( ( ( ( ( $oldns1 != $ns1 || $oldns2 != $ns2 ) || $oldns3 != $ns3 ) || $oldns4 != $ns4 ) || $oldns5 != $ns5 ) || $defaultns )) {
						if ($defaultns) {
							$nameservers = (true ? $domains->getDefaultNameservers(  ) : array( 'ns1' => $ns1, 'ns2' => $ns2, 'ns3' => $ns3, 'ns4' => $ns4, 'ns5' => $ns5 ));
							$domains->moduleCall( 'SaveNameservers', $nameservers );
							$success = ;

							if (!$success) {
								infoBox( $aInt->lang( 'domains', 'nschangefail' ), $domains->getLastError(  ), 'error' );
								break;
							}
						}
					}
				}
			}
		}
	}
}

echo (  );
echo '</td>
    <td class="fieldarea">';
echo $orderid;
echo ' - <a href="orders.php?action=view&id=';
echo $orderid;
echo '">';
echo $aInt->lang( 'orders', 'vieworder' );
echo '</a></td>
    <td class="fieldlabel">';
echo $aInt->lang( 'domains', 'regperiod' );
echo '</td>
    <td class="fieldarea">
        <div class="form-inline">
            <input type="text" name="regperiod" class="form-control input-50" value="';
echo $registrationperiod;
echo '"> ';
echo $aInt->lang( 'domains', 'years' );
echo '        </div>
    </td>
</tr>
<tr>
    <td class="fieldlabel">';
echo $aInt->lang( 'orders', 'ordertype' );
echo '</td>
    <td class="fieldarea">';
echo $ordertype;
echo '</td>
    <td class="fieldlabel">';
echo $aInt->lang( 'fields', 'regdate' );
echo '</td>
    <td class="fieldarea">
        <input type="text" name="regdate" value="';
echo $regdate;
echo '" class="form-control date-picker">
    </td>
</tr>
<tr>
    <td class="fieldlabel">';
echo $aInt->lang( 'fields', 'domain' );
echo '</td>
    <td class="fieldarea">
        <div class="input-group input-300">
            <input type="text" name="domain" class="form-control" value="';
echo $domain;
echo '">
            <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left:-3px;">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="http://www.';
echo $domain;
echo '" target="_blank">www</a>
                    <li><a onclick="$(\'#frmWhois\').submit();return false">';
echo $aInt->lang( 'domains', 'whois' );
echo '</a>
                    <li><a href="http://www.intodns.com/';
echo $domain;
echo '" target="_blank">intoDNS</a></li>
                </ul>
            </div>
        </div>
    </td>
    <td class="fieldlabel">';
echo $aInt->lang( 'fields', 'expirydate' );
echo '</td>
    <td class="fieldarea">
        <input type="text" name="expirydate" value="';
echo $expirydate;
echo '" class="form-control date-picker">
    </td>
</tr>
<tr>
    <td class="fieldlabel">';
echo $aInt->lang( 'fields', 'registrar' );
echo '</td>
    <td class="fieldarea">';
echo getRegistrarsDropdownMenu( $registrar );
echo '</td>
    <td class="fieldlabel">';
echo $aInt->lang( 'fields', 'nextduedate' );
echo '</td>
    <td class="fieldarea">
        <input type="hidden" name="oldnextduedate" value="';
echo $nextduedate;
echo '">
        <input type="text" name="nextduedate" value="';
echo $nextduedate;
echo '" class="form-control date-picker">
    </td>
</tr>
<tr>
    <td class="fieldlabel">';
echo $aInt->lang( 'fields', 'firstpaymentamount' );
echo '</td>
    <td class="fieldarea">
        <input type="text" name="firstpaymentamount" class="form-control input-100" value="';
echo $firstpaymentamount;
echo '">
    </td>
    <td class="fieldlabel">';
echo $aInt->lang( 'fields', 'paymentmethod' );
echo '</td>
    <td class="fieldarea">';
echo paymentMethodsSelection(  );
echo ' <a href="clientsinvoices.php?userid=';
echo $userid;
echo '&domainid=';
echo $id;
echo '">';
echo $aInt->lang( 'invoices', 'viewinvoices' );
echo '</a>
    </td>
</tr>
<tr>
    <td class="fieldlabel">';
echo $aInt->lang( 'fields', 'recurringamount' );
echo '</td>
    <td class="fieldarea">
        <div class="form-inline">
            <input type="text" name="recurringamount" class="form-control input-100" value="';
echo $recurringamount;
echo '">
            <label class="checkbox-inline">
                <input type="checkbox" name="autorecalc" ';

if ($autorecalcdefault) {
	echo ' checked';
	echo ' /> ';
	echo $aInt->lang( 'services', 'autorecalc' );
	echo '            </label>
        </div>
    </td>
    <td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'status' );
	echo '</td>
    <td class="fieldarea"><select name="status" class="form-control select-inline">
<option value="Pending"';

	if ($domainstatus == 'Pending') {
		echo ' selected';
		echo '>';
		echo $aInt->lang( 'status', 'pending' );
		echo '</option>
<option value="Pending Transfer"';

		if ($domainstatus == 'Pending Transfer') {
			echo ' selected';
			echo '>';
			echo $aInt->lang( 'status', 'pendingtransfer' );
			echo '</option>
<option value="Active"';

			if ($domainstatus == 'Active') {
				echo ' selected';
				echo '>';
				echo $aInt->lang( 'status', 'active' );
				echo '</option>
<option value="Expired"';

				if ($domainstatus == 'Expired') {
					echo ' selected';
					echo '>';
					echo $aInt->lang( 'status', 'expired' );
					echo '</option>
<option value="Cancelled"';

					if ($domainstatus == 'Cancelled') {
						echo ' selected';
						echo '>';
						echo $aInt->lang( 'status', 'cancelled' );
						echo '</option>
<option value="Fraud"';

						if ($domainstatus == 'Fraud') {
							echo ' selected';
							echo '>';
							echo $aInt->lang( 'status', 'fraud' );
							echo '</option>
</select>
    </td>
</tr>
<tr>
    <td class="fieldlabel">';
							echo $aInt->lang( 'fields', 'promocode' );
							echo '</td>
    <td class="fieldarea"><select name="promoid" class="form-control select-inline"><option value="0">';
							echo $aInt->lang( 'global', 'none' );
							echo '</option>';
							getCurrency( $userid );
							$currency = ;
							select_query( 'tblpromotions', '', '', 'code', 'ASC' );
							$result = ;
							mysql_fetch_array( $result );

							if ($data = ) {
								$data['id'];
							}
						}

						$promo_id = ;
						$data['code'];
						$promo_code = ;
						$data['type'];
						$promo_type = ;
						$data['recurring'];
						$promo_recurring = ;
						$data['value'];
						$promo_value = ;

						if ($promo_type == 'Percentage') {
							$promo_value .= '%';
						}
					}
				}
			}
		}
	}
}

echo $id;
echo '\'"> ';

if ($domains->hasFunction( 'GetEPPCode' )) {
	echo '<input type="button" value="';
	echo $aInt->lang( 'domains', 'getepp' );
	echo '" class="button btn btn-default" data-toggle="modal" data-target="#modalGetEPP"> ';

	if ($domains->hasFunction( 'RequestDelete' )) {
		echo '<input type="button" value="';
		echo $aInt->lang( 'domains', 'requestdelete' );
		echo '" class="button btn btn-default" data-toggle="modal" data-target="#modalRequestDelete"> ';

		if ($domains->hasFunction( 'ReleaseDomain' )) {
			echo '<input type="button" value="';
			echo $aInt->lang( 'domains', 'releasedomain' );
			echo '" class="button btn btn-default" data-toggle="modal" data-target="#modalReleaseDomain"> ';

			if ($domains->moduleCall( 'AdminCustomButtonArray' )) {
				$domains->getModuleReturn(  );
				$adminbuttonarray = ;
				foreach ($adminbuttonarray as ) {
					$value = ;
					$key = ;
					echo ' <input type="button" value="';
					echo $key;
					echo '" class="button btn btn-default" onClick="window.location=\'';
					echo $whmcs->getPhpSelf(  );
					echo '?userid=';
					echo $userid;
					echo '&id=';
					echo $id;
					echo '&regaction=custom&ac=';
					echo $value . generate_token( 'link' );
					echo '\'">';
					break;
				}

				echo '    </td>
</tr>
';
				echo '<tr>
    <td class="fieldlabel">';
				echo $aInt->lang( 'domains', 'managementtools' );
				echo '</td>
    <td class="fieldarea" colspan="3"><label class="checkbox-inline"><input type="checkbox" name="dnsmanagement"';

				if ($dnsmanagement) {
					echo ' checked';
					echo '> ';
					echo $aInt->lang( 'domains', 'dnsmanagement' );
					echo '</label> <label class="checkbox-inline"><input type="checkbox" name="emailforwarding"';

					if ($emailforwarding) {
						echo ' checked';
						echo '> ';
						echo $aInt->lang( 'domains', 'emailforwarding' );
						echo '</label> <label class="checkbox-inline"><input type="checkbox" name="idprotection"';

						if ($idprotection) {
							echo ' checked';
							echo '> ';
							echo $aInt->lang( 'domains', 'idprotection' );
							echo '</label> <label class="checkbox-inline"><input type="checkbox" name="donotrenew"';

							if ($donotrenew) {
								echo ' checked';
								echo '> ';
								$aInt->lang;
							}

							echo ( 'domains', 'donotrenew' );
							echo '</label>
    </td>
</tr>
';
							array( '', 'first', 'second', 'third', 'fourth' );
						}
					}
				}
			}
		}

		$reminderEmails = array( 'fifth' );
		$reminderEmailOutput =  . '<tr>
    <td class="fieldlabel">
        ' . $aInt->lang( 'domains', 'domainReminders' ) . '
    </td>
    <td class="fieldarea" colspan="3">
        <div id="domainReminders" style="overflow-y:auto; max-height:100px; font-size: 0.9em;">
            <table class="datatable" width="100%" style="margin-bottom:0;">
                <tr>
                    <th>' . $aInt->lang( 'fields', 'date' ) . '</th>
                    <th>' . $aInt->lang( 'domains', 'reminder' ) . '</th>
                    <th>' . $aInt->lang( 'emails', 'to' ) . '</th>
                    <th>' . $aInt->lang( 'domains', 'sent' ) . '</th>
                </tr>';

		if ($domains->obtainEmailReminders(  )) {
			foreach ($domains->obtainEmailReminders(  ) as ) {
				$reminderMail = ;
				AdminLang::trans( 'domains.' . $reminderEmails[$reminderMail['type']] . 'Reminder' );
				$reminderType = ;
				fromMySQLDate( $reminderMail['date'] );
				$reminderDate = ;
				$reminderMail['recipients'];
				$recipients = ;
				sprintf( AdminLang::trans( 'domains.beforeExpiry' ), $reminderMail['days_before_expiry'] );
				$sent = ;

				if ($reminderMail['days_before_expiry'] < 0) {
					sprintf( AdminLang::trans( 'domains.afterExpiry' ), $reminderMail['days_before_expiry'] * -1 );
					$sent = ;
					$reminderEmailOutput .=  . '<tr align="center">
    <td>' . $reminderDate . '</td>
    <td>' . $reminderType . '</td>
    <td width="50%">' . $recipients . '</td>
    <td>' . $sent . '</td>
</tr>';
					break;
				}

				break;
			}
		}
	}
}


if ((  )) {
	call_user_func( $registrar . '_AdminDomainsTabFields', $params );
	$fieldsarray = ;

	if (is_array( $fieldsarray )) {
		foreach ($fieldsarray as ) {
			$v = ;
			$k = ;
			echo '<tr><td class="fieldlabel">' . $k . '</td><td class="fieldarea" colspan="3">' . $v . '</td></tr>';
			break;
		}

		run_hook( 'AdminClientDomainsTabFields', array( 'id' => $id ) );
		$hookret = ;
		foreach ($hookret as ) {
			$hookdat = ;
			foreach ($hookdat as ) {
				$v = ;
				$k = ;
				echo '<td class="fieldlabel">' . $k . '</td><td class="fieldarea" colspan="3">' . $v . '</td></tr>';
				break 2;
			}

			break;
		}

		new bfbbddjdf(  );
		$additflds = ;
		$additflds->setDomain( $domain );
		$additflds->getFieldValuesFromDatabase( $id );
		foreach ($additflds->getFieldsForOutput(  ) as ) {
			$inputHTML = ;
			$fieldLabel = ;
			echo  . '<tr><td class="fieldlabel">' . $fieldLabel . '</td><td class="fieldarea" colspan="3">' . $inputHTML . '</td></tr>';
		}
	}
}

jmp;
(  );
$domainMailTemplates = ;
foreach ($domainMailTemplates as ) {
	$template = ;
	echo '<option value="' . $template->id . '"';

	if ($template->custom) {
		echo ' style="background-color:#efefef"';
		(  . '>' ) . $template->name . '</option>';
	}

	echo ;
	break;
}

echo '</select> <input type="submit" value="' . $aInt->lang( 'global', 'sendmessage' ) . '" class="btn btn-default btn-sm" />';
echo '</div>
</form>
';
echo '
<form method="post" action="whois.php" target="_blank" id="frmWhois">
<input type="hidden" name="domain" value="' . $domain . '" />
</form>
';
echo $modalHtml;
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
