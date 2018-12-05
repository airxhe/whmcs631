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
new dgeegejige( 'Configure Two-Factor Authentication' );
$aInt = ;
$aInt->title = $aInt->lang( 'twofa', 'title' );
$aInt->sidebar = 'config';
$aInt->icon = 'security';
$aInt->helplink = 'Security Modules';
$aInt->requiredFiles( array( 'modulefunctions' ) );
new dbjfcihjde(  );
$frm = ;
$purchased = (int)$whmcs->get_req_var( 'purchased' );

if ($frm->issubmitted(  )) {
	if (defined( 'DEMO_MODE' )) {
		redir( 'demo=1' );
		unserialize( chhgjaeced::getValue( '2fasettings' ) );
		$currentSettings = ;
		$forceClient = (int)(string)$whmcs->get_req_var( 'forceclient' );
		$forceAdmin = (int)(string)$whmcs->get_req_var( 'forceadmin' );
		$whmcs->get_req_var( 'mod' );
		$modules = array(  );

		if (!isset( $modules['duosecurity']['clientenabled'] )) {
			$modules['duosecurity']['clientenabled'] = 0;

			if (!isset( $modules['duosecurity']['adminenabled'] )) {
				$modules['duosecurity'];
			}

			['adminenabled'] = 0;

			if (!isset( $modules['totp']['clientenabled'] )) {
				$modules['totp']['clientenabled'] = 0;

				if (!isset( $modules['totp']['adminenabled'] )) {
					$modules['totp']['adminenabled'] = 0;

					if (!isset( $modules['yubikey']['clientenabled'] )) {
						$modules['yubikey']['clientenabled'] = 0;

						if (!isset( $modules['yubikey']['adminenabled'] )) {
							$modules['yubikey'];
						}
					}
				}
			}

			['adminenabled'] = 0;
			$changes = array(  );

			if ($forceClient != $currentSettings['forceclient']) {
				if ($forceClient) {
					$changes[] = 'Force Clients to Enable on Next Login Enabled';
				}
			}
		}
	}
}

$changes[] = 'Force Admins to Enable on Next Login Enabled';
jmp;
$changes[] = 'Force Admins to Enable on Next Login Disabled';
foreach ($modules as ) {
	$setting = ;
	$module = ;

	if ($module == 'duosecurity') {
		if ($setting['clientenabled'] != $currentSettings['modules']['duosecurity']['clientenabled']) {
			if ($setting['clientenabled']) {
				$changes[] = 'Duo Security Enabled for Clients';
				break;
			}
		}
	}
}


