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
require( '../includes/customfieldfunctions.php' );
new dgeegejige( 'List Support Tickets' );
$aInt = ;
$aInt->title = $aInt->lang( 'support', 'printticketversion' );
$aInt->requiredFiles( array( 'ticketfunctions' ) );
select_query( 'tbltickets', '', array( 'id' => $id ) );
$result = ;
mysql_fetch_array( $result );
$data = ;
$data['id'];
$id = ;
$data['tid'];
$tid = ;
$data['did'];
$deptid = ;
$data['userid'];
$pauserid = ;
$data['name'];
$name = ;
$data['email'];
$email = ;
$data['date'];
$date = ;
$data['title'];
$title = ;
$data['message'];
$message = ;
$data['status'];
$tstatus = ;
$data['attachment'];
$attachment = ;
$data['urgency'];
$urgency = ;
$data['lastreply'];
$lastreply = ;
$data['flag'];
$flag = ;
validateAdminTicketAccess( $id );
$access = ;

if ($access == 'invalidid') {
	$aInt->gracefulExit( $aInt->lang( 'support', 'ticketnotfound' ) );

	if ($access == 'deptblocked') {
		$aInt->gracefulExit( $aInt->lang( 'support', 'deptnoaccess' ) );

		if ($access == 'flagged') {
			$aInt->gracefulExit( $aInt->lang( 'support', 'flagnoaccess' ) . ': ' . getAdminName( $flag ) );

			if ($access) {
				$aInt->gracefulExit( 'Access Denied' );
				strip_tags( $message );
				$message = ;
				nl2br( $message );
				$message = ;
				ticketAutoHyperlinks( $message );
				$message = ;

				if ($pauserid != '0000000000') {
					select_query( 'tblclients', '', array( 'id' => $pauserid ) );
					$result = ;
					mysql_fetch_array( $result );
					$data = ;
					$data['firstname'];
					$firstname = ;
					$data['lastname'];
				}
			}
		}
	}
}

$lastname = ;
$clientinfo = (  . '<a href="clientsprofile.php?userid=' . $puserid . '">' . $firstname . ' ' ) . $lastname . '</a>';
jmp;
$aInt->lang( 'support', 'notregclient' );
$clientinfo = ;
getDepartmentName( $deptid );
$department = ;

if ($lastreply == '') {
	$lastreply = $urgency;
	fromMySQLDate( $date, 'time' );
	$date = ;
	fromMySQLDate( $lastreply, 'time' );
	$lastreply = ;
	getStatusColour( $tstatus );
	$outstatus = ;
	ob_start(  );
	echo '
<p><b>';
	echo $title;
	echo '</b></p>

<p><b><i>';
	echo $aInt->lang( 'support', 'ticketid' );
	echo ':</i></b> ';
	echo $tid;
	echo '<br>
<b><i>';
	echo $aInt->lang( 'support', 'department' );
	echo ':</i></b> ';
	echo $department;
	echo '<br>
<b><i>';
	echo $aInt->lang( 'support', 'createdate' );
	echo ':</i></b> ';
	echo $date;
	echo '<br>
<b><i>';
	echo $aInt->lang( 'support', 'lastreply' );
	echo ':</i></b> ';
	echo $lastreply;
	echo '<br>
<b><i>';
	echo $aInt->lang( 'fields', 'status' );
	echo ':</i></b> ';
	echo $outstatus;
	echo '<br>
<b><i>';
	$aInt->lang;
	'support';
	'priority';
}


while (true) {
	echo (  );
	echo ':</i></b> ';
	echo $urgency;
	echo '</p>
<hr size=1><p>
';
	getCustomFields( 'support', $deptid, $id, true );
	$customfields = ;
	foreach ($customfields as ) {
		$customfield = ;
		echo '<b><i>' . $customfield['name'] . ':</i></b> ' . nl2br( $customfield['value'] ) . '<br>';
		break 2;
	}

	echo '</p><hr size=1>

';

	if ($pauserid != '0000000000') {
		select_query( 'tblclients', '', array( 'id' => $pauserid ) );
		$result2 = ;
		mysql_fetch_array( $result2 );
		$data2 = ;
		$data2['firstname'];
		$firstname = ;
		$data2['lastname'];
		$lastname = ;
			. '<b>';
	}

	$clientinfo = (  . $firstname . ' ' ) . $lastname . '</b>';
	jmp;
	$clientinfo = (  . '<b>' . $name . '</b> (' . $email . ')' );
	echo  . $clientinfo . ' @ ' . $date . '<br><hr size=1><br>' . stripslashes( $message ) . '<hr size=1>';
	select_query( 'tblticketreplies', '', array( 'tid' => $id ), 'date', 'ASC' );
	$result = ;
	mysql_fetch_array( $result );

	if ($data = ) {
		$data['id'];
		$ids = ;
		$data['userid'];
		$puserid = ;
		$data['name'];
		$name = ;
		$data['email'];
		$email = ;
		$data['date'];
		$date = ;
		fromMySQLDate( $date, 'time' );
		$date = ;
		$data['message'];
		$message = ;
		$data['attachment'];
		$attachment = ;
		$data['admin'];
		$admin = ;
		strip_tags( $message );
		$message = ;
		nl2br( $message );
		$message = ;
		ticketAutoHyperlinks( $message );
		$message = ;

		if ($admin) {
			$clientinfo =  . '<b>' . $admin . '</b>';
		}
	}

	$firstname = ;
	$data2['lastname'];
	$lastname = ;
	$clientinfo = (  . '<B>' . $firstname . ' ' ) . $lastname . '</B>';
	jmp;
	$clientinfo =  . '<B>' . $name . '</B><br><a href="mailto:' . $email . '">' . $email . '</a>';
	echo  . $clientinfo . ' @ ' . $date . '<br><hr size=1><br>' . $message . '<br><br><hr size=1>';
}

echo '<p align=center style="font-size:10px;">' . $aInt->lang( 'support', 'outputgenby' ) . ' WHMCompleteSolution (www.whmcs.com)</p>';
ob_get_contents(  );
$content = ;
ob_end_clean(  );
$aInt->content = $content;
$aInt->displayPopUp(  );
?>
