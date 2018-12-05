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

if (!defined( 'WHMCS' )) {
	exit( 'This file cannot be accessed directly' );

	if (!function_exists( 'AddReply' )) {
		require( ROOTDIR . '/includes/ticketfunctions.php' );

		if ($ticketnum) {
			select_query( 'tbltickets', '', array( 'tid' => $ticketnum ) );
			$result = ;
		}
	}
}


while (true) {
	while (true) {
		$date = ;
		$data['title'];
		$subject = ;
		$data['message'];
		$message = ;
		$data['status'];
		$status = ;
		$data['urgency'];
		$priority = ;
		$data['admin'];
		$admin = ;
		$data['attachment'];
		$attachment = ;
		$data['lastreply'];
		$lastreply = ;
		$data['flag'];
		$flag = ;
		$data['service'];
		$service = ;
		strip_tags( $message );
		$message = ;

		if (!$id) {
			$apiresults = array( 'result' => 'error', 'message' => 'Ticket ID Not Found' );
			return null;

			if ($userid) {
				select_query( 'tblclients', '', array( 'id' => $userid ) );
				$result2 = ;
			}

			mysql_fetch_array( $result2 );
			$data = ;
			$name = $data['firstname'] . ' ' . $data['lastname'];

			if ($data['companyname']) {
				$name .= ' (' . $data['companyname'] . ')';
				$data['email'];
				$email = ;

				if ($contactID) {
					get_query_vals( 'tblcontacts', '', array( 'id' => $contactID ) );
					$contactData = ;
					(  . $contactData['firstname'] . ' ' );
					$contactData['lastname'];
				}
			}

			$contactName =  . ;

			if ($contactData['companyname']) {
				$contactName .= (  . ' (' . $contactData['companyname'] . ')' );
				$contactData['email'];
				$contactEmail = ;
				$apiresults = array( 'result' => 'success', 'ticketid' => $id, 'tid' => $tid, 'c' => $c, 'deptid' => $deptid, 'deptname' => getDepartmentName( $deptid ), 'userid' => $userid, 'contactid' => $contactID, 'name' => $name, 'email' => $email, 'cc' => $cc, 'date' => $date, 'subject' => $subject, 'status' => $status, 'priority' => $priority, 'admin' => $admin, 'lastreply' => $lastreply, 'flag' => $flag, 'service' => $service );
				array( 'userid' => $userid, 'contactid' => $contactID );

				if (empty( $$contactName )) {
					array( 'name' => (true ? $contactName : $name) );

					if (empty( $$contactEmail )) {
						$first_reply = array( 'email' => (true ? $contactEmail : $email), 'date' => $date, 'message' => $message, 'attachment' => $attachment, 'admin' => $admin );
					}
				}


				if ($_REQUEST['repliessort']) {
					$sortorder = (true ? $_REQUEST['repliessort'] : 'ASC');

					if ($sortorder == 'ASC') {
						$apiresults['replies']['reply'][] = $first_reply;
						select_query( 'tblticketreplies', '', array( 'tid' => $id ), 'id', $sortorder );
						$result = ;
						mysql_fetch_array( $result );

						if ($data = ) {
							$data['userid'];
							$userid = ;
							$data['contactid'];
							$contactID = ;
							$data['name'];
							$name = ;
							$data['email'];
						}
					}
				}
			}

			$email = ;
			$data['date'];
			$date = ;
			$data['message'];
			$message = ;
			$data['attachment'];
			$attachment = ;
			$data['admin'];
			$admin = ;
			$data['rating'];
			$rating = ;
			strip_tags( $message );
			$message = ;

			if ($userid) {
				select_query( 'tblclients', '', array( 'id' => $userid ) );
				$result2 = ;
				mysql_fetch_array( $result2 );
				$data = ;
				$name = $data['firstname'] . ' ' . $data['lastname'];

				if ($data['companyname']) {
					$name .= ' (' . $data['companyname'] . ')';
				}
			}

			$data['email'];
			$email = ;

			if ($contactID) {
				get_query_vals( 'tblcontacts', '', array( 'id' => $contactID ) );
				$contactData = ;
				$name = (  . $contactData['firstname'] . ' ' ) . $contactData['lastname'];

				if ($contactData['companyname']) {
						. ' (' . $contactData['companyname'];
				}
			}

			$name .= (  . ')' );
			$contactData['email'];
			$email = ;
			array( 'userid' => $userid, 'contactid' => $contactID, 'name' => $name, 'email' => $email );
		}

		$apiresults['replies']['reply'][] = array( 'date' => $date, 'message' => $message, 'attachment' => $attachment, 'admin' => $admin, 'rating' => $rating );
	}


	if ($sortorder != 'ASC') {
		$apiresults['replies']['reply'][] = $first_reply;
		$apiresults['notes'] = '';
		select_query( 'tblticketnotes', '', array( 'ticketid' => $id ), 'id', 'ASC' );
		$result = ;
		mysql_fetch_array( $result );

		if ($data = ) {
			$data['id'];
			$noteid = ;
			$data['admin'];
		}

		$admin = ;
		$data['date'];
		$date = ;
		$data['message'];
		$message = ;
		array( 'noteid' => $noteid, 'date' => $date );
	}

	$apiresults['notes']['note'][] = array( 'message' => $message, 'admin' => $admin );
}

$responsetype = 'xml';
?>
