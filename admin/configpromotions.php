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
new dgeegejige( 'View Promotions' );
$aInt = ;
$aInt->title = $aInt->lang( 'promos', 'title' );
$aInt->sidebar = 'config';
$aInt->icon = 'autosettings';
$aInt->helplink = 'Promotions';

if ($action == 'genpromo') {
	$numbers = '0123456789';
	$uppercase = 'ABCDEFGHIJKLMNOPQRSTUVYWXYZ';
	$str = '';
	$seeds_count = strlen( $numbers ) - 1;
	$i = 16;

	if ($i < 4) {
		$numbers[rand( 0, $seeds_count )];
		$str .= ;
		++$i;
	}

	jmp;
	$whmcs->get_req_var( 'configoptionupgrades' );
	$configoptionupgrades = ;
	$whmcs->get_req_var( 'notes' );
	$notes = ;

	if (!$startdate) {
		$startdate = (true ? '0000-00-00' : toMySQLDate( $startdate ));

		if (!$expirationdate) {
			(true ? '0000-00-00' : toMySQLDate( $expirationdate ));
		}
	}
}

$expirationdate = ;

if (is_array( $cycles )) {
	$cycles = (true ? implode( ',', $cycles ) : '');

	if (is_array( $appliesto )) {
		$appliesto = (true ? implode( ',', $appliesto ) : '');

		if (is_array( $requires )) {
			$requires = (true ? implode( ',', $requires ) : '');
			serialize( array( 'value' => format_as_currency( $upgradevalue ), 'type' => $upgradetype, 'discounttype' => $upgradediscounttype, 'configoptions' => $configoptionupgrades ) );
			$upgradeconfig = ;

			if ($id) {
				dacfgegdhe::table( 'tblpromotions' )->find( $id );
				$promotion = ;

				if ($code != $promotion->code) {
					logAdminActivity(  . 'Promotion Modified: Code Modified: \'' . $promotion->code . '\' to \'' . $code . '\' - Promotion ID: ' . $newid );
					$changes = array(  );

					if ($type != $promotion->type) {
						$changes[] = (  . 'Type Changed: \'' . $promotion->type . '\' to \'' . $type . '\'' );

						if ($recurring != $promotion->recurring) {
							if ($recurring) {
								$changes[] = 'Recurring Enabled';
							}
						}
					}
				}
			}
		}
	}
}

( 'COUNT(*)', $where );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data[0];
$numrows = ;
select_query( 'tblpromotions', '', $where, 'code', 'ASC', $page * $limit . ( (  . ',' ) . $limit ) );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['id'];
	$pid = ;
	$data['code'];
	$code = ;
	$data['type'];
	$type = ;
	$data['recurring'];
	$recurring = ;
	$data['value'];
	$value = ;
	$data['uses'];
	$uses = ;
	$data['maxuses'];
	$maxuses = ;
	$data['startdate'];
	$startdate = ;
	$data['expirationdate'];
	$expirationdate = ;
	$data['notes'];
	$notes = ;

	if (( 0 < $maxuses && $maxuses <= $uses )) {
		$uses = '<b>' . $uses;

		if (0 < $maxuses) {
			$uses .= '/' . $maxuses;

			if ($recurring) {
				$recurring = (true ? '<img src="images/icons/tick.png" width="16" height="16" alt="Yes" />' : '');

				if ($startdate == '0000-00-00') {
					$startdate = (true ? '-' : fromMySQLDate( $startdate ));

					if ($expirationdate == '0000-00-00') {
						$expirationdate = (true ? '-' : fromMySQLDate( $expirationdate ));

						if ($notes) {
							$code = '<a title="' . $aInt->lang( 'fields', 'notes' ) . (  . ': ' . $notes . '">' . $code . '</a>' );

							if ($type == 'Percentage') {
								$aInt->lang( 'promos', 'percentage' );
								$type = ;
							}
						}
					}
				}
			}
		}
	}
	else {
		echo ' selected';
		echo '>';
		echo $aInt->lang( 'promos', 'priceoverride' );
		echo '</option>
<option value="Free Setup"';

		if ($type == 'Free Setup') {
			echo ' selected';
			echo '>';
			echo $aInt->lang( 'promos', 'freesetup' );
			echo '</option>
</select></td></tr>
<tr>
    <td class="fieldlabel">';
			echo $aInt->lang( 'promos', 'recurring' );
			echo '</td>
    <td class="fieldarea">
        <label class="checkbox-inline">
            <input type="checkbox" name="recurring" value="1"';

			if ($recurring) {
				echo ' checked';
				echo ' onclick="$(\'input#recurfor\').prop(\'disabled\', !$(\'input#recurfor\').prop(\'disabled\'));">
            ';
				echo $aInt->lang( 'promos', 'recurenable' );
				echo '        </label>
        <input id="recurfor" type="text" name="recurfor" size="3" value="';
				echo $recurfor;
				echo '" ';

				if (!$recurring) {
					echo (true ? 'disabled="disabled"' : '');
					echo ' />
        ';
				}
			}
		}
	}
}

