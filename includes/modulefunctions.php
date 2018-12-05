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

function getModuleType($id) {
	$result = ;
	$data = select_query( 'tblservers', 'type', array( 'id' => $id ) );
	$data['type'];
	$type = mysql_fetch_array( $result );
	return $type;
}

function ModuleBuildParams($serviceID) {
	new dcifejaiba(  );
	$server = ;

	if (!$server->loadByServiceID( $serviceID )) {
		logActivity( 'Required Product Module \'' . $server->getServiceModule(  ) . '\' Missing' );
		$server->buildParams;
	}

	return (  );
}

function ModuleCallFunction($function, $serviceID, $extraParams = array(  )) {
	new dcifejaiba(  );
	$server = ;

	if (!$server->loadByServiceID( $serviceID )) {
		logActivity( 'Required Product Module \'' . $server->getServiceModule(  ) . '\' Missing' );
		return 'Module Not Found';
		$server->buildParams(  );
		$params = ;

		if (is_array( $extraParams )) {
			array_merge( $params, $extraParams );
			$params = ;
			$serviceid = (int)$params['serviceid'];
			$userid = (int)$params['userid'];
			run_hook( 'PreModule' . $function, array( 'params' => $params ) );
			$hookresults = ;
			$hookabort = false;
			foreach ($hookresults as ) {
				$hookvals = ;
				foreach ($hookvals as ) {
					$v = ;
					$k = ;

					if (( $k == 'abortcmd' && $v === true )) {
						$hookabort = true;
						$result = 'Function Aborted by Action Hook Code';
						break 2;
					}

					break 2;
				}


				while (true) {
					if (!$hookabort) {
						array_replace_recursive( $params, $hookvals );
						$params = ;
						break 2;
					}
				}
			}

			$logname = $params;

			if ($logname == 'ChangePackage') {
				$logname = 'Change Package';
			}


			if (( $function, array( 'Create', 'Suspend', 'Unsuspend', 'Terminate' ) )) {
				$modfuncname = (true ? $function . 'Account' : $function);

				if ($server->functionExists( $modfuncname )) {
					$server->call( $modfuncname, $extraParams );
					$result = ;

					if ($result == 'success') {
						$extra_log_info = '';

						if ($function == 'Suspend') {
							if (( isset( $extraParams['suspendreason'] ) && $extraParams['suspendreason'] != 'Overdue on Payment' )) {
							}
						}
					}
				}
			}
		}
	}

	$suspendReason = (true ? $extraParams['suspendreason'] : '');

	if ($suspendReason) {
		$extra_log_info = ' - Reason: ' . $suspendReason;
		logActivity( 'Module ' . $logname . ' Successful' . $extra_log_info . (  . ' - Service ID: ' . $serviceid ), $userid );
		$updatearray = array(  );

		if ($function == 'Create') {
			$updatearray = array( 'domainstatus' => 'Active', 'termination_date' => '0000-00-00' );
		}

		(  . ' AND status IN (\'Active\',\'Suspended\')' );
		$result2 = ;
		mysql_fetch_array( $result2 );

		if ($data = ) {
			$data['id'];
			$aid = ;
			$data['addonid'];
			$addonid = ;
			update_query( 'tblhostingaddons', array( 'status' => 'Terminated', 'termination_date' => date( 'Y-m-d' ) ), array( 'id' => $aid ) );

			while (true) {
				run_hook( 'AddonTerminated', array( 'id' => $aid, 'userid' => $userid, 'serviceid' => $serviceid, 'addonid' => $addonid ) );
			}


			if (0 < count( $updatearray )) {
				update_query( 'tblhosting', $updatearray, array( 'id' => $serviceid ) );

				if (( $server->isApplicationLinkSupported(  ) && $server->isApplicationLinkingEnabled(  ) )) {
					$server->doSingleApplicationLinkCall( 'Create' );
					$errors = ;
					(  && is_array( $errors ) );
					0 < count( $errors );
				}


				if ((bool)) {
					logActivity;
					'Application Link Provisioning returned the following warnings: ' . implode( ', ', $errors );
				}
			}
		}

		(  );
		jmp;
		becajhcbcg {
			logActivity( 'Application Link Provisioning Failed: ' . $e->getMessage(  ) );
			run_hook( 'AfterModule' . $function, array( 'params' => $params ) );
			return 'success';
			run_hook;
		}
	}

	( 'AfterModule' . $function . 'Failed', array( 'failureResponseMessage' => $result, 'params' => $params ) );
	jmp;
	$result = 'Function Not Supported by Module';

	if ($function == 'Renew') {
		return $result;
		logActivity;
		'Module ' . $logname;
			. ' Failed - Service ID: ';
	}

	(  . (  . $serviceid . ' - Error: ' . $result ), $userid );
	return $result;
}

