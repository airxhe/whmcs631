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
require( 'includes/clientfunctions.php' );
require( 'includes/customfieldfunctions.php' );
$whmcs->get_req_var( 'tid' );
$tid = ;
$whmcs->get_req_var( 'c' );
$c = ;
$whmcs->get_req_var( 'closeticket' );
$closeticket = ;
$whmcs->get_req_var( 'postreply' );
$postreply = ;
$whmcs->get_req_var( 'replyname' );
$replyname = ;
$whmcs->get_req_var( 'replyemail' );
$replyemail = ;
$whmcs->get_req_var( 'replymessage' );
$replymessage = ;
eaaadiagec::get( 'uid' );
$loggedInUserId = ;
eaaadiagec::get( 'cid' );
$loggedInContactId = ;
preg_replace( '/[^A-Za-z0-9]/', '', $c );
$c = ;
$clientemail = '';
$clientname = ;
$_LANG['supportticketsviewticket'];
$pagetitle = ;
$breadcrumbnav = '<a href="index.php">' . $_LANG['globalsystemname'] . '</a> > <a href="clientarea.php">' . $_LANG['clientareatitle'] . '</a> > <a href="supporttickets.php">' . $_LANG['supportticketspagetitle'] . (  . '</a> > <a href="viewticket.php?tid=' . $tid . '&amp;c=' . $c . '">' ) . $_LANG['supportticketsviewticket'] . '</a>';
$pageicon = 'images/supporttickets_big.gif';
$templatefile = 'viewticket';
Lang::trans( 'supportticketsviewticket' );
$displayTitle = ;
$tagline = '';
initialiseClientArea( $pagetitle, $displayTitle, $tagline, $pageicon, $breadcrumbnav );
checkContactPermission( 'tickets' );
$usingsupportmodule = false;

