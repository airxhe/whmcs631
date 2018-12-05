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

function load_admin_home_widgets() {
	global $aInt;
	global $hooks;
	global $allowedwidgets;
	global $jquerycode;
	global $jscode;

	if (!is_array( $hooks )) {
		if (defined( 'HOOKSLOGGING' )) {
			logActivity( sprintf( 'Hooks Debug: Hook File: the hooks list has been mutated to %s', ucfirst( gettype( $hooks ) ) ) );
			$hooks = array(  );
			$hookjquerycode = '';
			$hook_name = 'AdminHomeWidgets';
			explode( ',', $allowedwidgets );
			$allowedwidgets = ;
			$_SESSION['adminid'];
		}
	}

	$args = array( 'adminid' => , 'loading' => '<img src="images/loading.gif" align="absmiddle" /> ' . $aInt->lang( 'global', 'loading' ) );

	if (!array_key_exists( $hook_name, $hooks )) {
		return array(  );
		reset;
		$hooks[$hook_name];
	}

	(  );
	$results = array(  );
	each( $hooks[$hook_name] )[1];
	$hook = ;
	[0];
	$key = ;

	if () {
		substr( $hook['hook_function'], 7 );
		$widgetname = ;

		if (( in_array( $widgetname, $allowedwidgets ) && function_exists( $hook['hook_function'] ) )) {
			call_user_func( $hook['hook_function'], $args );
			$res = ;
			is_array;
			$res;
		}
	}


	if ((  )) {
		if (array_key_exists( 'jquerycode', $res )) {
			$hookjquerycode .= $res['jquerycode'] . '
';
			array_key_exists( 'jscode', $res );
		}


		if () {
			$jscode .= $res['jscode'] . '
';
			$results[] = array_merge( array( 'name' => $widgetname ), $res );
		}

		jmp;
		$jquerycode .=  . '
    }, 4000);';
		return $results;
	}
}


