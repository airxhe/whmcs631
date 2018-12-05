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
new dgeegejige( 'Addon Modules', false );
$aInt = ;
$aInt->title = $aInt->lang( 'utilities', 'addonmodules' );
$aInt->sidebar = 'addonmodules';
$aInt->icon = 'addonmodules';
$whmcs->get_req_var( 'action' );
$action = ;

if ($action == 'getcats') {
	check_token( 'WHMCS.admin.default' );
	curlCall( 'http://www.whmcs.com/members/communityaddonsfeed.php', 'action=getcats' );
	$data = ;
	echo $data;
	exit(  );

	if ($action == 'getaddons') {
		check_token( 'WHMCS.admin.default' );
		$CONFIG['ActiveAddonModules'];
		$activeaddonmodules = ;
		$data = array( 'active' => explode( ',', $activeaddonmodules ) );

		if (is_dir( ROOTDIR . '/modules/addons/' )) {
			opendir( ROOTDIR . '/modules/addons/' );
			$dh = ;
			readdir( $dh );

			if (false !== $file = ) {
				$modfilename = ROOTDIR . ( (  . '/modules/addons/' . $file . '/' ) . $file . '.php' );

				if (is_file( $modfilename )) {
					$data['installed'][] = $file;
				}
			}
		}
	}
}
else {
	mysql_fetch_array( $result );

	if ($data = ) {
		$modulevars[$data['setting']] = $data['value'];
	}
}


if (( $module . '_sidebar' )) {
	call_user_func( $module . '_sidebar', $modulevars );
	$sidebar = ;
	$aInt->assign( 'addon_module_sidebar', $sidebar );

	if (function_exists( $module . '_output' )) {
		call_user_func( $module . '_output', $modulevars );
	}

	echo  . '</p>
<p align="center">' . $aInt->lang( 'addonmodules', 'howtogrant' ) . '</p>';
}


if (( $adminroleid, $allowedroles )) {
	if (!isValidforPath( $module )) {
		exit( 'Invalid Addon Module Name' );
		$modulepath = ROOTDIR . ( (  . '/modules/admin/' . $module . '/' ) . $module . '.php' );

		if (file_exists( $modulepath )) {
			require( $modulepath );
		}
	}

	echo '<br /><br />
<p align="center"><b>' . ( 'permissions', 'accessdenied' ) . '</b></p>
<p align="center">' . $aInt->lang( 'addonmodules', 'noaccess' ) . '</p>
<p align="center">' . $aInt->lang( 'addonmodules', 'howtogrant' ) . '</p>';
}

ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->jquerycode = $jquerycode;
$aInt->jscode = $jscode;
$aInt->display(  );
?>