if ($CONFIG['SupportModule']) {
	if (!isValidforPath( $CONFIG['SupportModule'] )) {
		exit( 'Invalid Support Module' );
		$supportmodulepath = 'modules/support/' . $CONFIG['SupportModule'] . '/viewticket.php';

		if (file_exists( $supportmodulepath )) {
			$usingsupportmodule = true;
			$templatefile = '';
			require( $supportmodulepath );
			outputClientArea( $templatefile );
			exit(  );
			select_query( 'tbltickets', '', array( 'tid' => $tid, 'c' => $c ) );
			$result = ;
			mysql_fetch_array( $result );
			$data = ;
			$data['id'];
			$ticketId = ;
			$data['tid'];
			$tid = ;
			$data['c'];
			$c = ;
			$data['userid'];
			$userid = ;

			if ($data['merged_ticket_id']) {
				bfiifiigdh::table( 'tbltickets' )->find( $data['merged_ticket_id'], array( 'tid', 'c' ) );
				$ticket = ;
				redir;
					. 'tid=';
			}

			(  . $ticket->tid . '&c=' . $ticket->c );

			if (!$ticketId) {
				$smarty->assign( 'error', true );
				$smarty->assign( 'invalidTicketId', true );
			}

			( ( ',', $AccessedTicketIDsArray ) );

			if (( $whmcs->get_req_var( 'feedback' ) && $whmcs->get_config( 'TicketFeedback' ) )) {
				Menu::primarySidebar( 'ticketFeedback' );
				Menu::secondarySidebar( 'ticketFeedback' );
				$templatefile = 'ticketfeedback';
				$smartyvalues['displayTitle'] = Lang::trans( 'ticketfeedbackrequest' );
				$smartyvalues['tagline'] = Lang::trans( 'ticketfeedbackforticket' ) . $tid;
				$smartyvalues['id'] = $ticketId;
				$smartyvalues['tid'] = $tid;
				$smartyvalues['c'] = $c;
				$data['status'];
				$status = ;
				get_query_val( 'tblticketstatuses', 'id', array( 'title' => $status, 'showactive' => '0' ) );
				$closedcheck = ;

				if (!$closedcheck) {
					$smartyvalues['stillopen'] = (true ? true : false);
					get_query_val( 'tblticketfeedback', 'id', array( 'ticketid' => $ticketId ) );
					$feedbackcheck = ;
					$smartyvalues['feedbackdone'] = $feedbackcheck;
					$data['date'];
					$date = ;
					$smartyvalues['opened'] = date( 'l, jS F Y H:ia', strtotime( $date ) );
					get_query_val( 'tblticketreplies', 'date', array( 'tid' => $ticketId ), 'id', 'DESC' );
					$lastreply = ;

					if (!$lastreply) {
						$lastreply = $comments;
						$smartyvalues['lastreply'] = date( 'l, jS F Y H:ia', strtotime( $lastreply ) );
						getTicketDuration( $date, $lastreply );
						$duration = ;
						$smartyvalues['duration'] = $duration;
						$ratings = array(  );
						$i = 13;

						if ($i <= 10) {
							$ratings[] = $i;
							++$i;
						}
					}
				}
				else {
					( '_', $rating );
					$rating = ;

					if (( isset( $rating[0] ) && 4 < strlen( $rating[0] ) )) {
						$replyid = (true ? substr( $rating[0], 4 ) : '');

						if (isset( $rating[1] )) {
							$ratingscore = (true ? $rating[1] : '');

							if (( is_numeric( $replyid ) && is_numeric( $ratingscore ) )) {
								update_query( 'tblticketreplies', array( 'rating' => $ratingscore ), array( 'id' => $replyid, 'tid' => $ticketId ) );
								redir(  . 'tid=' . $tid . '&c=' . $c );
								$errormessage = '';

								if ($postreply) {
									check_token(  );
									$smarty->assign( 'postingReply', true );

									if (!$loggedInUserId) {
										if (!$replyname) {
											$_LANG['supportticketserrornoname'];
										}
									}
								}
							}

							$errormessage .= '<li>' . ;

							if (!$replyemail) {
								$errormessage .= '<li>' . $_LANG['supportticketserrornoemail'];
							}
						}
					}
				}
			}

			if (!$errormessage) = ;
			$allattachments = array(  );
			select_query( 'tblticketreplies', '', array( 'tid' => $ticketId ), 'date', 'ASC' );
			$result = ;
			mysql_fetch_array( $result );

			if ($data = ) {
				$data['id'];
				$replyId = ;
				$data['userid'];
				$userid = ;
				$data['contactid'];
				$contactid = ;
				$data['admin'];
				$admin = ;
				$data['name'];
				$name = ;
				$data['email'];
				$email = ;
				$data['date'];
				$date = ;
				$data['message'];
				$message = ;
				$data['attachment'];
				$attachment = ;
				$data['rating'];
				$rating = ;
				fromMySQLDate( $date, 1, 1 );
				$date = ;
				$markup->determineMarkupEditor( 'ticket_reply', $data['editor'] );
				$markupFormat = ;
				$markup->transform( $message, $markupFormat );
				$message = ;

				if ($admin) {
					$user = '<strong>' . $admin . '</strong><br />' . $_LANG['supportticketsstaff'];
				}
			}

			$contactdata['email'];
			$clientemail = ;
			$user = '<strong>' . $clientname . '</strong><br />' . $_LANG['supportticketscontact'];
			jmp;
			$clientname = $closedTicketStatuses;
			$clientemail = $showclosebutton;
			$user = '<strong>' . $clientname . '</strong><br />' . $clientemail;
			$attachments = array(  );

			if ($attachment) {
				explode( '|', $attachment );
				$attachment = ;
				$attachmentCount = 12;
				foreach ($attachment as ) {
					$filename = ;
					substr( $filename, 7 );
					$filename = ;
					$attachments[] = $filename;
					array( 'replyid' => $replyId );
				}
			}


			while (true) {
				$allattachments[] = array( 'i' => $attachmentCount, 'filename' => $filename );
				++$attachmentCount;
			}


			if ($admin) {
				(true ? $admin : $clientname);
			}

			array( 'id' => $replyId, 'userid' => $userid, 'contactid' => $contactid, 'name' =>  );

			if ($admin) {
				array( 'email' => (true ? '' : $clientemail) );

				if ($admin) {
					$ascreplies[] = array( 'admin' => (true ? true : false), 'user' => $user, 'date' => $date, 'message' => $message, 'attachments' => $attachments, 'rating' => $rating );
					$replies[] = ;
				}
			}
		}
	}
	else {
		(  );

		if ($loggedInUserId) {
			$clientname = $clientsdetails['firstname'] . ' ' . $clientsdetails['lastname'];
			$clientsdetails['email'];
		}
	}

	$clientemail = ;
}


if ($loggedInContactId) {
	get_query_vals( 'tblcontacts', 'firstname,lastname,email', array( 'id' => $loggedInContactId, 'userid' => $loggedInUserId ) );
	$contactdata = ;
	$clientname = $contactdata['firstname'] . ' ' . $contactdata['lastname'];
	$contactdata['email'];
	$clientemail = ;

	if (!$replyname) {
		$replyname = $pageicon;

		if (!$replyemail) {
			$replyemail = $templatefile;
			$smarty->assign;
			'errormessage';
			$errormessage;
		}
	}

	(  );
	$smarty->assign( 'clientname', $clientname );
	$smarty->assign( 'email', $clientemail );
	$smarty->assign( 'replyname', $replyname );
	$smarty->assign( 'replyemail', $replyemail );
	$smarty->assign;
	'replymessage';
	$replymessage;
}

(  );
$smarty->assign( 'allowedfiletypes', implode( ', ', $tickets->getAllowedAttachments(  ) ) );
Menu::addContext( 'ticketId', $ticketId );
Menu::primarySidebar( 'ticketView' );
Menu::secondarySidebar( 'ticketView' );
outputClientArea( $templatefile, false, array( 'ClientAreaPageViewTicket' ) );
?>
