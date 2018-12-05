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

function BundleDomainsConfigOptions($vals, $suffix = '') {
	global $aInt;

	$exts = array(  );
	select_query( 'tbldomainpricing', 'extension', '', 'order', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		while (true) {
			$exts[] = $data['extension'];
		}


		if (!count( $exts )) {
			return false;
			echo '<b>' . $aInt->lang( 'bundles', 'qualifyingtlds' ) . '</b><br />
<div style="background-color:#efefef;padding:5px;margin:2px;">
';
			foreach ($exts as ) {
				$ext = ;
				echo '<label class="checkbox-inline"><input type="checkbox" name="tlds' . $suffix . '[]" value="' . $ext . '"';

				if (in_array( $ext, $vals['tlds'] )) {
					echo ' checked';
					echo ' /> ' . $ext . '</label>';
					break;
				}

				break;
			}

			'
</div>
<br />
<b>' . $aInt->lang( 'domains', 'regperiod' ) . '</b><br />
<div style="background-color:#efefef;padding:5px;margin:2px;">
<select name="regperiod' . $suffix;
		}
	}


	while (true) {
		echo  . '"><option value="0">' . $aInt->lang( 'bundles', 'norestriction' ) . '</option>
';
		$regperiodss = '';
		$regperiod = 7;

		if ($regperiod <= 10) {
			echo '<option value="' . $regperiod . '"';

			if ($vals['regperiod'] == $regperiod) {
				echo ' selected';
				'>' . $regperiod . ' ';
				$aInt->lang;
				'domains';
				'year' . $regperiodss;
			}
		}

		echo  . (  ) . '</option>';
		$regperiodss = 's';
		++$regperiod;
	}

	'
</select>
</div>
<br />
<b>' . $aInt->lang( 'fields', 'priceoverride' ) . '</b><br />
<div style="background-color:#efefef;padding:5px;margin:2px;">
<label class="checkbox-inline"><input type="checkbox" name="dompriceoverride' . $suffix . '" value="1"';

	if ($vals['dompriceoverride']) {
			. (true ? ' checked' : '') . ' />' . $aInt->lang( 'bundles', 'enableamount' ) . ':</label> <input type="text" name="domprice' . $suffix . '" size="10" value="' . $vals['domprice'] . '" />' . $aInt->lang( 'bundles', 'pricebeforeaddons' ) . '
</div>
<br />
<b>' . $aInt->lang( 'domains', 'domainaddons' ) . '</b><br />
<div style="background-color:#efefef;padding:5px;margin:2px;">
<label class="checkbox-inline"><input type="checkbox" name="domaddons' . $suffix . '[]" value="dnsmanagement"';

		if (( in_array( 'dnsmanagement', $vals['domaddons'] ) || in_array( 'dnsmanagement', $vals['addons'] ) )) {
				. (true ? ' checked' : '') . ' /> ' . $aInt->lang( 'domains', 'dnsmanagement' ) . '</label><br />
<label class="checkbox-inline"><input type="checkbox" name="domaddons' . $suffix . '[]" value="emailforwarding"';
			(  || in_array( 'emailforwarding', $vals['domaddons'] ) );
			in_array( 'emailforwarding', $vals['addons'] );
		}
	}


	if ((bool)) {
			. (true ? ' checked' : '');
	}

		. ' /> ' . $aInt->lang( 'domains', 'emailforwarding' ) . '</label><br />
<label class="checkbox-inline"><input type="checkbox" name="domaddons' . $suffix . '[]" value="idprotection"';

	if (( in_array( 'idprotection', $vals['domaddons'] ) || in_array( 'idprotection', $vals['addons'] ) )) {
			. (true ? ' checked' : '');
	}

	echo  . ' /> ' . $aInt->lang( 'domains', 'idprotection' ) . '</label>
</div>';
}

define( 'ADMINAREA', true );
require( '../init.php' );
new dgeegejige( 'Configure Product Bundles' );
$aInt = ;
$aInt->title = $aInt->lang( 'setup', 'bundles' );
$aInt->sidebar = 'config';
$aInt->icon = 'bundles';
$aInt->helplink = $aInt->lang( 'setup', 'bundles' );
$aInt->requiredFiles( array( 'configoptionsfunctions' ) );

