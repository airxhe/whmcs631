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
require( 'includes/ticketfunctions.php' );
$_LANG['supportticketspagetitle'];
$pagetitle = ;
$breadcrumbnav = '<a href="index.php">' . $_LANG['globalsystemname'] . '</a> > <a href="clientarea.php">' . $_LANG['clientareatitle'] . '</a> > <a href="supporttickets.php">' . $_LANG['supportticketspagetitle'] . '</a>';
$templatefile = 'supportticketslist';
$pageicon = 'images/supporttickets_big.gif';
Lang::trans( 'clientareanavsupporttickets' );
$displayTitle = ;
Lang::trans( 'ticketsyourhistory' );
$tagline = ;
initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );

if (isset( $_SESSION['uid'] )) {
	checkContactPermission( 'tickets' );
	$usingsupportmodule = false;

	if ($CONFIG['SupportModule']) {
		if (!isValidforPath( $CONFIG['SupportModule'] )) {
			exit( 'Invalid Support Module' );
			$supportmodulepath = 'modules/support/' . $CONFIG['SupportModule'] . '/supporttickets.php';

			if (file_exists( $supportmodulepath )) {
				$usingsupportmodule = true;
				$templatefile = '';
				require( $supportmodulepath );
				outputClientArea( $templatefile );
				exit(  );
				select_query( 'tbltickets', 'COUNT(id)', array( 'userid' => (int)eaaadiagec::get( 'uid' ), 'status' => array( 'sqltype' => 'NEQ', 'value' => 'Closed' ), 'merged_ticket_id' => '0' ) );
				$result = ;
				mysql_fetch_array( $result );
				$data = ;
				$smartyvalues['numopentickets'] = $data[0];
				$ticketStatuses = array(  );
				select_query( 'tblticketstatuses', 'title', '', 'sortorder', 'ASC' );
				$result = ;
				mysql_fetch_array( $result );

				if ($data = ) {
					$ticketStatuses[$data[0]] = 0;
				}

				jmp;
				$smartyvalues['sort'] = ( $sort );

				if ($orderby == 'date') {
					$orderby = 'tbltickets.date';
				}
			}
		}
	}
}

( $orderby, $sort, $limit, ' tblticketdepartments ON tblticketdepartments.id=tbltickets.did' );
$result = ;
mysql_fetch_array( $result );

if ($data = ) {
	$data['id'];
	$id = ;
	$data['tid'];
	$tid = ;
	$data['c'];
	$c = ;
	$data['did'];
	$deptid = ;
	$data['date'];
	$date = ;
}

$normalisedDate = $clientunread;
fromMySQLDate( $date, 1, 1 );
$date = ;
$data['title'];
$subject = ;
$data['status'];
$status = ;
++$ticketStatuses[$status];
$data['urgency'];
$urgency = ;
$data['lastreply'];
$lastreply = ;
$normalisedLastReply = $normalisedDate;
fromMySQLDate( $lastreply, 1, 1 );
$lastreply = ;
$data['clientunread'];
$clientunread = ;
getStatusColour( $status );
$htmlFormattedStatus = ;
getDepartmentName( $deptid );
$dept = ;
$_LANG['supportticketsticketurgency' . strtolower( $urgency )];
$urgency = ;
$statusColor = null;

if (!in_array( $status, array( 'Open', 'Answered', 'Customer-Reply', 'Closed' ) )) {
	getStatusColour( $status, false );
	$statusColor = ;
	$tickets[] = array( 'id' => $id, 'tid' => $tid, 'c' => $c, 'date' => $date, 'normalisedDate' => $normalisedDate, 'department' => $dept, 'subject' => $subject, 'status' => $htmlFormattedStatus, 'statusClass' => cgjfihaefi::generateCssFriendlyClassName( $status ), 'statusColor' => $statusColor, 'urgency' => $urgency, 'lastreply' => $lastreply, 'normalisedLastReply' => $normalisedLastReply, 'unread' => $clientunread );
}

jmp;
( (  ) );
$smartyvalues = ;
jmp;
$goto = 'supporttickets';
include( 'login.php' );
Menu::addContext( 'ticketStatusCounts', $ticketStatuses );
Menu::primarySidebar( 'ticketList' );
Menu::secondarySidebar( 'ticketList' );
outputClientArea( $templatefile, false, array( 'ClientAreaPageSupportTickets' ) );
?>
