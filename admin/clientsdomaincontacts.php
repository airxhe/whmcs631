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
new dgeegejige( 'Edit Clients Domains' );
$aInt = ;
$aInt->title = $aInt->lang( 'domains', 'modifycontact' );
$aInt->sidebar = 'clients';
$aInt->icon = 'clientsprofile';
$aInt->requiredFiles( array( 'clientfunctions', 'registrarfunctions' ) );
ob_start(  );
new cjjbfgbijj(  );
$domains = ;
$domains->getDomainsDatabyID( $whmcs->get_req_var( 'domainid' ) );
$domain_data = ;
$domain_data['id'];
$domainid = ;

if (!$domainid) {
	$aInt->gracefulExit( 'Domain ID Not Found' );
	$domain_data['userid'];
	$userid = ;
	$aInt->valUserID( $userid );
	$domain_data['domain'];
	$domain = ;
	$domain_data['registrar'];
	$registrar = ;
	$domain_data['registrationperiod'];
	$registrationperiod = ;

	if ($action == 'save') {
		check_token( 'WHMCS.admin.default' );
		$whmcs->get_req_var( 'contactdetails' );
		$contactdetails = ;
		$whmcs->get_req_var( 'wc' );
		$wc = ;
		$whmcs->get_req_var( 'sel' );
		$sel = ;
		foreach ($wc as ) {
			$wc_val = ;
			$wc_key = ;

			if ($wc_val == 'contact') {
				$sel[$wc_key];
				$selectedContact = ;
				substr( $selectedContact, 0, 1 );
				$selectedContactType = ;
				substr( $selectedContact, 1 );
				$selectedContactID = ;
				$tmpcontactdetails = array(  );

				if ($selectedContactType == 'u') {
					new cgdfbdbdbe( $userid );
					$client = ;
					$client->getDetails(  );
					$tmpcontactdetails = ;
					break;
				}
			}

			break;
		}

		$domains->moduleCall( 'SaveContactDetails', array( 'contactdetails' => foreignChrReplace( $contactdetails ) ) );
		$success = ;
		$reDirVars = array(  );
		$reDirVars['domainid'] = $domainid;

		if ($success) {
			$reDirVars['editSuccess'] = true;
		}
	}
}

( ( 'modifySuccess' ), $aInt->lang( 'domains', 'changesuccess' ), 'success' );
jmp;

if ($whmcs->get_req_var( 'editError' ) == 0) {
	dfdidhdbdc::makeSafeForOutput( dfabehjiaj::get( 'contactEditError' ) );
	$editError = ;

	if ($editError) {
		infoBox( $aInt->lang( 'domains', 'registrarerror' ), $editError, 'error' );
		dfabehjiaj::delete( 'contactEditError' );
		$domains->moduleCall( 'GetContactDetails' );
		$success = ;

		if ($success) {
			$domains->getModuleReturn(  );
			$contactdetails = ;
			jmp;
			infoBox( $aInt->lang( 'domains', 'registrarerror' ), $domains->getLastError(  ) );
			echo '<script language="javascript">
function usedefaultwhois(id) {
    jQuery("."+id.substr(0,id.length-1)+"customwhois").attr("disabled", true);
    jQuery("."+id.substr(0,id.length-1)+"defaultwhois").attr("disabled", false);
    jQuery(\'#\'+id.substr(0,id.length-1)+\'1\').attr("checked", "checked");
}
function usecustomwhois(id) {
    jQuery("."+id.substr(0,id.length-1)+"customwhois").attr("disabled", false);
    jQuery("."+id.substr(0,id.length-1)+"defaultwhois").attr("disabled", true);
    jQuery(\'#\'+id.substr(0,id.length-1)+\'2\').attr("checked", "checked");
}
</script>
<form method="post" action="';
			echo $whmcs->getPhpSelf(  );
			echo '?domainid=';
			echo $domainid;
			echo '&action=save">

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="20%" class="fieldlabel">';
			echo $aInt->lang( 'fields', 'registrar' );
			echo '</td><td class="fieldarea">';
			echo ucfirst( $registrar );
			echo '</td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'fields', 'domain' );
			echo '</td><td class="fieldarea">';
			echo $domain;
			echo '</td></tr>
</table>

';
			echo $infobox;

			if ($success) {
				$contactsarray = array(  );
				select_query( 'tblcontacts', 'id,firstname,lastname', array( 'userid' => $userid, 'address1' => array( 'sqltype' => 'NEQ', 'value' => '' ) ), 'firstname` ASC,`lastname', 'ASC' );
				$result = ;
				mysql_fetch_assoc( $result );
				$data = ;
			}
		}
	}
}


if () {
	$contactsarray[] = array( 'id' => $data['id'], 'name' => $data['firstname'] . ' ' . $data['lastname'] );
}

jmp;
echo '1" value="contact" onclick="usedefaultwhois(id)" /> <label for="';
echo $contactdetail;
echo '1">';
echo $aInt->lang( 'domains', 'domaincontactusexisting' );
echo '</label></p>
    <table id="';
echo $contactdetail;
echo 'defaultwhois">
      <tr>
        <td width="150" align="right">';
echo $aInt->lang( 'domains', 'domaincontactchoose' );
echo '</td>
        <td><select name="sel[';
echo $contactdetail;
echo ']" id="';
echo $contactdetail;
echo '3" class="';
echo $contactdetail;
echo 'defaultwhois form-control select-inline" onclick="usedefaultwhois(id)">
            <option value="u';
echo $userid;
echo '">';
echo $aInt->lang( 'domains', 'domaincontactprimary' );
echo '</option>
            ';
foreach ($contactsarray as ) {
	$subcontactsarray = ;
	echo '            <option value="c';
	echo $subcontactsarray['id'];
	echo '">';
	echo $subcontactsarray['name'];
	echo '</option>
            ';
	break;
}

echo '          </select></td>
      </tr>
  </table>
<p><input type="radio" name="wc[';
echo $contactdetail;
echo ']" id="';
echo $contactdetail;
echo '2" value="custom" onclick="usecustomwhois(id)" checked /> <label for="';
echo $contactdetail;
echo '2">';

while (true) {
	echo $aInt->lang( 'domains', 'domaincontactusecustom' );
	echo '</label></p>

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3" id="';
	echo $contactdetail;
	echo 'customwhois">
';
	foreach ($values as ) {
		$value = ;
		$name = ;
		echo '<tr><td width="20%" class="fieldlabel">';
		echo $name;
		echo '</td><td class="fieldarea"><input type="text" name="contactdetails[';
		echo $contactdetail;
		echo '][';
		echo $name;
		echo ']" value="';
		echo $value;
		echo '" size="30" class="';
		echo $contactdetail;
		echo 'customwhois"></td></tr>
';
		break 2;
	}

	echo '</table>

';
}

echo '
<p align=center><input type="submit" value="';
echo $aInt->lang( 'global', 'savechanges' );
echo '" class="button btn btn-default"> <input type="button" value="';
echo $aInt->lang( 'global', 'goback' );
echo '" class="button btn btn-default" onClick="window.location=\'clientsdomains.php?userid=';
echo $userid;
echo '&domainid=';
echo $domainid;
echo '\'"></p>

</form>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->display(  );
?>
