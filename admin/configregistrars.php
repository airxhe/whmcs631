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
new dgeegejige( 'Configure Domain Registrars' );
$aInt = ;
$aInt->title = $aInt->lang( 'domainregistrars', 'title' );
$aInt->sidebar = 'config';
$aInt->icon = 'domains';
$aInt->helplink = 'Domain Registrars';
$aInt->requiredFiles( array( 'registrarfunctions', 'modulefunctions' ) );
$whmcs->get_req_var( 'module' );
$module = ;
$whmcs->get_req_var( 'action' );
$action = ;

if ($action == 'save') {
	check_token( 'WHMCS.admin.default' );
	unset( $_POST[token] );
	unset( $_POST[save] );

	if ($module) {
		new bjgfceddfi(  );
		$registrar = ;

		if ($registrar->load( $module )) {
			if ($registrar->isActivated(  )) {
				$registrar->saveSettings( $_POST );
			}
		}
	}
}


while (true) {
	if ($moduleactive) {
		echo 'style="background-color:#EBFEE2;"';
		echo '><strong>&nbsp;&raquo; ';
		echo $displayName;
		echo '</strong>';

		if ($configarray['Description']['Value']) {
			echo '<br />' . $configarray['Description']['Value'];
			echo '</td>
        <td width="200" align="center" ';

			if ($moduleactive) {
				echo 'style="background-color:#EBFEE2;"';
				echo '>';
				echo $moduleaction;
				echo '</td>
    </tr>
    <tr><td id="';
				echo $module;
				echo 'config" class="config" style="display:none;padding:15px;" colspan="3"><form method="post" action="';
				echo $whmcs->getPhpSelf(  );
				echo '?action=save&module=';
				echo $module . generate_token( 'link' );
				echo '">
        <table class="form" width="100%">
        ';
				foreach ($configarray as ) {
					$values = ;
					$key = ;
					$values['Type'] != 'System';
				}
			}
		}


		if () {
			if (!$values['FriendlyName']) {
				$values['FriendlyName'] = $key;
				$values['Name'] = $key;
				$values['Value'] = $moduleconfigdata[$key];
				echo '<tr><td class="fieldlabel">' . $values['FriendlyName'] . '</td><td class="fieldarea">' . moduleConfigFieldOutput( $values ) . '</td></tr>';
			}
		}
	}

	jmp;
	$modulesConfigHtml[$displayName] = ob_get_clean(  );
}

uksort( $modulesConfigHtml, 'strnatcmp' );
echo implode( '
', $modulesConfigHtml );
echo '</table>
</div>

<script language="javascript">
$(document).ready(function(){
    var modpass = window.location.hash;
    if (modpass) $(modpass+"config").show();
});
</script>

';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
