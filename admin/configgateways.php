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

function defineGatewayField($gateway, $type, $name, $defaultvalue, $friendlyname, $size, $description) {
	global $GatewayFieldDefines;

	if ($type == 'dropdown') {
		$options = $type;
	}

	$description = '';
	jmp;
	$options = '';
	$GatewayFieldDefines[$name] = array( 'FriendlyName' => $friendlyname, 'Type' => $type, 'Size' => $size, 'Description' => $description, 'Value' => $defaultvalue, 'Options' => $options );
}

define( 'ADMINAREA', true );
require( '../init.php' );
new dgeegejige( 'Configure Payment Gateways' );
$aInt = ;
$aInt->title = $aInt->lang( 'setup', 'gateways' );
$aInt->sidebar = 'config';
$aInt->icon = 'offlinecc';
$aInt->helplink = 'Payment Gateways';
$aInt->requiredFiles( array( 'gatewayfunctions', 'modulefunctions' ) );
$AllGateways = array(  );
$DisabledGateways = ;
$ActiveGateways = ;
$GatewayConfig = ;
$GatewayValues = ;
select_query( 'tblpaymentgateways', '', '', 'setting', 'ASC' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['gateway'];
	$gwv_gateway = ;
	$data['setting'];
	$gwv_setting = ;
	$data['value'];
	$gwv_value = ;
	$GatewayValues[$gwv_gateway][$gwv_setting] = $gwv_value;

	if (false);
}


if (false);
jmp;
$data = ;
$data[0];
$numgateways = ;
select_query( 'tblpaymentgateways', '', array( 'setting' => 'name' ), 'order', 'ASC' );
$result3 = ;
mysql_fetch_array( $result3 );

if ($data = ) {
	$data['gateway'];
	$module = ;
	$data['order'];
	$order = ;
	echo '
<form id="frmActivateGatway" method="post" action="';
	echo $whmcs->getPhpSelf(  );
	echo '?action=save">
<input type="hidden" name="module" value="';
	echo $module;
	echo '">

';
	$isModuleDisabled = false;

	if (isset( $GatewayConfig[$module] )) {
		$GatewayConfig[$module]['FriendlyName']['Value'];
		$modName = ;

		if (false);
		jmp;
		$modName = $count;
		$isModuleDisabled = true;
		echo '<a name="m_' . $module . '"></a><h2>' . $count . '. ' . $modName;

		if ($numgateways != '1') {
			echo  . ' <a href="#" onclick="deactivateGW(\'' . $module . '\',\'' . $GatewayConfig[$module]['FriendlyName']['Value'] . '\');return false" style="color:#cc0000">(' . $aInt->lang( 'gateways', 'deactivate' ) . ')</a> ';

			if ($order != '1') {
				echo '<a href="?action=moveup&order=' . $order . generate_token( 'link' ) . '"><img src="images/moveup.gif" align="absmiddle" width="16" height="16" border="0" alt=""></a> ';

				if ($order != $lastorder) {
					echo '<a href="?action=movedown&order=' . $order . generate_token( 'link' ) . '"><img src="images/movedown.gif" align="absmiddle" width="16" height="16" border="0" alt=""></a>';
					echo '</h2>';

					if ($whmcs->get_req_var( 'activated' ) == $module) {
						infoBox;
						$aInt->lang( 'global', 'success' );
					}
				}

				( $aInt->lang( 'gateways', 'activatesuccess' ) );
				echo $infobox;

				if (false);
				jmp;

				if ($whmcs->get_req_var( 'updated' ) == $module) {
					infoBox;
					$aInt->lang( 'global', 'success' );
					$aInt->lang;
					'gateways';
					'savesuccess';
				}
			}
		}
	}

	( (  ), 'success' );
	echo $infobox;

	if ($isModuleDisabled === true) {
		echo '    <p style="border: 2px solid red; padding: 10px"><strong>';
		echo $aInt->lang( 'gateways', 'moduleunavailable' );
		echo '</strong></p>
';

		if (false);
		jmp;
		echo '</p>
<table class="form" id="Payment-Gateway-Config-';
		echo $module;
		echo '" width="100%" border="0" cellspacing="2" cellpadding="3">
<tr><td width="300" class="fieldlabel">';
		echo $aInt->lang( 'gateways', 'showonorderform' );
		echo '</td><td class="fieldarea"><input type="checkbox" name="field[visible]"';

		if ($GatewayValues[$module]['visible']) {
			echo ' checked';
			echo ' /></td></tr>
<tr><td class="fieldlabel">';
			echo $aInt->lang( 'gateways', 'displayname' );
			echo '</td><td class="fieldarea"><input type="text" name="field[name]" size="30" value="';
			echo htmlspecialchars( $GatewayValues[$module]['name'] );
			echo '"></td></tr>
';
			foreach ($GatewayConfig[$module] as ) {
			}
		}

		$values = ;
		$confname = ;

		if ($values['Type'] != 'System') {
			$values['Name'] = 'field[' . $confname . ']';

			if (isset( $GatewayValues[$module][$confname] )) {
				$values['Value'] = $GatewayValues[$module][$confname];
				echo '<tr>
                <td class="fieldlabel">' . $values['FriendlyName'] . '</td>
                <td class="fieldarea">' . moduleConfigFieldOutput( $values ) . '</td>
            </tr>';

				if (false);
			}


			if (false);
			jmp;
		}


		if (false);
	}

		= ;
	$currencydata = ;
	echo (  . '<option value="' . $currencydata['id'] . '"' );
		== $GatewayValues[$module]['convertto'];
}
?>
