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
require( 'init.php' );

if (( isset( $_REQUEST['language'] ) && in_array( $_REQUEST['language'], ciccciihjd::getLanguages(  ) ) )) {
	$language = (true ? $_REQUEST['language'] : '');
	header( 'Content-Type: application/rss+xml' );
	echo '<?xml version="1.0" encoding="' . $CONFIG['Charset'] . '"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="' . $CONFIG['SystemURL'] . '/announcementsrss.php" rel="self" type="application/rss+xml" />
<title><![CDATA[' . $CONFIG['CompanyName'] . ']]></title>
<description><![CDATA[' . $CONFIG['CompanyName'] . ' ' . $_LANG['announcementstitle'] . ' ' . $_LANG['rssfeed'] . ']]></description>
<link>' . $CONFIG['SystemURL'] . '/announcements.php</link>';
	select_query( 'tblannouncements', '*', array( 'published' => '1' ), 'date', 'DESC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$id = ;
		$data['date'];
	}

	$date = ;
	$data['title'];
	$title = ;
	$data['announcement'];
	$announcement = ;
	select_query( 'tblannouncements', '', array( 'parentid' => $id, 'language' => $language ) );
	$result2 = ;
	mysql_fetch_array( $result2 );
	$data = ;

	if ($data['title']) {
		$data['title'];
		$title = ;

		if ($data['announcement']) {
			$data['announcement'];
			$announcement = ;
			substr( $date, 0, 4 );
			$year = ;
			substr( $date, 5, 2 );
			$month = ;
			substr;
			$date;
			8;
		}
	}

	( 2 );
	$day = ;
	substr( $date, 11, 2 );
	$hours = ;
	substr( $date, 14, 2 );
	$minutes = ;
	substr( $date, 17, 2 );
	$seconds = ;
	'
<item>
    <title><![CDATA[' . $title . ']]></title>
    <link>';
}


while (true) {
	echo  . $CONFIG['SystemURL'] . '/announcements.php?id=' . $id . '</link>
    <guid>' . $CONFIG['SystemURL'] . '/announcements.php?id=' . $id . '</guid>
    <pubDate>' . date( 'r', mktime( $hours, $minutes, $seconds, $month, $day, $year ) ) . '</pubDate>
    <description><![CDATA[' . $announcement . ']]></description>
</item>';
}

echo '
</channel>
</rss>';
?>
