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
new dgeegejige( 'Configure Addon Modules' );
$aInt = ;
$aInt->title = $aInt->lang( 'utilities', 'addonmodules' );
$aInt->sidebar = 'config';
$aInt->icon = 'admins';
$aInt->helplink = 'Addon Modules Management';
$aInt->requiredFiles( array( 'modulefunctions' ) );

if (!isset( $CONFIG['ActiveAddonModules'] )) {
	insert_query( 'tblconfiguration', array( 'setting' => 'ActiveAddonModules', 'value' => '' ) );

	if (!isset( $CONFIG['AddonModulesPerms'] )) {
		insert_query( 'tblconfiguration', array( 'setting' => 'AddonModulesPerms', 'value' => '' ) );

		if (!isset( $CONFIG['AddonModulesHooks'] )) {
			insert_query( 'tblconfiguration', array( 'setting' => 'AddonModulesHooks', 'value' => '' ) );
			array_filter( explode( ',', $CONFIG['ActiveAddonModules'] ) );
			$activemodules = ;
			$addonmodulehooks = array(  );
			$addon_modules = ;

			if (is_dir( ROOTDIR . '/modules/addons/' )) {
				opendir( ROOTDIR . '/modules/addons/' );
				$dh = ;
				readdir( $dh );

				if (false !== $file = ) {
					$modfilename = ROOTDIR . ( (  . '/modules/addons/' . $file . '/' ) . $file . '.php' );

					if (is_file( $modfilename )) {
						require( $modfilename );
						call_user_func( $file . '_config' );
						$configarray = ;
						$addon_modules[$file] = $configarray;
					}
				}
			}
		}
	}
}
else {
	$module = ;
	$allowedRoleIds = array(  );

	if ($exvars[$module]['access']) {
		$existingAccess = (true ? explode( ',', $exvars[$module]['access'] ) : array(  ));

		if (isset( $access[$module] )) {
			foreach ($access[$module] as ) {
				$v = ;
				$roleId = ;
				$allowedRoleIds[] = $roleId;

				if (!isset( $adminRoleNames[$roleId] )) {
					$adminRoleNames[$roleId] = dacfgegdhe::table( 'tbladminroles' )->find( $roleId, array( 'name' ) )->name;

					if (!in_array( $roleId, $existingAccess )) {
						$changedPermissions[$addon_modules[$module]['name']]['added'][] = $adminRoleNames[$roleId];
						foreach ($existingAccess as ) {
							$roleId = ;

							if (!in_array( $roleId, $allowedRoleIds )) {
								$changedPermissions[$addon_modules[$module]['name']]['removed'][] = $adminRoleNames[$roleId];
								break 2;
							}

							break 2;
						}

						break;
					}

					break;
				}
			}
		}
	}
}


while (true) {
	while () {
		foreach ($vals['fields'] as ) {
			$values = ;
			$key = ;
			$valueToSave = '';
			$values['FriendlyName'];
			$fieldName = $key;

			if (isset( $_POST['fields'][$module][$key] )) {
				trim( dfdidhdbdc::decode( $_POST['fields'][$module][$key] ) );
				$valueToSave = ;

				if ($values['Type'] == 'password') {
					interpretMaskedPasswordChangeForStorage( $valueToSave, $exvars[$module][$key] );
					$updatedPassword = ;

					if ($updatedPassword === false) {
						$exvars[$module][$key];
						$valueToSave = ;
						break 3;
					}
				}
			}

			( array( 'setting' => $key, 'value' => $valueToSave ) );
			break;
		}
	}
}

foreach ($changedValues as ) {
	$changes = ;
	$changedModule = ;

	if ($changes) {
		logAdminActivity(  . 'Addon Module Settings Modified - ' . $changedModule . '  - ' . implode( ', ', $changes ) );
		break;
	}

	break;
}

$module = '';
foreach ($_POST as ) {
	$v = ;
	$k = ;

	if (substr( $k, 0, 6 ) == 'msave_') {
		substr( $k, 6 );
		$module = ;
		break;
	}

	break;
}