if (!function_exists( 'curl_init' )) {
	echo '<div style="border: 1px dashed #cc0000;font-family:Tahoma;background-color:#FBEEEB;width:100%;padding:10px;color:#cc0000;"><strong>Critical Error</strong><br>CURL is not installed or is disabled on your server and it is required for WHMCS to run</div>';
	exit(  );
	define( 'ADMINAREA', true );
	require( '../init.php' );

	if (!$licensing->checkOwnedUpdates(  )) {
		redir( 'licenseerror=version', 'licenseerror.php' );

		if (( !checkPermission( 'Main Homepage', true ) && checkPermission( 'Support Center Overview', true ) )) {
			redir( '', 'supportcenter.php' );
			new dgeegejige( 'Main Homepage' );
			$aInt = ;
			$aInt->title = $aInt->lang( 'global', 'hometitle' );
			$aInt->sidebar = 'home';
			$aInt->icon = 'home';
			$aInt->requiredFiles( array( 'clientfunctions', 'invoicefunctions', 'gatewayfunctions', 'ccfunctions', 'processinvoices', 'reportfunctions' ) );
			$aInt->template = 'homepage';
			new WHMCSChart(  );
			$chart = ;
			$whmcs->get_req_var( 'action' );
			$action = ;

			if (( $whmcs->get_req_var( 'createinvoices' ) || $whmcs->get_req_var( 'generateinvoices' ) )) {
				check_token( 'WHMCS.admin.default' );
				checkPermission( 'Generate Due Invoices' );
				createInvoices( '', $noemails );
				redir( 'generatedinvoices=1&count=' . $invoicecount );

				if ($whmcs->get_req_var( 'generatedinvoices' )) {
					infoBox( $aInt->lang( 'invoices', 'gencomplete' ), (int)$whmcs->get_req_var( 'count' ) . ' Invoices Created' );

					if ($whmcs->get_req_var( 'attemptccpayments' )) {
						check_token( 'WHMCS.admin.default' );
						checkPermission( 'Attempts CC Captures' );
						new eaaadiagec(  );
						$session = ;
						$session->create(  );
						eaaadiagec::set( 'AdminHomeCCCaptureResultMsg', ccProcessing(  ) );
						redir( 'attemptedccpayments=1' );

						if (( $whmcs->get_req_var( 'attemptedccpayments' ) && eaaadiagec::get( 'AdminHomeCCCaptureResultMsg' ) )) {
							infoBox( $aInt->lang( 'invoices', 'attemptcccapturessuccess' ), eaaadiagec::get( 'AdminHomeCCCaptureResultMsg' ) );
							new eaaadiagec(  );
							$session = ;
							$session->create(  );
							eaaadiagec::delete( 'AdminHomeCCCaptureResultMsg' );
							$action == 'savenotes';
						}


						if () {
							check_token( 'WHMCS.admin.default' );
							update_query( 'tbladmins', array( 'notes' => $notes ), array( 'id' => $_SESSION['adminid'] ) );
							redir(  );

							if ($whmcs->get_req_var( 'infopopup' )) {
								$valuesToSend = array( 'licensekey' => $whmcs->get_license_key(  ), 'version' => $whmcs->getVersion(  )->getCanonical(  ), 'ssl' => $whmcs->in_ssl(  ), 'phpversion' => PHP_VERSION, 'extension_pdo' => extension_loaded( 'pdo' ), 'extension_pdomysql' => extension_loaded( 'pdo_mysql' ), 'memory_limit' => ini_get( 'memory_limit' ), 'config_fileperms' => fileperms( ROOTDIR . DIRECTORY_SEPARATOR . 'configuration.php' ), 'writeabledirs_moved' => $whmcs->getApplicationConfig(  )->hasCustomWritableDirectories(  ) );
								curlCall;
								'https://cdn.whmcs.com/feeds/homepopup.php';
							}
						}

						( $valuesToSend );
						$data = ;

						if (substr( $data, 0, 2 ) != 'ok') {
							exit( '<div class="content" style="text-align:center;padding-top:80px;">A connection error occurred. Please try again later.</div>' );
						}

						echo  . ( 'billing', 'incomethisyear' ) . ': <span class="textblack"><b>' . $stats['income']['thisyear'] . '</b></span>';
						exit(  );
						$templatevars['licenseinfo'] = array( 'registeredname' => $licensing->getRegisteredName(  ), 'productname' => $licensing->getProductName(  ), 'expires' => $licensing->getExpiryDate(  ), 'currentversion' => $whmcs->getVersion(  )->getCasual(  ), 'latestversion' => $licensing->getLatestVersion(  )->getCasual(  ), 'updateavailable' => $licensing->isUpdateAvailable(  ) );

						if ($licensing->getKeyData( 'productname' ) == '15 Day Free Trial') {
							$templatevars['freetrial'] = true;
							$templatevars['infobox'] = $infobox;
							$query = 'SELECT COUNT(*) FROM tblpaymentgateways WHERE setting=\'type\' AND value=\'CC\'';
							full_query( $query );
							$result = ;
							mysql_fetch_array( $result );
							$data = ;

							if ($data[0]) {
								$templatevars['showattemptccbutton'] = true;

								if ($CONFIG['MaintenanceMode']) {
									$templatevars['maintenancemode'] = true;
									$jquerycode = '$( ".homecolumn" ).sortable({
    handle : \'.widget-header\',
    connectWith: [\'.homecolumn\'],
    stop: function() { saveHomeWidgets(); }
});
$( ".homewidget" ).find( ".widget-header" ).prepend( "<span class=\'ui-icon ui-icon-minusthick\'></span>");
resHomeWidgets();
$( ".widget-header .ui-icon" ).click(function() {
    $( this ).toggleClass( "ui-icon-minusthick" ).toggleClass( "ui-icon-plusthick" );
    $( this ).parents( ".homewidget:first" ).find( ".widget-content" ).toggle();
    saveHomeWidgets();
});
';
									get_query_vals( 'tbladmins', 'tbladmins.homewidgets,tbladminroles.widgets', array( 'tbladmins.id' => $_SESSION['adminid'] ), '', '', '', 'tbladminroles ON tbladminroles.id=tbladmins.roleid' );
									$data = ;
									$data['homewidgets'];
									$homewidgets = ;
									$data['widgets'];
									$allowedwidgets = ;

									if (!$homewidgets) {
										$homewidgets = 'getting_started:true,system_overview:true,income_overview:true,client_activity:true,admin_activity:true,activity_log:true|my_notes:true,orders_overview:true,sysinfo:true,whmcs_news:true,network_status:true,todo_list:true,income_forecast:true,open_invoices:true';
										explode( '|', $homewidgets );
										$homewidgets = ;
										explode( ',', $homewidgets[0] );
										$homewidgetscol1 = ;
										foreach ($homewidgetscol1 as ) {
											$v = ;
											$k = ;
											explode( ':', $v );
											$v = ;

											if (!$v[0]) {
												unset( $homewidgetscol1[$k] );
												break;
											}

											break;
										}

										implode( ',', $homewidgetscol1 );
										$homewidgetscol1 = ;
										explode( ',', $homewidgets[1] );
										$homewidgetscol2 = ;
										foreach ($homewidgetscol2 as ) {
											$v = ;
											$k = ;
											explode( ':', $v );
											$v = ;

											if (!$v[0]) {
												unset( $homewidgetscol2[$k] );
												break;
											}

											break;
										}

										implode( ',', $homewidgetscol2 );
										$homewidgetscol2 = ;
										$jscode =  . 'var savedOrders = new Array();
savedOrders[1] = "' . $homewidgetscol1 . '";
savedOrders[2] = "' . $homewidgetscol2 . '";
function saveHomeWidgets() {
    var orderdata = \'\';
    $(".homecolumn").each(function(index, value){
        var colid = value.id;
        var order = $("#"+colid).sortable("toArray");
        for ( var i = 0, n = order.length; i < n; i++ ) {
            var v = $(\'#\' + order[i] ).find(\'.widget-content\').is(\':visible\');
            order[i] = order[i] + ":" + v;
        }
        orderdata = orderdata + order + "|";
    });';

										if ($aInt->chartFunctions) {
											$jscode .= 'redrawCharts()';
											generate_token( 'plain' );
											$csrfToken = ;
											$jscode .=  . '    $.post("index.php", { saveorder: "1", widgetdata: orderdata, token: "' . $csrfToken . '" });
}
function resHomeWidgets() {
    var IDs = \'\';
    var IDsp = \'\';
    var widgetID = \'\';
    var visible = \'\';
    var widget = \'\';
    for (var z = 1, y = 2; z <= y; z++ ) {
        if (savedOrders[z]) {
            IDs = savedOrders[z].split(\',\');
            for (var i = 0, n = IDs.length; i < n; i++ ) {
                IDsp = (IDs[i].split(\':\'));
                widgetID = IDsp[0];
                visible = IDsp[1];
                widget = $(".homecolumn").find(\'#\' + widgetID).appendTo($(\'#homecol\'+z));
                if (visible === \'false\') {
                    widget.find(".ui-icon").toggleClass( "ui-icon-minusthick" ).toggleClass( "ui-icon-plusthick" );
                    widget.find(".widget-content").hide();
                }
            }
        }
    }
}';
											$hooksdir = ROOTDIR . '/modules/widgets/';

											if (is_dir( $hooksdir )) {
												opendir( $hooksdir );
												$dh = ;
												readdir( $dh );

												if (false !== $hookfile = ) {
													if (( is_file( $hooksdir . $hookfile ) && $hookfile != 'index.php' )) {
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


while (true) {
	explode( '.', $hookfile );
	$extension = ;
	end( $extension );
	$extension = ;

	if ($extension == 'php') {
		include( $hooksdir . $hookfile );
		break;
	}
}

$templatevars['generateInvoices'] = ( array( array( 'onclick' =>  ) ) );
$templatevars['creditCardCapture'] = $aInt->modal( 'CreditCardCapture', $aInt->lang( 'invoices', 'attemptcccaptures' ), $aInt->lang( 'invoices', 'attemptcccapturessure' ), array( array( 'title' => $aInt->lang( 'global', 'yes' ), 'onclick' => 'window.location="index.php?attemptccpayments=true' . generate_token( 'link' ) . '"', 'class' => 'btn-primary' ), array( 'title' => $aInt->lang( 'global', 'no' ) ) ) );
run_hook( 'AdminHomepage', array(  ) );
$addons_html = ;
$templatevars['addons_html'] = $addons_html;

if (get_query_val( 'tbladmins', 'roleid', array( 'id' => (int)$_SESSION['adminid'] ) ) == 1) {
	unserialize( $whmcs->get_config( 'ToggleInfoPopup' ) );
	$infotoggle = ;

	if (!is_array( $infotoggle )) {
		$infotoggle = array(  );
		$showdialog = true;

		if (!empty( $infotoggle[$_SESSION['adminid']] )) {
			$infotoggle[$_SESSION['adminid']];
			$dismissdate = ;
			curlCall( 'https://cdn.whmcs.com/feeds/homepopup.php', array( 'lastupdate' => '1', 'licensekey' => $whmcs->get_license_key(  ), 'version' => $whmcs->getVersion(  )->getCanonical(  ) ), array( 'CURLOPT_TIMEOUT' => '5' ) );
			$lastupdate = ;

			if ($dismissdate < $lastupdate) {
				unset( $infotoggle[$_SESSION['adminid']] );
				$whmcs->set_config( 'ToggleInfoPopup', serialize( $infotoggle ) );
			}
		}
	}
}

$jscode .= ;
DI::make( 'license' );
$licensing = ;

if ($licensing->isClientLimitsEnabled(  )) {
	$templatevars['licenseinfo']->productname .= ' (' . $licensing->getTextClientLimit( $aInt ) . ')';

	if ($licensing->isNearClientLimit(  )) {
		$licensing->getClientLimit(  );
		$clientLimit = ;

		if ($licensing->getNumberOfActiveClients(  ) < $clientLimit) {
			$warningMsg = 'You currently have ' . $licensing->getNumberOfActiveClients(  ) . ' Active clients of a total ' . $licensing->getTextClientLimit( $aInt ) . ' Active clients permitted by your current license. <a href="systemlicense.php">Upgrade now as your business grows!</a>';
		}
	}
}

$warningMsg = 'You are at ' .  . ' Active clients which is the maximum permitted by your current license. <a href="systemlicense.php">Upgrade now as your business grows!</a>';
jmp;
$warningMsg = 'You are ' . ( $licensing->getNumberOfActiveClients(  ) - $clientLimit ) . ' Active clients over the ' . $licensing->getTextClientLimit( $aInt ) . ' maximum Active clients permitted by your current license. <a href="systemlicense.php">Upgrade now for your business needs!</a>';

if (!is_array( $addons_html )) {
	$addons_html = array(  );
	$templatevars['addons_html'] = array_merge( array( '<div style="background-color:#FFBFBF;padding:10px;margin:0 0 10px;text-align:center;color:#7F0000;">' . $warningMsg . '</div>' ), $addons_html );
}

$aInt->jscode = $jscode;
$aInt->jquerycode = $jquerycode;
$aInt->templatevars = $templatevars;
$aInt->display(  );
?>
