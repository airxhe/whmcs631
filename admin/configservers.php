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

/**
 * Get module specific values needed to build manage page
 *
 * @param string $moduleName
 *
 * @return array
 */
function getModuleInfo($moduleName) {
	$returnData = array( 'cantestconnection' => false, 'supportsadminsso' => false, 'defaultsslport' => '', 'defaultnonsslport' => '' );
	new dcifejaiba(  );
	$moduleInterface = ;

	if ($moduleInterface->load( $moduleName )) {
		$moduleInterface->functionExists;
	}

	if (( 'TestConnection' )) = ;
	$returnData['defaultnonsslport'] = $moduleInterface->getMetaDataValue( 'DefaultNonSSLPort' );
	return $returnData;
}

define( 'ADMINAREA', true );
require( '../init.php' );

if (( $action == 'singlesignon' && checkPermission( 'WHMCSConnect', true ) )) {
	new dgeegejige( 'WHMCSConnect' );
	$aInt = ;

	if ($whmcs->get_req_var( 'error' )) {
		if (eaaadiagec::get( 'ServerModuleCallError' )) {
			echo cgjfihaefi::applicationError( AdminLang::trans( 'global.erroroccurred' ), eaaadiagec::get( 'ServerModuleCallError' ) );

			if (false);
			jmp;
			echo cgjfihaefi::applicationError( AdminLang::trans( 'global.erroroccurred' ) );
			throw new bedgbfeidd(  );

			if (false);
			jmp;
			new dgeegejige( 'Configure Servers' );
			$aInt = ;
			$aInt->title = 'Servers';
			$aInt->sidebar = 'config';
			$aInt->icon = 'servers';
			$aInt->helplink = 'Servers';
			$whmcs->get_req_var( 'action' );
			$action = ;
			$id = (int)$whmcs->get_req_var( 'id' );

			if ($action == 'getmoduleinfo') {
				check_token( 'WHMCS.admin.default' );
				$whmcs->get_req_var( 'type' );
				$moduleName = ;
				getModuleInfo( $moduleName );
				$moduleInfo = ;
				throw new ggjchbedc( $moduleInfo )(  );

				if ($action == 'testconnection') {
					check_token( 'WHMCS.admin.default' );
					$whmcs->get_req_var( 'type' );
					$moduleName = ;
					new dcifejaiba(  );
					$moduleInterface = ;

					if (!$moduleInterface->load( $moduleName )) {
						throw new ggjchbedc( 'Invalid Server Module Type' );

						if ($moduleInterface->functionExists( 'TestConnection' )) {
							dfdidhdbdc::decode( $whmcs->get_req_var( 'password' ) );
							$passwordToTest = ;
							$whmcs->get_req_var( 'serverid' );
							$serverId = ;

							if ($serverId) {
								get_query_val( 'tblservers', 'password', array( 'id' => $serverId ) );
								$storedPassword = ;
								decrypt( $storedPassword );
								$storedPassword = ;

								if (!hasMaskedPasswordChanged( $passwordToTest, $storedPassword )) {
									$passwordToTest = $allowedRoleIds;
									$moduleInterface->getServerParams( $serverId, array( 'ipaddress' => $whmcs->get_req_var( 'ipaddress' ), 'hostname' => $whmcs->get_req_var( 'hostname' ), 'username' => $whmcs->get_req_var( 'username' ), 'password' => encrypt( $passwordToTest ), 'accesshash' => $whmcs->get_req_var( 'accesshash' ), 'secure' => $whmcs->get_req_var( 'secure' ), 'port' => $whmcs->get_req_var( 'port' ) ) );
									$params = ;
									$moduleInterface->call( 'TestConnection', $params );
									$connectionTestResult = ;

									if (( array_key_exists( 'success', $connectionTestResult ) && $connectionTestResult['success'] == true )) {
										$htmlOutput = '<span style="padding:2px 10px;background-color:#5bb75b;color:#fff;font-weight:bold;">' . $aInt->lang( 'configservers', 'testconnectionsuccess' ) . '</div>';

										if (false);
										jmp;

										if (array_key_exists( 'error', $connectionTestResult )) {
											$errorMsg = (true ? $connectionTestResult['error'] : $aInt->lang( 'configservers', 'testconnectionunknownerror' ));
											$htmlOutput = '<span style="padding:2px 10px;background-color:#cc0000;color:#fff;"><strong>' . $aInt->lang( 'configservers', 'testconnectionfailed' ) . ':</strong> ' . dfdidhdbdc::makeSafeForOutput( $errorMsg ) . '</div>';
											throw new ggjchbedc( $htmlOutput );

											if (false);
											jmp;
											throw new ggjchbedc( 'configservers', 'testconnectionnotsupported' )(  );
											throw new bedgbfeidd(  );

											if ($action == 'singlesignon') {
												check_token( 'WHMCS.admin.default' );
												$serverId = (int)$whmcs->get_req_var( 'serverid' );
												dacfgegdhe::table( 'tblservers' )->find( $serverId );
												$server = ;
												dacfgegdhe::table( 'tblserversssoperms' )->where( 'server_id', '=', $serverId )->lists( 'role_id' );
												$allowedRoleIds = ;

												if (count( $restrictedRoles ) == 0) {
													$allowAccess = true;

													if (false);
													jmp;
													$allowAccess = false;
													new ddhiacdee(  );
													$adminAuth = ;
													$adminAuth->getInfobyID( eaaadiagec::get( 'adminid' ) );
													$adminAuth->getAdminRoleId(  );
													$adminRoleId = ;

													if (in_array( $adminRoleId, $allowedRoleIds )) {
														$allowAccess = true;

														if (!$allowAccess) {
															new eaaadiagec(  );
															$session = ;
															$session->create( $whmcs->getWHMCSInstanceID(  ) );
															logAdminActivity(  . 'Single Sign-on Access Denied: \'' . $server->name . '\' - Server ID: ' . $serverId );
															eaaadiagec::set( 'ServerModuleCallError', 'You do not have permisson to sign-in to this server. If you feel this message to be an error, please contact the system administrator.' );
															redir( 'action=singlesignon&error=1' );
															new dcifejaiba(  );
															$moduleInterface = ;
															$moduleInterface->getSingleSignOnUrlForAdmin( $serverId );
															$redirectUrl = ;
															logAdminActivity(  . 'Single Sign-on Completed: \'' . $server->name . '\' - Server ID: ' . $serverId );

															if (false);
															jmp;
															caddbfffjf {
																new eaaadiagec(  );
																$session = ;
																$session->create( $whmcs->getWHMCSInstanceID(  ) );
																eaaadiagec::set( 'ServerModuleCallError', $e->getMessage(  ) );
																redir( 'action=singlesignon&error=1' );

																if (false);
																jmp;
																Exception {
																	logActivity( 'Single Sign-On Request Failed with a Fatal Error: ' . $e->getMessage(  ) );
																	new eaaadiagec(  );
																	$session = ;
																	$session->create( $whmcs->getWHMCSInstanceID(  ) );
																	eaaadiagec::set( 'ServerModuleCallError', 'A fatal error occurred. Please see activity log for more details.' );
																	redir( 'action=singlesignon&error=1' );
																	header( 'Location: ' . $redirectUrl );
																	throw new bedgbfeidd(  );

																	if ($action == 'delete') {
																		check_token( 'WHMCS.admin.default' );
																		get_query_val( 'tblhosting', 'COUNT(*)', array( 'server' => $id ) );
																		$numaccounts = ;

																		if (0 < $numaccounts) {
																			redir( 'deleteerror=true' );

																			if (false);
																			jmp;
																			run_hook( 'ServerDelete', array( 'serverid' => $id ) );
																			dacfgegdhe::table( 'tblservers' )->find( $id );
																			$server = ;
																			logAdminActivity(  . 'Server Deleted: \'' . $server->name . '\' - Server ID: ' . $id );
																			delete_query( 'tblservers', array( 'id' => $id ) );
																			redir( 'deletesuccess=true' );

																			if ($action == 'deletegroup') {
																				check_token( 'WHMCS.admin.default' );
																				dacfgegdhe::table( 'tblservergroups' )->find( $id );
																				$serverGroup = ;
																				logAdminActivity(  . 'Server Group Deleted: \'' . $serverGroup->name . '\' - Server Group ID: ' . $id );
																				delete_query( 'tblservergroups', array( 'id' => $id ) );
																				delete_query( 'tblservergroupsrel', array( 'serverid' => $id ) );
																				redir( 'deletegroupsuccess=true' );

																				if ($action == 'save') {
																					check_token( 'WHMCS.admin.default' );
																					$whmcs->get_req_var( 'name' );
																					$name = ;
																					$whmcs->get_req_var( 'hostname' );
																					$hostname = ;
																					$whmcs->get_req_var( 'ipaddress' );
																					$ipaddress = ;
																					$whmcs->get_req_var( 'assignedips' );
																					$assignedips = ;
																					$monthlycost = (double)$whmcs->get_req_var( 'monthlycost' );
																					$whmcs->get_req_var( 'noc' );
																					$noc = ;
																					$maxaccounts = (int)$whmcs->get_req_var( 'maxaccounts' );
																					$whmcs->get_req_var( 'statusaddress' );
																					$statusaddress = ;
																					$disabled = (int)(string)$whmcs->get_req_var( 'disabled' );
																					$whmcs->get_req_var;
																				}

																				( 'nameserver1' );
																				$nameserver1 = ;
																				$whmcs->get_req_var( 'nameserver1ip' );
																				$nameserver1ip = ;
																				$whmcs->get_req_var( 'nameserver2' );
																				$nameserver2 = ;
																				$whmcs->get_req_var( 'nameserver2ip' );
																				$nameserver2ip = ;
																				$whmcs->get_req_var( 'nameserver3' );
																				$nameserver3 = ;
																				$whmcs->get_req_var( 'nameserver3ip' );
																				$nameserver3ip = ;
																				$whmcs->get_req_var( 'nameserver4' );
																				$nameserver4 = ;
																				$whmcs->get_req_var( 'nameserver4ip' );
																				$nameserver4ip = ;
																				$whmcs->get_req_var( 'nameserver5' );
																				$nameserver5 = ;
																				$whmcs->get_req_var( 'nameserver5ip' );
																				$nameserver5ip = ;
																				$whmcs->get_req_var( 'type' );
																				$type = ;
																				$whmcs->get_req_var( 'username' );
																				$username = ;
																				$whmcs->get_req_var( 'password' );
																				$password = ;
																				$whmcs->get_req_var( 'accesshash' );
																				$accesshash = ;
																				$whmcs->get_req_var( 'secure' );
																				$secure = ;
																				$whmcs->get_req_var( 'port' );
																				$port = ;
																				$restrictsso = (int)$whmcs->get_req_var( 'restrictsso' );
																				getModuleInfo( $type );
																				$moduleInfo = ;

																				if ($secure) {
																					$moduleInfo['default' . (true ? '' : 'non') . 'sslport'];
																					$defaultPort = ;

																					if (( !$port || $port == $defaultPort )) {
																						$port = 'NULL';

																						if ($id) {
																							$changes = array(  );
																							dacfgegdhe::table( 'tblservers' )->find( $id );
																							$server = ;

																							if ($type == $server->type) {
																								$active = (true ? $server->active : '');

																								if ($name != $server->name) {
																									$changes[] = (  . 'Name Modified: \'' . $server->name . '\' to \'' . $name . '\'' );
																								}
																							}
																						}


																						if ($hostname != $server->hostname) {
																							$changes[] = (  . 'Hostname Modified: \'' . $server->hostname . '\' to \'' . $hostname . '\'' );

																							if ($ipaddress != $server->ipaddress) {
																								$changes[] = (  . 'IP Address Modified: \'' . $server->ipaddress . '\' to \'' . $ipaddress . '\'' );

																								if ($assignedips != $server->assignedips) {
																									$changes[] = 'Assigned IP Addresses Modified';

																									if ($monthlycost != $server->monthlycost) {
																										$changes[] = (  . 'Monthly Cost Modified: \'' . $server->monthlycost . '\' to \'' . $monthlycost . '\'' );

																										if ($noc != $server->noc) {
																											$changes[] = (  . 'Datacenter/NOC Modified: \'' . $server->noc . '\' to \'' . $noc . '\'' );

																											if ($maxaccounts != $server->maxaccounts) {
																												$changes[] = (  . 'Maximum No. of Accounts Modified: \'' . $server->maxaccounts . '\' to \'' . $maxaccounts . '\'' );

																												if ($statusaddress != $server->statusaddress) {
																													$changes[] = (  . 'Server Status Address Modified: \'' . $server->statusaddress . '\' to \'' . $statusaddress . '\'' );

																													if ($disabled != $server->disabled) {
																														if ($disabled) {
																															$changes[] = 'Server Disabled';

																															if (false);
																															jmp;
																															$changes[] = 'Server Enabled';

																															if ($nameserver1 != $server->nameserver1) {
																																$changes[] = (  . 'Primary Nameserver Modified: \'' . $server->nameserver1 . '\' to \'' . $nameserver1 . '\'' );

																																if ($nameserver1ip != $server->nameserver1ip) {
																																	$changes[] = (  . 'Primary Nameserver IP Modified: \'' . $server->nameserver1ip . '\' to \'' . $nameserver1ip . '\'' );

																																	if ($nameserver2 != $server->nameserver2) {
																																		$changes[] = (  . 'Secondary Nameserver Modified: \'' . $server->nameserver2 . '\' to \'' . $nameserver2 . '\'' );

																																		if ($nameserver2ip != $server->nameserver2ip) {
																																			$changes[] = (  . 'Secondary Nameserver IP Modified: \'' . $server->nameserver2ip . '\' to \'' . $nameserver2ip . '\'' );

																																			if ($nameserver3 != $server->nameserver3) {
																																				$changes[] = (  . 'Third Nameserver Modified: \'' . $server->nameserver3 . '\' to \'' . $nameserver3 . '\'' );

																																				if ($nameserver3ip != $server->nameserver3ip) {
																																					$changes[] = (  . 'Third Nameserver IP Modified: \'' . $server->nameserver3ip . '\' to \'' . $nameserver3ip . '\'' );

																																					if ($nameserver4 != $server->nameserver4) {
																																						$changes[] = (  . 'Fourth Nameserver Modified: \'' . $server->nameserver4 . '\' to \'' . $nameserver4 . '\'' );

																																						if ($nameserver4ip != $server->nameserver4ip) {
																																							$changes[] = (  . 'Fourth Nameserver IP Modified: \'' . $server->nameserver4ip . '\' to \'' . $nameserver4ip . '\'' );

																																							if ($nameserver5 != $server->nameserver5) {
																																								$changes[] = (  . 'Fifth Nameserver Modified: \'' . $server->nameserver5 . '\' to \'' . $nameserver5 . '\'' );

																																								if ($nameserver5ip != $server->nameserver5ip) {
																																									$changes[] = (  . 'Fifth Nameserver IP Modified: \'' . $server->nameserver5ip . '\' to \'' . $nameserver5ip . '\'' );

																																									if ($type != $server->type) {
																																										$changes[] = (  . 'Type Modified: \'' . $server->type . '\' to \'' . $type . '\'' );

																																										if ($username != $server->username) {
																																											$changes[] = (  . 'Username Modified: \'' . $server->username . '\' to \'' . $username . '\'' );

																																											if ($accesshash != $server->accesshash) {
																																												$changes[] = (  . 'Access Hash Modified: \'' . $server->accesshash . '\' to \'' . $accesshash . '\'' );

																																												if ($secure != $server->secure) {
																																													if ($secure) {
																																														$changes[] = 'Secure Connection Enabled';

																																														if (false);
																																														jmp;
																																														$changes[] = 'Secure Connection Disabled';

																																														if (( $port != $server->port && $port != 'NULL' )) {
																																															$changes[] = (  . 'Port Modified: \'' . $server->port . '\' to \'' . $port . '\'' );
																																															$saveData = array( 'name' => $name, 'type' => $type, 'ipaddress' => trim( $ipaddress ), 'assignedips' => trim( $assignedips ), 'hostname' => trim( $hostname ), 'monthlycost' => trim( $monthlycost ), 'noc' => $noc, 'statusaddress' => trim( $statusaddress ), 'nameserver1' => trim( $nameserver1 ), 'nameserver1ip' => trim( $nameserver1ip ), 'nameserver2' => trim( $nameserver2 ), 'nameserver2ip' => trim( $nameserver2ip ), 'nameserver3' => trim( $nameserver3 ), 'nameserver3ip' => trim( $nameserver3ip ), 'nameserver4' => trim( $nameserver4 ), 'nameserver4ip' => trim( $nameserver4ip ), 'nameserver5' => trim( $nameserver5 ), 'nameserver5ip' => trim( $nameserver5ip ), 'maxaccounts' => trim( $maxaccounts ), 'username' => trim( $username ), 'accesshash' => trim( $accesshash ), 'secure' => $secure, 'port' => $port, 'disabled' => $disabled, 'active' => $active );
																																															trim( $whmcs->get_req_var( 'password' ) );
																																															$newPassword = ;
																																															decrypt( get_query_val( 'tblservers', 'password', array( 'id' => $id ) ) );
																																															$originalPassword = ;
																																															interpretMaskedPasswordChangeForStorage( $newPassword, $originalPassword );
																																															$valueToStore = ;

																																															if ($valueToStore !== false) {
																																																$saveData['password'] = $valueToStore;

																																																if ($newPassword != $originalPassword) {
																																																	$changes[] = 'Password Modified';
																																																	update_query( 'tblservers', $saveData, array( 'id' => $id ) );

																																																	if ($restrictsso) {
																																																		$whmcs->get_req_var( 'restrictssoroles' );
																																																		$newSsoRoleRestrictions = ;

																																																		if (!is_array( $newSsoRoleRestrictions )) {
																																																			$newSsoRoleRestrictions = array(  );
																																																			$changedPermissions = array(  );
																																																			$adminRoleNames = ;
																																																			$newSsoRoleRestrictions[] = '0';
																																																			dacfgegdhe::table( 'tblserversssoperms' )->where( 'server_id', '=', $id )->get(  );
																																																			$existingAccesses = ;

																																																			if (!$existingAccesses) {
																																																				$changes[] = 'Access Control Enabled';
																																																				dacfgegdhe::table( 'tblserversssoperms' )->whereNotIn( 'role_id', $newSsoRoleRestrictions )->where( 'server_id', '=', $id )->delete(  );
																																																				dacfgegdhe::table( 'tblserversssoperms' )->where( 'server_id', '=', $id )->lists( 'role_id' );
																																																				$currentSsoRoleRestrictions = ;
																																																				foreach ($newSsoRoleRestrictions as ) {
																																																					$roleId = ;

																																																					if (!in_array( $roleId, $currentSsoRoleRestrictions )) {
																																																						if (!isset( $adminRoleNames[$roleId] )) {
																																																							$adminRoleNames[$roleId] = dacfgegdhe::table( 'tbladminroles' )->find( $roleId, array( 'name' ) )->name;
																																																							dacfgegdhe::table( 'tblserversssoperms' )->insert( array( 'server_id' => $id, 'role_id' => $roleId ) );
																																																							$changedPermissions['added'][] = $adminRoleNames[$roleId];

																																																							if (false);
																																																						}


																																																						if (false);
																																																						jmp;
																																																					}


																																																					if (false);
																																																				}

																																																				foreach ($existingAccesses as ) {
																																																					$existingAccess = ;

																																																					if (!in_array( $existingAccess->role_id, $newSsoRoleRestrictions )) {
																																																						if (!isset( $adminRoleNames[$existingAccess->role_id] )) {
																																																							$adminRoleNames[$existingAccess->role_id] = dacfgegdhe::table( 'tbladminroles' )->find( $existingAccess->role_id, array( 'name' ) )->name;
																																																							$changedPermissions['removed'][] = $adminRoleNames[$existingAccess->role_id];

																																																							if (false);
																																																						}


																																																						if (false);
																																																						jmp;
																																																					}


																																																					if (false);
																																																				}


																																																				if ($changedPermissions) {
																																																					if (array_filter( $changedPermissions['added'] )) {
																																																						$changes[] = 'Added Access Control Group(s): ' . implode( ', ', $changedPermissions['added'] );

																																																						if (array_filter( $changedPermissions['removed'] )) {
																																																							$changes[] = 'Removed Access Control Group(s): ' . implode( ', ', $changedPermissions['removed'] );

																																																							if (false);
																																																							jmp;
																																																							dacfgegdhe::table( 'tblserversssoperms' )->where( 'server_id', '=', $id )->delete(  );
																																																							$deletedRows = ;

																																																							if ($deletedRows) {
																																																								$changes[] = 'Access Control Disabled';

																																																								if ($changes) {
																																																									logAdminActivity(  . 'Server Modified: \'' . $name . '\' - Changes: ' . implode( '. ', $changes ) . (  . ' - Server ID: ' . $id ) );
																																																									run_hook;
																																																									'ServerEdit';
																																																									array( 'serverid' => $id );
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

																																															(  );
																																															redir( 'savesuccess=true' );

																																															if (false);
																																															jmp;
																																															select_query( 'tblservers', 'id', array( 'type' => $type, 'active' => '1' ) );
																																															$result = ;
																																															mysql_fetch_array( $result );
																																															$data = ;

																																															if ($data['id']) {
																																																$active = (true ? '' : '1');
																																																insert_query( 'tblservers', array( 'name' => $name, 'type' => $type, 'ipaddress' => trim( $ipaddress ), 'assignedips' => trim( $assignedips ), 'hostname' => trim( $hostname ), 'monthlycost' => trim( $monthlycost ), 'noc' => $noc, 'statusaddress' => trim( $statusaddress ), 'nameserver1' => trim( $nameserver1 ), 'nameserver1ip' => trim( $nameserver1ip ), 'nameserver2' => trim( $nameserver2 ), 'nameserver2ip' => trim( $nameserver2ip ), 'nameserver3' => trim( $nameserver3 ), 'nameserver3ip' => trim( $nameserver3ip ), 'nameserver4' => trim( $nameserver4 ), 'nameserver4ip' => trim( $nameserver4ip ), 'nameserver5' => trim( $nameserver5 ), 'nameserver5ip' => trim( $nameserver5ip ), 'maxaccounts' => trim( $maxaccounts ), 'username' => trim( $username ), 'password' => encrypt( trim( $password ) ), 'accesshash' => trim( $accesshash ), 'secure' => $secure, 'port' => $port, 'active' => $active, 'disabled' => $disabled ) );
																																																$newid = ;

																																																if ($restrictsso) {
																																																	$whmcs->get_req_var( 'restrictssoroles' );
																																																	$newSsoRoleRestrictions = array(  );
																																																	foreach ($newSsoRoleRestrictions as ) {
																																																		$roleId = ;
																																																		dacfgegdhe::table( 'tblserversssoperms' )->insert( array( 'server_id' => $id, 'role_id' => $roleId ) );

																																																		if (false);
																																																	}

																																																	logAdminActivity(  . 'Server Created: \'' . $name . '\' - Server ID: ' . $id );
																																																	run_hook( 'ServerAdd', array( 'serverid' => $newid ) );
																																																	redir( 'createsuccess=true' );

																																																	if ($action == 'savegroup') {
																																																		check_token( 'WHMCS.admin.default' );
																																																		$whmcs->get_req_var( 'name' );
																																																		$name = ;
																																																		$filltype = (int)$whmcs->get_req_var( 'filltype' );
																																																		$whmcs->get_req_var( 'selectedservers' );
																																																		$selectedservers = array(  );
																																																		array(  );
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
																					}
																				}
																			}
																		}
																	}
																}


																if (false);
															}


															if (false);
														}


														if (false);
														jmp;
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
else {
	$serverList = ;
	$changes = ;
	$serverUpdated = false;

	if ($id) {
		dacfgegdhe::table( 'tblservergroups' )->find( $id );
		$serverGroup = ;

		if ($name != $serverGroup->name) {
			$changes[] = (  . 'Name Modified: \'' . $serverGroup->name . '\' to \'' . $name . '\'' );

			if ($filltype != $serverGroup->filltype) {
				if ($filltype == 1) {
					$changes[] = 'Fill Type Modified: Add to the least full server';

					if (false);
					jmp;
					$changes[] = 'Fill Type Modified: Fill active server until full then switch to next least used';
					$serverUpdated = true;
					update_query( 'tblservergroups', array( 'name' => $name, 'filltype' => $filltype ), array( 'id' => $id ) );
					dacfgegdhe::table( 'tblservergroupsrel' )->where( 'groupid', '=', $id )->get(  );
					$existingServers = ;
					foreach ($existingServers as ) {
						$existingServer = ;
						$serverList[] = $existingServer->serverid;

						if (false);
					}

					delete_query( 'tblservergroupsrel', array( 'groupid' => $id ) );

					if (false);
					jmp;
					insert_query( 'tblservergroups', array( 'name' => $name, 'filltype' => $filltype ) );
					$id = ;
					logAdminActivity(  . 'Server Group Created: \'' . $name . '\' - Server Group ID: ' . $id );

					if ($selectedservers) {
						$allocated = false;
						foreach ($selectedservers as ) {
							$serverid = ;
							insert_query( 'tblservergroupsrel', array( 'groupid' => $id, 'serverid' => $serverid ) );

							if (( !in_array( $serverid, $serverList ) && $allocated === false )) {
								$changes[] = 'Server(s) Added to Group';
								$allocated = true;

								if (false);
							}


							if (false);
						}

						foreach ($serverList as ) {
							$serverId = ;

							if (!in_array( $serverId, $selectedservers )) {
								$changes[] = 'Server(s) Removed from Group';
								break;
							}


							if (false);
						}


						if (false);
						jmp;

						if (( !$selectedservers && $serverList )) {
							$changes[] = 'All Servers Removed from Group';

							if (( $serverUpdated && $changes )) {
								logAdminActivity(  . 'Server Group Modified: \'' . $name . '\' - Changes: ' . implode( '. ', $changes ) . (  . ' - Server Group ID: ' . $id ) );
								redir( 'savesuccess=1' );

								if ($action == 'enable') {
									check_token( 'WHMCS.admin.default' );
									dacfgegdhe::table( 'tblservers' )->find( $id );
									$server = ;

									if ($server->disabled) {
										logAdminActivity(  . 'Server Enabled: \'' . $server->name . '\' - Server ID: ' . $id );
										update_query( 'tblservers', array( 'disabled' => '0' ), array( 'id' => $id ) );
										redir( 'enablesuccess=1' );

										if ($action == 'disable') {
											check_token( 'WHMCS.admin.default' );
											dacfgegdhe::table( 'tblservers' )->find( $id );
											$server = ;

											if (!$server->disabled) {
												logAdminActivity(  . 'Server Disabled: \'' . $server->name . '\' - Server ID: ' . $id );
												update_query( 'tblservers', array( 'disabled' => '1' ), array( 'id' => $id ) );
												redir( 'disablesuccess=1' );

												if ($action == 'makedefault') {
													check_token( 'WHMCS.admin.default' );
													select_query( 'tblservers', '', array( 'id' => $id ) );
													$result = ;
													mysql_fetch_array( $result );
													$data = ;
													$data['type'];
													$type = ;

													if (!$data['active']) {
														logAdminActivity(  . 'Server Set to Default: \'' . $data['name'] . '\' - Server ID: ' . $id );
														update_query( 'tblservers', array( 'active' => '' ), array( 'type' => $type ) );
														update_query( 'tblservers', array( 'active' => '1' ), array( 'id' => $id ) );
														redir( 'makedefault=1' );
														ob_start(  );

														if ($action == '') {
															if ($createsuccess) {
																infoBox( $aInt->lang( 'configservers', 'addedsuccessful' ), $aInt->lang( 'configservers', 'addedsuccessfuldesc' ) );

																if ($deletesuccess) {
																	infoBox( $aInt->lang( 'configservers', 'delsuccessful' ), $aInt->lang( 'configservers', 'delsuccessfuldesc' ) );

																	if ($deletegroupsuccess) {
																		infoBox;
																		$aInt->lang( 'configservers', 'groupdelsuccessful' );
																		$aInt->lang;
																		'configservers';
																		'groupdelsuccessfuldesc';
																	}
																}
															}

															( (  ) );

															if ($deleteerror) {
																infoBox( $aInt->lang( 'configservers', 'error' ), $aInt->lang( 'configservers', 'errordesc' ) );

																if ($savesuccess) {
																	infoBox( $aInt->lang( 'global', 'changesuccess' ), $aInt->lang( 'configservers', 'changesuccessdesc' ) );

																	if ($enablesuccess) {
																		infoBox( $aInt->lang( 'configservers', 'enabled' ), $aInt->lang( 'configservers', 'enableddesc' ) );

																		if ($disablesuccess) {
																			infoBox( $aInt->lang( 'configservers', 'disabled' ), $aInt->lang( 'configservers', 'disableddesc' ) );

																			if ($makedefault) {
																				infoBox( $aInt->lang( 'configservers', 'defaultchange' ), $aInt->lang( 'configservers', 'defaultchangedesc' ) );

																				if (( $whmcs->get_req_var( 'error' ) && eaaadiagec::get( 'ServerModuleCallError' ) )) {
																					infoBox( $aInt->lang( 'global', 'erroroccurred' ), eaaadiagec::get( 'ServerModuleCallError' ) );
																					eaaadiagec::delete( 'ServerModuleCallError' );
																					echo $infobox;
																					$aInt->deleteJSConfirm( 'doDelete', 'configservers', 'delserverconfirm', '?action=delete&id=' );
																					$aInt->deleteJSConfirm( 'doDeleteGroup', 'configservers', 'delgroupconfirm', '?action=deletegroup&id=' );
																					echo '
<p>';
																					echo $aInt->lang( 'configservers', 'pagedesc' );
																					echo '</p>

<p>
    <div class="btn-group" role="group">
        <a href="';
																					echo $whmcs->getPhpSelf(  );
																					echo '?action=manage" class="btn btn-default"><i class="fa fa-plus"></i> ';
																					echo $aInt->lang( 'configservers', 'addnewserver' );
																					echo '</a>
        <a href="';
																					echo $whmcs->getPhpSelf(  );
																					echo '?action=managegroup" class="btn btn-default"><i class="fa fa-plus-square"></i> ';
																					echo $aInt->lang( 'configservers', 'createnewgroup' );
																					echo '</a>
    </div>
</p>

';
																					new ddhiacdee(  );
																					$adminAuth = ;
																					$adminAuth->getInfobyID( eaaadiagec::get( 'adminid' ) );
																					$adminAuth->getAdminRoleId(  );
																					$adminRoleId = ;
																					new dcifejaiba(  );
																					$server = ;
																					$server->getList(  );
																					$modulesarray = ;
																					$aInt->sortableTableInit( 'nopagination' );
																					select_query;
																					'tblservers';
																				}
																			}
																		}
																	}
																}
															}

															( 'DISTINCT type', '', 'type', 'ASC' );
															$result3 = ;
															mysql_fetch_array( $result3 );

															if ($data = ) {
																$data['type'];
																$moduleName = ;
																new dcifejaiba(  );
																$module = ;
																$module->load( $moduleName );
																$module->getDisplayName(  );
																$moduleDisplayName = ;
																$tabledata[] = array( 'dividingline', $moduleDisplayName );
																$disableddata = array(  );
																select_query( 'tblservers', '', array( 'type' => $moduleName ), 'name', 'ASC' );
																$result = ;
																mysql_fetch_array( $result );

																if ($data = ) {
																	$id = (int)$data['id'];
																	$data['name'];
																	$name = ;
																	$data['ipaddress'];
																	$ipaddress = ;
																	$data['hostname'];
																	$hostname = ;
																	$data['maxaccounts'];
																	$maxaccounts = ;
																	$data['username'];
																	$username = ;
																	decrypt( $data['password'] );
																	$password = ;
																	$data['accesshash'];
																	$accesshash = ;
																	$data['secure'];
																	$secure = ;
																	$data['active'];
																	$active = ;
																	$data['type'];
																	$type = ;
																	$data['disabled'];
																	$disabled = ;

																	if ($active) {
																		$active = (true ? '*' : '');
																		get_query_val( 'tblhosting', 'COUNT(id)',  . 'server=\'' . $id . '\' AND (domainstatus=\'Active\' OR domainstatus=\'Suspended\')' );
																		$numaccounts = ;
																		@round( $numaccounts / $maxaccounts * 100, 0 );
																		$percentuse = ;

																		if (in_array( $type, $modulesarray )) {
																			$server->load( $type );
																			$server->getServerParams( $id, $data );
																			$params = ;

																			if ($server->functionExists( 'AdminSingleSignOn' )) {
																				$server->getMetaDataValue( 'AdminSingleSignOnLabel' );
																				$btnLabel = ;
																				dacfgegdhe::table( 'tblserversssoperms' )->where;
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
					}
				}
			}
		}
	}
}

( 'server_id', '=', $id )->lists( 'role_id' );
$ssoRoleRestrictions = ;
sprintf;
'<form action="configservers.php" method="post" target="_blank">' . '<input type="hidden" name="action" value="%s" />' . '<input type="hidden" name="serverid" value="%s" />' . '<input type="submit" value="%s"%s class="btn btn-sm%s" />' . '</form>';
'singlesignon';
$id;

if ($btnLabel) {
	(true ? $btnLabel : $aInt->lang( 'sso', 'adminlogin' ));

	if (( 0 < count( $ssoRoleRestrictions ) && !in_array( $adminRoleId, $ssoRoleRestrictions ) )) {
		(true ? ' disabled="disabled"' : '');
		!;
	}
}
?>
