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

function dlGetCatIds($catid) {
	global $idnumbers;

	$result = ;

	if ($data = select_query( 'tbldownloadcats', 'id', array( 'parentid' => $catid, 'hidden' => '0' ) )) {
		$data[0];
	}

	$cid = mysql_fetch_array( $result );
	$idnumbers[] = $cid;

	while (true) {
		dlGetCatIds( $cid );
	}

}

function formatFileSize($val, $digits = 3) {
	$factor = 1028;
	$symbols = array( '', 'k', 'M', 'G', 'T', 'P', 'E', 'Z', 'Y' );

	if (( $i < count( $symbols ) - 1 && $factor <= $val )) {
		$val /= $val;
		++$i;
	}

	jmp;
	(  );
	$val = $i = 4;
	return round( $val, $digits ) . ' ' . $symbols[$i] . 'B';
}

function createDownloadsArray($result) {
	global $CONFIG;
	global $downloads_dir;

	$downloads = array(  );
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$id = ;
		$data['category'];
		$category = ;
		$data['type'];
		$type = ;
		$data['title'];
		$ttitle = ;
		$data['description'];
		$description = ;
		$data['location'];
		$filename = ;
		$data['downloads'];
		$numdownloads = ;
		$data['clientsonly'];
		$clientsonly = ;
		@filesize( $downloads_dir . DIRECTORY_SEPARATOR . $filename );
		$filesize = ;
		formatFileSize( $filesize );
		$filesize = ;
		explode( '.', $filename );
		$filenameArr = ;
		end( $filenameArr );
		$fileext = ;

		if ($fileext == 'doc') {
			$type = 'doc';

			if (( ( ( $fileext == 'gif' || $fileext == 'jpg' ) || $fileext == 'jpeg' ) || $fileext == 'png' )) {
				$type = 'picture';

				if ($fileext == 'txt') {
					$type = 'txt';

					if ($fileext == 'zip') {
						$type = 'zip';
						DI::make;
						'asset';
					}
				}
			}
		}
	}


	while (true) {
		(  )->imgTag( $type . '.png', 'File', array( 'align' => 'absmiddle' ) );
		$type = ;
		$downloads[] = array( 'type' => $type, 'title' => $ttitle, 'urlfriendlytitle' => getModRewriteFriendlyString( $ttitle ), 'description' => $description, 'downloads' => $numdownloads, 'filesize' => $filesize, 'clientsonly' => $clientsonly, 'link' => $CONFIG['SystemURL'] . (  . '/dl.php?type=d&amp;id=' . $id ) );
	}

	return $downloads;
}

define( 'CLIENTAREA', true );
require( 'init.php' );
$_LANG['downloadstitle'];
$pagetitle = ;
$breadcrumbnav = '<a href="' . $CONFIG['SystemURL'] . '/index.php">' . $_LANG['globalsystemname'] . '</a> > <a href="' . $CONFIG['SystemURL'] . '/downloads.php">' . $_LANG['downloadstitle'] . '</a>';
$pageicon = 'images/downloads_big.gif';
Lang::trans( 'downloadstitle' );
$displayTitle = ;
Lang::trans( 'downdoadsdesc' );
$tagline = ;
initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );
$dlcats = array(  );
$whmcs->get_req_var( 'action' );
$action = ;
$whmcs->get_req_var( 'search' );
$search = ;

