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
new dgeegejige( 'Configure Product Addons' );
$aInt = ;
$aInt->title = $aInt->lang( 'addons', 'productaddons' );
$aInt->sidebar = 'config';
$aInt->icon = 'productaddons';
$aInt->helplink = 'Product Addons';
$whmcs->get_req_var( 'action' );
$action = ;
$id = (int)$whmcs->get_req_var( 'id' );

if ($action == 'save') {
	check_token( 'WHMCS.admin.default' );
	$whmcs->get_req_var( 'name' );
	$name = ;
	$whmcs->get_req_var( 'description' );
	$description = ;
	$whmcs->get_req_var( 'billingcycle' );
	$billingcycle = ;
	$whmcs->get_req_var( 'packages' );
	$packages = array(  );
	$whmcs->get_req_var( 'tax' );
	$tax = ;
	$whmcs->get_req_var( 'showorder' );
	$showorder = ;
	$whmcs->get_req_var( 'autoactivate' );
	$autoactivate = ;
	$whmcs->get_req_var( 'suspendproduct' );
	$suspendproduct = ;
	$whmcs->get_req_var( 'downloads' );
	$downloads = array(  );
	$welcomeemail = (int)$whmcs->get_req_var( 'welcomeemail' );
	$weight = (int)$whmcs->get_req_var( 'weight' );

	if (is_array( $packages )) {
		$apppackages = (true ? implode( ',', $packages ) : '');

		if ($id) {
			dacfgegdhe::table( 'tbladdons' )->find( $id );
			$addon = ;

			if ($addon->name != $name) {
				logAdminActivity(  . 'Product Addon Modified: Name Changed: \'' . $addon->name . '\' to \'' . $name . '\' - Product Addon ID: ' . $id );

				if (( ( ( ( ( ( ( ( ( $addon->description != $description || $addon->billingcycle != $billingcycle ) || $addon->packages != $apppackages ) || $addon->tax != $tax ) || $addon->showorder != $showorder ) || $addon->autoactivate != $autoactivate ) || $addon->suspendproduct != $suspendproduct ) || $addon->downloads != implode( ',', $downloads ) ) || $addon->welcomeemail != $welcomeemail ) || $addon->weight != $weight )) {
					logAdminActivity(  . 'Product Addon Modified: \'' . $name . '\' - Product Addon ID: ' . $id );
					update_query( 'tbladdons', array( 'name' => $name, 'description' => dfdidhdbdc::decode( $description ), 'billingcycle' => $billingcycle, 'packages' => $apppackages, 'tax' => $tax, 'showorder' => $showorder, 'autoactivate' => $autoactivate, 'suspendproduct' => $suspendproduct, 'downloads' => implode( ',', $downloads ), 'welcomeemail' => $welcomeemail, 'weight' => $weight ), array( 'id' => $id ) );
				}
			}
		}
	}

	(  );
	get_query_val( 'tbladdons', 'name', array( 'id' => $id ) );
	$addonname = ;
	update_query( 'tblhostingaddons', array( 'addonid' => '0', 'name' => $addonname ), array( 'addonid' => $id ) );
	delete_query( 'tbladdons', array( 'id' => $id ) );
	delete_query( 'tblpricing', array( 'type' => 'addon', 'relid' => $id ) );
	logAdminActivity(  . 'Product Addon Deleted: \'' . $addonname . '\' - Product Addon ID: ' . $id );
	infoBox( $aInt->lang( 'addons', 'addondeletesuccess' ), $aInt->lang( 'addon', 'addondelsuccessinfo' ) );
	redir( 'deleted=true' );
	ob_start(  );

	if (!$action) {
		if ($saved) {
			infoBox( $aInt->lang( 'addons', 'changesuccess' ), $aInt->lang( 'addons', 'changesuccessinfo' ) );

			if ($deleted) {
				infoBox( $aInt->lang( 'addons', 'addondeletesuccess' ), $aInt->lang( 'addons', 'addondelsuccessinfo' ) );

				if ($created) {
					infoBox( $aInt->lang( 'addons', 'addonaddsuccess' ), $aInt->lang( 'addons', 'addonaddsuccessinfo' ) );
					echo $infobox;
					$aInt->deleteJSConfirm( 'doDelete', 'addons', 'areyousuredelete', $_SERVER['PHP_SELF'] . '?action=delete&id=' );
					echo '
<p>';
				}
			}
		}
	}
}


while (true) {
	while (true) {
		echo $aInt->lang( 'addons', 'description' );
		echo '</p>

<p><a href="';
		echo $whmcs->getPhpSelf(  );
		echo '?action=manage" class="btn btn-default"><i class="fa fa-plus"></i> ';
		echo $aInt->lang( 'addons', 'addnew' );
		echo '</a></p>

';
		$aInt->sortableTableInit( 'nopagination' );
		select_query( 'tbladdons', '', '', 'weight` ASC,`name', 'ASC' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$addonid = ;
			$data['packages'];
			$packages = ;
			$data['name'];
			$name = ;
			$data['description'];
			$description = ;
			$data['recurring'];
			$recurring = ;
			$data['setupfee'];
			$setupfee = ;
			$data['billingcycle'];
			$billingcycle = ;
			$data['showorder'];
			$showorder = ;
			$data['weight'];
			$weight = ;

			if ($showorder) {
				$showorder = (true ? '<img src="images/icons/tick.png" alt="Yes" border="0" />' : '&nbsp;');
				$tabledata[] = array( $name, $description, $billingcycle, $showorder, $weight,  . '<a href="?action=manage&id=' . $addonid . '"><img src="images/edit.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'edit' ) . '"></a>',  . '<a href="#" onClick="doDelete(\'' . $addonid . '\')"><img src="images/delete.gif" width="16" height="16" border="0" alt="' . $aInt->lang( 'global', 'delete' ) . '"></a>' );
			}

			break 2;
		}

		$v = ;
		$k =  = ;
		echo '<td class="fieldlabel">' . $k . '</td><td class="fieldarea">' . $v . '</td></tr>';
	}
}

echo '</table>

<h2>';
echo $aInt->lang( 'addons', 'applicableproducts' );
echo '</h2>

<div class="row">
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
	echo (  . '<div class="col-sm-6 col-md-4"><label class="checkbox-inline"><input type="checkbox" name="packages[]" value="' . $id . '"' );

	if (in_array( $id, $packages )) {
		echo ' checked';
			. '> ' . $groupname . ' - ' . $name . '</label></div>';
	}

	echo ;
	break;
}

echo '</div>

<div class="btn-container">
    <input type="submit" value="';
echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-primary">
    <input type="button" value="';
echo $aInt->lang( 'global', 'cancelchanges' );
echo '" class="btn btn-default" onclick="window.location=\'configaddons.php\'" />
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