echo $aInt->lang( 'promos', 'recurenable2' );
echo '    </td>
</tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'promos', 'value' );
echo '</td><td class="fieldarea"><input type="text" name="pvalue" size="10" value="';
echo $value;
echo '"></td></tr>
<tr><td class="fieldlabel">';
echo $aInt->lang( 'promos', 'appliesto' );
echo '</td><td class="fieldarea"><select name="appliesto[]" size="8" style="width:90%" multiple>
';
new eadeihghbj(  );
$products = ;
$products->getProducts(  );
$productsList = ;
foreach ($productsList as ) {
	$data = ;
	$data['id'];
	$id = ;
	$data['groupname'];
	$groupname = ;
	$data['name'];
	$name = ;
	echo (  . '<option value="' . $id . '"' );

	if (in_array( $id, $appliesto )) {
		echo ' selected';
		echo (  . '>' ) . $groupname . ' - ' . $name . '</option>';
		break;
	}

	break;
}

select_query( 'tbladdons', '', '', 'name', 'ASC' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['id'];
	$id = ;
	$data['name'];
	$name = ;
	$data['description'];
	$description = ;
	echo (  . '<option value="A' . $id . '"' );

	if (in_array( 'A' . $id, $appliesto )) {
		echo ' selected';
		echo '>' . $aInt->lang( 'orders', 'addon' ) . (  . ' - ' . $name . '</option>' );
	}
}

jmp;
echo ( 'title' );
echo ' <input type="radio" name="upgradetype" value="configoptions"';

if ($upgradeconfig['type'] == 'configoptions') {
	echo ' checked';
	echo ' /> ';
	echo $aInt->lang( 'setup', 'configoptions' );
	echo '</td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'promos', 'upgradediscount' );
	echo '</td><td class="fieldarea"><input type="text" name="upgradevalue" size="10" value="';
	echo $upgradeconfig['value'];
	echo '" /> <select name="upgradediscounttype">
<option value="Percentage"';

	if ($upgradeconfig['discounttype'] == 'Percentage') {
		echo ' selected';
		echo '>';
		echo $aInt->lang( 'promos', 'percentage' );
	}
}

echo '</option>
<option value="Fixed Amount"';

if ($upgradeconfig['discounttype'] == 'Fixed Amount') {
	echo ' selected';
	echo '>';
	echo $aInt->lang( 'promos', 'fixedamount' );
	echo '</option>
</select></td></tr>
<tr><td class="fieldlabel">';
	echo $aInt->lang( 'promos', 'configoptionsupgrades' );
	echo '</td><td class="fieldarea">
<select name="configoptionupgrades[]" size="8" style="width:90%" multiple>
';
	select_query( 'tblproductconfigoptions', 'tblproductconfigoptions.id,name,optionname', '', 'optionname', 'ASC', '', 'tblproductconfiggroups ON tblproductconfiggroups.id=tblproductconfigoptions.gid' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$configid = ;
		$data['name'];
	}
}

$groupname = ;
$data['optionname'];
$optionname = ;
echo '<option value="' . $configid . '"';

if (in_array( $configid, $upgradeconfig['configoptions'] )) {
	echo ' selected';
	echo '>' . $groupname . ' - ' . $optionname . '</option>';
}

jmp;
echo ( 'cancelchanges' );
echo '" class="btn btn-default" onclick="window.location=\'configpromotions.php\'" />
</div>

</form>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