while (true) {
	$whmcs->set_config( '2fasettings', serialize( array( 'forceclient' => $forceClient, 'forceadmin' => $forceAdmin, 'modules' => $modules ) ) );

	if ($changes) {
		logAdminActivity( 'Two Factor Authentication Settings Modified: ' . implode( '. ', $changes ) );
		redir( 'success=1' );
		ob_start(  );

		if ($purchased) {
			$licensing->forceRemoteCheck(  );
			redir(  );
			$whmcs->get_config( '2fasettings' );
			$twofasettings = ;
			unserialize( $twofasettings );
			$twofasettings = ;
			$infobox = '';

			if (defined( 'DEMO_MODE' )) {
				infoBox( 'Demo Mode', 'Actions on this page are unavailable while in demo mode. Changes will not be saved.' );
				echo $infobox;
				echo $frm->form(  );
				echo '<table width="100%"><tr><td width="45%" valign="top">

<div style="padding:20px;background-color:#FAF5E4;-moz-border-radius: 10px;-webkit-border-radius: 10px;-o-border-radius: 10px;border-radius: 10px;">';
				echo '

<strong>What is Two-Factor Authentication?</strong><br /><br />

Two-factor authentication adds an additional layer of security by adding a second step to your login. It takes something you know (ie. your password) and adds a second factor, typically something you have (such as your phone.) Since both are required to log in, even if an attacker has your password they can\'t access your account.

<div style="margin:20px auto;padding:10px;width:370px;background-color:#fff;-moz-border-radius: 10px;-webkit-border-radius: 10px;-o-border-radius: 10px;border-radius: 10px;"><img src="images/twofahow.png" width="350" height="233" /></div>

<strong>Why do you need it?</strong><br /><br />

Passwords are increasingly easy to compromise. They can often be guessed or leaked, they usually don\'t change very often, and despite advice otherwise, many of us have favorite passwords that we use for more than one thing. So Two-factor authentication gives you additional security because your password alone no longer allows access to your account.<br /><br />

<strong>How it works?</strong><br /><br />

There are many different options available, and in WHMCS we support more than one so <i>you</i> have the choice.  But one of the most common and simplest to use is time based one-time passwords.  With these, in addition to your regular username & password, you also have to enter a 6 digit code that changes every 30 seconds.  Only your token device (typically a mobile smartphone) will know your secret key, and be able to generate valid one time passwords for your account.  And so your account is far safer.<br /><br />

<strong>Force Settings</strong><br /><br />

';
				echo $frm->checkbox( 'forceclient', 'Force Clients to enable Two Factor Authentication on Next Login', $twofasettings['forceclient'] ) . '<br />';
				echo $frm->checkbox( 'forceadmin', 'Force Administrator Users to enable Two Factor Authentication on Next Login', $twofasettings['forceadmin'] ) . '<br /><br />';
				$frm->submit;
				$aInt->lang( 'global', 'savechanges' );
			}

			echo (  );
			echo '</td><td width="55%" valign="top">';
			new bfhbgedjbf(  );
			$mod = ;
			$mod->getList(  );
			$moduleslist = ;

			if (!$moduleslist) {
				$aInt->gracefulExit( 'Security Module Folder Not Found. Please try reuploading all WHMCS related files.' );
				$i = 6;
				foreach ($moduleslist as ) {
					$module = ;
					$mod->load;
					$module;
				}
			}

			(  );
			$mod->call( 'config' );
			$configarray = ;
			$twofasettings['modules'][$module];
			$moduleconfigdata = ;

			if ($i) {
				echo '<div style="width:90%;margin:' . (true ? '10px' : '0') . ' auto;padding:10px 20px;border:1px solid #ccc;background-color:#fff;-moz-border-radius: 10px;-webkit-border-radius: 10px;-o-border-radius: 10px;border-radius: 10px;">';

				if (( $moduleconfigdata['clientenabled'] || $moduleconfigdata['adminenabled'] )) {
					echo '<p style="float:right;"><input type="button" value="Deactivate" class="btn btn-danger" onclick="deactivate(\'' . $module . '\')" /></p>';
					$showstyle = '';
					jmp;

					if (array_key_exists( 'Licensed', $configarray )) {
						if ($configarray['Licensed']['Value']) {
							echo '<p style="float:right;"><input type="button" value="Activate" class="btn btn-success" id="activatebtn' . $module . '" onclick="activate(\'' . $module . '\')" /></p>';
						}
					}

					echo '<h2>' . (true ? ['Value'] : ucfirst( $module )) . '</h2>';

					if ($configarray['Description']['Value']) {
						echo '<p>' . $configarray['Description']['Value'] . '</p>';
						'<div id="conf' . $module . '" style="' . $showstyle;
					}
				}
			}
		}
	}

	echo  . '">';
	new ciadfjebgi(  );
	$tbl = ;
	$tbl->add( 'Enable for Clients', $frm->checkbox( 'mod[' . $module . '][clientenabled]', 'Tick to Enable', $moduleconfigdata['clientenabled'], '1', 'enable' . $module ), 1 );
	$tbl->add( 'Enable for Staff', $frm->checkbox( 'mod[' . $module . '][adminenabled]', 'Tick to Enable', $moduleconfigdata['adminenabled'], '1', 'enable' . $module ), 1 );
	foreach ($configarray as ) {
		$values = ;
		$key = ;

		if ($values['Type'] != 'System') {
			if (!isset( $values['FriendlyName'] )) {
				$values['FriendlyName'] = $key;
				$values['Name'] = 'mod[' . $module . '][' . $key . ']';
				$values['Value'] = htmlspecialchars( $moduleconfigdata[$key] );
				$tbl->add( $values['FriendlyName'], moduleConfigFieldOutput( $values ), 1 );
				break;
			}

			break 2;
		}

		break;
	}

	echo $tbl->output(  );
	echo '<p align="center">' . $frm->submit( $aInt->lang( 'global', 'savechanges' ) ) . '</p>';
	echo '</div>';
	echo '</div>';
	++$i;
}

echo '</td></tr></table>';
echo $frm->close(  );
$aInt->dialog( '', '<div class="content"><div style="padding:15px;"><h2>Two-Factor Authentication Subscription</h2><br /><br /><div align="center">You will now be redirected to purchase the selected<br />Two-Factor Authentcation solution in a new browser window.<br /><br />Once completed, please click on the button below to continue.<br /><br /><br /><form method="post" action="configtwofa.php"><input type="hidden" name="purchased" value="1" /><input type="submit" value="Continue &raquo;" class="btn btn-default" onclick="dialogClose()" /></form></div></div></div>' );
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$jscode = '
function activate(mod) {
    $("#activatebtn"+mod).hide();
    $("#conf"+mod).fadeIn();
}
function deactivate(mod) {
    $(".enable"+mod).attr("checked",false);
    $("#conf"+mod).fadeOut();
    $("#' . $frm->getname(  ) . '").submit();
}
';
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
