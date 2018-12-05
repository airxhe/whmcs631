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
new dgeegejige( 'Mass Mail' );
$aInt = ;
$aInt->title = $aInt->lang( 'permissions', '21' );
$aInt->sidebar = 'clients';
$aInt->icon = 'massmail';
$aInt->helplink = 'Mass Mail';
$aInt->requiredFiles( array( 'customfieldfunctions' ) );
getClientGroups(  );
$clientgroups = ;
$jscode = 'function showMailOptions(type) {
    $("#product_criteria").slideUp();
    $("#addon_criteria").slideUp();
    $("#domain_criteria").slideUp();
    $("#client_criteria").slideDown();
    if (type) $("#"+type+"_criteria").slideDown();
}';
ob_start(  );
echo '
<p>';
echo $aInt->lang( 'massmail', 'pagedesc' );
echo '</p>

<form method="post" action="sendmessage.php?type=massmail">

<h2>';
echo $aInt->lang( 'massmail', 'messagetype' );
echo '</h2>

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
    <tr>
        <td width="20%" class="fieldlabel">
            ';
echo $aInt->lang( 'massmail', 'emailtype' );
echo '        </td>
        <td class="fieldarea">

            <label class="radio-inline"><input type="radio" name="emailtype" id="typegen" value="General" onclick="showMailOptions(\'\')" /> ';
echo $aInt->lang( 'emailtpls', 'typegeneral' );
echo '</label>

            <label class="radio-inline"><input type="radio" name="emailtype" id="typeprod" value="Product/Service" onclick="showMailOptions(\'product\')" /> ';
echo $aInt->lang( 'fields', 'product' );
echo '</label>

            <label class="radio-inline"><input type="radio" name="emailtype" id="typeaddon" value="Addon" onclick="showMailOptions(\'addon\')" /> ';
echo $aInt->lang( 'fields', 'addon' );
echo '</label>

            <label class="radio-inline"><input type="radio" name="emailtype" id="typedom" value="Domain" onclick="showMailOptions(\'domain\')" /> ';
echo $aInt->lang( 'fields', 'domain' );
echo '</label>

        </td>
    </tr>
</table>

<div id="client_criteria" style="display:none;">

<br />

<h2>';
echo $aInt->lang( 'massmail', 'clientcriteria' );
echo '</h2>

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="20%" class="fieldlabel">';
echo $aInt->lang( 'fields', 'clientgroup' );
echo '</td><td class="fieldarea"><select name="clientgroup[]" size="4" multiple="true" class="form-control">';
foreach ($clientgroups as ) {
	$data = ;
	$groupid = ;
	echo '<option value="' . $groupid . '">' . $data['name'] . '</option>';
	break;
}

echo '</select></td></tr>
';
getCustomFields( 'client', '', '', true );
$customfields = ;
foreach ($customfields as ) {
	$customfield = ;
	echo '<tr><td class="fieldlabel">' . $customfield['name'] . '</td><td class="fieldarea">';

	if ($customfield['type'] == 'tickbox') {
		echo '<input type="radio" name="customfield[' . $customfield['id'] . ']" value="" checked /> No Filter <input type="radio" name="customfield[' . $customfield['id'] . ']" value="cfon" /> Checked Only <input type="radio" name="customfield[' . $customfield['id'] . ']" value="cfoff" /> Unchecked Only';
		break;
	}

	break;
}

echo '<tr><td class="fieldlabel">';
echo $aInt->lang( 'global', 'language' );
echo '</td><td class="fieldarea"><select name="clientlanguage[]" size="4" multiple="true" class="form-control"><option value="" selected>';
echo $aInt->lang( 'global', 'default' );
echo '</option>';
select_query( 'tblclients', 'DISTINCT language', '', 'language', 'ASC' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['language'];
	$displanguage = ;
	$language = ;

	if (trim( $language )) {
		echo '<option value="' . $language . '" selected>' . ucfirst( $displanguage ) . '</option>';
	}
}

jmp;
echo ( 'massmail', 'productservicestatus' );
echo '</td><td class="fieldarea"><select name="productstatus[]" size="5" multiple="true" class="form-control">
<option value="Pending">';
echo $aInt->lang( 'status', 'pending' );
echo '</option>
<option value="Active">';
echo $aInt->lang( 'status', 'active' );
echo '</option>
<option value="Suspended">';
echo $aInt->lang( 'status', 'suspended' );
echo '</option>
<option value="Terminated">';
echo $aInt->lang( 'status', 'terminated' );
echo '</option>
<option value="Cancelled">';
echo $aInt->lang( 'status', 'cancelled' );
echo '</option>
<option value="Fraud">';
echo $aInt->lang( 'status', 'fraud' );
echo '</option>
</select></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'massmail', 'assignedserver' );
echo '</td><td class="fieldarea"><select name="server[]" size="5" multiple="true" class="form-control">';
select_query( 'tblservers', '', '', 'name', 'ASC' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['id'];
	$id = ;
	$data['name'];
	$name = ;
	echo  . '<option value="' . $id . '">' . $name . '</option>';
}

jmp;
echo ( 'pending' );
echo '</option>
<option value="Active">';
echo $aInt->lang( 'status', 'active' );
echo '</option>
<option value="Suspended">';
echo $aInt->lang( 'status', 'suspended' );
echo '</option>
<option value="Terminated">';
echo $aInt->lang( 'status', 'terminated' );
echo '</option>
<option value="Cancelled">';
echo $aInt->lang( 'status', 'cancelled' );
echo '</option>
<option value="Fraud">';
echo $aInt->lang( 'status', 'fraud' );
echo '</option>
</select></td></tr>
</table>

</div>
<div id="domain_criteria" style="display:none;">

<br />

<h2>';
echo $aInt->lang( 'massmail', 'domaincriteria' );
echo '</h2>

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="20%" class="fieldlabel">';
echo $aInt->lang( 'massmail', 'domainstatus' );
echo '</td><td class="fieldarea"><select name="domainstatus[]" size="5" multiple="true" class="form-control">
<option value="Pending">';
echo $aInt->lang( 'status', 'pending' );
echo '</option>
<option value="Pending Transfer">';
echo $aInt->lang( 'status', 'pendingtransfer' );
echo '</option>
<option value="Active">';
echo $aInt->lang( 'status', 'active' );
echo '</option>
<option value="Expired">';
echo $aInt->lang( 'status', 'expired' );
echo '</option>
<option value="Cancelled">';
echo $aInt->lang( 'status', 'cancelled' );
echo '</option>
<option value="Fraud">';
echo $aInt->lang( 'status', 'fraud' );
echo '</option>
</select></td></tr>
</table>

</div>

<div class="btn-container">
    <input type="submit" value="';
echo $aInt->lang( 'massmail', 'composemsg' );
echo '" class="btn btn-default">
</div>

</form>

<p>';
echo $aInt->lang( 'massmail', 'footnote' );
echo '</p>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