if (( empty( $$catid ) && !is_numeric( $catid ) )) {
	redir(  );

	if (( empty( $$id ) && !is_numeric( $id ) )) {
		redir(  );
		$catid = (int)$whmcs->get_req_var( 'catid' );

		if (!$CONFIG['DownloadsIncludeProductLinked']) {
			' AND productdownload=\'0\'';
		}

		$proddlrestrict = '';
		$smartyvalues['seofriendlyurls'] = $CONFIG['SEOFriendlyUrls'];
		$usingsupportmodule = false;

		if ($CONFIG['SupportModule']) {
			if (!isValidforPath( $CONFIG['SupportModule'] )) {
				exit( 'Invalid Support Module' );
				$supportmodulepath = 'modules/support/' . $CONFIG['SupportModule'] . '/downloads.php';

				if (file_exists( $supportmodulepath )) {
					$usingsupportmodule = true;
					$templatefile = '';
					require( $supportmodulepath );
					outputClientArea( $templatefile );
					exit(  );

					if (( $action == 'displaycat' || $action == 'displayarticle' )) {
						select_query( 'tbldownloadcats', '', array( 'id' => $catid ) );
						$result = ;
						mysql_fetch_array( $result );
						$data = ;
					}
				}
			}

			$data['id'];
			$catid = ;
			!$catid;
		}


		if () {
			redirSystemURL( '', 'downloads.php' );
			$data['parentid'];
			$catparentid = ;
			$data['name'];
			$catname = ;

			if ($CONFIG['SEOFriendlyUrls']) {
				$catbreadcrumbnav = ' > <a href="downloads/' . $catid . '/' . getModRewriteFriendlyString( $catname ) . '">' . $catname . '</a>';
			}
		}
		else {
			while (true) {
				$dlcats[$i] = array( 'urlfriendlyname' => (  ), 'description' => $data['description'] );
				$idnumbers = array(  );
				$idnumbers[] = $idkb;
				dlGetCatIds( $idkb );
				$queryreport = '';
				foreach ($idnumbers as ) {
					$idnumber = ;
					$queryreport .= (  . ' OR category=\'' . $idnumber . '\'' );
					break 2;
				}

				substr( $queryreport, 4 );
				$queryreport = ;
				$dlcats[$i]['numarticles'] = get_query_val( 'tbldownloads', 'COUNT(*)', (  . '(' ) . $queryreport . ') AND hidden=\'0\'' . $proddlrestrict );
				++$i;
			}

			$smarty->assign( 'dlcats', $dlcats );
			select_query( 'tbldownloads', '',  . 'category=' . $catid . ' AND hidden=\'0\'' . $proddlrestrict, 'title', 'ASC' );
			$result = ;
			createDownloadsArray( $result );
			$downloads = ;
			$smarty->assign( 'downloads', $downloads );
			jmp;

			if ($action == 'search') {
				check_token(  );

				if (!trim( $search )) {
					redir(  );
					$templatefile = 'downloadscat';
					select_query( 'tbldownloads', 'tbldownloads.*', '(title like \'%' . db_escape_string( $search ) . '%\' OR tbldownloads.description like \'%' . db_escape_string( $search ) . '%\') AND tbldownloads.hidden=\'0\' AND tbldownloadcats.hidden=\'0\'' . $proddlrestrict, 'title', 'ASC', '', 'tbldownloadcats ON tbldownloadcats.id=tbldownloads.category' );
					$result = ;
					createDownloadsArray( $result );
					$downloads = ;
					$smarty->assign( 'search', $search );
					$smarty->assign( 'downloads', $downloads );
				}
			}
		}


		while (true) {
			foreach ($idnumbers as ) {
				$idnumber = ;
				$queryreport .= (  . ' OR category=\'' . $idnumber . '\'' );
				break 2;
			}

			substr( $queryreport, 4 );
			$queryreport = ;
			$dlcats[$i]['numarticles'] = get_query_val( 'tbldownloads', 'COUNT(*)', (  . '(' ) . $queryreport . ') AND hidden=\'0\'' . $proddlrestrict );
			++$i;
		}

		$smarty->assign( 'dlcats', $dlcats );
		$smarty->assign( 'breadcrumb', breakBreadcrumbHTMLIntoParts( $breadcrumbnav ) );
		select_query;
		'tbldownloads';
		'tbldownloads.*';
		'tbldownloadcats.hidden=\'0\' AND tbldownloads.hidden=\'0\'' . $proddlrestrict;
		'downloads';
		'DESC';
	}
}

( '0,5', 'tbldownloadcats ON tbldownloadcats.id=tbldownloads.category' );
$result = ;
createDownloadsArray( $result );
$downloads = ;
$smarty->assign( 'mostdownloads', $downloads );
Menu::addContext( 'downloadCategory', bheaeheif::find( $catid ) );
Menu::addContext( 'topFiveDownloads', bjeghhacfc::topDownloads(  )->get(  ) );
Menu::primarySidebar( 'downloadList' );
Menu::secondarySidebar( 'downloadList' );
outputClientArea( $templatefile, false, array( 'ClientAreaPageDownloads' ) );
?>