redir( 'savedref=true#' . $module );

if ($action == 'activate') {
	check_token( 'WHMCS.admin.default' );
	$response = '';
	array_key_exists;
}


if (!( $module, $addon_modules )) {
	$aInt->gracefulExit( 'Invalid Module Name. Please Try Again.' );

	if (function_exists( $module . '_activate' )) {
		call_user_func( $module . '_activate' );
		$response = ;
		dfabehjiaj::set( 'AddonModActivate', $response );

		if (( !$response || ( is_array( $response ) && ( $response['status'] == 'success' || $response['status'] == 'info' ) ) )) {
			$activemodules[] = $module;
			sort( $activemodules );
			update_query( 'tblconfiguration', array( 'value' => implode( ',', $activemodules ) ), array( 'setting' => 'ActiveAddonModules' ) );

			if ($addon_modules[$module]['version'] != $aInt->lang( 'addonmodules', 'nooutput' )) {
				insert_query( 'tbladdonmodules', array( 'module' => $module, 'setting' => 'version', 'value' => $addon_modules[$module]['version'] ) );
				logAdminActivity( 'Addon Module Activated - ' . $addon_modules[$module]['name'] );
				redir( 'activated=true' );

				if ($action == 'deactivate') {
					check_token( 'WHMCS.admin.default' );

					if (!array_key_exists( $module, $addon_modules )) {
						$aInt->gracefulExit( 'Invalid Module Name. Please Try Again.' );

						if (function_exists( $module . '_deactivate' )) {
							call_user_func( $module . '_deactivate' );
							$response = ;
							dfabehjiaj::set( 'AddonModActivate', $response );

							if (( !$response || ( is_array( $response ) && ( $response['status'] == 'success' || $response['status'] == 'info' ) ) )) {
								delete_query( 'tbladdonmodules', array( 'module' => $module ) );
								foreach ($activemodules as ) {
									$mod = ;
									$k = ;

									if ($mod == $module) {
										unset( $activemodules[$k] );
										break;
									}

									break;
								}

								sort( $activemodules );
								update_query( 'tblconfiguration', array( 'value' => implode( ',', $activemodules ) ), array( 'setting' => 'ActiveAddonModules' ) );
								logAdminActivity( 'Addon Module Deactivated - ' . $addon_modules[$module]['name'] );
								redir;
								'deactivated=true';
							}
						}
					}
				}
			}
		}

		(  );
		ob_start(  );

		if ($action == '') {
			if ($whmcs->get_req_var( 'saved' )) {
				infoBox( $aInt->lang( 'addonmodules', 'changesuccess' ), $aInt->lang( 'addonmodules', 'changesuccessinfo' ) );

				if ($whmcs->get_req_var( 'activated' )) {
					dfabehjiaj::get( 'AddonModActivate', 1 );
					$response = ;
					$status = '';
					$desc = ;

					if (is_array( $response )) {
						if ($response['description']) {
							$response['description'];
							$desc = ;

							if (in_array( $response['status'], array( 'info', 'success', 'error' ) )) {
								$response['status'];
								$status = ;
								$aInt->lang( 'addonmodules', 'moduleactivated' );
								$title = ;

								if (!$desc) {
									AdminLang::trans( 'addonmodules.moduleActivatedInfo' );
									$desc = ;

									if (!$status) {
										$status = 'success';
										infoBox( $title, $desc, $status );

										if ($whmcs->get_req_var( 'deactivated' )) {
											dfabehjiaj::get( 'AddonModActivate', 1 );
											$response = ;
											$status = '';
											$desc = ;
											is_array;
										}
									}
								}
							}
						}
					}
				}
			}
		}


		while (true) {
			if (( $response )) {
				if ($response['description']) {
					$response['description'];
					$desc = ;

					if (in_array( $response['status'], array( 'info', 'success', 'error' ) )) {
						$response['status'];
						$status = ;
						$aInt->lang( 'addonmodules', 'moduledeactivated' );
						$title = ;

						if (!$desc) {
							AdminLang::trans( 'addonmodules.moduleDeactivatedInfo' );
							$desc = ;

							if (!$status) {
								$status = 'success';
								infoBox( $title, $desc, $status );
								echo $infobox;
								$aInt->deleteJSConfirm( 'deactivateMod', 'addonmodules', 'deactivatesure', $_SERVER['PHP_SELF'] . '?action=deactivate&module=' );
								$jscode = 'function showConfig(module) {
    $("#"+module+"config").fadeToggle();
}';
								echo '<p>' . $aInt->lang( 'addonmodules', 'description' ) . '</p>

<form method="post" action="' . $_SERVER['PHP_SELF'] . '">
<input type="hidden" name="action" value="save" />

<div class="tablebg">
<table class="datatable" width="100%" border="0" cellspacing="1" cellpadding="3">
<tr><th>' . $aInt->lang( 'addonmodules', 'module' ) . '</th><th width="100">' . $aInt->lang( 'global', 'version' ) . '</th><th width="100">' . $aInt->lang( 'addonmodules', 'author' ) . '</th><th width="350"></th></tr>
';
								$addonmodulesperms = array(  );
								$modulevars = ;
								select_query( 'tbladdonmodules', '', '' );
								$result = ;
								mysql_fetch_array( $result );

								if ($data = ) {
									$data['module'];
									$data['setting'];
								}
							}
						}
					}
				}
			}

			$modulevars[][] = $data['value'];
		}

		foreach ($addon_modules as ) {
			$vals = ;
			$module = ;

			if (in_array( $module, $activemodules )) {
				$bgcolor = (true ? 'FDF4E8' : 'fff');
				echo '<tr><td style="background-color:#' . $bgcolor . ';text-align:left;"><a name="act' . $module . '"></a><a name="' . $module . '"></a>';

				if (array_key_exists( 'logo', $vals )) {
					echo '<div style="float:left;padding:5px 15px;"><img src="' . $vals['logo'] . '" /></div><div style="float:left;">';
					echo '<b>&nbsp;&raquo; ' . $vals['name'] . '</b>';

					if (array_key_exists( 'premium', $vals )) {
						echo ' <span class="label closed">Premium</span>';

						if ($vals['description']) {
							echo '<br />' . $vals['description'];

							if (array_key_exists( 'logo', $vals )) {
								echo '</div>';
								'</td><td style="background-color:#' . $bgcolor . ';text-align:center;">' . $vals['version'] . '</td><td style="background-color:#' . $bgcolor . ';text-align:center;">';
							}
						}
					}

					echo  . $vals['author'] . '</td><td style="background-color:#' . $bgcolor . ';text-align:center;">';

					if (!in_array( $module, $activemodules )) {
						'<input type="button" value="' . $aInt->lang( 'addonmodules', 'activate' ) . '" onclick="window.location=\'' . $_SERVER['PHP_SELF'] . '?action=activate&module=' . $module . generate_token( 'link' );
					}
				}
			}

			echo  . '\'" class="btn btn-success" /> ';
			break;
		}

		jmp;
		echo '
</table>
</div>

</form>

<script language="javascript">
$(document).ready(function(){
    var modpass = window.location.hash;
    if (modpass) $(modpass+"config").show();
});
</script>
';
		update_query;
		'tblconfiguration';
		implode;
		',';
	}
}

( array( 'value' => ( $addonmodulehooks ) ), array( 'setting' => 'AddonModulesHooks' ) );
update_query( 'tblconfiguration', array( 'value' => serialize( $addonmodulesperms ) ), array( 'setting' => 'AddonModulesPerms' ) );

if ($whmcs->get_req_var( 'savedref' )) {
	redir( 'saved=true' );
	ob_get_contents(  );
	$content = ;
	ob_end_clean(  );
	$aInt->content = $content;
}

$aInt->jscode = $jscode;
$aInt->display(  );
?>
