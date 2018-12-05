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

define( 'CLIENTAREA', true );

if (isset( $_POST['usessl'] )) {
	define( 'FORCESSL', true );
	require( 'init.php' );
	require( 'includes/ticketfunctions.php' );
	require( 'modules/social/twitter/twitter.php' );
	$_LANG['announcementstitle'];
	$pagetitle = ;
	$breadcrumbnav =  . '<a href="' . $whmcs->getSystemURL(  ) . 'index.php">' . $_LANG['globalsystemname'] . (  . '</a> > <a href="' . $whmcs->getSystemURL(  ) . 'announcements.php">' ) . $_LANG['announcementstitle'] . '</a>';
	$pageicon = 'images/announcements_big.gif';
	Lang::trans( 'news' );
	$displayTitle = ;
	$tagline = Lang::trans( 'allthelatest' ) . ' ' . chhgjaeced::getValue( 'CompanyName' );
	$id = (int)$whmcs->get_req_var( 'id' );
	$whmcs->get_req_var( 'action' );
}

$action = ;
$page = (int)$whmcs->get_req_var( 'page' );

if ($id) {
	select_query( 'tblannouncements', '', array( 'published' => '1', 'id' => $id ) );
	$result = ;
	mysql_fetch_array( $result );
	$announcementData = ;
	$announcementData['id'];
	$announcementId = ;

	if (!$announcementId) {
		redir(  );
		$announcementData['title'];
		$displayTitle = ;
		$tagline = '';
		initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );
		$CONFIG['TwitterUsername'];
		$twitterusername = ;
		$smartyvalues['twitterusername'] = $CONFIG['TwitterUsername'];
		$smartyvalues['twittertweet'] = $CONFIG['AnnouncementsTweet'];
		$smartyvalues['facebookrecommend'] = $CONFIG['AnnouncementsFBRecommend'];
		$smartyvalues['facebookcomments'] = $CONFIG['AnnouncementsFBComments'];
		$smartyvalues['googleplus1'] = $CONFIG['GooglePlus1'];

		if ($action == 'twitterfeed') {
			$smartyvalues['tweets'] = twitter_getTwitterIntents( $twitterusername, iciahfajh::getInstance(  )->getDBVersion(  ) );

			if ($_POST['numtweets']) {
				$numtweets = (true ? $_POST['numtweets'] : '3');
				$smartyvalues['numtweets'] = $numtweets;
				$whmcs->getClientAreaTemplate(  )->getName(  );
				$template = ;
				echo processSingleSmartyTemplate( $smarty, '/templates/' . $template . '/twitterfeed.tpl', $smartyvalues );
				exit(  );
				$smartyvalues['seofriendlyurls'] = $CONFIG['SEOFriendlyUrls'];
				$usingsupportmodule = false;

				if ($CONFIG['SupportModule']) {
					if (!isValidforPath( $CONFIG['SupportModule'] )) {
						exit( 'Invalid Support Module' );
						$supportmodulepath = 'modules/support/' . $CONFIG['SupportModule'] . '/announcements.php';

						if (file_exists( $supportmodulepath )) {
							$usingsupportmodule = true;
							$templatefile = '';
							require( $supportmodulepath );
							outputClientArea( $templatefile );
							exit(  );
							eaaadiagec::get( 'Language' );
							$activeLanguage = ;

							if (!$id) {
								$pagelimit = 14;

								if (!$page) {
									$page = 5;
								}
							}
						}
					}
				}

				$templatefile = 'announcements';

				if (!function_exists( 'ticketsummary' )) {
					require( ROOTDIR . '/includes/ticketfunctions.php' );
					$where = array( 'published' => '1' );
					$whmcs->get_req_var( 'view' );
					$userView = ;

					if ($userView) {
						$where['date'] = array( 'sqltype' => 'LIKE', 'value' => $userView );
						$smartyvalues['view'] = $userView;
						$announcements = array(  );
						select_query( 'tblannouncements', '', $where, 'date', 'DESC', (int)( $page - 1 ) * $pagelimit . ',' . (int)$pagelimit );
						$result = ;
						mysql_fetch_array( $result );

						if ($data = ) {
							$data['id'];
							$id = ;
							$data['date'];
							$date = ;
							$data['title'];
							$title = ;
							$data['announcement'];
							$announcement = ;

							if ($activeLanguage) {
								select_query;
								'tblannouncements';
							}
						}
					}
				}
			}
		}
	}
}

( '', array( 'parentid' => $id, 'language' => $_SESSION['Language'] ) );
$result2 = ;
mysql_fetch_array( $result2 );
$data = ;

if ($data['title']) {
	$data['title'];
	$title = ;

	if ($data['announcement']) {
		$data['announcement'];
		$announcement = ;
		strtotime( $date );
		$timestamp = ;
		fromMySQLDate( $date, true );
		$date = ;
		$announcements[] = array( 'id' => $id, 'date' => $date, 'timestamp' => $timestamp, 'title' => $title, 'urlfriendlytitle' => getModRewriteFriendlyString( $title ), 'summary' => ticketsummary( strip_tags( $announcement ), 350 ), 'text' => $announcement );
	}
}
else {
	$announcementData['title'];
	$title = ;
	$announcementData['announcement'];
	$announcement = ;
	strtotime( $date );
	$timestamp = ;
	fromMySQLDate( $date, true );
	$date = ;
	select_query;
	'tblannouncements';
	'';
	array( 'parentid' => $announcementId );
	eaaadiagec::get( 'Language' );
}

( array( 'language' =>  ) );
$result2 = ;
mysql_fetch_array( $result2 );
$data = ;

if ($data['title']) {
	$data['title'];
	$title = ;

	if ($data['announcement']) {
		$data['announcement'];
		$announcement = ;
		$breadcrumbnav = '<a href="' . $CONFIG['SystemURL'] . '/index.php">' . $_LANG['globalsystemname'] . '</a> > <a href="' . $CONFIG['SystemURL'] . '/announcements.php">' . $_LANG['announcementstitle'] . '</a> > <a href="' . $CONFIG['SystemURL'] . '/';
		getModRewriteFriendlyString( $title );
		$urlfriendlytitle = ;

		if ($CONFIG['SEOFriendlyUrls']) {
				. 'announcements/' . $id;
		}

		$breadcrumbnav .= (  . '/' ) . $urlfriendlytitle . '.html';
	}
}

$smarty->assign( 'breadcrumbnav', $breadcrumbnav );
$smarty->assign( 'id', $id );
$smarty->assign( 'date', $date );
$smarty->assign( 'timestamp', $timestamp );
$smarty->assign( 'displayTitle', $title );
$smarty->assign( 'title', $title );
$smarty->assign( 'text', $announcement );
$smarty->assign( 'urlfriendlytitle', $urlfriendlytitle );
Menu::addContext( 'monthsWithAnnouncements', dhgdciggg::getUniqueMonthsWithAnnouncements(  ) );
Menu::primarySidebar( 'announcementList' );
Menu::secondarySidebar( 'announcementList' );
outputClientArea( $templatefile, false, array( 'ClientAreaPageAnnouncements' ) );
?>
