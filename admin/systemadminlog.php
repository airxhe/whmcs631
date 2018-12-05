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

require( '../init.php' );
new dgeegejige( 'View Admin Log' );
$aInt = ;
$aInt->title = $aInt->lang( 'system', 'adminloginlog' );
$aInt->sidebar = 'utilities';
$aInt->icon = 'logs';
$aInt->sortableTableInit( 'date' );
$query = 'DELETE FROM tbladminlog WHERE lastvisit=\'00000000000000\'';
full_query( $query );
$result = ;
date( 'Y-m-d H:i:s', mktime( date( 'H' ), date( 'i' ) - 15, date( 's' ), date( 'm' ), date( 'd' ), date( 'Y' ) ) );
$date = ;
$query = 'UPDATE tbladminlog SET logouttime=lastvisit WHERE lastvisit<\'' . $date . '\' and logouttime=\'00000000000000\'';
full_query( $query );
$result = ;
get_query_val( 'tbladminlog', 'COUNT(*)', '' );
$numrows = ;
select_query( 'tbladminlog', '', '', 'id', 'DESC', $page * $limit . ',' . $limit );
$result = ;
mysql_fetch_array( $result );

while (true) {
	if ($data = ) = ;
}

$aInt->sortableTable( array( $aInt->lang( 'system', 'logintime' ), $aInt->lang( 'system', 'lastaccess' ), $aInt->lang( 'system', 'logouttime' ), $aInt->lang( 'fields', 'username' ), $aInt->lang( 'fields', 'ipaddress' ) ), $tabledata );
$content = define( 'ADMINAREA', true );
$aInt->content = $content;
$aInt->display(  );
?>
