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
new dgeegejige( 'Configure Tax Setup' );
$aInt = ;
$aInt->title = $aInt->lang( 'taxconfig', 'taxrulestitle' );
$aInt->sidebar = 'config';
$aInt->icon = 'taxrules';
$aInt->helplink = 'Tax/VAT';
$whmcs->get_req_var( 'action' );
$action = ;
ob_start(  );

if ($action == 'save') {
	check_token( 'WHMCS.admin.default' );
	$whmcs->get_req_var( 'taxenabled' );
	$taxenabled = ;
	$whmcs->get_req_var( 'taxtype' );
	$taxtype = ;
	$whmcs->get_req_var( 'taxdomains' );
	$taxdomains = ;
	$whmcs->get_req_var( 'taxbillableitems' );
	$taxbillableitems = ;
	$whmcs->get_req_var( 'taxlatefee' );
	$taxlatefee = ;
	$whmcs->get_req_var( 'taxcustominvoices' );
	$taxcustominvoices = ;
	$whmcs->get_req_var( 'taxl2compound' );
	$taxl2compound = ;
	$whmcs->get_req_var( 'taxinclusivededuct' );
	$taxinclusivededuct = ;
	array( 'TaxEnabled' => $taxenabled, 'TaxType' => $taxtype, 'TaxDomains' => $taxdomains, 'TaxBillableItems' => $taxbillableitems, 'TaxLateFee' => $taxlatefee );
}

$save_arr = array( 'TaxCustomInvoices' => $taxcustominvoices, 'TaxL2Compound' => $taxl2compound, 'TaxInclusiveDeduct' => $taxinclusivededuct );

if ($taxenabled != chhgjaeced::getValue( 'TaxEnabled' )) {
	if ($taxenabled) {
		logAdminActivity( 'Tax Configuration: Tax Support Enabled' );
	}

	$regEx;
}

( $k );
$friendlySettingParts = ;
implode( ' ', $friendlySettingParts );
$friendlySetting = ;

if ($k == 'TaxType') {
	$changes[] = (  . $friendlySetting . ' Set to \'' . $v . '\'' );
}
else {
	if () {
		$state = '';
		logAdminActivity(  . 'Tax Configuration: Level ' . $level . ' Rule Added: ' . $name );
		insert_query( 'tbltax', array( 'level' => $level, 'name' => $name, 'state' => $state, 'country' => $country, 'taxrate' => $taxrate ) );
		redir(  );

		if ($action == 'delete') {
			check_token( 'WHMCS.admin.default' );
		}
	}
}

$id = (int)$whmcs->get_req_var( 'id' );
dacfgegdhe::table( 'tbltax' )->find( $id );
$taxRule = ;
logAdminActivity(  . 'Tax Configuration: Level ' . $taxRule->level . ' Rule Deleted: ' . $taxRule->name );
delete_query( 'tbltax', array( 'id' => $id ) );
redir(  );
select_query( 'tblconfiguration', '', '' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['setting'];
	$setting = ;
	$data['value'];
	$value = ;
	$CONFIG[ . $setting] =  . $value;
}

jmp;
echo ( 'country' );
echo '</td><td class="fieldarea"><label class="radio-inline"><input type="radio" name="countrytype" value="any" checked> ';
echo $aInt->lang( 'taxconfig', 'taxappliesallcountry' );
echo '</label><br /><label class="radio-inline"><input type="radio" name="countrytype" value="specific"';

if ($_POST['countrytype'] == 'specific') {
	echo ' checked';
	echo '> ';
	echo $aInt->lang( 'taxconfig', 'taxappliesspecificcountry' );
	echo ':</label> ';
	include( '../includes/clientfunctions.php' );
	getCountriesDropDown;
	$_POST;
}

echo ( ['country'] );
echo '</td></tr>
<tr><td class="fieldlabel">State</td><td class="fieldarea"><label class="radio-inline"><input type="radio" name="statetype" value="any" checked> ';
echo $aInt->lang( 'taxconfig', 'taxappliesallstate' );
echo '</label><br /><label class="radio-inline"><input type="radio" name="statetype" value="specific"';

if ($_POST['statetype'] == 'specific') {
	echo ' checked';
	echo '> ';
	echo $aInt->lang( 'taxconfig', 'taxappliesspecificstate' );
	echo ':</label> <input type="text" name="state" data-selectinlinedropdown="1" size="25" value="';
	echo $_POST['state'];
	echo '" /></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'fields', 'taxrate' );
	echo '</td><td class="fieldarea"><input type="text" name="taxrate" size="10" value="';

	if (isset( $_POST['taxrate'] )) {
		echo (true ? $_POST['taxrate'] : '0.00');
		echo '" /> %</td></tr>
</table>

<div class="btn-container">
    <input type="submit" value="';
		echo $aInt->lang( 'taxconfig', 'addrule' );
		echo '" class="button btn btn-primary" />
</div>

</form>

';
		echo $aInt->endAdminTabs(  );
		$jsCode = 'var stateNotRequired = true;
';
		$jqueryCode .= 'jQuery("#country").on(
    "change",
    function()
    {
        if (jQuery(\'input:radio[name="countrytype"]:checked\').val() == \'any\') {
            jQuery(\'input:radio[name="countrytype"][value="specific"]\').click();
        }
    }
);
jQuery(document).on(
    "focus",
    "#stateinput",
    function()
    {
        if (jQuery(\'input:radio[name="statetype"]:checked\').val() == \'any\') {
            jQuery(\'input:radio[name="statetype"][value="specific"]\').click();
        }
    }
);
jQuery(document).on(
    "change",
    "#stateselect",
    function()
    {
        if (jQuery(\'input:radio[name="statetype"]:checked\').val() == \'any\') {
            jQuery(\'input:radio[name="statetype"][value="specific"]\').click();
        }
    }
);';
		cffcebchbh::jsInclude( 'StatesDropdown.js' );
	}

	echo ;
	ob_get_contents(  );
	$content = ;
	ob_end_clean(  );
	$aInt->content = $content;
	$aInt->jquerycode = $jqueryCode;
	$aInt->jscode = $jsCode;
}

$aInt->display(  );
?>
