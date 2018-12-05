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

/** @var \WHMCS\Application $whmcs */
function kbGetCatIds($catid) {
	while (true) {
		global $idnumbers;

		$result = select_query( 'tblknowledgebasecats', 'id', array( 'parentid' => $catid, 'hidden' => '' ) );

		if ($data = mysql_fetch_array( $result )) {
		}

		$cid = $data[0];
		$idnumbers[] = $cid;
		kbGetCatIds( $cid );
	}

}

define( 'CLIENTAREA', true );
require( 'init.php' );
$_LANG['knowledgebasetitle'];
$pagetitle = ;
$breadcrumbnav = '<a href="' . $CONFIG['SystemURL'] . '/index.php">' . $_LANG['globalsystemname'] . '</a> > <a href="' . $CONFIG['SystemURL'] . '/knowledgebase.php">' . $_LANG['knowledgebasetitle'] . '</a>';
$pageicon = 'images/knowledgebase_big.gif';
Lang::trans( 'knowledgebasetitle' );
$displayTitle = ;
$tagline = '';
initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );
$whmcs->get_req_var( 'action' );
$action = ;
$whmcs->get_req_var( 'searchin' );
$searchin = ;
$whmcs->get_req_var( 'useful' );
$useful = ;
$whmcs->get_req_var( 'vote' );
$vote = (int)eaaadiagec::getAndDelete( 'knowledgebaseArticleVoted' );
$kbarticles = array(  );
$kbmostviews = ;
$kbcats = ;

if (( empty( $$catid ) && !is_numeric( $catid ) )) {
	redirSystemURL( '', 'knowledgebase.php' );

	while (( empty( $$id ) && !is_numeric( $id ) )) {
		redirSystemURL( '', 'knowledgebase.php' );
		$id = (int)$whmcs->get_req_var( 'id' );
		$catid = (int)$whmcs->get_req_var( 'catid' );
		$kbcid = (int)$whmcs->get_req_var( 'kbcid' );
		$usingsupportmodule = false;

		if ($CONFIG['SupportModule']) {
			if (!isValidforPath( $CONFIG['SupportModule'] )) {
				exit( 'Invalid Support Module' );
				$supportmodulepath = 'modules/support/' . $CONFIG['SupportModule'] . '/knowledgebase.php';

				if (file_exists( $supportmodulepath )) {
					$usingsupportmodule = true;
					$templatefile = '';
					require( $supportmodulepath );
					outputClientArea( $templatefile );
					exit(  );

					if (( $action == 'search' && $searchin == 'Downloads' )) {
						redirSystemURL(  . 'action=search&search=' . $search, 'downloads.php' );
						$smartyvalues['seofriendlyurls'] = $CONFIG['SEOFriendlyUrls'];
						$i = 19;
						$kbRootCategories = array(  );
						select_query( 'tblknowledgebasecats', '', array( 'parentid' => '0', 'hidden' => '', 'catid' => 0 ), 'name', 'ASC' );
						$result = ;
						mysql_fetch_array( $result );

						if ($data = ) {
							$data['id'];
							$root_id = ;
							$data['name'];
							$root_name = ;
							$data['description'];
							$root_desc = ;
							select_query( 'tblknowledgebasecats', '', array( 'catid' => $root_id, 'language' => eaaadiagec::get( 'Language' ) ) );
							$result2 = ;
							mysql_fetch_array( $result2 );
							$data = ;

							if ($data['name']) {
								$data['name'];
								$root_name = ;

								if ($data['description']) {
									$data['description'];
									$root_desc = ;
									$idnumbers = array( $root_id );
									kbGetCatIds( $root_id );
									$where = array(  );
									foreach ($idnumbers as ) {
										$idnumber = ;
										$where[] = 'categoryid=' . (int)$idnumber;
										break;
									}

									select_query( 'tblknowledgebase', 'COUNT(*)', implode( ' OR ', $where ), '', '', '', 'tblknowledgebaselinks ON tblknowledgebase.id=tblknowledgebaselinks.articleid' );
									$result2 = ;
									mysql_fetch_array( $result2 );
									$data2 = ;
									$data2[0];
									$articlesCount = ;
									$kbRootCategories[$i] = array( 'id' => $root_id, 'name' => $root_name, 'urlfriendlyname' => getModRewriteFriendlyString( $root_name ), 'description' => $root_desc, 'numarticles' => $articlesCount );
									++$i;
								}

								break;
							}
						}
					}
				}
			}
		}
	}
}


