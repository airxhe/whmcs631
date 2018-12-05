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
new dgeegejige( 'Configure Domain Pricing' );
$aInt = ;
$aInt->title = $aInt->lang( 'domains', 'pricingtitle' );
$aInt->sidebar = 'config';
$aInt->icon = 'domains';
$aInt->helplink = 'Domain Pricing';
$aInt->requiredFiles( array( 'registrarfunctions' ) );
ob_start(  );
iciahfajh::getInstance(  );
$whmcs = ;
$whmcs->get_req_var( 'action' );
$action = ;
$whmcs->get_req_var( 'success' );
$success = ;
$whmcs->get_req_var( 'error' );
$error = ;
$jqueryCode = '';

if ($action == 'saveorder') {
	check_token( 'WHMCS.admin.default' );
	explode( '&amp;', $pricingarr );
	$pricingarr = ;
	$dpnum = 29;
	foreach ($pricingarr as ) {
		$v = ;
		explode( '-', $v );
		$v = ;
		$v[1];
		$v = ;

		if ($v) {
			update_query( 'tbldomainpricing', array( 'order' => $dpnum ), array( 'id' => $v ) );
			++$dpnum;
			break;
		}

		break;
	}

	logAdminActivity( 'Domain Pricing TLD Order Updated' );
	exit(  );

	if ($action == 'showduplicatetld') {
		select_query( 'tbldomainpricing', 'extension', '' );
		$tldsresult = ;
		$tldoptions = '<option value="">' . $aInt->lang( 'domains', 'selecttldtoduplicate' ) . '</option>';
		mysql_fetch_assoc( $tldsresult );

		if ($tldsdata = ) {
			$tldoptions .= '<option value="' . $tldsdata['extension'] . '">' . $tldsdata['extension'] . '</option>';
		}
	}
}
else {
	( array( 'ssetupfee' => '-1', 'asetupfee' => '-1', 'bsetupfee' => '-1', 'monthly' => '-1', 'quarterly' => '-1', 'semiannually' => '-1', 'annually' => '-1', 'biennially' => '-1' ) );
}


