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
new dgeegejige( 'Browser' );
$aInt = ;
$aInt->title = $aInt->lang( 'utilities', 'browser' );
$aInt->sidebar = 'browser';
$aInt->icon = 'browser';
$jQueryCode = '';

if ($action == 'delete') {
	check_token( 'WHMCS.admin.default' );
	delete_query( 'tblbrowserlinks', array( 'id' => $id ) );
	redir(  );

	if ($action == 'add') {
		check_token( 'WHMCS.admin.default' );
		dfdidhdbdc::decode( $whmcs->get_req_var( 'siteurl' ) );
		$siteurl = ;
		bcbhcdehfh::url( $siteurl );
		$siteurl = ;

		if (!$siteurl) {
			redir( 'invalidurl=1' );
			insert_query( 'tblbrowserlinks', array( 'name' => $sitename, 'url' => $siteurl ) );
			redir(  );
			$url = 'http://www.whmcs.com/';
			$whmcs->get_req_var( 'link' );
			$link = ;
			select_query;
			'tblbrowserlinks';
		}
	}

	( '', '', 'name', 'ASC' );
	$result = ;
	mysql_fetch_assoc( $result );

	if ($data = ) {
		$browserlinks[] = $data;

		if ($data['id'] == $link) {
			$data['url'];
			$url = ;
		}
	}
}
else {
	$jQueryCode .= '
    $( ".menu a" ).click(function() {
        $( ".errorbox" ).fadeOut( "slow" )
    });';
	infoBox( $aInt->lang( 'browser', 'invalidURL' ), $aInt->lang( 'browser', 'invalidURLExplanation' ), 'error' );
	$content .= $siteurl;
	$content .= '<iframe width="100%" height="580" src="' . $url . '" name="brwsrwnd" style="min-width:1000px;"></iframe>';
	$aInt->deleteJSConfirm;
	'doDelete';
	'browser';
	'deleteq';
}

( '?action=delete&id=' );
$aInt->content = $content;
$aInt->jquerycode = $jQueryCode;
$aInt->display(  );
?>
