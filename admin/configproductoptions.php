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
new dgeegejige( 'View Products/Services' );
$aInt = ;
$aInt->title = 'Configurable Option Groups';
$aInt->sidebar = 'config';
$aInt->icon = 'configoptions';
$aInt->helplink = 'Configurable Options';

if ($manageoptions) {
	select_query( 'tblcurrencies', '', '', 'code', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$curr_id = ;
		$data['code'];
		$curr_code = ;
		$currenciesarray[$curr_id] = $curr_code;
	}
}
else {
	checkPermission( 'Delete Products/Services' );
	$cid = (int)$whmcs->get_req_var( 'cid' );
	$confid = (int)$whmcs->get_req_var( 'confid' );
	dacfgegdhe::table( 'tblproductconfigoptions' )->find( $cid );
	$configOption = ;
	dacfgegdhe::table( 'tblproductconfiggroups' )->find( $configOption->gid );
	$group = ;
	dacfgegdhe::table( 'tblproductconfigoptionssub' )->find( $confid );
	$option = ;
	delete_query( 'tblproductconfigoptionssub', array( 'id' => $confid ) );
	logAdminActivity( (  . 'Configurable Option Modified - \'' . $configOption->name . '\' - Option Removed: \'' . $option->optionname . '\'' ) . (  . ' - Group: ' . $group->name . ' - Option Group ID: ' . $gid ) );
	redir(  . 'manageoptions=true&cid=' . $cid );
	$aInt->title = 'Configurable Options';
	select_query( 'tblproductconfigoptions', '', array( 'id' => $cid ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$cid = ;
	$data['optionname'];
	$optionname = ;
	$data['optiontype'];
	$optiontype = ;
	$data['qtyminimum'];
	$qtyminimum = ;
	$data['qtymaximum'];
	$qtymaximum = ;
	$data['order'];
	$order = ;
	ob_start(  );
	echo '
<script langauge="JavaScript">
function deletegroupoption(id) {
    if (confirm("Are you sure you want to delete this product configuration option?")) {
        window.location=\'';
	echo $whmcs->getPhpSelf(  );
	echo '?manageoptions=true&cid=';
	echo $cid;
	echo '&deleteconfigoption=true&confid=\'+id+\'';
	echo generate_token( 'link' );
	echo '\';
    }
}
function closewindow() {
    window.opener.document.managefrm.submit();
    window.close();
}
</script>

<form method="post" action="';
	echo $_SERVER['PHP_SELF'];
	echo '?manageoptions=true&cid=';
	echo $cid;

	if ($gid) {
		echo  . '&gid=' . $gid;
		echo '&save=true">

<p>Option Name: <input type="text" name="configoptionname" size="50" value="';
		echo $optionname;
		echo '" class="form-control" style="display:inline-block;width:50%;" /> Option Type: <select name="configoptiontype" class="form-control select-inline"><option value="1"';

		if ($optiontype == '1') {
			echo ' selected';
			echo '>Dropdown</option><option value="2"';

			if ($optiontype == '2') {
				echo ' selected';
				echo '>Radio</option><option value="3"';

				if ($optiontype == '3') {
					echo ' selected';
					echo '>Yes/No</option><option value="4"';

					if ($optiontype == '4') {
						echo ' selected';
						echo '>Quantity</option></select>';

						if ($optiontype == '4') {
							echo '<br>Minimum Quantity Required: <input type="text" name="qtyminimum" size="6" value="' . $qtyminimum . '" /> Maximum Allowed: <input type="text" name="qtymaximum" size="6" value="' . $qtymaximum . '" /> (Set to 0 for Unlimited)';
							echo '</p>

<table class="table">
<tr bgcolor="#efefef" style="text-align:center;font-weight:bold;">
    <td>Options</td>
    <td width="70">&nbsp;</td>
    <td width="70">&nbsp;</td>
    <td width="70">';
							echo $aInt->lang( 'billingcycles', 'onetime' );
							echo '/<br />';
							echo $aInt->lang( 'billingcycles', 'monthly' );
							echo '</td><td width=70>Quarterly</td><td width=70>Semi-Annual</td><td width=70>Annual</td>
    <td width="70">Biennial</td>
    <td width="70">Triennial</td>
    <td width="80">Order</td>
    <td width="30">Hide</td>
</tr>
';
							$x = 24;
							$query = 'SELECT * FROM tblproductconfigoptionssub WHERE configid=\'' . (int)$cid . '\' ORDER BY sortorder ASC,id ASC';
							full_query( $query );
							$result = ;
							mysql_fetch_array( $result );

							if ($data = ) {
								++$x;
								$data['id'];
								$optionid = ;
								$data['optionname'];
								$optionname = ;
								$data['sortorder'];
								$sortorder = ;
								$data['hidden'];
								$hidden = ;
								echo  . '<tr bgcolor="#ffffff" style="text-align:center;"><td rowspan="' . $totalcurrencies . '"><input type="text" name="optionname[' . $optionid . ']" value="' . $optionname . '" class="form-control" style="min-width:180px;">';

								if (1 < $x) {
									echo  . '<br><a href="#" onclick="deletegroupoption(\'' . $optionid . '\');return false;"><img src="images/icons/delete.png" border="0">';
									echo '</td>';
									$firstcurrencydone = false;
									foreach ($currenciesarray as ) {
										$curr_code = ;
										$curr_id = ;
										select_query( 'tblpricing', '', array( 'type' => 'configoptions', 'currency' => $curr_id, 'relid' => $optionid ) );
										$result2 = ;
										mysql_fetch_array( $result2 );
										$data = ;
										$data['id'];
										$pricing_id = ;

										if (!$pricing_id) {
											insert_query( 'tblpricing', array( 'type' => 'configoptions', 'currency' => $curr_id, 'relid' => $optionid ) );
											select_query( 'tblpricing', '', array( 'type' => 'configoptions', 'currency' => $curr_id, 'relid' => $optionid ) );
											$result2 = ;
											mysql_fetch_array( $result2 );
											$data = ;
											$val[1] = $data['msetupfee'];
											$val[2] = $data['qsetupfee'];
											$val[3] = $data['ssetupfee'];
											$val[4] = $data['asetupfee'];
											$val[5] = $data['bsetupfee'];
											$val[11] = $data['tsetupfee'];
											$val[6] = $data['monthly'];
											$val[7] = $data['quarterly'];
											$val[8] = $data['semiannually'];
											$val[9] = $data['annually'];
											$val[10] = $data['biennially'];
											$val[12] = $data['triennially'];

											if ($firstcurrencydone) {
												echo '</tr><tr bgcolor="#ffffff" style="text-align:center;">';
												echo  . '<td rowspan="2" bgcolor="#efefef"><b>' . $curr_code . '</b></td><td>Setup</td><td><input type="text" name="price[' . $curr_id . '][' . $optionid . '][1]" value="' . $val[1] . '" class="form-control" style="width:80px;"></td><td><input type="text" name="price[' . $curr_id . '][' . $optionid . '][2]" value="' . $val[2] . '" class="form-control" style="width:80px;"></td><td><input type="text" name="price[' . $curr_id . '][' . $optionid . '][3]" value="' . $val[3] . '" class="form-control" style="width:80px;"></td><td><input type="text" name="price[' . $curr_id . '][' . $optionid . '][4]" value="' . $val[4] . '" class="form-control" style="width:80px;"></td><td><input type="text" name="price[' . $curr_id . '][' . $optionid . '][5]" value="' . $val[5] . '" class="form-control" style="width:80px;"></td><td><input type="text" name="price[' . $curr_id . '][' . $optionid . '][11]" value="' . $val[11] . '" class="form-control" style="width:80px;"></td>';

												if (!$firstcurrencydone) {
													echo  . '<td rowspan="' . $totalcurrencies . '"><input type="text" name="sortorder[' . $optionid . ']" value="' . $sortorder . '" class="form-control" style="width:60px;"></td><td rowspan="' . $totalcurrencies . '"><input type="checkbox" name="hidden[' . $optionid . ']" value="1"';

													if ($hidden) {
														echo ' checked';
														echo ' /></td>';
															. '</tr><tr bgcolor="#ffffff" style="text-align:center;"><td>Pricing</td><td><input type="text" name="price[' . $curr_id . '][' . $optionid;
													}
												}
											}

											echo  . '][6]" value="' . $val[6] . '" class="form-control" style="width:80px;"></td><td><input type="text" name="price[' . $curr_id . '][' . $optionid . '][7]" value="' . $val[7] . '" class="form-control" style="width:80px;"></td><td><input type="text" name="price[' . $curr_id . '][' . $optionid . '][8]" value="' . $val[8] . '" class="form-control" style="width:80px;"></td><td><input type="text" name="price[' . $curr_id . '][' . $optionid . '][9]" value="' . $val[9] . '" class="form-control" style="width:80px;"></td><td><input type="text" name="price[' . $curr_id . '][' . $optionid . '][10]" value="' . $val[10] . '" class="form-control" style="width:80px;"></td><td><input type="text" name="price[' . $curr_id . '][' . $optionid . '][12]" value="' . $val[12] . '" class="form-control" style="width:80px;"></td>';
											$firstcurrencydone = true;
											break;
										}

										break;
									}

									echo '</tr>';
								}
							}
						}
					}
				}
			}
		}
	}
	else {
		(  . (  . $id ) );
		redir(  . 'action=managegroup&id=' . $id );

		if ($action == 'deletegroup') {
			check_token( 'WHMCS.admin.default' );
			checkPermission( 'Delete Products/Services' );
			$id = (int)$whmcs->get_req_var( 'id' );
			dacfgegdhe::table( 'tblproductconfiggroups' )->find( $id );
			$group = ;
			select_query( 'tblproductconfigoptions', '', array( 'gid' => $id ) );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				$data['id'];
				$opid = ;
				delete_query;
			}
		}
	}
}


while (true) {
	while (true) {
		while (true) {
			( 'tblproductconfigoptions', array( 'id' => $opid ) );
			delete_query( 'tblproductconfigoptionssub', array( 'configid' => $opid ) );
			delete_query( 'tblhostingconfigoptions', array( 'configid' => $opid ) );
		}

		delete_query( 'tblproductconfiggroups', array( 'id' => $id ) );
		delete_query( 'tblproductconfiglinks', array( 'gid' => $id ) );
		logAdminActivity(  . 'Configurable Option Group Deleted - \'' . $group->name . '\' - Option Group ID: ' . $id );
		redir( 'deleted=true' );
		ob_start(  );
		$jscode = 'function doDelete(id) {
if (confirm("Are you sure you want to delete this configurable option group?")) {
window.location=\'' . $_SERVER['PHP_SELF'] . '?action=deletegroup&id=\'+id+\'' . generate_token( 'link' ) . '\';
}}';

		if ($action == '') {
			if ($deleted) {
				infoBox( 'Success', 'The option group has been deleted successfully!' );

				if ($duplicated) {
					infoBox( 'Success', 'The option group has been duplicated successfully!' );
					echo $infobox;
					echo '
<p>Configurable options allow you to offer addons and customisation options with your products. Options are assigned to groups and groups can then be applied to products.</p>

<p>
    <div class="btn-group" role="group">
        <a href="';
					echo $_SERVER['PHP_SELF'];
					echo '?action=managegroup" class="btn btn-default"><i class="fa fa-plus"></i> Create a New Group</a>
        <a href="';
					echo $_SERVER['PHP_SELF'];
					echo '?action=duplicategroup" class="btn btn-default"><i class="fa fa-plus-square"></i> Duplicate a Group</a>
    </div>
</p>

';
					$aInt->sortableTableInit( 'nopagination' );
				}

				select_query;
				'tblproductconfiggroups';
				'';
				'';
				'name';
			}
		}

		( 'ASC' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$id = ;
			$data['name'];
			$name = ;
			$data['description'];
			$description = ;
			$tabledata[] = array( $name, $description, '<a href="' . $_SERVER['PHP_SELF'] . (  . '?action=managegroup&id=' . $id . '"><img src="images/edit.gif" width="16" height="16" border="0" alt="Edit"></a>' ),  . '<a href="#" onClick="doDelete(\'' . $id . '\');return false"><img src="images/delete.gif" width="16" height="16" border="0" alt="Delete"></a>' );
			break 2;
		}

		jmp;
		echo ( array( '', '' ), $tabledata );
		jmp;

		if ($action == 'managegroup') {
			if ($id) {
				$steptitle = 'Manage Group';
				select_query( 'tblproductconfiggroups', '', array( 'id' => $id ) );
				$result = ;
				mysql_fetch_array( $result );
				$data = ;
				$data['id'];
				$id = ;
				$data['name'];
				$name = ;
				$data['description'];
				$description = ;
				$productlinks = array(  );
				select_query( 'tblproductconfiglinks', '', array( 'gid' => $id ) );
				$result = ;
				mysql_fetch_array( $result );

				if ($data = ) {
					$productlinks[] = $data['pid'];
				}
			}
		}
		else {
			$productlinks = ;
			$jscode = 'function manageconfigoptions(id) {
    window.open(\'' . $_SERVER['PHP_SELF'] . '?manageoptions=true&cid=\'+id,\'configoptions\',\'width=900,height=500,scrollbars=yes\');
}
function addconfigoption() {
    window.open(\'' . $_SERVER['PHP_SELF'] . '?manageoptions=true&gid=' . $id . '\',\'configoptions\',\'width=800,height=500,scrollbars=yes\');
}
function doDelete(id,opid) {
    if (confirm("Are you sure you want to delete this configurable option?")) {
        window.location=\'' . $_SERVER['PHP_SELF'] . '?action=deleteoption&id=\'+id+\'&opid=\'+opid+\'' . generate_token( 'link' ) . '\';
    }
}';
			echo '
<form method="post" action="';
			echo $_SERVER['PHP_SELF'];
			echo '?action=savegroup&id=';
			echo $id;
			echo '" name="managefrm">

<p><b>';
			echo $steptitle;
			echo '</b></p>
<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="15%" class="fieldlabel">Group Name</td><td class="fieldarea"><input type="text" name="name" size="40" value="';
			echo $name;
			echo '"></td></tr>
<tr><td class="fieldlabel">Description</td><td class="fieldarea"><input type="text" name="description" size="80" value="';
			echo $description;
			echo '"></td></tr>
<tr><td class="fieldlabel">Assigned Products</td><td class="fieldarea"><select name="productlinks[]" size="8" style="width:90%" multiple>
';
			new eadeihghbj(  );
			$products = ;
			$products->getProducts(  );
			$productsList = ;
			foreach ($productsList as ) {
				$data = ;
				$data['id'];
				$pid = ;
				$data['groupname'];
			}
		}

		$groupname = ;
		$data['name'];
		$name = ;
		echo (  . '<option value="' . $pid . '"' );

		if (in_array( $pid, $productlinks )) {
			echo ' selected';
			echo (  . '>' ) . $groupname . ' - ' . $name . '</option>';
		}

		break;
	}

	echo $aInt->sortableTable( array( 'Option', 'Sort Order', 'Hidden', '', '' ), $tabledata );
	echo '
<P ALIGN="center"><input type="submit" value="Save Changes" class="btn btn-primary" /> <input type="button" value="Back to Groups List" onClick="window.location=\'configproductoptions.php\'" class="btn btn-default" /></P>

</form>

';
	break;
}

echo '</select></td></tr>
<tr><td class="fieldlabel">New Group Name</td><td class="fieldarea"><input type="text" name="newgroupname" size="50"></td></tr>
</table>
<div class="btn-container">
    <input type="submit" value="Continue &raquo;" class="btn btn-primary">
</div>
</form>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
