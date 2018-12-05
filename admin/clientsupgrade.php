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

function ajax_getcycles($pid) {
	global $aInt;
	global $service_billingcycle;

	getPricingInfo( $pid );
	$pricing = ;

	if ($pricing['type'] == 'recurring') {
		echo '<select name="billingcycle" onchange="calctotals()">';

		if ($pricing['monthly']) {
			echo '<option value="monthly"';

			if ($service_billingcycle == 'Monthly') {
				echo ' selected';
				'>' . $pricing['monthly'] . '</option>';
			}

			echo ;

			if ($pricing['quarterly']) {
				echo '<option value="quarterly"';

				if ($service_billingcycle == 'Quarterly') {
					echo ' selected';
					echo '>' . $pricing['quarterly'] . '</option>';

					if ($pricing['semiannually']) {
						echo '<option value="semiannually"';
					}
				}
			}
		}
	}


	if ($service_billingcycle == 'Semi-Annually') {
		echo ' selected';
		echo '>' . $pricing['semiannually'] . '</option>';

		if ($pricing['annually']) {
			echo '<option value="annually"';

			if ($service_billingcycle == 'Annually') {
				echo ' selected';
				$pricing['annually'];
			}
		}

		echo '>' .  . '</option>';

		if ($pricing['biennially']) {
			echo '<option value="biennially"';

			if ($service_billingcycle == 'Biennially') {
				echo ' selected';
			}
		}

		echo '>' . $pricing['biennially'] . '</option>';

		if ($pricing['triennially']) {
			echo '<option value="triennially"';

			if ($service_billingcycle == 'Triennially') {
				echo ' selected';
				echo '>' . $pricing['triennially'] . '</option>';
				echo '</select>';
			}
		}
	}

}

require( '../init.php' );
new dgeegejige( 'Create Upgrade/Downgrade Orders', false );
$aInt = ;
$aInt->title = $aInt->lang( 'services', 'upgradedowngrade' );
$aInt->requiredFiles( array( 'orderfunctions', 'upgradefunctions', 'invoicefunctions', 'configoptionsfunctions' ) );
ob_start(  );
select_query( 'tblhosting', 'tblhosting.userid,tblhosting.domain,tblhosting.billingcycle,tblhosting.nextduedate,tblhosting.paymentmethod,tblproducts.id AS pid,tblproducts.name,tblproductgroups.name as groupname', array( 'tblhosting.id' => $id ), '', '', '', 'tblproducts ON tblproducts.id=tblhosting.packageid INNER JOIN tblproductgroups ON tblproductgroups.id=tblproducts.gid' );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data['userid'];
$userid = ;
$data['groupname'];
$service_groupname = ;
$data['pid'];
$service_pid = ;
$data['name'];
$service_prodname = ;
$data['domain'];
$service_domain = ;
$data['billingcycle'];
$service_billingcycle = ;
$data['nextduedate'];
$service_nextduedate = ;
$data['paymentmethod'];
$service_paymentmethod = ;