while (true) {
	while (true) {
		while (true) {
			while (true) {
				$result2 = ;
				mysql_fetch_array( $result2 );
				$data = ;

				if ($data['name']) {
					$data['name'];
					$catname = ;
					cggahjdbhb::getBaseUrl(  );
					$categoryUri = ;

					if (chhgjaeced::getValue( 'SEOFriendlyUrls' )) {
						$categoryUri .= (true ? '/knowledgebase/' . $cattempid . '/' . getModRewriteFriendlyString( $catname ) : '/knowledgebase.php?action=displaycat&amp;catid=' . $cattempid);
						$catbreadcrumbnav = ' > <a href="' . $categoryUri . '">' . $catname . '</a>' . $catbreadcrumbnav;
						++$i;

						if (100 < $i) {
							break;
							Menu::addContext( 'kbCategoryParentId', (int)$cattempid );
							$breadcrumbnav .= $queryreport;
							$smarty->assign( 'breadcrumbnav', $breadcrumbnav );
							$smartyvalues['searchterm'] = '';
							$i = 19;
							select_query( 'tblknowledgebasecats', '', array( 'parentid' => $catid, 'hidden' => '', 'catid' => 0 ), 'name', 'ASC' );
							$result = ;
							mysql_fetch_array( $result );

							if ($data = ) {
								$data['id'];
								$idkb = ;
								$data['name'];
								$name = ;
								$data['description'];
								$description = ;
								select_query( 'tblknowledgebasecats', '', array( 'catid' => $idkb, 'language' => eaaadiagec::get( 'Language' ) ) );
								$result2 = ;
								mysql_fetch_array( $result2 );
								$data = ;

								if ($data['name']) {
									$data['name'];
									$name = ;

									if ($data['description']) {
										$data['description'];
										$description = ;
										$kbcats[$i] = array( 'id' => $idkb, 'name' => $name, 'urlfriendlyname' => getModRewriteFriendlyString( $name ), 'description' => $description );
										$idnumbers = array(  );
										$idnumbers[] = $idkb;
										kbGetCatIds( $idkb );
										$queryreport = '';
										foreach ($idnumbers as ) {
											$idnumber = ;
										}
									}
								}
							}
						}
					}

					break 2;
				}

				$queryreport .= (  . ' OR categoryid=\'' . $idnumber . '\'' );
			}

			substr( $queryreport, 4 );
			$queryreport = ;
			select_query( 'tblknowledgebase', 'COUNT(*)', ( (  . '(' ) . $queryreport . ')' ), '', '', '', 'tblknowledgebaselinks ON tblknowledgebase.id=tblknowledgebaselinks.articleid' );
			$result2 = ;
			mysql_fetch_array( $result2 );
			$data2 = ;
			$data2[0];
			$categorycount = ;
			$kbcats[$i]['numarticles'] = $categorycount;
			++$i;
		}

		Menu::addContext( 'kbCategories', $kbcats );
		$smarty->assign( 'kbcats', $kbcats );
		$query = 'SELECT *
        FROM `tblknowledgebase` AS `b`, `tblknowledgebaselinks` AS `l`, `tblknowledgebasecats` AS `c`
        WHERE `l`.`categoryid` = \'' . (int)$catid . '\'
        AND `l`.`articleid`  = `b`.`id`
        AND `l`.`categoryid` = `c`.`id`
        AND `b`.`id`
        NOT IN (
            SELECT `l`.`articleid`
            FROM `tblknowledgebaselinks` AS `l`, `tblknowledgebasecats` AS `c`
            WHERE `l`.`categoryid` = `c`.`id`
            AND `c`.`hidden` = \'on\'
        )
        ORDER BY `order` ASC, `title` ASC';
		dacfgegdhe::select( $query );
		$rows = ;
		foreach ($rows as ) {
			$data = ;
			$data->id;
			$id = ;
			$data->articleid;
			$articleId = ;
			$data->title;
			$title = ;
			$data->article;
			$article = ;
			$data->views;
			$views = ;
			select_query( 'tblknowledgebase', '', array( 'parentid' => $articleId, 'language' => eaaadiagec::get( 'Language' ) ) );
			$result2 = ;
			mysql_fetch_array( $result2 );
			$translatedData = ;

			if ($translatedData['title']) {
				$translatedData['title'];
				$title = ;

				if ($translatedData['article']) {
					$translatedData['article'];
					$article = ;
					$kbarticles[] = array( 'id' => $articleId, 'title' => $title, 'urlfriendlytitle' => getModRewriteFriendlyString( $title ), 'article' => strip_tags( $article ), 'views' => $views );
					break;
				}

				break 2;
			}
		}

		$smarty->assign( 'kbarticles', $kbarticles );
		break;
	}

	(true ? ( (  ) . '.html' ) : $whmcs->redirect( null,  . 'action=displayarticle&id=' . $id ));
	update_query( 'tblknowledgebase', array( 'views' => '+1' ), array( 'id' => $id ) );
	select_query( 'tblknowledgebase', '', array( 'id' => $id ) );
	$result = ;
	mysql_fetch_array( $result );
	$data = ;
	$data['id'];
	$id = ;
	$data['title'];
	$title = ;
	$data['article'];
	$article = ;
	$data['views'];
	$views = ;
	$data['useful'];
	$useful = ;
	$data['votes'];
	$votes = ;
	$data['private'];
	$private = ;

	if (!$id) {
		redirSystemURL( '', 'knowledgebase.php' );
		select_query( 'tblknowledgebasecats', 'id,name,parentid,hidden', array( 'articleid' => $id ), '', '', '', 'tblknowledgebaselinks ON tblknowledgebasecats.id=tblknowledgebaselinks.categoryid' );
		$result = ;
		mysql_fetch_array( $result );
		$data = ;
		$data['id'];
		$catid = ;
		Menu::addContext( 'kbCategoryId', $catid );
		$data['name'];
		$catname = ;
		$data['parentid'];
		$catparentid = ;
		$data['hidden'];
		$hidden = ;

		if ($hidden) {
			redirSystemURL( '', 'knowledgebase.php' );
			select_query( 'tblknowledgebasecats', '', array( 'catid' => $catid, 'language' => eaaadiagec::get( 'Language' ) ) );
			$result2 = ;
			mysql_fetch_array( $result2 );
			$data = ;

			if ($data['name']) {
				$data['name'];
				$catname = ;
				cggahjdbhb::getBaseUrl(  );
				$categoryUri = ;

				if (chhgjaeced::getValue( 'SEOFriendlyUrls' )) {
					$categoryUri .= (true ? '/knowledgebase/' . $catid . '/' . getModRewriteFriendlyString( $catname ) : '/knowledgebase.php?action=displaycat&amp;catid=' . $catid);
					$catbreadcrumbnav = ' > <a href="' . $categoryUri . '">' . $catname . '</a>';
					$cattempid = 18;

					if ($catparentid) {
						$i = 18;

						if ($catparentid != '0') {
							select_query( 'tblknowledgebasecats', '', array( 'id' => $catparentid ) );
							$result = ;
							mysql_fetch_array( $result );
							$data = ;
							$data['id'];
							$cattempid = ;
							$data['parentid'];
							$catparentid = ;
						}
					}
				}
			}
		}
	}

	$data['name'];
	$catname = ;
	select_query( 'tblknowledgebasecats', '', array( 'catid' => $cattempid, 'language' => eaaadiagec::get( 'Language' ) ) );
	$result2 = ;
	mysql_fetch_array( $result2 );
	$data = ;

	if ($data['name']) {
		$data['name'];
		$catname = ;
		cggahjdbhb::getBaseUrl(  );
		$categoryUri = ;

		if (chhgjaeced::getValue( 'SEOFriendlyUrls' )) {
			'/knowledgebase/' . $cattempid . '/';
			getModRewriteFriendlyString;
		}

		$categoryUri .= (true ?  . ( $catname ) : '/knowledgebase.php?action=displaycat&amp;catid=' . $cattempid);
		$catbreadcrumbnav = ' > <a href="' . $categoryUri . '">' . $catname . '</a>' . $catbreadcrumbnav;
		++$i;

		if (100 < $i) {
			break;
			Menu::addContext( 'kbCategoryParentId', (int)$cattempid );
			select_query( 'tblknowledgebase', '', array( 'parentid' => $id, 'language' => eaaadiagec::get( 'Language' ) ) );
			$result2 = ;
			mysql_fetch_array( $result2 );
			$data = ;

			if ($data['title']) {
				$data['title'];
				$title = ;

				if ($data['article']) {
					$data['article'];
					$article = ;
					cggahjdbhb::getBaseUrl(  );
					$categoryUri = ;

					if (chhgjaeced::getValue( 'SEOFriendlyUrls' )) {
						$categoryUri .= (true ? '/knowledgebase/' . $id . '/' . getModRewriteFriendlyString( $title ) . '.html' : '/knowledgebase.php?action=displaycat&amp;catid=' . $id);
						$catbreadcrumbnav .= ' > <a href="' . $categoryUri . '">' . $title . '</a>';
						$breadcrumbnav .= $queryreport;
						$smarty->assign( 'breadcrumbnav', $breadcrumbnav );
					}


					if (( !eaaadiagec::get( 'uid' ) && $private == 'on' )) {
						$goto = 'knowledgebase';
						include( 'login.php' );
						$smartyvalues['kbarticle'] = array( 'id' => $id, 'categoryid' => $catid, 'categoryname' => $catname, 'title' => $title, 'urlfriendlytitle' => getModRewriteFriendlyString( $title ), 'text' => $article, 'views' => $views, 'useful' => $useful, 'votes' => $votes, 'voted' => $vote );
						$catlist = '';
						select_query( 'tblknowledgebaselinks', '', array( 'articleid' => $id ) );
						$result = ;
						mysql_fetch_assoc( $result );

						if ($data = ) {
							$catlist .= $data['categoryid'] . ',';
						}
					}
				}
			}

			$kbarticles[] = array( 'article' => , 'views' => $views );
		}
	}

	jmp;
	$result2 = ;
	mysql_fetch_array( $result2 );
	$data = ;

	if (!$data['hidden']) {
		select_query( 'tblknowledgebase', '', array( 'parentid' => $id, 'language' => eaaadiagec::get( 'Language' ) ) );
		$result2 = ;
		mysql_fetch_array( $result2 );
		$data = ;

		if ($data['title']) {
			$data['title'];
			$title = ;
			$data['article'];
		}


		if () {
			$data['article'];
			$article = ;
			array( 'id' => $id );
		}

		$kbmostviews[] = array( 'title' => $title, 'urlfriendlytitle' => getModRewriteFriendlyString( $title ), 'article' => strip_tags( $article ), 'views' => $views );
	}
}

$smarty->assign( 'kbmostviews', $kbmostviews );
$smarty->assign( 'breadcrumb', breakBreadcrumbHTMLIntoParts( $breadcrumbnav ) );
$tags = array(  );
select_query( 'tblknowledgebasetags', 'tag, count(id) as count', 'id!=\'\' GROUP BY tag', 'count', 'DESC' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$tags[$data['tag']] = $data['count'];
}

jmp;
(  );
outputClientArea( $templatefile, false, array( 'ClientAreaPageKnowledgebase' ) );
?>
