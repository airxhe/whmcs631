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

function {closure}($query) {
	$downloadID;
	$downloadID = ;
	new bjeghhacfc(  );
	$download = ;
	$query->where( $download->getTable(  ) . '.id', $downloadID );
}

function {closure}($query) {
	$serviceID;
	$serviceID = ;
	new bdjfafbgha(  );
	$service = ;
	$query->where( $service->getTable(  ) . '.id', $serviceID );
}

function {closure}($query) {
	$downloadID;
	$downloadID = ;
	new bjeghhacfc(  );
	$download = ;
	$query->where( $download->getTable(  ) . '.id', $downloadID );
}

function downloadLogin() {
	global $smartyvalues;
	global $_LANG;

	App::self(  );
	$whmcs = ;
	$_LANG['downloadstitle'];
	$pageTitle = ;
	$breadCrumb = '<a href="' . $whmcs->getSystemURL(  ) . '">' . $whmcs->get_lang( 'globalsystemname' ) . '</a>' . ' > ' . '<a href="' . $whmcs->getSystemURL(  ) . 'downloads.php">' . $whmcs->get_lang( 'downloadstitle' ) . '</a>';
	initialiseClientArea( $pageTitle, '', '', '', $breadCrumb );
	require( 'login.php' );
}

define( 'CLIENTAREA', true );
require( 'init.php' );
$whmcs->get_req_var( 'type' );
$type = ;
$whmcs->get_req_var( 'viewpdf' );
$viewpdf = ;
$i = (int)$whmcs->get_req_var( 'i' );
$id = (int)$whmcs->get_req_var( 'id' );
$allowedtodownload = '';
$fileurl = ;
$display_name = '';
$file_name = ;
$folder_path = ;
$allowedtodownload = '';

if ($type == 'i') {
	select_query( 'tblinvoices', '', array( 'id' => $id ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$invoiceid = ;
	$data['invoicenum'];
	$invoicenum = ;
	$data['userid'];
	$userid = ;
	$data['status'];
	$status = ;

	if (!$invoiceid) {
		redir( '', 'clientarea.php' );
		require( 'includes/adminfunctions.php' );

		if ($_SESSION['adminid']) {
			if (!checkPermission( 'Manage Invoice', true )) {
				exit( 'You do not have the necessary permissions to download PDF invoices. If you feel this message to be an error, please contact the system administrator.' );
			}
		}
	}

	$breadcrumbnav =  .  . '</a> > <a href="' . $CONFIG['SystemURL'] . '/downloads.php">' . $_LANG['downloadstitle'] . '</a>';
	$pageicon = '';
	Lang::trans( 'supportAndUpdatesExpired' );
	$displayTitle = ;
	$tagline = '';
	initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );
	$smartyvalues['reason'] = 'supportandupdates';
	$smartyvalues['serviceid'] = $productServiceID;
	$smartyvalues['licensekey'] = get_query_val( 'tblhosting', 'domain', array( 'id' => $productServiceID ) );
	$smartyvalues['addonid'] = $requiredAddonID;
	Menu::addContext;
	'topFiveDownloads';
	bjeghhacfc::topDownloads(  )->get;
}

( (  ) );
Menu::primarySidebar( 'downloadList' );
Menu::secondarySidebar( 'downloadList' );
outputClientArea( 'downloaddenied' );
exit(  );
?>
