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
new dgeegejige( 'Configure Fraud Protection' );
$aInt = ;
$aInt->title = $aInt->lang( 'fraud', 'title' );
$aInt->sidebar = 'config';
$aInt->icon = 'configbans';
$aInt->helplink = 'Fraud Protection';
$aInt->requiredFiles( array( 'modulefunctions' ) );
ob_start(  );
new eaedaiidif(  );
$module = ;
$module->getList(  );
$fraudmodules = ;

if (( $fraud && in_array( $fraud, $fraudmodules ) )) {
	$module->load( $fraud );
	$module->call( 'getConfigArray' );
	$configarray = ;
	$module->getSettings(  );
	$existingValues = ;

	if ($action == 'save') {
		check_token( 'WHMCS.admin.default' );
		foreach ($configarray as ) {
			$values = ;
			$regconfoption = ;
			str_replace( ' ', '_', $regconfoption );
			$regconfoption2 = ;
			trim( dfdidhdbdc::decode( $_POST[$regconfoption2] ) );
			$valueToSave = ;

			if ($values['Type'] == 'password') {
				interpretMaskedPasswordChangeForStorage( $valueToSave, $existingValues[$regconfoption2] );
				$updatedPassword = ;

				if ($updatedPassword === false) {
					$existingValues[$regconfoption2];
					$valueToSave = ;
					select_query( 'tblfraud', '', array( 'fraud' => $fraud, 'setting' => $regconfoption ) );
					$result = ;
					mysql_num_rows( $result );
					$num_rows = ;

					if ($num_rows == '0') {
						insert_query;
						'tblfraud';
						array( 'fraud' => $fraud );
					}
				}

				( array( 'setting' => $regconfoption, 'value' => $valueToSave ) );
				break;
			}

			break;
		}

		logAdminActivity( (  . 'Fraud Module Configuration Modified: \'' . $module->getDisplayName(  ) . '\'' ) );
		redir( 'fraud=' . $fraud . '&success=1' );

		if ($success) {
			infoBox( $aInt->lang( 'fraud', 'changesuccess' ), $aInt->lang( 'fraud', 'changesuccessinfo' ) );
			echo $infobox;
			jmp;
			$fraud = '';
			echo '<p>' . $aInt->lang( 'fraud', 'info' ) . '</p>';
			echo '<form method="get" action="' . $whmcs->getPhpSelf(  ) . '"><p>' . $aInt->lang( 'fraud', 'choose' ) . ': <select name="fraud" onChange="submit();" class="form-control select-inline">';
			foreach ($fraudmodules as ) {
				$file = ;
				echo (  . '<option value="' . $file . '"' );

				if ($fraud == $file) {
					echo ' selected';
					echo '>' . TitleCase( str_replace( '_', ' ', $file ) ) . '</option>';
					break;
				}

				break;
			}

			echo '</select> <input type="submit" value=" ' . $aInt->lang( 'global', 'go' ) . ' " class="btn btn-success"></p></form>';

			if ($fraud) {
				$module->call( 'getConfigArray' );
				$configarray = ;
			}
		}
	}
}

$module->getSettings(  );
$configvalues = ;
echo '
<form method="post" action="';
echo $whmcs->getPhpSelf(  );
echo '?action=save">
<input type="hidden" name="fraud" value="';
echo $fraud;
echo '">

<table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
';
foreach ($configarray as ) {
	$values = ;
	$regconfoption = ;

	while (!$values['FriendlyName']) {
		$values['FriendlyName'] = $regconfoption;
		$values['Name'] = $regconfoption;
		$values['Value'] = $configvalues[$regconfoption];
		echo '<tr><td class="fieldlabel">' . $values['FriendlyName'] . '</td><td class="fieldarea">' . moduleConfigFieldOutput( $values ) . '</td></tr>';
	}

	break;
}

echo '</table>

<div class="btn-container">
    <input type="submit" value="';
echo $aInt->lang( 'global', 'savechanges' );
echo '" class="btn btn-primary" />
    <input type="reset" value="';
echo $aInt->lang( 'global', 'cancelchanges' );
echo '" class="btn btn-default" />
</div>

</form>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->display(  );
?>