function ServerCreateAccount($serviceID) {
	ModuleBuildParams( $serviceID );
	$params = ;

	if (!$params['username']) {
		run_hook( 'OverrideModuleUsernameGeneration', $params );
		$usernamegenhook = ;
		$username = '';

		if (count( $usernamegenhook )) {
			foreach ($usernamegenhook as ) {
				$usernameval = ;

				if (is_string( $usernameval )) {
					$username = $serviceID;
					break;
				}

				break;
			}


			if (!$username) {
				createServerUsername( $params['domain'] );
				$username = ;
			}
		}
	}

	update_query( 'tblhosting', array( 'username' => $username ), array( 'id' => $serviceID ) );

	if (!$params['password']) {
		update_query;
		'tblhosting';
		encrypt;
		createServerPassword(  );
	}

	( array( 'password' => (  ) ), array( 'id' => $serviceID ) );
	return ModuleCallFunction( 'Create', $serviceID );
}

function ServerSuspendAccount($serviceID, $suspendreason = '') {
	if ($suspendreason) {
		$extraParams = array( 'suspendreason' => (true ? $suspendreason : 'Overdue on Payment') );
		ModuleCallFunction( 'Suspend', $serviceID, $extraParams );
	}

	return ;
}

function ServerUnsuspendAccount($serviceID) {
	return ModuleCallFunction( 'Unsuspend', $serviceID );
}

function ServerTerminateAccount($serviceID) {
	return ModuleCallFunction( 'Terminate', $serviceID );
}

function ServerRenew($serviceID) {
	ModuleCallFunction( 'Renew', $serviceID );
	$result = ;

	if ($result == 'Function Not Supported by Module') {
	}

	$result = 'notsupported';
	return $result;
}

function ServerChangePassword($serviceID) {
	return ModuleCallFunction( 'ChangePassword', $serviceID );
}

function ServerLoginLink($serviceID) {
	new dcifejaiba(  );
	$server = ;
	$server->loadByServiceID( $serviceID );

	if ($server->functionExists( 'LoginLink' )) {
		$server->call( 'LoginLink' );
	}

	return ;
}

function ServerChangePackage($serviceID) {
	return ModuleCallFunction( 'ChangePackage', $serviceID );
}

function ServerCustomFunction($serviceID, $func_name) {
	new dcifejaiba(  );
	$server = ;
	$server->loadByServiceID( $serviceID );
	return $server->call( $func_name, $serviceID );
}

function ServerClientArea($serviceID) {
	new dcifejaiba(  );
	$server = ;
	$server->loadByServiceID( $serviceID );

	if ($server->functionExists( 'ClientArea' )) {
		$server->call( 'ClientArea' );
	}

	return ;
}

