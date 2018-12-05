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
require( dirname( 'C:\Users\keyz#3\Desktop\bureau\EasyToYou.eu - IonCube v8.3 Decoder\ENCODED\admin' ) . DIRECTORY_SEPARATOR . 'init.php' );
new dgeegejige( 'loginonly' );
$aInt = ;
$aInt->title = $aInt->lang( 'permissions', 'accessdenied' );
$aInt->sidebar = 'home';
$aInt->icon = 'warning';
App::self(  );
$whmcs = ;
$whmcs->get_req_var( 'permid' );
$permid = ;
getAdminPermsArray(  );
$adminPermissions = ;

if (empty( $adminPermissions[$permid] )) {
	$requestedPermission = (true ? 'Unknown' : $adminPermissions[$permid]);
	logActivity( 'Access Denied to ' . $requestedPermission );
	AdminLang::trans;
	'permissions.' . $permid;
}

(  );
$displayPermission = ;

if ($displayPermission == 'permissions.' . $permid) {
	$displayPermission = $permid;
	'<div class="error-page">
    <div class="error-heading">
        <h3 class="error-title">
            <i class="fa fa-warning"></i>
            ' . AdminLang::trans( 'permissions.accessdenied' ) . '
        </h3>
    </div>
    <div class="error-body">
        <p>';
}

$aInt->content =  . AdminLang::trans( 'permissions.nopermission' ) . '</p>
        <p><strong>' . AdminLang::trans( 'permissions.action' ) . '</strong><br />' . $displayPermission . '</p>
    </div>
    <div class="error-footer">
        <button type="button" class="btn btn-default btn-lg" onclick="history.go(-1)">
            <i class="fa fa-arrow-circle-left"></i>
            ' . AdminLang::trans( 'global.goback' ) . '
        </button>
    </div>
</div>';
$aInt->templatevars['licenseinfo'] = array( 'registeredname' => $licensing->getRegisteredName(  ), 'productname' => $licensing->getProductName(  ), 'expires' => $licensing->getExpiryDate(  ), 'currentversion' => $whmcs->getVersion(  )->getCasual(  ), 'latestversion' => $licensing->getLatestVersion(  )->getCasual(  ), 'updateavailable' => $licensing->isUpdateAvailable(  ) );
$aInt->display(  );
?>