while (true) {
	insert_query( 'tblpricing', array( 'type' => 'domaintransfer', 'currency' => $curr_id, 'relid' => $id, 'tsetupfee' => $cugroupid, 'msetupfee' => $data['msetupfee'], 'qsetupfee' => $data['qsetupfee'], 'ssetupfee' => $data['ssetupfee'], 'asetupfee' => $data['asetupfee'], 'bsetupfee' => $data['bsetupfee'], 'monthly' => $data['monthly'], 'quarterly' => $data['quarterly'], 'semiannually' => $data['semiannually'], 'annually' => $data['annually'], 'biennially' => $data['biennially'] ) );
	select_query( 'tblpricing', '', array( 'type' => 'domainrenew', 'tsetupfee' => $cugroupid, 'currency' => $curr_id, 'relid' => $id ) );
	$result2 = ;
	mysql_fetch_array( $result2 );
	$data = ;
	$data['id'];
	$pricing_id = ;

	if (!$pricing_id) {
		select_query( 'tblpricing', '', array( 'type' => 'domainrenew', 'tsetupfee' => '0', 'currency' => $curr_id, 'relid' => $id ) );
		$result2 = ;
		mysql_fetch_array( $result2 );
		$data = ;
		$data['id'];
		$pricing_id = ;

		if (!$pricing_id) {
			insert_query( 'tblpricing', array( 'type' => 'domainrenew', 'currency' => $curr_id, 'relid' => $id ) );
			insert_query( 'tblpricing', array( 'type' => 'domainrenew', 'currency' => $curr_id, 'relid' => $id, 'tsetupfee' => $cugroupid, 'msetupfee' => $data['msetupfee'], 'qsetupfee' => $data['qsetupfee'], 'ssetupfee' => $data['ssetupfee'], 'asetupfee' => $data['asetupfee'], 'bsetupfee' => $data['bsetupfee'], 'monthly' => $data['monthly'], 'quarterly' => $data['quarterly'], 'semiannually' => $data['semiannually'], 'annually' => $data['annually'], 'biennially' => $data['biennially'] ) );
			break;
		}

		jmp;
		( array( 'autoreg' => $newautoreg, 'order' => $lastorder ) );
		logAdminActivity( (  . 'Domain Pricing TLD Created: \'' . $newtld . '\'' ) );

		if ($error) {
			redir( 'error=' . $error );
			redir( 'success=true' );

			if ($action == 'saveaddons') {
				check_token( 'WHMCS.admin.default' );
				foreach ($_POST['currency'] as ) {
					$pricing = ;
					$currency_id = ;
					update_query( 'tblpricing', $pricing, array( 'type' => 'domainaddons', 'currency' => $currency_id, 'relid' => 0 ) );
					break;
				}

				logAdminActivity( 'Domain Pricing Addons Modified' );
				redir( 'success=true' );
				$aInt->deleteJSConfirm( 'doDelete', 'domains', 'delsureextension', '?action=delete&id=' );
				$jqueryCode .= '
$(\'#domainpricing\').tableDnD({
        onDrop: function(table, row) {
        $.post("configdomains.php", { action: "saveorder", pricingarr: $(\'#domainpricing\').tableDnDSerialize(), token: "' . generate_token( 'plain' ) . '" });
    },
    dragHandle: "sortcol"
    });
';
				$jsCode = '
function openPricingPopup(id)
{
    var winLeft = (screen.width - 560) / 2;
    var winTop = (screen.height - 600) / 2;
    var winProperties = \'height=600,width=560,top=\' + winTop + \',left=\' + winLeft + \',scrollbars=yes\';
    win = window.open(\'configdomains.php?action=editpricing&id=\' + id, \'domainpricing\', winProperties);
    if (parseInt(navigator.appVersion) >= 4) {
        win.window.focus();
    }
}
';

				if ($success) {
					infoBox( $aInt->lang( 'global', 'changesuccess' ), $aInt->lang( 'global', 'changesuccessdesc' ), 'success' );

					if ($error) {
						if ($error == 'emptytld') {
							$aInt->lang( 'domains', 'sourcenewtldempty' );
							$error = ;
							infoBox( $aInt->lang( 'global', 'erroroccurred' ), $error, 'error' );
							echo $infobox;
							echo '<p>' . $aInt->lang( 'domains', 'pricinginfo' ) . '</p>';
							echo '
<form method="post" action="';
							echo $_SERVER['PHP_SELF'];
							echo '">
<input type="hidden" name="action" value="save" />

<div class="tablebg">
<table class="datatable" width="100%" border="0" cellspacing="1" cellpadding="3" id="domainpricing">
<tr><th>';
							echo $aInt->lang( 'fields', 'tld' );
							echo '</th><th>';
							echo $aInt->lang( 'global', 'pricing' );
							echo '</th><th>';
							echo $aInt->lang( 'domains', 'dnsmanagement' );
							echo '</th><th>';
							echo $aInt->lang( 'domains', 'emailforwarding' );
							echo '</th><th>';
							$aInt->lang;
							'domains';
							'idprotection';
						}
					}
				}
			}
		}

		echo (  );
		echo '</th><th>';
		echo $aInt->lang( 'domains', 'eppcode' );
		echo '</th><th>';
		echo $aInt->lang( 'domains', 'autoreg' );
		echo '</th><th width="20"></th><th width="20"></th></tr>
';
		select_query( 'tbldomainpricing', '', '', 'order', 'ASC' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$id = ;
			$data['extension'];
			$extension = ;
			$data['autoreg'];
			$autoreg = ;
			$data['dnsmanagement'];
			$dnsmanagement = ;
			$data['emailforwarding'];
			$emailforwarding = ;
			$data['idprotection'];
			$idprotection = ;
			$data['eppcode'];
			$eppcode = ;
			$data['order'];
			$order = ;
			echo '<tr id="dp-';
			echo $id;
			echo '">
<td><input type="text" name="tld[';
			echo $id;
			echo ']" value="';
			echo $extension;
			echo '" class="form-control" /></td>
<td><a href="#" class="btn btn-default btn-sm" onclick="openPricingPopup(';
			echo $id;
			echo ');return false">';
			echo $aInt->lang( 'domains', 'openpricing' );
			echo '</a></td>
<td><input type="checkbox" name="dns[';
			echo $id;
			echo ']"';

			if ($dnsmanagement) {
				echo ' checked';
				echo '></td>
<td><input type="checkbox" name="email[';
				echo $id;
				echo ']"';

				if ($emailforwarding) {
					echo ' checked';
					echo '></td>
<td><input type="checkbox" name="idprot[';
					echo $id;
					echo ']"';

					if ($idprotection) {
						echo ' checked';
						echo '></td>
<td><input type="checkbox" name="eppcode[';
						echo $id;
						echo ']"';

						if ($eppcode) {
							echo ' checked';
							echo '></td>
<td>';
							echo getRegistrarsDropdownMenu( $autoreg, 'autoreg[' . $id . ']' );
							echo '</td>
<td class="sortcol">&nbsp;</td>
<td><a href="#" onClick="doDelete(\'';
							echo $id;
							echo '\');return false"><img src="images/icons/delete.png" width="16" height="16" border="0" alt="';
							echo $aInt->lang( 'global', 'delete' );
							echo '"></a></td>
</tr>
';
						}
					}
				}
			}

			break;
		}

		jmp;
		$data['code'];
		$currency_code = ;
		select_query( 'tblpricing', '', array( 'type' => 'domainaddons', 'currency' => $currency_id, 'relid' => 0 ) );
		$result2 = ;
		mysql_fetch_array( $result2 );
		$data = ;
		$data['id'];
		$pricing_id = ;

		if (!$pricing_id) {
			insert_query( 'tblpricing', array( 'type' => 'domainaddons', 'currency' => $currency_id, 'relid' => 0 ) );
			select_query( 'tblpricing', '', array( 'type' => 'domainaddons', 'currency' => $currency_id, 'relid' => 0 ) );
			$result2 = ;
			mysql_fetch_array( $result2 );
			$data = ;
			$data['msetupfee'];
			$msetupfee = ;
			$data['qsetupfee'];
			$qsetupfee = ;
			$data['ssetupfee'];
			$ssetupfee = ;
				. '<tr><td><b>' . $currency_code . '</b></td><td><input type="text" name="currency[' . $currency_id . '][msetupfee]" size="10" value="' . $msetupfee . '"></td><td><input type="text" name="currency[';
		}

		echo  . $currency_id . '][qsetupfee]" size="10" value="' . $qsetupfee . '"></td><td><input type="text" name="currency[' . $currency_id . '][ssetupfee]" size="10" value="' . $ssetupfee . '"></td></tr>';
		break;
	}
}

echo '</table>
</div>

<p align="center"><input type="submit" value="';
echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-default" /></p>

</form>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jqueryCode;
$aInt->jscode = $jsCode;
$aInt->display(  );
?>