if (!$userid) {
	exit( $aInt->lang( 'global', 'erroroccurred' ) );
	str_replace( '-', '', $service_nextduedate );
	$service_nextduedate = ;

	if (( ( $service_billingcycle != 'Free Account' && $service_billingcycle != 'One Time' ) && $service_nextduedate < date( 'Ymd' ) )) {
		infoBox( $aInt->lang( 'services', 'upgradeoverdue' ), $aInt->lang( 'services', 'upgradeoverdueinfo' ), 'error' );
		echo $infobox;
		ob_get_contents(  );
		$content = ;
		ob_end_clean(  );
		$aInt->content = $content;
		$aInt->displayPopUp(  );
		exit(  );

		if (upgradeAlreadyInProgress( $id )) {
			get_query_val( 'tblupgrades', 'orderid', array( 'status' => 'Pending', 'relid' => $id ) );
			$orders = ;
			infoBox( $aInt->lang( 'services', 'upgradealreadyinprogress' ), $aInt->lang( 'services', 'upgradealreadyinprogressinfo' ) . ' <a href=\'#\' id=\'viewOrder\'>' . $aInt->lang( 'orders', 'vieworder' ) . '</a>', 'error' );
			echo $infobox;
			echo  . '<script>
            $(\'a#viewOrder\').click(function() {
                window.opener.location.href = \'orders.php?action=view&id=' . $orders . '\';
                window.close();
            });
        </script>';
			ob_get_contents(  );
			$content = ;
			ob_end_clean(  );
			$aInt->content = $content;
			$aInt->displayPopUp(  );
			exit(  );
			getCurrency( $userid );
			$currency = ;

			if ($action == 'getcycles') {
				check_token( 'WHMCS.admin.default' );
				ajax_getcycles( $pid );
				exit(  );
			}
		}
	}
}
else {
	if ($action == 'order') {
		check_token( 'WHMCS.admin.default' );
		$_SESSION['uid'] = $userid;

		if ($type == 'product') {
			SumUpPackageUpgradeOrder( $id, $newproductid, $billingcycle, $promocode, $service_paymentmethod, true );
			$upgrades = ;
		}
	}
}

echo ( 'services', 'productcycle' );
echo '</label>';

if (count( $configoptions )) {
	echo ' <input type="radio" name="type" value="configoptions" id="typeconfigoptions" onclick="window.location=\'';
	echo $_SERVER['PHP_SELF'] . '?id=' . $id . '&type=configoptions';
	echo '\'"';

	if ($type == 'configoptions') {
		echo ' checked';
		echo ' /> <label for="typeconfigoptions">';
		echo $aInt->lang( 'setup', 'configoptions' );
		echo '</label>';
		echo '</td></tr>
';

		if ($type == 'product') {
			echo '<tr><td class="fieldlabel">';
			echo $aInt->lang( 'services', 'newservice' );
			echo '</td><td class="fieldarea"><select name="newproductid" id="newpid">';
			echo $aInt->productDropDown( $service_pid );
			echo '</select></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'fields', 'billingcycle' );
			echo '</td><td class="fieldarea" id="billingcyclehtml">';
			ajax_getcycles( $service_pid );
			echo '</td></tr>
';
		}
	}
}


if ($optiontype == '1') {
	echo  . '<select name="configoption[' . $optionid . ']" onchange="calctotals()">';
	foreach ($configoption['options'] as ) {
		$option = ;
		echo (  . '<option value="' . $option['id'] . '"' );

		if ($option['hidden']) {
			echo ' style=\'color:#ccc;\'';

			if ($selectedvalue == $option['id']) {
				echo ' selected';
				echo (  . '>' ) . $option['name'] . '</option>';
				break;
			}

			break;
		}
	}

	echo '</select>';
}

jmp;
( array( 'upgrades' => '1' ), 'code', 'ASC' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['id'];
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

	$promo_recurring = (true ? $aInt->lang( 'status', 'recurring' ) : $aInt->lang( 'status', 'onetime' ));
	$promo_type == 'Price Override';
}


if () {
	$aInt->lang( 'promos', 'priceoverride' );
	$promo_recurring = ;

	if ($promo_type == 'Free Setup') {
		$promo_recurring = '';
		echo '<option value="' . $promo_code . '"';

		if ($promo_id == $promoid) {
			echo ' selected';
			echo '>' . $promo_code . ' - ' . $promo_value . ' ' . $promo_recurring . '</option>';
		}

		jmp;
		echo ( 'createorder' );
	}
}

echo '" /></p>

</form>

<p align="center"><input type="button" value="';
echo $aInt->lang( 'addons', 'closewindow' );
echo '" onClick="window.close()" class="button btn btn-default"></p>

';
ob_get_contents(  );
$content = define( 'ADMINAREA', true );
ob_end_clean(  );
$aInt->content = $content;
$aInt->displayPopUp(  );
?>