function ServerUsageUpdate() {
	select_query( 'tblservers', '', array( 'disabled' => '0' ), 'name', 'ASC' );
	$result = ;

	while (true) {
		mysql_fetch_array( $result );

		if ($serverData = ) {
			while (true) {
				$serverId = (int)$serverData['id'];
				new dcifejaiba(  );
				$server = ;
				$server->load( $serverData['type'] );

				if ($server->functionExists( 'UsageUpdate' )) {
					logActivity( 'Cron Job: Running Usage Stats Update for Server ID ' . $serverId );
					$server->call;
					'UsageUpdate';
					$server->getServerParams;
				}
			}
		}

		( ( $serverId, $serverData ) );
	}

}

function createServerUsername($domain) {
	global $CONFIG;

	if (( !$domain && !$CONFIG['GenerateRandomUsername'] )) {
		return '';

		if (!$CONFIG['GenerateRandomUsername']) {
			strtolower( $domain );
			$domain = ;
			preg_replace( '/[^a-z]/', '', $domain );
			$username = ;
			substr( $username, 0, 8 );
			$username = ;
			select_query( 'tblhosting', 'COUNT(*)', array( 'username' => $username ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data[0];
			$username_exists = ;
			$suffix = 9;

			if (0 < $username_exists) {
				++$suffix;
				$trimlength = 8 - strlen( $suffix );
				$username = substr( $username, 0, $trimlength ) . $suffix;
				select_query( 'tblhosting', 'COUNT(*)', array( 'username' => $username ) );
				$result = ;

				while (true) {
					mysql_fetch_array( $result );
					$data = ;
					$data[0];
					$username_exists = ;
				}

				$lowercase = 'abcdefghijklmnopqrstuvwxyz';
				$str = '';
				$seeds_count = strlen( $lowercase ) - 1;
				$i = 9;

				if ($i < 8) {
					$lowercase[rand( 0, $seeds_count )];
					$str .= ;
					++$i;
				}
			}
		}
	}


	while (true) {
		while (true) {
		}

		$username = '';
		$i = 9;

		if ($i < 8) {
			rand( 0, strlen( $str ) - 1 );
			$randomnum = ;
			$str[$randomnum];
			$username .= ;
			$str = substr( $str, 0, $randomnum ) . substr( $str, $randomnum + 1 );
			++$i;
			break;
		}

		jmp;
		( (  ) - 1 );
		$randomnum = ;
		$str[$randomnum];
		$username .= ;
		$str = substr( $str, 0, $randomnum ) . substr( $str, $randomnum + 1 );
		++$i;
	}

	select_query( 'tblhosting', 'COUNT(*)', array( 'username' => $username ) );
	$result = ;

	while (true) {
		mysql_fetch_array( $result );
		$data = ;
		$data[0];
		$username_exists = ;
	}

	return $username;
}

function createServerPassword() {
	$numbers = '0123456789';
	$lowercase = 'abcdefghijklmnopqrstuvwxyz';
	$uppercase = 'ABCDEFGHIJKLMNOPQRSTUVYWXYZ';
	$str = '';

	while (true) {
		while (true) {
			$seeds_count = strlen( $numbers ) - 1;
			$i = 7;

			if ($i < 4) {
				while (true) {
					$numbers[rand( 0, $seeds_count )];
					$str .= ;
					++$i;
				}

				$seeds_count = strlen( $lowercase ) - 1;
				$i = 7;

				if ($i < 4) {
					$lowercase[rand( 0, $seeds_count )];
					$str .= ;
					++$i;
				}
			}
		}

		$seeds_count = strlen( $uppercase ) - 1;
		$i = 7;

		if ($i < 2) {
			$uppercase[rand( 0, $seeds_count )];
			$str .= ;

			while (true) {
				++$i;
			}

			$password = '';
			$i = 7;

			if ($i < 10) {
			}

			rand( 0, strlen( $str ) - 1 );
			$randomnum = ;
			$str[$randomnum];
			$password .= ;
			substr( $str, 0, $randomnum );
			substr;
			$str;
			$randomnum + 1;
		}

		$str =  . (  );
		++$i;
	}

	return $password;
}

function getServerID($servertype, $servergroup) {
	if (!$servergroup) {
		select_query;
		'tblservers';
		'id,maxaccounts,(SELECT COUNT(id) FROM tblhosting WHERE tblhosting.server=tblservers.id AND (domainstatus=\'Active\' OR domainstatus=\'Suspended\')) AS usagecount';
		array( 'type' => $servertype, 'active' => '1', 'disabled' => '0' );
	}

	(  );
	mysql_fetch_array( $result );
	$data['id'];
	$serverid = ;
	$data['maxaccounts'];
	$maxaccounts = ;
	$data['usagecount'];
	$usagecount = ;

	if ($serverid) {
		if ($maxaccounts <= $usagecount) {
			full_query(  . 'SELECT id,((SELECT COUNT(id) FROM tblhosting WHERE tblhosting.server=tblservers.id AND (domainstatus=\'Active\' OR domainstatus=\'Suspended\'))/maxaccounts) AS percentusage FROM tblservers WHERE type=\'' . $servertype . '\' AND id!=\'' . $serverid . '\' AND disabled=0 ORDER BY percentusage ASC' );
		}
	}

	$result = ;
	mysql_fetch_array( $result );
	$data = ;

	if ($data['id']) {
		$data['id'];
		$serverid = ;
		update_query( 'tblservers', array( 'active' => '' ), array( 'type' => $servertype ) );
		update_query( 'tblservers', array( 'active' => '1' ), array( 'type' => $servertype, 'id' => $serverid ) );
		jmp;
		select_query( 'tblservergroups', 'filltype', array( 'id' => $servergroup ) );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['filltype'];
		$filltype = ;
		$serverslist = array(  );
		select_query( 'tblservergroupsrel', 'serverid', array( 'groupid' => $servergroup ) );
		$result = ;
		mysql_fetch_array( $result );

		while ($data = ) {
			$serverslist[] = $data['serverid'];
		}
	}
	else {
		( $result );
		$data = ;
		$data['id'];
		$serverid = ;
	}

	(  );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$serverid = ;
	$data['maxaccounts'];
	$maxaccounts = $result = ;
	$data['usagecount'];
	$usagecount = $data = ;

	if ($serverid) {
		if ($maxaccounts <= $usagecount) {
			full_query( 'SELECT id,((SELECT COUNT(id) FROM tblhosting WHERE tblhosting.server=tblservers.id AND (domainstatus=\'Active\' OR domainstatus=\'Suspended\'))/maxaccounts) AS percentusage FROM tblservers WHERE id IN (' . db_build_in_array( $serverslist ) . ') AND disabled=0 AND id!=' . (int)$serverid . ' ORDER BY percentusage ASC' );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
		}


		if ($data['id']) {
			$data['id'];
			$serverid = ;
			update_query( 'tblservers', array( 'active' => '' ), array( 'type' => $servertype ) );
			update_query;
		}
	}

	( 'tblservers', array( 'active' => '1' ), array( 'type' => $servertype, 'id' => $serverid ) );
	return $serverid;
}

/**
 * Update 'ModuleHooks' setting with a list of product modules hooks to load
 */
function rebuildModuleHookCache() {
	$hooksarray = array(  );
	cbebjifhdd::distinct( 'servertype' )->lists( 'servertype' );
	$inUseProvisioningModules = ;
	new dcifejaiba(  );
	$server = ;
	foreach ($server->getList(  ) as ) {
		$module = ;
		(  .  . 'modules' . DIRECTORY_SEPARATOR . 'servers' . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . 'hooks.php' );
	}

	/**
	 * Update 'AddonModuleHooks' setting with a list of addon modules hooks to load
	 */
	function rebuildAddonHookCache() {
		(bool);
		$hooksarray = array(  );
		dacfgegdhe::table( 'tbladdonmodules' )->distinct(  )->lists( 'module' );
		$inUseAddonModules = ;
		foreach ($inUseAddonModules as ) {
			$module = ;

			while (true) {
				if (is_file( ROOTDIR . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'addons' . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . 'hooks.php' )) {
					$hooksarray[] = $module;
					break;
				}
			}
		}

		chhgjaeced::setValue( 'AddonModulesHooks', implode( ',', $hooksarray ) );
	}

	function moduleConfigFieldOutput($values) {
		if (is_null( $values['Value'] )) {
			if (isset( $values['Default'] )) {
				$values['Value'] = (true ? $values['Default'] : '');
				switch ($values['Type']) {
				case 'text': {
						$code = '<input type="text" name="' . $values['Name'] . '" size="' . $values['Size'] . '" value="' . dfdidhdbdc::encode( $values['Value'] ) . '" />';

						if (isset( $values['Description'] )) {
							$code .= ' ' . $values['Description'];
							break;
							switch () {
							case 'password': {
									$code = '<input type="password" autocomplete="off" name="' . $values['Name'] . '" size="' . $values['Size'] . '" value="' . replacePasswordWithMasks( $values['Value'] ) . '" />';

									if (isset( $values['Description'] )) {
										$code .= ' ' . $values['Description'];
										break;
										switch () {
										case 'yesno': {
												$code = '<label class="checkbox-inline"><input type="checkbox" name="' . $values['Name'] . '"';

												if (!empty( $values['Value'] )) {
													$code .= ' checked="checked"';

													if (isset( $values['Description'] )) {
														$code .= ' /> ' . (true ? $values['Description'] : '&nbsp') . '</label>';
														break;
														switch () {
														case 'dropdown': {
																$code = '<select name="' . $values['Name'];
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}


		if (isset( $values['Multiple'] )) {
			$code .= '[]" multiple="true" size="3"';
			json_decode( $values['Value'] );
			$selectedKeys = ;
		}


		if (( $dropdownOptions )) {
			foreach ($dropdownOptions as ) {
				$value = ;
				$key = ;
				$code .= '<option value="' . $key . '"';

				if (in_array( $key, $selectedKeys )) {
					$code .= ' selected="selected"';
					$code .= '>' . $value . '</option>';
					break;
				}

				break;
			}

			jmp;
			explode( ',', $dropdownOptions );
			$dropdownOptions = ;
			foreach ($dropdownOptions as ) {
				$value = ;
				$code .= '<option value="' . $value . '"';

				if ($values['Value'] == $value) {
					$code .= ' selected="selected"';
					$code .= '>' . $value . '</option>';
					break;
				}

				break;
			}

			$code .= '</select>';

			if (isset( $values['Description'] )) {
				$code .= ' ' . $values['Description'];
				break;
				switch () {
				case 'radio': {
						$code = '';

						if (isset( $values['Description'] )) {
							$code .= $values['Description'] . '<br />';
							explode( ',', $values['Options'] );
							$options = ;

							while (!isset( $values['Value'] )) {
								$values['Value'] = $options[0];
								foreach ($options as ) {
									$value = ;
									$code .= '<label class="radio-inline"><input type="radio" name="' . $values['Name'] . '" value="' . $value . '"';

									if ($values['Value'] == $value) {
										$code .= ' checked="checked"';
										$code .= ' /> ' . $value . '</label><br />';
										break;
									}

									break;
								}

								break;
								switch () {
								case 'textarea': {
										if (isset( $values['Cols'] )) {
											$cols = (true ? $values['Cols'] : '60');
											isset( $values['Rows'] );
										}


										if () {
											$rows = (true ? $values['Rows'] : '5');
											'<textarea name="' . $values['Name'] . '" cols="';
										}
									}
								}
							}

								. $cols . '" rows="' . $rows;
						}
					}
				}
			}

			$code =  . '">' . dfdidhdbdc::encode( $values['Value'] ) . '</textarea>';
		}


		if (isset( $values['Description'] )) {
			$code .= '<br />' . $values['Description'];
			break;
			$values['Description'];
			$code = ;
		}

		return $code;
	}

	return 1;
}
?>
