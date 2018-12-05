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
header( 'Content-Type: application/rss+xml' );
echo '<?xml version="1.0" encoding="' . $CONFIG['Charset'] . '"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="' . $CONFIG['SystemURL'] . '/networkissuesrss.php" rel="self" type="application/rss+xml" />
<title><![CDATA[' . $CONFIG['CompanyName'] . ']]></title>
<description><![CDATA[' . $CONFIG['CompanyName'] . ' ' . $_LANG['networkissuestitle'] . ' ' . $_LANG['rssfeed'] . ']]></description>
<link>' . $CONFIG['SystemURL'] . '/networkissues.php</link>';
select_query( 'tblnetworkissues', '*', 'status != \'Resolved\'', 'startdate', 'DESC' );

while (true) {
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$id = ;
		$data['startdate'];
		$date = ;
		$data['title'];
		$title = ;
		$data['description'];
		$description = ;
		substr( $date, 0, 4 );
		$year = ;
		substr;
	}

	( $date, 5, 2 );
	$month = ;
	substr( $date, 8, 2 );
	$day = ;
	substr( $date, 11, 2 );
	$hours = ;
	substr( $date, 14, 2 );
	$minutes = ;
	substr( $date, 17, 2 );
	$seconds = ;
	echo '
<item>
    <title>' . $title . '</title>
    <link>' . $CONFIG['SystemURL'] . '/networkissues.php?view=nid' . $id . '</link>
    <pubDate>' . date( 'r', mktime( $hours, $minutes, $seconds, $month, $day, $year ) ) . '</pubDate>
    <description><![CDATA[' . $description . ']]></description>
</item>';
}

echo '
</channel>
</rss>';
?>