if ($saveorder) {
	check_token( 'WHMCS.admin.default' );
	select_query( 'tblbundles', '', array( 'id' => $id ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$id = ;
	$data['itemdata'];
	$itemdata = ;
	unserialize( $itemdata );
	$itemdata = ;
	$newitemdata = array(  );
	foreach ($orderdata as ) {
		$item = ;
		substr( $item, 4 );
		$item = ;
		$newitemdata[] = $itemdata[$item];
		break;
	}

	update_query( 'tblbundles', array( 'itemdata' => serialize( $newitemdata ) ), array( 'id' => $id ) );
	logAdminActivity(  . 'Bundle Modified: ' . $data['name'] . ' - Bundle ID: ' . $id );
	exit(  );

	if ($action == 'getaddons') {
		check_token( 'WHMCS.admin.default' );
		select_query( 'tblbundles', '', array( 'id' => $bid ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['id'];
		$id = ;
		$data['itemdata'];
		$itemdata = ;
		unserialize( $itemdata );
		$itemdata = ;
		$vals = '';

		if ($i) {
			$i = (int)$i;

			if (strlen( $i )) {
				$itemdata[$i];
				$vals = ;

				if (!$vals) {
					$vals = array(  );

					if (is_array( $vals['configoption'] )) {
						$configoption = (true ? $vals['configoption'] : array(  ));

						if (is_array( $vals['addons'] )) {
							$addon = (true ? $vals['addons'] : array(  ));
							getCurrency(  );
							$currency = ;
							getCartConfigOptions( $pid, $configoptions, '', '', true );
							$configoptions = ;

							if (count( $configoptions )) {
								echo '<b>' . $aInt->lang( 'setup', 'configoptions' ) . '</b><br />
<div style="background-color:#efefef;padding:5px;margin:2px;">
<table>';
								foreach ($configoptions as ) {
									$vals = ;
									$vals['id'];
									$opid = ;
								}
							}
						}
					}
				}
			}
		}
	}

	$vals['optionname'];
	$optionname = ;
	$vals['optiontype'];
	$optiontype = ;
	$vals['options'];
	$options = ;
	echo '<tr><td width="100">' . $optionname . '</td><td><label class="checkbox-inline"><input type="checkbox" name="coprestrict[]" value="' . $opid . '"';

	if (array_key_exists( $opid, $configoption )) {
		echo ' checked';
		echo ' />' . $aInt->lang( 'bundles', 'restrict' ) . '</label></td><td>';

		if (( $optiontype == 1 || $optiontype == 2 )) {
			echo '<select name="coopval[' . $opid . ']">';
			foreach ($options as ) {
				$svals = ;
				echo '<option value="' . $svals['id'] . '"';

				if ($svals['id'] == $configoption[$opid]) {
					echo ' selected';
					echo '>' . $svals['name'] . '</option>';
					break;
				}

				break;
			}

			echo '</select>';
		}
	}


	while (true) {
		echo  . $opid . ']" size="5" value="' . $configoption[$opid] . '" />';
		echo '</td></tr>';
	}

	echo '</table>
</div><br />';
	$addons = '';
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
		explode( ',', $packages );
		$addon_packages = ;

		if (in_array( $pid, $addon_packages )) {
			'<label class="checkbox-inline"><input type="checkbox" name="addons[]" value="' . $addonid . '"';

			if (in_array( $addonid, $addon )) {
				$addons .=  . (true ? ' checked' : '') . ' /> ' . $name . '</label><br />';
			}
		}
	}

	$data['itemdata'];
	$itemdata = ;

	if ($itemdata) {
		$itemdata = (true ? unserialize( $itemdata ) : array(  ));

		if ($type == 'product') {
			foreach ($coopval as ) {
				$opid = ;
				$cid = ;

				if (!in_array( $cid, $coprestrict )) {
					unset( $coopval[$cid] );
					break;
				}

				break;
			}

			foreach ($coprestrict as ) {
				$cid = ;

				if (!array_key_exists( $cid, $coopval )) {
					$coopval[$cid] = '';
					break;
				}

				break;
			}

			$vals = array( 'type' => 'product', 'pid' => $pid, 'billingcycle' => $billingcycle, 'priceoverride' => $priceoverride, 'price' => format_as_currency( $price ), 'configoption' => $coopval, 'addons' => $addons, 'tlds' => $tlds, 'regperiod' => $regperiod, 'dompriceoverride' => $dompriceoverride, 'domprice' => format_as_currency( $domprice ), 'domaddons' => $domaddons );
		}
	}
	else {
		(  );
		$validuntil = ;
		fromMySQLDate( '0000-00-00' );
		$validuntilblank = ;
	}
}
else {
	echo '><td class="fieldlabel">';
	echo $aInt->lang( 'products', 'productdesc' );
	echo '</td><td class="fieldarea"><table cellspacing=0 cellpadding=0><tr><td><textarea name="description" cols=60 rows=5>';
	echo dfdidhdbdc::encode( $description );
	echo '</textarea></td><td>';
	echo $aInt->lang( 'products', 'htmlallowed' );
	echo '<br>&lt;br /&gt; ';
	echo $aInt->lang( 'products', 'htmlnewline' );
	echo '<br>&lt;strong&gt;';
	echo $aInt->lang( 'products', 'htmlbold' );
	echo '&lt;/strong&gt; <b>';
	echo $aInt->lang( 'products', 'htmlbold' );
	echo '</b><br>&lt;em&gt;';
	echo $aInt->lang( 'products', 'htmlitalics' );
	echo '&lt;/em&gt; <i>';
	echo $aInt->lang( 'products', 'htmlitalics' );
	echo '</i></td></tr></table></td></tr>
<tr class="prodfields"';

	if (!$showgroup) {
		echo ' style="display:none;"';
		echo '><td class="fieldlabel">';
		echo $aInt->lang( 'bundles', 'displayprice' );
		echo '</td><td class="fieldarea"><input type="text" name="displayprice" value="';
		echo $displayprice;
		echo '" size="10" /> ';
		echo $aInt->lang( 'bundles', 'displaypricedesc' );
		echo '</td></tr>
<tr class="prodfields"';

		if (!$showgroup) {
			echo ' style="display:none;"';
			echo '><td class="fieldlabel">';
			$aInt->lang;
		}
	}
}

echo ( 'products', 'sortorder' );
echo '</td><td class="fieldarea"><input type="text" name="sortorder" value="';
echo $sortorder;
echo '" size="5" /> ';
echo $aInt->lang( 'bundles', 'sortorderdesc' );
echo '</td></tr>
<tr class="prodfields"';

if (!$showgroup) {
	echo ' style="display:none;"';
	echo '><td class="fieldlabel">';
	echo AdminLang::trans( 'fields.featured' );
	echo '</td><td class="fieldarea"><label class="checkbox-inline"><input type="checkbox" name="isFeatured"';

	if ($isFeatured) {
		echo ' checked';
		echo '> ';
		echo AdminLang::trans( 'bundles.featuredDescription' );
		echo '</label></td></tr>
';

		if ($id) {
			'<tr><td class="fieldlabel">' . $aInt->lang( 'bundles', 'orderlink' ) . '</td><td class="fieldarea"><input type="text" name="orderlink" size="100" value="' . $url . '/cart.php?a=add&bid=';
		}

		echo  . $id . '" /></td></tr>';
		echo '</table>

<div class="btn-container">
    <input type="submit" value="';
		echo $aInt->lang( 'global', 'savechanges' );
		echo '" class="btn btn-primary">
    <input type="button" value="';
		$aInt->lang( 'global', 'cancelchanges' );
	}

	echo ;
	echo '" class="btn btn-default" onclick="window.location=\'configbundles.php\'" />
</div>

</form>

';
	echo $aInt->modal( 'ProductConfig', $aInt->lang( 'bundles', 'configureproduct' ), '<img src="images/loading.gif" /> ' . $aInt->lang( 'global', 'loading', 1 ), array( array( 'title' => $aInt->lang( 'global', 'savechanges' ), 'onclick' => '$("#conffrm").submit()' ), array( 'title' => $aInt->lang( 'global', 'cancelchanges' ) ) ) );
	$jquerycode .= '$( ".bundleitems" ).sortable({
    stop: function(event, ui) { saveBundleOrder() }
});';
	$jscode .= 'function manageitem(id,i) {
    jQuery("#modalProductConfigBody").html("<img src=\"images/loading.gif\" /> ' . $aInt->lang( 'global', 'loading', 1 ) . '");
    jQuery("#modalProductConfig").modal("show");
    jQuery("#modalProductConfigBody").load("configbundles.php?action=confproduct&id=" + id + "&i=" + i + "' . generate_token( 'link' ) . '");
}
function deleteitem(id,i) {
    if (confirm("' . $aInt->lang( 'bundles', 'removeitemconfirm' ) . '")) {
        window.location=\'' . $_SERVER['PHP_SELF'] . '?action=deleteitem&id=\'+id+\'&i=\'+i+\'' . generate_token( 'link' ) . '\';
    }
}
function saveBundleOrder() {
    var order = $(".bundleitems").sortable("toArray");
    for (var i = 0; i < order.length; i++) {
        $("#num"+order[i]).html(i+1);
    }
    $.post("configbundles.php", { saveorder: "1", id: "' . $id . '", orderdata: order, token: "' . generate_token( 'plain' ) . '" });
}
function toggleProdFields() {
    $(".prodfields").fadeToggle();
}
';
	ob_get_contents(  );
	$content = ;
	ob_end_clean;
}

(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
